<?php
ob_start();
?>
<article>
    <?php foreach ($missions as $mission): ?>
        <h2><?= $mission->name ?></h2>
    <?php endforeach; ?>
</article>
<?php
$content = ob_get_clean();
require_once 'layout-test.php';