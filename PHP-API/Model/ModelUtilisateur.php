<?php
//Récupère la liste des utilisateurs en BDD
function lireUtilisateurs($bdd){
    $req = $bdd->prepare('SELECT id, pseudo, email, mdp FROM utilisateurs');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
