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

    public function login(string $login, string $password): array|null
    {
        $stmt = $this->getPdo()->prepare('SELECT * FROM utilisateurs WHERE login = ? LIMIT 1');
        $stmt->execute([$login]);
        $equipe = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (password_verify($password, $equipe['password'])) {
            return $equipe;
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