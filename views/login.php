
<?php
$titre = 'Espionnage - Missions';
$page_id = 'id="missions"';
ob_start();
?>
         
<header class="container">
  <div class="row p-3">
    <div class="col text-center align-self-center">
      <h1>Identifiez-vous</h1>
    </div>
  </div>
</header>

<main>
  
  <form id="login-form" action="" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Email : </label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe : </label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-light btn-outline-dark">Se connecter</button>
  </form>

</main>
          
<?php
$content = ob_get_clean();
require_once('layout.php');