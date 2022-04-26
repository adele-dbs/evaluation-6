<?php

require_once('models/Model.php');

class Agent
{
    use Model;

    private int $id;
    private string $firstname;
    private string $lastname;
    private $birthday;
    private string $identification_code;
    private string $nationality;
    private int $mission_id;
    private array $particularty;
    
    public function getAgentDetail (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM agents WHERE mission_id = ?');
        $agent = null;
        if ($stmt->execute([$id])) {
          $agent = $stmt->fetchObject('Agent');
          if(!is_object($agent)) {
              $agent = null;
          }
        return $agent;
        }
    }

    public function getAgentDetailById (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM agents WHERE id = ?');
        $agentById = null;
        if ($stmt->execute([$id])) {
          $agentById = $stmt->fetchObject('Agent');
          if(!is_object($agentById)) {
              $agentById = null;
          }
        return $agentById;
        }
    }

    public function addAgent (string $addfirstname, string $addlastname, $addbirthday, string $addcodename, string $addnationality, int $addmissionid)
    {
        if($addfirstname !== "" && $addlastname !== "" && $addbirthday !== "" && $addcodename !== "" && $addnationality !== "" && $addmissionid !== "") {
            $stmt = $this->pdo->prepare('INSERT INTO agents (firstname, lastname, birthday, identification_code, nationality, mission_id) 
                VALUES (:addfirstname, :addlastname, :addbirthday, :addcodename, :addnationality, :addmissionid)');
            $stmt->bindParam(':addfirstname', $addfirstname);
            $stmt->bindParam(':addlastname', $addlastname);
            $stmt->bindParam(':addbirthday', $addbirthday);
            $stmt->bindParam(':addcodename', $addcodename);
            $stmt->bindParam(':addnationality', $addnationality);
            $stmt->bindParam(':addmissionid', $addmissionid);
            if ($stmt->execute()) {
                echo 'L\'agent a bien été créé';
            } else {
                echo 'Impossible de créer l\'agent';
            }
        }
    }

    public function deleteAgent (int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM agents WHERE id = :id');
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo 'L\'agent a bien été supprimé';
        } else {
            echo 'Impossible de supprimer l\'agent';
        }

    }

    public function updateAgent (int $updateid, string $updatefirstname, string $updatelastname, $updatebirthday, string $updatecodename, string $updatenationality, int $updatemissionid)
    {
        $stmt = $this->pdo->prepare('UPDATE agents SET 
        firstname = :updatefirstname, 
        lastname = :updatelastname, 
        birthday = :updatebirthday, 
        identification_code = :updatecodename, 
        nationality = :updatenationality, 
        mission_id = :updatemissionid
        WHERE id = :updateid');
        $stmt->bindParam(':updateid', $updateid);
        $stmt->bindParam(':updatefirstname', $updatefirstname);
        $stmt->bindParam(':updatelastname', $updatelastname);
        $stmt->bindParam(':updatebirthday', $updatebirthday);
        $stmt->bindParam(':updatecodename', $updatecodename);
        $stmt->bindParam(':updatenationality', $updatenationality);
        $stmt->bindParam(':updatemissionid', $updatemissionid);
        if ($stmt->execute()) {
            echo 'L\'agent a bien été modifié';
        } else {
            echo 'Impossible de modifier l\'agent';
        }
    }

    public function getId()
    {
        return $this->id;
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

    public function getIdentificationCode()
    {
        return $this->identification_code;
    }

    public function getParticularty()
    {
        return $this->particularty;
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