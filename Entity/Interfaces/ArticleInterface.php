<?php

namespace Entity\Interfaces;

interface ArticleInterface
{
    //GETTERS
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getIdAdmin();

    /**
     * @return mixed
     */
    public function getTitle();

    /**
     * @return mixed
     */
    public function getResume();

    /**
     * @return mixed
     */
    public function getContent();

    /**
     * @return mixed
     */
    public function getAddDate();

    /**
     * @return mixed
     */
    public function getUpdateDate();

    //SETTERS

    /**
     * @param int $idAdmin
     * @return mixed
     */
    public function setIdAdmin(int $idAdmin);

    /**
     * @param string $title
     * @return mixed
     */
    public function setTitle(string $title);

    /**
     * @param string $resume
     * @return mixed
     */
    public function setResume(string $resume);

    /**
     * @param string $content
     * @return mixed
     */
    public function setContent(string $content);

    /**
     * @param string $addDate
     * @return mixed
     */
    public function setAddDate(string $addDate);

    /**
     * @param string $updateDate
     * @return mixed
     */
    public function setUpdateDate(string $updateDate);
}
