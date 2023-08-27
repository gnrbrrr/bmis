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
	
	$med_rsdntname = $_POST['res_name'];
    $med_rqst = $_POST['med_rqst'];
	$med_qty = $_POST['med_qty'];
	$date_rqst = $_POST['datep'];
	$condition = $_POST['condition'];
	$qty = $_POST['qty'];
	$remarks = $_POST['remarks'];
	
	$sel = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$med_rsdntname'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$resident = $sel_data['firstname'] . ' ' . $sel_data['middlename'] . ' ' . $sel_data['lastname'];

        $sql = $conn->prepare("INSERT INTO tbl_medical_record (res_id, med_req, med_qty, med_datereq, remarks, is_deleted) 
													VALUES ('$med_rsdntname', '$med_rqst', '$med_qty', '$date_rqst', '$remarks', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_medical_record SET uid = '$uid' WHERE md_id = '$id'");
		$up->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Medical Record added', '$resident', 'Medical Record', '$uid', '$userId', '$today_date1')");
		$log->execute();
    
		header('Location: index.php?view=add&error=Added successfully');
	
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
    $med_rsdntname = $_POST['res_name'];
    $med_rqst = $_POST['med_rqst'];
	$med_qty = $_POST['med_qty'];
	$date_rqst = $_POST['datep'];
	
	$sel = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$med_rsdntname'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$resident = $sel_data['firstname'] . ' ' . $sel_data['middlename'] . ' ' . $sel_data['lastname'];
	
	
	$chk = $conn->prepare("SELECT * FROM tbl_medical_record WHERE res_id = '$med_rsdntname' AND med_req = '$med_rqst' AND uid != '$id' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header("Location: index.php?view=modify&id=$id&error=Client already exist! Data entry failed.");
	}else{
    
		$sql = $conn->prepare("UPDATE tbl_medical_record SET res_id = '$med_rsdntname', med_req = '$med_rqst', med_qty = '$med_qty', med_datereq = '$date_rqst' WHERE uid = '$id'");
		$sql->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Medical Record modified', '$resident', 'Medical Record', '$id', '$userId', '$today_date1')");
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
	
	$del = $conn->prepare("SELECT * FROM tbl_medical_record WHERE uid = '$id'");
	$del->execute();
	$del_data = $del->fetch();
	
	$itemDesc = $del_data['res_id'];
	
	$sel = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$itemDesc'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$resident = $sel_data['firstname'] . ' ' . $sel_data['middlename'] . ' ' . $sel_data['lastname'];
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_medical_record SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
	
	/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Medical Record deleted', '$resident', 'Medical Record', '$id', '$userId', '$today_date1')");
		$log->execute();
       
	header("Location: index.php?error=Deleted successfully");
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