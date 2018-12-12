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
	<?php MovieController::getBlock('View/header.php', "test"); ?>

	<body>
		<?php
            MovieController::getBlock('View/menu.php');
            MovieController::getBlock('View/infos_film.php', $data);
            MovieController::getBlock('View/footer.php');
		?>

	</body>
</html>