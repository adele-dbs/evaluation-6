<?php

trait Model
{
    private $pdo = null;

    public function __construct()
    {
        if (getenv('JAWSDB_URL') !== false) {
            $url = getenv('JAWSDB_URL');
            $dbparts = parse_url($url);
            
            $hostname = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $database = ltrim($dbparts['path'],'/');
            
          } else {
                $hostname = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'kgb';
        } 

        try {
            $this->pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit('Erreur : '.$e->getMessage());
        }
    }
}