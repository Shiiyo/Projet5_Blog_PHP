<?php

namespace services\Testing\Interfaces;

interface ContactTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function contactTestingFields($container, $request, $session);
}
