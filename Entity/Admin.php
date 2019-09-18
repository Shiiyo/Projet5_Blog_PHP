<?php

namespace Entity;

class Admin implements Interfaces\AdminInterface
{
    private $id;
    private $name;
    private $firstName;
    private $pseudo;
    private $email;
    private $password;

    private $nbArticles;

    //GETTERS

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return int
     */
    public function getNbArticles()
    {
        return $this->nbArticles;
    }

    // SETTERS

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }
    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @param int $nbArticles
     */
    public function setNbArticles($nbArticles): void
    {
        $this->nbArticles = $nbArticles;
    }
}
