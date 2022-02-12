<?php

$pdo = new PDO('mysql:host=localhost;dbname=kgb', 'root', '');
$statement = $pdo->prepare('INSERT INTO users(right_id, firstname, lastname, email, password, creation_date) VALUES (:right_id, :firstname, :lastname, :email, :password, :creation_date)');
$statement->bindValue(':right_id', '1');
$statement->bindValue(':firstname', 'Anne');
$statement->bindValue(':lastname', 'DO');
$statement->bindValue(':email', 'anne.do@kgb.fr');
$statement->bindValue(':creation_date', '2022-02-12');


// Password hash using BCRYPT
$statement->bindValue(':password', password_hash('W&0dPa$$', PASSWORD_BCRYPT));
if ($statement->execute()) {
    echo 'L\'utilisateur a bien été créé';
} else {
    echo 'Impossible de créer l\'utilisateur';
};