<?php
require_once '../../global-library/config.php';
require_once '../../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!--CSS-->
	<title>VAWC</title>
	<link rel="stylesheet" href="vawc_style.css">
	<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['admin_dir'] . '/include/global-css.php'); ?>
</head>
<body>
<form method="POST" action="process.php">
	<div class="form-grid-1">
		<div class="cells">
			<label>Report Entry Number</label><br>
			<input id="ren_field" name="ren_field" placeholder="000000"></input>
		</div>
		<div class="cells">
			<label>TYPE OF INCIDENT</label><br>
			<input type="text" id="toi_field" name="toi_field"></input>
		</div>
		<div class="cells">
			<label>REPUBLIC OF THE PHILIPPINES<br>QUEZON CITY<br>BARANGAY Novaliches Proper, DISTRICT 5<br>INCIDENT REPORT FORM</label>
		</div>
		<div class="cells">
			<label>DATE AND TIME OF REPORT</label><br>
			<input type="date" id="date_report" name="date_report"></input>
			<input type="time" id="time_report" name="time_report"></input>
		</div>
	</div>
	
	
	<!--Reporter Form-->
	<div class="form-grid-2">
		<div class="cells">
			<label>A. IMPORMASYON NG NAGREREKLAMO</label><br>
			<label>(REPORTING PERSON DATA)</label>
		</div>
		<div class="cells">
			<label>DATE AND TIME OF INCIDENT</label><br>
			<input type="date" id="date_report" name="date_incident"></input>
			<input type="time" id="time_report" name="time_incident"></input>
		</div>
		<div class="cells">
			<label>CONTACT NUMBER</label><br>
			<input type="text" id="reporting_contact_number" name="report_contact_number" placeholder="09##-###-####"></input>
		</div>
		<div class="cells">
			<label>ID PRESENTED</label><br>
			<input type="text" id="id_presented" name="id_presented"></input>
		</div>
	</div>
	
	<div class="form-grid-3">
		<div class="cells">
			<label>LAST NAME (APELYIDO)</label><br>
			<input type="text" id="last_name" name="last_name"></input>
		</div>
		<div class="cells">
			<label>GIVEN NAME (PANGALAN)</label><br>
			<input type="text" id="given_name" name="given_name"></input>
		</div>
		<div class="cells">
			<label>MIDDLE NAME (GITNANG PANGALAN)</label><br>
			<input type="text" id="middle_name" name="middle_name"></input>
		</div>
		<div class="cells">
			<label>EXTENSION (jr, Sr, II, IV, ETC.)</label><br>
			<input type="text" id="name_extension" name="name_extension"></input>
		</div>
		<div class="cells">
			<label>NICKNAME (PALAYAW)</label><br>
			<input type="text" id="nickname" name="nickname"></input>
		</div>
	</div>
	
	<div class="form-grid-4">
		<div class="cells">
			<label>CITIZENSHIP</label><br>
			<input type="text" id="citizenship" name="citizenship"></input>
		</div>
		<div class="cells">
			<label>GENDER</label><br>
			<select id="gender" name="gender">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		</div>
		<div class="cells">
			<label>CIVIL STATUS</label><br>
			<select id="civil_status" name="civil_status">
				<option value="Single">Single</option>
				<option value="In-Relationship">In-Relationship</option>
				<option value="Married">Married</option>
				<option value="Widow">Widow</option>
			</select>
		</div>
		<div class="cells">
			<label>DATE OF BIRTH</label><br>
			<input type="date" id="birth_date" name="birth_date"></input>
		</div>
		<div class="cells">
			<label>AGE</label><br>
			<input type="number" id="age" name="age"></input>
		</div>
		<div class="cells">
			<label>PLACE OF BIRTH</label><br>
			<input type="text" id="birth_place" name="birth_place"></input>
		</div>
		<div class="cells">
			<label>EDUCATIONAL ATTAINMENT</label><br>
			<select id="educational_attainment" name="educational_attainment">
				<option value="High School">High School (Grade 7 - 10)</option>
				<option value="Senior High">Senior High (Grade 11 - 12)</option>
				<option value="Tesda Certificate">Tesda Certificate</option>
				<option value="College Undergraduate">College Undergraduate</option>
				<option value="College Degree">College Degree</option>
			</select>
		</div>
		<div class="cells">
			<label>OCCUPATION</label><br>
			<select id="occupation" name="occupation">
				<option value="Unemployed">Unemployed</option>
				<option value="Employed">Employed</option>
				<option value="Self Employed">Self Employed</option>
			</select>
		</div>
	</div>
	
	<div class="form-grid-5">
		<div class="cells">
			<label>CURRENT ADDRESS (HOUSE NUMBER, STREET, VILLAGE/SITIO)</label><br>
			<textarea id="current_address" name="current_address" rows="2" cols="50"></textarea>
		</div>
		<div class="cells">
			<label>BARANGAY</label><br>
			<input type="text" id="barangay" name="barangay"></input>
		</div>
		<div class="cells">
			<label>TOWN / CITY</label><br>
			<input type="text" id="town_city" name="town_city"></input>
		</div>
		<div class="cells">
			<label>PROVINCE</label><br>
			<input type="text" id="province" name="province"></input>
		</div>
		<div class="cells">
			<label>OTHER ADDRESS (HOUSE NUMBER, STREET, VILLAGE/SITIO)</label><br>
			<textarea id="other_address" name="other_address" rows="2" cols="50"></textarea>
		</div>
		<div class="cells">
			<label>BARANGAY</label><br>
			<input type="text" id="other_barangay" name="other_barangay"></input>
		</div>
		<div class="cells">
			<label>TOWN / CITY</label><br>
			<input type="text" id="other_town_city" name="other_town_city"></input>
		</div>
		<div class="cells">
			<label>PROVINCE</label><br>
			<input type="text" id="other_province" name="other_province"></input>
		</div>
	</div>
	
	<div class="cells">
		<label>B. IMPORMASYON NG SUSPEK (SUSPECT DATA)</label><br>
	</div>
	
	
	<!--Suspect Form-->
	<div class="sus-form-grid-1">
		<div class="cells">
			<label>LAST NAME (APELYIDO)</label><br>
			<input type="text" id="sus_last_name" name="sus_last_name"></input>
		</div>
		<div class="cells">
			<label>GIVEN NAME (PANGALAN)</label><br>
			<input type="text" id="sus_given_name" name="sus_given_name"></input>
		</div>
		<div class="cells">
			<label>MIDDLE NAME (GITNANG PANGALAN)</label><br>
			<input type="text" id="sus_middle_name" name="sus_middle_name"></input>
		</div>
		<div class="cells">
			<label>EXTENSION (jr, Sr, II, IV, ETC.)</label><br>
			<input type="text" id="sus_name_extension" name="sus_name_extension"></input>
		</div>
		<div class="cells">
			<label>NICKNAME (PALAYAW)</label><br>
			<input type="text" id="sus_nickname" name="sus_nickname"></input>
		</div>
	</div>
	
	<div class="sus-form-grid-2">
		<div class="cells">
			<label>CITIZENSHIP</label><br>
			<input type="text" id="sus_citizenship" name="sus_citizenship"></input>
		</div>
		<div class="cells">
			<label>GENDER</label><br>
			<select id="sus_gender" name="sus_gender">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		</div>
		<div class="cells">
			<label>CIVIL STATUS</label><br>
			<select id="sus_civil_status" name="sus_civil_status">
				<option value="Single">Single</option>
				<option value="In-Relationship">In-Relationship</option>
				<option value="Married">Married</option>
				<option value="Widow">Widow</option>
			</select>
		</div>
		<div class="cells">
			<label>DATE OF BIRTH</label><br>
			<input type="date" id="sus_birth_date" name="sus_birth_date"></input>
		</div>
		<div class="cells">
			<label>AGE</label><br>
			<input type="number" id="sus_age" name="sus_age"></input>
		</div>
		<div class="cells">
			<label>PLACE OF BIRTH</label><br>
			<input type="text" id="sus_birth_place" name="sus_birth_place"></input>
		</div>
		<div class="cells">
			<label>EDUCATIONAL ATTAINMENT</label><br>
			<select id="sus_educational_attainment" name="sus_educational_attainment">
				<option value="High School">High School (Grade 7 - 10)</option>
				<option value="Senior High">Senior High (Grade 11 - 12)</option>
				<option value="Tesda Certificate">Tesda Certificate</option>
				<option value="College Undergraduate">College Undergraduate</option>
				<option value="College Degree">College Degree</option>
			</select>
		</div>
		<div class="cells">
			<label>OCCUPATION</label><br>
			<select id="sus_occupation" name="sus_occupation">
				<option value="Unemployed">Unemployed</option>
				<option value="Employed">Employed</option>
				<option value="Self Employed">Self Employed</option>
			</select>
		</div>
	</div>
	
	<div class="sus-form-grid-3">
		<div class="cells">
			<label>CURRENT ADDRESS (HOUSE NUMBER, STREET, VILLAGE/SITIO)</label><br>
			<textarea id="sus_current_address" name="sus_current_address" rows="2" cols="50"></textarea>
		</div>
		<div class="cells">
			<label>BARANGAY</label><br>
			<input type="text" id="sus_barangay" name="sus_barangay"></input>
		</div>
		<div class="cells">
			<label>TOWN / CITY</label><br>
			<input type="text" id="sus_town_city" name="sus_town_city"></input>
		</div>
		<div class="cells">
			<label>PROVINCE</label><br>
			<input type="text" id="sus_province" name="sus_province"></input>
		</div>
		<div class="cells">
			<label>OTHER ADDRESS (HOUSE NUMBER, STREET, VILLAGE/SITIO)</label><br>
			<textarea id="sus_other_address" name="sus_other_address" rows="2" cols="50"></textarea>
		</div>
		<div class="cells">
			<label>BARANGAY</label><br>
			<input type="text" id="sus_other_barangay" name="sus_other_barangay"></input>
		</div>
		<div class="cells">
			<label>TOWN / CITY</label><br>
			<input type="text" id="sus_other_town_city" name="sus_other_town_city"></input>
		</div>
		<div class="cells">
			<label>PROVINCE</label><br>
			<input type="text" id="sus_other_province" name="sus_other_province"></input>
		</div>
		<div class="cells">
			<label>WORK ADDRESS (HOUSE NUMBER, STREET, VILLAGE/SITIO)</label><br>
			<textarea id="sus_work_address" name="sus_work_address" rows="2" cols="50"></textarea>
		</div>
		<div class="cells">
			<label>BARANGAY</label><br>
			<input type="text" id="sus_barangay2" name="sus_barangay2"></input>
		</div>
		<div class="cells">
			<label>TOWN / CITY</label><br>
			<input type="text" id="sus_town_city2" name="sus_town_city2"></input>
		</div>
		<div class="cells">
			<label>PROVINCE</label><br>
			<input type="text" id="sus_province2" name="sus_province2"></input>
		</div>
	</div>
	
	<div class="sus-form-grid-4">
		<div class="cells">
			<label>WITH PREVIOUS CRIMINAL RECORD?</label><br>
			<select id="prev_criminal_rec" name="prev_criminal_rec">
				<option value="No">No</option>
				<option value="Yes">Yes</option>
			</select>
		</div>
		<div class="cells">
			<label>STATUS OF PREVIOUS CASE</label><br>
			<input type="text" id="status_prev_case" name="status_prev_case"></input>
		</div>
		<div class="cells">
			<label>UNDER THE INFLUENCE OF</label><br>
			<input type="text" id="influence_of" name="influence_of"></input>
		</div>
	</div>
	
	
	
	<!--Child conflict with law form-->
	<div class="child-form-grid-1">
		<div class="cells">
			<label>FOR CHILDREN IN CONFLICT WITH LAW</label>
		</div>
		<div class="cells">
			<label>PANGALAN NG MAGULANG o GUARDIAN</label><br>
			<input type="text" id="parent_guardian_name" name="parent_guardian_name"></input>
		</div>
		<div class="cells">
			<label>ADDRESS</label><br>
			<textarea id="child_address" name="child_address" rows="2" cols="50"></textarea>
		</div>
	</div>
	
	<div class="child-form-grid-2">
		<div class="cells">
			<label>ADDRESS</label><br>
			<textarea id="parent_guardian_address1" name="parent_guardian_address1" rows="2" cols="50"></textarea>
		</div>
		<div class="cells">
			<label>ADDRESS</label><br>
			<textarea id="parent_guardian_address2" name="parent_guardian_address2" rows="2" cols="50"></textarea>
		</div>
	</div>
	
	<div class="suspect-add-grid">
		<div class="cells">
			<label>OTHER DISTINGUISHING FEATURES (DESCRIBE CLOTHES, VEHICLE, SUNGLASSES, WEAPONS, SCARS, AND OTHER DATA OR ACTIVITY OF THE SUSPECT/S WHICH WERE OBSERVED BY THE REPORTING PERSON AND/OR WITNESS/ES TO IDENTIFY THE SUSPECT/S. THESE ARE IMPORTANT AND MAY BECOME EVIDENCE TO IDENTIFY AND LINK TO THE CRIME THE SUSPECT/S.) USE ADDITIONAL SHEET/S IF NECESSARY.)</label><br>
			<textarea id="sus_additional_info" name="sus_additional_info" rows="4" cols="260"></textarea>
		</div>
	</div>
	
	<div class="victim-grid">
		<div class="cells">
			<label>C. IMPORMASYON NG BIKTIMA<br>(VICTIM DATA)</label>
		</div>
		<div class="cells">
			<textarea id="victim_data1" name="victim_data1" rows="2" cols="30"></textarea>
		</div>
		<div class="cells">
			<textarea id="victim_data2" name="victim_data2" rows="2" cols="30"></textarea>
		</div>
		<div class="cells">
			<textarea id="victim_data3" name="victim_data3" rows="2" cols="30"></textarea>
		</div>
	</div>
	<br />
	<center><input type="submit" name="submit" value="Submit" class="btn btn-success btn-large" /></center>
	<br />
</form>
</body>
</html>