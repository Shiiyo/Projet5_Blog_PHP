<?php

namespace services\Testing\Interfaces;

interface UpdateBlogPostTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function updateBlogPostTestingFields($container, $request, $session);
}
