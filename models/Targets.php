<?php

require_once('models/Model.php');

class Targets
{
    use Model;

    public function getMissionTargetList (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM targets WHERE mission_id = ?');
        $targets = null;
        if ($stmt->execute([$id])) {
            $targets = [];
            while ($target = $stmt->fetchObject('Target')) {
                $targets[] = $target;

                if(!is_object($target)) {
                    $target = null;
                }
            }
        return $targets;
        }
    }

    public function getTargetsTable ()
    { 
        $stmt = $this->pdo->query('SELECT * FROM targets');
        $targets = [];
        while ($target = $stmt->fetchObject('Target')) {
            $targets[] = $target;
        }
        return $targets;
    }

    public function getTargetsMissionTable ()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM targets LEFT JOIN missions ON targets.mission_id = missions.id');
        $targetsmissions = [];
        while ($target = $stmt->fetchObject('PDO::FETCH_ASSOC')) {
            $targetsmissions[] = $target;
        }
        return $targetsmissions;
    }
}