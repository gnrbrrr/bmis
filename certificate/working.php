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

	$birthday = date("M d, Y", strtotime($sql_data['birthdate']));
	
	if ($sql_data['thumbnail']) {
		$thumbnail7 = WEB_ROOT . 'images/resident/' . $sql_data['thumbnail'];
		$orig_image = WEB_ROOT . 'images/resident/' . $sql_data['image'];
	} else {
		$thumbnail7 = WEB_ROOT . 'images/resident/noimage.png';
		$orig_image = WEB_ROOT . 'images/resident/noimage.png';
	}

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

.a1{
	font-size: 16px;
	text-align: justify;
	width: 98%;
}

.a2{
	border: 0px solid;
	width: 180px;
	height: ;
	font-family: courier;
}

.a3{
	border: 0px solid;
	width: 430;
	height: ;
	font-family: courier;
	margin-top: 50px;
}

.a4{
	position:relative;
	margin-top: -85%;
	margin-left: 75%;
	width: 100;
	height: 100;
	font-family: courier;
}

.a5{
	border: 0px solid;
	width: 535px;
	height: 40px;
	margin: auto;


}

.a6{
	border: 0px solid;
	width: 120;
	height: 50;
	margin-left: 420px;


}



.a8{
	border: 0px solid;
	width: 412px;

}

.a9{
	border: 2px solid;
	width: 120;

}

.a10{
	border: 0px solid;
	width: 120;
	height: 50;
	margin-left: 420px;
}

.a11{
	border: 0px solid;
	width: auto;
	margin-left: 290px;
	margin-top: 100px;

}


</style>	

	<div class="divBody">
		
		

		<br />

		<div class="divBody2">
			<center><p style="font-family: lucida calligraphy; font-size:28px;">CERTIFICATION</p></center>

			<center><p class="a1">&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that the person whose name, thumbmark, and picture appear hereon has requested a 
				<b>Barangay Clearance</b> from this Office and the result/s are as follows:</p></center>

			<br />

			<table style="font-size:16px; padding-left:10px;">
				<tr>
					<td>Name</td>
					<td>:</td>
					<td style="color:#3498db;width:200px;"><b><?php echo $sql_data['firstname']; ?> <?php echo $sql_data['middlename']; ?> <?php echo $sql_data['lastname']; ?> <?php echo $sql_data['suffix']; ?></b></td>
				</tr>
				<tr><td style="height:5px;"></td></tr>
				<tr>
					<td>Position</td>
					<td>:</td>
					<td style="color:#3498db;"><b><?php echo $sql_data['company_position']; ?></b></td>
				</tr>
				<tr><td style="height:5px;"></td></tr>
				<tr>
					<td>Buss Address</td>
					<td>:</td>
					<td style="color:#3498db;"><b><?php echo $sql_data['company_address']; ?></b></td>
				</tr>
				<tr><td style="height:5px;"></td></tr>
				<tr>
					<td>Date of Birth</td>
					<td>:</td>
					<td style="color:#3498db;"><b><?php echo $birthday; ?></b></td>
				</tr>
				<tr><td style="height:5px;"></td></tr>
				<tr>
					<td>Birth Place</td>
					<td>:</td>
					<td style="color:#3498db;"><b><?php echo $sql_data['birthplace']; ?></b></td>
				</tr>
				<tr><td style="height:5px;"></td></tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td style="color:#3498db;"><b><?php echo $sql_data['gender']; ?></b></td>
				</tr>
				<tr><td style="height:5px;"></td></tr>
				<tr>
					<td>Civil Status</td>
					<td>:</td>
					<td style="color:#3498db;"><b><?php echo $sql_data['civilstatus']; ?></b></td>
				</tr>
				<tr><td style="height:5px;"></td></tr>
				<tr>
					<td>Purpose</td>
					<td>:</td>
					<td style="color:black;"><b><?php echo strtoupper($sql_data['purpose']); ?></b></td>
				</tr>
			</table>
		</div>

		<div class="a4">
			<img src="<?php echo $orig_image; ?>" style="width:100px; height:100px; align-items: center; border:2px solid black;" />
			<p style="margin-left: -20%;">_______________</p>
			<p style="text-align: center; font-family: cambria;">Signature</p>
			<br />
			<div style="border:2px solid black; background-color: white; margin-top: -15%; width:100px; height: 130px; content=''; position: relative;"></div>
			<p style="text-align: center; font-family: cambria;">Thumbmark</p>
		</div>

		<table id="officials" style="margin-top:-20%;position:absolute;">
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

		<p style="font-size: 9px; font-family:calibri; margin-top:55%; margin-left:6%;position:absolute;">Note: <span style="font-style:italic;">This certification is valid only for one (1) year from the date issued.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not valid without an official dry seal, and thumbmark.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/HBC-01-2023</span></p>
		
		<table style="margin-left: 6%; margin-top:60%; position:absolute;">
			<tr>
				<td style="width: 250px">
					<p style="color: red; font-size: 14; font-family: calibri;">
					CTC No. : <b><?php echo $sql_data['ctc_num']; ?></b>						
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
		document.getElementById("officials").style.marginTop = "38%";
		document.getElementById("officials").style.marginLeft = "0%";
		document.getElementById("authorization").style.marginTop = "-5%";
	}else{
		document.getElementById("sign_person").innerHTML = " ";
		document.getElementById("job_title").innerHTML = " ";
		document.getElementById("authorization").innerHTML = " ";
		document.getElementById("just_space").style.display = "none";
		document.getElementById("officials").style.marginTop = "50%";
		document.getElementById("officials").style.marginLeft = "10%";
		document.getElementById("cap_title").style.marginTop = "-10%";
	}
</script>
<?php
	$url = "../document/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>