<?php

class BlogPost
{
    private $id,
            $idAdmin,
            $title,
            $resume,
            $content,
            $addDate,
            $updateDate;

    //GETTERS
    public function getId(): int
    {
        return  $this->id;
    }

    public function getIdAdmin(): int
    {
        return $this->idAdmin;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getResume():string
    {
        return $this->resume;
    }

    public function getContent():string
    {
        return $this->content;
    }

    public function getAddDate(): string
    {
        return $this->addDate;
    }

    public function getUpdatDate(): string
    {
        return $this->updateDate;
    }

    //SETTERS
    public function setIdAdmin(int $idAdmin): void
    {
        $this->idAdmin = $idAdmin;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setResume(string $resume): void
    {
        $this->resume = $resume;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setAddDate(string $addDate): void
    {
        $this->addDate = $addDate;
    }

    public function setUpdateDate(string $updateDate): void
    {
        $this->updateDate = $updateDate;
    }
}