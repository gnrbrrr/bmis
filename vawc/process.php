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

	default:
		// if action is not defined or unknown
        // move to main category page
        header('Location: index.php');
}


function add_data(){

	include '../global-library/database.php';

	$ren_field = mysqli_real_escape_string($link, $_POST['ren_field']);
    $toi_field = mysqli_real_escape_string($link, $_POST['toi_field']);
	$date_report = $_POST['date_report'];
	$time_report = $_POST['time_report'];
	$time_report_formatted = date("g:i A", strtotime($time_report));
	
	
	$date_incident = $_POST['date_incident'];
	$time_incident = $_POST['time_incident'];
	$time_incident_formatted = date("g:i A", strtotime($time_incident));
	$report_contact_number = mysqli_real_escape_string($link, $_POST['report_contact_number']);
	$id_presented = mysqli_real_escape_string($link, $_POST['id_presented']);
	
	//reporting person
	$pronoun1 = mysqli_real_escape_string($link, $_POST['pronoun1']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
	$given_name = mysqli_real_escape_string($link, $_POST['given_name']);
	$middle_name = mysqli_real_escape_string($link, $_POST['middle_name']);
	$name_extension = mysqli_real_escape_string($link, $_POST['name_extension']);
	$nickname = mysqli_real_escape_string($link, $_POST['nickname']);
	
	$citizenship = mysqli_real_escape_string($link, $_POST['citizenship']);
	$gender = $_POST['gender'];
	$civil_status = mysqli_real_escape_string($link, $_POST['civil_status']);
	$birth_date = $_POST['birth_date'];
	$age = $_POST['age'];
	$birth_place = mysqli_real_escape_string($link, $_POST['birth_place']);
	$educational_attainment = mysqli_real_escape_string($link, $_POST['educational_attainment']);
	$occupation = $_POST['occupation'];
	$other_occ1 = mysqli_real_escape_string($link, $_POST['occupation_others1']);
	$current_address = mysqli_real_escape_string($link, $_POST['current_address']);
	$barangay = mysqli_real_escape_string($link, $_POST['barangay']);
	$town_city = mysqli_real_escape_string($link, $_POST['town_city']);
	$province = mysqli_real_escape_string($link, $_POST['province']);
	
	//suspect
	$pronoun2 = mysqli_real_escape_string($link, $_POST['pronoun2']);
	$sus_last_name = mysqli_real_escape_string($link, $_POST['sus_last_name']);
	$sus_given_name = mysqli_real_escape_string($link, $_POST['sus_given_name']);
	$sus_middle_name = mysqli_real_escape_string($link, $_POST['sus_middle_name']);
	$sus_name_extension = mysqli_real_escape_string($link, $_POST['sus_name_extension']);
	$sus_nickname = mysqli_real_escape_string($link, $_POST['sus_nickname']);
	
	$sus_citizenship = mysqli_real_escape_string($link, $_POST['sus_citizenship']);
	$sus_gender = $_POST['sus_gender'];
	$sus_civil_status = mysqli_real_escape_string($link, $_POST['sus_civil_status']);
	$sus_birth_date = $_POST['sus_birth_date'];
	$sus_age = $_POST['sus_age'];
	$sus_birth_place = mysqli_real_escape_string($link, $_POST['sus_birth_place']);
	$sus_educational_attainment = mysqli_real_escape_string($link, $_POST['sus_educational_attainment']);
	$sus_occupation = $_POST['sus_occupation'];
	$other_occ2 = mysqli_real_escape_string($link, $_POST['occupation_others2']);
	
	$sus_current_address = mysqli_real_escape_string($link, $_POST['sus_current_address']);
	$sus_barangay = mysqli_real_escape_string($link, $_POST['sus_barangay']);
	$sus_town_city = mysqli_real_escape_string($link, $_POST['sus_town_city']);
	$sus_province = mysqli_real_escape_string($link, $_POST['sus_province']);
	$sus_work_address = mysqli_real_escape_string($link, $_POST['sus_work_address']);
	$sus_barangay2 = mysqli_real_escape_string($link, $_POST['sus_barangay2']);
	$sus_town_city2 = mysqli_real_escape_string($link, $_POST['sus_town_city2']);
	$sus_province2 = mysqli_real_escape_string($link, $_POST['sus_province2']);
	
	$prev_criminal_rec = $_POST['prev_criminal_rec'];
	$status_prev_case = mysqli_real_escape_string($link, $_POST['status_prev_case']);
	$influence_of = mysqli_real_escape_string($link, $_POST['influence_of']);

	//children conflict with law
	$parent_guardian_name = mysqli_real_escape_string($link, $_POST['parent_guardian_name']);
	$child_address = mysqli_real_escape_string($link, $_POST['child_address']);
	$parent_guardian_address1 = mysqli_real_escape_string($link, $_POST['parent_guardian_address1']);
	$parent_guardian_address2 =mysqli_real_escape_string($link,  $_POST['parent_guardian_address2']);
	$sus_additional_info = mysqli_real_escape_string($link, $_POST['sus_additional_info']);


	//victim
	$pronoun3 = mysqli_real_escape_string($link, $_POST['pronoun3']);
	$vic_lastname = mysqli_real_escape_string($link, $_POST['victim_last_name']);
	$vic_givenname = mysqli_real_escape_string($link, $_POST['victim_given_name']);
	$vic_middlename = mysqli_real_escape_string($link, $_POST['victim_middle_name']);
	$vic_name_extension = mysqli_real_escape_string($link, $_POST['victim_name_extension']);
	$vic_nickname = mysqli_real_escape_string($link, $_POST['victim_nickname']);

	$vic_citizenship = mysqli_real_escape_string($link, $_POST['victim_citizenship']);
	$vic_gender = $_POST['victim_gender'];
	$vic_civil_status = mysqli_real_escape_string($link, $_POST['victim_civil_status']);
	$vic_birth_date = $_POST['victim_birth_date'];
	$vic_age = $_POST['victim_age'];
	$vic_birth_place = mysqli_real_escape_string($link, $_POST['victim_birth_place']);
	$vic_educational_attainment = mysqli_real_escape_string($link, $_POST['victim_educational_attainment']);
	$vic_occupation = $_POST['victim_occupation'];
	$other_occ3 = mysqli_real_escape_string($link, $_POST['occupation_others3']);

	$vic_current_address = mysqli_real_escape_string($link, $_POST['victim_current_address']);
	$vic_barangay = mysqli_real_escape_string($link, $_POST['victim_barangay']);
	$vic_town_city = mysqli_real_escape_string($link, $_POST['victim_town_city']);
	$vic_province = mysqli_real_escape_string($link, $_POST['victim_province']);


	$same_info = $_POST['same_info'];

	if($occupation == "Others"){
		$occupation = mysqli_real_escape_string($link, $_POST['occupation_others1']);
	}

	if($sus_occupation == "Others"){
		$sus_occupation = mysqli_real_escape_string($link, $_POST['occupation_others2']);
	}

	if($vic_occupation == "Others"){
		$vic_occupation = mysqli_real_escape_string($link, $_POST['occupation_others3']);
	}

	if($same_info == "Yes"){
		//victim
		$pronoun3 = mysqli_real_escape_string($link, $_POST['pronoun1']);
		$vic_lastname = mysqli_real_escape_string($link, $_POST['last_name']);
		$vic_givenname = mysqli_real_escape_string($link, $_POST['given_name']);
		$vic_middlename = mysqli_real_escape_string($link, $_POST['middle_name']);
		$vic_name_extension = mysqli_real_escape_string($link, $_POST['name_extension']);
		$vic_nickname = mysqli_real_escape_string($link, $_POST['nickname']);

		$vic_citizenship = mysqli_real_escape_string($link, $_POST['citizenship']);
		$vic_gender = $_POST['gender'];
		$vic_civil_status = mysqli_real_escape_string($link, $_POST['civil_status']);
		$vic_birth_date = $_POST['birth_date'];
		$vic_age = $_POST['age'];
		$vic_birth_place = mysqli_real_escape_string($link, $_POST['birth_place']);
		$vic_educational_attainment = mysqli_real_escape_string($link, $_POST['educational_attainment']);
		$vic_occupation = $_POST['occupation'];

		if($occupation == "Others"){
			$vic_occupation = mysqli_real_escape_string($link, $_POST['occupation_others1']);
		}

		$vic_current_address = mysqli_real_escape_string($link, $_POST['current_address']);
		$vic_barangay = mysqli_real_escape_string($link, $_POST['barangay']);
		$vic_town_city = mysqli_real_escape_string($link, $_POST['town_city']);
		$vic_province = mysqli_real_escape_string($link, $_POST['province']);

		$sql = $conn->prepare("INSERT INTO tbl_new_vwac (entry_number, incident_type, date_report, time_report, date_incident, time_incident, report_contact_number, id_presented, pronoun1, last_name, given_name, middle_name, name_extension, nickname,
									citizenship, gender, civil_status, birth_date, age, birth_place, educational_attainment, occupation, current_address, barangay, town_city, province, 
									pronoun2, sus_last_name, sus_given_name, sus_middle_name, sus_name_extension, sus_nickname, sus_citizenship, sus_gender, sus_civil_status, sus_birth_date, sus_age,
									sus_birth_place, sus_educational_attainment, sus_occupation, sus_current_address, sus_barangay, sus_town_city, sus_province, sus_work_address, sus_barangay2,
									sus_town_city2, sus_province2, prev_criminal_rec, status_prev_case, influence_of, parent_guardian_name, child_address, parent_guardian_address1, parent_guardian_address2, sus_additional_info, pronoun3, vic_last_name, vic_given_name, vic_middle_name, vic_name_extension, 
									vic_nickname, vic_citizenship, vic_gender, vic_civil_status, vic_birth_date, vic_age, vic_birth_place, vic_educational_attainment, vic_occupation, vic_current_address, vic_barangay, vic_town_city, vic_province, is_deleted) 
													VALUES ('$ren_field', '$toi_field', '$date_report', '$time_report_formatted', '$date_incident', '$time_incident_formatted', '$report_contact_number', '$id_presented', '$pronoun1', '$last_name', '$given_name', '$middle_name', '$name_extension', '$nickname',
									'$citizenship', '$gender', '$civil_status', '$birth_date', '$age', '$birth_place', '$educational_attainment', '$occupation', '$current_address', '$barangay', '$town_city', '$province', '$pronoun2', '$sus_last_name', '$sus_given_name', '$sus_middle_name', '$sus_name_extension', '$sus_nickname', '$sus_citizenship', '$sus_gender', '$sus_civil_status', '$sus_birth_date', '$sus_age',				
									'$sus_birth_place', '$sus_educational_attainment', '$sus_occupation', '$sus_current_address', '$sus_barangay', '$sus_town_city', '$sus_province', '$sus_work_address', '$sus_barangay2',				
									'$sus_town_city2', '$sus_province2', '$prev_criminal_rec', '$status_prev_case', '$influence_of', '$parent_guardian_name', '$child_address', '$parent_guardian_address1', '$parent_guardian_address2', '$sus_additional_info', '$pronoun3', '$vic_lastname', '$vic_givenname', '$vic_middlename', '$vic_name_extension', 
									'$vic_nickname', '$vic_citizenship', '$vic_gender', '$vic_civil_status', '$vic_birth_date', '$vic_age', '$vic_birth_place', '$vic_educational_attainment', '$vic_occupation', '$vic_current_address', '$vic_barangay', '$vic_town_city', '$vic_province', '0')");
		$sql->execute();

		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_new_vwac SET uid = '$uid' WHERE vwac_id = '$id'");
		$up->execute();

		header('Location: index.php?view=list&error=Added Successfully');
	}else{
		$sql = $conn->prepare("INSERT INTO tbl_new_vwac (entry_number, incident_type, date_report, time_report, date_incident, time_incident, report_contact_number, id_presented, pronoun1, last_name, given_name, middle_name, name_extension, nickname,
									citizenship, gender, civil_status, birth_date, age, birth_place, educational_attainment, occupation, current_address, barangay, town_city, province, 
									pronoun2, sus_last_name, sus_given_name, sus_middle_name, sus_name_extension, sus_nickname, sus_citizenship, sus_gender, sus_civil_status, sus_birth_date, sus_age,
									sus_birth_place, sus_educational_attainment, sus_occupation, sus_current_address, sus_barangay, sus_town_city, sus_province, sus_work_address, sus_barangay2,
									sus_town_city2, sus_province2, prev_criminal_rec, status_prev_case, influence_of, parent_guardian_name, child_address, parent_guardian_address1, parent_guardian_address2, sus_additional_info, pronoun3, vic_last_name, vic_given_name, vic_middle_name, vic_name_extension, 
									vic_nickname, vic_citizenship, vic_gender, vic_civil_status, vic_birth_date, vic_age, vic_birth_place, vic_educational_attainment, vic_occupation, vic_current_address, vic_barangay, vic_town_city, vic_province, is_deleted) 
													VALUES ('$ren_field', '$toi_field', '$date_report', '$time_report_formatted', '$date_incident', '$time_incident_formatted', '$report_contact_number', '$id_presented', '$pronoun1', '$last_name', '$given_name', '$middle_name', '$name_extension', '$nickname',
									'$citizenship', '$gender', '$civil_status', '$birth_date', '$age', '$birth_place', '$educational_attainment', '$occupation', '$current_address', '$barangay', '$town_city', '$province', '$pronoun2', '$sus_last_name', '$sus_given_name', '$sus_middle_name', '$sus_name_extension', '$sus_nickname', '$sus_citizenship', '$sus_gender', '$sus_civil_status', '$sus_birth_date', '$sus_age',				
									'$sus_birth_place', '$sus_educational_attainment', '$sus_occupation', '$sus_current_address', '$sus_barangay', '$sus_town_city', '$sus_province', '$sus_work_address', '$sus_barangay2',				
									'$sus_town_city2', '$sus_province2', '$prev_criminal_rec', '$status_prev_case', '$influence_of', '$parent_guardian_name', '$child_address', '$parent_guardian_address1', '$parent_guardian_address2', '$sus_additional_info', '$pronoun3', '$vic_lastname', '$vic_givenname', '$vic_middlename', '$vic_name_extension', 
									'$vic_nickname', '$vic_citizenship', '$vic_gender', '$vic_civil_status', '$vic_birth_date', '$vic_age', '$vic_birth_place', '$vic_educational_attainment', '$vic_occupation', '$vic_current_address', '$vic_barangay', '$vic_town_city', '$vic_province', '0')");
		$sql->execute();

		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_new_vwac SET uid = '$uid' WHERE vwac_id = '$id'");
		$up->execute();

		header('Location: index.php?view=list&error=Added Successfully');
	}
}

function modify_data(){

	include '../global-library/database.php';

	$id = $_POST['id'];

	$ren_field = mysqli_real_escape_string($link, $_POST['ren_field']);
    $toi_field = mysqli_real_escape_string($link, $_POST['toi_field']);
	$date_report = $_POST['date_report'];
	$time_report = $_POST['time_report'];
	$time_report_formatted = date("g:i A", strtotime($time_report));
	
	
	$date_incident = $_POST['date_incident'];
	$time_incident = $_POST['time_incident'];
	$time_incident_formatted = date("g:i A", strtotime($time_incident));
	$report_contact_number = mysqli_real_escape_string($link, $_POST['report_contact_number']);
	$id_presented = mysqli_real_escape_string($link, $_POST['id_presented']);
	
	
	//reporting person
	$pronoun1 = mysqli_real_escape_string($link, $_POST['pronoun1']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
	$given_name = mysqli_real_escape_string($link, $_POST['given_name']);
	$middle_name = mysqli_real_escape_string($link, $_POST['middle_name']);
	$name_extension = mysqli_real_escape_string($link, $_POST['name_extension']);
	$nickname = mysqli_real_escape_string($link, $_POST['nickname']);
	
	$citizenship = mysqli_real_escape_string($link, $_POST['citizenship']);
	$gender = $_POST['gender'];
	$civil_status = mysqli_real_escape_string($link, $_POST['civil_status']);
	$birth_date = $_POST['birth_date'];
	$age = $_POST['age'];
	$birth_place = mysqli_real_escape_string($link, $_POST['birth_place']);
	$educational_attainment = $_POST['educational_attainment'];
	$occupation = $_POST['occupation'];
	$other_occ1 = mysqli_real_escape_string($link, $_POST['occupation_others1']);
	$current_address = mysqli_real_escape_string($link, $_POST['current_address']);
	$barangay = mysqli_real_escape_string($link, $_POST['barangay']);
	$town_city = mysqli_real_escape_string($link, $_POST['town_city']);
	$province = mysqli_real_escape_string($link, $_POST['province']);
	
	//suspect
	$pronoun2 = mysqli_real_escape_string($link, $_POST['pronoun2']);
	$sus_last_name = mysqli_real_escape_string($link, $_POST['sus_last_name']);
	$sus_given_name = mysqli_real_escape_string($link, $_POST['sus_given_name']);
	$sus_middle_name = mysqli_real_escape_string($link, $_POST['sus_middle_name']);
	$sus_name_extension = mysqli_real_escape_string($link, $_POST['sus_name_extension']);
	$sus_nickname = mysqli_real_escape_string($link, $_POST['sus_nickname']);
	
	$sus_citizenship = mysqli_real_escape_string($link, $_POST['sus_citizenship']);
	$sus_gender = $_POST['sus_gender'];
	$sus_civil_status = mysqli_real_escape_string($link, $_POST['sus_civil_status']);
	$sus_birth_date = $_POST['sus_birth_date'];
	$sus_age = $_POST['sus_age'];
	$sus_birth_place = mysqli_real_escape_string($link, $_POST['sus_birth_place']);
	$sus_educational_attainment = $_POST['sus_educational_attainment'];
	$sus_occupation = $_POST['sus_occupation'];
	$other_occ2 = mysqli_real_escape_string($link, $_POST['occupation_others2']);
	
	$sus_current_address = mysqli_real_escape_string($link, $_POST['sus_current_address']);
	$sus_barangay = mysqli_real_escape_string($link, $_POST['sus_barangay']);
	$sus_town_city = mysqli_real_escape_string($link, $_POST['sus_town_city']);
	$sus_province = mysqli_real_escape_string($link, $_POST['sus_province']);
	$sus_work_address = mysqli_real_escape_string($link, $_POST['sus_work_address']);
	$sus_barangay2 = mysqli_real_escape_string($link, $_POST['sus_barangay2']);
	$sus_town_city2 = mysqli_real_escape_string($link, $_POST['sus_town_city2']);
	$sus_province2 = mysqli_real_escape_string($link, $_POST['sus_province2']);
	
	$prev_criminal_rec = $_POST['prev_criminal_rec'];
	$status_prev_case = mysqli_real_escape_string($link, $_POST['status_prev_case']);
	$influence_of = mysqli_real_escape_string($link, $_POST['influence_of']);

	//children conflict with law
	$parent_guardian_name = mysqli_real_escape_string($link, $_POST['parent_guardian_name']);
	$child_address = mysqli_real_escape_string($link, $_POST['child_address']);
	$parent_guardian_address1 = mysqli_real_escape_string($link, $_POST['parent_guardian_address1']);
	$parent_guardian_address2 =mysqli_real_escape_string($link,  $_POST['parent_guardian_address2']);
	$sus_additional_info = mysqli_real_escape_string($link, $_POST['sus_additional_info']);


	//victim
	$pronoun3 = mysqli_real_escape_string($link, $_POST['pronoun3']);
	$vic_lastname = mysqli_real_escape_string($link, $_POST['victim_last_name']);
	$vic_givenname = mysqli_real_escape_string($link, $_POST['victim_given_name']);
	$vic_middlename = mysqli_real_escape_string($link, $_POST['victim_middle_name']);
	$vic_name_extension = mysqli_real_escape_string($link, $_POST['victim_name_extension']);
	$vic_nickname = mysqli_real_escape_string($link, $_POST['victim_nickname']);

	$vic_citizenship = mysqli_real_escape_string($link, $_POST['victim_citizenship']);
	$vic_gender = $_POST['victim_gender'];
	$vic_civil_status = mysqli_real_escape_string($link, $_POST['victim_civil_status']);
	$vic_birth_date = $_POST['victim_birth_date'];
	$vic_age = $_POST['victim_age'];
	$vic_birth_place = mysqli_real_escape_string($link, $_POST['victim_birth_place']);
	$vic_educational_attainment = mysqli_real_escape_string($link, $_POST['victim_educational_attainment']);
	$vic_occupation = $_POST['victim_occupation'];
	$other_occ3 = mysqli_real_escape_string($link, $_POST['occupation_others3']);

	$vic_current_address = mysqli_real_escape_string($link, $_POST['victim_current_address']);
	$vic_barangay = mysqli_real_escape_string($link, $_POST['victim_barangay']);
	$vic_town_city = mysqli_real_escape_string($link, $_POST['victim_town_city']);
	$vic_province = mysqli_real_escape_string($link, $_POST['victim_province']);


	$same_info = $_POST['same_info'];

	if($occupation == "Others"){
		$occupation = mysqli_real_escape_string($link, $_POST['occupation_others1']);
	}

	if($sus_occupation == "Others"){
		$sus_occupation = mysqli_real_escape_string($link, $_POST['occupation_others2']);
	}

	if($vic_occupation == "Others"){
		$vic_occupation = mysqli_real_escape_string($link, $_POST['occupation_others3']);
	}

	if($same_info == "Yes"){
		//victim
		$pronoun3 = mysqli_real_escape_string($link, $_POST['pronoun1']);
		$vic_lastname = mysqli_real_escape_string($link, $_POST['last_name']);
		$vic_givenname = mysqli_real_escape_string($link, $_POST['given_name']);
		$vic_middlename = mysqli_real_escape_string($link, $_POST['middle_name']);
		$vic_name_extension = mysqli_real_escape_string($link, $_POST['name_extension']);
		$vic_nickname = mysqli_real_escape_string($link, $_POST['nickname']);

		$vic_citizenship = mysqli_real_escape_string($link, $_POST['citizenship']);
		$vic_gender = $_POST['gender'];
		$vic_civil_status = mysqli_real_escape_string($link, $_POST['civil_status']);
		$vic_birth_date = $_POST['birth_date'];
		$vic_age = $_POST['age'];
		$vic_birth_place = mysqli_real_escape_string($link, $_POST['birth_place']);
		$vic_educational_attainment = mysqli_real_escape_string($link, $_POST['educational_attainment']);
		$vic_occupation = $_POST['occupation'];

		$vic_current_address = mysqli_real_escape_string($link, $_POST['current_address']);
		$vic_barangay = mysqli_real_escape_string($link, $_POST['barangay']);
		$vic_town_city = mysqli_real_escape_string($link, $_POST['town_city']);
		$vic_province = mysqli_real_escape_string($link, $_POST['province']);

		if($occupation == "Others"){
			$vic_occupation = mysqli_real_escape_string($link, $_POST['occupation_others1']);
		}

		$sql = $conn->prepare("UPDATE tbl_new_vwac SET entry_number = '$ren_field', incident_type = '$toi_field', date_report = '$date_report', time_report = '$time_report_formatted', date_incident = '$date_incident', time_incident = '$time_incident_formatted', report_contact_number = '$report_contact_number', id_presented = '$id_presented', pronoun1 = '$pronoun1', last_name = '$last_name', given_name = '$given_name', middle_name = '$middle_name', name_extension = '$name_extension', nickname = '$nickname', 
									citizenship = '$citizenship', gender = '$gender', civil_status = '$civil_status', birth_date = '$birth_date', age = '$age', birth_place = '$birth_place', educational_attainment = '$educational_attainment', occupation = '$occupation', current_address = '$current_address', barangay = '$barangay', town_city = '$town_city', province = '$province', pronoun2 = '$pronoun2', sus_last_name = '$sus_last_name', sus_given_name = '$sus_given_name', sus_middle_name = '$sus_middle_name', sus_name_extension = '$sus_name_extension', sus_nickname = '$sus_nickname', sus_citizenship = '$sus_citizenship', sus_gender = '$sus_gender', sus_civil_status = '$sus_civil_status', sus_birth_date = '$sus_birth_date', sus_age = '$sus_age', 
									sus_birth_place = '$sus_birth_place', sus_educational_attainment = '$sus_educational_attainment', sus_occupation = '$sus_occupation', sus_current_address = '$sus_current_address', sus_barangay = '$sus_barangay', sus_town_city = '$sus_town_city', sus_province = '$sus_province', sus_work_address = '$sus_work_address', sus_barangay2 = '$sus_barangay2', 
									sus_town_city2 = '$sus_town_city2', sus_province2 = '$sus_province2', prev_criminal_rec = '$prev_criminal_rec', status_prev_case = '$status_prev_case', influence_of = '$influence_of', parent_guardian_name = '$parent_guardian_name', child_address = '$child_address', parent_guardian_address1 = '$parent_guardian_address1', parent_guardian_address2 = '$parent_guardian_address2', sus_additional_info = '$sus_additional_info', pronoun3 = '$pronoun3', vic_last_name = '$vic_lastname', vic_given_name = '$vic_givenname', vic_middle_name = '$vic_middlename', vic_name_extension = '$vic_name_extension', vic_nickname = '$vic_nickname', vic_citizenship = '$vic_citizenship', vic_gender = '$vic_gender', vic_civil_status = '$vic_civil_status', 
									vic_birth_date = '$vic_birth_date', vic_age = '$vic_age', vic_birth_place = '$vic_birth_place', vic_educational_attainment = '$vic_educational_attainment', vic_occupation = '$vic_occupation', vic_current_address = '$vic_current_address', vic_barangay = '$vic_barangay', vic_town_city = '$vic_town_city', vic_province = '$vic_province' WHERE vwac_id = '$id'");
		$sql->execute();

		header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
	}else{
		$sql = $conn->prepare("UPDATE tbl_new_vwac SET entry_number = '$ren_field', incident_type = '$toi_field', date_report = '$date_report', time_report = '$time_report_formatted', date_incident = '$date_incident', time_incident = '$time_incident_formatted', report_contact_number = '$report_contact_number', id_presented = '$id_presented', pronoun1 = '$pronoun1', last_name = '$last_name', given_name = '$given_name', middle_name = '$middle_name', name_extension = '$name_extension', nickname = '$nickname', 
									citizenship = '$citizenship', gender = '$gender', civil_status = '$civil_status', birth_date = '$birth_date', age = '$age', birth_place = '$birth_place', educational_attainment = '$educational_attainment', occupation = '$occupation', current_address = '$current_address', barangay = '$barangay', town_city = '$town_city', province = '$province', pronoun2 = '$pronoun2', sus_last_name = '$sus_last_name', sus_given_name = '$sus_given_name', sus_middle_name = '$sus_middle_name', sus_name_extension = '$sus_name_extension', sus_nickname = '$sus_nickname', sus_citizenship = '$sus_citizenship', sus_gender = '$sus_gender', sus_civil_status = '$sus_civil_status', sus_birth_date = '$sus_birth_date', sus_age = '$sus_age', 
									sus_birth_place = '$sus_birth_place', sus_educational_attainment = '$sus_educational_attainment', sus_occupation = '$sus_occupation', sus_current_address = '$sus_current_address', sus_barangay = '$sus_barangay', sus_town_city = '$sus_town_city', sus_province = '$sus_province', sus_work_address = '$sus_work_address', sus_barangay2 = '$sus_barangay2', 
									sus_town_city2 = '$sus_town_city2', sus_province2 = '$sus_province2', prev_criminal_rec = '$prev_criminal_rec', status_prev_case = '$status_prev_case', influence_of = '$influence_of', parent_guardian_name = '$parent_guardian_name', child_address = '$child_address', parent_guardian_address1 = '$parent_guardian_address1', parent_guardian_address2 = '$parent_guardian_address2', sus_additional_info = '$sus_additional_info', pronoun3 = '$pronoun3', vic_last_name = '$vic_lastname', vic_given_name = '$vic_givenname', vic_middle_name = '$vic_middlename', vic_name_extension = '$vic_name_extension', vic_nickname = '$vic_nickname', vic_citizenship = '$vic_citizenship', vic_gender = '$vic_gender', vic_civil_status = '$vic_civil_status', 
									vic_birth_date = '$vic_birth_date', vic_age = '$vic_age', vic_birth_place = '$vic_birth_place', vic_educational_attainment = '$vic_educational_attainment', vic_occupation = '$vic_occupation', vic_current_address = '$vic_current_address', vic_barangay = '$vic_barangay', vic_town_city = '$vic_town_city', vic_province = '$vic_province' WHERE vwac_id = '$id'");
		$sql->execute();

		header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
	}
}

function delete_data(){
	include '../global-library/database.php';

	$id = $_GET['id'];

	$sql = $conn->prepare("UPDATE tbl_new_vwac SET is_deleted = '1' WHERE vwac_id = '$id'");
	$sql->execute();

	header('Location: index.php?view=list&error=Deleted Successfully');
}

	
?>