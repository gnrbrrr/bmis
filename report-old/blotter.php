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
<title>Blotter Records</title>
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
		<table style="margin:auto;">
		<tr>
			<td><img src="<?php echo WEB_ROOT; ?>images/header.png" /></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3> Blotter Report</h3>
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
				<td class="tdlabel">Victim</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Defendant/suspect</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Date of Occurence</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date filed</td>				
			</tr>
			<tr>
				<td colspan="9"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$emp = $conn->prepare("SELECT * FROM tbl_blotter
													WHERE (date_filed BETWEEN '$newfrom' and '$newto') AND is_deleted != '1'
																	ORDER BY date_filed");
										$emp->execute();
										if($emp->rowCount() > 0)
										{
											$ctr1 = 1;
											while($emp_data = $emp->fetch())
											{
												$dateofoccurence = date("M d, Y", strtotime($emp_data['dateofoccurence']));
												$datefiled = date("M d, Y", strtotime($emp_data['date_filed']));
												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $emp_data['victim']; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['suspect_firstname']; ?> <?php echo $emp_data['suspect_lastname']; ?> <?php echo $emp_data['suspect_middlename']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $dateofoccurence; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $datefiled; ?></td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									<tr>
										<td colspan="9"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="9" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
		</table>			