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
			<h3 class="box-title">Government Program Beneficiaries Stats</h3>
			<ul class="list-inline text-right">
				<li>
					<h5><i class="fa fa-circle text-fps m-r-5"></i>4P's</h5> </li>
				<li>
					<h5><i class="fa fa-circle text-ind m-r-5"></i>Indigenous People</h5> </li>
				<li>
					<h5><i class="fa fa-circle text-pwd m-r-5"></i>PWD</h5> </li>
				<li>
					<h5><i class="fa fa-circle text-sol m-r-5"></i>Solo Parent</h5> </li>
				
			</ul>
			<div id="morris-area-chart2" style="height:200px;"></div>
		</div>
		
		<script type="text/javascript">
			$(function() {

				"use strict";

				// Dashboard 1 Morris-chart

				Morris.Area({
					element: 'morris-area-chart2',
					data: [{
						period: '2022',
						fps: <?php echo $fp2_num; ?>,
						ind: <?php echo $ind2_num; ?>,
						pwd: <?php echo $pwd2_num; ?>,
						sol: <?php echo $sol2_num; ?>		
					}, {
						period: '2023',
						fps: <?php echo $fp3_num; ?>,
						ind: <?php echo $ind3_num; ?>,
						pwd: <?php echo $pwd3_num; ?>,
						sol: <?php echo $sol3_num; ?>		
					}, {
						period: '2024',
						fps: <?php echo $fp4_num; ?>,
						ind: <?php echo $ind4_num; ?>,
						pwd: <?php echo $pwd4_num; ?>,
						sol: <?php echo $sol4_num; ?>		
					}, {
						period: '2025',
						fps: <?php echo $fp5_num; ?>,
						ind: <?php echo $ind5_num; ?>,
						pwd: <?php echo $pwd5_num; ?>,
						sol: <?php echo $sol5_num; ?>		
					}, {
						period: '2026',
						fps: <?php echo $fp6_num; ?>,
						ind: <?php echo $ind6_num; ?>,
						pwd: <?php echo $pwd6_num; ?>,
						sol: <?php echo $sol6_num; ?>		
					}, {
						period: '2027',
						fps: <?php echo $fp7_num; ?>,
						ind: <?php echo $ind7_num; ?>,
						pwd: <?php echo $pwd7_num; ?>,
						sol: <?php echo $sol7_num; ?>		
					}],
					
					xkey: 'period',
					ykeys: ['fps', 'ind', 'pwd', 'sol'],
					labels: ['4Ps', 'Indigenous', 'PWD', 'Solo Parent'],
					pointSize: 0,
					fillOpacity: 0.4,
					pointStrokeColors: ['#00cec9', '#fab1a0', '#0984e3', '#ff7675'],
					behaveLikeLine: true,
					gridLineColor: '#e0e0e0',
					lineWidth: 0,
					smooth: false,
					hideHover: 'auto',
					lineColors: ['#00cec9', '#fab1a0', '#0984e3', '#ff7675'],
					resize: true

				});
				

				
			});
		</script>
		<br />
		<b style="margin-left:17px;">
			Year: 2022 -
			4Ps: <?php echo $fp2_num; ?> -
			Indigenous: <?php echo $ind2_num; ?> -
			PWD: <?php echo $pwd2_num; ?> - 
			Solo Parent: <?php echo $sol2_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2023 -
			4Ps: <?php echo $fp3_num; ?> -
			Indigenous: <?php echo $ind3_num; ?> -
			PWD: <?php echo $pwd3_num; ?> - 
			Solo Parent: <?php echo $sol3_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2024 -
			4Ps: <?php echo $fp4_num; ?> -
			Indigenous: <?php echo $ind4_num; ?> -
			PWD: <?php echo $pwd4_num; ?> - 
			Solo Parent: <?php echo $sol4_num; ?>
		</b>
		<br />
		<b style="margin-left:17px;">
			Year: 2025 -
			4Ps: <?php echo $fp5_num; ?> -
			Indigenous: <?php echo $ind5_num; ?> -
			PWD: <?php echo $pwd5_num; ?> - 
			Solo Parent: <?php echo $sol5_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2026 -
			4Ps: <?php echo $fp6_num; ?> -
			Indigenous: <?php echo $ind6_num; ?> -
			PWD: <?php echo $pwd6_num; ?> - 
			Solo Parent: <?php echo $sol6_num; ?>
		</b>
		&nbsp; &nbsp; |
		<b style="margin-left:17px;">
			Year: 2027 -
			4Ps: <?php echo $fp7_num; ?> -
			Indigenous: <?php echo $ind7_num; ?> -
			PWD: <?php echo $pwd7_num; ?> - 
			Solo Parent: <?php echo $sol7_num; ?>
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
