<?php

namespace App\config;

class Route
{
    private array $request;
    private array $dadosRequest;
    public const TYPE_REQUEST = ['GET', 'POST', 'DELETE', 'PUT'];

    public function __construct($request = [])
    {
        $this->request = $request;
    }

    public function validator()
    {
        if (in_array($this->request['method'], self::TYPE_REQUEST, true)) {
            $retorno = $this->redirectRequest();
            $this->handleMethod();
        }
        return $retorno;
    }

    private function redirectRequest()
    {
        if ($this->request['method'] === 'POST' || $this->request['method'] === 'PUT') {
            $this->dadosRequest = JsonUtil::handleBodyJson();
        } else {
            return $this->request['method'];
        }
    }

    private function get()
    {
        $routeInstance = new RouteInstanceObject($this->request['route']);
        $routeInstance->executeGet();
    }

    private function post()
    {

        $routeInstance = new RouteInstanceObject($this->request['route']);
        $routeInstance->executePost($this->dadosRequest);
    }

    private function put()
    {
        $routeInstance = new RouteInstanceObject($this->request['route']);
        $routeInstance->executePut($this->dadosRequest, $this->request['id']);
    }

    private function delete()
    {
        $routeInstance = new RouteInstanceObject($this->request['route']);
        $routeInstance->executeDelete($this->request['id']);
    }

    public function handleMethod()
    {
        if ($this->request['method'] === 'GET') {
            $this->get();
        }
        if ($this->request['method'] === 'POST') {
            $this->post();
        }

        if ($this->request['method'] === 'PUT') {
            $this->put();
        }

        if ($this->request['method'] === 'DELETE') {
            $this->delete();
        }
    }
}
