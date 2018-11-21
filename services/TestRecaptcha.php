<?php


namespace services;

use services\Interfaces\TestRecaptchaInterface;

class TestRecaptcha implements TestRecaptchaInterface
{
    protected $container;
    protected $recaptchaResponse;

    public function __construct($container, $recaptchaResponse)
    {
        $this->setContainer($container);
        $this->setRecaptchaResponse($recaptchaResponse);
    }

    public function __invoke()
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $secret = '6LeJCnQUAAAAABCqgPutdMDbdQAzDp4iF-DKre8X';
        $response = $this->getRecaptchaResponse();
        $verify = file_get_contents($url.'?secret='.$secret.'&response='.$response);
        return json_decode($verify);
    }

    /**
     * @return \framework\DependencyInjectionContainer
     */
    public function getContainer() :\framework\DependencyInjectionContainer
    {
        return $this->container;
    }

    /**
     * @return
     */
    public function getRecaptchaResponse()
    {
        return $this->recaptchaResponse;
    }

    /**
     * @param \framework\DependencyInjectionContainer $container
     */
    public function setContainer($container): void
    {
        $this->container = $container;
    }

    /**
     * @param mixed $recaptchaResponse
     */
    public function setRecaptchaResponse($recaptchaResponse): void
    {
        $this->recaptchaResponse = $recaptchaResponse;
    }
}
