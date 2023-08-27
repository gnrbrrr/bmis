	<div class="white-box">
		<h3 class="box-title">Voter's Track &nbsp; <a href="<?php echo WEB_ROOT; ?>graph/print/voter.php" target=_new><i class="fa fa-print fa-fw"></i></a></h3>		
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