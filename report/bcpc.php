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
<title>BCPC Report</title>
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
				<h3>BCPC Record Report</h3>
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
				<td class="tdlabel">Reference No.</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Case No.</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Victim</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Age</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Perpetrator</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Reported</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Accomplished</td>
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										//bcpc
										$bcp = $conn->prepare("SELECT * FROM tbl_vwac 
													WHERE (vwac_date_accomplished BETWEEN '$newfrom' and '$newto') AND is_deleted !='1' 
																	ORDER BY vwac_date_accomplished");
										$bcp->execute();
										while($bcp_data = $bcp->fetch()){
											$ref_no = $bcp_data['reference_no'];
											$case_no = $bcp_data['case_no'];
											$victim = $bcp_data['vwac_victim_firstname'] . " " . $bcp_data["vwac_victim_middlename"] . " " . $bcp_data["vwac_victim_lastname"];
											$age = $bcp_data['vwac_age'];
											$perpetrator = $bcp_data['vwac_perpetrator_firstname'] . " " . $bcp_data['vwac_perpetrator_middlename'] . " " . $bcp_data['vwac_perpetrator_lastname'];
											$date_rep = date("M d, Y", strtotime($bcp_data['vwac_date_reported']));
											$date_ex = date("M d, Y", strtotime($bcp_data['vwac_date_accomplished']));
										?>
											<tr>
												<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $ref_no; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $case_no; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $victim; ?></td>													
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $age; ?></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><?php echo $perpetrator; ?></td>
												<td width="20px;">&nbsp;</td>													
												<td class="tddata" valign="top"><?php echo $date_rep; ?></td>
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