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


        $todo = new TodoWeb();
        //if (SessionHelpers::isLogin()){
            Route::Add('/todo/liste', [$todo, 'liste']);
            Route::Add('/todo/ajouter', [$todo, 'ajouter']);
            Route::Add('/todo/terminer', [$todo, 'terminer']);
            Route::Add('/todo/supprimer/{id}', [$todo, 'supprimer']);
            Route::Add('/todo/create', [$todo, 'create']);
        //}
        //$connect = new verifConn(); !!!! pq quand je rajoute ça c'est bug
        $test = new verifConn();
        Route::Add('/login/home', [$test, 'login']);
        Route::Add('/login/create', [$test, 'create']);

        Route::Add('/sample/{id}', [$todo, 'sample']);
        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}

