<?php
if (is_null($mission)) {
  $content = 'Cette mission n\'existe pas';
} else {
  ob_start();
  ?>
  <article>
      <h2><?= $mission->name ?></h2>
  </article>
  <?php
  $content = ob_get_clean();
}
require_once 'layout-test.php';