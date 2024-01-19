<?php

namespace App\Core;

use App\Controller\HomeController;
use App\Controller\LibraryController;

class Router
{
    public function run()
    {
        $requestUri = $_SERVER["REQUEST_URI"];
        $path = $requestUri ?: "/";
        $pathExplode = explode('/', $path);
        // var_dump($pathExplode);
        // $controllerName = $pathExplode[1] ? ucwords($pathExplode[1]) : "Home";
        $controllerName = '';

        if (!empty($pathExplode[1])) {
            $controllerName .= ucwords($pathExplode[1]);
        } else {
            $controllerName .= 'Home';
        }

        for ($i = 2; $i < count($pathExplode); $i++) {
            $controllerName .= ucwords($pathExplode[$i]);
        }

        $method = "index";

        if (!empty($pathExplode[3])) {
            $method = $pathExplode[3];
        }

        $additionalParams = array_slice($pathExplode, 4);

        $params = [];
        for ($i = 0; $i < count($additionalParams); $i += 2) {
            $paramName = $additionalParams[$i];
            $paramValue = $additionalParams[$i + 1] ?? null;
            $params[$paramName] = $paramValue;
        }

        $controller = new \App\Controller\Controller();
        $controller->handleRequest($controllerName, $method, $params);
    }
}