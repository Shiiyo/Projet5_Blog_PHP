<?php

namespace services\Testing\Interfaces;

interface UpdateBlogPostTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $recaptcha
     * @return mixed
     */
    public function updateBlogPostTestingFields($container, $request);
}
