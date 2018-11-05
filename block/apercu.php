<?php 

foreach($data as $acteur)
{ ?>
<div class="bloc-acteur">
	<figure>
   		 <img src="img/ian_mckellen.png" alt="L'acteur Ian McKellen">
    	<figcaption><?php echo $acteur["lastname"]." ".$acteur["firstname"]; ?></figcaption>
    </figure>
    <p><?php echo $acteur["lastname"].$acteur["firstname"]; ?></p>
</div>
<?php 
}
    
    
    
?>
