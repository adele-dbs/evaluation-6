<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="hideouts")
 */
class Hideout
{
   /**
     * @ORM\Column(name="id", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(name="code_name", type="string", unique=true)
     */ 
    private string $codeName;

    /**
     * @ORM\Column(name="adress", type="string")
     */ 
     private string $adress;

     /**
     * @ORM\Column(name="postcode", type="integer")
     */ 
    private int $postcode;
    
     /**
     * @ORM\Column(name="city", type="string")
     */ 
    private string $city;

     /**
     * @ORM\Column(name="country", type="string")
     */ 
    private string $country;

      /**
     * @ORM\Column(name="type", type="string")
     */ 
    private string $type;
 }