<?php
$titre = 'KGB - Détail de la Mission';
$page_id = 'id="list-missions"';
if (is_null($mission)) {
  $content = 'Cette mission n\'existe pas';
} else {
  ob_start();
  ?>
  <article>
      <h2><?= $mission->getName() ?></h2>
  </article>
  <?php
  $content = ob_get_clean();
}
require_once 'layout.php';