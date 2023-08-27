<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}else{
		$id = $_GET['id'];
	}
	
	
	$sql = $conn->prepare("SELECT * FROM tbl_patient_info p, tbl_med_history m WHERE m.med_id = '$id' AND m.pi_id = p.pi_id");
	$sql->execute();
	$sql_data = $sql->fetch();

	$day_history = date("jS", strtotime($sql_data['history_date_examination']));
	$month_history = date("F", strtotime($sql_data['history_date_examination']));
	$year_history = date("Y", strtotime($sql_data['history_date_examination']));

	$day_hist = date("d", strtotime($sql_data['history_date_examination']));

	$date_today = date("m / d / Y");


	
		
?>
<html>
<head>
<title>Medical Certificate</title>
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
			border-bottom-style: solid;
			border-bottom-width: 3px;
			border-bottom-color: black;
		}

		.date-today{
			margin-left: 5%;
			margin-top: 8%;
			font-family: arial;
			font-size: 56px;
		}

		#linebreak{
			margin-top: -4%;
		}
		
		.date-today #tag{
			margin-top: -2%;
		}

		.title{
			font-size: 56px;
		}

		.main h3{
			margin-left: 5%;
			font-family: arial;
			font-size: 56px;;
		}

		.a1, .a2, .a3{
			margin-left: 8%;
			width: 85%;
			font-family: arial;
			font-size: 56px;
			overflow-wrap: break-word;
		}

		#name, #agesex, #address, #exam_date, #diagnosis, #treatment, #physician, #lic_no{
			text-decoration: underline;
		}

		.phys{
			margin-top: 15%;
			margin-left: 8%;
			font-family: arial;
			font-size: 56px;
		}

		.phys p{
			margin-top: -2%;
		}
	</style>

	<center><img src="../images/header.png"></center>
	<br />

	<div class="date-today">
		<p id="date"><?php echo $date_today; ?></p>
		<p id="linebreak">___________</p>
		<p id="tag">Date</p>
	</div>

	<div class="title">
		<center><h1>MEDICAL CERTIFICATE</h1></center>
	</div>

	<br /><br /><br /><br />

	<div class="main">
		<h3>TO WHOM IT MAY CONCERN:</h3>
		<div class="para1">
			<p class="a1">&ensp;&ensp;&ensp;&ensp;This is to certify that Mr./ Ms. / Mrs. <label id="name"><?php echo $sql_data['pi_name']; ?></label>, 
			age/sex <label id="agesex"><?php echo $sql_data['pi_age']; ?> <?php echo $sql_data['pi_sex']; ?></label> of <label id="address"><?php echo $sql_data['pi_home_address'] ?></label> 
			was seen and examined on <label id="exam_date"><?php echo $month_history; ?> <?php echo $day_hist; ?> <?php echo $year_history; ?></label> and was diagnosed to have 
			<label id="diagnosis"><?php echo $sql_data['history_symp_diag']; ?></label>.</p>
		</div>

		<div class="para2">
			<p class="a2">Recommendation: <label id="treatment"><?php echo $sql_data['history_treat']; ?></label></p>
		</div>

		<br />

		<div class="para3">
			<p class="a3">&ensp;&ensp;&ensp;&ensp;This certificate is being issued upon the request of the above mentioned name for whatever 
				purpose it may serve (excluding legal matters).</p>
		</div>

		<div class="phys">
			<p>Respectfully yours,</p>
			<p><label id="physician"><?php echo $sql_data['history_physician']; ?></label></p>
			<p>MEDICAL CONSULTANT/CLINIC PHYSICIAN</p>
			<p>License No. <label id="lic_no"><?php echo $sql_data['history_license']; ?></label></p>
		</div>
	</div>

</body>
</html>
<?php
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>