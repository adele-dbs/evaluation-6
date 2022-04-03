<?php
$tableTitle= 'Liste des types';
ob_start();
?>

<div class="container-fluid">
  <div class="row no-gutters justify-content-between">
    <div class="col-3">
      <form action="" method="POST">
        <div class="form-group">
          <label for="pname">Type</label>
          <input type="text" name="pname" class="form-control" id="pname">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
    <div class="col-8">

  
<?php
$table = ob_get_clean();
require_once('backend.php');