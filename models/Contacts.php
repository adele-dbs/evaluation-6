<?php

require_once('models/Model.php');


class Contacts 
{
    use Model;

    public function getContactList ()
    {
        $stmt = $this->pdo->query('SELECT * FROM contacts');
        $contacts = [];
        while ($contact = $stmt->fetchObject('Contact')) {
            $contacts[] = $contact;
        }
        return $contacts;
    }

}