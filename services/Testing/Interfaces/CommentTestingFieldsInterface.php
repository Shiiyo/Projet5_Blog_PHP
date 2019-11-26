<?php

namespace services\Testing\Interfaces;

interface CommentTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function commentTestingFields($container, $request, $session);
}
