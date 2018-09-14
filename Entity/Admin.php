<?php

namespace Entity;

class Admin implements Interfaces\AdminInterface
{
    private $id;
    private $email;
    private $password;
    private $name;
    private $firstName;

    //GETTERS
    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }


    // SETTERS
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }
}
