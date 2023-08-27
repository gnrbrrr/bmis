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
	
	$p_entry = $_POST['p_entry'];
	$date = $_POST['date'];
	$address = $_POST['address'];
	$intake_by = $_POST['intake_by'];
	$position_first = $_POST['position_first'];
	$case_manager = $_POST['case_manager'];
	$position_second = $_POST['position_second'];
	$caseno = $_POST['caseno'];
	$fname_victim = $_POST['fname_victim'];
	$mname_victim = $_POST['mname_victim'];
	$lname_victim = $_POST['lname_victim'];
	$sex_victim = $_POST['sex_victim'];
	$dob_victim = $_POST['dob_victim'];
	$age_victim = $_POST['age_victim'];
	$civil_victim = $_POST['civil_victim'];
	$religion_victim = $_POST['religion_victim'];
	$education_victim = $_POST['education_victim'];
	$caddress_victim = $_POST['caddress_victim'];
	$altaddress_victim = $_POST['altaddress_victim'];
	$contact_victim = $_POST['contact_victim'];
	$occupation_victim = $_POST['occupation_victim'];
	$is_vdisable = $_POST['is_vdisable'];
	$vdisable_type = $_POST['vdisable_type'];
	$siba_fname = $_POST['siba_fname'];
	$sibb_fname = $_POST['sibb_fname'];
	$sibc_fname = $_POST['sibc_fname'];
	$siba_age = $_POST['siba_age'];
	$sibb_age = $_POST['sibb_age'];
	$sibc_age = $_POST['sibc_age'];
	$siba_sex = $_POST['siba_sex'];
	$sibb_sex = $_POST['sibb_sex'];
	$sibc_sex = $_POST['sibc_sex'];
	$siba_educ = $_POST['siba_educ'];
	$sibb_educ = $_POST['sibb_educ'];
	$sibc_educ = $_POST['sibc_educ'];
	$vguardian_fname = $_POST['vguardian_fname'];
	$vguardian_mname = $_POST['vguardian_mname'];
	$vguardian_lname = $_POST['vguardian_lname'];
	$vguardian_contact = $_POST['vguardian_contact'];
	$vguardian_relationship = $_POST['vguardian_relationship'];
	$vguardian_address = $_POST['vguardian_address'];
	$perp_fname = $_POST['perp_fname'];
	$perp_mname = $_POST['perp_mname'];
	$perp_lname = $_POST['perp_lname'];
	$perp_alias = $_POST['perp_alias'];
	$perp_sex = $_POST['perp_sex'];
	$perp_dob = $_POST['perp_dob'];
	$perp_age = $_POST['perp_age'];
	$perp_civil = $_POST['perp_civil'];
	$perp_religion = $_POST['perp_religion'];
	$perp_education = $_POST['perp_education'];
	$perp_caddress = $_POST['perp_caddress'];
	$perp_altaddress = $_POST['perp_altaddress'];
	$perp_contact = $_POST['perp_contact'];
	$perp_occupation = $_POST['perp_occupation'];
	$is_pdisable = $_POST['is_pdisable'];
	$pdisable_type = $_POST['pdisable_type'];
	$is_temporary = $_POST['is_temporary'];
	$perp_relation = $_POST['perp_relation'];
	$perpguardian_fname = $_POST['perpguardian_fname'];
	$perpguardian_mname = $_POST['perpguardian_mname'];
	$perpguardian_lname = $_POST['perpguardian_lname'];
	$perpguardian_contact = $_POST['perpguardian_contact'];
	$perpguardian_relation = $_POST['perpguardian_relation'];
	$perpguardian_address = $_POST['perpguardian_address'];
	$ra = $_POST['ra'];
	$ra_answer = $_POST['ra_answer'];
	$dt_latest_incident = $_POST['dt_latest_incident'];
	$occurrence_place = $_POST['occurrence_place'];
	$incident_desc = $_POST['incident_desc'];
	$witnessa_name = $_POST['witnessa_name'];
	$witnessb_name = $_POST['witnessb_name'];
	$witnessc_name = $_POST['witnessc_name'];
	$witnessa_contact = $_POST['witnessa_contact'];
	$witnessb_contact = $_POST['witnessb_contact'];
	$witnessc_contact = $_POST['witnessc_contact'];
	$witnessa_address = $_POST['witnessa_address'];
	$witnessb_address = $_POST['witnessb_address'];
	$witnessc_address = $_POST['witnessc_address'];
	$rescue_date = $_POST['rescue_date'];
	$bpo_date = $_POST['bpo_date'];
	$dswd_date = $_POST['dswd_date'];
	$dswd_city = $_POST['dswd_city'];
	$dswd_type = $_POST['dswd_type'];
	$healthcare_date = $_POST['healthcare_date'];
	$healthcare_name = $_POST['healthcare_name'];
	$healthcare_type = $_POST['healthcare_type'];
	$police_agency = $_POST['police_agency'];
	$police_date = $_POST['police_date'];
	$legal_agency = $_POST['legal_agency'];
	$legal_date = $_POST['legal_date'];
	$other_agency = $_POST['other_agency'];
	$other_date = $_POST['other_date'];
	$service_type = $_POST['service_type'];
	$discontinue_case = $_POST['discontinue_case'];
	
			
		//echo $itemdesc . ' ' . $serialno . ' ' . $amt . ' ' . $dateofpurchase . ' ' . $condition . ' ' . $quantity;
        $sql = $conn->prepare("INSERT INTO tbl_vaw (p_entry, date, address, intake_by, position_first, 
		case_manager, position_second, caseno, fname_victim, mname_victim, lname_victim, sex_victim, dob_victim, 
		age_victim, civil_victim, religion_victim, education_victim, caddress_victim, altaddress_victim, contact_victim, occupation_victim, 
		is_vdisable, vdisable_type, siba_fname, sibb_fname, sibc_fname, siba_age, sibb_age, sibc_age, siba_sex, sibb_sex, sibc_sex, siba_educ, 
		sibb_educ, sibc_educ, vguardian_fname, vguardian_mname, vguardian_lname, vguardian_contact, vguardian_relationship, vguardian_address, 
		perp_fname, perp_mname, perp_lname, perp_alias, perp_sex, perp_dob, perp_age, perp_civil, perp_religion, perp_education, perp_caddress, 
		perp_altaddress, perp_contact, perp_occupation, is_pdisable, pdisable_type, is_temporary, perp_relation, perpguardian_fname, 
		perpguardian_mname, perpguardian_lname, perpguardian_contact, perpguardian_relation, perpguardian_address, ra_law, ra_answer, dt_latest_incident, 
		occurrence_place, incident_desc, witnessa_name, witnessb_name, witnessc_name, witnessa_contact, witnessb_contact, witnessc_contact, witnessa_address, 
		witnessb_address, witnessc_address, rescue_date, bpo_date, dswd_date, dswd_city, dswd_type, healthcare_date, healthcare_name, healthcare_type, police_agency,
		police_date, legal_agency, legal_date, other_agency, other_date, service_type, discontinue_case, is_deleted) VALUES ('$p_entry', '$date', '$address', '$intake_by', '$position_first', '$case_manager', '$position_second', 
		'$caseno', '$fname_victim', '$mname_victim', '$lname_victim', '$sex_victim', '$dob_victim', '$age_victim', 
		'$civil_victim', '$religion_victim', '$education_victim', '$caddress_victim', '$altaddress_victim', '$contact_victim', 
		'$occupation_victim', '$is_vdisable', '$vdisable_type', '$siba_fname', '$sibb_fname', '$sibc_fname', '$siba_age', '$sibb_age,
		 '$sibc_age', '$siba_sex', '$sibb_sex', '$sibc_sex', '$siba_educ', '$sibb_educ', '$sibc_educ', 
		 '$vguardian_fname', '$vguardian_mname', '$vguardian_lname', '$vguardian_contact', '$vguardian_relationship', 
		 '$vguardian_address', '$perp_fname', '$perp_mname', '$perp_lname', '$perp_alias, '$perp_sex', 
		 '$perp_dob', '$perp_age', '$perp_civil', '$perp_religion', '$perp_education', '$perp_caddress', '$perp_altaddress', 
		 '$perp_contact', '$perp_occupation', '$is_pdisable', '$pdisable_type', '$is_temporary', '$perp_relation', '$perpguardian_fname, 
		 '$perpguardian_mname', '$perpguardian_lname', '$perpguardian_contact', '$perpguardian_relation', '$perpguardian_address', '$ra', '$ra_answer', '$dt_latest_incident', '$occurrence_place', '$incident_desc', '$witnessa_name', '$witnessb_name', '$witnessc_name', 
		 '$witnessa_contact, '$witnessb_contact', '$witnessc_contact', '$witnessa_address', '$witnessb_address', '$witnessc_address', 
		 '$rescue_date', '$bpo_date', '$dswd_date', '$dswd_city', '$dswd_type', '$healthcare_date', '$healthcare_name', '$healthcare_type', 
		 '$police_agency, '$police_date', '$legal_agency', '$legal_date', '$other_agency', '$other_date', '$service_type', '$discontinue_case', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_vaw SET uid = '$uid' WHERE v_id = '$id'");
		$up->execute();
    
		header('Location: index.php?view=vawc_add&error=Added successfully');
		
	
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
			$result    = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_IMAGE_WIDTH);
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
    
	$vwac_typeofcase = $_POST['typeofcase'];
	$vwac_victim = $_POST['victim'];
    $vwac_age = $_POST['age'];
	$vwac_address = $_POST['address'];
	$vwac_civil_status = $_POST['civil_status'];
	$vwac_relationship_to_perpetrator = $_POST['relationship_to_perpetrator'];
	$vwac_cmplnt_proffesion = $_POST['cmplnt_proffesion'];
	$vwac_perpetrator = $_POST['perpetrator'];
	$vwac_date_violence_commited = $_POST['date_violence_commited'];
	$vwac_date_reported = $_POST['date_reported'];
	$vwac_physical = $_POST['physical'];
	$vwac_sexual = $_POST['sexual'];
	$vwac_psychological = $_POST['psychological'];
	$vwac_economic_abuse = $_POST['economic_abuse'];
	$vwac_medical = $_POST['medical'];
	$vwac_counseling = $_POST['counseling'];
	$vwac_referral_to = $_POST['referral_to'];
	$vwac_shelter = $_POST['shelter'];
	$vwac_issued_bpo_date = $_POST['issued_bpo_date'];
	$vwac_providedby = $_POST['providedby'];
	$vwac_providedby1 = $_POST['providedby1'];
	$vwac_providedby2 = $_POST['providedby2'];
	$vwac_providedby3 = $_POST['providedby3'];
	$vwac_providedby4 = $_POST['providedby4'];
	$vwac_remarks = $_POST['remarks'];
	$vwac_remarks1 = $_POST['remarks1'];
	$vwac_remarks2 = $_POST['remarks2'];
	$vwac_remarks3 = $_POST['remarks3'];
	$vwac_remarks4 = $_POST['remarks4'];
	$vwac_date_accomplished = $_POST['date_accomplished'];
	  
		$sql = $conn->prepare("UPDATE tbl_vwac SET vwac_typeofcase = '$vwac_typeofcase', vwac_victim = '$vwac_victim', vwac_age = '$vwac_age', vwac_address = '$vwac_address', vwac_civil_status = '$vwac_civil_status', vwac_cmplnt_proffesion = '$vwac_cmplnt_proffesion', vwac_perpetrator = '$vwac_perpetrator', vwac_date_violence_commited = '$vwac_date_violence_commited', vwac_date_reported = '$vwac_date_reported', vwac_physical = '$vwac_physical', vwac_sexual = '$vwac_sexual', vwac_psychological = '$vwac_psychological', vwac_economic_abuse = '$vwac_economic_abuse', vwac_medical = '$vwac_medical', vwac_counseling = '$vwac_counseling', vwac_referral_to = '$vwac_referral_to', vwac_shelter = '$vwac_shelter', vwac_issued_bpo_date = '$vwac_issued_bpo_date', vwac_providedby = '$vwac_providedby', vwac_providedby1 = '$vwac_providedby1', vwac_providedby2 = '$vwac_providedby2', vwac_providedby3 = '$vwac_providedby3', vwac_providedby4 = '$vwac_providedby4', vwac_remarks = '$vwac_remarks', vwac_remarks1 = '$vwac_remarks1', vwac_remarks2 = '$vwac_remarks2', vwac_remarks3 = '$vwac_remarks3', vwac_remarks4 = '$vwac_remarks4', vwac_date_accomplished = '$vwac_date_accomplished' WHERE uid = '$id'");
		$sql->execute();
               
		header("Location: index.php?view=vwac_modify&id=$id&error=Modified successfully");
	
	
}

/*
    Remove Data
*/
function delete_data()
{
	include '../global-library/database.php';	
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }    	
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_vaw SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
       
	header("Location: index.php?view=vaw_list&error=Deleted successfully");
}


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

?>