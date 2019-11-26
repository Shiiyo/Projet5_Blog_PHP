<?php


namespace services\AdminManagement;

use framework\DependencyInjectionContainer;
use services\AdminManagement\Interfaces\AdminStorageInterface;

class AdminLoader
{
    private $adminStorage;
    private $container;
    private $adminBuilder;

    /**
     * ArticleLoader constructor.
     * @param AdminStorageInterface $adminStorage
     * @param DependencyInjectionContainer $container
     */
    public function __construct($adminStorage, $container)
    {
        $this->adminStorage = $adminStorage;
        $this->container = $container;
    }

    public function getAdminCollection()
    {
        $adminArray = $this->adminStorage->fetchAllAdmin();
        $adminObjects = [];
        if ($this->adminBuilder === null) {
            $this->adminBuilder = $this->container->newAdminBuilder();
        }
        foreach ($adminArray as $adminData) {
            $admin = $this->adminBuilder->build($adminData);
            $adminObjects[] = $admin;
        }
        $adminCollection = $this->container->newAdminCollection($adminObjects);
        return $adminCollection;
    }

    /**
     * @param int $id
     */
    public function findOneById($admin)
    {
        $adminArray = $this->adminStorage->fetchSingleAdmin($admin);
        if ($this->adminBuilder === null) {
            $this->adminBuilder = $this->container->newAdminBuilder();
        }
        $admin = $this->adminBuilder->build($adminArray[0]);
        return $admin;
    }

    /**
     * @param $email
     * @return bool|\Entity\Admin|mixed
     */
    public function findOneByEmail($email)
    {
        $adminArray = $this->adminStorage->selectAdminByEmail($email);
        if ($adminArray == null) {
            return false;
        }
        if ($this->adminBuilder === null) {
            $this->adminBuilder = $this->container->newAdminBuilder();
        }
        $admin = $this->adminBuilder->build($adminArray[0]);
        return $admin;
    }

    public function findOneByPseudo($pseudo)
    {
        $adminArray = $this->adminStorage->selectAdminByPseudo($pseudo);
        if ($adminArray == null) {
            return false;
        }
        if ($this->adminBuilder === null) {
            $this->adminBuilder = $this->container->newAdminBuilder();
        }
        $admin = $this->adminBuilder->build($adminArray[0]);
        return $admin;
    }

    /**
     * @param $uuid
     * @return bool|\Entity\Admin|mixed
     */
    public function findOneByUuid($uuid)
    {
        $adminArray = $this->adminStorage->selectAdminByUuid($uuid);
        if ($adminArray == null) {
            return false;
        }
        if ($this->adminBuilder === null) {
            $this->adminBuilder = $this->container->newAdminBuilder();
        }
        $admin = $this->adminBuilder->build($adminArray[0]);
        return $admin;
    }

    public function setAdminNameForArticleCollection($articleCollection)
    {
        foreach ($articleCollection as $article) {
            $article->setAdminName($this->adminStorage->getName($article));
        }
    }
}
