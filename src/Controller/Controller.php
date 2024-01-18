<?php

namespace App\Controller;

class Controller
{
    public function render(string $view, array $data = []): void
    {
        $viewPath = ROOT . "/src/views/$view.php";
        $layoutPath = ROOT . "/src/views/layout.php";
        
        extract($data);

        ob_start();
        require_once $viewPath;
        $content = ob_get_clean();

        require $layoutPath;

    }
}