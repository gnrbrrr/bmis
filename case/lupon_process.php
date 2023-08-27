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
	$lpn_usp_brgy_blg = mysqli_real_escape_string($link, $_POST['usp_brgy_blg']);
    $lpn_ukol_sa = mysqli_real_escape_string($link, $_POST['ukol_sa']);
	$lpn_date = $_POST['date'];
	$lpn_complaints = mysqli_real_escape_string($link, $_POST['complaints']);
	$lpn_respondents = mysqli_real_escape_string($link, $_POST['respondents']);
	$lpn_contactno = $_POST['contactno'];
	$lpn_contactno1 = $_POST['contactno1'];
	$lpn_tirahan_sumbong = mysqli_real_escape_string($link, $_POST['tirahan_sumbong']);
	$lpn_tirahan_sumbong1 = mysqli_real_escape_string($link, $_POST['tirahan_sumbong1']);
	$kasunduan1 = mysqli_real_escape_string($link, $_POST['kasunduan1']);
	$kasunduan2 = mysqli_real_escape_string($link, $_POST['kasunduan2']);
	$kasunduan3 = mysqli_real_escape_string($link, $_POST['kasunduan3']);
	$kasunduan4 = mysqli_real_escape_string($link, $_POST['kasunduan4']);
	$kasunduan5 = mysqli_real_escape_string($link, $_POST['kasunduan5']);
	$lpn_narrative = $_POST['narrative'];
	

	
		//echo $itemdesc . ' ' . $serialno . ' ' . $amt . ' ' . $dateofpurchase . ' ' . $condition . ' ' . $quantity;
        $sql = $conn->prepare("INSERT INTO tbl_lupon (lpn_usp_brgy_blg, lpn_ukol_sa, lpn_date, lpn_complaints, lpn_respondents, lpn_contactno, lpn_contactno1, lpn_tirahan_sumbong, lpn_tirahan_sumbong1, kasunduan1, kasunduan2, kasunduan3, kasunduan4, kasunduan5, lpn_narrative, is_deleted) 
													VALUES ('$lpn_usp_brgy_blg', '$lpn_ukol_sa', '$lpn_date', '$lpn_complaints', '$lpn_respondents', '$lpn_contactno', '$lpn_contactno1', '$lpn_tirahan_sumbong', '$lpn_tirahan_sumbong1', '$kasunduan1', '$kasunduan2', '$kasunduan3', '$kasunduan4', '$kasunduan5', '$lpn_narrative',  '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_lupon SET uid = '$uid' WHERE lpn_id = '$id'");
		$up->execute();
    
		header('Location: index.php?view=lupon_add&error=Added successfully');
			
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
    $lpn_usp_brgy_blg = mysqli_real_escape_string($link, $_POST['usp_brgy_blg']);
    $lpn_ukol_sa = mysqli_real_escape_string($link, $_POST['ukol_sa']);
	$lpn_date = $_POST['date'];
	$lpn_complaints = mysqli_real_escape_string($link, $_POST['complaints']);
	$lpn_respondents = mysqli_real_escape_string($link, $_POST['respondents']);
	$lpn_contactno = $_POST['contactno'];
	$lpn_contactno1 = $_POST['contactno1'];
	$lpn_tirahan_sumbong = mysqli_real_escape_string($link, $_POST['tirahan_sumbong']);
	$lpn_tirahan_sumbong1 = mysqli_real_escape_string($link, $_POST['tirahan_sumbong1']);
	$kasunduan1 = mysqli_real_escape_string($link, $_POST['kasunduan1']);
	$kasunduan2 = mysqli_real_escape_string($link, $_POST['kasunduan2']);
	$kasunduan3 = mysqli_real_escape_string($link, $_POST['kasunduan3']);
	$kasunduan4 = mysqli_real_escape_string($link, $_POST['kasunduan4']);
	$kasunduan5 = mysqli_real_escape_string($link, $_POST['kasunduan5']);
	$lpn_narrative = $_POST['narrative'];
    
		$sql = $conn->prepare("UPDATE tbl_lupon SET lpn_usp_brgy_blg = '$lpn_usp_brgy_blg', lpn_ukol_sa = '$lpn_ukol_sa', lpn_date = '$lpn_date', lpn_complaints = '$lpn_complaints', lpn_respondents = '$lpn_respondents', lpn_contactno = '$lpn_contactno', lpn_contactno1 = '$lpn_contactno1', lpn_tirahan_sumbong = '$lpn_tirahan_sumbong', lpn_tirahan_sumbong1 = '$lpn_tirahan_sumbong1', kasunduan1 = '$kasunduan1', kasunduan2 = '$kasunduan2', kasunduan3 = '$kasunduan3', kasunduan4 = '$kasunduan4', kasunduan5 = '$kasunduan5', lpn_narrative = '$lpn_narrative' WHERE uid = '$id'");
		$sql->execute();
               
		header("Location: index.php?view=lupon_modify&id=$id&error=Modified successfully");
	
	
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
	$sql = $conn->prepare("UPDATE tbl_lupon SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
       
	header("Location: index.php?view=lupon_list&error=Deleted successfully");
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