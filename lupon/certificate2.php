<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_lupon WHERE lpn_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$day_issued = date("jS", strtotime($sql_data['lpn_date']));
	$month_issued = date("F", strtotime($sql_data['lpn_date']));
	$year_issued = date("Y", strtotime($sql_data['lpn_date']));

	$day_iss = date("d", strtotime($sql_data['lpn_date']));

	$day_today = date("d");
	$month_today = date("F");
	$year_today = date("Y");

	$first_complainant = $sql_data['lpn_complaints1_firstname'] . " " . $sql_data['lpn_complaints1_middlename'] . " " . $sql_data['lpn_complaints1_lastname'];
	$first_respondent = $sql_data['lpn_respondent1_firstname'] . " " . $sql_data['lpn_respondent1_middlename'] . " " . $sql_data['lpn_respondent1_lastname'];
?>
<html>
<head>
<title>Tagapamayapa</title>
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

<body onload="window.print()" style="background-repeat: no-repeat; background-size: 100% 100%;">
<style>
	body{
		height:15%;
		width:100%;
	}

	.divBody{
		width: 100%;
		height: 87%;
	}

	.lupon-title{
		font-family: arial;
		font-size: 24px;
		font-weight:bold;
		margin-top:-5%;
	}

	.second-title{
		font-family: arial;
		font-size: 14px;
		font-weight:bold;
	}

	.p1{
		display:flex;
		justify-items: flex-start;
		margin-left: 5%;
		font-family: arial;
		font-size: 12px;
		font-weight: bold;
	}

	.a1{
		width: 90%;
		overflow-wrap: break-word;
		font-family: arial;
		font-size: 12px;
		text-align: justify;
	}
</style>	

	<div class="divBody">
		<center><img src="../images/certificate/new_lupon_header1.png" alt="Header Image" style="display: block; width:100%; height:50%;"></center>

		<center><p class="lupon-title"></p><center>
		<br /><br />
		
		<table style="position:absolute; margin-top:1.6%; margin-left:50%; width:400px;">
			<tr>
				<td class="p1"><b>Usaping Brgy BLG. <?php echo $sql_data['lpn_usp_brgy_blg']; ?></b></td>
			</tr>
			<tr>
				<td class="p1"><b>Ukol sa: <?php echo $sql_data['lpn_ukol_sa']; ?></b></td>
			</tr>
		</table>

		<table style="margin-left:-56%; font-family:arial; font-size:14px; width:300px;">
			<tr>
				<td id="complainants" style="text-align:left; height:auto; vertical-align:bottom;"><b>
					<div style="display:block;">
						<p id="complainant1" style="font-family:arial;"><b><?php echo $sql_data['lpn_complaints1_lastname']; ?>, <?php echo $sql_data['lpn_complaints1_firstname']; ?> <?php echo $sql_data['lpn_complaints1_middlename']; ?></b></p>
						<p id="complainant2" style="font-family:arial; display:none;"><b><?php echo $sql_data['lpn_complaints2_lastname']; ?>, <?php echo $sql_data['lpn_complaints2_firstname']; ?> <?php echo $sql_data['lpn_complaints2_middlename']; ?></b></p>
						<p id="complainant3" style="font-family:arial; display:none;"><b><?php echo $sql_data['lpn_complaints3_lastname']; ?>, <?php echo $sql_data['lpn_complaints3_firstname']; ?> <?php echo $sql_data['lpn_complaints3_middlename']; ?></b></p>
					</div>
				</b></td>
			</tr>
		</table>
		<table style="margin-left:-68%; font-size:12px; width:200px;">
			<tr>
				<td id="complainants_address"><?php echo $sql_data['lpn_tirahan_sumbong']; ?></td>
			</tr>
		</table>

		<br />

		<p class="p1">(Mga/Maysumbong)</p>

		<p class="p1" style="margin-top: 2%;">-Laban kay/Kina-</p>

		<table style="margin-left:-56%; font-family:arial; font-size:14px; width:300px;">
			<tr>
				<td id="complainants" style="text-align:left; height:auto; vertical-align:bottom;"><b>
					<div style="display:block;">
						<p id="respondent1" style="font-family:arial;"><b><?php echo $sql_data['lpn_respondent1_lastname']; ?>, <?php echo $sql_data['lpn_respondent1_firstname']; ?> <?php echo $sql_data['lpn_respondent1_middlename']; ?></b></p>
						<p id="respondent2" style="font-family:arial; display:none;"><b><?php echo $sql_data['lpn_respondent2_lastname']; ?>, <?php echo $sql_data['lpn_respondent2_firstname']; ?> <?php echo $sql_data['lpn_respondent2_middlename']; ?></b></p>
						<p id="respondent3" style="font-family:arial; display:none;"><b><?php echo $sql_data['lpn_respondent3_lastname']; ?>, <?php echo $sql_data['lpn_respondent3_firstname']; ?> <?php echo $sql_data['lpn_respondent3_middlename']; ?></b></p>
					</div>
				</b></td>
			</tr>
		</table>
		<table style="margin-left:-68%; font-size:12px; width:200px;">
			<tr>
				<td id="complainants_address"><?php echo $sql_data['lpn_tirahan_sumbong1']; ?></td>
			</tr>
		</table>

		<br />

		<p class="p1">(Mga/Ipinagsusumbong)</p>

		<div class="divBody2"> <!--Main Content Start-->
			<center><p class="second-title">KASUNDUAN NG PAG-AAYOS</p></center>

			<center><p class="a1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Kami ang (mga) may sumbong at (mga) ipinagsusumbong sa usaping binabanggit sa itaas, ay nagkasundo
				sa pamamagitan nito na ayusin ang aming mga alitan gaya ng mga sumusunod:
			</p></center>

			<center><ol style="width:100%; margin-left:2%; text-align:justify; font-family:arial; font-size:12px;">
				<li id="kas1" style="width:88%;"><?php echo $sql_data['kasunduan1']; ?></li>
				<li id="kas2" style="width:88%;"><?php echo $sql_data['kasunduan2']; ?></li>
				<li id="kas3" style="width:88%;"><?php echo $sql_data['kasunduan3']; ?></li>
				<li id="kas4" style="width:88%;"><?php echo $sql_data['kasunduan4']; ?></li>
				<li id="kas5" style="width:88%;"><?php echo $sql_data['kasunduan5']; ?></li>
			</ol></center>

			<br />

			<center><p class="a1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;At nangangako po kami na tutupad ang tunay at matapat sa mga nakatakdang
				pag-aayos na inilalahad sa itaas.
			</p></center>

			<center><p class="a1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Pinag-kasunduan ngayong ika-<b><?php echo $day_today; ?></b> Araw ng <b><?php echo 
				$month_today; ?>, <?php echo $year_today; ?></b>.</p></center>

			
			<br /><br />

			<center><table style="width:90%; text-align:center; font-family:arial; font-size:12px;">
				<tr>
					<td style="width:45%;"><b>Complainant/s</b></td>
					<td style="width:45%;"><b>Respondent/s</b></td>
				</tr>
				<tr>
					<td style="width:45%;">________________________</td>
					<td style="width:45%;">________________________</td>
				</tr>
				<tr>
					<td style="width:45%;"><b><?php echo strtoupper($first_complainant); ?></b></td>
					<td style="width:45%;"><b><?php echo strtoupper($first_respondent); ?></b></td>
				</tr>
			</table></center>
		</div> <!--Main Content End-->

		<div class="bottom-content" style="position:absolute; margin-top:30%; font-family:arial;">
			<center><p><b>PAGPAPATUNAY</b></p></center>
			<center><p class="a1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<B>PINATUTUNAYAN KO NA ANG KASUNDUANG ITO GINAWA NG DALAWANG PANIG AY KUSA AT MALAYA
				NILANG GINAWA PAGKATAPOS NA AKING MAIPALIWANAG SA KANILA ANG KAHIHINATNAN NG KASUNDUANG ITO.</B>
			</p></center>
		</div>


		<table style="position:absolute; width:400px; margin-top:45%; margin-left:25%; text-align:center;">
			<tr>
				<td style="text-decoration:underline;"><b>HON. ASUNCION M. VISAYA</b></td>
			</tr>
			<tr>
				<td><b>Punong Barangay</b></td>
			</tr>
		</table>

		<div style="position:absolute; margin-top:50%; margin-left:-7%; width:110%;">
			<table style="width:100%; text-align:center; font-family:arial; font-size:12px;">
				<tr>
					<td style="width:50%;">________________________</td>
					<td style="width:50%;">________________________</td>
				</tr>
				<tr>
					<td style="width:50%;">(KALIHIM NG LUPON)</td>
					<td style="width:50%;">(PANGKAT CHAIRMAN)</td>
				</tr>
				<tr><td><br /></td></tr>
				<tr>
					<td style="width:50%;">________________________</td>
				</tr>
				<tr>
					<td style="width:50%;">(MEMBER)</td>
				</tr>
			</table>
		</div>

	</div>
