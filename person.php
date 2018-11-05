<?php 
$id_actor = $_GET['id'];

$bdd = connexion();

$query_person =  $bdd->query('SELECT * FROM person WHERE id="'.$id_actor.'"');

$data_person = $query_person->fetch();
?>

<!DOCTYPE html>
<html lang="en">
	<?php getBlock('block/header.php'); ?>
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