<?php

require_once('models/Model.php');


class MissionHideouts
{
    use Model;

    public function getMissionHideoutList (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM hideouts INNER JOIN mission_hideout ON hideouts.id = mission_hideout.hideout_id WHERE mission_id = ?');
        $missionHideouts = null;
        if ($stmt->execute([$id])) {
            $missionHideouts = [];
            while ($hideout = $stmt->fetchObject('Hideout')) {
                $missionHideouts[] = $hideout;

                if(!is_object($hideout)) {
                    $hideout = null;
                }
            }
        return $missionHideouts;
        }
    }
}