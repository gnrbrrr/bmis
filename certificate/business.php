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
	

?>
<html>
<head>
<title>Business Clearance</title>
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

h1{
	font-family: times new roman;
	font-size: 24px;
	font-weight: bold;
	margin-left: 20%;
}

.pDiv {
	text-align: justify;
  	text-justify: inter-word;
}

.a1{
	margin-top: 5%;
}

.a1, .a2, .a3{
	font-family: cambria;
	font-size: 14px;
	text-align: justify;
	width: 98%;
}

.tdata {
	color: #3498db;
}


</style>	

	<div class="divBody">
		
		

		<br />

		<div class="divBody2">

			<center><p style="font-family: lucida calligraphy; font-size:20px;">Barangay Business Clearance</p></center>
		
			<div class="pDiv">
				<center><p class="a1">&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that the <b>applicant</b> whose name appears below is being issued this Barangay Business 
					Clearance pursuant to Section 152 of R.A. 7160 or otherwise known as the Local Government Code of 1991.</p></center>

			</div>

			<br />

			
			<table style="font-family:cambria; font-size:14px; margin-left:10%; padding-left:10px; width:80%;">
				<tr>
					<td>Business Name</td>
					<td>:</td>
					<td class="tdata" style="font-weight:bold;"><b><?php echo $sql_data['businessname']; ?></b></p></td>
				</tr>
				<tr>
					<td>Business Address</td>
					<td>:</td>
					<td class="tdata" style="font-weight:bold;"><b><?php echo $sql_data['badd']; ?></b></td>
				</tr>
				<tr>
					<td>Business Type</td>
					<td>:</td>
					<td class="tdata" style="font-weight:bold;"><b><?php echo $sql_data['btype']; ?></b></td>
				</tr>
				<tr>
					<td>Owners Name</td>
					<td>:</td>
					<td class="tdata" style="font-weight:bold;"><b><?php echo $sql_data['oname']; ?></b></td>
				</tr>
			</table>

			<br />

			<center><p class="a2">&nbsp;&nbsp;&nbsp;&nbsp;This Business Clearance is revocable upon failure of the herein applicant to comply with the provisions of existing 
				laws, City Ordinances, rules, or regulations that are now prevailing in connection with the said business /activity, without prejudice to future complaints, 
				emanating from the neighbor’s concerning health, fire or other legitimate hazards. This clearance shall be presented to the competent authority upon demand.</p></center>

			<center><p class="a3">&nbsp;&nbsp;&nbsp;&nbsp;Issued this <b><?php echo $day_issued; ?></b> day of <b><?php echo $month_issued; ?> <?php echo $year_issued; ?></b> 
				at the Barangay Multi-Purpose Hall, Buenamar Street, Buenamar Subdivision, Novaliches Proper, District V, Quezon City.</p></center>
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
			<p style="font-size: 9px; margin-left:6%; margin-top: 4%; position:absolute;">Note: <span style="font-style:italic;">Valid up to one year (1) from the date issued.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not valid without a dry seal. Any alteration/erasure invalidates this Business Clearance.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/HBC-01-2023</span></p>
								
			<table style="margin-left:6%; margin-top:9%; position:absolute;">
				<tr>
					<td style="width: 250px">
						<p style="color: red; font-size: 14; font-family: calibri;">
						O.R Date :  <b><?php echo $sql_data['date_issued']; ?></b>						
						<br />
						O.R No. :  <b><?php echo $sql_data['or_num']; ?></b>						
						<br />
						Amount :  <b>&#8369;<?php echo number_format($sql_data['amount'], 2); ?></b>
						<br />
						Book No. :  <b><?php echo $sql_data['bookno']; ?></b>
						<br />
						Issued By : <b><?php echo $sql_data['issued_by']; ?></b>
						</p>						
					</td>
					<td style="text-align: center;">
					<p><b></b><br />						
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
		document.getElementById("officials").style.marginLeft = "10%";
		document.getElementById("cap_title").style.marginTop = "-10%";
	}
</script>
<?php
	$url = "../document/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>