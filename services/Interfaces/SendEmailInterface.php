<?php


namespace services\Interfaces;

use framework\DependencyInjectionContainer;

interface SendEmailInterface
{
    /**
     * SendEmailInterface constructor.
     * @param DependencyInjectionContainer $container
     */
    public function __construct($container);


    /**
     * @param $name
     * @param $first_name
     * @param $email
     * @param $message
     * @return mixed
     */
    public function __invoke($name, $first_name, $email, $message);

    /**
     * @return DependencyInjectionContainer
     */
    public function getContainer() :\framework\DependencyInjectionContainer;

    /**
     * @param DependencyInjectionContainer $container
     */
    public function setContainer($container): void;
}
