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
		<h3 class="box-title">Population Statistic</h3>
		<ul class="list-inline text-right">
			<li>
				<h5><i class="fa fa-circle text-info m-r-5"></i>Population</h5> </li>
			<li>
				<h5><i class="fa fa-circle text-warning m-r-5"></i>Male</h5> </li>
			<li>
				<h5><i class="fa fa-circle text-purple m-r-5"></i>Female</h5> </li>
			
		</ul>
		<div id="morris-area-chart" style="height:170px;"></div>
	</div>
	
		<script type="text/javascript">
			$(function() {

				"use strict";

				// Dashboard 1 Morris-chart

				Morris.Area({
					element: 'morris-area-chart',
					data: [{
						period: '2022',
						Population: <?php echo $y2_num; ?>,
						Male: <?php echo $m2_num; ?>,
						Female: <?php echo $f2_num; ?>			
					}, {
						period: '2023',
						Population: <?php echo $y3_num; ?>,
						Male: <?php echo $m3_num; ?>,
						Female: <?php echo $f3_num; ?>			
					}, {
						period: '2024',
						Population: <?php echo $y4_num; ?>,
						Male: <?php echo $m4_num; ?>,
						Female: <?php echo $f4_num; ?>			
					}, {
						period: '2025',
						Population: <?php echo $y5_num; ?>,
						Male: <?php echo $m5_num; ?>,
						Female: <?php echo $f5_num; ?>			
					}, {
						period: '2026',
						Population: <?php echo $y6_num; ?>,
						Male: <?php echo $m6_num; ?>,
						Female: <?php echo $f6_num; ?>			
					}, {
						period: '2027',
						Population: <?php echo $y7_num; ?>,
						Male: <?php echo $m7_num; ?>,
						Female: <?php echo $f7_num; ?>			
					}],
					
					xkey: 'period',
					ykeys: ['Population', 'Male', 'Female'],
					labels: ['Population', 'Male', 'Female'],
					pointSize: 3,
					fillOpacity: 0,
					pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
					behaveLikeLine: true,
					gridLineColor: '#e0e0e0',
					lineWidth: 1,
					hideHover: 'auto',
					lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
					resize: true

				});
				

				
			});
		</script>
		<br />
		<b style="margin-left:17px;">
			Year: 2022 -
			Population: <?php echo $y2_num; ?> -
			Male: <?php echo $m2_num; ?> -
			Female: <?php echo $f2_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2023 -
			Population: <?php echo $y3_num; ?> -
			Male: <?php echo $m3_num; ?> -
			Female: <?php echo $f3_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2024 -
			Population: <?php echo $y4_num; ?> -
			Male: <?php echo $m4_num; ?> -
			Female: <?php echo $f4_num; ?>
		</b>
		<br />
		<b style="margin-left:17px;">
			Year: 2025 -
			Population: <?php echo $y5_num; ?> -
			Male: <?php echo $m5_num; ?> -
			Female: <?php echo $f5_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2026 -
			Population: <?php echo $y6_num; ?> -
			Male: <?php echo $m6_num; ?> -
			Female: <?php echo $f6_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2027 -
			Population: <?php echo $y7_num; ?> -
			Male: <?php echo $m7_num; ?> -
			Female: <?php echo $f7_num; ?>
		</b>
		<br />
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/global-js.php'); ?>
</body>

</html>
