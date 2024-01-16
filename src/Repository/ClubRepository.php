<?php

namespace App\Repository;

use App\Entity\Club;
use App\Entity\Sport;
use Core\Attributes\TargetEntity;
use Core\Repository\Repository;

#[TargetEntity(name: Club::class)]
class ClubRepository extends Repository
{

}