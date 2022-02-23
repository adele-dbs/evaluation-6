<?php

use Doctrine\ORM\Mapping as ORM;

require_once 'Mission.php';

/**
 * @ORM\Entity
 * @ORM\Table(name="targets")
 */
class Target
{
    /**
     * @ORM\Column(name="id", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

     /**
     * @ORM\Column(name="firstname", type="string")
     */ 
    private string $firstname;
    
     /**
     * @ORM\Column(name="lastname", type="string")
     */ 
    private string $lastname;

     /**
     * @ORM\Column(name="birthday", type="date")
     */ 
    private int $birthday;

    /**
     * @ORM\Column(name="code_name", type="string", unique=true)
     */ 
    private string $codeName;

     /**
     * @ORM\Column(name="nationality", type="string")
     */ 
    private string $nationality;

    /**
     * @ORM\ManyToOne(targetEntity="Mission")
     */
    private Mission $mission;
 }