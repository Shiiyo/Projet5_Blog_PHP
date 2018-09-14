<?php

namespace Entity\Interfaces;

interface AdminInterface
{
    //GETTERS
    public function getId();

    public function getEmail();

    public function getPassword();

    public function getName();

    public function getFirstName();


    // SETTERS
    public function setEmail(string $email);

    public function setPassword(string $password);

    public function setName(string $name);

    public function setFirstName(string $firstName);
}
