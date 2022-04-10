<?php

require_once 'Mission.php';

class Agent
{
    
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

    public function addAgent (string $addfirstname, string $addlastname, $addbirthday, string $addcodename, string $addnationality)
    {
        if($addfirstname !== "" && $addlastname !== "" && $addbirthday !== "" && $addcodename !== "" && $addnationality !== "") {
            $stmt = $this->pdo->prepare('INSERT INTO agents (firstname, lastname, birthday, code_name, nationality) 
                VALUES (:addfirstname, :addlastname, :addbirthday, :addcodename, :addnationality)');
            $stmt->bindParam(':addfirstname', $addfirstname);
            $stmt->bindParam(':addlastname', $addlastname);
            $stmt->bindParam(':addbirthday', $addbirthday);
            $stmt->bindParam(':addcodename', $addcodename);
            $stmt->bindParam(':addnationality', $addnationality);
            if ($stmt->execute()) {
                echo 'L\'agent a bien été créée';
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
            echo 'Le contact a bien été supprimée';
        } else {
            echo 'Impossible de supprimer le contact';
        }

    }

    public function updateAgent (int $updateid, string $updatefirstname, string $updatelastname, $updatebirthday, string $updatecodename, string $updatenationality)
    {
        $stmt = $this->pdo->prepare('UPDATE agents SET 
        fisrtname = :updatefisrtname, 
        lastname = :updatelastname, 
        birthday = :updatebirthday, 
        code_name = :updatecodename, 
        nationality = :updatenationality, 
        WHERE id = :updateid');
        $stmt->bindParam(':updateid', $updateid);
        $stmt->bindParam(':updatefirstname', $updatefirstname);
        $stmt->bindParam(':updatelastname', $updatelastname);
        $stmt->bindParam(':updatebirthday', $updatebirthday);
        $stmt->bindParam(':updatecodename', $updatecodename);
        $stmt->bindParam(':updatenationality', $updatenationality);
        if ($stmt->execute()) {
            echo 'L\'agent a bien été modifiée';
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