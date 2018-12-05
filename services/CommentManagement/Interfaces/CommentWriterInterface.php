<?php

namespace services\CommentManagement\Interfaces;

interface CommentWriterInterface
{
    /**
     * @param $request
     * @return mixed
     */
    public function write($request);
}
