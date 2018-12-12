<?php
/**
 * Created by PhpStorm.
 * User: Laurie
 * Date: 12/12/2018
 * Time: 13:58
 */

include_once "Model/Movie.php";
include_once "HomeController.php";
include_once "LordController.php";

class AdminController extends LordController
{
    public function addAction($form)
    {

        if (strlen($form['title']) > 30)
        {
            $message = "Le titre ne doit pas contenir plus de 30 charactères.";
        }
        elseif($form['note'] > 5)
        {
            $message = "Veuillez entrer une note entre 0 et 5.";
        }
        elseif($form['note'] < 0)
        {
            $message = "Veuillez entrer une note entre 0 et 5.";
        }
        else
        {
            $message = "Le film a bien été ajouté à la vidéothèque.";
            $modelMovie = new Movie();
            $modelMovie->addMovie($form);
        }

        echo json_encode($message);
        //header("Location: /travaux/sil-da2i-td-rappels-web/index.php");
    }

    public function addFormAction()
    {
        $this->getBlock("View/admin/add_admin.php");
    }
}