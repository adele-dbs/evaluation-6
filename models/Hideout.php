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