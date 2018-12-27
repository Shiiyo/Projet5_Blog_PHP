<?php

namespace services\AdminManagement\Interfaces;

interface AdminWriterInterface
{
    /**
     * @param $request
     * @return mixed
     */
    public function write($request);
}
