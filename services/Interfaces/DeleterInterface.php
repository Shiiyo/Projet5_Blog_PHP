<?php

namespace services\Interfaces;

interface DeleterInterface
{

    /**
     * @param $entity
     * @return mixed
     */
    public function delete($entity);
}
