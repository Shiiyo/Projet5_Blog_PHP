<?php

namespace Entity\Interfaces;

interface BlogPostInterface
{
    //GETTERS
    public function getId();

    public function getIdAdmin();

    public function getTitle();

    public function getResume();

    public function getContent();

    public function getAddDate();

    public function getUpdatDate();

    //SETTERS
    public function setIdAdmin(int $idAdmin);

    public function setTitle(string $title);

    public function setResume(string $resume);

    public function setContent(string $content);

    public function setAddDate(string $addDate);

    public function setUpdateDate(string $updateDate);
}
