<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        add_data();
        break;
      
    case 'modify' :
        modify_data();
        break;
        
    case 'delete' :
        delete_data();
        break;
    
	case 'confirm' :
        confirm_data();
        break;
	
    case 'deleteImage' :
        deleteImage();
        break;
    
	   
    default :
        // if action is not defined or unknown
        // move to main category page
        header('Location: index.php');
}


/*
    Add Data
*/
function add_data()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	//Pre Hospital
	$date_incident = $_POST['ph_date_incident'];
	$time_incident = $_POST['ph_time_incident'];
	$time_incident_formatted = date("g:i A", strtotime($time_incident));
    $name = mysqli_real_escape_string($link, $_POST['ph_name']);
	$age = $_POST['ph_age'];
	$gender = $_POST['ph_gender'];
	$contact = mysqli_real_escape_string($link, $_POST['ph_contact']);
	$address = mysqli_real_escape_string($link, $_POST['ph_address']);
	$case = mysqli_real_escape_string($link, $_POST['ph_case']);
	$case_type = mysqli_real_escape_string($link, $_POST['ph_case_type']);
	$time_report = $_POST['ph_time_report'];
	$time_report_formatted = date("g:i A", strtotime($time_report));
	$time_arrival = $_POST['ph_time_arrival'];
	$time_arrival_formatted = date("g:i A", strtotime($time_arrival));
	$location_incident = mysqli_real_escape_string($link, $_POST['ph_location_incident']);
	$reported_by = $_POST['ph_reported_by'];

	//Patient Assessment
	$vacs_date = $_POST['pa_vacs_date'];
	$complaint = mysqli_real_escape_string($link, $_POST['pa_complaint']);
	$allergy = mysqli_real_escape_string($link, $_POST['pa_allergy']);
	$medication = mysqli_real_escape_string($link, $_POST['pa_medication']);
	$past_hx = mysqli_real_escape_string($link, $_POST['pa_past_hx']);
	$last_meal = mysqli_real_escape_string($link, $_POST['pa_last_meal']);
	$events_prior = mysqli_real_escape_string($link, $_POST['pa_events_prior']);
	$onset = mysqli_real_escape_string($link, $_POST['pa_onset']);
	$palliation = mysqli_real_escape_string($link, $_POST['pa_palliation']);
	$quality = mysqli_real_escape_string($link, $_POST['pa_quality']);
	$radiation = mysqli_real_escape_string($link, $_POST['pa_radiation']);
	$severity = mysqli_real_escape_string($link, $_POST['pa_severity']);
	$time = $_POST['pa_time'];
	$time_formatted = date("g:i A", strtotime($time));
	$other = mysqli_real_escape_string($link, $_POST['pa_other']);
	$thor_assess = $_POST['pa_thor_assess'];
	$rapid_assess = $_POST['pa_rapid_assess'];
	$o2_adm = $_POST['pa_o2_add'];
	$o2_val = mysqli_real_escape_string($link, $_POST['pa_o2_a']);
	$o2_via = mysqli_real_escape_string($link, $_POST['pa_o2_via']);
	$dressed_wound = $_POST['pa_dressed_wound'];
	$cpr = $_POST['pa_cpr'];
	$iv_line = $_POST['pa_iv_line'];
	$meds = $_POST['pa_gave_med'];
	$med_given = mysqli_real_escape_string($link, $_POST['med_given']);
	$blood_sugar = $_POST['pa_blood_sugar'];
	$bs_ml = mysqli_real_escape_string($link, $_POST['bs_ml']);
	$splinting = $_POST['pa_splinting'];
	$complete_spine = $_POST['pa_complete_spine'];

	//PA - Level of Consciousness
	$option1 = $_POST['pa_option1'];
	$option2 = $_POST['pa_option2'];
	$on_bp = mysqli_real_escape_string($link, $_POST['pa_on_bp']);
	$on_pr = mysqli_real_escape_string($link, $_POST['pa_on_pr']);
	$on_rr = mysqli_real_escape_string($link, $_POST['pa_on_rr']);
	$on_temp = mysqli_real_escape_string($link, $_POST['pa_on_temp']);
	$on_spo2 = mysqli_real_escape_string($link, $_POST['pa_on_spo2']);
	$in_bp = mysqli_real_escape_string($link, $_POST['pa_in_bp']);
	$in_pr = mysqli_real_escape_string($link, $_POST['pa_in_pr']);
	$in_rr = mysqli_real_escape_string($link, $_POST['pa_in_rr']);
	$in_temp = mysqli_real_escape_string($link, $_POST['pa_in_temp']);
	$in_spo2 = mysqli_real_escape_string($link, $_POST['pa_in_spo2']);

	//Glasgow Coma Scale
	$gcs_eyes = $_POST['gcs_eyes'];
	$gcs_verbal = $_POST['gcs_verbal'];
	$gcs_infant = $_POST['gcs_infant'];
	$gcs_motor = $_POST['gcs_motor'];

	//OB History
	$lmp = mysqli_real_escape_string($link, $_POST['ob_lmp']);
	$edc = mysqli_real_escape_string($link, $_POST['ob_edc']);
	$g = mysqli_real_escape_string($link, $_POST['ob_g']);
	$p = mysqli_real_escape_string($link, $_POST['ob_p']);
	$aog_wks = mysqli_real_escape_string($link, $_POST['ob_aog_wks']);
	$aog_days = mysqli_real_escape_string($link, $_POST['ob_aog_days']);
	$ob_t = mysqli_real_escape_string($link, $_POST['ob_t']);
	$ob_p2 = mysqli_real_escape_string($link, $_POST['ob_p2']);
	$ob_a = mysqli_real_escape_string($link, $_POST['ob_a']);
	$ob_l = mysqli_real_escape_string($link, $_POST['ob_l']);

	//Newborn
	$nb_gender = $_POST['nb_gender'];
	$nb_time = $_POST['nb_time'];
	$nb_time_formatted = date("g:i A", strtotime($nb_time));
	$nb_placenta = mysqli_real_escape_string($link, $_POST['nb_placenta']);

	//Apgar Score
	$as_1min = mysqli_real_escape_string($link, $_POST['as_1min']);
	$as_5min = mysqli_real_escape_string($link, $_POST['as_5min']);
	$as_10min = mysqli_real_escape_string($link, $_POST['as_10min']);
	$as_rec_fac = mysqli_real_escape_string($link, $_POST['as_rec_fac']);
	$as_receiving = mysqli_real_escape_string($link, $_POST['as_receiving']);
	$as_team_lead = mysqli_real_escape_string($link, $_POST['as_team_lead']);
	$as_driver = mysqli_real_escape_string($link, $_POST['as_driver']);
	$as_rescuers = mysqli_real_escape_string($link, $_POST['as_rescuers']);
	$as_acc_by = mysqli_real_escape_string($link, $_POST['as_acc_by']);
	$as_enc_by = mysqli_real_escape_string($link, $_POST['as_enc_by']);

	//Refusal Of Treatment
	$person_sign = mysqli_real_escape_string($link, $_POST['rot_person_sign']);
	$witness = mysqli_real_escape_string($link, $_POST['witness']);

	//Acceptance Of Service
	$patient_rela = mysqli_real_escape_string($link, $_POST['patient_rela']);

	//Emergency Care and Transportation
	$hospital_name = mysqli_real_escape_string($link, $_POST['hospital']);
	$doctor_name = mysqli_real_escape_string($link, $_POST['doctor_name']);
	$doctor_address = mysqli_real_escape_string($link, $_POST['doctor_address']);
	$requestor_name = mysqli_real_escape_string($link, $_POST['ect_name']);
	
	
	$sql = $conn->prepare("SELECT * FROM tbl_rescue WHERE ph_name = '$name' AND is_deleted != '1'");
	$sql->execute();
	if($sql_data = $sql->fetch()){
		header("Location: index.php?view=add&error=Patient already exist! Data entry failed.");
	}else{
        
		$sql = $conn->prepare("INSERT INTO tbl_rescue (ph_date_incident, ph_time_incident, ph_name, ph_address, ph_contact, ph_gender, ph_age, ph_case, ph_case_type, ph_time_report, ph_time_arrival, 
														ph_location_incident, ph_reported_by, pa_vacs_date, pa_complaint, pa_allergy, pa_medication, pa_past_hx, pa_last_meal, pa_events_prior, 
														pa_onset, pa_palliation, pa_quality, pa_radiation, pa_severity, pa_time, pa_other, pa_is_thor_assess, pa_is_rapid_assess, pa_is_o2_adm, o2_value, o2_via, 
														pa_is_dressed_wound, pa_is_cpr, pa_is_iv_line, pa_is_gave_med, med_given, pa_is_blood_sugar, bloods_mg_dl, pa_is_splinting, pa_is_complete_spine, 
														pa_option1, pa_option2, pa_on_bp, pa_on_pr, pa_on_rr, pa_on_temp, pa_on_spo2, 
														pa_in_bp, pa_in_pr, pa_in_rr, pa_in_temp, pa_in_spo2, gcs_eyes, gcs_verbal, gcs_infant, gcs_motor, ob_lmp, ob_g, ob_p1, ob_aog_wks, ob_aog_day, 
														ob_edc, ob_t, ob_p2, ob_a, ob_l, nb_gender, nb_time, nb_placenta, as_1min, as_5min, as_10min, receiving_facility, receiver, team_leader, 
														driver, rescuers, accomplished_by, encoded_by, rot_person_sign, rot_witness, aos_name, ect_hospital_name, ect_doctor_name, ect_doctor_address, ect_requestor_name, is_deleted)
																	
													VALUES ('$date_incident', '$time_incident_formatted', '$name', '$address', '$contact', '$gender', '$age', '$case', '$case_type', '$time_report_formatted', '$time_arrival_formatted', 
													'$location_incident', '$reported_by', '$vacs_date', '$complaint', '$allergy', '$medication', '$past_hx', '$last_meal', '$events_prior', 
													'$onset', '$palliation', '$quality', '$radiation', '$severity', '$time_formatted', '$other', '$thor_assess', '$rapid_assess', '$o2_adm', '$o2_val', '$o2_via', 
													'$dressed_wound', '$cpr', '$iv_line', '$meds', '$med_given', '$blood_sugar', '$bs_ml', '$splinting', '$complete_spine', 
													'$option1', '$option2', '$on_bp', '$on_pr', '$on_rr', '$on_temp', '$on_spo2', 
													'$in_bp', '$in_pr', '$in_rr', '$in_temp', '$in_spo2', '$gcs_eyes', '$gcs_verbal', '$gcs_infant', '$gcs_motor', '$lmp', '$g', '$p', '$aog_wks', '$aog_days', 
													'$edc', '$ob_t', '$ob_p2', '$ob_a', '$ob_l', '$nb_gender', '$nb_time_formatted', '$nb_placenta', '$as_1min', '$as_5min', '$as_10min', '$as_rec_fac', '$as_receiving', '$as_team_lead', 
													'$as_driver', '$as_rescuers', '$as_acc_by', '$as_enc_by', '$person_sign', '$witness', '$patient_rela', '$hospital_name', '$doctor_name', '$doctor_address', '$requestor_name', '0')");
		$sql->execute();

		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Rescue Unit Record Added', '$name', 'Rescue Unit Record', '$res_id', '$userId', '$today_date1')");
		$log->execute();
    
		header('Location: index.php?view=add&error=Added successfully');
	}
}
/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];
	
    //Pre Hospital
	$date_incident = $_POST['ph_date_incident'];
	$time_incident = $_POST['ph_time_incident'];
	$time_incident_formatted = date("g:i A", strtotime($time_incident));
    $name = mysqli_real_escape_string($link, $_POST['ph_name']);
	$age = $_POST['ph_age'];
	$gender = $_POST['ph_gender'];
	$contact = mysqli_real_escape_string($link, $_POST['ph_contact']);
	$address = mysqli_real_escape_string($link, $_POST['ph_address']);
	$case = mysqli_real_escape_string($link, $_POST['ph_case']);
	$case_type = mysqli_real_escape_string($link, $_POST['ph_case_type']);
	$time_report = $_POST['ph_time_report'];
	$time_report_formatted = date("g:i A", strtotime($time_report));
	$time_arrival = $_POST['ph_time_arrival'];
	$time_arrival_formatted = date("g:i A", strtotime($time_arrival));
	$location_incident = mysqli_real_escape_string($link, $_POST['ph_location_incident']);
	$reported_by = $_POST['ph_reported_by'];

	//Patient Assessment
	$vacs_date = $_POST['pa_vacs_date'];
	$complaint = mysqli_real_escape_string($link, $_POST['pa_complaint']);
	$allergy = mysqli_real_escape_string($link, $_POST['pa_allergy']);
	$medication = mysqli_real_escape_string($link, $_POST['pa_medication']);
	$past_hx = mysqli_real_escape_string($link, $_POST['pa_past_hx']);
	$last_meal = mysqli_real_escape_string($link, $_POST['pa_last_meal']);
	$events_prior = mysqli_real_escape_string($link, $_POST['pa_events_prior']);
	$onset = mysqli_real_escape_string($link, $_POST['pa_onset']);
	$palliation = mysqli_real_escape_string($link, $_POST['pa_palliation']);
	$quality = mysqli_real_escape_string($link, $_POST['pa_quality']);
	$radiation = mysqli_real_escape_string($link, $_POST['pa_radiation']);
	$severity = mysqli_real_escape_string($link, $_POST['pa_severity']);
	$time = $_POST['pa_time'];
	$time_formatted = date("g:i A", strtotime($time));
	$other = mysqli_real_escape_string($link, $_POST['pa_other']);
	$thor_assess = $_POST['pa_thor_assess'];
	$rapid_assess = $_POST['pa_rapid_assess'];
	$o2_adm = $_POST['pa_o2_add'];
	$o2_val = mysqli_real_escape_string($link, $_POST['pa_o2_a']);
	$o2_via = mysqli_real_escape_string($link, $_POST['pa_o2_via']);
	$dressed_wound = $_POST['pa_dressed_wound'];
	$cpr = $_POST['pa_cpr'];
	$iv_line = $_POST['pa_iv_line'];
	$meds = $_POST['pa_gave_med'];
	$med_given = mysqli_real_escape_string($link, $_POST['med_given']);
	$blood_sugar = $_POST['pa_blood_sugar'];
	$bs_ml = mysqli_real_escape_string($link, $_POST['bs_ml']);
	$splinting = $_POST['pa_splinting'];
	$complete_spine = $_POST['pa_complete_spine'];

	//PA - Level of Consciousness
	$option1 = $_POST['pa_option1'];
	$option2 = $_POST['pa_option2'];
	$on_bp = mysqli_real_escape_string($link, $_POST['pa_on_bp']);
	$on_pr = mysqli_real_escape_string($link, $_POST['pa_on_pr']);
	$on_rr = mysqli_real_escape_string($link, $_POST['pa_on_rr']);
	$on_temp = mysqli_real_escape_string($link, $_POST['pa_on_temp']);
	$on_spo2 = mysqli_real_escape_string($link, $_POST['pa_on_spo2']);
	$in_bp = mysqli_real_escape_string($link, $_POST['pa_in_bp']);
	$in_pr = mysqli_real_escape_string($link, $_POST['pa_in_pr']);
	$in_rr = mysqli_real_escape_string($link, $_POST['pa_in_rr']);
	$in_temp = mysqli_real_escape_string($link, $_POST['pa_in_temp']);
	$in_spo2 = mysqli_real_escape_string($link, $_POST['pa_in_spo2']);

	//Glasgow Coma Scale
	$gcs_eyes = $_POST['gcs_eyes'];
	$gcs_verbal = $_POST['gcs_verbal'];
	$gcs_infant = $_POST['gcs_infant'];
	$gcs_motor = $_POST['gcs_motor'];

	//OB History
	$lmp = mysqli_real_escape_string($link, $_POST['ob_lmp']);
	$edc = mysqli_real_escape_string($link, $_POST['ob_edc']);
	$g = mysqli_real_escape_string($link, $_POST['ob_g']);
	$p = mysqli_real_escape_string($link, $_POST['ob_p']);
	$aog_wks = mysqli_real_escape_string($link, $_POST['ob_aog_wks']);
	$aog_days = mysqli_real_escape_string($link, $_POST['ob_aog_days']);
	$ob_t = mysqli_real_escape_string($link, $_POST['ob_t']);
	$ob_p2 = mysqli_real_escape_string($link, $_POST['ob_p2']);
	$ob_a = mysqli_real_escape_string($link, $_POST['ob_a']);
	$ob_l = mysqli_real_escape_string($link, $_POST['ob_l']);

	//Newborn
	$nb_gender = $_POST['nb_gender'];
	$nb_time = $_POST['nb_time'];
	$nb_time_formatted = date("g:i A", strtotime($nb_time));
	$nb_placenta = mysqli_real_escape_string($link, $_POST['nb_placenta']);

	//Apgar Score
	$as_1min = mysqli_real_escape_string($link, $_POST['as_1min']);
	$as_5min = mysqli_real_escape_string($link, $_POST['as_5min']);
	$as_10min = mysqli_real_escape_string($link, $_POST['as_10min']);
	$as_rec_fac = mysqli_real_escape_string($link, $_POST['as_rec_fac']);
	$as_receiving = mysqli_real_escape_string($link, $_POST['as_receiving']);
	$as_team_lead = mysqli_real_escape_string($link, $_POST['as_team_lead']);
	$as_driver = mysqli_real_escape_string($link, $_POST['as_driver']);
	$as_rescuers = mysqli_real_escape_string($link, $_POST['as_rescuers']);
	$as_acc_by = mysqli_real_escape_string($link, $_POST['as_acc_by']);
	$as_enc_by = mysqli_real_escape_string($link, $_POST['as_enc_by']);

	//Refusal Of Treatment
	$witness = mysqli_real_escape_string($link, $_POST['witness']);

	//Acceptance Of Service
	$patient_rela = mysqli_real_escape_string($link, $_POST['patient_rela']);

	//Emergency Care and Transportation
	$hospital_name = mysqli_real_escape_string($link, $_POST['hospital']);
	$doctor_name = mysqli_real_escape_string($link, $_POST['doctor_name']);
	$doctor_address = mysqli_real_escape_string($link, $_POST['doctor_address']);
	$requestor_name = mysqli_real_escape_string($link, $_POST['ect_name']);
	 
	
	$sql = $conn->prepare("UPDATE tbl_rescue SET ph_date_incident = '$date_incident', ph_time_incident = '$time_incident_formatted', ph_name = '$name', ph_address = '$address', ph_contact = '$contact', ph_gender = '$gender', ph_age = '$age', ph_case = '$case', ph_case_type = '$case_type', ph_time_report = '$time_report_formatted', ph_time_arrival = '$time_arrival_formatted', 
							ph_location_incident = '$location_incident', ph_reported_by = '$reported_by', pa_vacs_date = '$vacs_date', pa_complaint = '$complaint', pa_allergy = '$allergy', pa_medication = '$medication', pa_past_hx = '$past_hx', pa_last_meal = '$last_meal', pa_events_prior = '$events_prior', 
							pa_onset = '$onset', pa_palliation = '$palliation', pa_quality = '$quality', pa_radiation = '$radiation', pa_severity = '$severity', pa_time = '$time_formatted', pa_other = '$other', pa_is_thor_assess = '$thor_assess', pa_is_rapid_assess = '$rapid_assess', pa_is_o2_adm = '$o2_adm', o2_value = '$o2_val', o2_via = '$o2_via', 
							pa_is_dressed_wound = '$dressed_wound', pa_is_cpr = '$cpr', pa_is_iv_line = '$iv_line', pa_is_gave_med = '$meds', med_given = '$med_given', pa_is_blood_sugar = '$blood_sugar', bloods_mg_dl = '$bs_ml', pa_is_splinting = '$splinting', pa_is_complete_spine = '$complete_spine', 
							pa_option1 = '$option1', pa_option2 = '$option2', pa_on_bp = '$on_bp', pa_on_pr = '$on_pr', pa_on_rr = '$on_rr', pa_on_temp = '$on_temp', pa_on_spo2 = '$on_spo2', 
							pa_in_bp = '$in_bp', pa_in_pr = '$in_pr', pa_in_rr = '$in_rr', pa_in_temp = '$in_temp', pa_in_spo2 = '$in_spo2', gcs_eyes = '$gcs_eyes', gcs_verbal = '$gcs_verbal', gcs_infant = '$gcs_infant', gcs_motor = '$gcs_motor', ob_lmp = '$lmp', ob_g = '$g', ob_p1 = '$p', ob_aog_wks = '$aog_wks', ob_aog_day = '$aog_days', 
							ob_edc = '$edc', ob_t = '$ob_t', ob_p2 = '$ob_p2', ob_a = '$ob_a', ob_l = '$ob_l', nb_gender = '$nb_gender', nb_time = '$nb_time_formatted', nb_placenta = '$nb_placenta', as_1min = '$as_1min', as_5min = '$as_5min', as_10min = '$as_10min', receiving_facility = '$as_rec_fac', receiver = '$as_receiving', team_leader = '$as_team_lead', 
							driver = '$as_driver', rescuers = '$as_rescuers', accomplished_by = '$as_acc_by', encoded_by = '$as_enc_by', rot_witness = '$witness', aos_name = '$patient_rela', ect_hospital_name = '$hospital_name', ect_doctor_name = '$doctor_name', ect_doctor_address = '$doctor_address', ect_requestor_name = '$requestor_name' WHERE res_id = '$id'");
	$sql->execute();
		
	/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Rescue Unit Record Modified', '$name', 'Rescue Unit Record', '$res_id', '$userId', '$today_date1')");
	$log->execute();
			
	header("Location: index.php?view=modify&id=$id&error=Modified successfully");
}

/*
    Remove Data
*/
function delete_data()
{
	include '../global-library/database.php';

	$userId = $_SESSION['user_id'];
	
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }
	
    // delete the category. set is_deleted to 1 as deleted;
	$sql = $conn->prepare("UPDATE tbl_rescue SET is_deleted = '1' WHERE res_id = '$id'");
	$sql->execute();
	
	/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Rescue Unit Record deleted', '$name', 'Rescue Unit Record', '$id', '$userId', '$today_date1')");
	$log->execute();
       
	header("Location: index.php?error=Deleted successfully");
}

?>