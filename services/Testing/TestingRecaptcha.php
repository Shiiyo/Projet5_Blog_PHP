<?php

namespace services\Testing;

use services\Testing\Interfaces\TestingRecaptchaInterface;

class TestingRecaptcha implements TestingRecaptchaInterface
{
    /**
     * @param $container
     * @param $request
     * @return mixed
     */
    public function testingRecaptcha($container, $request)
    {
        $recaptchaResponse = $request->request->get('g-recaptcha-response');
        $testRecaptcha = $container->newTestRecaptcha($container, $recaptchaResponse);
        return $testRecaptcha();
    }
}
