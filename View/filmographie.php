<section class="filmo">
	<h2>Filmographie</h2>
	<div class="contenu-filmo">
		<?php foreach($data as $infos_film)
                {
                    echo "<div class='bloc-filmo'>
                		    <figure>
                			    <img src='".$infos_film["path"]."' alt='".$infos_film["legend"]."'>
                			    <figcaption>".$infos_film["legend"]."</figcaption>
                            </figure>
                            <p>".$infos_film["title"]."</p>
                        </div>";
                }?>
	</div>
</section>		
				