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
<title>Medical Record Report</title>
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
				<h3>Medical Record Report</h3>
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
				<td class="tdlabel">Gender</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Age</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Patient Symptoms/Diagnosis</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Address</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Contact No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Civil Status</td>
				<td width="20px;">&nbsp;</td>							
				<td class="tdlabel">Physician</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Examination</td>				
			</tr>
			<tr>
				<td colspan="20"><hr color='black' /></td>
			</tr>
								  <tbody>
									
									<?php
										$ctr1 = '1';

										$med = $conn->prepare("SELECT * FROM tbl_patient_info 
															WHERE (mh_date_examination BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																			ORDER BY mh_date_examination");
										$med->execute();
										while($med_data = $med->fetch()){

											$date_exam = date("M d, Y", strtotime($med_data['mh_date_examination']));
									?>
										<tr>
											<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $med_data['pi_name']; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $med_data['pi_sex']; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $med_data['pi_age']; ?></td>													
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top" style="width:80px;"><?php echo $med_data['mh_symp_diag']; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top" style="width:150px;"><?php echo $med_data['pi_home_address']; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top"><?php echo $med_data['pi_contact']; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top"><?php echo $med_data['pi_civil_status']; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top"><?php echo $med_data['mh_physician']; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top"><?php echo $date_exam; ?></td>
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
				<h3>Medical History Report</h3>
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
				<td class="tdlabel">Gender</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Age</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Patient Symptoms/Diagnosis</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Address</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Contact No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Civil Status</td>
				<td width="20px;">&nbsp;</td>							
				<td class="tdlabel">Physician</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Examination</td>				
			</tr>
			<tr>
				<td colspan="20"><hr color='black' /></td>
			</tr>
								  <tbody>
									
									<?php
										$ctr1 = '1';

										$medh = $conn->prepare("SELECT * FROM tbl_med_history 
															WHERE (history_date_examination BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																			ORDER BY history_date_examination");
										$medh->execute();
										while($medh_data = $medh->fetch()){

											$date_exam = date("M d, Y", strtotime($medh_data['history_date_examination']));

											if($medh_data['pi_id'] != 0){
												$patient_id = $medh_data['pi_id'];

												$pat = $conn->prepare("SELECT * FROM tbl_patient_info WHERE pi_id = '$patient_id'");
												$pat->execute();
												$pat_data = $pat->fetch();

												$patient_name = $pat_data['pi_name'];
												$patient_sex = $pat_data['pi_sex'];
												$patient_age = $pat_data['pi_age'];
												$patient_symp = $pat_data['mh_symp_diag'];
												$patient_address = $pat_data['pi_home_address'];
												$patient_contact = $pat_data['pi_contact'];
												$patient_civil = $pat_data['pi_civil_status'];
												$patient_physician = $pat_data['mh_physician'];
											}else{
												$patient_name = "-- --";
												$patient_sex = "-- --";
												$patient_age = "-- --";
												$patient_symp = "-- --";
												$patient_address = "-- --";
												$patient_contact = "-- --";
												$patient_civil = "-- --";
												$patient_physician = "-- --";
											}
											
									?>
										<tr>
											<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $patient_name; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $patient_sex; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top"><?php echo $patient_age; ?></td>													
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top" style="width:80px;"><?php echo $patient_symp; ?></td>
											<td width="20px;">&nbsp;</td>
											<td class="tddata" valign="top" style="width:150px;"><?php echo $patient_address; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top"><?php echo $patient_contact; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top"><?php echo $patient_civil; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top"><?php echo $patient_physician; ?></td>
											<td width="20px;">&nbsp;</td>													
											<td class="tddata" valign="top"><?php echo $date_exam; ?></td>
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