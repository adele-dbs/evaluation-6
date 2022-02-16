<?php

require_once('models/Model.php');

class Mission
{
    use Model;

    private int $id;
    private string $name;
    private int $status_id;

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
}