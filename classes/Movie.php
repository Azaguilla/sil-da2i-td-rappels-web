<?php
class Movie
{
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
    
    public function getAllMovies()
    {
        $bdd = $this->dbConnect();

        $query = $bdd->query("SELECT id, title
                                FROM movie");

        $data_film = $query->fetchAll();

        return $data_film;
    }


    /**
     * @param $id_movie
     * @return array
     */
    public function getDirectorFromMovie($id_movie)
    {
        $bdd = $this->dbConnect();

        $query = 'SELECT id
                        FROM person, movie, moviehasperson
                        WHERE movie.id = moviehasperson.idMovie
                        AND moviehasperson.idPerson = person.id
                        AND movie.id = :idMovie
                        AND moviehasperson.role = "Realisateur"';

        $stmt = $bdd->prepare($query);
        try
        {
            $queryParameters = [
                'idMovie' => $id_movie
            ];
            $stmt->execute($queryParameters);
            $director = $stmt->fetchAll();
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

        return $director;
    }

    /**
     * @param $id_movie
     * @return array
     */
    public function getActorsFromMovie($id_movie)
    {
        $bdd = $this->dbConnect();

        $query = 'SELECT id
                        FROM person, movie, moviehasperson
                        WHERE movie.id = moviehasperson.idMovie
                        AND moviehasperson.idPerson = person.id
                        AND movie.id = :idMovie
                        AND moviehasperson.role = "Acteur"';

        $stmt = $bdd->prepare($query);
        try
        {
            $queryParameters = [
                'idMovie' => $id_movie
            ];
            $stmt->execute($queryParameters);
            $actor = $stmt->fetchAll();
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

        return $actor;
    }

    private function dbConnect()
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
}