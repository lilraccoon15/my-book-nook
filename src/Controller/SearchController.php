<?php

namespace App\Controller;

class SearchController extends Controller
{
    public function index(): void
    {
        $this->render("search/index");
    }
}