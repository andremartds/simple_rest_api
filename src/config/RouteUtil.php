<?php
namespace App\config;

class RouteUtil
{
    public static function getRotas()
    {
        $urls = self::getUrls();

        $request = [];
        $request['route'] = strtoupper(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $request['resource'] = $urls[1] ?? null;
        $request['id'] = $urls[2] ?? null;
        $request['method'] = $_SERVER['REQUEST_METHOD'];
        return $request;
    }

    public static function getUrls()
    {
      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
      return explode('/', $uri);
    }
}
