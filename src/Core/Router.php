<?php

namespace App\Core;

use App\Controller\HomeController;
use App\Controller\LibraryController;

class Router
{
    public function run()
    {
        // var_dump(isset($_SERVER["PATH_INFO"]));
        $requestUri = $_SERVER["REQUEST_URI"];
        // var_dump($requestUri);
        // die();
        // $path = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "/";

        $path = $requestUri ?: "/";

        // var_dump($path);

        $pathExplod = explode('/', $path);
        $controller = $pathExplod[1] ? ucwords($pathExplod[1]) : "Home";
        // var_dump($controller);
        $controller = "App\Controller\\".$controller."Controller";
        $method = $pathExplod[2] ?? "index";

        $controller = new $controller;
        $controller->$method();
    }
}