	<div class="white-box">
		<h3 class="box-title">Government Program Beneficiaries Stats &nbsp; <a href="<?php echo WEB_ROOT; ?>graph/print/beneficiary.php" target=_new><i class="fa fa-print fa-fw"></i></a></h3>
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