<?php

namespace services\AdminManagement;

use services\AdminManagement\Interfaces\DeleteAdminInterface;

class DeleteAdmin implements DeleteAdminInterface
{
    /**
     * @param $container
     * @return mixed
     */
    public function deleteAdmin($container)
    {
        $idAdmin = $container->newEndParamURI()->getEndParamURI();
        $adminDeleter = $container->newAdminDeleter();
        return $adminDeleter->delete($idAdmin);
    }
}
