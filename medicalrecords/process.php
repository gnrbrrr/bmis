<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        add_data();
        break;

	case 'add_history' :
		add_history();
		break;
      
    case 'modify' :
        modify_data();
        break;

	case 'modify_history' :
		modify_history();
		break;
        
    case 'delete' :
        delete_data();
        break;

	case 'delete_history' :
		delete_history();
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
	
    $name = mysqli_real_escape_string($link,  $_POST['pi_name']);
	$home_address = mysqli_real_escape_string($link, $_POST['pi_home_address']);
	$occupation = $_POST['pi_occupation'];
	$email_address = mysqli_real_escape_string($link, $_POST['pi_email_add']);
	$place_of_birth = mysqli_real_escape_string($link, $_POST['pi_placeofbirth']);
	$date_of_birth = $_POST['pi_dateofbirth'];
	$age = $_POST['pi_age'];
	$sex = $_POST['pi_sex'];
	$contact = $_POST['pi_contact'];
	$nationality = $_POST['pi_nationality'];
	$civil_status = $_POST['pi_civil'];

	$date_exam = $_POST['mh_date_exam'];
	$allergies_food_medication = mysqli_real_escape_string($link, $_POST['mh_afm']);
	$past_illness = mysqli_real_escape_string($link, $_POST['mh_past_ill']);
	$present_medication = mysqli_real_escape_string($link, $_POST['mh_pres_med']);
	$chief = mysqli_real_escape_string($link, $_POST['mh_chief']);
	$history = mysqli_real_escape_string($link, $_POST['mh_history']);
	$symp_diag = mysqli_real_escape_string($link, $_POST['mh_symp_diag']);
	$treat = mysqli_real_escape_string($link, $_POST['mh_treat']);
	$physical = mysqli_real_escape_string($link, $_POST['mh_physical']);
	$physician = mysqli_real_escape_string($link, $_POST['mh_physician']);
	$license = mysqli_real_escape_string($link, $_POST['mh_license']);

	$bp = mysqli_real_escape_string($link, $_POST['vs_bp']);
	$hr = mysqli_real_escape_string($link, $_POST['vs_hr']);
	$rr = mysqli_real_escape_string($link, $_POST['vs_rr']);
	$t = mysqli_real_escape_string($link, $_POST['vs_t']);
	$spo2 = mysqli_real_escape_string($link, $_POST['vs_spo2']);
	$rbs = mysqli_real_escape_string($link, $_POST['vs_rbs']);

	$images = uploadimage('fileImage', SRV_ROOT . 'images/medical/');

	$mainImage = $images['image'];
	
	
	$sql = $conn->prepare("SELECT * FROM tbl_patient_info WHERE pi_name = '$name' AND is_deleted != '1'");
	$sql->execute();
	if($sql_data = $sql->fetch()){
		header("Location: index.php?view=add&error=Client already exist! Data entry failed.");
	}else{
        
		$sql = $conn->prepare("INSERT INTO tbl_patient_info (pi_name, pi_home_address, pi_occupation, pi_email_add, 
																pi_placeofbirth, pi_dateofbirth, pi_age, pi_sex, pi_contact, 
																pi_nationality, pi_civil_status, mh_date_examination, mh_allergies_food_medication, 
																mh_past_illness, mh_present_medication, mh_chief, mh_history, mh_symp_diag, mh_treat, mh_physical, image, mh_physician, mh_license, 
																vs_bp, vs_hr, vs_rr, vs_t, vs_spo2, vs_rbs, 
																user_id, is_deleted) 
																	
													VALUES ('$name', '$home_address', '$occupation', '$email_address', 
																'$place_of_birth', '$date_of_birth', '$age', '$sex', '$contact', 
																'$nationality', '$civil_status', '$date_exam','$allergies_food_medication', 
																'$past_illness', '$present_medication', '$chief', '$history', '$symp_diag', '$treat', '$physical', '$mainImage', '$physician', '$license', 
																'$bp', '$hr', '$rr', '$t', '$spo2', '$rbs', 
																'$userId', '0')");
		$sql->execute();

		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Medical Record Added', '$name', 'Medical Record', '$id', '$userId', '$today_date1')");
		$log->execute();
    
		header('Location: index.php?view=add&error=Added successfully');
	}
}


