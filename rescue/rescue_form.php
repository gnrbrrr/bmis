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
			margin-top: -4%;
		}

		.table_label{
			margin-bottom: -0.5%;
			margin-left: 5%;
			font-family: arial;
			font-weight: bold;
			font-size: 18px;
		}

		.mini_label{
			margin-bottom: -0.5%;
			margin-left: 7%;
			font-family: arial;
			font-weight: bold;
			font-size: 16px;
		}

		tr, td{
			border-collapse: collapse;
			border: 2px solid black;
		}

		.ph1, .ph2, .ph3, .ph4, .pa1, .pa2, .pa3, .pa4, .gcs, .obh, .nb, .receive, .rot, .aos, .fin{
			width: 86%;
			font-family: arial;
			font-size: 12px;
		}

		.pa1 td, .pa3 td, .pa4 td{
			width: 200px;
		}

		.pa2, .gcs{
			border-collapse: collapse;
		}

		.pa2 .pa_vac_date{
			width: 300px;
			text-align: center;
		}

		.pa2 th, .pa2 .on, .pa2 .in{
			text-align: center;
			width: 120px;
		}

		.patient_name{
			width: 290px;
		}

		.patient_address{
			width: 290px;
		}

		.case_type{
			width: 185px;
		}

		.patient_case, .location_incident{
			width: 300px;
		}

		.gcs td, .obh td{
			text-align: center;
		}

		
	</style>

	<center><img src="../images/header8'5x2.png"></center>
	<br />

	<div class="main">
		<div class="pre_hospital_row">
			<p class="table_label"><b>PRE-HOSPITAL CARE REPORT</b></p>
			<center><table class="ph1">
				<tr>
					<td><b>DATE:</b> <?php echo $month_incident; ?> <?php echo $day_inci; ?>, <?php echo $year_incident; ?></td>
					<td><b>TIME OF INCIDENT:</b> <?php echo $sql_data['ph_time_incident']; ?></td>
					<td class="time_reported"><b>TIME REPORTED:</b> <?php echo $sql_data['ph_time_report']; ?></td>
					<td class="time_arrival"><b>TIME ARRIVAL:</b> <?php echo $sql_data['ph_time_arrival']; ?></td>
				</tr>
			</table></center>

			<center><table class="ph2">
				<tr>
					<td class="patient_name"><b>PATIENT'S NAME:</b> <?php echo $sql_data['ph_name']; ?></td>
					<td class="reported_by"><b>REPORTED BY:</b> <?php echo $sql_data['ph_reported_by']; ?></td>
					<td class="patient_contact"><b>CONTACT NUMBER:</b> <?php echo $sql_data['ph_contact']; ?></td>
				</tr>
			</table></center>

			<center><table class="ph3">
				<tr>
					<td class="patient_address"><b>ADDRESS:</b> <?php echo $sql_data['ph_address']; ?></td>
					<td class="case_type"><b>CASE TYPE:</b> <?php echo $sql_data['ph_case_type']; ?></td>
					<td class="patient_age"><b>AGE:</b> <?php echo $sql_data['ph_age']; ?></td>
					<td class="patient_gender"><b>GENDER:</b> <?php echo $sql_data['ph_gender']; ?></td>
				</tr>
			</table></center>

			<center><table class="ph4">
				<tr>
					<td class="patient_case"><b>INCIDENT CASE:</b> <?php echo $sql_data['ph_case']; ?></td>
					<td class="location_incident"><b>LOCATION OF INCIDENT:</b> <?php echo $sql_data['ph_location_incident']; ?></td>
				</tr>
			</table></center>
		</div>

		<div class="patient_assessment_row">
			<p class="table_label"><b>PATIENT ASSESSMENT</b></p>
			<center><table class="pa1">
				<tr>
					<td class="pa_complaint"><b>COMPLAINT:</b> <?php echo $sql_data['pa_complaint']; ?></td>
					<td classs="pa_allergy"><b>Allergy:</b> <?php echo $sql_data['pa_allergy']; ?></td>
					<td class="pa_past_hx"><b>Past Hx:</b> <?php echo $sql_data['pa_past_hx']; ?></td>
				</tr>
				<tr>
					<td class="pa_last_meal"><b>Last Meal:</b> <?php echo $sql_data['pa_last_meal']; ?></td>
					<td class="pa_events_prior"><b>Events Prior:</b> <?php echo $sql_data['pa_events_prior']; ?></td>
					<td class="pa_onset"><b>Onset:</b> <?php echo $sql_data['pa_onset']; ?></td>
				</tr>
				<tr>
					<td class="pa_palliation"><b>Palliation:</b> <?php echo $sql_data['pa_palliation']; ?></td>
					<td class="pa_quality"><b>Quality:</b> <?php echo $sql_data['pa_quality']; ?></td>
					<td class="pa_radiation"><b>Radiation:</b> <?php echo $sql_data['pa_radiation']; ?></td>
				</tr>
				<tr>
					<td class="pa_severity"><b>Severity:</b> <?php echo $sql_data['pa_severity']; ?></td>
					<td class="pa_other"><b>OTHER MNGT/ASSESSMENT:</b> <?php echo $sql_data['pa_other']; ?></td>
					<td class="pa_time"><b>Time:</b> <?php echo $sql_data['pa_time']; ?></td>
				</tr>
			</table></center>

			<br />

			<center><table class="pa2">
				<tr>
					<th><b>VITAL SIGNS</b></th>
					<th><b>BP</b></th>
					<th><b>PR</b></th>
					<th><b>RR</b></th>
					<th><b>TEMP</b></th>
					<th><b>SPO2</b></th>
				</tr>
				<tr class="on">
					<td><b>ONSCENE</b></td>
					<td><?php echo $sql_data['pa_on_bp'] ?></td>
					<td><?php echo $sql_data['pa_on_pr'] ?></td>
					<td><?php echo $sql_data['pa_on_rr'] ?></td>
					<td><?php echo $sql_data['pa_on_temp'] ?></td>
					<td><?php echo $sql_data['pa_on_spo2'] ?></td>
				</tr>
				<tr class="in">
					<td><b>IN TRANSIT</b></td>
					<td><?php echo $sql_data['pa_in_bp'] ?></td>
					<td><?php echo $sql_data['pa_in_pr'] ?></td>
					<td><?php echo $sql_data['pa_in_rr'] ?></td>
					<td><?php echo $sql_data['pa_in_temp'] ?></td>
					<td><?php echo $sql_data['pa_in_spo2'] ?></td>
				</tr>
				<tr>
					<td class="pa_vac_date"><b>Vaccination Date: </b><?php echo $sql_data['pa_vacs_date']; ?></td>
				</tr>
			</table></center>

			<br />

			<center><table class="pa3">
				<tr>
					<td class="pa_thor"><b>Thorough Assessment:</b> <?php echo $sql_data['pa_is_thor_assess']; ?></td>
					<td class="pa_rapid"><b>Rapid Assessment:</b> <?php echo $sql_data['pa_is_rapid_assess']; ?></td>
					<td class="pa_dress_wound"><b>Dressed Wound:</b> <?php echo $sql_data['pa_is_dressed_wound']; ?></td>
				</tr>
				<tr>
					<td class="pa_cpr"><b>CPR:</b> <?php echo $sql_data['pa_is_cpr']; ?></td>
					<td class="pa_line"><b>IV Line of Suction Secretion:</b> <?php echo $sql_data['pa_is_iv_line']; ?></td>
					<td class="pa_splinting"><b>Splinting:</b> <?php echo $sql_data['pa_is_splinting']; ?></td>
				</tr>
				<tr>
					<td class="pa_complete"><b>Complete Spine IMM:</b> <?php echo $sql_data['pa_is_complete_spine']; ?></td>
					<td class="pa_o2"><b>O2 Administer:</b> <?php echo $sql_data['pa_is_o2_adm']; ?> a(<?php echo $sql_data['o2_value']; ?> via: <?php echo $sql_data['o2_via']; ?>)</td>
					<td class="pa_med"><b>Gave Meds:</b> <?php echo $sql_data['pa_is_gave_med']; ?> <?php echo $sql_data['med_given']; ?></td>
				</tr>
				<tr>
					<td class="pa_blood"><b>Blood Sugar: </b><?php echo $sql_data['pa_is_blood_sugar']; ?> <?php echo $sql_data['bloods_mg_dl']; ?></td>
				</tr>
			</table></center>


			<p class="mini_label">LEVEL OF CONSCIOUSNESS</p>
			<center><table class="pa4">
				<tr>
					<td class="pa_alert"><b>Option1: </b><?php echo $sql_data['pa_option1']; ?></td>
					<td class="pa_verbal"><b>Option2: </b><?php echo $sql_data['pa_option2']; ?></td>
			</table></center>
		</div>

		<div class="glasgow_scale_row">
			<p class="table_label"><b>GLASGOW COMA SCALE</b></p>
			<center><table class="gcs">
				<tr>
					<th><b>EYES</b></th>
					<th><b>VERBAL</b></th>
					<th><b>INFANT</b></th>
					<th><b>MOTOR</b></th>
				</tr>
				<tr>
					<td><?php echo $sql_data['gcs_eyes']; ?></td>
					<td><?php echo $sql_data['gcs_verbal']; ?></td>
					<td><?php echo $sql_data['gcs_infant']; ?></td>
					<td><?php echo $sql_data['gcs_motor']; ?></td>
				</tr>
			</table></center>
		</div>

		<div class="ob_history_row">
			<p class="table_label"><b>OB HISTORY</b></p>
			<center><table class="obh">
				<tr>
					<td><b>LMP: </b><?php echo $sql_data['ob_lmp']; ?></td>
					<td><b>EDC: </b><?php echo $sql_data['ob_edc']; ?></td>
					<td><b>G: </b><?php echo $sql_data['ob_g']; ?>&nbsp; <b>P: </b><?php echo $sql_data['ob_p1']; ?></td>
				</tr>
				<tr>
					<td><b>AOG: </b><?php echo $sql_data['ob_aog_wks']; ?> <b>wks</b>&nbsp;<?php echo $sql_data['ob_aog_day']; ?> <b>days</b></td>
					<td><b>T: </b><?php echo $sql_data['ob_t']; ?>&nbsp;<b>P: </b><?php echo $sql_data['ob_p2']; ?>&nbsp;<b>A: </b><?php echo $sql_data['ob_a']; ?>&nbsp;<b>L: </b><?php echo $sql_data['ob_l']; ?></td>
				</tr>
			</table></center>
		</div>

		<div class="newborn_row">
			<p class="table_label"><b>NEWBORN</b></p>
			<center><table class="nb">
				<tr>
					<td><b>GENDER: </b><?php echo $sql_data['nb_gender']; ?></td>
					<td><b>TIME: </b><?php echo $sql_data['nb_time']; ?></td>
					<td><b>PLACENTA: </b><?php echo $sql_data['nb_placenta']; ?></td>
				</tr>
			</table></center>
		</div>

		<br />

		<div class="receiving_row">
			<center><table class="receive">
				<tr>
					<td><b>Receiving Facility: </b><?php echo $sql_data['receiving_facility']; ?></td>
					<td><b>Receiving MD/NURSE/MIDWIFE: </b><?php echo $sql_data['receiver']; ?></td>
				</tr>
			</table></center>
		</div>

		<div class="receiving_row">
			<p class="table_label"><b>REFUSAL OF TREATMENT</b></p>
			<center><table class="rot">
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;I hereby refuse treatment / transport to a hospital, and I acknowledge that such treatment / transportation was advised by 
						the ambulance crew or physician. I hereby such persons from liability for respecting and following my expressed wishes. <br /><br /><center><b>Signed By: </b><?php echo $sql_data['rot_person_sign']; ?>&nbsp;&nbsp;<b>Witnessed: </b><?php echo $sql_data['rot_witness']; ?></center></td>
				</tr>
			</table></center>
		</div>

		<div class="accept_row">
			<p class="table_label"><b>ACCEPTANCE OF SERVICE</b></p>
			<center><table class="aos">
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;I, the undersigned, hereby authorized the <b>BARANGAY MAGALLANES DRRM</b> to provide me with emergency or non-emergency transportation 
					and/or any Medical treatment of services it deems necessary. <br /><br /><center><b>Signed By: </b><?php echo $sql_data['aos_name']; ?></center></td>
				</tr>
			</table></center>
		</div>

		<div class="final">
			<center><table class="fin">
				<tr>
					<td><b>Responding Team:</b> <b>BARANGAY MAGALLANES DRRM</b></td>
					<td><b>Team Leader:</b> <?php echo $sql_data['team_leader']; ?></td>
					<td><b>Driver:</b> <?php echo $sql_data['driver']; ?></td>
					<td><b>Rescuer/s:</b> <?php echo $sql_data['rescuers']; ?></td>
					<td><b>Accomplished By:</b> <?php echo $sql_data['accomplished_by']; ?></td>
					<td><b>Encoded By:</b> <?php echo $sql_data['encoded_by']; ?></td>
				</tr>
			</table></center>
		</div>
		
	</div>

</body>
</html>
<?php
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>