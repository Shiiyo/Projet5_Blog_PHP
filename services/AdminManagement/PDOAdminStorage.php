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
        try {
            $req = $this->pdo->query('SELECT * FROM admin');
            $adminArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }
        if (!$adminArray) {
            return null;
        }
        return $adminArray;
    }

    public function fetchSingleAdmin($admin)
    {
        try {
            $req = $this->pdo->prepare('SELECT * FROM admin WHERE id = :id');
            $req->execute(array('id' => $admin->getIdAdmin()));
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
        try {
            $req = $this->pdo->prepare('SELECT * FROM admin WHERE email = :email');
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

    public function selectAdminByPseudo($pseudo)
    {
        try {
            $req = $this->pdo->prepare('SELECT * FROM admin WHERE pseudo = :pseudo');
            $req->execute(array('pseudo' => $pseudo));
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
        try {
            $req = $this->pdo->prepare('SELECT * FROM admin WHERE id = :uuid');
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
        try {
            $req = $this->pdo->prepare('SELECT name, first_name FROM admin WHERE id = :uuid');
            $req->execute(array('uuid' => $article->getIdAdmin()));
            $adminArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }
        return $adminArray[0]['name'] . ' ' . $adminArray[0]['first_name'];
    }

    public function delete($adminId)
    {
        try {
            $req = $this->pdo->prepare('DELETE FROM admin WHERE id = :id');
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
        try {
            $req = $this->pdo->prepare('INSERT INTO admin VALUES (:id, :name, :first_name, :pseudo, :email, :password)');
            $req->execute([
                'id' => $admin->getId(),
                'name' => $admin->getName(),
                'first_name' => $admin->getFirstName(),
                'pseudo' => $admin->getPseudo(),
                'email' => $admin->getEmail(),
                'password' => $admin->getPassword()
            ]);
            return true;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    public function update($admin)
    {
        try {
            $req = $this->pdo->prepare('UPDATE admin SET name = :name, first_name = :first_name, pseudo = :pseudo, email = :email WHERE id = :id');
            $req->execute([
                'id' => $admin->getId(),
                'name' => $admin->getName(),
                'first_name' => $admin->getFirstName(),
                'pseudo' => $admin->getPseudo(),
                'email' => $admin->getEmail()
            ]);
            return true;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    public function existingPseudo($pseudo)
    {
        try {
            $req = $this->pdo->prepare('SELECT pseudo FROM admin WHERE (pseudo = :pseudo)');
            $req->execute([
               'pseudo' => $pseudo
            ]);
            $result = $req->fetchAll();
            return $result;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }
}
