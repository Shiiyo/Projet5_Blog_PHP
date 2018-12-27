<?php


namespace services\Interfaces;

interface ValidationFormInterface
{
    /**
     * ValidationFormInterface constructor.
     * @param $validator
     */
    public function __construct($validator);

    /**
     * @param $name
     * @return mixed
     */
    public function validateName($name);

    /**
     * @param $email
     * @return mixed
     */
    public function validateEmail($email);

    /**
     * @param $message
     * @return mixed
     */
    public function validateMessage($message);

    /**
     * @param $title
     * @return mixed
     */
    public function validateTitle($title);

    /**
     * @param $resume
     * @return mixed
     */
    public function validateResume($resume);

    /**
     * @return mixed
     */
    public function getValidator();

    /**
     * @param $validator
     */
    public function setValidator($validator): void;

    /**
     * @param $password
     * @return mixed
     */
    public function validatePassword($password);

    /**
     * @param $password1
     * @param $password2
     * @return mixed
     */
    public function validateEqualPassword($password1, $password2);
}
