<main class="main-film">
		<aside class="real">
			<h2>Le Réalisateur</h2>
			<div class="underline"></div>
			<figure>
           		 <img src="<?php echo $data["data_realisateur"][0]["path"]; ?>" alt="<?php echo $data["data_realisateur"][0]["legend"]; ?>">
            	<figcaption>Le réalisateur <?php echo $data["data_realisateur"][0]["firstname"]." ".$data["data_realisateur"][0]["firstname"] ;?></figcaption>
            </figure>
            <h3>Peter Jackson</h3>
            <a class="savoir" href="person.php?id=<?php echo $data["data_realisateur"][0]["idPerson"]; ?>">En savoir plus</a>
		</aside>


		<article class="film">
			<h1><?php echo $data["data_infos_film"][0]["title"]; ?></h1>
			<div class="underline"></div>
			<section class="infos-film">
				<div class="image-film">
					<figure>
                   		 <img src="<?php echo $data["data_infos_film"][0]["path"]; ?>" alt="<?php echo $data["data_infos_film"][0]["legend"]; ?>">
                    	<figcaption>Affiche du film <?php echo $data["data_infos_film"][0]["title"]; ?></figcaption>
                    </figure>
				</div>
				<div class="infos">
					<p><span class="bold">Date de sortie</span> : <time><?php echo $data["data_infos_film"][0]["releaseDate"]; ?></time></p>
					<p><span class="bold">Acteurs pricipaux</span> : <?php 
					foreach ($data["data_acteurs"] as $acteurs)
					{
					    echo $acteurs["firstname"]." ".$acteurs["lastname"].", ";
					}
					?>
					</p>
					<p><span class="bold">Note </span>: <meter min=0 max=5 value=<?php echo $data["data_infos_film"][0]["rating"]; ?> ><?php echo $data["data_infos_film"][0]["rating"]; ?>/5</meter> <?php echo $data["data_infos_film"][0]["rating"]; ?>/5</p>
				</div>
			</section>
			<section class="synopsis">
				<h2>Synopsis</h2>
				<p>
					<?php echo $data["data_infos_film"][0]["synopsis"]; ?>
				</p>
			</section>
			<section class="acteurs">
				<h2>Acteurs principaux</h2>
				<div class="contenu-acteur">
				<?php getBlock('View/apercu.php', $data["data_acteurs"]); ?>
				</div>
			</section>
		</article>
	</main>