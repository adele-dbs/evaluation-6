<?php

use Doctrine\ORM\Mapping as ORM;

class Hideout
{
    private int $id;
    private string $code_name;
    private string $adress;
    private int $postcode;
    private string $city;
    private string $country;
    private string $type;

    public function getHideoutDetail (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM hideouts WHERE id = ?');
        $hideout = null;
        if ($stmt->execute([$id])) {
          $hideout = $stmt->fetchObject('Hideout');
          if(!is_object($hideout)) {
              $hideout = null;
          }
        return $hideout;
        }
    }

  public function addHideout (
    string $addcodename, 
    string $addadress,
    int $addpostcode, 
    string $addcity, 
    string $addcountry, 
    string $addtype)
    {
        if($addcodename !== ""
          && $addadress !== ""
          && $addpostcode !== ""
          && $addcity !== ""
          && $addcountry !== ""
          && $addtype !== "") {
            $stmt = $this->pdo->prepare('INSERT INTO hideouts (code_name, adress, postcode, city, country, type) VALUES (:addcodename, :addadress, :addpostcode, :addcity, :addcountry, :addtype)');
            $stmt->bindParam(':addcodename', $addcodename);
            $stmt->bindParam(':addadress', $addadress);
            $stmt->bindParam(':addpostcode', $addpostcode);
            $stmt->bindParam(':addcity', $addcity);
            $stmt->bindParam(':addcountry', $addcountry);
            $stmt->bindParam(':addtype', $addtype);
            if ($stmt->execute()) {
                echo 'La planque a bien été créée';
            } else {
                echo 'Impossible de créer la planque';
            }
        }
    }

    public function deleteType (int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM hideout WHERE id = :id');
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo 'La planque a bien été supprimée';
        } else {
            echo 'Impossible de supprimer la planque';
        }
    }

    public function updateType (
      int $updateid, 
      string $updatecodename, 
      string $updateadress,
      int $updatepostcode, 
      string $updatecity, 
      string $updatecountry, 
      string $updatetype){
        $stmt = $this->pdo->prepare('UPDATE hideout SET code_name = :updatecodename, adress = :updateadress, postcode = :updatepostcode, city = :updatecity, country = :updatecountry, type = :updatetype WHERE id = :updateid');
        $stmt->bindParam(':updateid', $updateid);
        $stmt->bindParam(':updatecodename', $updatecodename);
        $stmt->bindParam(':updateadress', $updateadress);
        $stmt->bindParam(':updatepostcode', $updatepostcode);
        $stmt->bindParam(':updatecity', $updatecity);
        $stmt->bindParam(':updatecountry', $updatecountry);
        $stmt->bindParam(':updatetype', $updatetype);
        if ($stmt->execute()) {
            echo 'La planque a bien été modifiée';
        } else {
            echo 'Impossible de modifier la planque';
        }
    }

    public function getHideoutId()
    {
        return $this->id;
    }

    public function getCodeName()
    {
        return $this->code_name;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getType()
    {
        return $this->type;
    }
 }