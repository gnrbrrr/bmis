<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'registration' :
        registration();
        break;
      
   
    default :
        // if action is not defined or unknown
        // move to main category page
        header('Location: index.php');
}


/*
    Add Data
*/
function registration()
{
	include 'global-library/database.php';
	$fname = $_POST['fname'];    
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	
	$images = uploadimage('fileImage', SRV_ROOT . 'images/registration/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];
	
		$sql = $conn->prepare("INSERT INTO bs_registration (firstname, lastname, middlename, image, thumbnail, date_registered) VALUES ('$fname', '$lname', '$mname', '$mainImage', '$thumbnail', '$today_date1')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE bs_registration SET uid = '$uid' WHERE reg_id = '$id'");
		$up->execute();
    
		header('Location: registration.php?view=add&error=Registration Successful. Your account will be verified within 24 hours. Thank You!');
}

/*
	Upload an image and return the uploaded image name
*/
function uploadimage($inputName, $uploadDir)
{
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

?>