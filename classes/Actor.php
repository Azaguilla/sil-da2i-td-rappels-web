<?php

include "Person.php";

class Actor extends Person
{
    public function getAllActors()
    {
        $bdd = $this->dbConnect();

        $query = $bdd->query("SELECT * 
                                FROM picture, moviehaspicture, movie 
                                WHERE movie.id = moviehaspicture.idMovie 
                                AND moviehaspicture.idPicture = picture.id");

        $data = $query->fetchAll();

        return $data;
    }

    public function getBaseInfos($id)
    {
        $bdd = $this->dbConnect();

        $query = "SELECT * 
                  FROM picture, moviehaspicture, movie 
                  WHERE movie.id = moviehaspicture.idMovie 
                  AND moviehaspicture.idPicture = picture.id
                  AND movie.id = :idFilm";

        $stmt = $bdd->prepare($query);
        try
        {
            $queryParameters = [
                'idFilm' => $id
            ];
            $stmt->execute($queryParameters);
            $film = $stmt->fetchAll();
        }
        catch (PDOException $e)
        {?>
            <strong> Caught <?= get_class($e) ?></strong>: <?= $e->getMessage() ?><br />
            Query <?= $query ?><br />
            Query parameters: <pre><?= var_export($queryParameters, true) ?></pre><br />
            Exception trace: <pre><?= $e->getTraceAsString() ?></pre>
            <?php
            die();
        }

        return $film;
    }
}