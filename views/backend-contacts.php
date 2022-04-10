<?php
$tableTitle= 'Liste des contacts';
ob_start();
?>

<div class="container-fluid">
  <div class="row no-gutters justify-content-between">
    <div class="col-3" id="crud">
      
      <?php
        if(isset($_POST['update'])){
          ?>
          <form action="" method="POST">
            <div class="form-group">
              <label for="updateid">Id : </label>
              <input type="text" name="updateid" readonly class="form-control" id="updateid" value="<?=($_POST['update'])?>">
              <label for="updatefirstname">Prénom : </label>
              <input type="text" name="updatefirstname" class="form-control" id="updatefirstname" placeholder="<?= $contact->getFirstName() ?>"> 
               <label for="updatelastname">Nom : </label>
              <input type="text" name="updatelastname" class="form-control" id="updatelastname">
               <label for="updatebirthday">Date de naissance : </label>
              <input type="date" name="updatebirthday" class="form-control" id="updatebirthday">
               <label for="addcodename">Nom de code : </label>
              <input type="text" name="addcodename" class="form-control" id="addcodename">
              <label for="addnationality">Nationnalité : </label>
              <input type="text" name="addnationality" class="form-control" id="addnationality">
            </div>
            <button type="submit" class="btn btn-light btn-outline-dark">Modifier</button>
          </form>
          <?php
        } else {
          ?>
          <form action="" method="POST">
            <label for="addfirstname">Prénom : </label>
              <input type="text" name="addfirstname" class="form-control" id="addfirstname">
               <label for="addlastname">Nom : </label>
              <input type="text" name="addlastname" class="form-control" id="addlastname">
               <label for="addbirthday">Date de naissance : </label>
              <input type="date" name="addbirthday" class="form-control" id="addbirthday">
               <label for="addcodename">Nom de code : </label>
              <input type="text" name="addcodename" class="form-control" id="addcodename">
              <label for="addnationality">Nationnalité : </label>
              <input type="text" name="addnationality" class="form-control" id="addnationality">
            <button type="submit" class="btn btn-light btn-outline-dark">Ajouter</button>
          </form>
          <?php
        }
      ?>
    </div>
    <div class="col-8">

  <table class="table table-bordered table-light text-center">
      
      <thead>
        <tr>
          <th>Id</th>
          <th>Prénom</th>
          <th>Nom</th>
          <th>Date de naissance</th>
          <th>Nom de code</th>
          <th>Nationnalité</th>
          <th>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
          </th>
          <th>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
            </svg>
          </th>
        </tr>
      </thead>

      <tbody id="tbody">
        <?php foreach ($contacts as $contact): ?>
            <tr>
              <td><?= $contact->getContactId() ?></td>
              <td><?= $contact->getFirstName() ?></td>
              <td><?= $contact->getLastName() ?></td>
              <td><?= $contact->getBirthday() ?></td>
              <td><?= $contact->getCodeName() ?></td>
              <td><?= $contact->getNationality() ?></td>
              <td>
                <form action="" method="POST">  
                  <button type="submit" name="update" value="<?= $contact->getContactId() ?>" class="btn btn-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                  </button>
                </form>
              </td>
              <td>
                <form action="" method="POST">  
                  <button type="submit" name="delete" value="<?= $contact->getContactId() ?>" class="btn btn-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
      </tbody>

    </table> 

</div>

<?php
$table = ob_get_clean();
require_once('backend.php');