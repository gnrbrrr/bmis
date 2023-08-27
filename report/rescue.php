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
<style>
	@media print{
		@page{
			margin-top: 0;
		}
		@page :first{
			margin-top: 0;
		}

		@page :blank{
			margin-top:100;
		}
	}

	table {
		page-break-after : auto;
	}
</style>
<body onload="window.print();" style="background: url(../images/bmis_standard_head_big.png); background-repeat: no-repeat; background-size: 100% 25%;">
		<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3>Rescue Unit Report</h3>				
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:150px;">Patient Name</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:50px;">Age</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Gender</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:100px;">Contact No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:120px;">Date of Incident</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:200px;">Incident Case</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:100px;">Case Type</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:100px;">Time Reported</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:100px;">Time Incident</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:150px;">Location of Incident</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:150px;">Address</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Reported By</td>
				
			</tr>
			<tr>
				<td colspan="30"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$resc = $conn->prepare("SELECT * FROM tbl_rescue
															WHERE (ph_date_incident BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																ORDER BY ph_date_incident");
										$resc->execute();
										$ctr1 = 1;
										while($resc_data = $resc->fetch())
										{
												$date = date("M d, Y", strtotime($resc_data['ph_date_incident']));
												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:150px;"><?php echo $resc_data['ph_name']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:50px;"><?php echo $resc_data['ph_age']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $resc_data['ph_gender']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $resc_data['ph_contact']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:120px;"><?php echo $date; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:200px;"><?php echo $resc_data['ph_case']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $resc_data['ph_case_type']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $resc_data['ph_time_report']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $resc_data['ph_time_incident']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:150px;"><?php echo $resc_data['ph_location_incident']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:150px;"><?php echo $resc_data['ph_address']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $resc_data['ph_reported_by']; ?></td>
												</tr>
									<?php
										} // End While
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
</body>