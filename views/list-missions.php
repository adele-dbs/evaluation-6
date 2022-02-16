
<?php
$titre = 'KGB - Missions';
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
    <p>barre recherche + tri</p>
    <article>
      <?php foreach ($missions as $mission): ?>
        <h2><?= $mission->getName() ?></h2>
        <button type="button" class="btn btn-primary"><?= $mission->getStatusID() ?></button>
        <a href="?page=detail&id=<?= $mission->getId() ?>" class="btn btn-outline-success">Détails</a>
      <?php endforeach; ?>
    </article>
  </section>
          

  <footer >
    <p>numéro de page</p>
  </footer>

<?php
$content = ob_get_clean();
require_once('layout.php');
