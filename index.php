<?php 

$bdd = connexion();


$query_films = $bdd->query('SELECT id, title FROM movie');
$query_acteurs = $bdd->query('SELECT person.id, person.lastname, person.firstname FROM person, moviehasperson WHERE moviehasperson.role = "Acteur" AND person.id = moviehasperson.idPerson');
$query_realisateurs = $bdd->query('SELECT person.id, person.lastname, person.firstname FROM person, moviehasperson WHERE moviehasperson.role = "Réalisateur" AND person.id = moviehasperson.idPerson');
$data_films  = $query_films->fetchAll();
$data_realisateurs = $query_realisateurs->fetchAll();
$data_acteurs = $query_acteurs->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
	<?php getBlock('block/header.php'); ?>
	
	<body>
		<?php 
			getBlock('block/menu.php');
		?>
		<main class="liste">
    		<article class="content-liste">
        		<div class="titre-index">
            		<h1>INFORMATIONS PAR CATEGORIE</h1>
        			<div class="underline titre-index"></div>
        		</div>
        		<section>
            		<h2>Les films</h2>
            		
            		<ul>
            		<?php 
            		foreach($data_films as $film)
            		{
            		    ?>
            		    <li>
                		    <a href="movie.php?id=<?php echo $film["id"]; ?>">
                		    	<?php echo $film["title"]; ?>
                		    </a>
            		    </li>
            		<?php 
            		}
            		?>
            		</ul>
        		</section>
        		
        		<section>
            		<h2>Les acteurs</h2>
            		<ul>
            		<?php 
            		foreach($data_acteurs as $acteur)
            		{
            		    ?>
            		    <li>
                		    <a href="person.php?id=<?php echo $acteur["id"]; ?>">
                		    	<?php echo $acteur["lastname"]." ".$acteur["firstname"]; ?>
                		    </a>
            		    </li>
            		<?php 
            		}
            		?>
            		
            		</ul>
        		</section>
        		
        		<section>
            		<h2>Les réalisateurs</h2>
            		<ul>
            		<?php 
            		foreach($data_realisateurs as $realisateur)
            		{
            		    ?>
            		    <li>
                		    <a href="person.php?id=<?php echo $realisateur["id"]; ?>">
                		    	<?php echo $realisateur["lastname"]." ".$realisateur["firstname"]; ?>
                		    </a>
            		    </li>
            		<?php 
            		}
            		?>
            		
            		</ul>
        		</section>
    		</article>
		
		</main>
		
		<?php 
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