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
<body onload="window.print();" style="background: url(../images/bmis_standard_head_big.png); background-repeat: no-repeat; background-size: 100% 25%;">
		<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3>Barangay Inventory Report</h3>
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
				<td class="tdlabel">Serial No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Item</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Item Description</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Purchased</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Amount</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Condition</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Total Quantity</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Available Quantity</td>
			</tr>
			<tr>
				<td colspan="20"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$inv = $conn->prepare("SELECT * FROM tbl_inventory
													WHERE (in_dop BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																	ORDER BY in_dop");
										$inv->execute();
										if($inv->rowCount() > 0)
										{
											$ctr1 = 1;
											$total = 0;
											while($inv_data = $inv->fetch())
											{
												$date_purchased = date("M d, Y", strtotime($inv_data['in_dop']));
												$total += $inv_data['in_amt'];
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $inv_data['in_serialno']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $inv_data['in_item']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $inv_data['in_itemdesc']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $date_purchased; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top">&#8369;<?php echo number_format($inv_data['in_amt'], 2); ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $inv_data['in_condition']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $inv_data['in_qty']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $inv_data['in_available_qty']; ?></td>
												</tr>
									<?php
											} // End While
										}else{}
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
<p style="page-break-after: always;"></p>
<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3>Rescue Unit Inventory Report</h3>
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
				<td class="tdlabel">Particulars</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Quantity</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Consumed</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">On Hand</td>				
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										$resc = $conn->prepare("SELECT * FROM tbl_bdrrm WHERE is_deleted != '1' ORDER BY particulars");
										$resc->execute();
										while($resc_data = $resc->fetch())
										{
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $resc_data['particulars']; ?></td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $resc_data['quantity']; ?></td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $resc_data['consumed']; ?></td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $resc_data['on_hand']; ?></td>
												</tr>
									<?php
										}
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
				<h3>Medicine Inventory Report</h3>
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
				<td class="tdlabel">Medicine</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Quantity</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Consumed</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">On Hand</td>				
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										$resc = $conn->prepare("SELECT * FROM tbl_med_inventory WHERE is_deleted != '1' ORDER BY medicine");
										$resc->execute();
										while($resc_data = $resc->fetch())
										{
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $resc_data['medicine']; ?></td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $resc_data['quantity']; ?></td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $resc_data['consumed']; ?></td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $resc_data['on_hand']; ?></td>
												</tr>
									<?php
										}
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