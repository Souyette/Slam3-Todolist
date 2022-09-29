<?php
namespace controllers;

use models\VerifC;
use utils\Template;
use controllers\base\Web;
use utils\SessionHelpers;

class verifConn extends Web
{
    private $verifC;

    function __construct(){
       $this->verifC = new VerifC();
    }

    function home()
    {
        Template::render("views/global/connexion.php" , array());
    }

    function create($login = "", $password = "",$mail = "")
    {
        echo 'hello';
        $this->verifC->create($login, $password,$mail);
        $this->redirect("/login/home");
    }

    function login($login = "" , $password = "")
    {
        if (SessionHelpers::isLogin()) {
            $this->redirect("/");
        }

        $erreur = "";
        if (!empty($login)) {
            $verificationLogin = new \models\VerifC();

            $Verif = $verificationLogin->loginn($login,$password);
            if ($Verif != null) {
                SessionHelpers::login($Verif);
     
                $this->redirect("../todo/listeUser");
            } else {
                SessionHelpers::logout();
                $erreur = "Connexion impossible avec vos identifiants";
            }
        }

        return Template::render("views/global/connexion.php", array("erreur" => $erreur,"login" => 'toto'));
    }

    
    function logout(): void
    {
        SessionHelpers::logout();
        $this->redirect("../login/home");
    }

    function inscrire(): void
    {
        Template::render("views/global/inscription.php", array());
    }
}    