<?php

//Activer la session
session_start();

//Import des ressources communes
include './.env';
include './utils/MySqlBdd.php';
include './utils/utils.php';

include './Interface/InterfaceView.php';

include './Abstract/AbstractController.php';
include './Controller/AccountController.php';

include './View/ViewHeader.php';
include './View/ViewFooter.php';
include './View/ViewAccount.php';

$home = new AccountController(null, ['header'=>new Header(),'footer'=> new Footer()]);
$home->render();