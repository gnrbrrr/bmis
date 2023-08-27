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
<title>Minutes of the Meeting Report</title>
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
				<h3>Minutes of the Meeting Report</h3>
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
				<td class="tdlabel">Agenda</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Meeting Duration</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Meeting's Venue</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Meeting' Attendees</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Meeting' Discussion</td>				
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Remarks</td>				
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Date Held</td>				
				<td width="20px;">&nbsp;</td>			
									
			</tr>
			<tr>
				<td colspan="15"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$ctr1 = 1;
										//MEETINGS
										$minutes = $conn->prepare("SELECT * FROM tbl_minutes
													WHERE (date_held BETWEEN '$newfrom' and '$newto') AND is_deleted !='1' 
																	ORDER BY date_held");
										$minutes->execute();
										while($minutes_data = $minutes->fetch()){
										
											$agenda = $minutes_data['meeting_agenda'];
											$meeting_D = $minutes_data['meeting_time1'];
											$meeting_V = $minutes_data['meeting_venue'];
											$meeting_A= $minutes_data['meeting_attendees'];
											$meeting_DC = $minutes_data['meeting_discussion'];
											$remarks = $minutes_data['meeting_remarks'];
											$date= date("M d, Y", strtotime($minutes_data['date_held']));
									?>
											<tr>
												<td class="tddata" valign="top"><p><?php echo $ctr1++; ?>. </p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:100px;"><p><?php echo $agenda; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $meeting_D; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $meeting_V; ?></p></td>													
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top"><p><?php echo $meeting_A; ?></p></td>
												<td width="20px;">&nbsp;</td>
												<td class="tddata" valign="top" style="width:20px;"><p><?php echo $meeting_DC; ?></p></td>
												<td width="20px;">&nbsp;</td>													
												<td class="tddata" valign="top" style="width:20px;"><p><?php echo $remarks; ?></p></td>
												<td width="20px;">&nbsp;</td>													
												<td class="tddata" valign="top"><p><?php echo $date; ?></p></td>
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
