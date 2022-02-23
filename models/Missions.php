<?php

require_once('models/Model.php');

class Missions
{
    use Model;

    public function getMissionPerPage () {
        $missionsPerPage = 2;
        
        return $missionsPerPage;
    }

    public function getPagesNumber () { 
        $missionsPerPage = $this->getMissionPerPage ();
        $number_total = $this->pdo->query('SELECT COUNT(*) AS totalMissions FROM missions');
        $missions_total = $number_total->fetch(PDO::FETCH_ASSOC);
        $pagesNumber = ceil($missions_total['totalMissions']/$missionsPerPage); 

        return $pagesNumber;
    }

    public function getCurrentPage () {
        if(isset($_GET['action']) && !empty($_GET['action'])){
            $currentPage = (int) strip_tags($_GET['action']);
        }else{
            $currentPage = 1;
        }
        return $currentPage;
    }

    public function getMissionsList ()
    {
        
        $currentPage = $this->getCurrentPage ();
        $missionsPerPage = $this->getMissionPerPage ();

        $offset = ($currentPage - 1) * $missionsPerPage;
        $stmt = $this->pdo->query('SELECT * FROM missions LIMIT ' . $offset . "," . $missionsPerPage);
        $missions = [];
        while ($mission = $stmt->fetchObject('Mission')) {
            $missions[] = $mission;
        }
        return $missions;
    }
}