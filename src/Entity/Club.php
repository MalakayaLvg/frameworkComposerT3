<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Core\Attributes\Table;
use Core\Attributes\TargetRepository;

#[TargetRepository(name: ClubRepository::class)]
#[Table(name: "clubs")]
class Club
{

}