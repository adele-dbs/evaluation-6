<?php

require_once 'models/Missions.php';
require_once 'models/Mission.php';
require_once 'models/User.php';

class Controller
{
    
  private Missions $missionsObject;
  private Mission $missionObject;

  public function __construct()
  {
    $this->missionsObject = new Missions();
    $this->missionObject = new Mission();
    $this->userObject = new User();
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
      if (isset($_GET['id']) && is_numeric($_GET['id'])) 
      {
        $mission = $this->missionObject->getMissionsDetail(($_GET['id']));
      }
    require_once 'views/detail-mission.php';
   }

   public function login()
   {
    //mdp : p4$$w0rd
    session_start();
      if(isset($_POST['email']) && isset($_POST['password']))
      {
        $_SESSION['email'] = $_POST['email'];
        $user = $this->userObject->getLogin(($_POST['email']), ($_POST['password']));
      }  
    require_once 'views/login.php';
    }

    public function logout()
   {
      session_start();
      $_SESSION = [];
      session_destroy();
      header("location:?page=login");
      exit();
   } 

    public function backend()
   {  
    session_start();
    if($_SESSION["autoriser"]!="oui"){
       header("location:?page=login");
    }
    $bienvenue="Bonjour et bienvenue ".$_SESSION["email"]." dans votre espace personnel";
    require_once 'views/backend.php';
   }
}