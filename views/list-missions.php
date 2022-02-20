
<?php
$titre = 'Espionnage - Missions';
$page_id = 'id="list-missions"';
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
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
    <p>barre recherche + tri</p>
    <article class="container">
      <?php foreach ($missions as $mission): ?>
        <div class="row" id="card">
          <div class="col-8">
            <h2><?= $mission->getName() ?></h2>
          </div>
          <div class="col-2">
            <span class="badge badge-info"><?= $mission->getStatusID() ?></span>
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
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </footer>

<?php
$content = ob_get_clean();
require_once('layout.php');
