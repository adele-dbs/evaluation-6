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
}