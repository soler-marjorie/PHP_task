<?php
//Activer la session
session_start();

include './env.php';
include './utils/connexion.php';
include './utils/utils.php';


$bdd = connexion();


//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';


/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
    // Routes pour la page d'accueil
    case '/' || 'Accueil';
        include './controller/headerController.php';
        include './controller/accountController.php';
        renderHeader();
        renderAccounts($bdd);
        break;

    // Route pour Mon Compte
    case '/moncompte':
        include './controller/myAccountController.php';
        renderMyAccount();
        break;

    // Route pour la déconnexion
    case '/deconnexion':
        include './controller/deconnexionController.php';
        break;

    // Page 404 si la route n'existe pas
    default:
        http_response_code(404);
        include './controller/erreur404Controller.php';
        break;
}
include './vue/footer.php';

// mettre en place la redirection à l'aide d'un switch :
//  + Accueil les route '/' et '/accueil'
//  + Mon Compte , route '/moncompte'
//  + Se Déconnecter, route '/deconnexion'
// Pour chaque route, include le bon controller, et faire en sorte que l'affichage se fasse correctement
// Ne pas oublier une route par défaut pour les Erreur 404
// 4) Créer le controller et la vue de la page Erreur 404