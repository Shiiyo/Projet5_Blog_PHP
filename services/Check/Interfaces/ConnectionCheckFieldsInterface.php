<?php

namespace services\Check\Interfaces;

interface ConnectionCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function connectionCheckFields($container, $request, $session);
}
