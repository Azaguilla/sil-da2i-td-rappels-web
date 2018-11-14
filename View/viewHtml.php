<?php
/**
 * Created by PhpStorm.
 * User: Laurie
 * Date: 14/11/2018
 * Time: 10:41
 */
?>
<!DOCTYPE html>
<html lang="en">
	<?php getBlock('View/header.php', $data_page_title); ?>

	<body>
		<?php
			getBlock('View/menu.php');
			getBlock('View/infos_film.php', $datas);
			getBlock('View/footer.php');
		?>
	</body>
</html>