<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        add_data();
        break;
		
	case 'pets' :
        add_pets();
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

	// $imageData = $_POST['cap_image'];
	
	// $resident_category = mysqli_real_escape_string($link, $_POST['res_cat']);
    // $acc_no = mysqli_real_escape_string($link, $_POST['resident_accno']);
	
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $mname = mysqli_real_escape_string($link, $_POST['mname']);
	$lname = mysqli_real_escape_string($link, $_POST['lname']);
	$suffix = mysqli_real_escape_string($link, $_POST['suffix']);
	$alias = mysqli_real_escape_string($link, $_POST['alias']);
	$birthdate = mysqli_real_escape_string($link, $_POST['birthdate']);
	$age = mysqli_real_escape_string($link, $_POST['age']);
	$height = mysqli_real_escape_string($link, $_POST['height']);
	$weight = mysqli_real_escape_string($link, $_POST['weight']);
	$blood_type = mysqli_real_escape_string($link, $_POST['blood_type']);
	$birth_place = mysqli_real_escape_string($link, $_POST['birth_place']);
	$gender = mysqli_real_escape_string($link, $_POST['gender']);
	$lgbtq = mysqli_real_escape_string($link, $_POST['lgbtq']);
	$civil_status = mysqli_real_escape_string($link, $_POST['civil_status']);
	$religion = mysqli_real_escape_string($link, $_POST['religion']);
	$citizenship = mysqli_real_escape_string($link, $_POST['citizenship']);
	$contact_number = mysqli_real_escape_string($link, $_POST['contact_number']);
	$landline_number = mysqli_real_escape_string($link, $_POST['landline_number']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	
	//address
	$house_number = mysqli_real_escape_string($link, $_POST['house_number']);
	$unit_name = mysqli_real_escape_string($link, $_POST['unit_name']);
	$street_name = mysqli_real_escape_string($link, $_POST['street_name']);
	$purok = mysqli_real_escape_string($link, $_POST['purok']);
	$area_village = mysqli_real_escape_string($link, $_POST['area_village']);
	$barangay = mysqli_real_escape_string($link, $_POST['barangay']);
	$city_municipality = mysqli_real_escape_string($link, $_POST['city_municipality']);


	$years_residency = mysqli_real_escape_string($link, $_POST['years_residency']);
	$danger_zone = $_POST['danger_zone'];
	$resstat = mysqli_real_escape_string($link, $_POST['resstat']);
	$typeres = mysqli_real_escape_string($link, $_POST['typeres']);
	$tax = mysqli_real_escape_string($link, $_POST['tax_number']);
	// $qci = mysqli_real_escape_string($link, $_POST['qci_number']);
	$philhealth = mysqli_real_escape_string($link, $_POST['philhealth_number']);
	$pagibig = mysqli_real_escape_string($link, $_POST['pagibig_number']);
	$gsis = mysqli_real_escape_string($link, $_POST['gsis_number']);
	$sss = mysqli_real_escape_string($link, $_POST['sss_number']);
	$educational_attainment = mysqli_real_escape_string($link, $_POST['educational_attainment']);
	// $course = mysqli_real_escape_string($link, $_POST['course']);
	// $skills = mysqli_real_escape_string($link, $_POST['skills']);
	$employment_status = mysqli_real_escape_string($link, $_POST['employment_status']);
	$kas = mysqli_real_escape_string($link, $_POST['kas']);
	$occupation = mysqli_real_escape_string($link, $_POST['occupation']);
	$company_name = mysqli_real_escape_string($link, $_POST['company_name']);	
	$company_position = mysqli_real_escape_string($link, $_POST['company_position']);
	$company_address = mysqli_real_escape_string($link, $_POST['company_address']);
	$employer_name = mysqli_real_escape_string($link, $_POST['employer_name']);
	$employer_address = mysqli_real_escape_string($link, $_POST['employer_address']);
	$income_source = mysqli_real_escape_string($link, $_POST['income_source']);
	$income_monthly = mysqli_real_escape_string($link, $_POST['income_monthly']);
	$ishof = mysqli_real_escape_string($link, $_POST['ishof']);
	$household_no = mysqli_real_escape_string($link, $_POST['household_no']);
	$relation_head = mysqli_real_escape_string($link, $_POST['rhof']);
	$hoa = mysqli_real_escape_string($link, $_POST['hoa']);
	$head_family = isset($_POST['head_family']) ? mysqli_real_escape_string($link, $_POST['head_family']) : '';
	$voters_status = mysqli_real_escape_string($link, $_POST['voters_status']);
	$precint_no = mysqli_real_escape_string($link, $_POST['precint_no']);
	$solo_parent = mysqli_real_escape_string($link, $_POST['solo_parent']);
	$erpat = mysqli_real_escape_string($link, $_POST['erpat']);
	$kababaihan = $_POST['kababaihan'];
	$youth = $_POST['youth'];
	$pwd = $_POST['pwd'];
	$ps4 = $_POST['ps4'];
	$cvon = $_POST['cvon_pwud'];
	$ind = $_POST['ind'];
	$set = $_POST['set'];
	$cso = mysqli_real_escape_string($link, $_POST['cso']);
	$ofw = $_POST['ofw'];
	$ngo = mysqli_real_escape_string($link, $_POST['ngo']);
	$transport_group = mysqli_real_escape_string($link, $_POST['transport_group']);
	$sc = $_POST['sc'];	
	$maynilad = $_POST['maynilad'];
	$meralco = $_POST['meralco'];
	$septic_tank = $_POST['septic_tank'];
	$house_structure = mysqli_real_escape_string($link, $_POST['house_structure']);

	//pets
	$pet_own = $_POST['pet_own'];

	$pet1_type = mysqli_real_escape_string($link, $_POST['pet1_type']);	
	$pet1_qty = $_POST['pet1_quanti'];
	$pet1_vac1 = $_POST['pet1_vac1'];
	$pet1_vac1_date = $_POST['pet1_date1'];
	$pet1_vac2 = $_POST['pet1_vac2'];
	$pet1_vac2_date = $_POST['pet1_date2'];
	$pet1_vac3 = $_POST['pet1_vac3'];
	$pet1_vac3_date = $_POST['pet1_date3'];
	$pet1_reg1 = $_POST['pet1_reg1'];
	$pet1_reg1_date = $_POST['pet1_regdate1'];
	$pet1_reg2 = $_POST['pet1_reg2'];
	$pet1_reg2_date = $_POST['pet1_regdate2'];
	$pet1_reg3 = $_POST['pet1_reg3'];
	$pet1_reg3_date = $_POST['pet1_regdate3'];

	$pet2_type = mysqli_real_escape_string($link, $_POST['pet2_type']);
	$pet2_qty = $_POST['pet2_quanti'];
	$pet2_vac1 = $_POST['pet2_vac1'];
	$pet2_vac1_date = $_POST['pet2_date1'];
	$pet2_vac2 = $_POST['pet2_vac2'];
	$pet2_vac2_date = $_POST['pet2_date2'];
	$pet2_vac3 = $_POST['pet2_vac3'];
	$pet2_vac3_date = $_POST['pet2_date3'];
	$pet2_reg1 = $_POST['pet2_reg1'];
	$pet2_reg1_date = $_POST['pet2_regdate1'];
	$pet2_reg2 = $_POST['pet2_reg2'];
	$pet2_reg2_date = $_POST['pet2_regdate2'];
	$pet2_reg3 = $_POST['pet2_reg3'];
	$pet2_reg3_date = $_POST['pet2_regdate3'];

	$pet3_type = mysqli_real_escape_string($link, $_POST['pet3_type']);
	$pet3_qty = $_POST['pet3_quanti'];
	$pet3_vac1 = $_POST['pet3_vac1'];
	$pet3_vac1_date = $_POST['pet3_date1'];
	$pet3_vac2 = $_POST['pet3_vac2'];
	$pet3_vac2_date = $_POST['pet3_date2'];
	$pet3_vac3 = $_POST['pet3_vac3'];
	$pet3_vac3_date = $_POST['pet3_date3'];
	$pet3_reg1 = $_POST['pet3_reg1'];
	$pet3_reg1_date = $_POST['pet3_regdate1'];
	$pet3_reg2 = $_POST['pet3_reg2'];
	$pet3_reg2_date = $_POST['pet3_regdate2'];
	$pet3_reg3 = $_POST['pet3_reg3'];
	$pet3_reg3_date = $_POST['pet3_regdate3'];

	if($resstat == "Resident"){
		$resident_category = mysqli_real_escape_string($link, $_POST['res_cat']);
		$acc_no = mysqli_real_escape_string($link, $_POST['resident_accno']);

		$current_year = date("y");
		$currect_month = date("m");

		$acc_tag = $currect_month . $current_year . "-";
	}else{
		$resident_category = "";
		$acc_no = "";
		$acc_tag = "";
	}
	

	if($religion == "Others"){
		$religion = $_POST['other_rel'];
	}else{
		
	}

	if($educational_attainment == "Elementary" || $educational_attainment == "Highschool"){
		$school = mysqli_real_escape_string($link, $_POST['school']);
		$course = mysqli_real_escape_string($link, $_POST['course']);
		$skills = mysqli_real_escape_string($link, $_POST['skills']);

	}else if ($educational_attainment == "None"){
		$school = "";
		$course = "";
		$skills = "";

	}else{
		$school = "";
		$course = mysqli_real_escape_string($link, $_POST['course']);
		$skills = mysqli_real_escape_string($link, $_POST['skills']);
	}

	
	if($danger_zone == "Yes"){
		$geographical_location = $_POST['geographical_loc'];
	}else{
		$geographical_location = "";
	}

	$status = isset($_POST['status']) ? $_POST['status'] : '';

	$images = uploadimage('fileImage', SRV_ROOT . 'images/resident/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];

	$resident = $fname . ' ' . $mname . ' ' . $lname;
	
	$chk = $conn->prepare("SELECT * FROM tbl_resident WHERE lastname = '$lname' AND middlename = '$mname' AND firstname = '$fname' AND is_deleted != '1'");
	$chk->execute();
	
	
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=Resident already exist! Data entry failed.');              
	}else{
        
		$sql = $conn->prepare("INSERT INTO tbl_resident (resident_category, acc_no_tag, acc_no, firstname, middlename, lastname, suffix, alias, birthdate, age, height, weight, blood_type, birthplace, gender, lgbtq, 
															civilstatus, religion, citizenship, contactno, landlineno, email, house_num, unit_name, street_name, purok, area_village, barangay, city_municipality, yearsofresidency, danger_zone, geographical_location, resident_status, 
																type_of_residency, tax_no, philhealth_no, pagibig_no, gsis_no, sss_no, educationalattainment, school_name, course, skills, employeestatus, is_kasambahay, occupation, 
																	company_name, company_position, company_address, employer_name, employer_address, income_source, income_monthly, is_head_of_family, householdno, is_hoa, 
																		headofthefamily_id, relationship_fam, votersstatus, precintno, is_soloparent, is_erpat, is_kababaihan, is_youth, is_pwd, is_ps4, is_cvon_pwud, is_indigenous, is_informal_settler, cso, is_ofw, ngo, transport_group, 
																			is_sc, maynilad, meralco, septic_tank, house_structure, pet_own, pet1_type, pet1_qty, is_pet1_vac1, pet1_vac1_date, is_pet1_vac2, pet1_vac2_date, is_pet1_vac3, pet1_vac3_date, is_pet1_reg1, pet1_reg1_date, 
																				is_pet1_reg2, pet1_reg2_date, is_pet1_reg3, pet1_reg3_date, pet2_type, pet2_qty, is_pet2_vac1, pet2_vac1_date, is_pet2_vac2, pet2_vac2_date, is_pet2_vac3, pet2_vac3_date, is_pet2_reg1, pet2_reg1_date, is_pet2_reg2, pet2_reg2_date, is_pet2_reg3, pet2_reg3_date, pet3_type, 
																					pet3_qty, is_pet3_vac1, pet3_vac1_date, is_pet3_vac2, pet3_vac2_date, is_pet3_vac3, pet3_vac3_date, is_pet3_reg1, pet3_reg1_date, is_pet3_reg2, pet3_reg2_date, is_pet3_reg3, pet3_reg3_date, status, image, thumbnail, date_added, year_added, user_id, is_deleted) 
													VALUES ('$resident_category', '$acc_tag', '$acc_no', '$fname', '$mname', '$lname', '$suffix', '$alias', '$birthdate', '$age', '$height', '$weight', '$blood_type', '$birth_place', '$gender', '$lgbtq', 
																'$civil_status', '$religion', '$citizenship', '$contact_number', '$landline_number', '$email', '$house_number', '$unit_name', '$street_name', '$purok', '$area_village', '$barangay', '$city_municipality', '$years_residency', '$danger_zone', '$geographical_location', '$resstat', 
																	'$typeres', '$tax', '$philhealth', '$pagibig', '$gsis', '$sss', '$educational_attainment', '$school', '$course', '$skills', '$employment_status', '$kas', '$occupation', 
																		'$company_name', '$company_position', '$company_address', '$employer_name', '$employer_address', '$income_source', '$income_monthly', '$ishof', '$household_no', '$hoa', 
																			'$head_family', '$relation_head', '$voters_status', '$precint_no', '$solo_parent', '$erpat', '$kababaihan', '$youth', '$pwd', '$ps4', '$cvon', '$ind', '$set', '$cso', '$ofw', '$ngo', '$transport_group', 
																				'$sc', '$maynilad', '$meralco', '$septic_tank', '$house_structure', '$pet_own', '$pet1_type', '$pet1_qty', '$pet1_vac1', '$pet1_vac1_date', '$pet1_vac2', 
																					'$pet1_vac2_date', '$pet1_vac3', '$pet1_vac3_date', '$pet1_reg1', '$pet1_reg1_date', '$pet1_reg2', '$pet1_reg2_date', '$pet1_reg3', '$pet1_reg3_date', '$pet2_type', '$pet2_qty', '$pet2_vac1', '$pet2_vac1_date', 
																						'$pet2_vac2', '$pet2_vac2_date', '$pet2_vac3', '$pet2_vac3_date', '$pet2_reg1', '$pet2_reg1_date', '$pet2_reg2', '$pet2_reg2_date', '$pet2_reg3', '$pet2_reg3_date', '$pet3_type', '$pet3_qty', '$pet3_vac1', '$pet3_vac1_date', 
																							'$pet3_vac2', '$pet3_vac2_date', '$pet3_vac3', '$pet3_vac3_date', '$pet3_reg1', '$pet3_reg1_date', '$pet3_reg2', '$pet3_reg2_date', '$pet3_reg3', '$pet3_reg3_date', '$status', '$mainImage', '$thumbnail', '$today_date1', '$today_year', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		// $up = $conn->prepare("UPDATE tbl_resident SET uid = '$uid' WHERE r_id = '$id'");
		// $up->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Resident Record added', '$resident', 'Resident Record', '$uid', '$userId', '$today_date1')");
		$log->execute();
    
		echo "<script>window.location.href='index.php?view=add&error=Added successfully'</script>";
	}
	
}

/*
	Upload an image and return the uploaded image name
*/
function uploadimage($inputName, $uploadDir)
{
	include '../global-library/database.php';
	$image     = $_FILES[$inputName];
	$imagePath = '';
	$thumbnailPath = '';

	// if a file is given
	if (trim($image['tmp_name']) != '') {
		$ext = substr(strrchr($image['name'], "."), 1); //$extensions[$image['type']];

		// generate a random new file name to avoid name conflict
		$imagePath = md5(rand() * time()) . ".$ext";

		list($width, $height, $type, $attr) = getimagesize($image['tmp_name']);

		// make sure the image width does not exceed the
		// maximum allowed width
		if (LIMIT_IMAGE_WIDTH && $width > MAX_IMAGE_WIDTH) {
			$result    = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, 2048);
			$imagePath = $result;
		} else {
			$result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
		}

		if ($result) {
			// create thumbnail
			$thumbnailPath =  md5(rand() * time()) . ".$ext";
			$result = createThumbnail($uploadDir . $imagePath, $uploadDir . $thumbnailPath, THUMBNAIL_WIDTH);

			// create thumbnail failed, delete the image
			if (!$result) {
				unlink($uploadDir . $imagePath);
				$imagePath = $thumbnailPath = '';
			} else {
				$thumbnailPath = $result;
			}
		} else {
			// the image cannot be upload / resized
			$imagePath = $thumbnailPath = '';
		}

	}


	return array('image' => $imagePath, 'thumbnail' => $thumbnailPath);
}

