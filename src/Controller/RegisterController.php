<?php

namespace App\Controller;

use App\Model\Repository\UserRepository;
use App\Model\Entity\User;

class RegisterController extends Controller
{
    public function index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userRepository = new UserRepository();

            $user = new User();

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($userRepository->isUsernameTaken($username)) {
                header('Location: /register?error=username_taken');
                exit;
            }

            if ($userRepository->isEmailTaken($email)) {
                header('Location: /register?error=email_taken');
                exit;
            }
            
            if (!$this->isPasswordValid($password)) {
                header('Location: /register?error=invalid_password');
                exit;
            }

            if (!isset($_POST['terms'])) {
                header('Location: /register?error=terms_not_accepted');
                exit;
            }

            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setBirthYear($_POST['birthYear']);
            $user->setGender($_POST['gender']);
            $user->setCountry($_POST['country']);
            $user->setAcceptedTerms(isset($_POST['terms']));

            $userRepository->createOne($user);

            header('Location: /login');
            exit;
        }

        $this->render("register/index");
    }

    private function isPasswordValid(string $password): bool
    {
        return (strlen($password) >= 12 && preg_match('/[A-Z]/', $password) && preg_match('/\d/', $password));
    }
}