
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

  <section>
    <nav class="navbar" id="search">
      <form class="form-inline" >
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-light" type="submit">Search</button>
      </form>
      <p>barre recherche + tri</p>
    </nav>
    <article class="container">
      <?php foreach ($missions as $mission): ?>
        <div class="row" id="card">
          <div class="col-8">
            <h2><?= $mission->getName() ?></h2>
          </div>
          <div class="col-2">
            <h2>Statut</h2>
          </div>
          <div class="col-2">
          <a href="?page=detail&id=<?= $mission->getId() ?>" class="btn btn-light btn-outline-dark">Détails</a>
          </div>
        </div>
      <?php endforeach; ?>
    </article>
  </section>
          

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
                <li class="page-item"><a class="page-link text-black" href="?page=list&action=<?=$i ?>"><?=$i ?></a></li>
                <?php
              }    
          }
          echo '</p>';
          ?>
      </ul>
    </nav>
  </footer>

<?php
$content = ob_get_clean();
require_once('layout.php');
