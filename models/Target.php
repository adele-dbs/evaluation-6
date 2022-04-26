<?php

require_once('models/Model.php');

class Target
{
    use Model;

    private int $id;
    private string $firstname;
    private string $lastname;
    private string $code_name;
    private $birthday;
    private string $nationality;
    private int $mission_id;

    public function getTargetDetail (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM targets WHERE mission_id = ?');
        $target = null;
        if ($stmt->execute([$id])) {
          $target = $stmt->fetchObject('Target');
          if(!is_object($target)) {
              $target = null;
          }
        return $target;
        }
    }

    public function getTargetDetailById (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM targets WHERE id = ?');
        $targetById = null;
        if ($stmt->execute([$id])) {
          $targetById = $stmt->fetchObject('Target');
          if(!is_object($targetById)) {
              $targetById = null;
          }
        return $targetById;
        }
    }

    public function getMissionTargetDetail (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM missions INNER JOIN targets ON missions.id = targets.mission_id WHERE id = ?');
        $missionName = null;
        if ($stmt->execute([$id])) {
            $missionName = [];
            while ($mission = $stmt->fetchObject('Mission')) {
                $missionName[] = $mission;
                if(!is_object($mission)) {
                    $mission = null;
                }
            }
        return $missionName;
        }
    }

    public function addTarget (string $addfirstname, string $addlastname, string $addcodename, $addbirthday, string $addnationality, int $addmissionid)
    {
        if($addfirstname !== "" && $addlastname !== "" && $addbirthday !== "" && $addcodename !== "" && $addnationality !== "" && $addmissionid !== "") {
            $stmt = $this->pdo->prepare('INSERT INTO targets (firstname, lastname, code_name, birthday, nationality, mission_id) 
                VALUES (:addfirstname, :addlastname, :addcodename, :addbirthday, :addnationality, :addmissionid)');
            $stmt->bindParam(':addfirstname', $addfirstname);
            $stmt->bindParam(':addlastname', $addlastname);
            $stmt->bindParam(':addcodename', $addcodename);
            $stmt->bindParam(':addbirthday', $addbirthday);
            $stmt->bindParam(':addnationality', $addnationality);
            $stmt->bindParam(':addmissionid', $addmissionid);
            if ($stmt->execute()) {
                echo 'La cible a bien été créée';
            } else {
                echo 'Impossible de créer la cible';
            }
        }
    }

    public function deleteTarget (int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM targets WHERE id = :id');
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo 'La cible a bien été supprimée';
        } else {
            echo 'Impossible de supprimer la cible';
        }

    }

    public function updateTarget (int $updateid, string $updatefirstname, string $updatelastname, string $updatecodename, $updatebirthday, string $updatenationality, int $updatemissionid)
    {
        $stmt = $this->pdo->prepare('UPDATE targets SET 
        firstname = :updatefirstname, 
        lastname = :updatelastname,
        code_name = :updatecodename,  
        birthday = :updatebirthday, 
        nationality = :updatenationality, 
        mission_id = :updatemissionid 
        WHERE id = :updateid');
        $stmt->bindParam(':updateid', $updateid);
        $stmt->bindParam(':updatefirstname', $updatefirstname);
        $stmt->bindParam(':updatelastname', $updatelastname);
        $stmt->bindParam(':updatecodename', $updatecodename);
        $stmt->bindParam(':updatebirthday', $updatebirthday);
        $stmt->bindParam(':updatenationality', $updatenationality);
        $stmt->bindParam(':updatemissionid', $updatemissionid);
        if ($stmt->execute()) {
            echo 'La cible a bien été modifiée';
        } else {
            echo 'Impossible de modifier la cible';
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCodeName()
    {
        return $this->code_name;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

    public function getMissionId()
    {
        return $this->mission_id;
    }
 }