<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_document_request d, tbl_resident r WHERE d.uid = '$id' AND r.r_id = d.r_id");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$day_issued = date("jS", strtotime($sql_data['date_issued']));
	$month_issued = date("F", strtotime($sql_data['date_issued']));
	$year_issued = date("Y", strtotime($sql_data['date_issued']));

?>
<html>
<head>
<title>TRD</title>
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

.p1{
	font-family: cambria;
	font-size: 16px;
	text-align: justify;
	width: 98%;
}

.pDiv {
	text-align: justify;
  	text-justify: inter-word;
}

#tdata{
	color: #3498db;
	padding-left: 10px;
	padding-right: 10px;
}


</style>	

	<div class="divBody">
		
		

		<br />

		<div class="divBody2">
			<center><p style="font-family: lucida calligraphy; font-size:28px;">CERTIFICATION</p></center>

			<br />

			<p class="towhom">TO WHOM IT MAY CONCERN:</p>
			<center><p class="p1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b><?php echo $sql_data['firstname']; ?> <?php echo $sql_data['middlename']; ?> <?php echo $sql_data['lastname']; ?><span id="suffix"></span></b> with a postal address located at <b><?php echo $sql_data['toda_address']; ?></b>, 
				is as a bonafide member of <b><?php echo $sql_data['toda']; ?></b> as an operator of a tricycle unit described below:</p></center>

			<center><table style="border-collapse: collapse; width: 80%;">
				<tr style="border: 2px solid black;">
					<td style="padding-left:10px;">Make</td>
					<td style="padding-right:10px; border-right: 2px solid black;">:</td>
					<td id="tdata"><?php echo $sql_data['make']; ?></td>
					<td style="width: 30px;"></td>
					<td style="padding-left:10px; border-left:2px solid black;">Color Code</td>
					<td style="padding-right:10px; border-right: 2px solid black;">:</td>
					<td id="tdata"><?php echo $sql_data['color_code']; ?></td>
				</tr>
				<tr style="border: 2px solid black;">
					<td style="padding-left:10px;">Motor No.</td>
					<td style="padding-right:10px; border-right: 2px solid black;">:</td>
					<td id="tdata"><?php echo $sql_data['motor_no']; ?></td>
					<td style="width: 30px;"></td>
					<td style="padding-left:10px; border-left:2px solid black;">Side Car No.</td>
					<td style="padding-right:10px; border-right: 2px solid black;">:</td>
					<td id="tdata"><?php echo $sql_data['side_car_no']; ?></td>
				</tr>
				<tr style="border: 2px solid black;">
					<td style="padding-left:10px;">Chassis No.</td>
					<td style="padding-right:10px; border-right: 2px solid black;">:</td>
					<td id="tdata"><?php echo $sql_data['chassis_no']; ?></td>
					<td style="width: 30px;"></td>
					<td style="padding-left:10px; border-left:2px solid black;">Plate No.</td>
					<td style="padding-right:10px; border-right: 2px solid black;">:</td>
					<td id="tdata"><?php echo $sql_data['plate_no']; ?></td>
				</tr>
			</table></center>

			<center><p class="p1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This office interposes no objection to the <b>application</b> for the <b>franchise (RENEWAL)</b> 
			of the applicant to operate the <b>PUBLIC MOTORIZED TRICYCLE</b>, herein described, within the Barangay and neighboring Barangay subject to the provision of the Quezon 
			City Tricycle Ordinance of 1992 and its Implementing Guidelines.</p></center>

			<center><p class="p1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this <b><?php echo $day_issued; ?></b> day of <b><?php echo $month_issued; ?>, 
				<?php echo $year_issued; ?></b> at the Barangay Multi-Purpose Hall, Buenamar Street, Buenamar Subdivision, Novaliches Proper, District V, Quezon City.</p></center>
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
					<br />
					</p>						
				</td>
				<td style="text-align: center;">
					<p style="font-size:16px;" id="sign_person"><b><?php echo $sql_data['person_sign']; ?></b><br />						
					<p id="job_title" style="font-size:12px;margin-top:-5%;"></p></p>
				</td>
			</tr>
		</table>

		<p style="font-size: 9px; margin-left:6%; margin-top: 7%; position:absolute;">Note: <span style="font-style:italic;">This certification is valid while the event is being conducted.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not valid without an official dry seal. Not valid if with erasure.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/HBC 01-2023</span></p>

		<br />
		<table style="margin-left:6%; margin-top: 10%; position:absolute;">
			<tr>
				<td style="width: 250px">
					<p style="color: red; font-size: 14; font-family: calibri;">
					O.R Date : <b><?php echo $sql_data['date_issued']; ?></b>						
					<br />
					O.R No. :  <b><?php echo $sql_data['or_num']; ?></b>						
					<br />
					Amount :  <b>&#8369;<?php echo number_format($sql_data['amount'], 2); ?></b>
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
		document.getElementById("officials").style.marginTop = "-11%";
		document.getElementById("officials").style.marginLeft = "0%";
		document.getElementById("authorization").style.marginTop = "-5%";
	}else{
		document.getElementById("sign_person").innerHTML = " ";
		document.getElementById("job_title").innerHTML = " ";
		document.getElementById("authorization").innerHTML = " ";
		document.getElementById("just_space").style.display = "none";
		document.getElementById("officials").style.marginTop = "1%";
		document.getElementById("officials").style.marginLeft = "10%";
		document.getElementById("cap_title").style.marginTop = "-10%";
	}
</script>
<?php
	$url = "../document/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>