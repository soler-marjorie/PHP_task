<?php

//Activer la session
session_start();

//Import des ressources communes
include './env.php';
include './utils/utils.php';

include './Interface/InterfaceView.php';

include './Abstract/AbstractController.php';

include './View/ViewHeader.php';
include './View/ViewFooter.php';


//Récupérer l'url demander par l'utilisateur
$url = parse_url($_SERVER['REQUEST_URI']);

//Récuperer le path demander par l'utilisateur
$path = isset($url['path']) ? $url['path'] : '/';

//Mettre en place des routes
switch($path){
    case'/projet/task/PHP-POO/':
        //Import des ressourrces spécifiques     
        include './Interface/InterfaceBdd.php';
        include './Abstract/AbstractModel.php';
        include './View/ViewAccount.php';
        include './Model/ModelAccount.php';
        include './utils/MySqlBdd.php';
        include './Controller/AccountController.php';
        $home = new AccountController(['accountModel'=>new ModelAccount(new MySQLBDD())], ['header'=>new Header(),'footer'=> new Footer(), 'accueil' => new Account()]);
        $home->render();
        break;
    case '/projet/task/PHP-POO/moncompte':
        include './View/viewMyAccount.php';
        include './Controller/MyAccountController.php';
        $myAccount = new MyAccountController(null, ['header'=>new Header(), 'footer'=>new Footer(), 'moncompte'=>new MyAccount()]);
        break;
    case '/projet/task/PHP-POO/deconnexion':
        include './View/ViewDeco.php';
        include './Controller/DecoController.php';
        $deco = new DecoController(null,null);
        $deco->render();
        break;
    
    default:
        include './View/ViewError.php';
        include './Controller/ErrorController.php';
        
        $error = new ErrorController(['accountModel'=>new ModelAccount(new MySQLBDD())], ['header'=>new Header(),'footer'=> new Footer(), 'accueil' => new Account()]);
}

