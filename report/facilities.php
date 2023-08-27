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
				<h3>Facilities Report</h3>				
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Working No.</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Status</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Issue Title</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Requested By</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Requested Date</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Facility</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Product Material</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Urgency</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Location</td>
				
			</tr>
			<tr>
				<td colspan="20"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$fac = $conn->prepare("SELECT * FROM tbl_facility
															WHERE (req_date BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																ORDER BY req_date");
										$fac->execute();
										$ctr1 = 1;
										while($fac_data = $fac->fetch())
										{
												$date = date("M d, Y", strtotime($fac_data['req_date']));
												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $fac_data['work_num']; ?></td>													
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $fac_data['status']; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $fac_data['issue_title']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $fac_data['req_by']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $date; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $fac_data['facility']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $fac_data['product']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $fac_data['urgency']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $fac_data['location']; ?></td>
												</tr>
									<?php
										} // End While
									?>
									<tr>
										<td colspan="20"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="20" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>
		</td></tr>
		</table>
</body>