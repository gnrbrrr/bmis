	<div class="white-box">
		<h3 class="box-title">Labor Force &nbsp; <a href="<?php echo WEB_ROOT; ?>graph/print/employment.php" target=_new><i class="fa fa-print fa-fw"></i></a></h3>
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