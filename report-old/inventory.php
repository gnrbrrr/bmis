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
<title>Inventory Report</title>
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
		<table style="margin:auto;">
		<tr>
			<td><img src="<?php echo WEB_ROOT; ?>images/header.png" /></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3>Inventory Report</h3>
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
				<td class="tdlabel">Item</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Serial No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Purchase</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Condition</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Qty</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Amount</td>
			</tr>
			<tr>
				<td colspan="13"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$emp = $conn->prepare("SELECT * FROM tbl_inventory
													WHERE (in_dop BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																	ORDER BY in_dop");
										$emp->execute();
										if($emp->rowCount() > 0)
										{
											$ctr1 = 1;
											while($emp_data = $emp->fetch())
											{
												$datereceived = date("M d, Y", strtotime($emp_data['in_dop']));												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['in_itemdesc']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['in_serialno']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $datereceived; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['in_condition']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['in_qty']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top">&#8369;<?php echo number_format($emp_data['in_amt'], 2); ?></td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									<tr>
										<td colspan="13"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="13" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
		</table>			