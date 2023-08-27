<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        add_data();
        break;

	case 'return' :
		add_return();
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

	$inventory_id = $_POST['inventory_id'];
	
    $res_id = mysqli_real_escape_string($link, $_POST['res_id']);
	$item = $_POST['item_name'];
	$itemDesc = $_POST['item_desc'];
	$itemqty = $_POST['item_qty'];
	$borrow_qty = $_POST['borrow_qty'];
	$condition = $_POST['condition'];
	$purpose = $_POST['purpose'];
	$location = mysqli_real_escape_string($link, $_POST['loc']);
	$borrowedDate = $_POST['bdate'];
	$borrowedTime = $_POST['btime'];
	$borrowedTime_reformatted = date("g:i A", strtotime($borrowedTime));
	$releasedBy = mysqli_real_escape_string($link, $_POST['released']);
	$expectedDate = $_POST['erdate'];
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);
	$brtype = $_POST['brtype'];


	$ite = $conn->prepare("SELECT * FROM tbl_inventory WHERE in_item = '$item'");
	$ite->execute();
	$ite_data = $ite->fetch();

	$item_id = $ite_data['in_id'];

	if($borrow_qty != 0){
		if($borrow_qty <= $itemqty){
			$item_left = $itemqty - $borrow_qty;

			$bor = $conn->prepare("UPDATE tbl_inventory SET in_available_qty = '$item_left' WHERE in_id = '$item_id'");
			$bor->execute();

			echo "You have borrowed $borrow_qty; item(s).";

			$sql = $conn->prepare("INSERT INTO tbl_borrowed (in_id, r_id, br_item, br_itemdesc, br_item_qty, br_borrow_qty, br_condition, br_purpose, br_location, br_dateborrowed, br_timeborrowed, br_releasedby, br_dateexpected,
												br_remarksb, is_barangay, is_returned, is_deleted) 
													VALUES ('$inventory_id', '$res_id', '$item', '$itemDesc', '$itemqty', '$borrow_qty', '$condition', '$purpose', '$location', '$borrowedDate', '$borrowedTime_reformatted', 
													'$releasedBy', '$expectedDate', '$remarks', '$brtype', '0', '0')");
			$sql->execute();
			
			$id = $conn->lastInsertId();
			$uid = md5($id);
			
		
			
		
			header("Location: index.php?view=add&item=$item_id&error=Added successfully");
		}else{
			echo "Sorry, only $itemqty item(s) are available to borrow.";
			header("Location: index.php?view=add&item=$item_id&error=Borrowed Item Exceeds The Item Quantity");
		}
	}else{
		echo "Please enter a valid quantity to borrow.";
	}
}

/*
    Add Return Data
*/
function add_return()
{
	include '../global-library/database.php';
	
	$id7 = $_POST['id'];
    $returnBy = mysqli_real_escape_string($link, $_POST['return_by']);
	$dateReturned = $_POST['date_returned'];
	$timeReturned = $_POST['time_returned'];
	$timeReturned_reformatted = date("g:i A", strtotime($timeReturned));
	$receivedBy = mysqli_real_escape_string($link, $_POST['received_by']);
	$remarksR = mysqli_real_escape_string($link, $_POST['remarks']);

	$dtreturn = date("Y-m-d", strtotime($dateReturned));

        $sql = $conn->prepare("UPDATE tbl_borrowed SET br_returnby = '$returnBy', br_datereturned = '$dateReturned', br_timereturned = '$timeReturned_reformatted', 
									br_receivedby = '$receivedBy', br_remarksr = '$remarksR', is_returned = '1' WHERE br_id = '$id7'");
													
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		

		//fetch data of item being returned using uid
		$ret = $conn->prepare("SELECT * FROM tbl_borrowed WHERE br_id='$id7'");
		$ret->execute();
		$ret_data = $ret->fetch();

		$in_id = $ret_data['in_id'];
		$item_name = $ret_data['br_item'];
		$item_bor = $ret_data['br_borrow_qty'];

		//fetch data of item being borrowed from inventory using item name
		$inv = $conn->prepare("SELECT * FROM tbl_inventory WHERE in_id = '$in_id'");
		$inv->execute();
		$inv_data = $inv->fetch();

		$item_remain = $inv_data['in_available_qty'];

		$total_items = $item_remain + $item_bor;

		$return = $conn->prepare("UPDATE tbl_inventory SET in_available_qty = '$total_items' WHERE in_id = '$in_id'");
		$return->execute();
    
		header("Location: index.php?view=return&id=$id7&error=Modified successfully");
}

/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';
	$id = $_POST['id'];
    // $bName = mysqli_real_escape_string($link, $_POST['bname']);
	$res_id = mysqli_real_escape_string($link, $_POST['res_id']);
	$item = $_POST['item'];
	$itemDesc = $_POST['item_desc'];
	$itemqty = $_POST['item_qty'];
	$condition = $_POST['condition'];
	$purpose = $_POST['purpose'];
	$location = mysqli_real_escape_string($link, $_POST['loc']);
	$borrowedDate = $_POST['bdate'];
	$borrowedTime = $_POST['btime'];
	$borrowedTime_reformatted = date("g:i A", strtotime($borrowedTime));
	$releasedBy = mysqli_real_escape_string($link, $_POST['released']);
	$expectedDate = $_POST['erdate'];
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);
	$brtype = $_POST['brtype'];
	$borrow_qty = $_POST['borrow_qty'];

	if($borrow_qty != 0){
		$item_left = $itemqty - $borrow_qty;
	}else{

	}
	
    
		$sql = $conn->prepare("UPDATE tbl_borrowed SET r_id = '$r_id', br_item = '$item', br_itemdesc = '$itemDesc', br_item_qty = '$itemqty', br_condition = '$condition', 
								br_purpose = '$purpose', br_location = '$location', br_dateborrowed = '$borrowedDate', 
								br_timeborrowed = '$borrowedTime_reformatted', br_releasedby = '$releasedBy', br_dateexpected = '$expectedDate', 
								br_remarksb = '$remarks', is_barangay = '$brtype', br_borrow_qty = '$borrow_qty' WHERE br_id = '$id'");
		$sql->execute();
               
		header("Location: index.php?view=modify&id=$id&error=Modified successfully");
	
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
	$sql = $conn->prepare("UPDATE tbl_borrowed SET is_deleted = '1' WHERE br_id = '$id'");
	$sql->execute();
       
	header("Location: index.php?error=Deleted successfully");
}

function returned_data()
{
	include '../global-library/database.php';	
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }    	
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_borrowed SET is_returned = '1' WHERE br_id = '$id'");
	$sql->execute();
       
	header("Location: index.php?error=Deleted successfully");
}



?>