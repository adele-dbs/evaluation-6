<?php

require_once('models/Model.php');

class Status
{
    use Model;

    private int $id;
    private string $name;
    private string $color;

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

    public function getMissionStatus (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM missions INNER JOIN status ON mission.status_id = status.id WHERE mission_id = ?');
        $missionStatus = null;
        if ($stmt->execute([$id])) {
            $missionStatus = [];
            while ($status = $stmt->fetchObject('Status')) {
                $missionStatus[] = $status;

                if(!is_object($status)) {
                    $status = null;
                }
            }
        return $missionStatus;
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

    public function getStatusColor()
    {
        return $this->color;
    }

}