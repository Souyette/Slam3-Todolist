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

    function login()
    {
        Template::render("views/global/connexion.php" , array());
    }

    function create($login = "", $password = "",$mail = "")
    {
        echo 'hello';
        $equipe = $this->verifC->create($login, $password,$mail);
        $this->redirect("/login/home");
    }

    function loginn($login = "")
    {
        if (SessionHelpers::isLogin()) {
            $this->redirect("/");
        }

        $erreur = "";
        if (!empty($login)) {
            $verificationLogin = new \models\VerifC();

            $Verif = $verificationLogin->loginn($login);
            if ($Verif != null) {
                SessionHelpers::login($Verif);
                // Template::render("views/common/header.php", array("login" => $login));
                $this->redirect("../todo/liste");
            } else {
                SessionHelpers::logout();
                $erreur = "Connexion impossible avec vos identifiants";
            }
        }

        return Template::render("views/global/connexion.php", array("erreur" => $erreur));
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