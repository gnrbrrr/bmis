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
<title>BADAC Report</title>
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

.balay_silangan{
	background-color: purple;
}
.balay_silangan p{
	color: white;
}

.arrested{
	background-color: red;
}
.arrested p{
	color: white;
}

.rehab_iop{
	background-color:green;
}
.rehab_iop p{
	color:white;
}

.deceased{
	background-color:blue;
}
.deceased p{
	color:white;
}

.cbdrp_graduate{
	background-color:yellow;
}
.cbdrp_graduate p{
	color:black;
}

.general_intervention{
	background-color:brown;
}
.general_intervention p{
	color:white;
}

.non_resident{
	background-color:none;
}
.non_resident p{
	color:black;
}

.plain{
	background: none;
}

.plain p{
	color: black;
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
				<h3>BADAC Record Report</h3>
				<h4><?php echo $wfrom; ?> to <?php echo $wto; ?></h4>
			</td>
		</tr>
		<table>
		<br />
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px; border-collapse:collapse;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Status</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Name</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">Address</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Contact No.</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Witness</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Date Accomplished</td>
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										//BADAC
										$bdk = $conn->prepare("SELECT * FROM tbl_badak 
													WHERE (bdk_date_ac BETWEEN '$newfrom' and '$newto') AND is_deleted !='1' 
																	ORDER BY bdk_date_ac");
										$bdk->execute();
										while($bdk_data = $bdk->fetch()){
											$status = $bdk_data['status'];
											$status_class = '';

											//sets class name for row coloring
											if($status == "Balay Silangan"){
												$status_class = 'balay_silangan';
											}else if($status ==	"Arrested"){
												$status_class = 'arrested';
											}else if($status == "Rehab/IOP"){
												$status_class = 'rehab_iop';
											}else if($status == "Deceased"){
												$status_class = 'deceased';
											}else if($status == "CBDRP Graduate"){
												$status_class = 'cbdrp_graduate';
											}else if($status == "General Intervention"){
												$status_class = 'general_intervention';
											}else if($status == "Non-Resident/Did-not-exist Cannot Be Located"){
												$status_class = 'non_resident';
											}else{
												$status_class = 'plain';
											}
											
											$name = $bdk_data['bdk_unang_pangalan'] . " " . $bdk_data['bdk_gitnang_pangalan']. " " . $bdk_data['bdk_huling_pangalan'];
											$address = $bdk_data['bdk_ksk_lugar_trn'];
											$contact_no = $bdk_data['bdk_numero_tel'];
											$witness = $bdk_data['bdk_testigo'];
											$date_ex = date("M d, Y", strtotime($bdk_data['bdk_date_ac']));
									?>
											<tr class="<?php echo $status_class; ?>">
												<td class="tddata" valign="top"><p><?php echo $ctr1++; ?>. </p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:100px;"><p><?php echo $status; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $name; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $address; ?></p></td>													
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $contact_no; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:20px;"><p><?php echo $witness; ?></p></td>
												<td width="20px;">&nbsp;</td>													
												<td class="tddata" valign="top"><p><?php echo $date_ex; ?></p></td>
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
<p style="page-break-after:always;"></p>
<div>
	<table style="font-family:arial; font-size:14px;">
		<tr>
			<td><b>Noted By:</b></td>
		</tr>
		<tr>
			<td><br /></td>
		</tr>
		<tr>
			<td><br /></td>
		</tr>
		<tr>
			<td>_____________________</td>
		</tr>
		<tr>
			<td>Police Lieutenant Colonel</td>
		</tr>
		<tr>
			<td>Station Commander</td>
		</tr>
		<tr><td><br /></td></tr>
		<tr><td><br /></td></tr>
		<tr>
			<td><b>Certified By:</b></td>
		</tr>
		<tr>
			<td><br /></td>
		</tr>
		<tr>
			<td><br /></td>
		</tr>
		<tr>
			<td>_____________________</td>
		</tr>
		<tr>
			<td>BADAC Chairperson</td>
		</tr>
		<tr>
			<td>Punong Barangay</td>
		</tr>
		<tr><td><br /></td></tr>
		<tr><td><br /></td></tr>
		<tr>
			<td><br /></td>
		</tr>
		<tr>
			<td>_____________________</td>
		</tr>
		<tr>
			<td>BADAC Chairman</td>
		</tr>
		<tr>
			<td>Kagawad Barangay</td>
		</tr>
		<tr><td><br /></td></tr>
		<tr><td><br /></td></tr>
		<tr><td><br /></td></tr>
		<tr>
			<td>_____________________</td>
		</tr>
		<tr>
			<td>QCADAAC Facilitator</td>
		</tr>
	</table>
</div>