<?php

namespace Entity;

use Entity\Interfaces as Interfaces;

class Comment implements Interfaces\CommentInterface
{
    private $id;
    private $idArticle;
    private $pseudo;
    private $message;
    private $email;
    private $validation;
    private $addDate;

    private $articleName;
    private $articleSlug;

    //GETTERS

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getIdArticle()
    {
        return $this->idArticle;
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

    /**
     * @return mixed
     */
    public function getArticleName()
    {
        return $this->articleName;
    }

    /**
     * @return mixed
     */
    public function getArticleSlug()
    {
        return $this->articleSlug;
    }


    //SETTERS

    /**
     * @param string $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param int $idArticle
     */
    public function setIdArticle($idArticle): void
    {
        $this->idArticle = $idArticle;
    }

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

    /**
     * @param mixed $articleName
     */
    public function setArticleName($articleName): void
    {
        $this->articleName = $articleName;
    }

    /**
     * @param mixed $articleSlug
     */
    public function setArticleSlug($articleSlug): void
    {
        $this->articleSlug = $articleSlug;
    }
}
