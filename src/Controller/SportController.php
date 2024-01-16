<?php

namespace App\Controller;

use App\Entity\Sport;
use App\Repository\SportRepository;
use Core\Controller\Controller;
use Core\Http\Response;

class SportController extends Controller
{
    public function index()
    {
        $sportsRepository = new SportRepository();
        $sports = $sportsRepository->findAll();

        return $this->render("sport/index", ["pageTitle" => "Les sports", "sports" => $sports]);
    }

    public function show()
    {
        $id = null;
        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (!isset($_GET['id'])) {
            $this->redirect();
        }


        $sportRepository = new SportRepository();
        $sport = $sportRepository->find($id);

        return $this->render("sport/show", ["pageTitle" => "Un Sport", "sport" => $sport]);
    }

    public function insert()
    {

        $name = null;
        $accessory = null;


        if (!empty($_POST['name']) && $_POST['name'] != "") {
            $name = $_POST['name'];
        }

        if (!empty($_POST['accessory']) && $_POST['accessory'] != "") {
            $accessory = $_POST['accessory'];
        }

        if ($name && $accessory)
        {
            $sport = new Sport();
            $sport->setName($name);
            $sport->setAccessory($accessory);

            $sportRepository = new SportRepository();
            $sportRepository->insert($sport);

            return $this->redirect("?type=sport&action=index");
        }


        return $this->render("sport/insert", [
            "pageTitle"=>"nouveau sport"
        ]);
    }

    public function delete()
    {
        $id = null;
        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (!isset($_GET['id'])) {
            $this->redirect("?type=sport&action=index");
        }

        $sportRepository = new SportRepository();
        $sportRepository->delete($id);

        return $this->redirect("?type=sport&action=index");


    }

    public function edit()
    {
        $idEdit = null;
        $name = null;
        $accessory = null;

        if(!empty($_POST['idEdit']) && $_POST['idEdit'] != ""){ $idEdit = $_POST['idEdit']; }
        if(!empty($_POST['name']) && $_POST['name'] != ""){ $name = $_POST['name']; }
        if(!empty($_POST['accessory']) && $_POST['accessory'] != ""){ $accessory = $_POST['accessory']; }

        if($idEdit && $name && $accessory)
        {
            $sportRepository = new SportRepository();
            $sport = $sportRepository->find($idEdit);
            if(!$sport){return $this->redirect();}



            $sport->setName($name);
            $sport->setAccessory($accessory);


            $sportRepository->edit($sport);

            return $this->redirect("?type=sport&action=index");

        }



        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']))
        {
            $id = $_GET['id'];
        }

        if(!$id){
            return $this->redirect();
        }

        $sportRepository = new SportRepository();
        $sport = $sportRepository->find($id);
        $this->render("sport/edit",["pageTitle"=>"Edit Sport","sport"=>$sport]);




    }
}