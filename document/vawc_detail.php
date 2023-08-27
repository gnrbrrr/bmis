<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$id = $_GET['id'];
	$cid = $_GET['cid'];
	$rid = $_GET['rid'];
	
	$vawc = $conn->prepare("SELECT * FROM tbl_new_vwac WHERE vwac_id = '$id'");
	$vawc->execute();
	$vawc_data = $vawc->fetch();
	
	$date_report = date("M d, Y", strtotime($vawc_data['date_report']));
	$date_incident = date("M d, Y", strtotime($vawc_data['date_incident']));
	$bday =  date("M d, Y", strtotime($vawc_data['birth_date']));
	$bday_Suspek =  date("M d, Y", strtotime($vawc_data['sus_birth_date']));
	$bday_Victim =  date("M d, Y", strtotime($vawc_data['vic_birth_date']));
	
?>	
<head>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/misc-js.php'); ?>
</head>

		<div class="m-l-40"><b class="text-info">Entry Number : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['entry_number']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Type of Incident : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['incident_type']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Date of Report : </b>
			<p style="padding-left:27px;"><?php echo $date_report; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Time of Report : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['time_report']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Date of Incident : </b>
			<p style="padding-left:27px;"><?php echo $date_incident; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Time of Incident : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['time_incident']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Name : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['pronoun2']; ?>. <?php echo $vawc_data['sus_last_name']?> <?php echo $vawc_data['sus_given_name']; ?> <?php echo $vawc_data['sus_middle_name']; ?> <?php echo $vawc_data['sus_name_extension']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Nickname : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_nickname']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Citizenship : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_citizenship']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Gender : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_gender']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect civil_status : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_civil_status']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Date of Birth : </b>
			<p style="padding-left:27px;"><?php echo $bday_Suspek ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Age : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_age']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Place of Birth : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_birth_place']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect educational_attainment : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_educational_attainment']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Occupation : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_occupation']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Current Address : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_current_address']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Current Barangay : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_barangay']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Current Town/City : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_town_city']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Suspect Current Province : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['sus_province']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">With Previous Criminal Record : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['prev_criminal_rec']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Status of Previous Case : </b>
			<p style="padding-left:27px;"><?php echo $vawc_data['status_prev_case']; ?></p>
		</div>
		
		
		
		
	<a type="button" class="btn btn-info waves-effect waves-light nyroModal" href="add.php?cerid=<?php echo $cid; ?>&res=<?php echo $rid; ?>"><i class="ti-back-left me-1"></i> Go Back</a>
<style>
	#nyroModalWrapper{
		margin-top: -400px !important;
		height: 600px !important;
		width: 400px !important;
		overflow: auto;
		overflow-y: auto;
	}
</style>