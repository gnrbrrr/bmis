<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
		


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
				<h3>Business Report</h3>				
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Book No.</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Business Name</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Owner</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Contact No.</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Type</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Location</td>
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$emp = $conn->prepare("SELECT * FROM tbl_business
													WHERE is_deleted != '1' ORDER BY businessname");
										$emp->execute();
										if($emp->rowCount() > 0)
										{
											$ctr1 = 1;
											while($emp_data = $emp->fetch())
											{												
												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $emp_data['bookno']; ?></td>													
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $emp_data['businessname']; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['oname']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['ocontact']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['btype']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['badd']; ?></td>
												</tr>
									<?php
											} // End While
										}else{}
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
</body>