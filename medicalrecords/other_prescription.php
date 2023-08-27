<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_patient_info p, tbl_med_history m WHERE m.med_id = '$id' AND m.pi_id = p.pi_id");
	$sql->execute();
	$sql_data = $sql->fetch();

	$day_examined = date("jS", strtotime($sql_data['history_date_examination']));
	$month_examined = date("F", strtotime($sql_data['history_date_examination']));
	$year_examined = date("Y", strtotime($sql_data['history_date_examination']));

	$day_exam = date("d", strtotime($sql_data['history_date_examination']));

	$date_today = date("m / d / Y");


	
		
?>
<html>
<head>
<title>Prescription</title>
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

<body onload="window.print()" style="width:100%; height:90%; border:solid 0px; background-repeat: no-repeat; background-size: 100% 100%;">
	
	<style>
		img{
		}

		.date-today{
			margin-left: 5%;
			margin-top: 8%;
			font-family: arial;
			font-size: 56px;
		}

		table{
			width: 50%;
		}

		tr, td{
		}

		td{
			height: 40px;
		}

		#linebreak{
			width:100%;
			margin-top:-1.5%;
			border-bottom: 3px solid black;
		}
		
		.date-today{
			margin-top: -2%;
		}

		.bottom-right, .patient-info{
			font-family: arial;
			font-style: 12px;
		}

		#name, #age, #sex, #address, #date{
			display: inline-block;
			text-decoration: underline;
		}

		#license, #ptr, #s2{
			margin-top:-1%;
		}

		#license_num{
			text-decoration: underline;
		}

		#content{
			overflow-wrap: break-word;
		}
	</style>

	<div style="width:50%; height: 109%; border-right: 2px solid black;">
		<img style="border-bottom: 3px solid black; width:100%;" src="../images/header.png">
		<br />
		<p id="linebreak"></p>

		<div class="patient-info" style="font-family:calibri; font-size: 14px;">
			<table style="width:100%;">
				<tr>
					<td style="width:300px;"><p>Patient's Name: <span id="name"><?php echo $sql_data['pi_name']; ?></span></p></td>
					<td><p>Age: <span id="age"><?php echo $sql_data['pi_age']; ?></span></p></td>
					<td><p>Sex: <span id="sex"><?php echo $sql_data['pi_sex']; ?></span></p></td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr>
					<td style="width:350px;"><p>Address: <span id="address"><?php echo $sql_data['pi_home_address']; ?></span></p></td>
					<td><p>Date: <span id="date"><?php echo $date_today; ?></span></p></td>
				</tr>
			</table>
		</div>

		<img style="position:absolute;width:100px;height:100px;margin-left:-2%;" src="../images/rx_logo.png">

		<br /><br /><br /><br />

		<div class="main" style="position:absolute; margin-top:0%; margin-left: 5%; width: 40%; height:45%;">
			<p id="content"><?php echo $sql_data['history_treat']; ?></p>
		</div>


		<div class="bottom-right" style="position:absolute; margin-top:35%; margin-left: 28%;">
			<table style="width: 220px;">
				<tr>
					<td style="width:100px; height:20px; text-align:center; text-decoration:underline;"><b><?php echo $sql_data['history_physician']; ?></b></td>
				</tr>
			</table>

		
			<table style="width:220px;">
				<tr>
					<td style="width:90px;height:20px;">License No.</td>
					<td style="height:20px;">:</td>
					<td style="height:20px;text-align:center;text-decoration:underline;"><b><?php echo $sql_data['history_license']; ?></b></td>
				</tr>
				<tr>
					<td style="height:20px;">PTR No.:</td>
					<td style="height:20px;">:</td>
					<td style="height:20px;text-align:center;">___________</td>
				</tr>
				<tr>
					<td style="height:20px;">S2 No.</td>
					<td style="height:20px;">:</td>
					<td style="height:20px;text-align:center;">___________</td>
				</tr>
			</table>
		</div>
	</div>

</body>
</html>
<?php
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>