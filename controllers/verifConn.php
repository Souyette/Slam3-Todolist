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

    function create($login = "", $password = "",$password1 = "", $mail = "")
    {

        $loginInscrire = htmlspecialchars($login);
        $mailInscrire = htmlspecialchars($mail);
        $mdp1 = strip_tags($password);
        $mdp2 = strip_tags($password1);
        $verificationLogin = new \models\VerifC();
        $VerifLoginInscrire = $verificationLogin->VerifLogin($loginInscrire);
        if(!$VerifLoginInscrire){
            if ($mdp1 == $mdp2 && !empty($password) && !empty($password1))
            {          
                $this->verifC->create($login, $password,$mail);
                $this->redirect("/login/home");
            }
            else
            {
                $erreur = "Vos mots de passe ne sont pas identiques";
            }
        }else $erreur = "Un compte portant se nom éxiste déjà";
        Template::render("views/global/inscription.php" , array('erreur' => $erreur));    
    }

    function login($login = "" , $password = "")
    {
        
        $log = strip_tags($login);
        $mdp = strip_tags($password);
        if (SessionHelpers::isLogin()) {
            $this->redirect("/");
        }

        $erreur = "";
        if (!empty($log)) {
            $verificationLogin = new \models\VerifC();

            $Verif = $verificationLogin->loginn($log,$mdp);
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