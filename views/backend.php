<?php
$titre = 'Espionnage - Backend';
$page_id = 'id="list-missions"';
ob_start();
?>
         
<header class="container">
  <div class="row p-3">
    <div class="col text-center align-self-center">
      <h1>Backend</h1>
    </div>
  </div>
  <a href="?page=logout" class="btn btn-light btn-outline-dark">Déconnexion</a>
</header>

<main>
<div>
            <!-- tester si l'utilisateur est connecté -->
            <?php
                echo $_SESSION['email']
            ?>
            
        </div>
</main>
          
<?php
$content = ob_get_clean();
require_once('layout.php');