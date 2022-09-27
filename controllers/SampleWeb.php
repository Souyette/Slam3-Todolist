<?php

namespace controllers;

use controllers\base\Web;
use utils\Template;

class SampleWeb extends Web
{
    function home()
    {
        Template::render("views/global/home.php", array("date" => date("d-m-Y à H:i")));
    }

    function about()
    {
        Template::render("views/global/about.php" , array("titre" => "À Propos", "dateDuJour" => date("d-m-y")));
    }

    function login()
    {
        Template::render("views/global/connexion.php" , array());
    }
    
    function create($login = "", $password = "")
    {

        if ($login = "" && $password= "")
        {
            $this->redirect("/login");
        }
            // Création de l'équipe
        else $equipe = $this->verifConn->create($login, $password);
        $this->redirect("./login");
    }

}