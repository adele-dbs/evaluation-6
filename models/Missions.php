<?php

require_once('models/Model.php');


class Missions 
{
    use Model;

    public function getMissionPerPage () 
    {
        $missionsPerPage = 2;
        
        return $missionsPerPage;
    }

    public function getPagesNumber () 
    { 
        $missionsPerPage = $this->getMissionPerPage ();
        $number_total = $this->pdo->query('SELECT COUNT(*) AS totalMissions FROM missions');
        $missions_total = $number_total->fetch(PDO::FETCH_ASSOC);
        $pagesNumber = ceil($missions_total['totalMissions']/$missionsPerPage); 

        return $pagesNumber;
    }

    public function getCurrentPage () 
    {
        if(isset($_GET['action']) && !empty($_GET['action'])){
            $currentPage = (int) strip_tags($_GET['action']);
        } else {
            $currentPage = 1;
        }
        return $currentPage;
    }

    public function getOrderChoice () 
    {
        if (isset($_POST["choice"])){
            $order = ($_POST["choice"]);
        } elseif (isset($_GET["order"]) && !empty($_GET["order"])){
            $order = (string) strip_tags($_GET["order"]);
        } else {
            $order ="ASC";
        }
        return $order;
    }

    public function getMissionsList ()
    {
        $order = $this->getOrderChoice();
        $currentPage = $this->getCurrentPage ();
        $missionsPerPage = $this->getMissionPerPage ();

        $offset = ($currentPage - 1) * $missionsPerPage;
        $stmt = $this->pdo->query('SELECT * FROM missions ORDER BY name '. $order .' LIMIT ' . $offset . "," . $missionsPerPage);
        $missions = [];
        while ($mission = $stmt->fetchObject('Mission')) {
            $missions[] = $mission;
        }
        return $missions;
    }

    public function getSearchMissions()
    {
        $missionSearch = $this->pdo->query('SELECT name FROM missions ORDER BY id DESC');
        if(isset($_GET['search']) AND !empty($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $missionSearch = $this->pdo->query('SELECT name FROM missions WHERE name LIKE "%'.$search.'%" ORDER BY id DESC');
        if($missionSearch->rowCount() == 0) {
            $missionSearch = $this->pdo->query('SELECT name FROM missions WHERE CONCAT(name, name_code) LIKE "%'.$search.'%" ORDER BY id DESC');
            }
        }
        return $missionSearch;
    }	
}