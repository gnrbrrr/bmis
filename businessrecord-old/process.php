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
	
    $bname = $_POST['businessname'];
    $tbusiness = $_POST['typeofbusiness'];
	$nbusiness = $_POST['natureofbusiness'];
	$oname = $_POST['ownername'];
	$location = $_POST['location'];
	$contactperson = $_POST['contactperson'];
	$contactnumber = $_POST['contactnumber'];

	
	$chk = $conn->prepare("SELECT * FROM tbl_business WHERE businessname = '$bname' AND typeofbusiness = '$tbusiness' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=Client already exist! Data entry failed.');              
	}else{
        
		$sql = $conn->prepare("INSERT INTO tbl_business (businessname, typeofbusiness, natureofbusiness, ownername, location, contactperson, contactnumber, is_deleted) 
													VALUES ('$bname', '$tbusiness', '$nbusiness', '$oname', '$location', '$contactperson', '$contactnumber', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_business SET uid = '$uid' WHERE b_id = '$id'");
		$up->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Business Record added', '$bname', 'Business Record', '$uid', '$userId', '$today_date1')");
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
    $bname = $_POST['businessname'];
    $tbusiness = $_POST['typeofbusiness'];
	$nbusiness = $_POST['natureofbusiness'];
	$oname = $_POST['ownername'];
	$location = $_POST['location'];
	$contactperson = $_POST['contactperson'];
	$contactnumber = $_POST['contactnumber'];
	
	
	$chk = $conn->prepare("SELECT * FROM tbl_business WHERE typeofbusiness = '$tbusiness' AND businessname = '$bname' AND uid != '$id' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header("Location: index.php?view=modify&id=$id&error=Client already exist! Data entry failed.");
	}else{
    
		$sql = $conn->prepare("UPDATE tbl_business SET businessname = '$bname', typeofbusiness = '$tbusiness', natureofbusiness = '$nbusiness', ownername = '$oname', location = '$location', contactperson = '$contactperson', contactnumber = '$contactnumber' WHERE uid = '$id'");
		$sql->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Business Record modified', '$bname', 'Business Record', '$id', '$userId', '$today_date1')");
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
	
	$sel = $conn->prepare("SELECT * FROM tbl_business WHERE uid = '$id'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$bname = $sel_data['businessname'];
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_business SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
	
	/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Business Record deleted', '$bname', 'Business Record', '$id', '$userId', '$today_date1')");
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