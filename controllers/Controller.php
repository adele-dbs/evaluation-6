<?php

require_once 'models/Missions.php';
require_once 'models/Mission.php';
require_once 'models/User.php';
require_once 'models/Status.php';
require_once 'models/Type.php';
//require_once 'models/Types.php';
require_once 'models/Particularity.php';
require_once 'models/Particularities.php';
require_once 'models/Contact.php';
require_once 'models/Contacts.php';
require_once 'models/MissionContacts.php';
require_once 'models/MissionContact.php';
require_once 'models/Hideout.php';
//require_once 'models/Hideouts.php';
require_once 'models/MissionHideouts.php';
require_once 'models/MissionHideout.php';
require_once 'models/Target.php';
require_once 'models/Targets.php';
require_once 'models/Agent.php';
require_once 'models/Agents.php';

class Controller
{
    
  private Missions $missionsObject;
  private Mission $missionObject;
  private User $userObject;
  private Status $statusObject;
  private Type $typeObject;
  //private Types $typesObject;
  private Particularity $particularityObject;
  private Particularities $particularitiesObject;
  private Contact $contactObject;
  private Contacts $contactsObject;
  private MissionContacts $missionContactsObject;
  private MissionContact $missionContactObject;
  private Hideout $hideoutObject;
  //private Hideouts $hideoutsObject;
  private MissionHideouts $missionHideoutsObject;
  private MissionHideout $missionHideoutObject;
  private Target $targetObject;
  private Targets $targetsObject;
  private Agent $agentObject;
  private Agents $agentsObject;

  public function __construct()
  {
    $this->missionsObject = new Missions();
    $this->missionObject = new Mission();
    $this->userObject = new User();
    $this->statusObject = new Status();
    $this->typeObject = new Type();
    //$this->typesObject = new Types();
    $this->particularityObject = new Particularity();
    $this->particularitiesObject = new Particularities();
    $this->contactObject = new Contact();
    $this->contactsObject = new Contacts();
    $this->missionContactObject = new MissionContact();
    $this->missionContactsObject = new MissionContacts();
    $this->hideoutObject = new Hideout();
    //$this->hideoutsObject = new Hideouts();
    $this->missionHideoutObject = new MissionHideout();
    $this->missionHideoutsObject = new MissionHideouts();
    $this->targetObject = new Target();
    $this->targetsObject = new Targets();
    $this->agentObject = new Agent();
    $this->agentsObject = new Agents();
  }
  
  public function home()
  {
    require_once 'views/home.php';
  }

  public function listMissions()
    {
      if(isset($_POST['searchmission'])){
        $missionsFound = $this->missionsObject->getMissionsSearchList(($_POST['searchmission']));
      }
      $order = $this->missionsObject->getOrderChoice();
      $missionsPerPage = $this->missionsObject->getMissionPerPage();
      $pagesNumber = $this->missionsObject->getPagesNumber();
      $currentPage = $this->missionsObject->getCurrentPage();
      //$missionsSearch = $this->missionsObject->getSearchMissions();
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
      $status = $this->statusObject->getStatus($mission->getStatusId());
      $type = $this->typeObject->getType($mission->getTypeId());
      $particularity = $this->particularityObject->getParticularity($mission->getParticularityId());
      $missionContacts = $this->missionContactsObject->getMissionContactList($mission->getMissionId());
      $missionHideouts = $this->missionHideoutsObject->getMissionHideoutList($mission->getMissionId());
      $targets = $this->targetsObject->getMissionTargetList($mission->getMissionId());
      $agents = $this->agentsObject->getMissionAgentList($mission->getMissionId());
    
    require_once 'views/detail-mission.php';
   }

   public function login()
   {
      session_start();
      if(isset($_POST['email']) && isset($_POST['password']))
      {
        $_SESSION['email'] = $_POST['email'];
        $user = $this->userObject->getLogin(($_POST['email']), ($_POST['password']));
      }
      require_once 'views/login.php';
    }

//mdp : p4$$w0rd : admin

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
    $missions = $this->missionsObject->getMissionsTable();
    
    require_once 'views/backend-missions.php';
   }

    public function backendMissions()
   {  
    session_start();
    if($_SESSION["autoriser"]!="oui"){
       header("location:?page=login");
    }
    $missions = $this->missionsObject->getMissionsTable();
    
    require_once 'views/backend-missions.php';
   }

   public function backendParticularities()
   {  
    session_start();
    if($_SESSION["autoriser"]!="oui"){
       header("location:?page=login");
    }
    if(isset($_POST['addname'])){
      $this->particularityObject->addParticularity(($_POST['addname']));
    }
    if(isset($_POST['delete'])){
        $this->particularityObject->deleteParticularity($_POST['delete']);
    }
    if(isset($_POST['updateid']) && isset($_POST['updatename'])){
      $this->particularityObject->updateParticularity($_POST['updateid'], $_POST['updatename']);
  }
    $particularities = $this->particularitiesObject->getParticularitiesTable();
    require_once 'views/backend-particularities.php';
    }

    public function backendTypes()
    {  
     session_start();
     if($_SESSION["autoriser"]!="oui"){
        header("location:?page=login");
     }
     if(isset($_POST['pname'])){
       $this->typeObject->addType(($_POST['pname']));
     }
     require_once 'views/backend-types.php';
     }
}