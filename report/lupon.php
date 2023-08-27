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
<title>Lupon Report</title>
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
				<h3>Lupon ng Tagapamahaya Record Report</h3>
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
				<td class="tdlabel" style="width:200px;">Complainant/s</td>				
				<td width="20px;">&nbsp;</td>			
				<td class="tdlabel" style="width:200px;">Respondent/s</td>				
				<td width="20px;">&nbsp;</td>			
				<td class="tdlabel">Complainant Address</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Complainant Contact No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Respondent Address</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Respondent Contact No.</td>
				<td width="15px;">&nbsp;</td>
				<td class="tdlabel" style="width:100px;">Date</td>
			</tr>
			<tr>
				<td colspan="20"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										//Lupon
										$lup = $conn->prepare("SELECT * FROM tbl_lupon 
													WHERE (lpn_date BETWEEN '$newfrom' and '$newto') AND is_deleted !='1' 
																	ORDER BY lpn_date");
										$lup->execute();
										while($lup_data = $lup->fetch()){
											$complainant = "";
											$respondent = "";

											if ($lup_data['lpn_complaints1_firstname'] && $lup_data['lpn_complaints1_lastname']) {
												$complainant = $lup_data['lpn_complaints1_firstname'] . " " . $lup_data['lpn_complaints1_middlename'] . " " . $lup_data['lpn_complaints1_lastname'];
												if($lup_data['lpn_complaints2_firstname'] && $lup_data['lpn_complaints2_lastname']) {
													$complainant = $lup_data['lpn_complaints1_firstname'] . " " . $lup_data['lpn_complaints1_middlename'] . " " . $lup_data['lpn_complaints1_lastname'] . "," . $complainant = $lup_data['lpn_complaints2_firstname'] . " " . $lup_data['lpn_complaints2_middlename'] . " " . $lup_data['lpn_complaints2_lastname'];
													if($lup_data['lpn_complaints3_firstname'] && $lup_data['lpn_complaints3_lastname']) {
														$complainant = $lup_data['lpn_complaints1_firstname'] . " " . $lup_data['lpn_complaints1_middlename'] . " " . $lup_data['lpn_complaints1_lastname'] . "," . $complainant = $lup_data['lpn_complaints2_firstname'] . " " . $lup_data['lpn_complaints2_middlename'] . " " . $lup_data['lpn_complaints2_lastname'] . "," .$complainant = $lup_data['lpn_complaints3_firstname'] . " " . $lup_data['lpn_complaints3_middlename'] . " " . $lup_data['lpn_complaints3_lastname'];
													}else {

													}
												}else {

												}
											}else {

											}

											if ($lup_data['lpn_respondent1_firstname'] && $lup_data['lpn_respondent1_lastname']){
												$respondent = $lup_data['lpn_respondent1_firstname'] . " " . $lup_data['lpn_respondent1_middlename'] . " " . $lup_data['lpn_respondent1_lastname'];
												if($lup_data['lpn_respondent2_firstname'] && $lup_data['lpn_respondent2_lastname']){
													$respondent = $lup_data['lpn_respondent1_firstname'] . " " . $lup_data['lpn_respondent1_middlename'] . " " . $lup_data['lpn_respondent1_lastname'] . "," . $complainant = $lup_data['lpn_respondent2_firstname'] . " " . $lup_data['lpn_respondent2_middlename'] . " " . $lup_data['lpn_respondent2_lastname'];
												 	if($lup_data['lpn_respondent3_firstname'] && $lup_data['lpn_respondent3_lastname']){
														$respondent = $lup_data['lpn_respondent1_firstname'] . " " . $lup_data['lpn_respondent1_middlename'] . " " . $lup_data['lpn_respondent1_lastname'] . "," . $complainant = $lup_data['lpn_respondent2_firstname'] . " " . $lup_data['lpn_respondent2_middlename'] . " " . $lup_data['lpn_respondent2_lastname'] . "," .$complainant = $lup_data['lpn_respondent3_firstname'] . " " . $lup_data['lpn_respondent3_middlename'] . " " . $lup_data['lpn_respondent3_lastname'];
													}else {

													}
												}else {

												}
											}else {

											}


											$address = $lup_data['lpn_tirahan_sumbong'];
											$contact_no = $lup_data['lpn_contactno'];
											$address2 = $lup_data['lpn_tirahan_sumbong1'];
											$contact_no2 = $lup_data['lpn_contactno1'];
											$date_ex = date("M d, Y", strtotime($lup_data['lpn_date']));
									?>
											<tr>
												<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:200px;" ><?php echo $complainant; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:200px;" ><?php echo $respondent; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $address; ?></td>													
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $contact_no; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:20px;"><?php echo $address2; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $contact_no2; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:100px;"><?php echo $date_ex; ?></td>
											</tr>
									<?php
										}
									?>
									<tr>
										<td colspan="20"><hr color='black' /></td>
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
				<h3>Lupon Summons Report</h3>
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
				<td class="tdlabel" style="width:200px;">Complainants</td>				
				<td width="20px;">&nbsp;</td>			
				<td class="tdlabel" style="width:200px;">Respondent</td>				
				<td width="20px;">&nbsp;</td>			
				<td class="tdlabel">Complainant Address</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Complainant Contact No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Respondent Address</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Respondent Contact No.</td>
				<td width="15px;">&nbsp;</td>
				<td class="tdlabel" style="width:100px;">Date Summon</td>
				<td width="15px;">&nbsp;</td>
				<td class="tdlabel" style="width:100px;">Time Summon</td>
			</tr>
			<tr>
				<td colspan="25"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										$lups = $conn->prepare("SELECT * FROM tbl_lupon_summons 
													WHERE (date_summon BETWEEN '$newfrom' and '$newto') AND is_deleted !='1' 
																	ORDER BY date_summon");
										$lups->execute();
										while($lups_data = $lups->fetch())
										{
											$sum_complainant = "";
											$sum_respondent = "";

											if($lups_data['complainant1_firstname'] && $lups_data['complainant1_lastname']){
												$sum_complainant = $lups_data['complainant1_firstname'] . " " . $lups_data['complainant1_middlename'] . " " . $lups_data['complainant1_lastname'];
												if($lups_data['complainant2_firstname'] && $lups_data['complainant2_lastname']){
													$sum_complainant = $lups_data['complainant1_firstname'] . " " . $lups_data['complainant1_middlename'] . " " . $lups_data['complainant1_lastname'] . ", " . $lups_data['complainant2_firstname'] . " " . $lups_data['complainant2_middlename'] . " " . $lups_data['complainant2_lastname'];
													if($lups_data['complainant3_firstname'] && $lups_data['complainant3_lastname']){
														$sum_complainant = $lups_data['complainant1_firstname'] . " " . $lups_data['complainant1_middlename'] . " " . $lups_data['complainant1_lastname'] . ", " . $lups_data['complainant2_firstname'] . " " . $lups_data['complainant2_middlename'] . " " . $lups_data['complainant2_lastname'] . ", " . $lups_data['complainant3_firstname'] . " " . $lups_data['complainant3_middlename'] . " " . $lups_data['complainant3_lastname'];
													}else{

													}
												}else{

												}
											}else{

											}

											if($lups_data['respondent1_firstname'] && $lups_data['respondent1_lastname']){
												$sum_respondent = $lups_data['respondent1_firstname'] . " " . $lups_data['respondent1_middlename'] . " " . $lups_data['respondent1_lastname'];
												if($lups_data['respondent2_firstname'] && $lups_data['respondent2_lastname']){
													$sum_respondent = $lups_data['respondent1_firstname'] . " " . $lups_data['respondent1_middlename'] . " " . $lups_data['respondent1_lastname'] . ", " . $lups_data['respondent2_firstname'] . " " . $lups_data['respondent2_middlename'] . " " . $lups_data['respondent2_lastname'];
													if($lups_data['respondent3_firstname'] && $lups_data['respondent3_lastname']){
														$sum_respondent = $lups_data['respondent1_firstname'] . " " . $lups_data['respondent1_middlename'] . " " . $lups_data['respondent1_lastname'] . ", " . $lups_data['respondent2_firstname'] . " " . $lups_data['respondent2_middlename'] . " " . $lups_data['respondent2_lastname'] . ", " . $lups_data['respondent3_firstname'] . " " . $lups_data['respondent3_middlename'] . " " . $lups_data['respondent3_lastname'];
													}else{

													}
												}else{

												}
											}else{

											}

											$sum_address = $lups_data['tirahan_sumbong'];
											$sum_contact_no = $lups_data['contactno'];
											$sum_address2 = $lups_data['tirahan_sumbong1'];
											$sum_contact_no2 = $lups_data['contactno1'];
											$date_summon = date("M d, Y", strtotime($lups_data['date_summon']));
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:200px;" ><?php echo $sum_complainant; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:200px;" ><?php echo $sum_respondent; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $address; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $contact_no; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:20px;"><?php echo $address2; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $contact_no2; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $date_summon; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style="width:100px;"><?php echo $lups_data['time_summon']; ?></td>
												</tr>
									<?php
										}
									?>
									<tr>
										<td colspan="25"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="25" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
	</table>