<?php
require_once '../../global-library/config.php';
require_once '../../include/functions.php';
include '../data/data.php';

$sett = $conn->prepare("SELECT * FROM bs_setting");
$sett->execute();
$sett_data = $sett->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title><?php echo $sett_data['system_title']; ?></title>
    <!-- The styles -->
	<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/global-css.php'); ?>
	<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/misc-js.php'); ?>
</head>

<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
		<div class="white-box">
			<h3 class="box-title">Voter's Track</h3>		
			<div id="morris-donut-chart" style="height:270px;"></div>
		</div>
		
		<script type="text/javascript">
			$(function() {

				"use strict";

				// Morris donut chart

				Morris.Donut({
					element: 'morris-donut-chart',
					data: [{
						label: "Registered",
						value: <?php echo $vr_num; ?>,

					}, {
						label: "Un-Registered",
						value: <?php echo $vu_num; ?>
					}],
					
					resize: true,
					colors: ['#00b894', '#ffeaa7']
				});
			});
		</script>
		<br />
		<b style="margin-left:17px;">			
			Registered: <?php echo $vr_num; ?>
			&nbsp; | &nbsp;
			Un-Registered: <?php echo $vu_num; ?>			
		</b>
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/global-js.php'); ?>
</body>

</html>
