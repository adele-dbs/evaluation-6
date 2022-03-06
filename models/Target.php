<?php

require_once 'Mission.php';

class Target
{

    private int $id;
    private string $firstname;
    private string $lastname;
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

    public function getNationality()
    {
        return $this->nationality;
    }

    public function getMissionId()
    {
        return $this->mission_id;
    }
 }