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
<title>VAWC Report</title>
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
				<h3>VAWC Record Report</h3>
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
				<td class="tdlabel">Entry No.</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Complainant</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Contact No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Suspect</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Incident</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Report</td>
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										//vawc
										$vaw = $conn->prepare("SELECT * FROM tbl_new_vwac 
													WHERE (date_report BETWEEN '$newfrom' and '$newto') AND is_deleted !='1' 
																	ORDER BY date_report");
										$vaw->execute();
										while($vaw_data = $vaw->fetch()){
											$case_no = $vaw_data['entry_number'];
											$complainant = $vaw_data['last_name'] . ", " . $vaw_data['given_name'] . " " . $vaw_data['middle_name'];
											$contact_no = $vaw_data['report_contact_number'];
											$suspect = $vaw_data['sus_last_name'] . ", " . $vaw_data['sus_given_name'] . " " . $vaw_data['sus_middle_name'];
											$date_rep = date("M d, Y", strtotime($vaw_data['date_report']));
											$date_inc = date("M d, Y", strtotime($vaw_data['date_incident']));
										?>
											<tr>
												<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $case_no; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:20px;"><?php echo $complainant; ?></td>													
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $contact_no; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:20px;"><?php echo $suspect; ?></td>
												<td width="20px;">&nbsp;</td>													
												<td class="tddata" valign="top"><?php echo $date_inc; ?></td>
												<td width="20px;">&nbsp;</td>													
												<td class="tddata" valign="top"><?php echo $date_rep; ?></td>
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