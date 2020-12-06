<?php

namespace App\config;

use ReflectionClass;

class RouteInstanceObject
{
  public $route;

  public function __construct($route)
  {
    $this->route = $route;
  }

  public function handleReflection()
  {
    $route       = explode("/", $this->route);
    $nameController    = mb_convert_case($route[1], MB_CASE_TITLE, "UTF-8") . 'Controller';
    $reflector  = new ReflectionClass('\\App\\Http\\Controllers\\' . $nameController);
    $controller = $reflector->newInstance();
    return $controller;
  }

  public function executePost($data)
  {
    $controller = $this->handleReflection();
    $controller->post($data);
  }

  public function executeGet()
  {
    $controller = $this->handleReflection();
    $controller->get();
  }

  public function executePut($data, $id)
  {
    $controller = $this->handleReflection();
    $controller->put($data, $id);
  }

  public function executeDelete($id)
  {
    $controller = $this->handleReflection();
    $controller->delete($id);
  }
}
