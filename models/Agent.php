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