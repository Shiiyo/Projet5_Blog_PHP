<?php

namespace services\Check\Interfaces;

interface ContactCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function contactCheckFields($container, $request, $session);
}
