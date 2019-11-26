<?php

namespace services\Testing\Interfaces;

interface PostNewAdminAccountTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function postNewAdminAccountTestingFields($container, $request, $session);
}
