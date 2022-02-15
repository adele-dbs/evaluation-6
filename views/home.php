<?php
$titre = 'KGB - Accueil';
$id = 'id="home"';
ob_start();
?>
  <a class="btn btn-outline-light text-white" href="missions.php" role="button" id="button-mission"> 
    Missions
  </a>
<?php
$contenu = ob_get_clean();
require_once('layout.php');
