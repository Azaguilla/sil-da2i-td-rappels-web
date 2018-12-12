<?php

include_once "Controller/LordController.php";
include_once "Model/Actor.php";
include_once "Model/Director.php";
include_once "Model/Movie.php";

/**
 * Controller d'entrée (gère la page d'accueil)
 * User: Laurie
 * Date: 14/11/2018
 * Time: 09:15
 */

class HomeController extends LordController
{
    public function IndexAction()
    {
        $movieManager = new Movie();
        $actorManager = new Actor();
        $directorManager = new Director();

        $movies = $movieManager->getAllMovies();
        $actors = $actorManager->getAllActors();
        $directors = $directorManager->getAllDirectors();
        $data_page_title = "Recueil des films";

        $data = array(
            "movies" => $movies,
            "actors" => $actors,
            "directors" => $directors,
            "page_title" => $data_page_title
        );
        $this->getBlock("View/home.php", $data);
    }
}