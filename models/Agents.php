<?php

require_once('models/Model.php');

class Agents
{
    use Model;

    public function getMissionAgentList (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM agents WHERE mission_id = ?');
        $agents = null;
        if ($stmt->execute([$id])) {
            $agents = [];
            while ($agent = $stmt->fetchObject('Agent')) {
                $agents[] = $agent;

                if(!is_object($agent)) {
                    $agent = null;
                }
            }
        return $agents;
        }
    }

    public function getAgentsTable ()
    {
        $stmt = $this->pdo->query('SELECT * FROM agents');
        $agents = [];
        while ($agent = $stmt->fetchObject('Agent')) {
            $agents[] = $agent;
        }
        return $agents;
    }
}