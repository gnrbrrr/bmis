<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_new_vwac WHERE uid = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$day_occurence = date("jS", strtotime($sql_data['date_incident']));
	$month_occurence = date("F", strtotime($sql_data['date_incident']));
	$year_occurence = date("Y", strtotime($sql_data['date_incident']));

	$day_occurence = date("d", strtotime($sql_data['date_incident']));

	//$time_occurence = date("h:i", $sql_data['time_incident']);

?>
<html>
<head>
<title>VAWC Certification</title>
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

	<style>
		@media print{
			html, body{
				height: auto;
			}
		}
	</style>
	
</head>

<body onload="window.print()" style="background: url(../images/certificate/new_letter_head.png); background-repeat: no-repeat; background-size: 100% 100%;">
<style>

	.divBody{
		width: 100%;
		height: 97%;
	}

	h1{
		font-family: Candara;
		font-size: 30;
		font-weight: bold;
		margin-top: 19%;
		margin-left: -2%;
	}

	.divBody h3{
		font-family: candara;
		font-size: 30;
		font-weight: bold;
		margin-top: 5%;
		align-items: center;
	}

	.divBody2 h3{
		display: flex;
		align-content: flex-start;
		font-family: arial;
		font-size: 18;
		font-weight: bold;
		margin-left: 9%;
		margin-top: 5%;
	}

	.a1{
		width: 81%;
		font-family: arial;
		font-size: 18;
		text-align: justify;
		overflow-wrap: break-word;
	}

	.a2{
		width: 81%;
		font-family: arial;
		font-size: 18;
		text-align: justify;
		overflow-wrap: break-word;
	}

	.a3{
		width: 81%;
		font-family: arial;
		font-size: 18;
		text-align: justify;
		overflow-wrap: break-word;
	}

	.a9{
		display: flex;
		font-family: arial;
		font-size: 14;
		font-weight: bold;
		margin-top: 10%;
		margin-left: 12%;
	}

	.a10{
		display: flex;
		font-family: arial;
		font-size: 16;
		font-weight: bold;
		margin-top: -3%;
		margin-left: 13%;
	}

	.a11{
		display: flex;
		margin-top: -25%;
		margin-left: 65%;
	}

	.a11 .jbd, .a11 .sect{
		font-family: times new roman;
		font-size: 14;
		font-weight: bold;
	}

	.jbd{
		margin-top: 20%;
	}

	.sect{
		margin-top: -8px;
	}

	.a12{
		display: flex;
		margin-top: 8%;
		margin-left: 54%;
	}

	.a12 .hrcn{
		font-family: times new roman;
		font-size: 22;
		font-weight: bold;
		text-decoration: underline;
	}

	.chairman{
		font-family: arial;
		font-size: 12;
		font-weight: bold;
		margin-top: -8px;
	}

	.a13{
		display: flex;
		font-family: times new roman;
		font-size: 12;
		margin-top: 2%;
		margin-left: 66%;
	}
</style>	

	<div class="divBody">
		<center><h3>CERTIFICATION</h3></center>

		<br />

		<div class="divBody2">
			<h3>TO WHOM IT MAY CONCERN:</h3>
			<div class="a">
				<div class="a1">
					<p>&ensp;&ensp;&ensp;&ensp;</p>
				</div>
				<br />
				<div class="a2">
					<p>&ensp;&ensp;&ensp;&ensp;</p>
				</div>
				<br />
				<div class="a3">
					<p>&ensp;&ensp;&ensp;&ensp;</p>
				</div>

				<div>
					<p>VAWC Entry No.: <?php echo $sql_data['entry_number']; ?></p>
					<p>Type of Incident: <?php echo $sql_data['incident_type']; ?></p>
					<p>Reporting Person: <?php echo $sql_data['given_name']; ?> <?php echo $sql_data['middle_name'] ?> <?php echo $sql_data['last_name']; ?> <?php echo $sql_data['name_extension']; ?></p>
					<p>Suspect Name: <?php echo $sql_data['sus_given_name']; ?> <?php echo $sql_data['sus_middle_name'] ?> <?php echo $sql_data['sus_last_name']; ?> <?php echo $sql_data['sus_name_extension']; ?></p>
					<p>Time of Incident: <?php echo $sql_data['time_incident']; ?></p>
					<p>Date of Incident: <?php echo $month_occurence; ?> <?php echo $day_occurence; ?>, <?php echo $year_occurence; ?></p>
				</div>
			</div>
		</div>
	</div>			
</body>
</html>
<?php
	$url = "../vawc/index.php?view=list";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>