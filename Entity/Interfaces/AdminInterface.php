<?php

namespace Entity\Interfaces;

interface AdminInterface
{
    public function getId();

    public function getEmail();

    public function getPassword();

    public function getName();

    public function getFirstName();
}