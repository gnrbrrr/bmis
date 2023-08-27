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
				<h3>Development Project Report</h3>				
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;" >&nbsp;</td>
				<td class="tdlabel" style="width:200px;">Project Title</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:200px;">Project Leader</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Project location</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Source of Funds</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Project Cost</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel" style="width:200px;">Target Completion Date</td>
				<td width="20px;">&nbsp;</td>	
				
				<td class="tdlabel">Company Name</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel" style="width:200px;">Contact Person</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Position</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel" style="width:300px;">Contact No.</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel" style="width:500px;">Company Address</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Status</td>
				
			</tr>
			<tr>
				<td colspan="30"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$fac = $conn->prepare("SELECT * FROM tbl_project
															WHERE (p_date BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																ORDER BY p_date");
										$fac->execute();
										$ctr1 = 1;
										while($fac_data = $fac->fetch())
										{
												$date = date("M d, Y", strtotime($fac_data['p_date']));

											if ($fac_data['is_contractor'] == 1){
												$compName = $fac_data['p_compname'];
												$contactPerson = $fac_data['p_contactp'];
												$position = $fac_data['p_position'];
												$contact = $fac_data['p_contactno'];
												$compAdd = $fac_data['p_caddress'];
											}else {
												$compName = "-- --";
												$contactPerson = "-- --";
												$position = "-- --";
												$contact = "-- --";
												$compAdd = "-- --";
											}
												
									?>
												<tr>
													<td class="tddata" valign="top" ><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top" style="width:200px;"><?php echo $fac_data['p_title']; ?></td>													
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top" style="width:200px;"><?php echo $fac_data['p_leader']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" ><?php echo $fac_data['p_location']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" ><?php echo $fac_data['p_source']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" >&#8369;<?php echo number_format($fac_data['p_cost'], 2); ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:200px;"><?php echo $date; ?></td>
												
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" ><?php echo $compName; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:200px;"><?php echo $contactPerson; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" ><?php echo $position; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:300px;"><?php echo $contact; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:500px;"><?php echo  $compAdd; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $fac_data['p_status']; ?></td>

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