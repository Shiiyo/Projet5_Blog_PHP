<?php

namespace services\Testing\Interfaces;

interface ContactTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $verifyRecaptcha
     * @return mixed
     */
    public function contactTestingFields($container, $request);
}
