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
      
    case 'logout' :
        logout_data();
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
	
	$userId = $_SESSION['user_id'];
	
	// $status = $_POST['blot_stats'];
	$status = mysqli_real_escape_string($link, $_POST['status']);
	$blotterno = $_POST['blotter_no'];
	$time_creat = $_POST['time_created'];
	$time_created = date("g:i A", strtotime($time_creat));
    $date_created = $_POST['date_created'];
	$complainant = mysqli_real_escape_string($link, $_POST['complainant']);
	$complainant_address = mysqli_real_escape_string($link, $_POST['complainant_address']);
	$respondent_first = mysqli_real_escape_string($link, $_POST['respondent_first']);
	$respondent_middle = mysqli_real_escape_string($link, $_POST['respondent_middle']);
	$respondent_last = mysqli_real_escape_string($link, $_POST['respondent_last']);
	$respondent_address = mysqli_real_escape_string($link, $_POST['respondent_address']);
	$time_rep = $_POST['time_reported'];
	$time_reported = date("g:i A", strtotime($time_rep));
	$date_reported = $_POST['date_reported'];
	$place = mysqli_real_escape_string($link, $_POST['place']);
	$origin = mysqli_real_escape_string($link, $_POST['origin']);
	$involed = mysqli_real_escape_string($link, $_POST['involed']);
	$facts = mysqli_real_escape_string($link, $_POST['facts']);
	$incident = mysqli_real_escape_string($link, $_POST['incident']);
	$disposition = mysqli_real_escape_string($link, $_POST['disposition']);
	$prepared = mysqli_real_escape_string($link, $_POST['prepared']);
	$created_by = mysqli_real_escape_string($link, $_POST['created_by']);
	
	$chk = $conn->prepare("SELECT * FROM tbl_blotter WHERE complainant = '$complainant' AND respondent_firstname = '$respondent_first' AND respondent_lastname = '$respondent_last' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=Complaint already exist! Data entry failed.');              
	}else{
        
		$sql = $conn->prepare("INSERT INTO tbl_blotter (status, blotter_no, time_created, date_created, complainant, complainant_address, respondent_firstname, respondent_middlename, respondent_lastname, respondent_address, time_reported, date_reported, place, origin, article, facts_case, disposition, natureofcase, prepared, created_by, is_deleted) 
													VALUES ('$status', '$blotterno', '$time_created', '$date_created', '$complainant', '$complainant_address', '$respondent_first', '$respondent_middle', '$respondent_last', '$respondent_address', '$time_reported', '$date_reported', '$place', '$origin', '$involed', '$facts', '$disposition', '$incident', '$prepared', '$created_by', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		// $uid = md5($id);
		
		// $up = $conn->prepare("UPDATE tbl_blotter SET uid = '$uid' WHERE bl_id = '$id'");
		// $up->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Blotter added', '$complainant', 'Blotter', '$id', '$userId', '$today_date1')");
		$log->execute();
    
		header('Location: index.php?view=add&error=Added successfully');
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
	
	$userId = $_SESSION['user_id'];
	
	$id = $_POST['id'];
	$status = mysqli_real_escape_string($link, $_POST['status']);
	$blotterno = $_POST['blotter_no'];
	$time_creat = $_POST['time_created'];
	$time_created = date("g:i A", strtotime($time_creat));
    $date_created = $_POST['date_created'];
	$complainant = mysqli_real_escape_string($link, $_POST['complainant']);
	$complainant_address = mysqli_real_escape_string($link, $_POST['complainant_address']);
	$respondent_first = mysqli_real_escape_string($link, $_POST['respondent_first']);
	$respondent_middle = mysqli_real_escape_string($link, $_POST['respondent_middle']);
	$respondent_last = mysqli_real_escape_string($link, $_POST['respondent_last']);
	$respondent_address = mysqli_real_escape_string($link, $_POST['respondent_address']);
	$time_rep = $_POST['time_reported'];
	$time_reported = date("g:i A", strtotime($time_rep));
	$date_reported = $_POST['date_reported'];
	$place = mysqli_real_escape_string($link, $_POST['place']);
	$origin = mysqli_real_escape_string($link, $_POST['origin']);
	$involed = mysqli_real_escape_string($link, $_POST['involed']);
	$facts = mysqli_real_escape_string($link, $_POST['facts']);
	$incident = mysqli_real_escape_string($link, $_POST['incident']);
	$disposition = mysqli_real_escape_string($link, $_POST['disposition']);
	$prepared = mysqli_real_escape_string($link, $_POST['prepared']);
	$created_by = mysqli_real_escape_string($link, $_POST['created_by']);
	
	
	$chk = $conn->prepare("SELECT * FROM tbl_blotter WHERE respondent_firstname = '$respondent_first' AND respondent_lastname = '$respondent_last' AND complainant = '$complainant' AND bl_id != '$id' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header("Location: index.php?view=modify&id=$id&error=Client already exist! Data entry failed.");
	}else{
    
		$sql = $conn->prepare("UPDATE tbl_blotter SET status = '$status', blotter_no = '$blotterno', time_created = '$time_created', date_created = '$date_created', complainant = '$complainant', complainant_address = '$complainant_address', respondent_firstname = '$respondent_first', respondent_middlename = '$respondent_middle', respondent_lastname = '$respondent_last', respondent_address = '$respondent_address', time_reported = '$time_reported',
									 date_reported = '$date_reported', place = '$place', origin = '$origin', article = '$involed', facts_case = '$facts', disposition = '$disposition', natureofcase = '$incident', 
									 prepared = '$prepared', created_by = '$created_by' WHERE bl_id = '$id'");
		$sql->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Blotter modified', '$complainant', 'Blotter', '$id', '$userId', '$today_date1')");
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
	
	$sel = $conn->prepare("SELECT * FROM tbl_blotter WHERE uid = '$id'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$complainant = $sel_data['complainant'];
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_blotter SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
	
	/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Blotter deleted', '$complainant', 'Blotter', '$id', '$userId', '$today_date1')");
		$log->execute();
       
	header("Location: index.php?error=Deleted successfully");
}

/*
    Logout User
*/
function logout_data()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }
	
	$sel = $conn->prepare("SELECT * FROM bs_user WHERE user_id = '$id'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$user_f = $sel_data['firstname'];
	$user_l = $sel_data['lastname'];
	$user_name = $user_f . " " . $user_l;
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE bs_user SET logged_in = '0' WHERE user_id = '$id'");
	$sql->execute();
	
	/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('User Logged Out', '$user_name', 'User', '$id', '$userId', '$today_date1')");
		$log->execute();
       
	header("Location: index.php?error=User Logged Out Successfully!");
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