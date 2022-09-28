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
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        var_dump($login);
        if (password_verify($password, $result['password'])) {
            return $result;
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