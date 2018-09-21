<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 21.09.18
 * Time: 16:55
 */

namespace Controller;


class ShowPostController implements ShowPostControllerInterface
{
    public function index($id)
    {
        echo $id;
    }
}