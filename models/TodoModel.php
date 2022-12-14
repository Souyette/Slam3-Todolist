<?php
namespace models;

use PDO;
use models\base\SQL;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }

    function GetListUser($id){
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE id_utilisateur = ?;");
        $stmt->execute([$id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    function marquerCommeTermine($id){
        $stmt = $this->pdo->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    function todoNonTermine()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE termine = 0;");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    function ajouterTodo($id,$texte)
    {
        $stmt = $this->pdo->prepare("INSERT INTO todos (id_utilisateur,texte) VALUES (?,?)");
        $stmt->execute([$id,$texte]);
    }

    function supprimer($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = ?;");
        $stmt->execute([$id]);
    }

    function create(mixed $login, mixed $password)//Pour crée un utilisateurs(je sais quel n'a rien à faire ici)
    {
        $stmt = $this->pdo->prepare("INSERT INTO utilisateurs VALUES(null, ?, ?)");
        $stmt->execute([$login, password_hash($password, PASSWORD_BCRYPT)]);      
    }
  
}