</body>
</html>
<script>
	var kas1 = "<?php echo $sql_data['kasunduan1']; ?>";
	var kas2 = "<?php echo $sql_data['kasunduan2']; ?>";
	var kas3 = "<?php echo $sql_data['kasunduan3']; ?>";
	var kas4 = "<?php echo $sql_data['kasunduan4']; ?>";
	var kas5 = "<?php echo $sql_data['kasunduan5']; ?>";

	//complainants
	var comp2 = "<?php echo $sql_data['lpn_complaints2_lastname']; ?>, <?php echo $sql_data['lpn_complaints2_firstname']; ?> <?php echo $sql_data['lpn_complaints2_middlename']; ?>";
	var comp3 = "<?php echo $sql_data['lpn_complaints3_lastname']; ?>, <?php echo $sql_data['lpn_complaints3_firstname']; ?> <?php echo $sql_data['lpn_complaints3_middlename']; ?>";

	//respondents
	var resp2 = "<?php echo $sql_data['lpn_respondent2_lastname']; ?>, <?php echo $sql_data['lpn_respondent2_firstname']; ?> <?php echo $sql_data['lpn_respondent2_middlename']; ?>";
	var resp3 = "<?php echo $sql_data['lpn_respondent3_lastname']; ?>, <?php echo $sql_data['lpn_respondent3_firstname']; ?> <?php echo $sql_data['lpn_respondent3_middlename']; ?>";


	if(comp2 != "" || comp3 != ""){
		if(comp2 != ""){
			document.getElementById("complainant2").style.display = "block";
		}
		if(comp3 != ""){
			document.getElementById("complainant3").style.display = "block";
		}
	}

	if(resp2 != "" || resp3 != ""){
		if(resp2 != ""){
			document.getElementById("respondent2").style.display = "block";
		}
		if(resp3 != ""){
			document.getElementById("respondent3").style.display = "block";
		}
	}

	var kas_list = [kas1, kas2, kas3, kas4, kas5];
	var kas_list2 = ["kas1", "kas2", "kas3", "kas4", "kas5"];

	for (let i = 0; i < 5; i++){
		if(kas_list[i] === ""){
			document.getElementById(kas_list2[i]).style.display = "none";
		}
	}

</script>
<?php
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>