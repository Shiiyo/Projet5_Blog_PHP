<?php

namespace Entity;

class ContactForm
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 50
     *     minMessage = "Votre nom doit faire au moins {{ limit }} caractères de long",
     *     maxMessage = "Votre nom doit faire au maximum {{limit }} caractères de long"
     * )
     * @Assert\Regex("/^[\p{L}]{2,}$/")
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 50
     *     minMessage = "Votre nom doit faire au moins {{ limit }} caractères de long",
     *     maxMessage = "Votre nom doit faire au maximum {{limit }} caractères de long"
     * )
     * @Assert\Regex("/^[\p{L}]{2,}$/")
     */
    private $first_name;

    /**
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\NotBlank()
     */
    private $message;

    /**
     * @Assert\NotBlank()
     */
    private $recaptchaResponse;


    public function __construct($name, $first_name, $email, $message, $recaptchaResponse)
    {
        $this->name = $name;
        $this->first_name = $first_name;
        $this->email = $email;
        $this->message = $message;
        $this->recaptchaResponse = $recaptchaResponse;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getRecaptchaResponse()
    {
        return $this->recaptchaResponse;
    }
}