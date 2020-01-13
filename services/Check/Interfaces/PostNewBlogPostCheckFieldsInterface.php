<?php

namespace services\Check\Interfaces;

interface PostNewBlogPostCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function postNewBlogPostCheckFields($container, $request, $session);
}
