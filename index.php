<?php

require_once 'controllers/MissionController.php';
require_once 'vendor/autoload.php';
require_once 'entityManager.php';

$entityManager = getEntityManager ();

$controller = new MissionController();

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'list':
            $controller->listMissions();
            break;
        case 'detail':
            $controller->showMission();
            break;
        default:
            $controller->home();
            break;
    }
} else {
    $controller->home();
}

    //$controller->home();

//if (!isset($_GET['page'])) {

    //$controller->listMissions();
//} elseif ($_GET['page'] === 'detail_mission') {
    //$controller->showMission();
//}



