<?php


namespace services;

class TestRecaptcha
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
        return $this->getContainer()->createHttpRequest(
            "https://www.google.com/recaptcha/api/siteverify",
            'POST',
            array(
                'secret' => '6LeJCnQUAAAAABCqgPutdMDbdQAzDp4iF-DKre8X',
                'response' => $this->getRecaptchaResponse())
        );
    }

    /**
     * @return \framework\DependencyInjectionContainer
     */
    public function getContainer() :\framework\DependencyInjectionContainer
    {
        return $this->container;
    }

    /**
     * @return mixed
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
