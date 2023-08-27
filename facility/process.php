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
	
	$userId = $_SESSION['user_id'];
	
	$working_num = mysqli_real_escape_string($link, $_POST['working_no']);
	$status = $_POST['stats'];
	$issue_title = mysqli_real_escape_string($link, $_POST['issue_title']);
	$requested = mysqli_real_escape_string($link, $_POST['request_by']);
	$req_date = mysqli_real_escape_string($link, $_POST['request_date']);
	$facility = mysqli_real_escape_string($link, $_POST['facility']);
	$product = mysqli_real_escape_string($link, $_POST['product']);
	$urgency = $_POST['urgency'];
	$location = mysqli_real_escape_string($link, $_POST['location']);

	$requested_date = date("Y-m-d", strtotime($req_date));

	$images = uploadimage('fileImage', SRV_ROOT . 'images/facility/');

	$mainImage = $images['image'];
	
	$chk = $conn->prepare("SELECT * FROM tbl_facility WHERE work_num = '$working_num' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=Record already exist! Data entry failed.');              
	}else{
        
		$sql = $conn->prepare("INSERT INTO tbl_facility (work_num, status, issue_title, req_by, req_date, facility, photo, product, urgency, location, is_deleted) 
													VALUES ('$working_num', '$status', '$issue_title', '$requested', '$requested_date', '$facility', '$mainImage', '$product', '$urgency', '$location', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Facility Record Added', '$issue_title', 'Facilities Management', '$id', '$userId', '$today_date1')");
		$log->execute();
    
		header('Location: index.php?view=add&error=Added Successfully');
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
			$result    = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, 2048); //created image size set to 2k resolution
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

	$working_num = mysqli_real_escape_string($link, $_POST['working_no']);
	$status = $_POST['stats'];
	$issue_title = mysqli_real_escape_string($link, $_POST['issue_title']);
	$requested = mysqli_real_escape_string($link, $_POST['request_by']);
	$req_date = mysqli_real_escape_string($link, $_POST['request_date']);
	$facility = mysqli_real_escape_string($link, $_POST['facility']);
	$product = mysqli_real_escape_string($link, $_POST['product']);
	$urgency = $_POST['urgency'];
	$location = mysqli_real_escape_string($link, $_POST['location']);

	$requested_date = date("Y-m-d", strtotime($req_date));
	

	if (!empty($_FILES['fileImage']['name'])) {
		$images = uploadimage('fileImage', SRV_ROOT . 'images/facility/');

		$mainImage = $images['image'];

		$sql = $conn->prepare("UPDATE tbl_facility SET work_num = '$working_num', status = '$status', issue_title = '$issue_title', req_by = '$requested', req_date = '$requested_date', facility = '$facility', photo = '$mainImage', 
										product = '$product', urgency = '$urgency', location = '$location' WHERE f_id = '$id'");
		$sql->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Facility Record Modified', '$issue_title', 'Facilities Management', '$id', '$userId', '$today_date1')");
		$log->execute();
			
		header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
	}else{
		$sql = $conn->prepare("UPDATE tbl_facility SET work_num = '$working_num', status = '$status', issue_title = '$issue_title', req_by = '$requested', req_date = '$requested_date', facility = '$facility', product = '$product', 
										urgency = '$urgency', location = '$location' WHERE f_id = '$id'");
		$sql->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Facility Record Modified', '$issue_title', 'Facilities Management', '$id', '$userId', '$today_date1')");
		$log->execute();
			
		header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
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
	
	$sel = $conn->prepare("SELECT * FROM tbl_facility WHERE f_id = '$id'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$issue_title = $sel_data['issue_title'];
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_facility SET is_deleted = '1' WHERE f_id = '$id'");
	$sql->execute();
	
	/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Facility deleted', '$issue_title', 'Failities Management', '$id', '$userId', '$today_date1')");
		$log->execute();
       
	header("Location: index.php?error=Deleted Successfully");
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