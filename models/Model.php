<?php

trait Model
{
    private $pdo = null;

    public function __construct()
    {
        //heroku
        if (getenv('JAWSDB_URL') !== false) {
            $url = getenv('JAWSDB_URL');
            $dbparts = parse_url($url);
            
            $hostname = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $database = ltrim($dbparts['path'],'/');

          //local  
          } else {
                $hostname = 'localhost';
                $username = 'kgbuser';
                $password = '2hvhDhnDSO-[PS6Q';
                $database = 'kgb';
        } 

        try {
            $this->pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            //$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $PDOException) {
            echo 'Impossible de se connecter à la base de donnée';
            exit('Erreur : '.$PDOException->getMessage());
        }
    }
}