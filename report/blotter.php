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
<title>Blotter Report</title>
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
				<h3>Blotter Record Report</h3>
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
				<td class="tdlabel">Blotter No.</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Complainant</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Respondent</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Nature of Case</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Reported</td>
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;

										$blot = $conn->prepare("SELECT * FROM tbl_blotter
													WHERE (date_reported BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																	ORDER BY date_reported");
										$blot->execute();
										while($blot_data = $blot->fetch()){
											$case_no = $blot_data['blotter_no'];
											$complainant = $blot_data['complainant'];
											$suspect = $blot_data['respondent_lastname'] . ", " . $blot_data['respondent_firstname'] . " " . $blot_data['respondent_middlename'];
											$nature_case = $blot_data['natureofcase'];
											$date_ex = date("M d, Y", strtotime($blot_data['date_reported']));
										?>
											<tr>
												<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $case_no; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $complainant; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:20px;"><?php echo $suspect; ?></td>
												<td width="20px;">&nbsp;</td>													
												<td class="tddata" valign="top"><?php echo $nature_case; ?></td>
												<td width="20px;">&nbsp;</td>													
												<td class="tddata" valign="top"><?php echo $date_ex; ?></td>
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