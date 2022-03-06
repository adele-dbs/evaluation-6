<?php

require_once('models/Model.php');

class Status
{
    use Model;

    private int $id;
    private string $name;

    public function getStatus (int $id)
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

    public function getStatusId()
    {
        return $this->id;
    }

    public function getStatusName()
    {
        return $this->name;
    }

}