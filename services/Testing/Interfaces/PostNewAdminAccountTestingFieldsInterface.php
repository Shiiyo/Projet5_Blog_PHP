<?php

namespace services\Testing\Interfaces;

interface PostNewAdminAccountTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $verifyRecaptcha
     * @return mixed
     */
    public function postNewAdminAccountTestingFields($container, $request);
}
