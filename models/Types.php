<?php

require_once('models/Model.php');

class Types 
{
    use Model;
    
    public function getTypesTable ()
    {
        $stmt = $this->pdo->query('SELECT * FROM types');
        $types = [];
        while ($type = $stmt->fetchObject('Type')) {
            $types[] = $type;
        }
        return $types;
    }
}