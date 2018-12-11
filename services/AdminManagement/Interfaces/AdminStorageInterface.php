<?php

namespace services\AdminManagement\Interfaces;

interface AdminStorageInterface
{
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
}