function add_history(){
	
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];

	$id = $_POST['id'];

	$date_exam = $_POST['mh_date_exam'];
	$allergies_food_medication = mysqli_real_escape_string($link, $_POST['mh_afm']);
	$past_illness = mysqli_real_escape_string($link, $_POST['mh_past_ill']);
	$present_medication = mysqli_real_escape_string($link, $_POST['mh_pres_med']);
	$chief = mysqli_real_escape_string($link, $_POST['mh_chief']);
	$history = mysqli_real_escape_string($link, $_POST['mh_history']);
	$symp_diag = mysqli_real_escape_string($link, $_POST['mh_symp_diag']);
	$treat = mysqli_real_escape_string($link, $_POST['mh_treat']);
	$physical = mysqli_real_escape_string($link, $_POST['mh_physical']);
	$physician = mysqli_real_escape_string($link, $_POST['mh_physician']);
	$license = mysqli_real_escape_string($link, $_POST['mh_license']);

	$bp = mysqli_real_escape_string($link, $_POST['vs_bp']);
	$hr = mysqli_real_escape_string($link, $_POST['vs_hr']);
	$rr = mysqli_real_escape_string($link, $_POST['vs_rr']);
	$t = mysqli_real_escape_string($link, $_POST['vs_t']);
	$spo2 = mysqli_real_escape_string($link, $_POST['vs_spo2']);
	$rbs = mysqli_real_escape_string($link, $_POST['vs_rbs']);

	$images = uploadimage('fileImage', SRV_ROOT . 'images/medical/');

	$mainImage = $images['image'];
        
	$sql = $conn->prepare("INSERT INTO tbl_med_history (pi_id, history_date_examination, history_allergies_food_medication, 
															history_past_illness, history_present_medication, history_chief, history_history, history_symp_diag, history_treat, history_physical, history_image, history_physician, history_license, 
															history_bp, history_hr, history_rr, history_t, history_spo2, history_rbs, 
															user_id, is_deleted) 
																
												VALUES ('$id', '$date_exam','$allergies_food_medication', 
															'$past_illness', '$present_medication', '$chief', '$history', '$symp_diag', '$treat', '$physical', '$mainImage', '$physician', '$license', 
															'$bp', '$hr', '$rr', '$t', '$spo2', '$rbs', 
															'$userId', '0')");
	$sql->execute();

	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Medical Record Added', '$name', 'Medical Record', '$id', '$userId', '$today_date1')");
	$log->execute();

	header("Location: index.php?view=detail&error=Added Successfully&id=$id");
}


