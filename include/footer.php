<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
?>
<p class="pull-left">&copy; <?php echo $sett_data['system_title']; ?> <?php echo $sett_data['year_developed']; ?></p>
<p class="pull-right">Developed by: <?php echo $sett_data['developer']; ?> | <?php echo $sett_data['website']; ?></p>