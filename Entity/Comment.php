<?php

namespace Entity;

use Entity\Interfaces as Interfaces;

class Comment implements Interfaces\CommentInterface
{
    private $id;
    private $pseudo;
    private $message;
    private $email;
    private $validation;
    private $addDate;

    //GETTERS

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getValidation(): string
    {
        return $this->validation;
    }

    /**
     * @return string
     */
    public function getAddDate(): string
    {
        return $this->addDate;
    }


    //SETTERS

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $validation
     */
    public function setValidation(string $validation): void
    {
        $this->validation = $validation;
    }

    /**
     * @param string $addDate
     */
    public function setAddDate(string $addDate): void
    {
        $this->addDate = $addDate;
    }
}
