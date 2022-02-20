<?php
$titre = 'Espionnage - Accueil';
$page_id= 'id="home"';
ob_start();
?>
  <a class="btn btn-outline-light text-white" href="?page=list" role="button" id="button-mission"> 
    Missions
  </a>
<?php
$content = ob_get_clean();
require_once('layout.php');
