<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_rescue WHERE res_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();

	//$day_examined = date("jS", strtotime($sql_data['ph_date_incident']));
	$month_incident = date("F", strtotime($sql_data['ph_date_incident']));
	$year_incident = date("Y", strtotime($sql_data['ph_date_incident']));

	$day_inci = date("d", strtotime($sql_data['ph_date_incident']));

	$date_today = date("m / d / Y");


	
		
?>
<html>
<head>
<title>Rescue Unit Form</title>
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

<body onload="window.print()" style="width:100%; height:99%; border:solid 0px; background-repeat: no-repeat; background-size: 100% 100%;">
	
	<style>
		img{
		}

		.main{
			margin-top: 5%;
		}

		.title{
			font-family: arial;
			font-weight: bold;
			font-size: 24px;
		}

		.patient_info{
			margin-left: 5%;
			font-family: arial;
			font-size: 14px;
		}

		.a1, .a2, .a3, .a4, .a5{
			margin-left: 5%;
			width: 86%;
			font-family: arial;
			font-size: 14px;
			text-align: justify;
		}

		#name, #address, #hospital, #doctor{
			text-decoration: underline;
		}

		
	</style>

	<center><img src="../images/header8'5x2.png"></center>
	<br />

	<center><p class="title">EMERGENCY CARE AND TRANSPORTATION</p></center>

	<div class="patient_info">
		<div>
			<p>Name of Patient: </p><p id="name"><?php echo $sql_data['ph_name']; ?></p>
		</div>
		<div>
			<p>Address: </p><p id="address"><?php echo $sql_data['ph_address']; ?></p>
		</div>
	</div>

	<div class="main">
		<div class="a1">
			<p>&nbsp;&nbsp;&nbsp;&nbsp;I acknowledge that <b>BM DRRM</b> is not responsible for any risk that may happen to the patient upon transport by the ambulance and if 
			, at any time, due to such circumstances as an injury or sudden illness, medical treatment is necessary, I authorize the crew <b>BM DRRM</b> to take whatever 
			emergency measures they deem necessary for the Patient while in transport.</p>
		</div>

		<br />

		<div class="a2">
			<p>&nbsp;&nbsp;&nbsp;&nbsp;I understand that this may involve contacting a doctor, interpreting and carrying out his or her instructions, and transporting the 
			Patient to a hospital or doctor's office, including the possible use of an ambulance.</p>
		</div>

		<br />

		<div class="a3">
			<p>If possible, the hospital will be</p>
			<p id="hospital"><?php echo $sql_data['ect_hospital_name']; ?></p>
		</div>

		<br />

		<div class="a4">
			<p>or the doctor contacted will be</p>
			<p id="doctor"><?php echo $sql_data['ect_doctor_name']; ?> <?php echo $sql_data['ect_doctor_address']; ?></p>
		</div>

		<br />

		<div class="a5">
			<p><b>I, the undersigned, hereby authorize the BARANGAY MAGALLANES DRRM to provide me with transportation or transfer.</b></p>
			<p><?php echo $sql_data['ect_requestor_name']; ?></p>
			<p>_____________________________</p>
			<p><b>Signature over Printed Name</b></p>
		</div>
		
	</div>

</body>
</html>
<?php
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>