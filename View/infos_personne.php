<main class="realisateur">
	<article class="real">
		<h1><?php echo $data['data_person'][0]["firstname"]." ".$data['data_person'][0]["lastname"]; ?></h1>
		<div class="underline"></div>
		<section class="infos-real">
			<div class="image-real">
				<figure>
               		 <img src="<?php echo $data['data_person'][0]["path"] ?>" alt="<?php echo $data['data_person'][0]["legend"] ?>">
                	<figcaption><?php echo $data['data_person'][0]["firstname"]." ".$data['data_person'][0]["lastname"]; ?></figcaption>
                </figure>
			</div>
			<div  class="infos">
				<p><span class="bold">Nom</span> : <?php echo $data['data_person'][0]["firstname"] ?></p>
				<p><span class="bold">Prénom</span> :  <?php echo $data['data_person'][0]["lastname"] ?></p>
				<p><span class="bold">Date de naissance</span> : <time> <?php echo $data['data_person'][0]["birthDate"] ?></time></p>
				<p><span class="bold">Films Principaux</span> : 
				<?php foreach($data['data_person'] as $infos_person)
				{
				    echo $infos_person["title"].", ";
				}
				
				?>
				
				
				</div>
		</section>
		<section class="bibliographie">
			<h2>Bibliographie</h2>
			<p><?php echo $data['data_person'][0]["biography"] ?></p>
		</section>
		<?php getBlock('View/filmographie.php', $data['data_filmo_img']); ?>
	</article>
</main>