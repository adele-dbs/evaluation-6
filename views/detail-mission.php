<?php
$titre = 'Espionnage - Détail de la Mission';
$page_id = 'id="missions"';
if (is_null($mission)) {
  $content = 'Cette mission n\'existe pas';
} else {
  ob_start();
  ?>

  <h1 class="text-center"><?= $mission->getMissionName() ?></h1>

  <article class="container" id="mission-detail">

  <div class="row row-cols-1 row-cols-sm-2 d-flex justify-content-center">
    <div class="card mission-items">
        <div class="card-body">
          <p class="card-text">
            Nom de code : <?= $mission->getCodeName() ?>
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6 card mission-items">
        <div class="card-body">
          <p class="card-text">
            Date de début : <?= $mission->getStartDate() ?>
          </p>
        </div>
      </div>
      <div class="col-6 card mission-items">
        <div class="card-body">
          <p class="card-text">
            Date de fin : <?= $mission->getEndDate() ?>
          </p>
        </div>
      </div>
    </div>

  <div class="row row-cols-1 row-cols-sm-2">
      <div class="card mission-items">
        <div class="card-body">
          <p class="card-text">
            Pays : <?= $mission->getCountry() ?>
          </p>
        </div>
      </div>
      <div class="card mission-items">
        <div class="card-body">
          <p class="card-text">
            Statut : <?= $status->getStatusName() ?>
          </p>
        </div>
      </div>
      <div class="card mission-items">
        <div class="card-body">
          <p class="card-text">
            Type :  <?= $type->getTypeName() ?>
          </p>
        </div>
      </div>
      <div class="card mission-items">
        <div class="card-body">
          <p class="card-text">
            Spécificité requise :  <?= $particularity->getParticularityName() ?>
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="card mission-items" style="width: 60rem;">
        <div class="card-body">
          <p class="card-text">
            Description : <?= $mission->getDescription() ?>
          </p>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2">
      <div class="card mission-items">
        <div class="card-body">
          <p class="card-text">
            Contact : 
            <ul>
              <?php foreach ($missionContacts as $contact): ?>
                <li><?= $contact->getCodeName() ?></li>
              <?php endforeach; ?>
            </ul>
          </p>
        </div>
      </div>
      <div class="card mission-items">
        <div class="card-body">
          <p class="card-text">
            Planque : 
            <ul>
              <?php foreach ($missionHideouts as $hideout): ?>
                <li><?= $hideout->getCodeName() ?></li>
              <?php endforeach; ?>
            </ul>
          </p>
        </div>
      </div>
      <div class="card mission-items">
        <div class="card-body">
          <p class="card-text">
            Cible : 
            <ul>
              <?php foreach ($targets as $target): ?>
                <li><?= $target->getFirstname() ?> <?= $target->getLastname() ?></li>
              <?php endforeach; ?>
            </ul>
          </p>
        </div>
      </div>
      <div class="card mission-items">
        <div class="card-body">
          <p class="card-text">
            Agent : 
            <ul>
              <?php foreach ($agents as $agent): ?>
                <li><?= $agent->getIdentificationCode() ?></li>
              <?php endforeach; ?>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </article>
  <?php
  $content = ob_get_clean();
}
require_once 'layout.php';