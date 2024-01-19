<?php

namespace App\Model\Repository;

use App\Model\Entity\User;
use PDO;

class UserRepository extends Repository
{
    public function findOne(string $pseudo)
    {
        $request = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $request->bindParam("username", $pseudo);
        $request->setFetchMode(PDO::FETCH_CLASS, User::class);
        $request->execute();

        return $request->fetch();
    }

    public function createOne(User $user)
    {
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, email, password, birth_year, gender, country, accepted_terms)
                  VALUES (:username, :email, :password, :birth_year, :gender, :country, :accepted_terms)";

        $request = $this->db->prepare($query);

        $request->bindParam(":username", $user->getUsername());
        $request->bindParam(":email", $user->getEmail());
        $request->bindParam(":password", $hashedPassword);
        $request->bindParam(":birth_year", $user->getBirthYear());
        $request->bindParam(":gender", $user->getGender());
        $request->bindParam(":country", $user->getCountry());
        $request->bindParam(":accepted_terms", $user->hasAcceptedTerms(), PDO::PARAM_BOOL);

        $request->execute();
    }

    public function isUsernameTaken(string $username): bool
    {
        $query = "SELECT COUNT(*) FROM users WHERE username = :username";
        $request = $this->db->prepare($query);
        $request->bindParam(":username", $username);
        $request->execute();

        return $request->fetchColumn() > 0;
    }

    public function isEmailTaken(string $email): bool
    {
        $query = "SELECT COUNT(*) FROM users WHERE email = :email";
        $request = $this->db->prepare($query);
        $request->bindParam(":email", $email);
        $request->execute();

        return $request->fetchColumn() > 0;
    }


}