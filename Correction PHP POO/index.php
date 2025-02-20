<?php
//FICHIER D'EXECUTION, DONC IMPORT DE TOUTES LES RESSOURCES
session_start();

//IMPORT DES RESSOURCES COMMUNES
include './env.php';
include './utils/utils.php';
include './interface/interfaceView.php';
include './abstract/abstractController.php';
include './view/viewHeader.php';
include './view/viewFooter.php';


//RECUPERER L'URL DEMANDE PAR L'UTILISATEUR
$url = parse_url($_SERVER['REQUEST_URI']);

//RECUPERER LE PATH DEMANDE PAR L'UTILISATEUR
$path = isset($url['path']) ? $url['path'] : '/';

//MISE EN PLACE DES ROUTES
switch($path){
    case '/' :
        //IMPORT DES RESSOURCES SPECIFIQUES
        include './interface/interfaceBDD.php';
        include './abstract/abstractModel.php';
        include './view/viewAccount.php';
        include './controller/accountController.php';
        include './utils/mySQLBDD.php';
        include './model/accountModel.php';

        $home = new AccountController(['accountModel'=>new AccountModel(new MySQLBDD())],['header'=>new ViewHeader(),'footer'=> new ViewFooter(), 'accueil' => new ViewAccount()]);
        $home->render();
        break;
    case '/categories' :
        include './interface/interfaceBDD.php';
        include './abstract/abstractModel.php';
        include './view/viewCategory.php';
        include './controller/categoryController.php';
        include './utils/mySQLBDD.php';
        include './model/categoryModel.php';

        $category = new CategoryController(['categoryModel' => new CategoryModel(new MySQLBDD())],['header'=>new ViewHeader(),'footer'=> new ViewFooter(), 'category' => new ViewCategory()]);
        $category->render();
        break;

    case '/moncompte' :
        include './view/viewMyAccount.php';
        include './controller/myAccountController.php';
        $myAccount = new MyAccountController(null,['header'=>new ViewHeader(),'footer'=> new ViewFooter(),'monCompte'=>new ViewMyAccount()]);
        $myAccount->render();
        break;
    case '/deconnexion' :
        include './controller/decoController.php';
        
        $deco = new DecoController(null,null);
        $deco->render();
        break;
    
    default :
        include './view/viewError.php';
        include './controller/errorController.php';

        $error = new ErrorController(null,['header'=>new ViewHeader(),'footer'=> new ViewFooter(),'erreur'=>new ViewError()]);
        $error->render();
}

