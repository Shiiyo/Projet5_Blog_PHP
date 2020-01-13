<?php

namespace services\Check\Interfaces;

interface CheckRecaptchaInterface
{
    /**
     * @param $container
     * @param $request
     * @return mixed
     */
    public function checkRecaptcha($container, $request);
}
