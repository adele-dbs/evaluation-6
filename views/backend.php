<?php
$titre = 'Espionnage - Backend';
$meta ='name="description" 
content="Lorem ipsum dolor sit amet, consectetur adipiscing elit."';
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
          <!-- test -->
          <li class="nav-item">
            <a class="nav-link" id="test1">Test</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="test2">Test 2</a>
          </li>
          <!-- menu normal -->
          <li class="nav-item">
            <a class="nav-link" href="?page=backend">Missions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=backend-agents">Agents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=backend-targets">Cibles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=backend-contacts">Contacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=backend-hideouts">Planques</a>
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

  <?= $table ?>

</main>

<script src="views/change-table.js"></script>

<?php
$content = ob_get_clean();
require_once('layout.php');