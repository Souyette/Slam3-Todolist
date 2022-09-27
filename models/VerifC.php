<?php
namespace models;

use PDO;
use models\base\SQL;

class VerifC extends SQL
{
    public function __construct()
    {
        parent::__construct('utilisateurs', 'ID');
    }

    public function loginn(string $login, string $password)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateurs WHERE login = ? LIMIT 1');
        $stmt->execute([$login]);
        $loginName = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (password_verify($password, $loginName['password'])) {
            return $loginName;
        } else {
            return null;
        }
    }

    function create(mixed $login, mixed $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO utilisateurs VALUES(null, ?, ?)");
        $result = $stmt->execute([$login, password_hash($password, PASSWORD_BCRYPT)]);;      
    }
}    