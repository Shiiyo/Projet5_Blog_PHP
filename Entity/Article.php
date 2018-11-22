<?php

namespace Entity;

use Entity\Interfaces as Interfaces;

class Article implements Interfaces\BlogPostInterface
{
    private $id;
    private $idAdmin;
    private $title;
    private $resume;
    private $content;
    private $addDate;
    private $updateDate;


    public function __construct($id, $idAdmin, $title, $resume, $content, $addDate)
    {
        $this->id = $id;
        $this->idAdmin = $idAdmin;
        $this->title = $title;
        $this->resume = $resume;
        $this->content = $content;
        $this->addDate = $addDate;
    }

    //GETTERS

    /**
     * @return int
     */
    public function getId(): int
    {
        return  $this->id;
    }

    /**
     * @return int
     */
    public function getIdAdmin(): int
    {
        return $this->idAdmin;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getResume():string
    {
        return $this->resume;
    }

    /**
     * @return string
     */
    public function getContent():string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getAddDate(): string
    {
        return $this->addDate;
    }

    /**
     * @return string
     */
    public function getUpdatDate(): string
    {
        return $this->updateDate;
    }

    //SETTERS

    /**
     * @param int $idAdmin
     */
    public function setIdAdmin(int $idAdmin): void
    {
        $this->idAdmin = $idAdmin;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $resume
     */
    public function setResume(string $resume): void
    {
        $this->resume = $resume;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @param string $addDate
     */
    public function setAddDate(string $addDate): void
    {
        $this->addDate = $addDate;
    }

    /**
     * @param string $updateDate
     */
    public function setUpdateDate(string $updateDate): void
    {
        $this->updateDate = $updateDate;
    }
}
