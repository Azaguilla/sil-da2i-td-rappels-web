<?php

abstract class Person
{
    protected function dbConnect()
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        // Informations de connection a la BDD
        $host = 'localhost';
        $dbname = 'film';
        $user = 'root';
        $password = '';
        // Connection
        $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8', $user, $password, $pdo_options);
        return $db;
    }

    public abstract function getBaseInfos($id);
}