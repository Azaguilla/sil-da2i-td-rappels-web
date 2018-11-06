<?php 

foreach($data as $acteur)
{ ?>
<div class="bloc-acteur">
	<figure>
   		 <img src="<?php echo $acteur["path"]; ?>" alt="<?php echo $acteur["legend"]; ?>">
    	<figcaption><?php echo $acteur["lastname"]." ".$acteur["firstname"]; ?></figcaption>
    </figure>
    <p><?php echo $acteur["lastname"].$acteur["firstname"]; ?></p>
</div>
<?php 
}
    
    
    
?>
