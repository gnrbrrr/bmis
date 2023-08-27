<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
		
	$dfrom = $_POST['dfrom'];
	$dto = $_POST['dto'];
	$ctype = $_POST['ctype'];
	
	# Format Date to match date in db
	$newfrom = date("Y-m-d", strtotime($dfrom));
	$newto = date("Y-m-d", strtotime($dto));	
	# Format Date to words
	$wfrom = date("M d, Y", strtotime($dfrom));	
	$wto = date("M d, Y", strtotime($dto));	
	
	if($ctype != 0)
	{ $state = "AND cer_id = '$ctype'"; }else{ $state = ""; }


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;'
?>		
<head>		
<title>Certificate Report</title>
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
				<h3>Certificate Report</h3>
				<h4><?php echo $wfrom; ?> to <?php echo $wto; ?></h4>
			</td>
		</tr>
		<table>
		<br />
		<table style="margin:auto;">
		<tr><td>		
			<center><table style="padding:7px; width:100%;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="10px;">&nbsp;</td>
				<td class="tdlabel">Reference No.</td>
				<td width="10px;">&nbsp;</td>
				<td class="tdlabel">Book No.</td>
				<td width="10px;">&nbsp;</td>				
				<td class="tdlabel">Name</td>
				<td width="10px;">&nbsp;</td>				
				<td class="tdlabel">Address</td>
				<td width="10px;">&nbsp;</td>
				<td class="tdlabel">Contact No.</td>
				<td width="10px;">&nbsp;</td>
				<td class="tdlabel">Transaction</td>
				<td width="10px;">&nbsp;</td>								
				<td class="tdlabel">Amount</td>
				<td width="10px;">&nbsp;</td>
				<td class="tdlabel">Date Issued</td>
			</tr>
			<tr>
				<td colspan="18"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$emp = $conn->prepare("SELECT * FROM tbl_document_request
													WHERE (date_issued BETWEEN '$newfrom' and '$newto') $state AND is_deleted != '1'
																	ORDER BY date_issued");
										$emp->execute();
										if($emp->rowCount() > 0)
										{
											$ctr1 = 1;
											$total = 0;
											while($emp_data = $emp->fetch())
											{
												$datereceived = date("M d, Y", strtotime($emp_data['date_issued']));
												$reference_no = $emp_data['reference_num'];
												$resid = $emp_data['r_id'];
												$bus_id = $emp_data['b_id'];
												$cerid = $emp_data['cer_id'];
												
												if($resid != 0){
													$rby = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$resid'");
													$rby->execute();
													if($rby->rowCount() > 0)
													{ 
														$rby_data = $rby->fetch();
														$resident = $rby_data['lastname'] . ', ' . $rby_data['firstname'] . " " . $rby_data['middlename'];
														$address = "";
														
														if($rby_data['house_num']){
															$address .= $rby_data['house_num'];
														}else{

														}

														if($rby_data['unit_name'] && $address != ""){
															$address .= ', ' . $rby_data['unit_name'];
														}else if($rby_data['unit_name'] && $address == ""){
															$address .= $rby_data['unit_name'];
														}else{
															
														}

														if($rby_data['street_name'] && $address != ""){
															$address .= ', ' . $rby_data['street_name'];
														}else if($rby_data['street_name'] && $address == ""){
															$address .= $rby_data['street_name'];
														}else{

														}

														if($rby_data['purok'] && $address != ""){
															$address .= ', ' . $rby_data['purok'];
														}else if($rby_data['purok'] && $address == ""){
															$address .= $rby_data['purok'];
														}else{

														}

														if($rby_data['area_village'] && $address != ""){
															$address .= ', ' . $rby_data['area_village'];
														}else if($rby_data['area_village'] && $address == ""){
															$address .= $rby_data['area_village'];
														}else{

														}

														if($rby_data['barangay'] && $address != ""){
															$address .= ', ' . $rby_data['barangay'];
														}else if($rby_data['barangay'] && $address == ""){
															$address .= $rby_data['barangay'];
														}else{

														}

														if($rby_data['city_municipality'] && $address != ""){
															$address .= ', ' . $rby_data['city_municipality'];
														}else if($rby_data['city_municipality'] && $address == ""){
															$address .= $rby_data['city_municipality'];
														}else{

														}

														$contact = $rby_data['contactno'];
														$bookno = "-- --";
													}else{}
												}else{}

												if($bus_id != 0){
													$bus = $conn->prepare("SELECT * FROM tbl_business WHERE b_id = '$bus_id'");
													$bus->execute();
													if($bus->rowCount() > 0)
													{
														$bus_data = $bus->fetch();
														$resident = $bus_data['businessname'];
														$address = $bus_data['badd'];
														$contact = $bus_data['ocontact'];
														$bookno = $bus_data['bookno'];
													}else{}
												}else{}

												if($resid == 0 && $bus_id == 0){
													$bookno = "-- --";
													$resident = $emp_data['requestor_name'];
													$address = $emp_data['requestor_address'];
													$contact = "-- --";
												}
												
												$cer = $conn->prepare("SELECT * FROM tbl_certificate WHERE cer_id = '$cerid'");
												$cer->execute();
												if($cer->rowCount() > 0)
												{ 
													$cer_data = $cer->fetch();
													$certificate = $cer_data['cer_name'];
												}else{ $certificate = '- -'; }

												$total += $emp_data['amount'];
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="10px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:fit-content;"><?php echo $reference_no; ?></td>
													<td width="10px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:fit-content;"><?php echo $bookno; ?></td>
													<td width="10px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:160px;"><?php echo $resident; ?></td>
													<td width="10px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:200px;"><?php echo $address; ?></td>
													<td width="10px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:fit-content;"><?php echo $contact; ?></td>
													<td width="10px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:80px;"><?php echo $certificate; ?></td>													
													<td width="10px;">&nbsp;</td>
													<td class="tddata" valign="top">&#8369;<?php echo number_format($emp_data['amount'], 2); ?></td>
													<td width="10px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $datereceived; ?></td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									<tr>
										<td colspan="18"><hr color='black' /></td>
									</tr>
									<tr>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>												
										<td width="10px;">&nbsp;</td>												
										<td width="10px;" valign="top" style="color:red; font-size: 12px; font-family:arial;"><p>Total:</p></td>
										<td class="tddata" valign="top">&#8369;<?php echo number_format($total, 2); ?></td>
										<td width="10px;">&nbsp;</td>
										<td width="10px;">&nbsp;</td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="18" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table></center>
		</td></tr>
		</table>
</body>