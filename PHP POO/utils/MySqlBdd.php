<?php

/**
 * @return PDO
 */
function connexion(): PDO
{
    return new PDO(
        dsn: 'mysql:host=' . 'localhost' . ';dbname=' . 'task',
        username: 'root',
        password: "",
        options: [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}


