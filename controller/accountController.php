<?php

include 'model/account.php';



/**
 * @method Inscription d'un utilisateur dans la base de données
 * @param PDO $bdd Instance de la base de données
 * @return string Message de statut pour l'utilisateur
 */
function inscription(PDO $bdd): void {
    if (isset($_POST["submit"])) {
        if (!empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            
            // Nettoyage des entrées
            $lastname = strip_tags($_POST['lastname']);
            $firstname = strip_tags($_POST['firstname']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            // Vérification de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "L'adresse mail est incorrecte.";
            } else {
                // Vérification si l'email existe déjà en BDD
                $query = $bdd->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
                $query->execute(['email' => $email]);
                if ($query->fetchColumn() > 0) {
                    $message = "Un compte avec cette adresse email existe déjà.";
                } else {
                    // Hashage du mot de passe et insertion en BDD
                    //BCRYPT très bien si antèrieur à php 7.2, mais moins performant	
                    //Argon2 si besoin de plus de sécurité et de performance
                    $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
                    $insertQuery = $bdd->prepare("INSERT INTO users (lastname, firstname, email, password) VALUES (:lastname, :firstname, :email, :password)");
                    $insertQuery->execute([
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'email' => $email,
                        'password' => $hashedPassword
                    ]);

                    $message = "Compte créé avec succès !";
                }
            }
        } else {
            $message = "Tous les champs doivent être remplis.";
        }
    }
}

/**
 * @method Récupérer tous les utilisateurs de la BDD
 * @param PDO $bdd Instance de la base de données
 * @return array Liste des utilisateurs
 */
// Fonction pour récupérer tous les utilisateurs
function getAllUsers(PDO $bdd) {
    $query = $bdd->query("SELECT id, lastname, firstname, email FROM users ORDER BY lastname ASC");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Récupération des utilisateurs
$users = getAllUsers($bdd);

