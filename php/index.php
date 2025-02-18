<?php
//Activer la session
session_start();

//Import des ressources communes
//include './vendor/autoload.php';
include './env.php';
include './utils/connexion.php';
include './utils/utils.php';
include './controller/headerController.php';

//Parse l'url entrée
$url = parse_url($_SERVER['REQUEST_URI']);

//Je récupère le path s'il y en a un, sinon je récupère la racine
$path = isset($url['path']) ? $url['path'] : '/';

//Je crée le ROUTER
switch($path){
    case '/' :
        include 'controller/categorieController.php';
        include 'controller/accountController.php';
        $bdd = connexion();
        renderHeader();
        ajouterCategory($bdd);
        renderAccounts($bdd);
        break;
    
    case '/moncompte' :
        include './controller/myAccountcontroller.php';
        renderHeader();
        renderMyAccount();
        break ;
    
    case '/deconnexion' :
        include './controller/decoController.php';
        break;
    
    default :
        include './controller/errorController.php';
        renderHeader();
        renderError();

}

include './vue/footer.php';

