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

	$day_birth = date("d", strtotime($sql_data['birthdate']));
	$month_birth = date("F", strtotime($sql_data['birthdate']));
	$year_birth = date("Y", strtotime($sql_data['birthdate']));
	
	if ($sql_data['thumbnail']) {
		$thumbnail7 = WEB_ROOT . 'images/resident/' . $sql_data['thumbnail'];
	} else {
		$thumbnail7 = WEB_ROOT . 'images/resident/noimage.png';
	}

?>
<html>
<head>
<title>Good Moral</title>
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



.pDiv {
	text-align: justify;
  	text-justify: inter-word;


}

.a{
	border: solid 0px;
		display: flex;
        width: 540px; 
        height: 500px;
        background-color: ;
        flex-direction: row;
        flex-wrap: wrap;
        align-content: flex-start
}

.a1{
	border: 0px solid;
	width: 350;
	height: ;
	font-family: courier;
	margin-top: 20px;
}

.towhom {
	margin-top: -8%;
	font-family: cambria;
	font-size: 18px;
	width: 98%;
}

.p1{
	font-family: cambria;
	font-size: 16px;
	text-align: justify;
	width: 98%;
}


</style>	

	<div class="divBody">


		<br />
		<div class="divBody2">
			
			<center><p style="font-family: lucida calligraphy; font-size:28px;">Certificate of Good Moral</p></center>

			<br /><br /><br />
			
			<p class="towhom">TO WHOM IT MAY CONCERN:</p>

			<center><p class="p1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b><span id="gender"></span><?php echo $sql_data['firstname']; ?> 
				<?php echo $sql_data['middlename']; ?> <?php echo $sql_data['lastname']; ?><span id="suffix"></span></b>, born on <b><?php echo $month_birth; ?> 
				<?php echo $day_birth?>, <?php echo $year_birth; ?></b>, <b><?php echo $sql_data['citizenship']; ?></b>, with residence and postal address at 
				<b><?php echo $sql_data['address']; ?></b>, Barangay Novaliches Proper, District V, this City, whose specimen signature appears below, has neither no pending 
				case nor derogatory record on file in this office.</p></center>

			<center><p class="p1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I further certify that <b><span id="gender2"></span><?php echo $sql_data['lastname']; ?></b> 
				is known to me to be a person of good moral character and reputation.</p></center>

			<center><p class="p1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this <b><?php echo $day_issued; ?></b> day of <b><?php echo $month_issued; ?> 
				<?php echo $year_issued; ?></b> at the Barangay Multi-Purpose Hall, Buenamar Street, Buenamar Subdivision, Novaliches Proper, District V, Quezon City, 
				Philippines upon the request of the interested party for whatever purpose it may serve him/her best.</p></center>

			<br />

			<table style="margin-left:5%;">
				<tr>
					<td style="font-family:cambria;font-style:italic;font-size:16px;">Specimen Signature:</td>
				</tr>
				<tr>
					<td style="font-family:cambria;font-style:italic;font-size:12px;"></td>
				</tr>
				<tr>
					<td style="font-family:cambria;font-size:16px;">____________________________</td>
				</tr>
				<tr>
					<td style="font-family:cambria;font-style:italic;font-size:16px;">Verified/Checked By:</td>
				</tr>
				<tr>
					<td style="font-family:cambria;font-size:14px;"><br /></td>
				</tr>
				<tr>
					<td style="font-family:cambria;font-size:16px;font-weight:bold">BONITA S. CLAVECILLA</td>
				</tr>
				<tr>
					<td style="font-family:cambria;font-size:14px;">Barangay Secretary</td>
				</tr>
			</table>
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

		<br />

		<p style="position:absolute; font-size: 9px; margin-left:6%; margin-top:4%;">Note: <span style="font-style:italic;">Valid up to six (6) months from the date issued.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not valid without a dry seal. Not valid if with erasure.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/HBC-01-2023</span></p>

		<br />

		<table style="margin-left: 6%; margin-top:7%; position:absolute;">
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
	var civil_status = "<?php echo $sql_data['civilstatus']; ?>";
	var gender = "<?php echo $sql_data['gender']; ?>";

	//Old records have empty person_sign column
	if(person_signing === ""){
		person_signing = "none"; //sets none to person_signing var
	}else{

	}

	//checks for proper format
	if(person_signing != "none"){
		document.getElementById("job_title").innerHTML = "Barangay Kagawad";
		document.getElementById("authorization").innerHTML = "For and by the authority of the Punong Barangay:";
		document.getElementById("officials").style.marginTop = "-10%";
		document.getElementById("officials").style.marginLeft = "0%";
		document.getElementById("authorization").style.marginTop = "-5%";
	}else{
		document.getElementById("sign_person").innerHTML = " ";
		document.getElementById("job_title").innerHTML = " ";
		document.getElementById("authorization").innerHTML = " ";
		document.getElementById("just_space").style.display = "none";
		document.getElementById("officials").style.marginTop = "2%";
		document.getElementById("officials").style.marginLeft = "10%";
		document.getElementById("cap_title").style.marginTop = "-10%";
	}

	if(civil_status == "Single" && gender == "Female" || civil_status == "Divorced" && gender == "Female" || civil_status == "Annulled" && gender == "Female"){
		document.getElementById("gender").innerHTML = "Ms. ";
		document.getElementById("gender2").innerHTML = "Ms. ";
	}else if(civil_status == "Married" && gender == "Female" || civil_status == "Separated" && gender == "Female" || civil_status == "Widowed" && gender == "Female"){
		document.getElementById("gender").innerHTML = "Mrs. ";
		document.getElementById("gender2").innerHTML = "Mrs. ";
	}else{
		document.getElementById("gender").innerHTML = "Mr. ";
		document.getElementById("gender2").innerHTML = "Mr. ";
	}
</script>
<?php
	$url = "../document/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>