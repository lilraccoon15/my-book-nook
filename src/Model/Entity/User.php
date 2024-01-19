<?php

namespace App\Model\Entity;

class User
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private string $birthYear;
    private string $gender;
    private string $country;
    private string $terms;


    public function getId():int
    {
        return $this->id;
    }

    public function getUsername():string
    {
        return $this->username;
    }

    public function setUsername(string $username):self
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail():string
    {
        return $this->email;
    }

    public function setEmail(string $email):self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword():string
    {
        return $this->password;
    }

    public function setPassword(string $password):self
    {
        $this->password = $password;
        return $this;
    }

    public function getBirthYear():string
    {
        return $this->birthYear;
    }

    public function setBirthYear(string $birthYear):self
    {
        $this->birthYear = $birthYear;
        return $this;
    }

    public function getGender():string
    {
        return $this->gender;
    }

    public function setGender(string $gender):self
    {
        $this->gender = $gender;
        return $this;
    }

    public function getCountry():string
    {
        return $this->country;
    }

    public function setCountry(string $country):self
    {
        $this->country = $country;
        return $this;
    }

    public function hasAcceptedTerms():int
    {
        return $this->terms;
    }

    public function setAcceptedTerms(int $terms):self
    {
        $this->terms = $terms;
        return $this;
    }
    
}