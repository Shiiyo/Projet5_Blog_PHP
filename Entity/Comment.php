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
    public function getId(): int
    {
        return $this->id;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getValidation(): string
    {
        return $this->validation;
    }

    public function getAddDate(): string
    {
        return $this->addDate;
    }


    //SETTERS

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setValidation(string $validation): void
    {
        $this->validation = $validation;
    }

    public function setAddDate(sttring $addDate): void
    {
        return $this->addDate = $addDate;
    }
}
