<?php

namespace services\AdminManagement;

use Ramsey\Uuid\Uuid;
use services\AdminManagement\Interfaces\AdminWriterInterface;

class AdminWriter implements AdminWriterInterface
{
    private $adminStorage;
    private $container;
    private $adminBuilder;

    public function __construct($adminStorage, $container)
    {
        $this->adminStorage = $adminStorage;
        $this->container = $container;
    }

    public function write($request)
    {
        $adminArray = [
          'id' => Uuid::uuid4(),
          'name' => $request->request->get('nom'),
          'first_name' => $request->request->get('prenom'),
          'pseudo' => $request->request->get('pseudo')  ,
          'email' => $request->request->get('email'),
          'password' => password_hash($request->request->get('mdp1'), PASSWORD_DEFAULT)
        ];

        if ($this->adminBuilder === null) {
            $this->adminBuilder = $this->container->newAdminBuilder();
        }

        $article = $this->adminBuilder->build($adminArray);
        $returnStorage = $this->adminStorage->save($article);
        return $returnStorage;
    }

    public function update($request)
    {
        $adminArray = [
            'id' => $request->request->get('id_admin'),
            'name' => $request->request->get('nom'),
            'first_name' => $request->request->get('prenom'),
            'pseudo' => $request->request->get('pseudo')  ,
            'email' => $request->request->get('email'),
            'password' => 0
        ];

        if ($this->adminBuilder === null) {
            $this->adminBuilder = $this->container->newAdminBuilder();
        }

        $article = $this->adminBuilder->build($adminArray);
        return $this->adminStorage->update($article);
    }

    public function passwordUpdate($request)
    {
        $adminId = $request->request->get('id_admin');
        $password = password_hash($request->request->get('newPass1'), PASSWORD_DEFAULT);

        if ($this->adminBuilder === null) {
            $this->adminBuilder = $this->container->newAdminBuilder();
        }
        return $this->adminStorage->passwordUpdate($adminId, $password);
    }
}
