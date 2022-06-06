<?php

require_once 'vendor/autoload.php';
require_once 'controllers/Controller.php';

$controller = new Controller();

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'list':
            $controller->listMissions();
            break;
        case 'detail':
            $controller->showMission();
            break;
        case 'login':
            $controller->login();
            break;
        case 'backend':
            $controller->backendMissions();
            break;
        case 'backend-targets':
            $controller->backendTargets();
            break;
        case 'backend-types':
            $controller->backendTypes();
            break;
        case 'backend-particularities':
            $controller->backendParticularities();
            break;
        case 'backend-agents':
            $controller->backendAgents();
            break;
        case 'backend-contacts':
            $controller->backendContacts();
            break;
        case 'backend-hideouts':
            $controller->backendHideouts();
            break;
        case 'logout':
            $controller->logout();
            break;
        default:
            $controller->home();
            break;
    }
} else {
    $controller->home();
}



