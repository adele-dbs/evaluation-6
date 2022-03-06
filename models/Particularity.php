<?php

require_once('models/Model.php');

class Particularity
{
    use Model;

    private int $id;
    private string $name;

    public function getParticularity (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM particularities WHERE id = ?');
        $particularity = null;
        if ($stmt->execute([$id])) {
          $particularity = $stmt->fetchObject('Particularity');
          if(!is_object($particularity)) {
              $particularity = null;
          }
        return $particularity;
        }
    }

    public function getParticularityId()
    {
        return $this->id;
    }

    public function getParticularityName()
    {
        return $this->name;
    }

}