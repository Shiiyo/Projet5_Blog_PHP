<?php

namespace Controller\Admin;

use Controller\ControllerTrait;
use Controller\ControllerInterface;

echo 'Comment ControllerTrait';

class CommentController implements ControllerInterface
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
