<?php

require_once('models/Model.php');


class Particularities 
{
    use Model;
    
    public function getParticularitiesTable ()
    {
        $stmt = $this->pdo->query('SELECT * FROM particularities');
        $particularities = [];
        while ($particularity = $stmt->fetchObject('Particularity')) {
            $particularities[] = $particularity;
        }
        return $particularities;
    }
}