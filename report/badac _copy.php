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
			<table style="padding:7px;">
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
											// if($status == "Balay Silangan"){
											// 	echo "<style> td{fill:purple;}</style>";
											// }else if($status == "Arrested"){
											// 	echo "<style> .tddata{background:red;} p{color:white;}</style>";
											// }else if($status == "Rehab/IOP"){
											// 	echo "<style> .tddata{background:lightgreen;} p{color:white;}</style>";
											// }
											$name = $bdk_data['bdk_pangalan'];
											$address = $bdk_data['bdk_ksk_lugar_trn'];
											$contact_no = $bdk_data['bdk_numero_tel'];
											$witness = $bdk_data['bdk_testigo'];
											$date_ex = date("M d, Y", strtotime($bdk_data['bdk_date_ac']));
									?>
											<tr>
												<td class="tddata" valign="top"><p><?php echo $ctr1++; ?>. </p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $status; ?></p></td>
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
<script>
	var status = "<?php echo $status; ?>";
	if(status == "Arrested"){
		$("#tddata").css(){
			'background' : 'red',
			'color' : 'white'
		}
	}else if (status == "Rehab/IOP"){
		$("#tddata").css(){
			'background' : 'lightgreen',
			'color' : 'white'
		}
	}else{
		
	}
</script>