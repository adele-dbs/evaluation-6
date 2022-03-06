<?php

require_once('models/Model.php');


class MissionContacts 
{
    use Model;

    public function getMissionContactList (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM contacts INNER JOIN mission_contact ON contacts.id = mission_contact.contact_id WHERE mission_id = ?');
        $missionContacts = null;
        if ($stmt->execute([$id])) {
            $missionContacts = [];
            while ($contact = $stmt->fetchObject('Contact')) {
                $missionContacts[] = $contact;

                if(!is_object($contact)) {
                    $contact = null;
                }
            }
        return $missionContacts;
        }
    }
}