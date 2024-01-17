<?php

namespace App\Controller;

class Controller
{
    public function render(string $view, array $data = [])
    {
        extract($data);

        ob_start();
        require(ROOT."/src/view/$view.php");
        $content = ob_get_clean();

        require(ROOT."/src/view/layout.php");
    }
}