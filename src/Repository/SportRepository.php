<?php

namespace App\Repository;

use App\Entity\Sport;
use Core\Attributes\TargetEntity;
use Core\Repository\Repository;

#[TargetEntity(name: Sport::class)]
class SportRepository extends Repository
{
    public function insert(Sport $sport):void
    {
        $query = $this->pdo->prepare("INSERT INTO $this->tableName SET name = :name, accessory = :accessory");
        $query->execute([
            "name"=>$sport->getName(),
            "accessory"=>$sport->getAccessory()
        ]);

    }

    public function edit(Sport $sport)
    {
        $query = $this->pdo->prepare("UPDATE $this->tableName SET name= :name, accessory= :accessory WHERE id= :id");
        $query->execute([
            "name"=>$sport->getName(),
            "accessory"=>$sport->getAccessory(),
            "id"=>$sport->getId()
        ]);
    }

}