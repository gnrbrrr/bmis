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
		<table style="margin:auto;">
		<tr>
			<td><img src="<?php echo WEB_ROOT; ?>images/header.png" /></td>			
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
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Name</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Transaction</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Amount</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Issued</td>				
			</tr>
			<tr>
				<td colspan="9"><hr color='black' /></td>
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
											while($emp_data = $emp->fetch())
											{
												$datereceived = date("M d, Y", strtotime($emp_data['date_issued']));
												$resid = $emp_data['r_id'];
												$cerid = $emp_data['cer_id'];
												
												$rby = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$resid'");
												$rby->execute();
												if($rby->rowCount() > 0)
												{ 
													$rby_data = $rby->fetch();
													$resident = utf8_encode(ucwords(strtolower($rby_data['lastname']))) . ',&nbsp;' . ucwords(strtolower($rby_data['firstname'])); 
												}else{ $resident = '- -'; }
												
												$cer = $conn->prepare("SELECT * FROM tbl_certificate WHERE cer_id = '$cerid'");
												$cer->execute();
												if($cer->rowCount() > 0)
												{ 
													$cer_data = $cer->fetch();
													$certificate = $cer_data['cer_name'];
												}else{ $certificate = '- -'; }
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $resident; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $certificate; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top">&#8369;<?php echo number_format($emp_data['amount'], 2); ?></td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $datereceived; ?></td>
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