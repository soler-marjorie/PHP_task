<?php

//Activer la session
session_start();

//Import des ressources communes
include './env.php';
include './utils/utils.php';

include './Interface/InterfaceView.php';
include './Interface/InterfaceBdd.php';
include './utils/MySqlBdd.php';

include './Abstract/AbstractController.php';
include './Abstract/AbstractModel.php';
include './Model/ModelAccount.php';

include './Controller/AccountController.php';




include './View/ViewHeader.php';
include './View/ViewFooter.php';
include './View/ViewAccount.php';
include './View/viewMyAccount.php';


$home = new AccountController(['accountModel'=>new ModelAccount(new MySQLBDD())], ['header'=>new Header(),'footer'=> new Footer(), 'accueil' => new Account()]);
$home->render();