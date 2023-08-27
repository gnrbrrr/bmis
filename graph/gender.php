	<div class="white-box">
		<h3 class="box-title">Population Statistic &nbsp; <a href="<?php echo WEB_ROOT; ?>graph/print/gender.php" target=_new><i class="fa fa-print fa-fw"></i></a></h3>
		<ul class="list-inline text-right">
			<li>
				<h5><i class="fa fa-circle text-info m-r-5"></i>Population</h5> </li>
			<li>
				<h5><i class="fa fa-circle text-warning m-r-5"></i>Male</h5> </li>
			<li>
				<h5><i class="fa fa-circle text-purple m-r-5"></i>Female</h5> </li>
			<li>
				<h5><i class="fa fa-circle text-black m-r-5"></i>Deceased</h5> </li>
			
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
					Female: <?php echo $f2_num; ?>,
					Deceased: <?php echo $d2_num; ?>
				}, {
					period: '2023',
					Population: <?php echo $y3_num; ?>,
					Male: <?php echo $m3_num; ?>,
					Female: <?php echo $f3_num; ?>,	
					Deceased: <?php echo $d3_num; ?>		
				}, {
					period: '2024',
					Population: <?php echo $y4_num; ?>,
					Male: <?php echo $m4_num; ?>,
					Female: <?php echo $f4_num; ?>,	
					Deceased: <?php echo $d4_num; ?>		
				}, {
					period: '2025',
					Population: <?php echo $y5_num; ?>,
					Male: <?php echo $m5_num; ?>,
					Female: <?php echo $f5_num; ?>,	
					Deceased: <?php echo $d5_num; ?>		
				}, {
					period: '2026',
					Population: <?php echo $y6_num; ?>,
					Male: <?php echo $m6_num; ?>,
					Female: <?php echo $f6_num; ?>,	
					Deceased: <?php echo $d6_num; ?>		
				}, {
					period: '2027',
					Population: <?php echo $y7_num; ?>,
					Male: <?php echo $m7_num; ?>,
					Female: <?php echo $f7_num; ?>,	
					Deceased: <?php echo $d7_num; ?>	
				}],
				
				xkey: 'period',
				ykeys: ['Population', 'Male', 'Female', 'Deceased'],
				labels: ['Population', 'Male', 'Female', 'Deceased'],
				pointSize: 3,
				fillOpacity: 0,
				pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad', '#000000'],
				behaveLikeLine: true,
				gridLineColor: '#e0e0e0',
				lineWidth: 1,
				hideHover: 'auto',
				lineColors: ['#00bbd9', '#ffb136', '#4a23ad', '#000000'],
				resize: true

			});
			

			
		});
	</script>