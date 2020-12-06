<?php
namespace App\config;

use InvalidArgumentException;
use JsonException;

class JsonUtil
{
    
    public function returnArray($dataValidated)
    {
        $data = [];

        if ((is_array($dataValidated) && count($dataValidated) > 0)) {
            $data['response'] = $dataValidated;
        }

        $this->addHeaderFor($data);
    }

    private function addHeaderFor($data)
    {
        header('Content-Type: application/json');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE');
        echo json_encode($data, JSON_THROW_ON_ERROR, 1024);
        exit;
    }

    public static function handleBodyJson()
    {
        try {
            $postJson = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new InvalidArgumentException('Invalid arguments');
        }
        if (is_array($postJson) && count($postJson) > 0) {
            return $postJson;
        }
    }
}