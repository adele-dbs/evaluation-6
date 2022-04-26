<?php

require_once 'models/Missions.php';
require_once 'models/Mission.php';
require_once 'models/User.php';
require_once 'models/Status.php';
require_once 'models/Statuss.php';
require_once 'models/Type.php';
require_once 'models/Types.php';
require_once 'models/Particularity.php';
require_once 'models/Particularities.php';
require_once 'models/Contact.php';
require_once 'models/Contacts.php';
require_once 'models/MissionContacts.php';
require_once 'models/MissionContact.php';
require_once 'models/Hideout.php';
require_once 'models/Hideouts.php';
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
  private Statuss $statussObject;
  private Type $typeObject;
  private Types $typesObject;
  private Particularity $particularityObject;
  private Particularities $particularitiesObject;
  private Contact $contactObject;
  private Contacts $contactsObject;
  private MissionContacts $missionContactsObject;
  private MissionContact $missionContactObject;
  private Hideout $hideoutObject;
  private Hideouts $hideoutsObject;
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
    $this->statussObject = new Statuss();
    $this->typeObject = new Type();
    $this->typesObject = new Types();
    $this->particularityObject = new Particularity();
    $this->particularitiesObject = new Particularities();
    $this->contactObject = new Contact();
    $this->contactsObject = new Contacts();
    $this->missionContactObject = new MissionContact();
    $this->missionContactsObject = new MissionContacts();
    $this->hideoutObject = new Hideout();
    $this->hideoutsObject = new Hideouts();
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

    public function backendMissions()
   {  
    session_start();
    if($_SESSION["autoriser"]!="oui"){
       header("location:?page=login");
    }
    if(isset($_POST['addname']) 
      && isset($_POST['addstatus']) 
      && isset($_POST['addstartdate']) 
      && isset($_POST['addenddate']) 
      && isset($_POST['addcodename'])
      && isset($_POST['addcountry'])
      && isset($_POST['adddescription'])
      && isset($_POST['addtype'])
      && isset($_POST['addparticularity'])
      && isset($_POST['addcontact'])
      && isset($_POST['addhideout'])
      && isset($_POST['addagent'])
      && isset($_POST['addtarget'])){
      $this->missionObject->addMission(
        ($_POST['addname']), 
        ($_POST['addstatus']), 
        ($_POST['addstartdate']), 
        ($_POST['addenddate']), 
        ($_POST['addcodename']),
        ($_POST['addcountry']), 
        ($_POST['adddescription']),
        ($_POST['addtype']), 
        ($_POST['addparticularity']),
        ($_POST['addcontact']),
        ($_POST['addhideout']), 
        ($_POST['addagent']),
        ($_POST['addtarget']));
      //$this->missionObject->addMission(
       // ($_POST['addagent']),
       // ($_POST['addtarget']));
    }
    $statuss = $this->statussObject->getStatusList();
    $types = $this->typesObject->getTypesTable();
    $particularities = $this->particularitiesObject->getParticularitiesTable();
    $contacts = $this->contactsObject->getContactsTable();
    $hideouts = $this->hideoutsObject->getHideoutsTable();
    $agents = $this->agentsObject->getAgentsTable();
    $targets = $this->targetsObject->getTargetsTable();
    if(isset($_POST['delete'])){
        $this->missionObject->deleteMission($_POST['delete']);
    }
    if(isset($_POST['update'])){
      $mission = $this->missionObject->getMissionsDetail($_POST['update']);
    }
    if(isset($_POST['updatename']) 
      && isset($_POST['updatestatus']) 
      && isset($_POST['updatedescription']) 
      && isset($_POST['updatecodename']) 
      && isset($_POST['updatecountry']) 
      && isset($_POST['updatestartdate']) 
      && isset($_POST['updateenddate']) 
      && isset($_POST['updatetype']) 
      && isset($_POST['updateparticularity'])){
      $this->missionObject->updateMission(
        $_POST['updateid'], 
        $_POST['updatename'],
        $_POST['updatestatus'], 
        $_POST['updatedescription'], 
        $_POST['updatecodename'], 
        $_POST['updatecountry'], 
        $_POST['updatestartdate'],
        $_POST['updateenddate'],
        $_POST['updatetype'],
        $_POST['updateparticularity']);
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
     if(isset($_POST['addname'])){
      $this->typeObject->addType(($_POST['addname']));
    }
    if(isset($_POST['delete'])){
        $this->typeObject->deleteType($_POST['delete']);
    }
    if(isset($_POST['updateid']) && isset($_POST['updatename'])){
      $this->typeObject->updateType($_POST['updateid'], $_POST['updatename']);
    }
    $types = $this->typesObject->getTypesTable();
    require_once 'views/backend-types.php';
    }

    public function backendContacts()
    {  
      session_start();
      if($_SESSION["autoriser"]!="oui"){
          header("location:?page=login");
      }
      if(isset($_POST['addfirstname']) 
        && isset($_POST['addlastname']) 
        && isset($_POST['addbirthday']) 
        && isset($_POST['addcodename']) 
        && isset($_POST['addnationality'])){
        $this->contactObject->addContact(
          ($_POST['addfirstname']), 
          ($_POST['addlastname']), 
          ($_POST['addbirthday']), 
          ($_POST['addcodename']), 
          ($_POST['addnationality']));
      }
      if(isset($_POST['delete'])){
          $this->contactObject->deleteContact($_POST['delete']);
      }
      if(isset($_POST['update'])){
        $contact = $this->contactObject->getContactDetail($_POST['update']);
      }
      if(isset($_POST['updatefirstname']) 
        && isset($_POST['updatelastname']) 
        && isset($_POST['updatebirthday']) 
        && isset($_POST['updatecodename']) 
        && isset($_POST['updatenationality'])){
        $this->contactObject->updateContact(
          $_POST['updateid'], 
          $_POST['updatefirstname'], 
          $_POST['updatelastname'], 
          $_POST['updatebirthday'], 
          $_POST['updatecodename'],
          $_POST['updatenationality']);
      }
      $contacts = $this->contactsObject->getContactsTable();
      require_once 'views/backend-contacts.php';
    }

    public function backendAgents()
    {  
     session_start();
     if($_SESSION["autoriser"]!="oui"){
        header("location:?page=login");
     }
     if(isset($_POST['addfirstname']) 
      && isset($_POST['addlastname']) 
      && isset($_POST['addbirthday']) 
      && isset($_POST['addcodename']) 
      && isset($_POST['addnationality'])
      && isset($_POST['addmissionid'])){
      $this->agentObject->addAgent(
        ($_POST['addfirstname']), 
        ($_POST['addlastname']), 
        ($_POST['addbirthday']), 
        ($_POST['addcodename']), 
        ($_POST['addnationality']),
        ($_POST['addmissionid']));
    }
    $missions = $this->missionsObject->getMissionsTable();
    if(isset($_POST['delete'])){
        $this->agentObject->deleteAgent($_POST['delete']);
    }
    if(isset($_POST['update'])){
      $agentById = $this->agentObject->getAgentDetailById($_POST['update']);
    }
    if(isset($_POST['updatefirstname']) 
      && isset($_POST['updatelastname']) 
      && isset($_POST['updatebirthday']) 
      && isset($_POST['updatecodename']) 
      && isset($_POST['updatenationality']) 
      && isset($_POST['updatemissionid'])){
      $this->agentObject->updateAgent(
        $_POST['updateid'], 
        $_POST['updatefirstname'], 
        $_POST['updatelastname'], 
        $_POST['updatebirthday'], 
        $_POST['updatecodename'],
        $_POST['updatenationality'],
        $_POST['updatemissionid']);
      }
    $agents = $this->agentsObject->getAgentsTable();
    require_once 'views/backend-agents.php';
    }

    public function backendHideouts()
    {  
     session_start();
     if($_SESSION["autoriser"]!="oui"){
        header("location:?page=login");
     }
     if(isset($_POST['addcodename']) 
      && isset($_POST['addadress']) 
      && isset($_POST['addpostcode']) 
      && isset($_POST['addcity']) 
      && isset($_POST['addcountry'])
      && isset($_POST['addtype'])){
      $this->hideoutObject->addHideout(
        ($_POST['addcodename']), 
        ($_POST['addadress']), 
        ($_POST['addpostcode']), 
        ($_POST['addcity']), 
        ($_POST['addcountry']), 
        ($_POST['addtype']));
    }
    if(isset($_POST['delete'])){
        $this->hideoutObject->deleteHideout($_POST['delete']);
    }
    if(isset($_POST['update'])){
      $hideout = $this->hideoutObject->getHideoutDetail($_POST['update']);
    }
    if(isset($_POST['updatecodename']) 
      && isset($_POST['updateadress']) 
      && isset($_POST['updatepostcode']) 
      && isset($_POST['updatecity']) 
      && isset($_POST['updatecountry']) 
      && isset($_POST['updatetype'])){
      $this->hideoutObject->updateHideout(
        $_POST['updateid'], 
        $_POST['updatecodename'], 
        $_POST['updateadress'], 
        $_POST['updatepostcode'], 
        $_POST['updatecity'],
        $_POST['updatecountry'],
        $_POST['updatetype']);
      }
    $hideouts = $this->hideoutsObject->getHideoutsTable();
    require_once 'views/backend-hideouts.php';
    }

    public function backendTargets()
    {  
      session_start();
      if($_SESSION["autoriser"]!="oui"){
          header("location:?page=login");
      }
      if(isset($_POST['addfirstname']) 
        && isset($_POST['addlastname']) 
        && isset($_POST['addcodename']) 
        && isset($_POST['addbirthday']) 
        && isset($_POST['addnationality'])
        && isset($_POST['addmissionid'])){
        $this->targetObject->addTarget(
          ($_POST['addfirstname']), 
          ($_POST['addlastname']), 
          ($_POST['addcodename']), 
          ($_POST['addbirthday']), 
          ($_POST['addnationality']), 
          ($_POST['addmissionid']));
      }
      $missions = $this->missionsObject->getMissionsTable();
      if(isset($_POST['delete'])){
          $this->targetObject->deleteTarget($_POST['delete']);
      }
      if(isset($_POST['update'])){
        $targetById = $this->targetObject->getTargetDetailById($_POST['update']);
      }
      if(isset($_POST['updatefirstname']) 
        && isset($_POST['updatelastname']) 
        && isset($_POST['updatecodename']) 
        && isset($_POST['updatebirthday']) 
        && isset($_POST['updatenationality']) 
        && isset($_POST['updatemissionid'])){
        $this->targetObject->updateTarget(
          $_POST['updateid'], 
          $_POST['updatefirstname'], 
          $_POST['updatelastname'], 
          $_POST['updatecodename'], 
          $_POST['updatebirthday'],
          $_POST['updatenationality'],
          $_POST['updatemissionid']);
        }
      $targets = $this->targetsObject->getTargetsTable();
      $targetsmissions = $this->targetsObject->getTargetsMissionTable();
      require_once 'views/backend-targets.php';
    }

    
}