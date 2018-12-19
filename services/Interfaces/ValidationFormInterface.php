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
}
