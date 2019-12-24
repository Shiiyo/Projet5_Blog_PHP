<?php

namespace services\Check;

use services\Check\Interfaces\CheckRecaptchaInterface;

class CheckRecaptcha implements CheckRecaptchaInterface
{
    /**
     * @param $container
     * @param $request
     * @return mixed
     */
    public function checkRecaptcha($container, $request)
    {
        $recaptchaResponse = $request->request->get('g-recaptcha-response');
        $testRecaptcha = $container->newTestRecaptcha($container, $recaptchaResponse);
        return $testRecaptcha();
    }
}
