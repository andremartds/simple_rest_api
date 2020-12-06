<?php
require './vendor/autoload.php';

use App\config\JsonUtil;
use App\config\Route;
use App\config\RouteUtil;

$routeValidator = new Route(RouteUtil::getRotas());
$dataValidated = $routeValidator->validator();

$JsonUtil = new JsonUtil();
$JsonUtil->returnArray($dataValidated);



