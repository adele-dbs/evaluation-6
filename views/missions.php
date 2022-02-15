
<?php
$titre = 'KGB - Missions';
$id = 'id="list-missions"';
ob_start();
?>
  <header class="container">
    <h1 class="text-center">Liste des missions</h1> 
  </header>

  <main class="container">
  </main>

  <footer class="container">
    <div class="row p-3 ">
      <div class="col-12">
        <div class="d-flex justify-content-center">
          
        </div>
      </div>
    </div>
  </footer>
<?php
$contenu = ob_get_clean();
require_once('layout.php');