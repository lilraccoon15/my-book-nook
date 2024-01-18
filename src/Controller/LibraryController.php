<?php

namespace App\Controller;

class LibraryController extends Controller
{
    public function index(): void
    {
        $this->render("library/index");
    }
}