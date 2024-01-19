<?php

namespace App\Controller;

use App\Model\Repository\UserRepository;

class LoginController extends Controller
{
    public function userConnected(): bool
    {
        if(isset($_SESSION["user"]))
        {
            return true;
        }
        else
        {
            return false;
        }


    }

    public function index(): void
    {

        $repo = new UserRepository;
        $user = $repo->findOne("camille");

        $data = compact("user", $user);

        $this->render("login/index", $data);

    }

    public function disconnect()
    {
        session_destroy();

        header("Location: /");
        exit();
    }
}