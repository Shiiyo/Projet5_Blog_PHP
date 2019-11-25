<?php

namespace services\Testing\Interfaces;

interface ConnectionTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $recaptcha
     * @return mixed
     */
    public function connectionTestingFields($container, $request);
}
