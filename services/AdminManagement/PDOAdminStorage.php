<?php


namespace services\AdminManagement;

class PDOAdminStorage
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchSingleAdmin($id)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM admin WHERE id = :id');
            $req->execute(array('id' => $id));
            $adminArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }

        if (!$adminArray) {
            return null;
        }
        return $adminArray;
    }
}
