<?php
function renderHeader(){
    $nav = '';
    if(!isset($_SESSION['id'])){
        $nav = '<a href="myAccount.php">Mon compte</a>
            <a href="deco.php">Déconnexion</a>';
    }
    include './vue/layout/header.php';
}