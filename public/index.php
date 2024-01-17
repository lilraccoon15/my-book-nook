<?php

use App\Core\Router;

define("ROOT", dirname(__DIR__));

require(ROOT."/vendor/autoload.php");

$router = new Router();
$router->run();