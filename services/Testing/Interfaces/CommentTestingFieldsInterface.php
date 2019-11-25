<?php

namespace services\Testing\Interfaces;

interface CommentTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $verifyRecaptcha
     * @return mixed
     */
    public function commentTestingFields($container, $request);
}
