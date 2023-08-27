<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	if(isset($_POST['id'])){
		$sm_id = $_POST['id'];
	}else{
		$sm_id = $_GET['id'];
	}
	
	$sql = $conn->prepare("SELECT * FROM tbl_lupon_summons WHERE sm_id = '$sm_id'");
	$sql->execute();
	$sql_data = $sql->fetch();

	$lpn_id = $sql_data['lpn_id'];
	
	$day_issued = date("jS", strtotime($sql_data['date_summon']));
	$month_issued = date("F", strtotime($sql_data['date_summon']));
	$year_issued = date("Y", strtotime($sql_data['date_summon']));

	$day_summon = date("d", strtotime($sql_data['date_summon']));

	$day_today = date("d");
	$month_today = date("F");
	$year_today = date("Y");

	$first_complainant = $sql_data['complainant1_firstname'] . " " . $sql_data['complainant1_middlename'] . " " . $sql_data['complainant1_lastname'];
	$first_respondent = $sql_data['respondent1_firstname'] . " " . $sql_data['respondent1_middlename'] . " " . $sql_data['respondent1_lastname'];
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

		<center><div style="margin-top:-3%; margin-bottom:-3%;">
			<h3>SUMMONS</h3>
		</div></center>
		
		<table style="position:absolute; margin-top:1.6%; margin-left:50%; width:400px;">
			<tr>
				<td class="p1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<b>Brgy. Case No. <?php echo $sql_data['bldg_summon']; ?></b></td>
			</tr>
			<tr>
				<td class="p1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<b>Para sa: <?php echo $sql_data['ukol_summon']; ?></b></td>
			</tr>
		</table>

		<table style="margin-left:-55%; font-family:arial; font-size:14px; width:300px;">
			<tr>
				<td id="complainants" style="text-align:left; height:auto; vertical-align:bottom;"><b>
					<div style="display:block;">
						<p id="complainant1" style="font-family:arial;"><b><?php echo $sql_data['complainant1_lastname']; ?>, <?php echo $sql_data['complainant1_firstname']; ?> <?php echo $sql_data['complainant1_middlename']; ?></b></p>
						<p id="complainant2" style="font-family:arial; display:none;"><b><?php echo $sql_data['complainant2_lastname']; ?>, <?php echo $sql_data['complainant2_firstname']; ?> <?php echo $sql_data['complainant2_middlename']; ?></b></p>
						<p id="complainant3" style="font-family:arial; display:none;"><b><?php echo $sql_data['complainant3_lastname']; ?>, <?php echo $sql_data['complainant3_firstname']; ?> <?php echo $sql_data['complainant3_middlename']; ?></b></p>
					</div>
				</b></td>
			</tr>
		</table>
		<table style="margin-left:-68%; font-size:12px; width:200px;">
			<tr>
				<td id="complainants_address"><?php echo $sql_data['tirahan_sumbong']; ?></td>
			</tr>
		</table>

		<br />

		<p class="p1">(Nagrereklamo)</p>

		<p class="p1" style="margin-top: 2%;">Inirereklamo</p>

		<!-- <p class="p1" style="margin-top: 2%;">Laban kay/Kina</p> -->

		<table style="margin-left:-55%; font-family:arial; font-size:14px; width:300px;">
			<tr>
				<td id="complainants" style="text-align:left; height:auto; vertical-align:bottom;"><b>
					<div style="display:block;">
						<p id="respondent1" style="font-family:arial;"><b><?php echo $sql_data['respondent1_lastname']; ?>, <?php echo $sql_data['respondent1_firstname']; ?> <?php echo $sql_data['respondent1_middlename']; ?></b></p>
						<p id="respondent2" style="font-family:arial; display:none;"><b><?php echo $sql_data['respondent2_lastname']; ?>, <?php echo $sql_data['respondent2_firstname']; ?> <?php echo $sql_data['respondent2_middlename']; ?></b></p>
						<p id="respondent3" style="font-family:arial; display:none;"><b><?php echo $sql_data['respondent3_lastname']; ?>, <?php echo $sql_data['respondent3_firstname']; ?> <?php echo $sql_data['respondent3_middlename']; ?></b></p>
					</div>
				</b></td>
			</tr>
		</table>
		<table style="margin-left:-68%; font-size:12px; width:200px;">
			<tr>
				<td id="complainants_address"><?php echo $sql_data['tirahan_sumbong1']; ?></td>
			</tr>
		</table>

		<br />

		<p class="p1">(Laban Kay/Kina)</p>

		<div class="divBody2"> <!--Main Content Start-->
			
			<center><p class="a1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Ikaw ay tinatawag upang dumalo at magpaliwanag sa harap ng Lupon/Pangkat Tagapagkasundo sa araw ng <span style="text-decoration:underline;"><?php echo $day_summon; ?></span>, <?php echo $year_today; ?> sa oras na <span style="text-decoration:underline;"><?php echo $sql_data['time_summon']; ?></span> ng umaga/hapon.</p></center>
			<center><p class="a1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Sa pag titipon na ito, papakinggan ng lupon/Pangkat Tagapagkasundo ang iyong sagot laban sa reklamo na inihain sa iyo upang maisasaayos ang anomang alitan ninyo ng Nagrereklamo sa Mediation/Conciliation proceedings.</p></center>
			<center><p class="a1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Tandaan na ang pagsunod sa imbitasyon na ito ng Lupon Tagapamayapa ay naaayon sa Batas at may karapatang parusa sa pagsuway. Pinapaalalahanan ka/kayo na huwag magsuot ng sando, short pants, tube/sleeveless/spaghetti strap blouse, rubber slippers, at huwag nakainom ng alak o naka-droga sa pandinig.</p></center>


			<br /><br /><br />
			<div>
				<table style="position:absolute; width:400px; margin-left:60%; text-align:left;">
					<tr>
						<td style="text-decoration:underline;"><b>HON. ASUNCION M. VISAYA</b></td>
					</tr>
					<tr>
						<td><b>Punong Barangay</b></td>
					</tr>
				</table>
			</div>

			<br /><br /><br />
			<center><p>Para sa pag-aabot ng SUMMONS/IMBITASYON:</p></center>



			<center>
			<div style="width:90%;">
				<ul style="width:100%; margin-left:2%; text-align:justify; font-family:arial; font-size:12px; list-style:none;">
					<li><input type="radio"/>Makakarating ang reklamo sa itinakdang oras at petsa sa pagdinig</li>
					<li><input type="radio"/>Hindi Makakarating ang inirereklamo ngunit mayroon siyang Representative na ang ngalan ay _______________, Ang Representative ay kailangan may dalang Authorization Letter na galing sa inirereklamo.</li>
					<li><input type="radio"/>Ang Representative ay makakarating sa itinakdang oras at petsa ng pagdinig</li>
					<li><input type="radio"/>Hindi makakarating ang inirereklamo o Representative sa itinakdang oras at petsa ng pagdinig</li>
				</ul>
			</div></center>

			<br />

		

			<center><table style="width:90%; text-align:center; font-family:arial; font-size:12px;">
				<tr>
					<td style="width:45%;">________________________</td>
					<td style="width:45%;">________________________</td>
					
				</tr>
				<tr>
					<td style="width:45%;"><b>Pangalan ng tumanggap/s</b></td>
					<td style="width:45%;"><b>Pangalanng BPSO Server</b></td>
				</tr>
					<td style="width:45%;">________________________</td>
					<td style="width:45%;">________________________</td>
				<!-- <tr>
					<td style="width:45%;"><b><?php echo strtoupper($first_complainant); ?></b></td>
					<td style="width:45%;"><b><?php echo strtoupper($first_respondent); ?></b></td>-->
				</tr>
				<tr>
					<td style="width:45%;"><b>Petsa at Oras/s</b></td>
					<td style="width:45%;"><b>Petsa at Oras/s</b></td>
				</tr>
			</table></center>
		</div> <!--Main Content End-->

		<!-- <div class="bottom-content" style="position:absolute; margin-top:50%; font-family:arial;">
			<center><p><b>PAGPAPATUNAY</b></p></center>
			<center><p class="a1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<B>PINATUTUNAYAN KO NA ANG KASUNDUANG ITO GINAWA NG DALAWANG PANIG AY KUSA AT MALAYA
				NILANG GINAWA PAGKATAPOS NA AKING MAIPALIWANAG SA KANILA ANG KAHIHINATNAN NG KASUNDUANG ITO.</B>
			</p></center>
		</div>


		<table style="position:absolute; width:400px; margin-top:70%; margin-left:60%; text-align:left;">
			<tr>
				<td style="text-decoration:underline;"><b>HON. ASUNCION M. VISAYA</b></td>
			</tr>
			<tr>
				<td><b>Punong Barangay</b></td>
			</tr>
		</table> -->

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
	var comp2 = "<?php echo $sql_data['complainant2_lastname']; ?>, <?php echo $sql_data['complainant2_firstname']; ?> <?php echo $sql_data['complainant2_middlename']; ?>";
	var comp3 = "<?php echo $sql_data['complainant3_lastname']; ?>, <?php echo $sql_data['complainant3_firstname']; ?> <?php echo $sql_data['complainant3_middlename']; ?>";

	//respondents
	var resp2 = "<?php echo $sql_data['respondent2_lastname']; ?>, <?php echo $sql_data['respondent2_firstname']; ?> <?php echo $sql_data['respondent2_middlename']; ?>";
	var resp3 = "<?php echo $sql_data['respondent3_lastname']; ?>, <?php echo $sql_data['respondent3_firstname']; ?> <?php echo $sql_data['respondent3_middlename']; ?>";


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
	$url = "index.php?view=detail&id=$lpn_id";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>