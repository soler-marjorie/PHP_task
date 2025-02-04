<?php
function renderMyAccount(){
    //Vérifier si l'utilisateur est connecté
    if(!isset($_SESSION['id'])){
        header('location:index.php');
        exit;
    }
    include './vue/viewMyAccount.php';
}