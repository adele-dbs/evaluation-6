<?php

require_once('models/Model.php');

class Hideouts 
{
    use Model;

    public function getHideoutsList ()
    {
        $stmt = $this->pdo->query('SELECT * FROM hideouts');
        $hideouts = [];
        while ($hideout = $stmt->fetchObject('Hideout')) {
            $hideouts[] = $hideout;
        }
        return $hideouts;
    }

    public function getHideoutsTable ()
    {
        $stmt = $this->pdo->query('SELECT * FROM hideouts');
        $hideouts = [];
        while ($hideout = $stmt->fetchObject('Hideout')) {
            $hideouts[] = $hideout;
        }
        return $hideouts;
    }
}