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
<title>Borrowed Items Report</title>
<link rel="shortcut icon" href="<?php echo WEB_ROOT; ?>images/favicon.ico">
<style rel="stylesheet">
.tdlabel
{   
   color: #000 !important;
   font-family: Arial !important;
   font-weight: bold;
   font-size:13px;
}
.tddata
{   
   color: #000 !important;
   font-family: Arial !important;  
   font-size:12px;
}

.balay_silangan{
	background-color: purple;
}
.balay_silangan p{
	color: white;
}

.arrested{
	background-color: red;
}
.arrested p{
	color: white;
}

.rehab_iop{
	background-color:green;
}
.rehab_iop p{
	color:white;
}

.deceased{
	background-color:blue;
}
.deceased p{
	color:white;
}

.cbdrp_graduate{
	background-color:yellow;
}
.cbdrp_graduate p{
	color:black;
}

.general_intervention{
	background-color:brown;
}
.general_intervention p{
	color:white;
}

.non_resident{
	background-color:none;
}
.non_resident p{
	color:black;
}

.plain{
	background: none;
}

.plain p{
	color: black;
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
				<h3>Borrowed Items Report</h3>
				<h4><?php echo $wfrom; ?> to <?php echo $wto; ?></h4>
			</td>
		</tr>
		<table>
		<br />
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:5px; border-collapse:collapse;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Name of Borrower</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Item name</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Item Description</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:10px;">Borrowed Quantity</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Item Condition</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel" style="width:100px;">Returned By</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Returned</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Time Returned</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Event Location</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Borrowed</td>
			</tr>
			<tr>
				<td colspan="28"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										//Borrowed
										$borrows = $conn->prepare("SELECT * FROM tbl_borrowed 
													WHERE (br_dateborrowed BETWEEN '$newfrom' and '$newto') AND is_deleted !='1' 
																	ORDER BY br_dateborrowed");
										$borrows->execute();
										while($borrow_data = $borrows->fetch()){
											
											$borrow = $borrow_data['br_name'];
											$item = $borrow_data['br_item'];
											$item_desc = $borrow_data['br_itemdesc'];
											$borrow_qty = $borrow_data['br_borrow_qty'];
											$condition = $borrow_data['br_condition'];
											$return = $borrow_data['br_returnby'];
											$date_returned = date("M d, Y", strtotime($borrow_data['br_datereturned']));
											$time = $borrow_data['br_timereturned'];
											$location = $borrow_data['br_location'];
											$date_borrowed = date("M d, Y", strtotime($borrow_data['br_dateborrowed']));
									?>
											<tr>
												<td class="tddata" valign="top"><p><?php echo $ctr1++; ?>. </p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $borrow; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $item; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $item_desc; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:10px;"><p><?php echo $borrow_qty; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $condition; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:100px;"><p><?php echo $return; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:100px;"><p><?php echo $date_returned; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $time; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $location; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:100px;"><p><?php echo $date_borrowed; ?></p></td>
											</tr>
									<?php
										}
									?>
									<tr>
										<td colspan="28"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="28" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
</table>
