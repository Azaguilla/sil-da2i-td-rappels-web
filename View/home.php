<?php
/**
 * Created by PhpStorm.
 * User: Laurie
 * Date: 14/11/2018
 * Time: 09:16
 */
?>
<!DOCTYPE html>
<html lang="en">
	<?php HomeController::getBlock('View/header.php'); ?>

	<body>
		<?php
        HomeController::getBlock('View/menu.php');
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
            		foreach($data["movies"] as $film)
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
            		foreach($data["actors"] as $acteur)
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
            		foreach($data["directors"] as $realisateur)
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
        HomeController::getBlock('View/footer.php');
		?>
		</body>
</html>