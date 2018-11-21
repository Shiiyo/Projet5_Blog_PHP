<?php


namespace services\Interfaces;

use framework\DependencyInjectionContainer;

interface TestRecaptchaInterface
{
    /**
     * TestRecaptchaInterface constructor.
     * @param DependencyInjectionContainer $container
     * @param $recaptchaResponse
     */
    public function __construct($container, $recaptchaResponse);

    /**
     * @return mixed
     */
    public function __invoke();

    /**
     * @return \framework\DependencyInjectionContainer
     */
    public function getContainer() :\framework\DependencyInjectionContainer;

    /**
     * @return mixed
     */
    public function getRecaptchaResponse();

    /**
     * @param DependencyInjectionContainer $container
     */
    public function setContainer($container): void;

    /**
     * @param $recaptchaResponse
     */
    public function setRecaptchaResponse($recaptchaResponse): void;
}
