<?php
require_once '../../global-library/config.php';
require_once '../../include/functions.php';

checkUser();


	$ren_field = $_POST['ren_field'];
    $toi_field = $_POST['toi_field'];
	$date_report = $_POST['date_report'];
	$time_report = $_POST['time_report'];
	
	
	$date_incident = $_POST['date_incident'];
	$time_incident = $_POST['time_incident'];
	$report_contact_number = $_POST['report_contact_number'];
	$id_presented = $_POST['id_presented'];
	
	
	$last_name = $_POST['last_name'];
	$given_name = $_POST['given_name'];
	$middle_name = $_POST['middle_name'];
	$name_extension = $_POST['name_extension'];
	$nickname = $_POST['nickname'];
	
	
	$citizenship = $_POST['citizenship'];
	$gender = $_POST['gender'];
	$civil_status = $_POST['civil_status'];
	$birth_date = $_POST['birth_date'];
	$age = $_POST['age'];
	$birth_place = $_POST['birth_place'];
	$educational_attainment = $_POST['educational_attainment'];
	$occupation = $_POST['occupation'];
	
	
	$current_address = $_POST['current_address'];
	$barangay = $_POST['barangay'];
	$town_city = $_POST['town_city'];
	$province = $_POST['province'];
	$other_address = $_POST['other_address'];
	$other_barangay = $_POST['other_barangay'];
	$other_town_city = $_POST['other_town_city'];
	$other_province = $_POST['other_province'];
	
	
	$sus_last_name = $_POST['sus_last_name'];
	$sus_given_name = $_POST['sus_given_name'];
	$sus_middle_name = $_POST['sus_middle_name'];
	$sus_name_extension = $_POST['sus_name_extension'];
	$sus_nickname = $_POST['sus_nickname'];
	
	
	$sus_citizenship = $_POST['sus_citizenship'];
	$sus_gender = $_POST['sus_gender'];
	$sus_civil_status = $_POST['sus_civil_status'];
	$sus_birth_date = $_POST['sus_birth_date'];
	$sus_age = $_POST['sus_age'];
	$sus_birth_place = $_POST['sus_birth_place'];
	$sus_educational_attainment = $_POST['sus_educational_attainment'];
	$sus_occupation = $_POST['sus_occupation'];
	
	
	$sus_current_address = $_POST['sus_current_address'];
	$sus_barangay = $_POST['sus_barangay'];
	$sus_town_city = $_POST['sus_town_city'];
	$sus_province = $_POST['sus_province'];
	$sus_other_address = $_POST['sus_other_address'];
	$sus_other_barangay = $_POST['sus_other_barangay'];
	$sus_other_town_city = $_POST['sus_other_town_city'];
	$sus_other_province = $_POST['sus_other_province'];
	$sus_work_address = $_POST['sus_work_address'];
	$sus_barangay2 = $_POST['sus_barangay2'];
	$sus_town_city2 = $_POST['sus_town_city2'];
	$sus_province2 = $_POST['sus_province2'];
	
	
	$prev_criminal_rec = $_POST['prev_criminal_rec'];
	$status_prev_case = $_POST['status_prev_case'];
	$influence_of = $_POST['influence_of'];
	$parent_guardian_name = $_POST['parent_guardian_name'];
	$child_address = $_POST['child_address'];
	$parent_guardian_address1 = $_POST['parent_guardian_address1'];
	$parent_guardian_address2 = $_POST['parent_guardian_address2'];
	$sus_additional_info = $_POST['sus_additional_info'];
	
	
	$victim_data1 = $_POST['victim_data1'];
	$victim_data2 = $_POST['victim_data2'];
	$victim_data3 = $_POST['victim_data3'];
	

		
        $sql = $conn->prepare("INSERT INTO tbl_new_vwac (entry_number, incident_type, date_report, time_report, date_incident, time_incident, report_contact_number, id_presented, last_name, given_name, middle_name, name_extension, nickname,
									citizenship, gender, civil_status, birth_date, age, birth_place, educational_attainment, occupation, current_address, barangay, town_city, province, other_address,
									other_barangay, other_town_city, other_province, sus_last_name, sus_given_name, sus_middle_name, sus_name_extension, sus_nickname, sus_citizenship, sus_gender, sus_civil_status, sus_birth_date, sus_age,
									sus_birth_place, sus_educational_attainment, sus_occupation, sus_current_address, sus_barangay, sus_town_city, sus_province, sus_other_address, sus_other_barangay, sus_other_town_city, sus_other_province, sus_work_address, sus_barangay2,
									sus_town_city2, sus_province2, prev_criminal_rec, status_prev_case, influence_of, parent_guardian_name, child_address, parent_guardian_address1, parent_guardian_address2, sus_additional_info, victim_data1, victim_data2, victim_data3) 
													VALUES ('$ren_field', '$toi_field', '$date_report', '$time_report', '$date_incident', '$time_incident', '$report_contact_number', '$id_presented', '$last_name', '$given_name', '$middle_name', '$name_extension', '$nickname',
									'$citizenship', '$gender', '$civil_status', '$birth_date', '$age', '$birth_place', '$educational_attainment', '$occupation', '$current_address', '$barangay', '$town_city', '$province', '$other_address',				
									'$other_barangay', '$other_town_city', '$other_province', '$sus_last_name', '$sus_given_name', '$sus_middle_name', '$sus_name_extension', '$sus_nickname', '$sus_citizenship', '$sus_gender', '$sus_civil_status', '$sus_birth_date', '$sus_age',				
									'$sus_birth_place', '$sus_educational_attainment', '$sus_occupation', '$sus_current_address', '$sus_barangay', '$sus_town_city', '$sus_province', '$sus_other_address', '$sus_other_barangay', '$sus_other_town_city', '$sus_other_province', '$sus_work_address', '$sus_barangay2',				
									'$sus_town_city2', '$sus_province2', '$prev_criminal_rec', '$status_prev_case', '$influence_of', '$parent_guardian_name', '$child_address', '$parent_guardian_address1', '$parent_guardian_address2', '$sus_additional_info', '$victim_data1', '$victim_data2', '$victim_data3')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_new_vwac SET uid = '$uid' WHERE vwac_id = '$id'");
		$up->execute();
    
		header('Location: index.php?view=lupon_add&error=Added successfully');
?>