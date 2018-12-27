<?php

namespace services\AdminManagement;

class PDOAdminStorage
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAllAdmin()
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM admin');
            $req->execute();
            $adminArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }
        if (!$adminArray) {
            return null;
        }
        return $adminArray;
    }

    public function fetchSingleAdmin($article)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM admin WHERE id = :id');
            $req->execute(array('id' => $article->getIdAdmin()));
            $adminArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }

        if (!$adminArray) {
            return null;
        }
        return $adminArray;
    }

    /**
     * @param $email
     * @return array|null
     */
    public function selectAdminByEmail($email)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM admin WHERE email = :email');
            $req->execute(array('email' => $email));
            $adminArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }

        if (!$adminArray) {
            return null;
        }
        return $adminArray;
    }

    /**
     * @param $uuid
     * @return array|null
     */
    public function selectAdminByUuid($uuid)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM admin WHERE id = :uuid');
            $req->execute(array('uuid' => $uuid));
            $adminArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }

        if (!$adminArray) {
            return null;
        } else {
            return $adminArray;
        }
    }


    public function getName($article)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT name, first_name FROM admin WHERE id = :uuid');
            $req->execute(array('uuid' => $article->getIdAdmin()));
            $adminArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }
        return $adminArray[0]['name'] . ' ' . $adminArray[0]['first_name'];
    }

    public function delete($adminId)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('DELETE FROM admin WHERE id = :id');
            $req->execute([
                'id' => $adminId
            ]);
            return true;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    public function save($admin)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('INSERT INTO admin VALUES (:id, :name, :first_name, :email, :password)');
            $req->execute([
                'id' => $admin->getId(),
                'name' => $admin->getName(),
                'first_name' =>$admin->getFirstName(),
                'email' => $admin->getEmail(),
                'password' => $admin->getPassword()
            ]);
            return true;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }
}
