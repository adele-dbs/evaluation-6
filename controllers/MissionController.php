<?php

require_once 'models/Missions.php';
require_once 'models/Mission.php';

class MissionController
{
    
  private Missions $missionsObject;
  private Mission $missionObject;

  public function __construct()
  {
    $this->missionsObject = new Missions();
    $this->missionObject = new Mission();
  }
  
  public function home()
  {
    require_once 'views/home.php';
  }

  public function listMissions()
    {
      $missions = $this->missionsObject->getMissionsList();
      require_once 'views/list-missions.php';
    }

    public function showMission()
   {  
      $mission = null;
      if (isset($_GET['id']) && is_numeric($_GET['id'])) {
          $mission = $this->missionObject->getMissionsDetail(($_GET['id']));
      }
    require_once 'views/detail-mission.php';
   }
}
