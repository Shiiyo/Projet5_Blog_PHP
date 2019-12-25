<?php

namespace services\Check\Interfaces;

interface PostUpdateAdminCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function postUpdateAdminCheckFields($container, $request, $session);
}
