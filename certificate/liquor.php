<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_document_request d, tbl_business r WHERE d.uid = '$id' AND r.b_id = d.b_id");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$day_issued = date("jS", strtotime($sql_data['date_issued']));
	$month_issued = date("F", strtotime($sql_data['date_issued']));
	$year_issued = date("Y", strtotime($sql_data['date_issued']));

	$day_iss = date("d", strtotime($sql_data['date_issued']));

?>
<html>
<head>
<title>Working Clearance</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title><?php echo $pageTitle; ?></title>
    <!-- The styles -->
	<script type="text/javascript">     
		function PrintDiv() {    
		   var divToPrint = document.getElementById('divToPrint');
		   var popupWin = window.open('', '_blank', 'width=auto,height=auto');
		   popupWin.document.open();
		   popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
			popupWin.document.close();
				}
	</script>
	
	
</head>

<body onload="window.print()" style="border:solid 0px; background: url(../images/certificate/new_letter_head.png); background-repeat: no-repeat; background-size: 100% 100%;">
	
<style>

.divBody {
	width: 562px;
	height: 906px;
	margin-top: 130px;
	margin-left: 220px;
}

.divBody2 {
	width: 520px;
	height: 640;
	margin-left:7%;
	font-family: cambria;
}

.towhom {
	margin-top: -8%;
	font-family: cambria;
	font-size: 18px;
	width: 98%;
}

.a1{
	font-size: 14px;
	text-align: justify;
	width: 98%;
}

.tdata{
	color: #3498db;
}


