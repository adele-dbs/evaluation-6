
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
  </header>

  <main>

    <nav class="navbar" id="search">
      <form class="form-inline d-flex" method="GET">
        <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-light" type="submit" name="submit_search">Search</button>
      </form>
      <form method="POST">
        <button class="btn btn-light" name="choice" value="ASC">A>Z</button>
        <button class="btn btn-light" name="choice" value="DESC">Z>A</button>
      </form>
    </nav>

    <article class="container">
      <?php if($missionSearch->rowCount() > 0) { ?>

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

      <?php } else { ?>
        Aucun résultat pour: <?= $search ?>...
      <?php } ?>
    </article>
  </main>
          
  <footer >
    <nav aria-label="pagination" id="pagination">
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
$content = ob_get_clean();
require_once('layout.php');
