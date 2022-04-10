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

    public function addParticularity (string $addname)
    {
        if($addname !== "") {
            $stmt = $this->pdo->prepare('INSERT INTO particularities (name) VALUES (:addname)');
            $stmt->bindParam(':addname', $addname);
            if ($stmt->execute()) {
                echo 'La particularité a bien été créée';
            } else {
                echo 'Impossible de créer la particularité';
            }
        }
    }

    public function deleteParticularity (int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM particularities WHERE id = :id');
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo 'La particularité a bien été supprimée';
        } else {
            echo 'Impossible de supprimer la particularité';
        }
    }

    public function updateParticularity (int $updateid, string $updatename)
    {
        $stmt = $this->pdo->prepare('UPDATE particularities SET name = :updatename WHERE id = :updateid');
        $stmt->bindParam(':updateid', $updateid);
        $stmt->bindParam(':updatename', $updatename);
        if ($stmt->execute()) {
            echo 'La particularité a bien été modifiée';
        } else {
            echo 'Impossible de modifier la particularité';
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