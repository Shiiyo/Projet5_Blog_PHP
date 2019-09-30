<?php


namespace services\AdminManagement\Interfaces;

use Entity\Admin;

interface AdminTestExistingPseudoInterface
{

    /**
     * AdminTestExistingPseudoInterface constructor.
     * @param $container
     */
    public function __construct($container);

    /**
     * @param $pseudo
     * @return mixed
     */
    public function testExistingPseudo($pseudo);
}
