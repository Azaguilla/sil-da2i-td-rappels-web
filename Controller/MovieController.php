<?php

include_once "LordController.php";
include_once "Model/Movie.php";
/**
 * Created by PhpStorm.
 * User: Laurie
 * Date: 14/11/2018
 * Time: 10:36
 */

class MovieController extends LordController
{
    public function indexAction($id_film)
    {
        $film = new Movie();
        $data_infos_film  = $film->getBaseInfos($id_film);
        $data = $data_infos_film;

        $this->getBlock("View/viewHtml.php", $data);
    }
}