<?php


namespace services\AdminManagement;

class AdminTestExistingPseudo
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function testExistingPseudo($pseudo)
    {
        $adminStorage = $this->container->getAdminStorage();
        return $adminStorage->existingPseudo($pseudo);
    }
}
