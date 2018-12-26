<?php


namespace services\AdminManagement;

use services\Interfaces\DeleterInterface;

class AdminDeleter implements DeleterInterface
{
    private $adminStorage;

    public function __construct($adminStorage)
    {
        $this->adminStorage = $adminStorage;
    }

    public function delete($adminId)
    {
        return $this->adminStorage->delete($adminId);
    }
}
