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
<title>Covid-19 Report</title>
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
				<h3>Covid-19 Monitoring Report</h3>
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
				<td class="tdlabel">Patient Name</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Age</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Gender</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Address</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Status</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">DRU</td>
				<td width="20px;">&nbsp;</td>							
				<td class="tdlabel">Vaccination Status</td>
						
			</tr>
			<tr>
				<td colspan="20"><hr color='black' /></td>
			</tr>
								  <tbody>
									
									<?php
										$ctr1 = '1';

										$covid = $conn->prepare("SELECT * FROM tbl_covid_cases 
															WHERE (cc_onset BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																			ORDER BY cc_onset");
										$covid->execute();
										while($covid_data = $covid->fetch()){

											$date_covid = date("M d, Y", strtotime($covid_data['cc_onset']));
									?>
										<tr>
											<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $covid_data['cc_name']; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $covid_data['cc_age']; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $covid_data['cc_gender']; ?></td>													
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top" style="width:80px;"><?php echo $covid_data['cc_address']; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top" style="width:80px;"><?php echo $date_covid ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top" style="width:150px;"><?php echo $covid_data['cc_status']; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top" style="width:150px;"><?php echo $covid_data['cc_dru']; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top"><?php echo $covid_data['cc_vaccination']; ?></td>
											</tr>
									<?php
										}
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
				<h3>Covid-19 Vaccine History Report</h3>
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
				<td class="tdlabel">Patient Name</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Age</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Dose Type</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Brand Name</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Dosage</td>		
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Date Taken</td>		
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Location Vaccine Taken</td>	
			</tr>
			<tr>
				<td colspan="20"><hr color='black' /></td>
			</tr>
								  <tbody>
									
									<?php
										$ctr1 = '1';

										$vaccine = $conn->prepare("SELECT * FROM tbl_covid_vaccine
															WHERE (date_taken BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																			ORDER BY date_taken");
										$vaccine->execute();
										while($vaccine_data = $vaccine->fetch()){

											$date_vac = date("M d, Y", strtotime($vaccine_data['date_taken']));

											if($vaccine_data['cc_id'] != 0){
												$covid_id = $vaccine_data['cc_id'];

												$cov_name = $conn->prepare("SELECT * FROM tbl_covid_cases WHERE cc_id = '$covid_id'");
												$cov_name->execute();
												$cov_data = $cov_name->fetch();

												$name = $cov_data['cc_name'];
												$gender = $cov_data['cc_age'];
												
											}else{
												$name = "-- --";
												$gender = "-- --";
												
											}
											
									?>
										<tr>
											<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $name; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $gender; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $vaccine_data['dose_type']; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $vaccine_data['brand']; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $vaccine_data['dosage']; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $date_vac; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $vaccine_data['location']; ?></td>
											
										</tr>
									<?php
										}
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