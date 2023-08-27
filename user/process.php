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
   $fname = $_POST['fname'];    
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$contactno = $_POST['contactno'];
	
	$images = uploadimage('fileImage', SRV_ROOT . 'images/user/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];
	
	$chk = $conn->prepare("SELECT * FROM bs_user WHERE lastname = '$lname' AND firstname = '$fname' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=User already exist! Data entry failed.');              
	}else{
        
		$sql = $conn->prepare("INSERT INTO bs_user (firstname, lastname, email, username, password, pass_text, image, thumbnail, contactno, is_deleted) VALUES ('$fname', '$lname', '$email', '$username', md5('$password'), '$password', '$mainImage', '$thumbnail', '$contactno', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE bs_user SET uid = '$uid' WHERE user_id = '$id'");
		$up->execute();
    
		header('Location: index.php?view=add&error=Added successfully');
	}
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

/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';
    $id       = $_POST['id'];
    $fname = $_POST['fname'];    
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$contactno = $_POST['contactno'];
	
	$res = $_POST['res'];
	$bus = $_POST['bus'];
	$doc = $_POST['doc'];
    $pay = $_POST['pay'];
	$cas = $_POST['cas'];
	$vaw = $_POST['vaw'];
	$bcp = $_POST['bcp'];
	$blo = $_POST['blo'];
	$lup = $_POST['lup'];
	$bad = $_POST['bad'];

	$min = $_POST['min'];
	$leg = $_POST['leg'];
	$reso = $_POST['reso'];
	$ordi = $_POST['ordi'];
	$exec = $_POST['exec'];
	$inv = $_POST['inv'];
	$bor = $_POST['bor'];
	$medi = $_POST['medi'];
	$med = $_POST['med'];
	$cov = $_POST['cov'];
	$rescue = $_POST['rescue'];
	$veh = $_POST['veh'];
	

	$fac = $_POST['fac'];
	$pro = $_POST['pro'];
	
	
	$images = uploadimage('fileImage', SRV_ROOT . 'images/user/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];
	
	// if uploading a new image
	// remove old image
	if ($mainImage != '') {
		_deleteImage($id);

		$mainImage = "'$mainImage'";
		$thumbnail = "'$thumbnail'";
	} else {
		// if we're not updating the image
		// make sure the old path remain the same
		// in the database
		$mainImage = 'image';
		$thumbnail = 'thumbnail';
	}
	
	$chk = $conn->prepare("SELECT * FROM bs_user WHERE lastname = '$lname' AND firstname = '$fname' AND uid != '$id' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header("Location: index.php?view=profile&id=$id&error=User already exist! Data entry failed.");
	}else{
    
		$sql = $conn->prepare("UPDATE bs_user SET firstname = '$fname', lastname = '$lname', email = '$email', username = '$username', password = md5('$password'), pass_text = '$password',
						contactno = '$contactno', image = $mainImage, thumbnail = $thumbnail, 
						is_resident_access = '$res', is_business_access = '$bus', is_document_access = '$doc', is_payment_access = '$pay', is_cases_access = '$cas', is_vawc_access = '$vaw', is_bcpc_access = '$bcp', 
						is_blotter_access = '$blo',is_lupon_access = '$lup', is_badac_access = '$bad', is_minutes_access = '$min', is_legislative_access = '$leg', is_resolution_access = '$reso', is_ordinance_access = '$ordi', 
						is_executive_access = '$exec', is_inventory_access = '$inv', is_borrow_access = '$bor', is_medicine_access = '$medi', is_medical_access = '$med', is_covid_access = '$cov', is_rescue_access = '$rescue', 
						is_vehicle_access = '$veh', is_facility_access = '$fac', is_project_access = '$pro' WHERE uid = '$id'");
		$sql->execute();
               
		header("Location: index.php?view=modify&id=$id&error=Modified successfully");
	
	}
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
	$sql = $conn->prepare("UPDATE bs_user SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
       
	header("Location: index.php?error=Deleted successfully");
}


function _deleteImage($id)
{
	include '../global-library/database.php';
	// we will return the status
	// whether the image deleted successfully
	$deleted = false;
	
	$sql = $conn->prepare("SELECT image, thumbnail FROM bs_user WHERE uid = '$id'");
	$sql->execute();

	if ($sql->rowCount() > 0) {
		$sql_data = $sql->fetch();		

		if ($sql_data['image'] && $sql_data['thumbnail']) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/user/$sql_data[image]");
			$deleted = @unlink(SRV_ROOT . "images/user/$sql_data[thumbnail]");
		}
	}

	return $deleted;
}

?>