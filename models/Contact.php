<?php

require_once('models/Model.php');

class Contact
{
    
    use Model;

    private int $id;
    private string $firstname;
    private string $lastname;
    private $birthday;
    private string $codeName;
    private string $nationality;

    public function getContactDetail (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM contacts WHERE id = ?');
        $contact = null;
        if ($stmt->execute([$id])) {
          $contact = $stmt->fetchObject('Contact');
          if(!is_object($contact)) {
              $contact = null;
          }
        return $contact;
        }
    }

    public function getContactId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getCodeName()
    {
        return $this->code_name;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

 }