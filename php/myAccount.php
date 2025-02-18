<?php
//Activation de la session
session_start();

//Import des ressources
include './controller/myAccountcontroller.php';
include './controller/headerController.php';

//lancer le rendu de la page
renderHeader();
renderMyAccount();
include './vue/footer.php';