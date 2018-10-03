<?php

namespace framework\Interfaces;

interface UrlRoutingResolverInterface
{
    public function __construct($container, $url);
    public function findRoute();

    //GETTERS
    public function getUrl(): string;

    //SETTERS
    public function setUrl(string $url): void;
}