/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';
	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$resident_category = mysqli_real_escape_string($link, $_POST['res_cat']);

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$suffix = $_POST['suffix'];
	$alias = $_POST['alias'];
	$birthdate = $_POST['birthdate'];
	$age = $_POST['age'];
	$birth_place = $_POST['birth_place'];
	$gender = $_POST['gender'];
	$lgbtq = $_POST['lgbtq'];
	$civil_status = $_POST['civil_status'];
	$citizenship = $_POST['citizenship'];
	$religion = $_POST['religion'];
	$contact_number = $_POST['contact_number'];
	$email = $_POST['email'];
	
	//address
	$house_number = mysqli_real_escape_string($link, $_POST['house_number']);
	$unit_name = mysqli_real_escape_string($link, $_POST['unit_name']);
	$street_name = mysqli_real_escape_string($link, $_POST['street_name']);
	$purok = mysqli_real_escape_string($link, $_POST['purok']);
	$area_village = mysqli_real_escape_string($link, $_POST['area_village']);
	$barangay = mysqli_real_escape_string($link, $_POST['barangay']);
	$city_municipality = mysqli_real_escape_string($link, $_POST['city_municipality']);


	$years_residency = $_POST['years_residency'];
	$danger_zone = $_POST['danger_zone'];
	$resstat = $_POST['resstat'];
	$typeres = $_POST['typeres'];
	$educational_attainment = $_POST['educational_attainment'];
	// $course = $_POST['course'];
	// $skills = $_POST['skills'];
	$employment_status = $_POST['employment_status'];
	$kas = $_POST['kas'];
	$occupation = $_POST['occupation'];
	$company_name = $_POST['company_name'];	
	$company_position = $_POST['company_position'];
	$company_address = $_POST['company_address'];
	$income_source = $_POST['income_source'];
	$income_monthly = $_POST['income_monthly'];
	$ishof = $_POST['ishof'];
	$household_no = $_POST['household_no'];
	$hoa = $_POST['hoa'];
	$head_family = $_POST['head_family'];
	$relation_head = $_POST['rhof'];
	$voters_status = $_POST['voters_status'];
	$precint_no = $_POST['precint_no'];
	$solo_parent = $_POST['solo_parent'];
	$erpat = $_POST['erpat'];
	$kababaihan = $_POST['kababaihan'];
	$pwd = $_POST['pwd'];
	$ps4 = $_POST['ps4'];
	$ind = $_POST['ind'];
	$set = $_POST['set'];
	$ofw = $_POST['ofw'];
	$cso = mysqli_real_escape_string($link, $_POST['cso']);
	$ngo = mysqli_real_escape_string($link, $_POST['ngo']);
	$transport_group = mysqli_real_escape_string($link, $_POST['transport_group']);
	$sc = $_POST['sc'];
	$maynilad = $_POST['maynilad'];
	$meralco = $_POST['meralco'];
	$septic_tank = $_POST['septic_tank'];
	$house_structure = mysqli_real_escape_string($link, $_POST['house_structure']);
	$status = $_POST['status'];
	$date_death = $_POST['date_death'];
	$cause_death = mysqli_real_escape_string($link,$_POST['cause_death']);
	$place_death = mysqli_real_escape_string($link,$_POST['place_death']);

	//pets
	$pet_own = $_POST['pet_own'];

	$pet1_type = mysqli_real_escape_string($link, $_POST['pet1_type']);	
	$pet1_qty = $_POST['pet1_quanti'];
	$pet1_vac1 = $_POST['pet1_vac1'];
	$pet1_vac1_date = $_POST['pet1_date1'];
	$pet1_vac2 = $_POST['pet1_vac2'];
	$pet1_vac2_date = $_POST['pet1_date2'];
	$pet1_vac3 = $_POST['pet1_vac3'];
	$pet1_vac3_date = $_POST['pet1_date3'];
	$pet1_reg1 = $_POST['pet1_reg1'];
	$pet1_reg1_date = $_POST['pet1_regdate1'];
	$pet1_reg2 = $_POST['pet1_reg2'];
	$pet1_reg2_date = $_POST['pet1_regdate2'];
	$pet1_reg3 = $_POST['pet1_reg3'];
	$pet1_reg3_date = $_POST['pet1_regdate3'];

	$pet2_type = mysqli_real_escape_string($link, $_POST['pet2_type']);
	$pet2_qty = $_POST['pet2_quanti'];
	$pet2_vac1 = $_POST['pet2_vac1'];
	$pet2_vac1_date = $_POST['pet2_date1'];
	$pet2_vac2 = $_POST['pet2_vac2'];
	$pet2_vac2_date = $_POST['pet2_date2'];
	$pet2_vac3 = $_POST['pet2_vac3'];
	$pet2_vac3_date = $_POST['pet2_date3'];
	$pet2_reg1 = $_POST['pet2_reg1'];
	$pet2_reg1_date = $_POST['pet2_regdate1'];
	$pet2_reg2 = $_POST['pet2_reg2'];
	$pet2_reg2_date = $_POST['pet2_regdate2'];
	$pet2_reg3 = $_POST['pet2_reg3'];
	$pet2_reg3_date = $_POST['pet2_regdate3'];

	$pet3_type = mysqli_real_escape_string($link, $_POST['pet3_type']);
	$pet3_qty = $_POST['pet3_quanti'];
	$pet3_vac1 = $_POST['pet3_vac1'];
	$pet3_vac1_date = $_POST['pet3_date1'];
	$pet3_vac2 = $_POST['pet3_vac2'];
	$pet3_vac2_date = $_POST['pet3_date2'];
	$pet3_vac3 = $_POST['pet3_vac3'];
	$pet3_vac3_date = $_POST['pet3_date3'];
	$pet3_reg1 = $_POST['pet3_reg1'];
	$pet3_reg1_date = $_POST['pet3_regdate1'];
	$pet3_reg2 = $_POST['pet3_reg2'];
	$pet3_reg2_date = $_POST['pet3_regdate2'];
	$pet3_reg3 = $_POST['pet3_reg3'];
	$pet3_reg3_date = $_POST['pet3_regdate3'];

	$resident = $fname . ' ' . $mname . ' ' . $lname;

	if($religion == "Others"){
		$religion = $_POST['other_rel'];
	}else{

	}

	if($educational_attainment == "Elementary" || $educational_attainment == "Highschool"){
		$school = mysqli_real_escape_string($link, $_POST['school']);
		$course = mysqli_real_escape_string($link, $_POST['course']);
		$skills = mysqli_real_escape_string($link, $_POST['skills']);

	}else if ($educational_attainment == "None"){
		$school = "";
		$course = "";
		$skills = "";

	}else{
		$school = "";
		$course = mysqli_real_escape_string($link, $_POST['course']);
		$skills = mysqli_real_escape_string($link, $_POST['skills']);
	}

	if($danger_zone == "Yes"){
		$geographical_location = $_POST['geographical_loc'];
	}else{
		$geographical_location = "";
	}

	if (!empty($_FILES['fileImage']['name'])) {
		$images = uploadimage('fileImage', SRV_ROOT . 'images/resident/');
		$mainImage = $images['image'];
		$thumbnail = $images['thumbnail'];

		$sql = $conn->prepare("UPDATE tbl_resident SET resident_category = '$resident_category', firstname = '$fname', middlename = '$mname', lastname = '$lname', suffix = '$suffix', alias = '$alias', gender = '$gender', lgbtq = '$lgbtq', birthdate = '$birthdate', age = '$age', birthplace = '$birth_place', civilstatus = '$civil_status', citizenship = '$citizenship', religion = '$religion', contactno = '$contact_number', email = '$email', house_num = '$house_number', unit_name = '$unit_name', street_name = '$street_name', purok = '$purok', area_village = '$area_village', barangay = '$barangay', city_municipality = '$city_municipality', yearsofresidency = '$years_residency', danger_zone = '$danger_zone', geographical_location = '$geographical_location', resident_status = '$resstat', type_of_residency = '$typeres', educationalattainment = '$educational_attainment', school = '$school', course = '$course', skills = '$skills', employeestatus = '$employment_status', is_kasambahay = '$kas', occupation = '$occupation', 
								company_name = '$company_name', company_position = '$company_position', company_address = '$company_address', income_source = '$income_source', income_monthly = '$income_monthly', is_head_of_family = '$ishof', householdno = '$household_no', is_hoa = '$hoa', headofthefamily_id = '$head_family', relationship_fam = '$relation_head', votersstatus = '$voters_status', precintno = '$precint_no', is_soloparent = '$solo_parent', is_erpat = '$erpat', is_kababaihan = '$kababaihan', is_pwd = '$pwd', is_ps4 = '$ps4', is_indigenous = '$ind', is_informal_settler = '$set', is_ofw = '$ofw', cso = '$cso', ngo = '$ngo', transport_group = '$transport_group', is_sc = '$sc', 
								maynilad = '$maynilad', meralco = '$meralco', septic_tank = '$septic_tank', house_structure = '$house_structure', pet_own = '$pet_own', pet1_type = '$pet1_type', pet1_qty = '$pet1_qty', is_pet1_vac1 = '$pet1_vac1', pet1_vac1_date = '$pet1_vac1_date', is_pet1_vac2 = '$pet1_vac2', pet1_vac2_date = '$pet1_vac2_date', is_pet1_vac3 = '$pet1_vac3', pet1_vac3_date = '$pet1_vac3_date', is_pet1_reg1 = '$pet1_reg1', pet1_reg1_date = '$pet1_reg1_date', is_pet1_reg2 = '$pet1_reg2', pet1_reg2_date = '$pet1_reg2_date', is_pet1_reg3 = '$pet1_reg3', pet1_reg3_date = '$pet1_reg3_date', pet2_type = '$pet2_type', pet2_qty = '$pet2_qty', is_pet2_vac1 = '$pet2_vac1', pet2_vac1_date = '$pet2_vac1_date', is_pet2_vac2 = '$pet2_vac2', pet2_vac2_date = '$pet2_vac2_date', is_pet2_vac3 = '$pet2_vac3', pet2_vac3_date = '$pet2_vac3_date', is_pet2_reg1 = '$pet2_reg1', pet2_reg1_date = '$pet2_reg1_date', is_pet2_reg2 = '$pet2_reg2', 
								pet2_reg2_date = '$pet2_reg2_date', is_pet2_reg3 = '$pet2_reg3', pet2_reg3_date = '$pet2_reg3_date', pet3_type = '$pet3_type', pet3_qty = '$pet3_qty', is_pet3_vac1 = '$pet3_vac1', pet3_vac1_date = '$pet3_vac1_date', is_pet3_vac2 = '$pet3_vac2', pet3_vac2_date = '$pet3_vac2_date', is_pet3_vac3 = '$pet3_vac3', pet3_vac3_date = '$pet3_vac3_date', is_pet3_reg1 = '$pet3_reg1', pet3_reg1_date = '$pet3_reg1_date', is_pet3_reg2 = '$pet3_reg2', pet3_reg2_date = '$pet3_reg2_date', is_pet3_reg3 = '$pet3_reg3', pet3_reg3_date = '$pet3_reg3_date', status = '$status', date_death = '$date_death', cause_death = '$cause_death', place_death = '$place_death', image = '$mainImage', thumbnail = '$thumbnail' WHERE r_id = '$id'");
		$sql->execute();				
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Resident Record modified', '$resident', 'Resident Record', '$id', '$userId', '$today_date1')");
		$log->execute();
               
		header("Location: index.php?view=modify&id=$id&error=Modified successfully");

	}else{
		$sql = $conn->prepare("UPDATE tbl_resident SET resident_category = '$resident_category', firstname = '$fname', middlename = '$mname', lastname = '$lname', suffix = '$suffix', alias = '$alias', gender = '$gender', lgbtq = '$lgbtq', birthdate = '$birthdate', age = '$age', birthplace = '$birth_place', civilstatus = '$civil_status', citizenship = '$citizenship', religion = '$religion', contactno = '$contact_number', email = '$email', house_num = '$house_number', unit_name = '$unit_name', street_name = '$street_name', purok = '$purok', area_village = '$area_village', barangay = '$barangay', city_municipality = '$city_municipality', yearsofresidency = '$years_residency', danger_zone = '$danger_zone', geographical_location = '$geographical_location', resident_status = '$resstat', type_of_residency = '$typeres', educationalattainment = '$educational_attainment', school_name = '$school', course = '$course', skills = '$skills', employeestatus = '$employment_status', is_kasambahay = '$kas', occupation = '$occupation', 
								company_name = '$company_name', company_position = '$company_position', company_address = '$company_address', income_source = '$income_source', income_monthly = '$income_monthly', is_head_of_family = '$ishof', householdno = '$household_no', is_hoa = '$hoa', headofthefamily_id = '$head_family', relationship_fam = '$relation_head', votersstatus = '$voters_status', precintno = '$precint_no', is_soloparent = '$solo_parent', is_erpat = '$erpat', is_kababaihan = '$kababaihan', is_pwd = '$pwd', is_ps4 = '$ps4', is_indigenous = '$ind', is_informal_settler = '$set', is_ofw = '$ofw', cso = '$cso', ngo = '$ngo', transport_group = '$transport_group', is_sc = '$sc', 
								maynilad = '$maynilad', meralco = '$meralco', septic_tank = '$septic_tank', house_structure = '$house_structure', pet_own = '$pet_own', pet1_type = '$pet1_type', pet1_qty = '$pet1_qty', is_pet1_vac1 = '$pet1_vac1', pet1_vac1_date = '$pet1_vac1_date', is_pet1_vac2 = '$pet1_vac2', pet1_vac2_date = '$pet1_vac2_date', is_pet1_vac3 = '$pet1_vac3', pet1_vac3_date = '$pet1_vac3_date', is_pet1_reg1 = '$pet1_reg1', pet1_reg1_date = '$pet1_reg1_date', is_pet1_reg2 = '$pet1_reg2', pet1_reg2_date = '$pet1_reg2_date', is_pet1_reg3 = '$pet1_reg3', pet1_reg3_date = '$pet1_reg3_date', pet2_type = '$pet2_type', pet2_qty = '$pet2_qty', is_pet2_vac1 = '$pet2_vac1', pet2_vac1_date = '$pet2_vac1_date', is_pet2_vac2 = '$pet2_vac2', pet2_vac2_date = '$pet2_vac2_date', is_pet2_vac3 = '$pet2_vac3', pet2_vac3_date = '$pet2_vac3_date', is_pet2_reg1 = '$pet2_reg1', pet2_reg1_date = '$pet2_reg1_date', is_pet2_reg2 = '$pet2_reg2', 
								pet2_reg2_date = '$pet2_reg2_date', is_pet2_reg3 = '$pet2_reg3', pet2_reg3_date = '$pet2_reg3_date', pet3_type = '$pet3_type', pet3_qty = '$pet3_qty', is_pet3_vac1 = '$pet3_vac1', pet3_vac1_date = '$pet3_vac1_date', is_pet3_vac2 = '$pet3_vac2', pet3_vac2_date = '$pet3_vac2_date', is_pet3_vac3 = '$pet3_vac3', pet3_vac3_date = '$pet3_vac3_date', is_pet3_reg1 = '$pet3_reg1', pet3_reg1_date = '$pet3_reg1_date', is_pet3_reg2 = '$pet3_reg2', pet3_reg2_date = '$pet3_reg2_date', is_pet3_reg3 = '$pet3_reg3', pet3_reg3_date = '$pet3_reg3_date', status = '$status', date_death = '$date_death', cause_death = '$cause_death', place_death = '$place_death' WHERE r_id = '$id'");
		$sql->execute();				
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Resident Record modified', '$resident', 'Resident Record', '$id', '$userId', '$today_date1')");
		$log->execute();
               
		header("Location: index.php?view=modify&id=$id&error=Modified successfully");
	}
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
	
	$sel = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$id'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$resident = $sel_data['firstname'] . ' ' . $sel_data['middlename'] . ' ' . $sel_data['lastname'];
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_resident SET is_deleted = '1' WHERE r_id = '$id'");
	$sql->execute();
	
	/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Resident Record deleted', '$resident', 'Resident Record', '$id', '$userId', '$today_date1')");
	$log->execute();
       
	header("Location: index.php?error=Deleted successfully");
}

/*
    Confirm Data
*/
// function confirm_data()
// {
// 	include '../global-library/database.php';

// 	$userId = $_SESSION['user_id'];
	
//     if (isset($_POST['id'])) {
//         $id = $_POST['id'];
//     } else {
//         header('Location: index.php');
//     }    	
	
// 	$sel = $conn->prepare("SELECT * FROM tbl_resident WHERE uid = '$id'");
// 	$sel->execute();
// 	$sel_data = $sel->fetch();
// 	$usrid = $sel_data['r_id'];
	
// 	$resident = $sel_data['firstname'] . ' ' . $sel_data['middlename'] . ' ' . $sel_data['lastname'];
	
//     // delete the category. set is_deleted to 1 as deleted;    
// 	$sql = $conn->prepare("UPDATE tbl_resident SET is_active = '1' WHERE uid = '$id'");
// 	$sql->execute();
	
// 		$up = $conn->prepare("UPDATE bs_user SET is_active = '1' WHERE emp_id = '$usrid'");
// 		$up->execute();
	
// 	/* Insert Log */
// 	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
// 				VALUES ('New Resident confirmed', '$resident', 'Resident Record', '$id', '$userId', '$today_date1')");
// 	$log->execute();
       
// 	header("Location: index.php?error=Confirmed successfully");
// }


function _deleteImage($id)
{
	include '../global-library/database.php';
	// we will return the status
	// whether the image deleted successfully
	$deleted = false;
	
	$sql = $conn->prepare("SELECT flc_image, flc_thumbnail FROM tbl_resident WHERE cid = '$id'");
	$sql->execute();

	if ($sql->rowCount() > 0) {
		$sql_data = $sql->fetch();		

		if ($sql_data['flc_image'] && $sql_data['flc_thumbnail']) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/artist/$sql_data[flc_image]");
			$deleted = @unlink(SRV_ROOT . "images/artist/$sql_data[flc_thumbnail]");
		}
	}	

	return $deleted;
}


