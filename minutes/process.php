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
	
    $dateh = $_POST['date_held'];
    $time1 = $_POST['time1'];
    $time1_reformatted = date("g:i A", strtotime($time1));
    $time2 = $_POST['time2'];
    $time2_reformatted = date("g:i A", strtotime($time2));
    $agenda = mysqli_real_escape_string($link, $_POST['agenda']);
    $venue = mysqli_real_escape_string($link, $_POST['venue']);
    $attendees = mysqli_real_escape_string($link, $_POST['attendees']);
    $discussion = mysqli_real_escape_string($link, $_POST['discussion']);
    $remarks = mysqli_real_escape_string($link, $_POST['remarks']);

    $date_held = date("Y-m-d", strtotime($dateh));
	
        $sql = $conn->prepare("INSERT INTO tbl_minutes (date_held, meeting_time1, meeting_time2, meeting_agenda, meeting_venue, meeting_attendees, meeting_discussion, meeting_remarks, is_deleted) 
													VALUES ('$date_held', '$time1_reformatted', '$time2_reformatted', '$agenda', '$venue', '$attendees', '$discussion', '$remarks', '0')");
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

    $dateh = $_POST['date_held'];
    $time1 = $_POST['time1'];
    $time1_reformatted = date("g:i A", strtotime($time1));
    $time2 = $_POST['time2'];
    $time2_reformatted = date("g:i A", strtotime($time2));
    $agenda = mysqli_real_escape_string($link, $_POST['agenda']);
    $venue = mysqli_real_escape_string($link, $_POST['venue']);
    $attendees = mysqli_real_escape_string($link, $_POST['attendees']);
    $discussion = mysqli_real_escape_string($link, $_POST['discussion']);
    $remarks = mysqli_real_escape_string($link, $_POST['remarks']);

    $date_held = date("Y-m-d", strtotime($dateh));
	
		$sql = $conn->prepare("UPDATE tbl_minutes SET date_held = '$date_held', meeting_time1 = '$time1_reformatted', meeting_time2 = '$time2_reformatted', meeting_agenda = '$agenda', meeting_venue = '$venue', 
                                meeting_attendees = '$attendees', meeting_discussion = '$discussion', meeting_remarks = '$remarks' WHERE m_id = '$id'");
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
	$sql = $conn->prepare("UPDATE tbl_minutes SET is_deleted = '1' WHERE m_id = '$id'");
	$sql->execute();
       
	header("Location: index.php?error=Deleted successfully");
}

?>