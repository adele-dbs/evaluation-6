<?php

require_once 'controllers/Controller.php';
require_once 'database/vendor/autoload.php';
require_once 'entityManager.php';

$entityManager = getEntityManager ();

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
            $controller->backend();
            break;
        case 'backend-missions':
            $controller->backendMissions();
            break;
        case 'backend-targets':
            $controller->backend();
            break;
        case 'backend-types':
            $controller->backendTypes();
            break;
        case 'backend-particularities':
            $controller->backendParticularities();
            break;
        case 'backend-agents':
            $controller->backend();
            break;
        case 'backend-contacts':
            $controller->backend();
            break;
        case 'backend-hideouts':
            $controller->backend();
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



