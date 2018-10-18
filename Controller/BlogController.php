<?php

namespace Controller;

echo "BlogController";

class BlogController implements ControllerInterface
{
    use ControllerTrait;

    /**
     * Implement the right view
     */
    public function __invoke()
    {
        // TODO: Implement index() method.
    }
}
