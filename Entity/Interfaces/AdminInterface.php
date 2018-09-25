<?php

namespace Entity\Interfaces;

interface AdminInterface
{
    //GETTERS
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getEmail();

    /**
     * @return mixed
     */
    public function getPassword();

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return mixed
     */
    public function getFirstName();


    // SETTERS

    /**
     * @param string $email
     * @return mixed
     */
    public function setEmail(string $email);

    /**
     * @param string $password
     * @return mixed
     */
    public function setPassword(string $password);

    /**
     * @param string $name
     * @return mixed
     */
    public function setName(string $name);

    /**
     * @param string $firstName
     * @return mixed
     */
    public function setFirstName(string $firstName);
}
