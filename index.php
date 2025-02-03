<?php

//include './vendor/autoload.php';
include './env.php';
include './utils/connexion.php';
include './utils/utils.php';

include 'controller/categorieController.php';
include 'controller/accountController.php';
$bdd = connexion();

include './vue/header.php';
ajouterCategory($bdd);
renderAccounts($bdd);

include './vue/footer.php';

