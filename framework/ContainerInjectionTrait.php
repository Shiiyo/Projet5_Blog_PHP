<?php

namespace framework;

trait ContainerInjectionTrait
{
    private $container;

    /**
     * ContainerInjectionTrait constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->setContainer($container);
    }

    /**
     * @return DependencyInjectionContainer
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed $container
     */
    public function setContainer(DependencyInjectionContainer $container): void
    {
        $this->container = $container;
    }
}
