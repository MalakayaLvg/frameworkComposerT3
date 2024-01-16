<?php

namespace App\Controller;

use App\Entity\Club;
use App\Repository\ClubRepository;
use Core\Controller\Controller;

class ClubController extends Controller
{
    public function delete()
    {
        $id = null;
        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (!isset($_GET['id'])) {
            $this->redirect("?type=sport&action=index");
        }

        $sportRepository = new ClubRepository();
        $sportRepository->delete($id);

        return $this->redirect("?type=sport&action=index");
    }

    public function insert()
    {
        $name = null;
        $sport_id = null;

        var_dump($_POST['name'],$_POST['sport_id']);

        if(!empty($_POST['name']))
        {
            $name = $_POST['name'];
        }
        if(!empty($_POST['name']))
        {
            $sport_id = $_POST['sport_id'];
        }


        if ($name && $sport_id)
        {
            $club = new Club();
            $club->setName($name);
            $club->setSportId($sport_id);

            $clubRepository = new ClubRepository();
            $clubRepository->create($club);

            $this->redirect("?type=sport&action=show&id=$sport_id");
        }


    }
}