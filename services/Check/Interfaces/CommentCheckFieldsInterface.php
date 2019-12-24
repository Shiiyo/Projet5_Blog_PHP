<?php

namespace services\Check\Interfaces;

interface CommentCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function commentCheckFields($container, $request, $session);
}
