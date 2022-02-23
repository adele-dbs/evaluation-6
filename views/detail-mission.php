<?php
$titre = 'Espionnage - Détail de la Mission';
$page_id = 'id="missions"';
if (is_null($mission)) {
  $content = 'Cette mission n\'existe pas';
} else {
  ob_start();
  ?>
  <h1 class="text-center"><?= $mission->getName() ?></h1>
  <article>
  <div class="card" style="width: 30rem;">
      <div class="card-body">
        <p class="card-text">
          Date de début : <?= $mission->getStartDate() ?>
        </p>
      </div>
    </div>
    <div class="card" style="width: 30rem;">
      <div class="card-body">
        <p class="card-text">
          Date de fin : <?= $mission->getEndDate() ?>
        </p>
      </div>
    </div>
  <div class="card" style="width: 30rem;">
      <div class="card-body">
        <p class="card-text">
          Nom de code : <?= $mission->getCodeName() ?>
        </p>
      </div>
    </div>
    <div class="card" style="width: 30rem;">
      <div class="card-body">
        <p class="card-text">
          Pays : <?= $mission->getCountry() ?>
        </p>
      </div>
    </div>
    <div class="card" style="width: 30rem;">
      <div class="card-body">
        <p class="card-text">
          Description : <?= $mission->getDescription() ?>
        </p>
      </div>
    </div>
  </article>
  <?php
  $content = ob_get_clean();
}
require_once 'layout.php';