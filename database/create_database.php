<?php

try {
    // Creation of the database
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    if ($pdo->exec('CREATE DATABASE kgb') !== false) {
        echo 'Base de données créée';
    } else {
        echo 'Une erreur est survenue';
    }
} catch (PDOException $PDOException) {
    echo 'Impossible de se connecter à la base de données';
}