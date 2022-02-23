<?php

use Doctrine\ORM\Mapping as ORM;

require_once 'Right.php';

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
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
     * @ORM\Column(name="email", type="string", unique=true)
     */ 
    private string $email;

    /**
     * @ORM\Column(name="password", type="string")
     */ 
    private string $password;

    /**
     * @ORM\Column(name="creation_date", type="date")
     */ 
    private int $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity="Right")
     */
    private Right $right;

 }