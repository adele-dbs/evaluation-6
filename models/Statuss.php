<?php

require_once('models/Model.php');


class Statuss 
{
    use Model;
    
    public function getStatusList ()
    {
        $stmt = $this->pdo->query('SELECT * FROM status');
        $statuss = [];
        while ($status = $stmt->fetchObject('Status')) {
            $statuss[] = $status;
        }
        return $statuss;
    }
}