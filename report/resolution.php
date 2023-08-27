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
				<h3>Barangay Resolution Report</h3>
				<h4><?php echo $wfrom; ?> to <?php echo $wto; ?></h4>
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Item No.</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:150px;">Resolution No.</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel" style="width:350px;">Title</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel" style="width:100px;">Date Approved</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Committee / Others</td>
				
			</tr>
			<tr>
				<td colspan="20"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$reso = $conn->prepare("SELECT * FROM tbl_resolution
															WHERE (re_date BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																ORDER BY re_date");
										$reso->execute();
										$ctr1 = 1;
										while($reso_data = $reso->fetch())
										{
												$date = date("M d, Y", strtotime($reso_data['re_date']));
												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $reso_data['re_itemno']; ?></td>													
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top" style="width:150px;"><?php echo $reso_data['re_resno']; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><div style="width:350px;"><?php echo $reso_data['re_title']; ?></div></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $date; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $reso_data['re_committee']; ?></td>
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