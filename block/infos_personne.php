<main class="realisateur">
	<article class="real">
		<h1><?php echo $data["firstname"]." ".$data["lastname"]; ?></h1>
		<div class="underline"></div>
		<section class="infos-real">
			<div class="image-real">
				<figure>
               		 <img src="img/peter-jackson.jpg" alt="Photo du réalisateur Peter Jackson">
                	<figcaption><?php echo $data["firstname"]." ".$data["lastname"]; ?></figcaption>
                </figure>
			</div>
			<div  class="infos">
				<p><span class="bold">Nom</span> : <?php echo $data["firstname"] ?></p>
				<p><span class="bold">Prénom</span> :  <?php echo $data["lastname"] ?></p>
				<p><span class="bold">Date de naissance</span> : <time> <?php echo $data["birthDate"] ?></time></p>
				<p><span class="bold">Films Principaux</span> : Le Seigneur des Anneaux : La communauté de l'anneau, Le Seigneur des Anneaux  : Les Deux Tours, Le Seigneur des Anneaux: Le Retour du Roi... </p>
			</div>
		</section>
		<section class="bibliographie">
			<h2>Bibliographie</h2>
			<p><?php echo $data["biography"] ?></p>
		</section>
		<?php getBlock('block/filmographie.php'); ?>
	</article>
</main>