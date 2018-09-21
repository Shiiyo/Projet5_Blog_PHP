<?php

namespace Controller;


class ExamplePostController
{
    public function index($id, $prenom)
    {
        echo "id :" . $id . " prenom est : " . $prenom;
    }
}