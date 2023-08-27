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
	$vwac_typeofcase = $_POST['typeofcase'];
	$refnum = $_POST['refnum'];
	$csnum = $_POST['csnum'];
	$vwac_victim_firstname = $_POST['victim_first_name'];
	$vwac_victim_middlename = $_POST['victim_middle_name'];
	$vwac_victim_lastname = $_POST['victim_last_name'];
    $vwac_age = $_POST['age'];
	$vwac_address = $_POST['address'];
	$vwac_civil_status = $_POST['civil_status'];
	$vwac_relationship_to_perpetrator = $_POST['relationship_to_perpetrator'];
	$vwac_cmplnt_proffesion = $_POST['cmplnt_proffesion'];
	$vwac_perpetrator_firstname = $_POST['perp_first_name'];
	$vwac_perpetrator_middlename = $_POST['perp_middle_name'];
	$vwac_perpetrator_lastname = $_POST['perp_last_name'];
	$vwac_perpetrator_contact = $_POST['perpetrator_contact'];
	$vwac_perpetrator_address = $_POST['perpetrator_address'];
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

	if($vwac_typeofcase == "Others"){
		$vwac_typeofcase = $_POST['typeofcase2'];
	}else{

	}
	
			
		//echo $itemdesc . ' ' . $serialno . ' ' . $amt . ' ' . $dateofpurchase . ' ' . $condition . ' ' . $quantity;
        $sql = $conn->prepare("INSERT INTO tbl_vwac (vwac_typeofcase, reference_no, case_no, vwac_victim_firstname, vwac_victim_middlename, vwac_victim_lastname, vwac_age, vwac_address, vwac_civil_status, vwac_relationship_to_perpetrator, vwac_cmplnt_proffesion, vwac_perpetrator_firstname, vwac_perpetrator_middlename, vwac_perpetrator_lastname, vwac_perpetrator_contact, vwac_perpetrator_address, vwac_date_violence_commited, vwac_date_reported, vwac_physical, vwac_sexual, vwac_psychological, vwac_economic_abuse, vwac_medical, vwac_counseling, vwac_referral_to, vwac_shelter, vwac_issued_bpo_date, vwac_providedby, vwac_providedby1, vwac_providedby2, vwac_providedby3, vwac_providedby4, vwac_remarks, vwac_remarks1, vwac_remarks2, vwac_remarks3, vwac_remarks4, vwac_date_accomplished, is_deleted) 
													VALUES ('$vwac_typeofcase', '$refnum', '$csnum', '$vwac_victim_firstname', '$vwac_victim_middlename','$vwac_victim_lastname', '$vwac_age', '$vwac_address', '$vwac_civil_status', '$vwac_relationship_to_perpetrator', '$vwac_cmplnt_proffesion', '$vwac_perpetrator_firstname', '$vwac_perpetrator_middlename', '$vwac_perpetrator_lastname', '$vwac_perpetrator_contact', '$vwac_perpetrator_address', '$vwac_date_violence_commited', '$vwac_date_reported', '$vwac_physical', '$vwac_sexual', '$vwac_psychological', '$vwac_economic_abuse', '$vwac_medical', '$vwac_counseling', '$vwac_referral_to', '$vwac_shelter', '$vwac_issued_bpo_date', '$vwac_providedby', '$vwac_providedby1', '$vwac_providedby2', '$vwac_providedby3', '$vwac_providedby4', '$vwac_remarks', '$vwac_remarks1', '$vwac_remarks2', '$vwac_remarks3', '$vwac_remarks4', '$vwac_date_accomplished', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_vwac SET uid = '$uid' WHERE vwac_id = '$id'");
		$up->execute();
    
		header('Location: index.php?view=vwac_add&error=Added successfully');
		
	
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
	$csnum = $_POST['csnum'];
	$vwac_victim_firstname = $_POST['victim_first_name'];
	$vwac_victim_middlename = $_POST['victim_middle_name'];
	$vwac_victim_lastname = $_POST['victim_last_name'];
    $vwac_age = $_POST['age'];
	$vwac_address = $_POST['address'];
	$vwac_civil_status = $_POST['civil_status'];
	$vwac_relationship_to_perpetrator = $_POST['relationship_to_perpetrator'];
	$vwac_cmplnt_proffesion = $_POST['cmplnt_proffesion'];
	$vwac_perpetrator_firstname = $_POST['perp_first_name'];
	$vwac_perpetrator_middlename = $_POST['perp_middle_name'];
	$vwac_perpetrator_lastname = $_POST['perp_last_name'];
	$vwac_perpetrator_contact = $_POST['perpetrator_contact'];
	$vwac_perpetrator_address = $_POST['perpetrator_address'];
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

	if($vwac_typeofcase == "Others"){
		$vwac_typeofcase = $_POST['typeofcase2'];
	}else{

	}
	  
		$sql = $conn->prepare("UPDATE tbl_vwac SET vwac_typeofcase = '$vwac_typeofcase', case_no = '$csnum', vwac_victim_firstname = '$vwac_victim_firstname', vwac_victim_middlename = '$vwac_victim_middlename', vwac_victim_lastname = '$vwac_victim_lastname', vwac_age = '$vwac_age', vwac_address = '$vwac_address', vwac_civil_status = '$vwac_civil_status', vwac_relationship_to_perpetrator = '$vwac_relationship_to_perpetrator', vwac_cmplnt_proffesion = '$vwac_cmplnt_proffesion', vwac_perpetrator_firstname = '$vwac_perpetrator_firstname', vwac_perpetrator_middlename = '$vwac_perpetrator_middlename', vwac_perpetrator_lastname = '$vwac_perpetrator_lastname', vwac_perpetrator_contact = '$vwac_perpetrator_contact', vwac_perpetrator_address = '$vwac_perpetrator_address', vwac_date_violence_commited = '$vwac_date_violence_commited', vwac_date_reported = '$vwac_date_reported', vwac_physical = '$vwac_physical', vwac_sexual = '$vwac_sexual', vwac_psychological = '$vwac_psychological', vwac_economic_abuse = '$vwac_economic_abuse', vwac_medical = '$vwac_medical', vwac_counseling = '$vwac_counseling', vwac_referral_to = '$vwac_referral_to', vwac_shelter = '$vwac_shelter', vwac_issued_bpo_date = '$vwac_issued_bpo_date', vwac_providedby = '$vwac_providedby', vwac_providedby1 = '$vwac_providedby1', vwac_providedby2 = '$vwac_providedby2', vwac_providedby3 = '$vwac_providedby3', vwac_providedby4 = '$vwac_providedby4', vwac_remarks = '$vwac_remarks', vwac_remarks1 = '$vwac_remarks1', vwac_remarks2 = '$vwac_remarks2', vwac_remarks3 = '$vwac_remarks3', vwac_remarks4 = '$vwac_remarks4', vwac_date_accomplished = '$vwac_date_accomplished' WHERE uid = '$id'");
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
	$sql = $conn->prepare("UPDATE tbl_vwac SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
       
	header("Location: index.php?view=vwac_list&error=Deleted successfully");
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