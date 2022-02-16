<?php

require_once('models/Mission.php');
require_once('models/Missions.php');

class Controller
{
    public function listMissions()
    {
      $missions = new Missions();
      $missions = $missions->listMissions();
      require_once('views/list-missions.php');
    }

    public function showMission()
   {
      $mission = new Mission();
      if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $mission = $mission->showMission($_GET['id']);
      }
      require_once('vues/detail-mission.php');
   }
}
