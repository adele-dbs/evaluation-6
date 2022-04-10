<?php

require_once('models/Model.php');

class Contact
{
    
    use Model;

    private int $id;
    private string $firstname;
    private string $lastname;
    private $birthday;
    private string $code_name;
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

    public function addContact (string $addfirstname, string $addlastname, $addbirthday, string $addcodename, string $addnationality)
    {
        if($addfirstname !== "" && $addlastname !== "" && $addbirthday !== "" && $addcodename !== "" && $addnationality !== "") {
            $stmt = $this->pdo->prepare('INSERT INTO contacts (firstname, lastname, birthday, code_name, nationality) 
                VALUES (:addfirstname, :addlastname, :addbirthday, :addcodename, :addnationality)');
            $stmt->bindParam(':addfirstname', $addfirstname);
            $stmt->bindParam(':addlastname', $addlastname);
            $stmt->bindParam(':addbirthday', $addbirthday);
            $stmt->bindParam(':addcodename', $addcodename);
            $stmt->bindParam(':addnationality', $addnationality);
            if ($stmt->execute()) {
                echo 'Le contact a bien été créée';
            } else {
                echo 'Impossible de créer le contact';
            }
        }
    }

    public function deleteContact (int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM contacts WHERE id = :id');
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo 'Le contact a bien été supprimée';
        } else {
            echo 'Impossible de supprimer le contact';
        }

    }

    public function updateContact (int $updateid, string $updatefirstname, string $updatelastname, $updatebirthday, string $updatecodename, string $updatenationality)
    {
        $stmt = $this->pdo->prepare('UPDATE contacts SET 
        fisrtname = :updatefisrtname, 
        lastname = :updatelastname, 
        birthday = :updatebirthday, 
        code_name = :updatecodename, 
        nationality = :updatenationality, 
        WHERE id = :updateid');
        $stmt->bindParam(':updateid', $updateid);
        $stmt->bindParam(':updatefirstname', $updatefirstname);
        $stmt->bindParam(':updatelastname', $updatelastname);
        $stmt->bindParam(':updatebirthday', $updatebirthday);
        $stmt->bindParam(':updatecodename', $updatecodename);
        $stmt->bindParam(':updatenationality', $updatenationality);
        if ($stmt->execute()) {
            echo 'Le contact a bien été modifiée';
        } else {
            echo 'Impossible de modifier le contact';
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