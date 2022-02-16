<?php

require_once('models/Model.php');

class Missions
{
    use Model;
  
    public function getMissionsList ()
    {
        $stmt = $this->pdo->query('SELECT * FROM missions');
        $missions = [];
        while ($mission = $stmt->fetchObject('Mission')) {
            $missions[] = $mission;
        }

        return $missions;
    }
}