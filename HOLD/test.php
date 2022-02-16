<?php
require_once 'controllers/MissionController.php';
$controller = new MissionController();

if (!isset($_GET['page'])) {
    $controller->listMissions();
} elseif ($_GET['page'] === 'mission') {
    $controller->showMission();
}