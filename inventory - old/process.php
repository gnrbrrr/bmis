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
	$item = mysqli_real_escape_string($link, $_POST['item']);
    $itemDesc = mysqli_real_escape_string($link, $_POST['item_desc']);
    $serialNo = mysqli_real_escape_string($link, $_POST['serialno']);
	$amt = $_POST['amt'];
	$dop = $_POST['datep'];
	$condition = $_POST['condition'];
	$qty = $_POST['qty'];

	
	$chk = $conn->prepare("SELECT * FROM tbl_inventory WHERE in_itemdesc = '$itemDesc' AND in_serialno = '$serialNo' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=Complaint already exist! Data entry failed.');              
	}else{
		
		//echo $itemdesc . ' ' . $serialno . ' ' . $amt . ' ' . $dateofpurchase . ' ' . $condition . ' ' . $quantity;
        $sql = $conn->prepare("INSERT INTO tbl_inventory (in_item, in_itemdesc, in_serialno, in_amt, in_dop, in_condition, in_qty, is_deleted) 
													VALUES ('$item', '$itemDesc', '$serialNo', '$amt', '$dop', '$condition', '$qty', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_inventory SET uid = '$uid' WHERE in_id = '$id'");
		$up->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Inventory added', '$itemDesc', 'Inventory', '$uid', '$userId', '$today_date1')");
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
	$item = mysqli_real_escape_string($link, $_POST['item']);
    $itemDesc = mysqli_real_escape_string($link, $_POST['item_desc']);
    $serialNo = mysqli_real_escape_string($link, $_POST['serialno']);
	$amt = $_POST['amt'];
	$dop = $_POST['datep'];
	$condition = $_POST['condition'];
	$qty = $_POST['qty'];
	
	
	$chk = $conn->prepare("SELECT * FROM tbl_inventory WHERE in_itemdesc = '$itemDesc' AND in_serialno = '$serialNo' AND uid != '$id' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header("Location: index.php?view=modify&id=$id&error=Client already exist! Data entry failed.");
	}else{
    
		$sql = $conn->prepare("UPDATE tbl_inventory SET in_item = '$item', in_itemdesc = '$itemDesc', in_serialno = '$serialNo', in_amt = '$amt', in_dop = '$dop', in_condition = '$condition', in_qty = '$qty' WHERE uid = '$id'");
		$sql->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Inventory modified', '$itemDesc', 'Inventory', '$id', '$userId', '$today_date1')");
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
	
	$sel = $conn->prepare("SELECT * FROM tbl_inventory WHERE uid = '$id'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$itemDesc = $sel_data['in_itemdesc'];
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_inventory SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
	
	/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Inventory deleted', '$itemDesc', 'Inventory', '$id', '$userId', '$today_date1')");
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