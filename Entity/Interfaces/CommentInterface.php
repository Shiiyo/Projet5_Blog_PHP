<?php

namespace Entity\Interfaces;

interface CommentInterface
{
    //GETTERS
    public function getId();

    public function getPseudo();

    public function getMessage();

    public function getEmail();

    public function getValidation();

    public function getAddDate();

    //SETTERS

    public function setPseudo(string $pseudo);

    public function setMessage(string $message);

    public function setEmail(string $email);

    public function setValidation(string $validation);

    public function setAddDate(sttring $addDate);
}
