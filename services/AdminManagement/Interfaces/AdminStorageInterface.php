<?php

namespace services\AdminManagement\Interfaces;

use Entity\Admin;

interface AdminStorageInterface
{
    /**
     * @return mixed
     */
    public function fetchAllAdmin();

    /**
     * @param int $id
     * @return mixed
     */
    public function fetchSingleAdmin($id);

    /**
     * @param $email
     * @return array|null
     */
    public function selectAdminByEmail($email);

    /**
     * @param $uuid
     * @return array|null
     */
    public function selectAdminByUuid($uuid);

    /**
     * @param $adminId
     * @return mixed
     */
    public function delete($adminId);

    /**
     * @param Admin $admin
     * @return mixed
     */
    public function save($admin);
}
