<?php

namespace services\Testing\Interfaces;

interface TestingRecaptchaInterface
{
    /**
     * @param $container
     * @param $request
     * @return mixed
     */
    public function testingRecaptcha($container, $request);
}
