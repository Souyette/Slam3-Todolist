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
    function ajouterTodo($texte)
    {
        $stmt = $this->pdo->prepare("INSERT INTO todos (texte) VALUES (?)");
        $stmt->execute([$texte]);
    }

    function supprimer($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = ?;");
        $stmt->execute([$id]);
    }
}