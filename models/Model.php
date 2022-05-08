<?php

trait Model
{
    private $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        } catch (PDOException $e) {
            exit('Erreur : '.$e->getMessage());
        }
    }
}