<?php


namespace services\AdminManagement;

use services\AdminManagement\Interfaces\AdminTestExistingPseudoInterface;

class AdminTestExistingPseudo implements AdminTestExistingPseudoInterface
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
