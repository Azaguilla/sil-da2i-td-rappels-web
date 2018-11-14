<?php

include "classes/Movie.php";

$id_film = $_GET['id'];


$bdd = connexion();

$test = new Movie();
echo "<pre>";
var_dump($test->getBaseInfos($id_film));
echo "</pre>";

$film = new Movie();
$data_infos_film  = $film->getBaseInfos($id_film);
$data_realisateur = $query_realisateur->fetchAll();
$data_acteurs = $query_acteurs->fetchAll();


$query_infos_film = $bdd->query("SELECT * 
                                FROM picture, moviehaspicture, movie 
                                WHERE movie.id = moviehaspicture.idMovie 
                                AND moviehaspicture.idPicture = picture.id 
                                AND movie.id = \"'.$id_film.'\"");
$query_acteurs = $bdd->query('SELECT *
                        FROM person, picture, personhaspicture, movie, moviehasperson
                        WHERE movie.id = moviehasperson.idMovie
                        AND moviehasperson.idPerson = person.id
                        AND person.id = personhaspicture.idPerson 
                        AND personhaspicture.idPicture = picture.id
                        AND movie.id = "'.$id_film.'"
                        AND moviehasperson.role = "Acteur"');
$query_realisateur = $bdd->query('SELECT *
                        FROM person, picture, personhaspicture, movie, moviehasperson
                        WHERE movie.id = moviehasperson.idMovie
                        AND moviehasperson.idPerson = person.id
                        AND person.id = personhaspicture.idPerson 
                        AND personhaspicture.idPicture = picture.id
                        AND movie.id = "'.$id_film.'"
                        AND moviehasperson.role = "Realisateur"');
$data_infos_film  = $query_infos_film->fetchAll();
$data_realisateur = $query_realisateur->fetchAll();
$data_acteurs = $query_acteurs->fetchAll();

$datas = [
    'data_infos_film' => $data_infos_film,
    'data_realisateur' => $data_realisateur,
    'data_acteurs' => $data_acteurs
];

$data_page_title = $datas["data_infos_film"][0]["title"];

/* EXEMPLE
$persons = $query_img->fetchAll();

foreach ($persons as $person)
{
    echo '<div class="bloc-acteur">
    <figure>
    <img src="'.$person["path"].'" alt="'.$person["legend"].'">
    <figcaption>'.$person["lastname"]." ".$person["firstname"].'</figcaption>
    </figure>
    <p>'.$person["lastname"]." ".$person["firstname"].'</p>
</div>';
}
*/


?>

<!DOCTYPE html>
<html lang="en">
	<?php getBlock('block/header.php', $data_page_title); ?>
	
	<body>
		<?php 
			getBlock('block/menu.php');
			getBlock('block/infos_film.php', $datas);
			getBlock('block/footer.php');
		?>
	</body>
</html>

<?php 

function getBlock($file, $data = array())
{
	require $file;
}	

//----------------------------------------------------------------------
// Connexion ) la BDD
function connexion()
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
?>