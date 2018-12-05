<?php

namespace services\Builders;

interface BuilderInterface
{
    /**
     * @param array $dataForHydrate
     * @return mixed
     */
    public function build($dataForHydrate);
}
