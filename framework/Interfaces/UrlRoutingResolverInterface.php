<?php

namespace framework\Interfaces;

interface UrlRoutingResolverInterface
{
    //GETTERS
    public function getUrl(): string;

    //SETTERS
    public function setUrl(string $url): void;
}