<?php

use Doctrine\ORM\Mapping as ORM;

require_once 'Type.php';
require_once 'Particularity.php';
require_once 'Mission.php';

/**
 * @ORM\Entity
 * @ORM\Table(name="missions")
 */
class Mission
{
  /**
     * @ORM\Column(name="id", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(name="name", type="string")
     */ 
     private string $name;

     /**
     * @ORM\Column(name="description", type="string")
     */ 
    private string $description;
    
     /**
     * @ORM\Column(name="code_name", type="string", unique=true)
     */ 
    private string $codeName;

     /**
     * @ORM\Column(name="country", type="string")
     */ 
    private string $country;
    
     /**
     * @ORM\Column(name="start_date", type="date")
     */ 
    private int $startDate;

     /**
     * @ORM\Column(name="end_date", type="date")
     */ 
    private int $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="Type")
     */
    private Type $type;

     /**
     * @ORM\ManyToOne(targetEntity="Particularity")
     */
    private Particularity $particularity;

      /**
     * @ORM\ManyToOne(targetEntity="Status")
     */
    private Status $status;

    /**
     * @ORM\ManyToMany(targetEntity="Contact")
     */
    private array $contact;

     /**
     * @ORM\ManyToMany(targetEntity="Hideout")
     */
    private array $hideout;
 }