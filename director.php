<!DOCTYPE html>
<html lang="en">
	<?php getBlock('block/header.php'); ?>
	<body>
	<?php 
			getBlock('block/menu.php');
			getBlock('block/infos_personne.php');
			getBlock('block/footer.php');
		?>
		
	</body>
</html>

<?php 
	function getBlock($file, $data = array())
	{
		require $file;
	}		
?>