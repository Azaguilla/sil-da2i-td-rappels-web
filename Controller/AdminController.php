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
        $modelMovie = new Movie();
        $modelMovie->addMovie($form);

        header("Location: /travaux/sil-da2i-td-rappels-web/index.php");
    }

    public function addFormAction()
    {
        $this->getBlock("View/admin/add_admin.php");
    }
}