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

    public function loginn(string $login , string $password)
    {
        strip_tags($login);
        strip_tags($password);
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateurs WHERE login = ? LIMIT 1');
        $stmt->execute([$login]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (password_verify($password, $result['password'])) {
            return $result;
        } else {
            return null;
        }
    }

    function VerifLogin(mixed $login)
    {
        strip_tags($login);
        $stmt = $this->pdo->prepare("SELECT `login` FROM utilisateurs WHERE `login` = ?");
        $stmt->execute([$login]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($result){ 
            return true;
        }else return false;
    }

    function create(mixed $login, mixed $password, mixed $mail)
    {
        strip_tags($login);
        strip_tags($password);
        $stmt = $this->pdo->prepare("INSERT INTO utilisateurs VALUES(null, ?, ?, ?)");
        $stmt->execute([$login, password_hash($password, PASSWORD_BCRYPT),$mail]);;      
    }
}    