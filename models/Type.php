<<?php

require_once('models/Model.php');

class Type
{
    use Model;

    private int $id; 
    private string $name;

    public function getType (int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM types WHERE id = ?');
        $type = null;
        if ($stmt->execute([$id])) {
          $type = $stmt->fetchObject('Type');
          if(!is_object($type)) {
              $type = null;
          }
        return $type;
        }
    }

     public function addType (string $addname)
    {
        if($addname !== "") {
            $stmt = $this->pdo->prepare('INSERT INTO types (name) VALUES (:addname)');
            $stmt->bindParam(':addname', $addname);
            if ($stmt->execute()) {
                echo 'La type a bien été créée';
            } else {
                echo 'Impossible de créer la type';
            }
        }
    }

    public function deleteType (int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM types WHERE id = :id');
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo 'La type a bien été supprimée';
        } else {
            echo 'Impossible de supprimer la type';
        }

    }

    public function updateType (int $updateid, string $updatename)
    {
        $stmt = $this->pdo->prepare('UPDATE types SET name = :updatename WHERE id = :updateid');
        $stmt->bindParam(':updateid', $updateid);
        $stmt->bindParam(':updatename', $updatename);
        if ($stmt->execute()) {
            echo 'La type a bien été modifiée';
        } else {
            echo 'Impossible de modifier le type';
        }

    }

    public function getTypeId()
    {
        return $this->id;
    }

    public function getTypeName()
    {
        return $this->name;
    }
}