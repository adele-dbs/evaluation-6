<?php

class Status
{
   
    private int $id;
    private string $name;

    public function getStatusDetail (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM status WHERE id = ?');
        $status = null;
        if ($stmt->execute([$id])) {
          $status = $stmt->fetchObject('Status');
          if(!is_object($status)) {
              $status = null;
          }
        return $status;
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

}