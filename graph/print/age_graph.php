<?php
require_once '../../global-library/config.php';
require_once '../../include/functions.php';
include 'age_process.php';

$sett = $conn->prepare("SELECT * FROM bs_setting");
$sett->execute();
$sett_data = $sett->fetch();

	$gpt = "bar";
	
		
     if (!$link) {
         # code...
        echo "Problem in database connection! Contact administrator!" . mysqli_error();
     }else{
             $sql ="SELECT * FROM tr_graph_age ORDER BY pop_id";
             $result = mysqli_query($link,$sql);
             $chart_data="";
             while ($row = mysqli_fetch_array($result)) { 
     
                $productname[]  = $row['status']  ;
                $sales[] = $row['total'];
            }
     
     
     }     

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
			<h3 class="box-title">Age Demographics</h3>			
			<table>
			<?php
				$dta = $conn->prepare("SELECT * FROM tr_graph_age WHERE status != '' ORDER BY pop_id");
				$dta->execute();
				while($dta_data = $dta->fetch())
				{
			?>
					<tr>
						<td><?php echo $dta_data['status']; ?></td>
						<td style="width:17px;"></td>
						<td style="width:17px;"> : </td>
						<td><?php echo $dta_data['total']; ?></td>						
					</tr>
			<?php
				} // End While
			?>
			</table>
			<br />
			<div style="width:100%;height:170px;text-align:center; color:#ffffff;">			    
                <canvas id="chartjs_bar_gross"></canvas> 
            </div>
		</div>
		
		
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/global-js.php'); ?>
	
		<script src="../jquery.js"></script>
		<script src="../Chart.min.js"></script>
		<script type="text/javascript">
			  var ctx = document.getElementById("chartjs_bar_gross").getContext('2d');
						var myChart = new Chart(ctx, {
							type: '<?php echo $gpt; ?>',
							data: {
								labels:<?php echo json_encode($productname); ?>,
								datasets: [{
									backgroundColor: [
									   "#e17055",
										"#74b9ff",
										"#d63031",
										"#a29bfe",
										"#e84393",
										"#7040fa",
										"#ff004e"
									],
									data:<?php echo json_encode($sales); ?>,
								}]
							},
							options: {
								   legend: {
								display: false,
								position: 'bottom',
		 
								labels: {
									fontColor: '#71748d',
									fontFamily: 'Circular Std Book',
									fontSize: 14,
								}
							},
		 
		 
						}
						});
        </script>
</body>

</html>
