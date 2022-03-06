<?php

require_once('models/Model.php');

class MissionHideout
{
    use Model;

    private int $mission_id; 
    private string $hideout_id;

    public function getMissionHideout (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM mission_hideout WHERE mission_id = ?');
        $missionHideout = null;
        if ($stmt->execute([$id])) {
          $missionHideout = $stmt->fetchObject('MissionHideout');
          if(!is_object($missionHideout)) {
              $missionHideout = null;
          }
        return $missionHideout;
        }
    }

    public function getMissionId()
    {
        return $this->mission_id;
    }

    public function getHideoutId()
    {
        return $this->hideout_id;
    }
}