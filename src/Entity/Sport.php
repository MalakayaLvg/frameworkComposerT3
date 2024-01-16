<?php

namespace App\Entity;

use App\Repository\SportRepository;
use Core\Attributes\Table;
use Core\Attributes\TargetRepository;

#[TargetRepository(name: SportRepository::class)]
#[Table(name: "sports")]
class Sport
{
    private $id;
    private $name;
    private $accessory;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAccessory()
    {
        return $this->accessory;
    }

    /**
     * @param mixed $accessory
     */
    public function setAccessory($accessory): void
    {
        $this->accessory = $accessory;
    }

    public function getClubs():array
    {
        $clubRepository = new ClubRepository();
        $clubs = $clubRepository->findBySport($this);
        return $clubs;
    }
}