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
			<h3 class="box-title">Labor Force</h3>
			<ul class="list-inline text-right">
				<li>
					<h5><i class="fa fa-circle text-employed m-r-5"></i>Employed</h5> </li>
				<li>
					<h5><i class="fa fa-circle text-unemployed m-r-5"></i>Unemployed</h5> </li>
				<li>
					<h5><i class="fa fa-circle text-osy m-r-5"></i>Out of School Youth</h5> </li>
				
			</ul>
			<div id="extra-area-chart" style="height:170px;"></div>
		</div>
		
		<script type="text/javascript">
			$(function() {

				"use strict";

				// Extra chart
				Morris.Area({
					element: 'extra-area-chart',
					
					data: [{
						period: '2022',
						Employed: <?php echo $e2_num; ?>,
						Unemployed: <?php echo $u2_num; ?>,
						Osy: <?php echo $o2_num; ?>			
					}, {
						period: '2023',
						Employed: <?php echo $e3_num; ?>,
						Unemployed: <?php echo $u3_num; ?>,
						Osy: <?php echo $o3_num; ?>			
					}, {
						period: '2024',
						Employed: <?php echo $e4_num; ?>,
						Unemployed: <?php echo $u4_num; ?>,
						Osy: <?php echo $o4_num; ?>			
					}, {
						period: '2025',
						Employed: <?php echo $e5_num; ?>,
						Unemployed: <?php echo $u5_num; ?>,
						Osy: <?php echo $o5_num; ?>			
					}, {
						period: '2026',
						Employed: <?php echo $e6_num; ?>,
						Unemployed: <?php echo $u6_num; ?>,
						Osy: <?php echo $o6_num; ?>			
					}, {
						period: '2027',
						Employed: <?php echo $e7_num; ?>,
						Unemployed: <?php echo $u7_num; ?>,
						Osy: <?php echo $o7_num; ?>			
					}],
					
					lineColors: ['#55efc4', '#fdcb6e', '#81ecec'],
					xkey: 'period',
					ykeys: ['Employed', 'Unemployed', 'Osy'],
					labels: ['Employed', 'Unemployed', 'Out of School Youth'],
					pointSize: 0,
					lineWidth: 0,
					resize: true,
					fillOpacity: 0.8,
					behaveLikeLine: true,
					gridLineColor: '#e0e0e0',
					hideHover: 'auto'

				});
				

				
			});
		</script>
		<br />
		<b style="margin-left:17px;">
			Year: 2022 -
			Employed: <?php echo $e2_num; ?> -
			Unemployed: <?php echo $u2_num; ?> -
			Out of School Youth: <?php echo $o2_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2023 -
			Employed: <?php echo $e3_num; ?> -
			Unemployed: <?php echo $u3_num; ?> -
			Out of School Youth: <?php echo $o3_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2024 -
			Employed: <?php echo $e4_num; ?> -
			Unemployed: <?php echo $u4_num; ?> -
			Out of School Youth: <?php echo $o4_num; ?>
		</b>
		<br />
		<b style="margin-left:17px;">
			Year: 2025 -
			Employed: <?php echo $e5_num; ?> -
			Unemployed: <?php echo $u5_num; ?> -
			Out of School Youth: <?php echo $o5_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2026 -
			Employed: <?php echo $e6_num; ?> -
			Unemployed: <?php echo $u6_num; ?> -
			Out of School Youth: <?php echo $o6_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2027 -
			Employed: <?php echo $e7_num; ?> -
			Unemployed: <?php echo $u7_num; ?> -
			Out of School Youth: <?php echo $o7_num; ?>
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
