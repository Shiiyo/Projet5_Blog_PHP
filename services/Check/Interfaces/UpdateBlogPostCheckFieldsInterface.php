<?php

namespace services\Check\Interfaces;

interface UpdateBlogPostCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function updateBlogPostCheckFields($container, $request, $session);
}
