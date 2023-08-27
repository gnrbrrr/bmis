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
<title>Medicine Report</title>
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
</style>
</head>
<body onload="window.print();" style="background: url(../images/bmis_standard_head_big.png); background-repeat: no-repeat; background-size: 100% 25%;">
		<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3>Medicine Record Report</h3>
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
				<td class="tdlabel">Resident Name</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Medicine Requested</td>				
				<td width="20px;">&nbsp;</td>											
				<td class="tdlabel">Quantity to Consume</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Requested</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Remakrs</td>
				
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										//bcpc
										$med = $conn->prepare("SELECT * FROM tbl_medical_record
													WHERE (med_datereq BETWEEN '$newfrom' and '$newto') AND is_deleted !='1' 
																	ORDER BY med_datereq");
										$med->execute();
										while($med_data = $med->fetch()){
											if($med_data['res_id'] != 0) {
												$res_id = $med_data['res_id'];

												$res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$res_id'");
												$res->execute();
												$res_data = $res->fetch();

												$res_name = $res_data['firstname'] . " " . $res_data['middlename'] . " " . $res_data['lastname'];
											}
											$med_req = $med_data['med_req'];
											$med_qty = $med_data['med_qty'];
											$remarks = $med_data['remarks'];
											$med_date = date("M d, Y", strtotime($med_data['med_datereq']));
											// $date_ex = date("M d, Y", strtotime($med_data['vwac_date_accomplished']));
										?>
											<tr>
												<td class="tddata" valign="top"><?php echo $ctr1++; ?>.</td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $res_name; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $med_req; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $med_qty; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $med_date; ?></td>													
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $remarks; ?></td>
												
												
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