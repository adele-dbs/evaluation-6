<?php

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

    public function addType (string $pname)
    {
        if($pname !== "") {
            $stmt = $this->pdo->prepare('INSERT INTO types (name) VALUES (:pname)');
            $stmt->bindParam(':pname', $pname);
            if ($stmt->execute()) {
                echo 'Le types a bien été créée';
            } else {
                echo 'Impossible de créer le type';
            }
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