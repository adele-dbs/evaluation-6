<?php

class Missions
{
    private $pdo;

    public function __construct()
    {
        try {
          $this->pdo = new PDO('mysql:host=localhost;dbname=kgb;charset=utf8', 'root', '');
        } catch (PDOException $e) {
          exit('Erreur : '.$e->getMessage());
        }
    }

    public function getMissionsList ()
    {
        $stmt = $this->pdo->query('SELECT * FROM missions');
        $missions = [];
        while ($mission = $stmt->fetchObject()) {
            $missions[] = $mission;
        }

        return $missions;
    }

    public function getMissionsDetail (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM missions WHERE id = ?');
        $mission = null;
        if ($stmt->execute([$id])) {
          $mission = $stmt->fetchObject();
          if(!is_object($mission)) {
              $mission = null;
          }

        return $mission;
        }
    }
}