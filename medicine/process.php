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
	$remarks = $_POST['remarks'];

	$med = $conn->prepare("SELECT * FROM tbl_med_inventory WHERE medicine = '$med_rqst' AND is_deleted != '1'"); //inventory for the medicine
	$med->execute();
	$med_data = $med->fetch();

	$medicine_consume = $med_data['consumed'];
	$medicine_qty = $med_data['on_hand'];

	if($med_qty > $medicine_qty){ //Checks if quantity request is higher than the remaining medicine stock
		header('Location: index.php?view=add&error=Borrowed Item Exceeds The Item Quantity!');
	}else{
		$total = $medicine_qty - $med_qty; //medicine on stock minus the requested qty
		$consumed = $medicine_consume + $med_qty;

		$minus = $conn->prepare("UPDATE tbl_med_inventory SET consumed = '$consumed', on_hand = '$total' WHERE medicine = '$med_rqst' AND is_deleted != '1'"); //updates on_hand column with the new value
		$minus->execute();

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
    
		$sql = $conn->prepare("UPDATE tbl_medical_record SET res_id = '$med_rsdntname', med_req = '$med_rqst', med_qty = '$med_qty', med_datereq = '$date_rqst' WHERE uid = '$id'"); //updates medical record
		$sql->execute();

		$req_qty = 0;
		$total = 0;

		$checker = $conn->prepare("SELECT * FROM tbl_medical_record WHERE med_req = '$med_rqst' AND is_deleted != '1'"); //calls all records to add all quantities requested on specific medicine
		$checker->execute();
		while($checker_data = $checker->fetch()){
			$req_qty += $checker_data['med_qty']; //increments all quantity
		}

		$checker2 = $conn->prepare("SELECT * FROM tbl_med_inventory WHERE medicine = '$med_rqst' AND is_deleted != '1'"); //calls current medicine data
		$checker2->execute();
		$checker2_data = $checker2->fetch();

		$quantity = $checker2_data['quantity'];

		//quantity of selected medicine minus the total quantity that got consumed
		$total = $quantity - $req_qty;

		$sql = $conn->prepare("UPDATE tbl_med_inventory SET consumed = '$req_qty', on_hand = '$total' WHERE medicine = '$med_rqst'"); //sets the total consumed to consumed and quantity minus total consumed to on_hand
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

	$medicine_requested = $del_data['med_req']; //name of medicine consumed
	$consumed_qty = $del_data['med_qty']; //quantity of medicine consumed

	$medicine = $conn->prepare("SELECT * FROM tbl_med_inventory WHERE medicine = '$medicine_requested'");
	$medicine->execute();
	$medicine_data = $medicine->fetch();

	$consumed = $medicine_data['consumed']; //quantity of total consumed on inventory
	$on_hands = $medicine_data['on_hand']; //total quantity of the medicine

	$total = $consumed - $consumed_qty;
	$on_hand = $on_hands + $consumed_qty;

	$resu = $conn->prepare("UPDATE tbl_med_inventory SET consumed = '$total', on_hand = '$on_hand' WHERE medicine = '$medicine_requested'");
	$resu->execute();
	
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