<?php
namespace controllers;

use utils\Template;
use models\VerifC;
use controllers\base\Web;

class verifConn extends Web
{
    private $verifC;

    function __construct(){
       $this->verifC = new VerifC();
    }

    function login()
    {
        Template::render("views/global/connexion.php" , array());
    }

    function create($login = "", $password = "")
    {
        $equipe = $this->verifC->create($login, $password);
        $this->redirect("/login/home");
    }
    
    

    

}    