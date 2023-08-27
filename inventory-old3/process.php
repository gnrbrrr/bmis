<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        add_data();
        break;

	case 'add_particular' :
		add_particular();
		break;

	case 'add_med' :
		add_med();
		break;
      
    case 'modify' :
        modify_data();
        break;

	case 'modify_particular' :
		modify_particular();
		break;

	case 'modify_medicine' :
		modify_medicine();
		break;
        
    case 'delete' :
        delete_data();
        break;

	case 'delete_particular' :
		delete_particular();
		break;

	case 'delete_medicine' :
		delete_medicine();
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
	
	$item = $_POST['item'];
    $itemDesc = $_POST['item_desc'];
    $serialNo = mysqli_real_escape_string($link, $_POST['serialno']);
	$amt = $_POST['amt'];
	$dop = $_POST['datep'];
	$condition = $_POST['condition'];
	$qty = $_POST['qty'];


	$available_qty = $qty;

	
	$chk = $conn->prepare("SELECT * FROM tbl_inventory WHERE in_itemdesc = '$itemDesc' AND in_serialno = '$serialNo' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=Complaint already exist! Data entry failed.');              
	}else{
		
		//echo $itemdesc . ' ' . $serialno . ' ' . $amt . ' ' . $dateofpurchase . ' ' . $condition . ' ' . $quantity;
        $sql = $conn->prepare("INSERT INTO tbl_inventory (in_item, in_itemdesc, in_serialno, in_amt, in_dop, in_condition, in_qty, in_available_qty, is_deleted) 
													VALUES ('$item', '$itemDesc', '$serialNo', '$amt', '$dop', '$condition', '$qty', '$available_qty', '0')");
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

function add_particular(){
	include '../global-library/database.php';

	$userId = $_SESSION['user_id'];

	$particulars = mysqli_real_escape_string($link, $_POST['particulars']);
	$quantity = $_POST['quantity'];
	$consumed = $_POST['consumed'];
	$on_hand = $_POST['on_hand'];
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);



	$chk = $conn->prepare("SELECT * FROM tbl_bdrrm WHERE particulars = '$particulars' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=Particular already exist! Data entry failed.');
	}else{
		
        $sql = $conn->prepare("INSERT INTO tbl_bdrrm (particulars, quantity, consumed, on_hand, remarks, is_deleted) 
													VALUES ('$particulars', '$quantity', '$consumed', '$on_hand', '$remarks', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('BDRRM Inventory Added', '$remarks', 'BDRRM Inventory', '$uid', '$userId', '$today_date1')");
		$log->execute();
    
		header('Location: index.php?view=add_parti&error=Added Successfully');
	}
}

function add_med(){
	include '../global-library/database.php';

	$userId = $_SESSION['user_id'];

	$medicine = mysqli_real_escape_string($link, $_POST['medicine']);
	$quantity = $_POST['quantity'];
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);

	$on_hand = $quantity;

	$chk = $conn->prepare("SELECT * FROM tbl_med_inventory WHERE medicine = '$medicine' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=Medicine already exist! Data entry failed.');
	}else{
		
        $sql = $conn->prepare("INSERT INTO tbl_med_inventory (medicine, quantity, on_hand, remarks, is_deleted) 
													VALUES ('$medicine', '$quantity', '$on_hand', '$remarks', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Medicine Inventory Added', '$remarks', 'Medicine Inventory', '$uid', '$userId', '$today_date1')");
		$log->execute();
    
		header('Location: index.php?view=add_med&error=Added successfully');
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
	$item = $_POST['item'];
    $itemDesc = $_POST['item_desc'];
    $serialNo = mysqli_real_escape_string($link, $_POST['serialno']);
	$amt = $_POST['amt'];
	$dop = $_POST['datep'];
	$condition = $_POST['condition'];
	$qty = $_POST['qty'];

	$borrowed_qty = 0;

	//Get Item ID
	$check = $conn->prepare("SELECT * FROM tbl_inventory WHERE uid = '$id'");
	$check->execute();
	$check_data = $check->fetch();

	$item_id = $check_data['in_id'];


	$check2 = $conn->prepare("SELECT * FROM tbl_borrowed WHERE is_returned != '1' AND in_id = '$item_id'");
	$check2->execute();
	while($check2_data = $check2->fetch()){
		$borrowed_qty += $check2_data['br_borrow_qty'];
	}
	
	$total_qty = $qty - $borrowed_qty;
	
	
	$chk = $conn->prepare("SELECT * FROM tbl_inventory WHERE in_itemdesc = '$itemDesc' AND in_serialno = '$serialNo' AND uid != '$id' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header("Location: index.php?view=modify&id=$id&error=Client already exist! Data entry failed.");
	}else{
    
		$sql = $conn->prepare("UPDATE tbl_inventory SET in_item = '$item', in_itemdesc = '$itemDesc', in_serialno = '$serialNo', in_amt = '$amt', in_dop = '$dop', in_condition = '$condition', in_qty = '$qty', in_available_qty = '$total_qty' WHERE uid = '$id'");
		$sql->execute();
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Inventory modified', '$itemDesc', 'Inventory', '$id', '$userId', '$today_date1')");
		$log->execute();
               
		header("Location: index.php?view=modify&id=$id&error=Modified successfully");
	
	}
}

function modify_particular(){
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];

	$id = $_POST['id'];
	$particulars = mysqli_real_escape_string($link, $_POST['particulars']);
	$quantity = $_POST['quantity'];
	$total_consumed = $_POST['total_consumed'];
	$consumed = $_POST['consumed'];
	$on_hand = $_POST['on_hand'];
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);

	$total_consumed = $total_consumed + $consumed;

	$total = $quantity - $total_consumed;

	$sql = $conn->prepare("UPDATE tbl_bdrrm SET particulars = '$particulars', quantity = '$quantity', consumed = '$total_consumed', on_hand = '$total', remarks = '$remarks' WHERE s_id = '$id'");
	$sql->execute();


	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('BDRRM Inventory Modified', '$remarks', 'BDRRM Inventory', '$id', '$userId', '$today_date1')");
	$log->execute();

	header("Location: index.php?view=modify_parti&id=$id&error=Modified successfully");
}

function modify_medicine(){
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];

	$id = $_POST['id'];
	$medicine = mysqli_real_escape_string($link, $_POST['medicine']);
	$quantity = $_POST['quantity'];
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);

	$req_qty = 0;
	$total = 0;

	$checker = $conn->prepare("SELECT * FROM tbl_medical_record WHERE med_req = '$medicine' AND is_deleted != '1'");
	$checker->execute();
	while($checker_data = $checker->fetch()){
		$req_qty += $checker_data['med_qty'];
	}

	$total = $quantity - $req_qty;

	$sql = $conn->prepare("UPDATE tbl_med_inventory SET medicine = '$medicine', quantity = '$quantity', consumed = '$req_qty', on_hand = '$total', remarks = '$remarks' WHERE medi_id = '$id'");
	$sql->execute();


	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Medicine Inventory Modified', '$remarks', 'Medicine Inventory', '$id', '$userId', '$today_date1')");
	$log->execute();

	header("Location: index.php?view=modify_medicine&id=$id&error=Modified successfully");
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

function delete_particular(){
	include '../global-library/database.php';

	$userId = $_SESSION['user_id'];

	if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }

	$sql = $conn->prepare("UPDATE tbl_bdrrm SET is_deleted = '1' WHERE s_id = '$id'");
	$sql->execute();

	/*Insert Log*/
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('BDRRM Inventory Deleted', '$remarks', 'Inventory', '$id', '$userId', '$today_date1')");
	$log->execute();

	header("Location: index.php?error=Deleted successfully");
}

function delete_medicine(){
	include '../global-library/database.php';

	$userId = $_SESSION['user_id'];

	if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }

	$sql = $conn->prepare("UPDATE tbl_med_inventory SET is_deleted = '1' WHERE medi_id = '$id'");
	$sql->execute();

	/*Insert Log*/
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Medicine Inventory Deleted', '$remarks', 'Inventory', '$id', '$userId', '$today_date1')");
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