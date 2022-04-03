
<?php
$titre = 'Espionnage - Missions';
$page_id = 'id="missions"';
ob_start();
?>
         
  <header class="container">
    <div class="row p-3">
      <div class="col text-center align-self-center">
        <h1>Liste des missions</h1>
      </div>
    </div>
    <nav class="navbar" id="search">
      <form class="d-flex" method="POST" action="">
        <input class="form-control" type="text" name="searchmission" id="searchmission" placeholder="Rechercher">
        <button type="submit" class="btn btn-light">Rechercher</button>
      </form>
      <form method="POST">
        <button class="btn btn-light" name="choice" value="ASC">A>Z</button>
        <button class="btn btn-light" name="choice" value="DESC">Z>A</button>
      </form>
    </nav>
  </header>

  <main>

    <article class="container">

      <?php

        if(isset($_POST['searchmission']) && $_POST['searchmission']!== ""){
          ?>
            <?php foreach ($missionsFound as $mission): ?>
              <div class="row" id="mission-card">
                <div class="col-9">
                  <h2><?= $mission->getMissionName() ?></h2>
                </div>
                <div class="col-3 d-flex justify-content-end">
                <a href="?page=detail&id=<?= $mission->getMissionId() ?>" class="btn btn-light btn-outline-dark justify-content-end">Détails</a>
                </div>
              </div>
            <?php endforeach; ?>
    </article>
  </main>
          
          <?php
        } else {
          ?>

            <?php foreach ($missions as $mission): ?>
              <div class="row" id="mission-card">
                <div class="col-9">
                  <h2><?= $mission->getMissionName() ?></h2>
                </div>
                <div class="col-3 d-flex justify-content-end">
                <a href="?page=detail&id=<?= $mission->getMissionId() ?>" class="btn btn-light btn-outline-dark justify-content-end">Détails</a>
                </div>
              </div>
            <?php endforeach; ?>

    </article>
  </main>
          
  <footer >
    <nav class="d-flex justify-content-center" aria-label="pagination" id="pagination">
      <ul class="pagination">
      <li class="page-item"><a class="page-link text-black">Page : </a></li>
      <?php
          for($i=1; $i<=$pagesNumber; $i++)
          {
              if($i!==$currentPage) 
              {
                ?>
                <li class="page-item"><a class="page-link text-black" href="?page=list&order=<?=$order ?>&action=<?=$i ?>"><?=$i ?></a></li>
                <?php
              }    
          }
          ;
          ?>
      </ul>
    </nav>
  </footer>

          <?php
        }
      ?>
        
<?php
$content = ob_get_clean();
require_once('layout.php');
