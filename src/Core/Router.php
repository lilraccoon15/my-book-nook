<?php

namespace App\Core;

use App\Controller\HomeController;

class Router
{
    public function run()
    {
        $path = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "/";

        $pathExplod = explode('/', $path);
        $controller = $pathExplod[1] ? ucwords($pathExplod[1]) : "Home";
        $controller = "App\Controller\\".$controller."Controller";
        $method = $pathExplod[2] ?? "index";

        $controller = new $controller;
        $controller->$method();
    }
}