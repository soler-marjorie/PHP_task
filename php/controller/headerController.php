<?php
function renderHeader(){
    $nav = '';
    if(isset($_SESSION['id'])){
       $nav='<a href="/moncompte">Mon Compte</a>
            <a href="/deconnexion">Se Déconnecter</a>';
    }
    include './vue/header.php';
}