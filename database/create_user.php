<?php

$pdo = new PDO('mysql:host=localhost;dbname=kgb', 'kgbuser', 'naqTXmEKwWmZ779&');
$statement = $pdo->prepare('INSERT INTO users(right_id, firstname, lastname, email, password, creation_date) 
    VALUES (:right_id, :firstname, :lastname, :email, :password, :creation_date)');
$statement->bindValue(':right_id', '1');
$statement->bindValue(':firstname', 'Annie');
$statement->bindValue(':lastname', 'DOU');
$statement->bindValue(':email', 'annie.dous@kgb.fr');
$statement->bindValue(':creation_date', '2022-02-12');


// Password hash using BCRYPT
$statement->bindValue(':password', password_hash('naq552&', PASSWORD_BCRYPT));
if ($statement->execute()) {
    echo 'L\'utilisateur a bien été créé';
} else {
    echo 'Impossible de créer l\'utilisateur';
};