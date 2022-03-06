<?php

require_once('models/Model.php');

class MissionContact
{
    use Model;

    private int $mission_id; 
    private string $contact_id;

    public function getMissionContact (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM mission_contact WHERE mission_id = ?');
        $missionContact = null;
        if ($stmt->execute([$id])) {
          $missionContact = $stmt->fetchObject('MissionContact');
          if(!is_object($missionContact)) {
              $missionContact = null;
          }
        return $missionContact;
        }
    }

    public function getMissionId()
    {
        return $this->mission_id;
    }

    public function getContactId()
    {
        return $this->contact_id;
    }
}