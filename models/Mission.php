<?php

require_once('models/Model.php');

class Mission 
{
    use Model;

    private int $id;
    private string $name;
    private int $status_id;
    private string $description;
    private string $code_name;
    private string $country;
    private $start_date;
    private $end_date;
    private int $type_id;
    private int $particularity_id;
    private array $contact;
    private array $hideout;

    public function getMissionsDetail (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM missions WHERE id = ?');
        $mission = null;
        if ($stmt->execute([$id])) {
          $mission = $stmt->fetchObject('Mission');
          if(!is_object($mission)) {
              $mission = null;
          }
        return $mission;
        }
    }

    public function addMission (string $addname, int $addstatus, $addstartdate, $addenddate, string $addcodename, string $addcountry, string $adddescription, int $addtype, int $addparticularity)
    {
        if($addname !== "" && $addstatus !== "" && $addstartdate !== "" && $addenddate !=="" && $addcodename !== "" && $addcountry !== "" && $adddescription !== "" && $addtype !== "" && $addparticularity !== "") {
            $stmt = $this->pdo->prepare('INSERT INTO missions (name, status_id, description, code_name, country, start_date, end_date, type_id, particularity_id) 
                VALUES (:addname, :addstatus, :addstartdate, :addenddate :addcodename, :addcountry, :adddescription, :addtype, :addparticularity)');
            $stmt->bindParam(':addname', $addname);
            $stmt->bindParam(':addstatus', $addstatus);
            $stmt->bindParam(':addstartdate', $addstartdate);
            $stmt->bindParam(':addenddate', $addenddate);
            $stmt->bindParam(':addcodename', $addcodename);
            $stmt->bindParam(':addcountry', $addcountry);
            $stmt->bindParam(':adddescription', $adddescription);
            $stmt->bindParam(':addtype', $addtype);
            $stmt->bindParam(':addparticularity', $addparticularity);
            if ($stmt->execute()) {
                echo 'La mission a bien été créée';
            } else {
                echo 'Impossible de créer la mission';
            }
        }
    }

    public function deleteMission (int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM missions WHERE id = :id');
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo 'La mission a bien été supprimée';
        } else {
            echo 'Impossible de supprimer la mission';
        }

    }

    public function updateMission (int $updateid, string $updatename, int $updatestatus, $updatestartdate, $updateenddate, string $updatecodename, string $updatecountry, string $updatedescription, int $updatetype, int $updateparticularity)
    {
        $stmt = $this->pdo->prepare('UPDATE missions SET 
        name = :updatename, 
        status_id = :updatestatus, 
        description = :updatedescription, 
        code_name = :updatecodename, 
        country = :updatecountry
        start_date = :updatestartdate, 
        end_date = :updateenddate, 
        type_id = :updatetype,
        particularity_id = :updateparticularity
        WHERE id = :updateid');
        $stmt->bindParam(':updateid', $updateid);
        $stmt->bindParam(':updatestatus', $updatestatus);
        $stmt->bindParam(':updatedescription', $updatedescription);
        $stmt->bindParam(':updatecodename', $updatecodename);
        $stmt->bindParam(':updatecountry', $updatecountry);
        $stmt->bindParam(':updatestartdate', $updatestartdate);
        $stmt->bindParam(':updateenddate', $updateenddate);
        $stmt->bindParam(':updatetype', $updatetype);
        $stmt->bindParam(':updateparticularity', $updateparticularity);
        if ($stmt->execute()) {
            echo 'La mission a bien été modifiée';
        } else {
            echo 'Impossible de modifier la mission';
        }
    }

    public function getMissionId()
    {
        return $this->id;
    }

    public function getMissionName()
    {
        return $this->name;
    }

    public function getStatusId()
    {
        return $this->status_id;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function getCodeName()
    {
        return $this->code_name;
    }

    public function getCountry()
    {
        return $this->country;
    }
    
    public function getStartDate()
    {
        return $this->start_date;
    }
    
    public function getEndDate()
    {
        return $this->end_date;
    }
    
    public function getTypeId()
    {
        return $this->type_id;
    }
    
    public function getParticularityId()
    {
        return $this->particularity_id;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function getHideout()
    {
        return $this->hideout;
    }
   
}