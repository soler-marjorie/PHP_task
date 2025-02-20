<?php

function lireUtilisateursByPseudo($bdd, $pseudo){
    $req = $bdd->prepare('SELECT id, pseudo, email, mdp FROM utilisateurs WHERE pseudo = ?');
    $req->bindParam(1,$pseudo,PDO::PARAM_STR);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function lireUtilisateursByMail($bdd, $mail){
    $req = $bdd->prepare('SELECT id, pseudo, email, mdp FROM utilisateurs WHERE email = ?');
    $req->bindParam(1,$mail,PDO::PARAM_STR);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function enregistrerUtilisateur($bdd, $pseudo, $email, $mdp){
    $req = $bdd->prepare('INSERT INTO utilisateurs (pseudo, email, mdp) VALUES (?,?,?)');

    //On bind le reste des champs obligatoires
    $req->bindParam(1,$pseudo,PDO::PARAM_STR);
    $req->bindParam(2,$email,PDO::PARAM_STR); 
    $req->bindParam(3,$mdp,PDO::PARAM_STR);

    //Execution de la requête, si tout se passe bien, on renvoie true. Sinon, on renvoie false
    if($req->execute()){
        return true;
    }
    return false;
}