<?php

namespace routes;

use routes\base\Route;
use controllers\Account;
use controllers\TodoWeb;
use controllers\VideoWeb;
use controllers\verifConn;
use utils\SessionHelpers;
use controllers\SampleWeb;

class Web
{
    function __construct()
    {
        $main = new SampleWeb();

        Route::Add('/', [$main, 'home']);
        Route::Add('/about', [$main, 'about']);

        $conn = new verifConn();
        Route::Add('/login/home', [$conn, 'home']);
        Route::Add('/login/create', [$conn, 'create']);
        Route::Add('/login/loginn', [$conn, 'login']);
        Route::Add('/logout', [$conn, 'logout']);
        Route::Add('/login/inscrire', [$conn, 'inscrire']);

        

        $todo = new TodoWeb();
        if (SessionHelpers::isLogin()){
            Route::Add('/todo/liste', [$todo, 'liste']);
            Route::Add('/todo/listeUser', [$todo, 'listeUser']);
            Route::Add('/todo/ajouter', [$todo, 'ajouter']);
            Route::Add('/todo/terminer', [$todo, 'terminer']);
            Route::Add('/todo/supprimer', [$todo, 'supprimer']);
            Route::Add('/todo/create', [$todo, 'create']);
            Route::Add('/sample/{id}', [$todo, 'sample']);
        }


       
        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}

