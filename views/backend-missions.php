<?php
$tableTitle= 'Liste des missions';
ob_start();
?>

<div class="container-fluid">
  <div class="row no-gutters justify-content-between">
    <section class="col-12 col-sm-3" id="crud">
      
      <?php
        // update
        if(isset($_POST['update'])){
          ?>
          <form action="" method="POST">
            <div class="form-group">
              <label for="updateid">Id : </label>
              <input type="text" name="updateid" readonly class="form-control" id="updateid" value="<?=($_POST['update'])?>">
              <label for="updatename">Nom : </label>
              <input type="text" name="updatename" class="form-control" id="updatename" value="<?=$targetById->getFirstName()?>">
              <label for="updatestatus">Status : </label>
              <select class="form-select" aria-label="Default select example" name="updatestatus" id="updatestatus">
                <?php foreach ($statuss as $status): ?>
                  <option value="<?= $status->getStatusId() ?>"><?= $status->getStatusId() ?> - <?= $status->getStatusId() ?></option>
                <?php endforeach; ?>
              </select>>
              <label for="updatestartdate">Date de début : </label>
              <input type="date" name="updatestartdate" class="form-control" id="updatestartdate" value="<?=$targetById->getCodeName()?>">
              <label for="updateenddate">Date de fin : </label>
              <input type="date" name="updateenddate" class="form-control" id="updateenddate" value="<?=$targetById->getBirthday()?>">
              <label for="updatecodename">Nom de code : </label>
              <input type="text" name="updatecodename" class="form-control" id="updatecodename" value="<?=$targetById->getNationality()?>">
              <label for="updatecountry">Pays : </label>
              <input type="text" name="updatecountry" class="form-control" id="updatecountry" value="<?=$targetById->getNationality()?>">
              <label for="updatedescription">Description : </label>
              <input type="text" name="updatedescription" class="form-control" id="updatedescription" value="<?=$targetById->getNationality()?>">
              <label for="updatetype">Type : </label>
              <select class="form-select" aria-label="Default select example" name="updatetype" id="updatetype">
                <?php foreach ($missions as $status): ?>
                  <option value="<?= $status->getMissionId() ?>"><?= $status->getMissionId() ?> - <?= $status->getMissionName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="updateparticularity">Spécificité : </label>
              <select class="form-select" aria-label="Default select example" name="updateparticularity" id="updateparticularity">
                <?php foreach ($missions as $status): ?>
                  <option value="<?= $status->getMissionId() ?>"><?= $status->getMissionId() ?> - <?= $status->getMissionName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="updatestatus">Contact : </label>
              <select class="form-select" aria-label="Default select example" name="updatestatus" id="updatestatus">
                <?php foreach ($missions as $status): ?>
                  <option value="<?= $status->getMissionId() ?>"><?= $status->getMissionId() ?> - <?= $status->getMissionName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="updatestatus">Planque : </label>
              <select class="form-select" aria-label="Default select example" name="updatestatus" id="updatestatus">
                <?php foreach ($missions as $status): ?>
                  <option value="<?= $status->getMissionId() ?>"><?= $status->getMissionId() ?> - <?= $status->getMissionName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="updatestatus">Agent : </label>
              <select class="form-select" aria-label="Default select example" name="updatestatus" id="updatestatus">
                <?php foreach ($missions as $status): ?>
                  <option value="<?= $status->getMissionId() ?>"><?= $status->getMissionId() ?> - <?= $status->getMissionName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="updatestatus">Cible : </label>
              <select class="form-select" aria-label="Default select example" name="updatestatus" id="updatestatus">
                <?php foreach ($missions as $status): ?>
                  <option value="<?= $status->getMissionId() ?>"><?= $status->getMissionId() ?> - <?= $status->getMissionName() ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-light btn-outline-dark">Modifier</button>
          </form>
          <?php
        // add
        } else {
          ?>
          <form action="" method="POST">
            <label for="addname">Nom : </label>
              <input type="text" name="addname" class="form-control" id="addname">
              <label for="addstatus">Status : </label>
              <select class="form-select" aria-label="Default select example" name="addstatus" id="addstatus">
                <?php foreach ($statuss as $status): ?>
                  <option value="<?= $status->getStatusId() ?>"><?= $status->getStatusId() ?> - <?= $status->getStatusName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="addstartdate">Date de début : </label>
              <input type="date" name="addstartdate" class="form-control" id="addstartdate">
              <label for="addenddate">Date de fin : </label>
              <input type="date" name="addenddate" class="form-control" id="addenddate">
              <label for="addcodename">Nom de code : </label>
              <input type="text" name="addcodename" class="form-control" id="addcodename">
              <label for="addcountry">Pays : </label>
              <input type="text" name="addcountry" class="form-control" id="addcountry">
              <label for="adddescription">Description : </label>
              <input type="text" name="adddescription" class="form-control" id="adddescription">
              <label for="addtype">Type : </label>
              <select class="form-select" aria-label="Default select example" name="addtype" id="addtype">
                <?php foreach ($types as $type): ?>
                  <option value="<?= $type->getTypeId() ?>"><?= $type->getTypeId() ?> - <?= $type->getTypeName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="addparticularity">Spécificité : </label>
              <select class="form-select" aria-label="Default select example" name="addparticularity" id="addparticularity">
                <?php foreach ($particularities as $particularity): ?>
                  <option value="<?= $particularity->getParticularityId() ?>"><?= $particularity->getParticularityId() ?> - <?= $particularity->getParticularityName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="addcontact">Contacts : </label>
              <select class="form-select" aria-label="Default select example" name="addcontact" id="addcontact">
                <?php foreach ($contacts as $contact): ?>
                  <option value="<?= $contact->getContactId() ?>"><?= $contact->getContactId() ?> - <?= $contact->getCodeName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="addhideout">Planques : </label>
              <select class="form-select" aria-label="Default select example" name="addhideout" id="addhideout">
                <?php foreach ($hideouts as $hideout): ?>
                  <option value="<?= $hideout->getHideoutId() ?>"><?= $hideout->getHideoutId() ?> - <?= $hideout->getCodeName() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="addagent">Agents : </label>
              <select class="form-select" aria-label="Default select example" name="addagent" id="addagent">
                <?php foreach ($agents as $agent): ?>
                  <option value="<?= $agent->getId() ?>"><?= $agent->getId() ?> - <?= $agent->getIdentificationCode() ?></option>
                <?php endforeach; ?>
              </select>
              <label for="addtarget">Cibles : </label>
              <select class="form-select" aria-label="Default select example" name="addtarget" id="addtarget">
                <?php foreach ($targets as $target): ?>
                  <option value="<?= $target->getId() ?>"><?= $target->getId() ?> - <?= $target->getCodeName() ?></option>
                <?php endforeach; ?>
              </select>
              <button type="submit" class="btn btn-light btn-outline-dark">Ajouter</button>
          </form>
          <?php
        }
      ?>
    </section>
  
  <section class="col-12 col-sm-9">

      <table class="table table-bordered table-light text-center">
          
          <thead>
            <tr>
              <th>Id</th>
              <th>Nom</th>
              <th>Status</th>
              <th>Date de début</th>
              <th>Date de fin</th>
              <th>Nom de Code</th>
              <th>Pays</th>
              <th>Description</th>
              <th>Type</th>
              <th>Spécificité</th>
              <th>Contacts</th>
              <th>Planques</th>
              <th>Agents</th>
              <th>Cibles</th>
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

          <tbody>
            <?php foreach ($missions as $mission): ?>
                <tr>
                  <td><?= $mission->getMissionId() ?></td>
                  <td><?= $mission->getMissionName() ?></td>
                  <td><?= $mission->getStatusId() ?></td>
                  <td><?= $mission->getStartDate() ?></td>
                  <td><?= $mission->getEndDate() ?></td>
                  <td><?= $mission->getCodeName() ?></td>
                  <td><?= $mission->getCountry() ?></td>
                  <td><?= $mission->getDescription() ?></td>
                  <td><?= $mission->getTypeId() ?></td>
                  <td><?= $mission->getParticularityId() ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <!-- update -->
                    <form action="" method="POST">  
                      <button type="submit" name="update" value="<?= $mission->getMissionId() ?>" class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                      </button>
                    </form>
                  </td>
                  <td>
                    <!-- delete -->
                    <form action="" method="POST">  
                      <button type="submit" name="delete" value="<?= $mission->getMissionId() ?>" class="btn btn-light">
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
  </div>
</div>
<?php
$table = ob_get_clean();
require_once('backend.php');