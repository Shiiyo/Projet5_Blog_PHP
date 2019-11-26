<?php

namespace services\Testing\Interfaces;

interface PostNewBlogPostTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function postNewBlogPostTestingFields($container, $request, $session);
}
