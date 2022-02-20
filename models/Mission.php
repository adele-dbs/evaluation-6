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

    public function getId()
    {
        return $this->id;
    }

    public function getName()
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
    
    public function getParticularity_id()
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