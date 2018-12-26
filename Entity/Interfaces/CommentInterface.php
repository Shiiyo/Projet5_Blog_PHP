<?php

namespace Entity\Interfaces;

interface CommentInterface
{
    //GETTERS
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getPseudo();

    /**
     * @return mixed
     */
    public function getMessage();

    /**
     * @return mixed
     */
    public function getEmail();

    /**
     * @return mixed
     */
    public function getValidation();

    /**
     * @return mixed
     */
    public function getAddDate();

    /**
     * @return mixed
     */
    public function getArticleName();

    /**
     * @return mixed
     */
    public function getArticleSlug();
    //SETTERS

    /**
     * @param string $pseudo
     * @return mixed
     */
    public function setPseudo(string $pseudo);

    /**
     * @param string $message
     * @return mixed
     */
    public function setMessage(string $message);

    /**
     * @param string $email
     * @return mixed
     */
    public function setEmail(string $email);

    /**
     * @param string $validation
     * @return mixed
     */
    public function setValidation(string $validation);

    /**
     * @param string $addDate
     * @return mixed
     */
    public function setAddDate(string $addDate);

    /**
     * @param mixed $articleName
     */
    public function setArticleName($articleName): void;

    /**
     * @param mixed $articleSlug
     */
    public function setArticleSlug($articleSlug): void;
}
