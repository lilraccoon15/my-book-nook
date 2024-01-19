<?php

namespace App\Controller;

class ErrorsController extends Controller
{
    public function index($errorType = null): void
    {
        // vérifier les params et changer le render selon le param
        var_dump($errorType);
        switch ($errorType) {
            case '404':
                $view = 'errors/error404/index';
                break;
        }
        $this->render($view);
        // $this->render("errors/index");
    }
}