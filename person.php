<?php 
$id_actor = $_GET['id'];

$bdd = connexion();
$query_person = $bdd->query('SELECT *
                        FROM person, picture, personhaspicture, movie, moviehasperson
                        WHERE movie.id = moviehasperson.idMovie
                        AND moviehasperson.idPerson = person.id
                        AND person.id = personhaspicture.idPerson
                        AND personhaspicture.idPicture = picture.id
                        AND person.id = "'.$id_actor.'"');
$query_filmo_img = $bdd->query('SELECT DISTINCT *
                                FROM movie, picture, moviehaspicture
                                WHERE movie.id = moviehaspicture.idMovie
                                AND moviehaspicture.idPicture = picture.id
                                AND movie.id IN
                                
                                (SELECT movie.id
                                FROM person, picture, personhaspicture, movie, moviehasperson
                                WHERE movie.id = moviehasperson.idMovie
                                AND moviehasperson.idPerson = person.id
                                AND person.id = personhaspicture.idPerson
                                AND personhaspicture.idPicture = picture.id
                                AND person.id = "'.$id_actor.'")');

$data_person = [
    'data_filmo_img' => $query_filmo_img->fetchAll(),
    'data_person' => $query_person->fetchAll()
];

$data_page_title = $data_person['data_person'][0]["firstname"]." ".$data_person['data_person'][0]["lastname"];
?>

<!DOCTYPE html>
<html lang="en">
	<?php getBlock('block/header.php', $data_page_title); ?>
	<body>
	<?php 
			getBlock('block/menu.php');
			getBlock('block/infos_personne.php', $data_person);
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