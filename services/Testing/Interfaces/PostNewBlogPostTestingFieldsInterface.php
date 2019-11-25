<?php

namespace services\Testing\Interfaces;

interface PostNewBlogPostTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $recaptcha
     * @return mixed
     */
    public function postNewBlogPostTestingFields($container, $request);
}
