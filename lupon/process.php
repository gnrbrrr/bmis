<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        add_data();
        break;
	
    case 'add_summon' :
        add_sum_data();
        break;
      
    case 'modify' :
        modify_data();
        break;
      
    case 'modify_summon' :
        modify_sum_data();
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
	$lpn_complaints1_firstname = mysqli_real_escape_string($link, $_POST['complaints1_firstname']);
	$lpn_complaints1_middlename = mysqli_real_escape_string($link, $_POST['complaints1_middlename']);
	$lpn_complaints1_lastname = mysqli_real_escape_string($link, $_POST['complaints1_lastname']);

	$lpn_complaints2_firstname = mysqli_real_escape_string($link, $_POST['complaints2_firstname']);
	$lpn_complaints2_middlename = mysqli_real_escape_string($link, $_POST['complaints2_middlename']);
	$lpn_complaints2_lastname = mysqli_real_escape_string($link, $_POST['complaints2_lastname']);

	$lpn_complaints3_firstname = mysqli_real_escape_string($link, $_POST['complaints3_firstname']);
	$lpn_complaints3_middlename = mysqli_real_escape_string($link, $_POST['complaints3_middlename']);
	$lpn_complaints3_lastname = mysqli_real_escape_string($link, $_POST['complaints3_lastname']);

	$lpn_respondents1_firstname = mysqli_real_escape_string($link, $_POST['respondent1_firstname']);
	$lpn_respondents1_middlename = mysqli_real_escape_string($link, $_POST['respondent1_middlename']);
	$lpn_respondents1_lastname = mysqli_real_escape_string($link, $_POST['respondent1_lastname']);

	$lpn_respondents2_firstname = mysqli_real_escape_string($link, $_POST['respondent2_firstname']);
	$lpn_respondents2_middlename = mysqli_real_escape_string($link, $_POST['respondent2_middlename']);
	$lpn_respondents2_lastname = mysqli_real_escape_string($link, $_POST['respondent2_lastname']);

	$lpn_respondents3_firstname = mysqli_real_escape_string($link, $_POST['respondent3_firstname']);
	$lpn_respondents3_middlename = mysqli_real_escape_string($link, $_POST['respondent3_middlename']);
	$lpn_respondents3_lastname = mysqli_real_escape_string($link, $_POST['respondent3_lastname']);
	
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
        $sql = $conn->prepare("INSERT INTO tbl_lupon (lpn_usp_brgy_blg, lpn_ukol_sa, lpn_date, lpn_complaints1_firstname, lpn_complaints1_middlename, lpn_complaints1_lastname, lpn_complaints2_firstname, lpn_complaints2_middlename, lpn_complaints2_lastname, lpn_complaints3_firstname, lpn_complaints3_middlename, lpn_complaints3_lastname, lpn_respondent1_firstname, lpn_respondent1_middlename, lpn_respondent1_lastname, lpn_respondent2_firstname, lpn_respondent2_middlename, lpn_respondent2_lastname, lpn_respondent3_firstname, lpn_respondent3_middlename, lpn_respondent3_lastname, lpn_contactno, lpn_contactno1, lpn_tirahan_sumbong, lpn_tirahan_sumbong1, kasunduan1, kasunduan2, kasunduan3, kasunduan4, kasunduan5, lpn_narrative, is_deleted) 
													VALUES ('$lpn_usp_brgy_blg', '$lpn_ukol_sa', '$lpn_date', '$lpn_complaints1_firstname', '$lpn_complaints1_middlename', '$lpn_complaints1_lastname', '$lpn_complaints2_firstname', '$lpn_complaints2_middlename', '$lpn_complaints2_lastname', '$lpn_complaints3_firstname', '$lpn_complaints3_middlename', '$lpn_complaints3_lastname', '$lpn_respondents1_firstname', '$lpn_respondents1_middlename', '$lpn_respondents1_lastname', '$lpn_respondents2_firstname', '$lpn_respondents2_middlename', '$lpn_respondents2_lastname', '$lpn_respondents3_firstname', '$lpn_respondents3_middlename', '$lpn_respondents3_lastname', '$lpn_contactno', '$lpn_contactno1', '$lpn_tirahan_sumbong', '$lpn_tirahan_sumbong1', '$kasunduan1', '$kasunduan2', '$kasunduan3', '$kasunduan4', '$kasunduan5', '$lpn_narrative',  '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_lupon SET uid = '$uid' WHERE lpn_id = '$id'");
		$up->execute();
    
		header('Location: index.php?view=lupon_add&error=Added successfully');
			
}

/*
    Add Data
*/
function add_sum_data()
{
	include '../global-library/database.php';

	if(isset($_POST['id'])){
		$lpn_id = $_POST['id'];
	}else{
		$lpn_id = $_GET['id'];
	}

	$usp_brgy_blg = mysqli_real_escape_string($link, $_POST['usp_brgy_blg']);
    $ukol_sa = mysqli_real_escape_string($link, $_POST['ukol_sa']);
	$lpn_date = $_POST['date'];
	$date_sum = date("Y-m-d", strtotime($lpn_date));

	$time = $_POST['time'];
	$time_reformat = date("g:i A", strtotime($time));

	$complaints1_firstname = mysqli_real_escape_string($link, $_POST['complaints1_firstname']);
	$complaints1_middlename = mysqli_real_escape_string($link, $_POST['complaints1_middlename']);
	$complaints1_lastname = mysqli_real_escape_string($link, $_POST['complaints1_lastname']);

	$complaints2_firstname = mysqli_real_escape_string($link, $_POST['complaints2_firstname']);
	$complaints2_middlename = mysqli_real_escape_string($link, $_POST['complaints2_middlename']);
	$complaints2_lastname = mysqli_real_escape_string($link, $_POST['complaints2_lastname']);

	$complaints3_firstname = mysqli_real_escape_string($link, $_POST['complaints3_firstname']);
	$complaints3_middlename = mysqli_real_escape_string($link, $_POST['complaints3_middlename']);
	$complaints3_lastname = mysqli_real_escape_string($link, $_POST['complaints3_lastname']);

	$respondents1_firstname = mysqli_real_escape_string($link, $_POST['respondent1_firstname']);
	$respondents1_middlename = mysqli_real_escape_string($link, $_POST['respondent1_middlename']);
	$respondents1_lastname = mysqli_real_escape_string($link, $_POST['respondent1_lastname']);

	$respondents2_firstname = mysqli_real_escape_string($link, $_POST['respondent2_firstname']);
	$respondents2_middlename = mysqli_real_escape_string($link, $_POST['respondent2_middlename']);
	$respondents2_lastname = mysqli_real_escape_string($link, $_POST['respondent2_lastname']);

	$respondents3_firstname = mysqli_real_escape_string($link, $_POST['respondent3_firstname']);
	$respondents3_middlename = mysqli_real_escape_string($link, $_POST['respondent3_middlename']);
	$respondents3_lastname = mysqli_real_escape_string($link, $_POST['respondent3_lastname']);

	$contactno = $_POST['contactno'];
	$contactno1 = $_POST['contactno1'];
	$tirahan_sumbong = mysqli_real_escape_string($link, $_POST['tirahan_sumbong']);
	$tirahan_sumbong1 = mysqli_real_escape_string($link, $_POST['tirahan_sumbong1']);
	$kasunduan1 = mysqli_real_escape_string($link, $_POST['kasunduan1']);
	$kasunduan2 = mysqli_real_escape_string($link, $_POST['kasunduan2']);
	$kasunduan3 = mysqli_real_escape_string($link, $_POST['kasunduan3']);
	$kasunduan4 = mysqli_real_escape_string($link, $_POST['kasunduan4']);
	$kasunduan5 = mysqli_real_escape_string($link, $_POST['kasunduan5']);
	$narrative = $_POST['narrative'];
	

	
		//echo $itemdesc . ' ' . $serialno . ' ' . $amt . ' ' . $dateofpurchase . ' ' . $condition . ' ' . $quantity;
        $sql = $conn->prepare("INSERT INTO tbl_lupon_summons (lpn_id, bldg_summon, ukol_summon, date_summon, time_summon, complainant1_firstname, complainant1_middlename, complainant1_lastname, complainant2_firstname, complainant2_middlename, complainant2_lastname, complainant3_firstname, complainant3_middlename, complainant3_lastname, respondent1_firstname, respondent1_middlename, respondent1_lastname, respondent2_firstname, respondent2_middlename, respondent2_lastname,
														 respondent3_firstname, respondent3_middlename, respondent3_lastname, tirahan_sumbong, tirahan_sumbong1, contactno, contactno1, kasunduan1, kasunduan2, kasunduan3, kasunduan4, kasunduan5, narrative, is_deleted) 
													VALUES ('$lpn_id', '$usp_brgy_blg', '$ukol_sa', '$date_sum', '$time_reformat', '$complaints1_firstname', '$complaints1_middlename', '$complaints1_lastname', '$complaints2_firstname', '$complaints2_middlename', '$complaints2_lastname', '$complaints3_firstname', '$complaints3_middlename', '$complaints3_lastname', '$respondents1_firstname', '$respondents1_middlename', '$respondents1_lastname',
																'$respondents2_firstname', '$respondents2_middlename','$respondents2_lastname', '$respondents3_firstname', '$respondents3_middlename','$respondents3_lastname','$contactno','$contactno1','$tirahan_sumbong','$tirahan_sumbong1',
																'$kasunduan1','$kasunduan2','$kasunduan3','$kasunduan4','$kasunduan5','$narrative','0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
    
		header("Location: index.php?view=detail&error=Added Successfully&id=$lpn_id");
			
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
	$lpn_complaints1_firstname = mysqli_real_escape_string($link, $_POST['complaints1_firstname']);
	$lpn_complaints1_middlename = mysqli_real_escape_string($link, $_POST['complaints1_middlename']);
	$lpn_complaints1_lastname = mysqli_real_escape_string($link, $_POST['complaints1_lastname']);

	$lpn_complaints2_firstname = mysqli_real_escape_string($link, $_POST['complaints2_firstname']);
	$lpn_complaints2_middlename = mysqli_real_escape_string($link, $_POST['complaints2_middlename']);
	$lpn_complaints2_lastname = mysqli_real_escape_string($link, $_POST['complaints2_lastname']);

	$lpn_complaints3_firstname = mysqli_real_escape_string($link, $_POST['complaints3_firstname']);
	$lpn_complaints3_middlename = mysqli_real_escape_string($link, $_POST['complaints3_middlename']);
	$lpn_complaints3_lastname = mysqli_real_escape_string($link, $_POST['complaints3_lastname']);
	
	$lpn_respondents1_firstname = mysqli_real_escape_string($link, $_POST['respondent1_firstname']);
	$lpn_respondents1_middlename = mysqli_real_escape_string($link, $_POST['respondent1_middlename']);
	$lpn_respondents1_lastname = mysqli_real_escape_string($link, $_POST['respondent1_lastname']);

	$lpn_respondents2_firstname = mysqli_real_escape_string($link, $_POST['respondent2_firstname']);
	$lpn_respondents2_middlename = mysqli_real_escape_string($link, $_POST['respondent2_middlename']);
	$lpn_respondents2_lastname = mysqli_real_escape_string($link, $_POST['respondent2_lastname']);

	$lpn_respondents3_firstname = mysqli_real_escape_string($link, $_POST['respondent3_firstname']);
	$lpn_respondents3_middlename = mysqli_real_escape_string($link, $_POST['respondent3_middlename']);
	$lpn_respondents3_lastname = mysqli_real_escape_string($link, $_POST['respondent3_lastname']);
	
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
    
		$sql = $conn->prepare("UPDATE tbl_lupon SET lpn_usp_brgy_blg = '$lpn_usp_brgy_blg', lpn_ukol_sa = '$lpn_ukol_sa', lpn_date = '$lpn_date', lpn_complaints1_firstname = '$lpn_complaints1_firstname', lpn_complaints1_middlename = '$lpn_complaints1_middlename', lpn_complaints1_lastname = '$lpn_complaints1_lastname', lpn_complaints2_firstname = '$lpn_complaints2_firstname', lpn_complaints2_middlename = '$lpn_complaints2_middlename', lpn_complaints2_lastname = '$lpn_complaints2_lastname',
																			 lpn_complaints3_firstname = '$lpn_complaints3_firstname', lpn_complaints3_middlename = '$lpn_complaints3_middlename', lpn_complaints3_lastname = '$lpn_complaints3_lastname', lpn_respondent1_firstname = '$lpn_respondents1_firstname', lpn_respondent1_middlename = '$lpn_respondents1_middlename', lpn_respondent1_lastname = '$lpn_respondents1_lastname', lpn_respondent2_firstname = '$lpn_respondents2_firstname', lpn_respondent2_middlename = '$lpn_respondents2_middlename', lpn_respondent2_lastname = '$lpn_respondents2_lastname', lpn_respondent3_firstname = '$lpn_respondents3_firstname', lpn_respondent3_middlename = '$lpn_respondents3_middlename', lpn_respondent3_lastname = '$lpn_respondents3_lastname', lpn_contactno = '$lpn_contactno', lpn_contactno1 = '$lpn_contactno1', lpn_tirahan_sumbong = '$lpn_tirahan_sumbong', lpn_tirahan_sumbong1 = '$lpn_tirahan_sumbong1', kasunduan1 = '$kasunduan1', kasunduan2 = '$kasunduan2', kasunduan3 = '$kasunduan3', kasunduan4 = '$kasunduan4', kasunduan5 = '$kasunduan5', lpn_narrative = '$lpn_narrative' WHERE lpn_id = '$id'");
		$sql->execute();
               
		header("Location: index.php?view=modify&id=$id&error=Modified successfully");
	
	
}

function modify_sum_data()
{
	include '../global-library/database.php';

	if(isset($_POST['id'])){
		$sm_id = $_POST['id'];
	}else{
		$sm_id = $_GET['id'];
	}

	$lpn_date = $_POST['date'];
	$date_sum = date("Y-m-d", strtotime($lpn_date));

	$time = $_POST['time'];
	$time_reformat = date("g:i A", strtotime($time));
    
		$sql = $conn->prepare("UPDATE tbl_lupon_summons SET date_summon = '$date_sum', time_summon = '$time_reformat' WHERE sm_id = '$sm_id'");
		$sql->execute();
               
		header("Location: index.php?view=modify_summon&id=$sm_id&error=Modified Successfully");
	
	
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