<?php
include './model/account.php';


/**
*@method Créer un nouveau compte utilisateur
*@param PDO $bdd
*@return string
*/
function signUp(PDO $bdd):string{
    //Vérifier qu'on reçoit le formulaire
    if(isset($_POST['submitSignUp'])){
        //Vérifier les champs vide
        if(empty($_POST['lastname']) || empty($_POST['firstname']) || empty($_POST['email']) || empty($_POST['password'])){
            //Retourne le message d'erreur
            return "Veuillez remplir les champs !";
        }

        //Vérifier le format des données : ici l'email
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //Retourne le message d'erreur
            return "Email pas au bon format !";
        }

        //Nettoyer les données
        $lastname = sanitize($_POST['lastname']);
        $firstname = sanitize($_POST['firstname']);
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);

        //Hasher le mot de passe
        $password = password_hash($password, PASSWORD_BCRYPT);

        //Vérifier que l'utilisateur n'existe pas déjà en bdd
        if(!empty(getAccountByEmail($bdd, $email))){
            //Retourne le message d'erreur
            return "Cet email existe déjà !";
        }

        //J'enregistre mon utilisateur en bdd
        $account = [$firstname, $lastname, $email, $password];
        addAccount($bdd, $account);
    
        return "$firstname $lastname a été enregistré avec succès !";
    }
    return '';
}

/**
*@method Affiche la liste des utilisateurs
*@param PDO $bdd
*@return string
*/
function displayAccounts(PDO $bdd){
    //Récupération de la liste des utilisateurs
    $data = getAllAccount($bdd);

    $listUsers = "";
    foreach($data as $account){
        $listUsers = $listUsers."<li><h2>".$account['firstname'] ." ". $account['lastname']."</h2>      <p>".$account['email']."</p></li>";
    }
    return $listUsers;
}

function signIn(PDO $bdd){
    if(isset($_POST['submitSignIn'])){
        //Vérifie leschamps vides
        if(empty($_POST['emailSignIn']) || empty($_POST['passwordSignIn']) ){
            return 'Veuillez remplir tous les champs';
        }

        //Vérifier le format des données : le mail
        if(!filter_var($_POST['emailSignIn'],FILTER_VALIDATE_EMAIL)){
            //Retourne le message d'erreur
            return "Email pas au bon format !";
        }

        //Nettoyage des données
        $email = $_POST['emailSignIn'];
        $password = $_POST['passwordSignIn'];

        //Récupération des données de l'utilisateur
        $data = getAccountByEmail($bdd, $email);

        //Vérifie que mon utilisateur existe ($data n'est pas vide)
        if(empty($data)){
            //message d'erreur
            return 'Email et/ou Mot de Passe incorrect !';
        }

        //Vérifie la correspondance des mots de passe
        if(!password_verify($password, $data['password'])){
            //message d'erreur
            return 'Email et/ou Mot de Passe incorrect !';
        }

        $_SESSION['id'] = $data['id_account'];
        $_SESSION['firstname']= $data['firstname'];
        $_SESSION['lastname']= $data['lastname'];
        $_SESSION['email']= $data['email'];

        header('location:index.php');
        exit;

        return $_SESSION['firstname']. " ".$_SESSION['lastname']." est connecté !";
    }
    return '';
}

function displayForm($message,$messageSignIn){
    if(!isset($_SESSION['id'])){
        return '
        <section>
            <h1>Inscription</h1>
            <form action="" method="post">
                <input type="text" name="lastname" placeholder="Le Nom de Famille">
                <input type="text" name="firstname" placeholder="Le Prénom">
                <input type="text" name="email" placeholder="L\'Email">
                <input type="password" name="password" placeholder="Le Mot de Passe">
                <input type="submit" name="submitSignUp">
            </form>
            <p>'. $message .'</p>
        </section>
        <section>
            <h1>Connexion</h1>
            <form action="" method="post">
                <input type="text" name="emailSignIn" placeholder="L\'Email">
                <input type="password" name="passwordSignIn" placeholder="Le Mot de Passe">
                <input type="submit" name="submitSignIn">
            </form>
            <p>'.$messageSignIn.'</p>
        </section>';
    }
    return '';
}

/**
*@method Fait le rendu de l'affichage après traitement des données
*@param PDO $bdd
*@return void
*/
function renderAccounts(PDO $bdd){
    $message = signUp($bdd);
    $messageSignIn=signIn($bdd);
    $listUsers = displayAccounts($bdd);
    $form = displayForm($message,$messageSignIn);
    include "./vue/account.php";
}