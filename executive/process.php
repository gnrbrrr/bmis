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
	
    $itemNo = mysqli_real_escape_string($link, $_POST['item_no']);
	$executive_no = mysqli_real_escape_string($link, $_POST['ex_no']);
	$title = mysqli_real_escape_string($link, $_POST['title']);
	$dateAppr = $_POST['date_approved'];
	$Remarks = mysqli_real_escape_string($link, $_POST['remarks']);
	$committee = mysqli_real_escape_string($link, $_POST['committee']);

	$date_approve = date("Y-m-d", strtotime($dateAppr));



	$images = uploadimage('fileImage', SRV_ROOT . 'images/executive_order/');

	$mainImage = $images['image'];

	
        $sql = $conn->prepare("INSERT INTO tbl_executive (ex_itemno, ex_no, ex_title, ex_date, ex_remarks, ex_committee, image, is_deleted) 
													VALUES ('$itemNo', '$executive_no', '$title', '$date_approve', '$Remarks', '$committee', '$mainImage', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
    
		header('Location: index.php?view=add&error=Added successfully');
		
	
}



/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';
	$id = $_POST['id'];
    $itemNo = mysqli_real_escape_string($link, $_POST['item_no']);
	$excutive_no = mysqli_real_escape_string($link, $_POST['ex_no']);
	$title = mysqli_real_escape_string($link, $_POST['title']);
	$dateAppr = $_POST['date_approved'];
	$Remarks = mysqli_real_escape_string($link, $_POST['remarks']);
	$committee = mysqli_real_escape_string($link, $_POST['committee']);

	$date_approve = date("Y-m-d", strtotime($dateAppr));


	if (!empty($_FILES['fileImage']['name'])) {
		$images = uploadimage('fileImage', SRV_ROOT . 'images/executive_order/');

		$mainImage = $images['image'];
		
			$sql = $conn->prepare("UPDATE tbl_executive SET ex_itemno = '$itemNo', ex_no = '$excutive_no', ex_title = '$title', 
									ex_date = '$date_approve', ex_committee = '$committee', ex_remarks = '$Remarks', image = '$mainImage' WHERE ex_id = '$id'");
			$sql->execute();
				
			header("Location: index.php?view=modify&id=$id&error=Modified successfully");
	}else{
		$sql = $conn->prepare("UPDATE tbl_executive SET ex_itemno = '$itemNo', ex_no = '$excutive_no', ex_title = '$title', 
								ex_date = '$dateAppr', ex_committee = '$committee', ex_remarks = '$Remarks' WHERE ex_id = '$id'");
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
	$sql = $conn->prepare("UPDATE tbl_executive SET is_deleted = '1' WHERE ex_id = '$id'");
	$sql->execute();
       
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

