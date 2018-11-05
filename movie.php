<?php 
$id_film = $_GET['id'];


$bdd = connexion();


$query_infos_film = $bdd->query('SELECT * FROM movie');
$query_acteurs = $bdd->query('SELECT *
                            FROM person, movie, moviehasperson
                            WHERE movie.id = moviehasperson.idMovie
                            AND moviehasperson.idPerson = person.id
                            AND movie.id = "'.$id_film.'"
                            AND moviehasperson.role = "Acteur"');
$query_img = $bdd->query('SELECT picture.path, picture.legend
                        FROM person, picture, personhaspicture, movie, moviehasperson
                        WHERE movie.id = moviehasperson.idMovie
                        AND moviehasperson.idPerson = person.id
                        AND person.id = personhaspicture.idPerson 
                        AND personhaspicture.idPicture = picture.id
                        AND movie.id = "'.$id_film.'"');
$query_realisateur = $bdd->query('SELECT * 
                                FROM person, movie, moviehasperson 
                                WHERE movie.id = moviehasperson.idMovie 
                                AND moviehasperson.idPerson = person.id 
                                AND movie.id = "'.$id_film.'" 
                                AND moviehasperson.role = "Réalisateur"');
$data_infos_film  = $query_infos_film->fetch();
$data_realisateur = $query_realisateur->fetch();
$data_acteurs = $query_acteurs->fetch();


?>

<!DOCTYPE html>
<html lang="en">
	<?php getBlock('block/header.php'); ?>
	
	<body>
		<?php 
			getBlock('block/menu.php');
			getBlock('block/infos_film.php', $data_infos_film);
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