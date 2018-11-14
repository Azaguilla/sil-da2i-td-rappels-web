<?php
/**
 * Created by PhpStorm.
 * User: Laurie
 * Date: 14/11/2018
 * Time: 09:39
 */
include_once "Controller/HomeController.php";
include_once "Controller/MovieController.php";
include_once "Controller/PersonController.php";


if(isset($_GET['action'])){
    $url = $_GET['action'];
}
else{
    $url = "";
}

switch ($url) {
    case '' :
        $controller = new HomeController();
        $controller->IndexAction();
        break;
    case 'movie' :
        $controller = new MovieController();
        $controller->IndexAction();
        break;
    case 'person' :
        $controller = new PersonController();
        $controller->IndexAction();
        break;
    default:
        require 'View/404.php';
        break;
}