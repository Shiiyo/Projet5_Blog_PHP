<?php

namespace services\Check\Interfaces;

interface PostNewAdminAccountCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function postNewAdminAccountCheckFields($container, $request, $session);
}