</style>	

	<div class="divBody">
		<table style="position: absolute; margin-top: 5%; margin-left: 50%; font-family: cambria; font-size: 14px;">
			<tr>
				<td>Date: <b><?php echo $month_issued; ?> <?php echo $day_iss; ?>, <?php echo $year_issued; ?></b></td>
			</tr>
			<tr>
				<td>Permit No.: <b><?php echo $sql_data['permit_no']; ?></b></td>
			</tr>
		</table>
		

		<br /><br /><br /><br /><br /><br /><br />

		<div class="divBody2">
			<p class="towhom">TO WHOM IT MAY CONCERN:</p>

			<center><p class="a1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that we interpose no objection to the applicant 
				with name details below to <b>sell liquor</b> as per Quezon City Ordinance No. NC-85-89:</p></center>

			<table style="font-family:cambria; font-size:14px; margin-left:10%; padding-left:10px; width:80%;">
				<tr>
					<td>Name</td>
					<td>:</td>
					<td class="tdata" style="font-weight:bold;"><b><?php echo $sql_data['requestor_name']; ?></b></p></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td class="tdata" style="font-weight:bold;"><b><?php echo $sql_data['badd']; ?></b></td>
				</tr>
				<tr>
					<td>Business Name</td>
					<td>:</td>
					<td class="tdata" style="font-weight:bold;"><b><?php echo $sql_data['businessname']; ?></b></td>
				</tr>
				<tr>
					<td>Nature of Business</td>
					<td>:</td>
					<td class="tdata" style="font-weight:bold;"><b><?php echo $sql_data['nature_business']; ?></b></td>
				</tr>
			</table>

			<center><p class="a1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certifies that:</p></center>

			<center><p class="a1">1. This business establishment is not built/constructed on a public sidewalk, street, avenue, plaza or park, or any government property 
				(Sec. 15-17 &amp; 18, Ord. NC – 85);</p></center>

			<center><p class="a1">2. This business establishment is not a nuisance to the public order and safety; and</p></center>

			<center><p class="a1">3. The applicant is of good moral character and a law-abiding citizen.</p></center>

			<center><table style="font-family:cambria; font-size:14px; border-collapse:collapse;">
				<tr style="border: 1px solid black;">
					<td style="padding-left:10px; padding-right:10px;">O.R No.</td>
					<td style="padding-right:10px;">:</td>
					<td class="tdata" style="border-left: 1px solid black; font-weight:bold; padding-left:10px; padding-right:10px;"><b><?php echo $sql_data['or_num']; ?></b></p></td>
				</tr>
				<tr style="border: 1px solid black;">
					<td style="padding-left:10px; padding-right:10px;">Amount Paid</td>
					<td style="padding-right:10px;">:</td>
					<td class="tdata" style="border-left: 1px solid black; font-weight:bold; padding-left:10px; padding-right:10px;"><b><?php echo $sql_data['amount']; ?></b></td>
				</tr>
			</table></center>

			<center><p class="a1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this <b><?php echo $day_issued; ?></b> day of 
				<b><?php echo $month_issued; ?> <?php echo $year_issued; ?></b> at the Barangay Multi-Purpose Hall, Buenamar Street, Buenamar Subdivision, Novaliches Proper, District V, Quezon City.</p></center>
		</div>

		<table id="officials" style="margin-top:0%;position:absolute;">
			<tr>
				<td style="width: 250px;">
					<p style="color: red; font-size: 14; font-family: courier;">					
					<br />
					</p>						
				</td>
				<td style="text-align: center;">
					<p style="font-size:16px;"><b>ASUNCION M. VISAYA</b><br />						
					<p id="cap_title" style="font-size:12px;margin-top:-5%;">Punong Barangay</p></p>
				</td>
			</tr>
			<tr id="just_space">
				<td style="width:250px;height:40px;">
					<p>
					</p>
				</td>
				<td style="width:300px;height:40px;text-align:center;">
					<span id="authorization" style="font-family:cambria;font-style:italic;font-size:12px;"></span>
				</td>
			</tr>
			<tr id="just_space">
				<td style="width: 250px;">
					<p style="color: red; font-size: 14; font-family: courier;">
					</p>						
				</td>
				<td style="text-align: center;">
					<p style="font-size:16px;" id="sign_person"><b><?php echo $sql_data['person_sign']; ?></b><br />						
					<p id="job_title" style="font-size:12px;margin-top:-5%;"></p></p>
				</td>
			</tr>
		</table>

		<p style="font-size: 9px; font-family:calibri; margin-top:5%; margin-left:6%;position:absolute;">Note: <span style="font-style:italic;">This certification is valid only for one (1) year from the date issued.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not valid without an official dry seal. Not valid if with erasure.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/HBC-01-2023</span></p>
		
		<table style="margin-left: 6%; margin-top:10%; position:absolute;">
			<tr>
				<td style="width: 250px">
					<p style="color: red; font-size: 14; font-family: calibri;">
					Control No. : <b><?php echo $sql_data['control_no']; ?></b>						
					<br />
					Issued By : <b><?php echo $sql_data['issued_by']; ?></b>
					</p>						
				</td>
			</tr>
		</table>
	</div>			
</body>
</html>
<script>
	var person_signing = "<?php echo $sql_data['person_sign']; ?>";

	//Old records have empty person_sign column
	if(person_signing === ""){
		person_signing = "none"; //sets none to person_signing var
	}else{

	}

	//checks for proper format
	if(person_signing != "none"){
		document.getElementById("job_title").innerHTML = "Barangay Kagawad";
		document.getElementById("authorization").innerHTML = "For and by the authority of the Punong Barangay:";
		document.getElementById("officials").style.marginTop = "-12%";
		document.getElementById("officials").style.marginLeft = "0%";
		document.getElementById("authorization").style.marginTop = "-5%";
	}else{
		document.getElementById("sign_person").innerHTML = " ";
		document.getElementById("job_title").innerHTML = " ";
		document.getElementById("authorization").innerHTML = " ";
		document.getElementById("just_space").style.display = "none";
		document.getElementById("officials").style.marginTop = "0%";
		document.getElementById("officials").style.marginLeft = "9%";
		document.getElementById("cap_title").style.marginTop = "-10%";
	}
</script>
<?php
	$url = "../document/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>