<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
		
	$dfrom = $_POST['dfrom'];
	$dto = $_POST['dto'];	
	
	# Format Date to match date in db
	$newfrom = date("Y-m-d", strtotime($dfrom));
	$newto = date("Y-m-d", strtotime($dto));	
	# Format Date to words
	$wfrom = date("M d, Y", strtotime($dfrom));	
	$wto = date("M d, Y", strtotime($dto));	


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;'
?>		
<head>		
<title>Vehicle Logs Report</title>
<link rel="shortcut icon" href="<?php echo WEB_ROOT; ?>images/favicon.ico">
<style rel="stylesheet">
.tdlabel
{   
   color: #000 !important;
   font-family: Arial !important;
   font-weight: bold;
   font-size:14px;
}
.tddata
{   
   color: #000 !important;
   font-family: Arial !important;  
   font-size:13px;
}
</style>
</head>
<body onload="window.print();" style="background: url(../images/bmis_standard_head_big.png); background-repeat: no-repeat; background-size: 100% 25%;">
		<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3>Vehicle List Report</h3>
			</td>
		</tr>
		<table>
		<br />
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Vehicle</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Plate No.</td>			
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$veht = $conn->prepare("SELECT * FROM tbl_vehicle_trip WHERE is_deleted != '1' ORDER BY trip_vehicle");
										$veht->execute();
										$ctr1 = 1;
										while($veht_data = $veht->fetch())
										{

												
									?>
											<tr>
												<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
												<td width="20px;">&nbsp;</td>													
												<td class="tddata" valign="top"><?php echo $veht_data['trip_vehicle']; ?></td>													
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $veht_data['trip_plate_num']; ?></td>
											</tr>
									<?php
										} // End While
									?>
									<tr>
										<td colspan="15"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="15" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
	</table>
<p style="page-break-after: always;"></p>
<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3>Vehicle Scheduled Trips Report</h3>
				<h4><?php echo $wfrom; ?> to <?php echo $wto; ?></h4>
			</td>
		</tr>
		<table>
		<br />
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Driver</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Vehicle</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Plate No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Reserved</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Time Reserved</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Activity</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Destination</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Dispatched</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Time Dispatched</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Returned</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">ODO Beginning</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">ODO Ending</td>
			</tr>
			<tr>
				<td colspan="30"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										$total = 0;
										$vehi = $conn->prepare("SELECT * FROM tbl_vehicle 
													WHERE (date_reserved BETWEEN '$newfrom' and '$newto') AND is_deleted != '1' 
																	ORDER BY date_reserved");
										$vehi->execute();
										while($vehi_data = $vehi->fetch())
										{
											$date_reserved = date("M d, Y", strtotime($vehi_data['date_reserved']));
											$date_dispatched = date("M d, Y", strtotime($vehi_data['date_dispatched']));
											$date_returned = date("M d, Y", strtotime($vehi_data['date_returned']));
											
											if($vehi_data['tr_id'] != 0)
											{
												$vehicle_id = $vehi_data['tr_id'];

												$veh = $conn->prepare("SELECT * FROM tbl_vehicle_trip WHERE tr_id = '$vehicle_id'");
												$veh->execute();
												$veh_data = $veh->fetch();

												$vehicle = $veh_data['trip_vehicle'];
												$plate = $veh_data['trip_plate_num'];
											}else{

											}
												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $vehi_data['driver']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $vehicle; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:60px;"><?php echo $plate; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $date_reserved; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $vehi_data['time_reserved']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $vehi_data['activity']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $vehi_data['destination']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $date_dispatched; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $vehi_data['time_dispatched']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $date_returned; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $vehi_data['odo_beginning']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $vehi_data['odo_ending']; ?></td>
												</tr>
									<?php
										}
									?>
									<tr>
										<td colspan="30"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="30" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
	</table>
<p style="page-break-after: always;"></p>
<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3>Vehicle Maintainance Report</h3>
				<h4><?php echo $wfrom; ?> to <?php echo $wto; ?></h4>
			</td>
		</tr>
		<table>
		<br />
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Vehicle</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Plate No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Corrective Maintenance</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Preventive Maintenance</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Predictive Maintenance</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Expenses</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date</td>
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										$total = 0;
										$vehm = $conn->prepare("SELECT * FROM tbl_vehicle_maint 
													WHERE (date_maintenance BETWEEN '$newfrom' and '$newto') AND is_deleted != '1' 
																	ORDER BY date_maintenance");
										$vehm->execute();
										while($vehm_data = $vehm->fetch())
										{
											$vehm_date = date("M d, Y", strtotime($vehm_data['date_maintenance']));

											$total += $vehm_data['expenses'];
											
											if($vehm_data['tr_id'] != 0)
											{
												$vehicle_id = $vehm_data['tr_id'];

												$veh = $conn->prepare("SELECT * FROM tbl_vehicle_trip WHERE tr_id = '$vehicle_id'");
												$veh->execute();
												$veh_data = $veh->fetch();

												$vehicle = $veh_data['trip_vehicle'];
												$plate = $veh_data['trip_plate_num'];
											}else{

											}
												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $vehicle; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:60px;"><?php echo $plate; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $vehm_data['corrective_maint']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $vehm_data['preventive_maint']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $vehm_data['predictive_maint']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top">&#8369;<?php echo number_format($vehm_data['expenses'], 2); ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $vehm_date; ?></td>
												</tr>
									<?php
										}
									?>
									<tr>
										<td colspan="15"><hr color='black' /></td>
									</tr>
									<tr>
										<td width="20px;">&nbsp;</td>													
										<td width="20px;">&nbsp;</td>					
										<td width="20px;">&nbsp;</td>
										<td width="20px;">&nbsp;</td>
										<td width="20px;">&nbsp;</td>
										<td width="20px;">&nbsp;</td>
										<td width="20px;">&nbsp;</td>
										<td width="20px;">&nbsp;</td>
										<td width="20px;">&nbsp;</td>
										<td width="20px;">&nbsp;</td>
										<td width="20px;">&nbsp;</td>
										<td width="20px;" valign="top"><span style="font-weight:bold; font-family:arial; font-size:13px; color:red;">Total:</span></td>
										<td class="tddata" valign="top">&#8369;<?php echo number_format($total, 2); ?></td>
										<td width="20px;">&nbsp;</td>
										<td width="20px;">&nbsp;</td>
									</tr>
									<tr>
										<td colspan="15"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="15" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
	</table>