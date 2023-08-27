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
	
    $pTitle = mysqli_real_escape_string($link, $_POST['ptitle']);
    $pLeader = mysqli_real_escape_string($link, $_POST['pleader']);
	$rationale = mysqli_real_escape_string($link, $_POST['rationale']);
	$objectives = mysqli_real_escape_string($link, $_POST['objectives']);
	$location = mysqli_real_escape_string($link, $_POST['location']);
	$funds = mysqli_real_escape_string($link, $_POST['funds']);
	$cost = mysqli_real_escape_string($link, $_POST['cost']);
	$contractor = $_POST['cr'];
    $cDate = $_POST['cdate'];
	$cName = mysqli_real_escape_string($link, $_POST['cname']);
	$cPerson = mysqli_real_escape_string($link, $_POST['cperson']);
	$position = mysqli_real_escape_string($link, $_POST['position']);
	$contactNo = mysqli_real_escape_string($link, $_POST['contactno']);
	$cAddress = mysqli_real_escape_string($link, $_POST['caddress']);
	$status = $_POST['status'];

        $sql = $conn->prepare("INSERT INTO tbl_project (p_title, p_leader, p_rationale, p_objectives, p_location, p_source, p_cost, 
														p_date, is_contractor, p_compname, p_contactp, p_position, p_contactno, p_caddress, p_status, is_deleted) 
													VALUES ('$pTitle', '$pLeader', '$rationale', '$objectives', '$location', '$funds', 
													'$cost', '$cDate', '$contractor', '$cName', '$cPerson', '$position', '$contactNo', '$cAddress', '$status', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_project SET uid = '$uid' WHERE p_id = '$id'");
		$up->execute();
    
		header('Location: index.php?view=add&error=Added successfully');
		
	
}



/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';
	$id = $_POST['id'];

	$pTitle = mysqli_real_escape_string($link, $_POST['ptitle']);
    $pLeader = mysqli_real_escape_string($link, $_POST['pleader']);
	$rationale = mysqli_real_escape_string($link, $_POST['rationale']);
	$objectives = mysqli_real_escape_string($link, $_POST['objectives']);
	$location = mysqli_real_escape_string($link, $_POST['location']);
	$funds = mysqli_real_escape_string($link, $_POST['funds']);
	$cost = mysqli_real_escape_string($link, $_POST['cost']);
	$contractor = $_POST['cr'];
    $cDate = $_POST['cdate'];
	$cName = mysqli_real_escape_string($link, $_POST['cname']);
	$cPerson = mysqli_real_escape_string($link, $_POST['cperson']);
	$position = mysqli_real_escape_string($link, $_POST['position']);
	$contactNo = mysqli_real_escape_string($link, $_POST['contactno']);
	$cAddress = mysqli_real_escape_string($link, $_POST['caddress']);
	$status = $_POST['status'];

        $sql = $conn->prepare("UPDATE tbl_project SET p_title = '$pTitle', p_leader = '$pLeader', p_rationale = '$rationale', p_objectives = '$objectives', p_location = '$location', 
														p_source = '$funds', p_cost = '$cost', p_date = '$cDate', is_contractor = '$contractor', p_compname = '$cName', p_contactp = '$cPerson', 
														p_position = '$position', p_contactno = '$contactNo', p_caddress = '$cAddress', p_status = '$status' WHERE uid = '$id'");
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
	$sql = $conn->prepare("UPDATE tbl_project SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
       
	header("Location: index.php?error=Deleted successfully");
}


?>