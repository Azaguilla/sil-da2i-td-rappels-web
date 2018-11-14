<?php

include_once "Person.php";

class Director extends Person
{
    public function getAllDirectors()
    {
        $bdd = $this->dbConnect();

        $query = $bdd->query("SELECT DISTINCT person.id, person.lastname, person.firstname 
        FROM person, moviehasperson 
        WHERE moviehasperson.role = \"Réalisateur\" 
        AND person.id = moviehasperson.idPerson");

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