<?php
$titre = 'Espionnage - Backend';
$page_id = 'id="missions"';
ob_start();
?>

<header class="container">
  <div class="row p-3">
    <div class="col text-center align-self-center">
      <h1>Back-Office</h1>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="backend-nav">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="?page=backend-misions">Missions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Agents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Cibles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Planques</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=backend-particularities">Particularités</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=backend-types">Types</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <a href="?page=logout" id="button-logout" class="btn btn-light btn-outline-dark">Déconnexion</a>
</header>

<main>
  <h2 class="table-title text-center"><?= $tableTitle ?></h2>
  <article class="container">

  <?= $table ?>

    
</main>
          
<?php
$content = ob_get_clean();
require_once('layout.php');