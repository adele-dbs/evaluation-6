<?php

trait Model
{
    private $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=kgb;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            exit('Erreur : '.$e->getMessage());
        }
    }
}