function add_pets()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$id = $_POST['id'];
	
	if(isset($_POST['pet1']))
	{	
		$pet1 = mysqli_real_escape_string($link, $_POST['pet1']);
	}else{ $pet1 = ''; }
	if(isset($_POST['quantity1']))
	{
		$quantity1 = mysqli_real_escape_string($link, $_POST['quantity1']);
	}else{ $quantity1 = ''; }
	
	
	if(isset($_POST['pet2']))
	{	
		$pet2 = mysqli_real_escape_string($link, $_POST['pet2']);
	}else{ $pet2 = ''; }
	if(isset($_POST['quantity2']))
	{
		$quantity2 = mysqli_real_escape_string($link, $_POST['quantity2']);
	}else{ $quantity2 = ''; }
	
	
	if(isset($_POST['pet3']))
	{	
		$pet3 = mysqli_real_escape_string($link, $_POST['pet3']);
	}else{ $pet3 = ''; }
	if(isset($_POST['quantity3']))
	{
		$quantity3 = mysqli_real_escape_string($link, $_POST['quantity3']);
	}else{ $quantity3 = ''; }
	
	
	if(isset($_POST['pet4']))
	{	
		$pet4 = mysqli_real_escape_string($link, $_POST['pet4']);
	}else{ $pet4 = ''; }
	if(isset($_POST['quantity4']))
	{
		$quantity4 = mysqli_real_escape_string($link, $_POST['quantity4']);
	}else{ $quantity4 = ''; }
	
	
	if(isset($_POST['pet5']))
	{	
		$pet5 = mysqli_real_escape_string($link, $_POST['pet5']);
	}else{ $pet5 = ''; }
	if(isset($_POST['quantity5']))
	{
		$quantity5 = mysqli_real_escape_string($link, $_POST['quantity5']);
	}else{ $quantity5 = ''; }
	
	
	if(isset($_POST['pet6']))
	{	
		$pet6 = mysqli_real_escape_string($link, $_POST['pet6']);
	}else{ $pet6 = ''; }
	if(isset($_POST['quantity6']))
	{
		$quantity6 = mysqli_real_escape_string($link, $_POST['quantity6']);
	}else{ $quantity6 = ''; }
	
	
	if(isset($_POST['pet7']))
	{	
		$pet7 = mysqli_real_escape_string($link, $_POST['pet7']);
	}else{ $pet7 = ''; }
	if(isset($_POST['quantity7']))
	{
		$quantity7 = mysqli_real_escape_string($link, $_POST['quantity7']);
	}else{ $quantity7 = ''; }
	
	
	if(isset($_POST['pet8']))
	{	
		$pet8 = mysqli_real_escape_string($link, $_POST['pet8']);
	}else{ $pet8 = ''; }
	if(isset($_POST['quantity8']))
	{
		$quantity8 = mysqli_real_escape_string($link, $_POST['quantity8']);
	}else{ $quantity8 = ''; }
	
	
	if(isset($_POST['pet9']))
	{	
		$pet9 = mysqli_real_escape_string($link, $_POST['pet9']);
	}else{ $pet9 = ''; }
	if(isset($_POST['quantity9']))
	{
		$quantity9 = mysqli_real_escape_string($link, $_POST['quantity9']);
	}else{ $quantity9 = ''; }
	
	
	if(isset($_POST['pet10']))
	{	
		$pet10 = mysqli_real_escape_string($link, $_POST['pet10']);
	}else{ $pet10 = ''; }
	if(isset($_POST['quantity10']))
	{
		$quantity10 = mysqli_real_escape_string($link, $_POST['quantity10']);
	}else{ $quantity10 = ''; }
		

	$sql = $conn->prepare("INSERT INTO tbl_pets (res_id, pet1, qty1, pet2, qty2, pet3, qty3, pet4, qty4, pet5, qty5, pet6, qty6, pet7, qty7, pet8, qty8, pet9, qty9, pet10, qty10)
				VALUES ('$id', '$pet1', '$quantity1', '$pet2', '$quantity2', '$pet3', '$quantity3', '$pet4', '$quantity4', '$pet5', '$quantity5', '$pet6', '$quantity6', '$pet7', '$quantity7', '$pet8', '$quantity8', '$pet9', '$quantity9', '$pet10', '$quantity10')");
	$sql->execute();

	/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Resident Pet added', '$id', 'Resident Pet', '$id', '$userId', '$today_date1')");
	$log->execute();
	
	header("Location: index.php?view=detail&id=$id&error=Saved successfully");
}
?>