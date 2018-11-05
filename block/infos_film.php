<?php 

$bdd = connexion();

$query_acteurs = $bdd->query('SELECT DISTINCT *
                        FROM person, picture, personhaspicture, movie, moviehasperson
                        WHERE movie.id = moviehasperson.idMovie
                        AND moviehasperson.idPerson = person.id
                        AND person.id = personhaspicture.idPerson 
                        AND personhaspicture.idPicture = picture.id
                        AND movie.id = "1"');

$data_acteurs = $query_acteurs->fetchAll();
echo "<pre>";
var_dump($data_acteurs);
echo "</pre>";

?>

<main class="main-film">
		<aside class="real">
			<h2>Le Réalisateur</h2>
			<div class="underline"></div>
			<figure>
           		 <img src="img/peter-jackson.jpg" alt="Photo du réalisateur Peter Jackson">
            	<figcaption>Le réalisateur Peter Jackson</figcaption>
            </figure>
            <h3>Peter Jackson</h3>
            <a class="savoir" href="director.html">En savoir plus</a>
		</aside>
		<article class="film">
			<h1><?php echo $data["title"]; ?></h1>
			<div class="underline"></div>
			<section class="infos-film">
				<div class="image-film">
					<figure>
                   		 <img src="img/le_seigneur_des_anneaux_la_communaute_de_l_anneau.jpg" alt="Affiche du film Le Seigneur des Anneaux : La Communauté de l'Anneau">
                    	<figcaption>Affiche du film <?php echo $data["title"]; ?></figcaption>
                    </figure>
				</div>
				<div class="infos">
					<p><span class="bold">Date de sortie</span> : <time><?php echo $data["releaseDate"]; ?></time></p>
					<p><span class="bold">Acteurs pricipaux</span> : Ellijah Wood, Sean Astin, Ian McKellen, Viggo Mortensen</p>
					<p><span class="bold">Note </span>: <meter min=0 max=5 value=<?php echo $data["rating"]; ?> ><?php echo $data["rating"]; ?>/5</meter> <?php echo $data["rating"]; ?>/5</p>
				</div>
			</section>
			<section class="synopsis">
				<h2>Synopsis</h2>
				<p>
					<?php echo $data["synopsis"]; ?>
				</p>
			</section>
			<section class="acteurs">
				<h2>Acteurs principaux</h2>
				<div class="contenu-acteur">
				<?php getBlock('block/apercu.php', $data_acteurs); ?>
    				<div class="bloc-acteur">
    					<figure>
                       		 <img src="img/ellijah_wood.png" alt="L'acteur Ellijah Wood">
                        	<figcaption>L'acteur Ellijah Wood</figcaption>
                        </figure>
                        <p>Ellijah Wood</p>
    				</div>
    				<div class="bloc-acteur">
    					<figure>
                       		 <img src="img/sean_austin.png" alt="L'acteur Sean Astin">
                        	<figcaption>L'acteur Sean Astin</figcaption>
                        </figure>
                        <p>Sean Astin</p>
    				</div>
    				<div class="bloc-acteur">
    					<figure>
                       		 <img src="img/ian_mckellen.png" alt="L'acteur Ian McKellen">
                        	<figcaption>L'acteur Ian McKellen</figcaption>
                        </figure>
                        <p>Ian McKellen</p>
    				</div>
    				<div class="bloc-acteur">
    					<figure>
                       		 <img src="img/viggo_mortensen.png" alt="L'acteur Viggo Mortensen">
                        	<figcaption>L'acteur Viggo Mortensen</figcaption>
                        </figure>
                        <p>Viggo Mortensen</p>
    				</div>
				</div>
			</section>
		</article>
	</main>