/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];
	
    $name = mysqli_real_escape_string($link,  $_POST['pi_name']);
	$home_address = mysqli_real_escape_string($link, $_POST['pi_home_address']);
	$occupation = $_POST['pi_occupation'];
	$email_address = mysqli_real_escape_string($link, $_POST['pi_email_add']);
	$place_of_birth = mysqli_real_escape_string($link, $_POST['pi_placeofbirth']);
	$date_of_birth = $_POST['pi_dateofbirth'];
	$age = $_POST['pi_age'];
	$sex = $_POST['pi_sex'];
	$contact = $_POST['pi_contact'];
	$nationality = $_POST['pi_nationality'];
	$civil_status = $_POST['pi_civil'];

	$date_exam = $_POST['mh_date_exam'];
	$allergies_food_medication = mysqli_real_escape_string($link, $_POST['mh_afm']);
	$past_illness = mysqli_real_escape_string($link, $_POST['mh_past_ill']);
	$present_medication = mysqli_real_escape_string($link, $_POST['mh_pres_med']);
	$chief = mysqli_real_escape_string($link, $_POST['mh_chief']);
	$history = mysqli_real_escape_string($link, $_POST['mh_history']);
	$symp_diag = mysqli_real_escape_string($link, $_POST['mh_symp_diag']);
	$treat = mysqli_real_escape_string($link, $_POST['mh_treat']);
	$physical = mysqli_real_escape_string($link, $_POST['mh_physical']);
	$physician = mysqli_real_escape_string($link, $_POST['mh_physician']);
	$license = mysqli_real_escape_string($link, $_POST['mh_license']);

	$bp = mysqli_real_escape_string($link, $_POST['vs_bp']);
	$hr = mysqli_real_escape_string($link, $_POST['vs_hr']);
	$rr = mysqli_real_escape_string($link, $_POST['vs_rr']);
	$t = mysqli_real_escape_string($link, $_POST['vs_t']);
	$spo2 = mysqli_real_escape_string($link, $_POST['vs_spo2']);
	$rbs = mysqli_real_escape_string($link, $_POST['vs_rbs']);


	if (!empty($_FILES['fileImage']['name'])) {
		$images = uploadimage('fileImage', SRV_ROOT . 'images/medical/');

		$mainImage = $images['image'];

		$sql = $conn->prepare("UPDATE tbl_patient_info SET pi_name = '$name', pi_home_address = '$home_address', pi_occupation = '$occupation', 
												pi_email_add = '$email_address', pi_placeofbirth = '$place_of_birth', pi_dateofbirth = '$date_of_birth', pi_age = '$age', pi_sex = '$sex', pi_contact = '$contact', 
												pi_nationality = '$nationality', pi_civil_status = '$civil_status', mh_date_examination = '$date_exam', mh_allergies_food_medication = '$allergies_food_medication', 
												mh_past_illness = '$past_illness', mh_present_medication = '$present_medication', mh_chief = '$chief', mh_history = '$history', mh_symp_diag = '$symp_diag', mh_treat = '$treat', mh_physical = '$physical', image = '$mainImage', mh_physician = '$physician', mh_license = '$license', 
												vs_bp = '$bp', vs_hr = '$hr', vs_rr = '$rr', vs_t = '$t', vs_spo2 = '$spo2', vs_rbs = '$rbs' WHERE pi_id = '$id'");
		$sql->execute();				
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Medical Record Modified', '$name', 'Medical Record', '$id', '$userId', '$today_date1')");
		$log->execute();
               
		header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
	}else{
		$sql = $conn->prepare("UPDATE tbl_patient_info SET pi_name = '$name', pi_home_address = '$home_address', pi_occupation = '$occupation', 
												pi_email_add = '$email_address', pi_placeofbirth = '$place_of_birth', pi_dateofbirth = '$date_of_birth', pi_age = '$age', pi_sex = '$sex', pi_contact = '$contact', 
												pi_nationality = '$nationality', pi_civil_status = '$civil_status', mh_date_examination = '$date_exam', mh_allergies_food_medication = '$allergies_food_medication', 
												mh_past_illness = '$past_illness', mh_present_medication = '$present_medication', mh_chief = '$chief', mh_history = '$history', mh_symp_diag = '$symp_diag', mh_treat = '$treat', mh_physical = '$physical', mh_physician = '$physician', mh_license = '$license', 
												vs_bp = '$bp', vs_hr = '$hr', vs_rr = '$rr', vs_t = '$t', vs_spo2 = '$spo2', vs_rbs = '$rbs' WHERE pi_id = '$id'");
		$sql->execute();				
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Medical Record Modified', '$name', 'Medical Record', '$id', '$userId', '$today_date1')");
		$log->execute();
               
		header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
	}
}


function modify_history(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$date_exam = $_POST['mh_date_exam'];
	$allergies_food_medication = mysqli_real_escape_string($link, $_POST['mh_afm']);
	$past_illness = mysqli_real_escape_string($link, $_POST['mh_past_ill']);
	$present_medication = mysqli_real_escape_string($link, $_POST['mh_pres_med']);
	$chief = mysqli_real_escape_string($link, $_POST['mh_chief']);
	$history = mysqli_real_escape_string($link, $_POST['mh_history']);
	$symp_diag = mysqli_real_escape_string($link, $_POST['mh_symp_diag']);
	$treat = mysqli_real_escape_string($link, $_POST['mh_treat']);
	$physical = mysqli_real_escape_string($link, $_POST['mh_physical']);
	$physician = mysqli_real_escape_string($link, $_POST['mh_physician']);
	$license = mysqli_real_escape_string($link, $_POST['mh_license']);

	$bp = mysqli_real_escape_string($link, $_POST['vs_bp']);
	$hr = mysqli_real_escape_string($link, $_POST['vs_hr']);
	$rr = mysqli_real_escape_string($link, $_POST['vs_rr']);
	$t = mysqli_real_escape_string($link, $_POST['vs_t']);
	$spo2 = mysqli_real_escape_string($link, $_POST['vs_spo2']);
	$rbs = mysqli_real_escape_string($link, $_POST['vs_rbs']);

	if (!empty($_FILES['fileImage']['name'])) {
		$images = uploadimage('fileImage', SRV_ROOT . 'images/medical/');

		$mainImage = $images['image'];

		$sql = $conn->prepare("UPDATE tbl_med_history SET history_date_examination = '$date_exam', history_allergies_food_medication = '$allergies_food_medication', 
															history_past_illness = '$past_illness', history_present_medication = '$present_medication', history_chief = '$chief', history_history = '$history', history_symp_diag = '$symp_diag', history_treat = '$treat', history_physical = '$physical', history_image = '$mainImage', history_physician = '$physician', history_license = '$license', 
															history_bp = '$bp', history_hr = '$hr', history_rr = '$rr', history_t = '$t', history_spo2 = '$spo2', history_rbs = '$rbs' WHERE med_id = '$id'");
		$sql->execute();

		header("Location: index.php?view=modify_history&id=$id&error=Modified Successfully");
	}else{
		$sql = $conn->prepare("UPDATE tbl_med_history SET history_date_examination = '$date_exam', history_allergies_food_medication = '$allergies_food_medication', 
															history_past_illness = '$past_illness', history_present_medication = '$present_medication', history_chief = '$chief', history_history = '$history', history_symp_diag = '$symp_diag', history_treat = '$treat', history_physical = '$physical', history_physician = '$physician', history_license = '$license', 
															history_bp = '$bp', history_hr = '$hr', history_rr = '$rr', history_t = '$t', history_spo2 = '$spo2', history_rbs = '$rbs' WHERE med_id = '$id'");
		$sql->execute();

		header("Location: index.php?view=modify_history&id=$id&error=Modified Successfully");
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
	
	$sel = $conn->prepare("SELECT * FROM tbl_patient_info WHERE pi_id = '$id'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$patient = $sel_data['pi_name'];
	
    // delete the category. set is_deleted to 1 as deleted;
	$sql = $conn->prepare("UPDATE tbl_patient_info SET is_deleted = '1' WHERE pi_id = '$id'");
	$sql->execute();

	$his = $conn->prepare("UPDATE tbl_med_history SET is_deleted = '1' WHERE pi_id = '$id'");
	$his->execute();
	
	/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Medical Record deleted', '$patient', 'Medical Record', '$id', '$userId', '$today_date1')");
	$log->execute();
       
	header("Location: index.php?error=Deleted successfully");
}


function delete_history(){
	include '../global-library/database.php';

	$userId = $_SESSION['user_id'];
	
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }

	$sel = $conn->prepare("SELECT * FROM tbl_patient_info p, tbl_med_history m WHERE m.med_id = '$id' AND m.pi_id = p.pi_id");
	$sel->execute();
	$sel_data = $sel->fetch();

	$patient = $sel_data['pi_name'];

	$sql = $conn->prepare("UPDATE tbl_med_history SET is_deleted = '1' WHERE med_id = '$id'");
	$sql->execute();

	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Medical Record History deleted', '$patient', 'Medical Record History', '$id', '$userId', '$today_date1')");
	$log->execute();
       
	header("Location: index.php?error=Deleted successfully");
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

?>