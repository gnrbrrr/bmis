<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        add_data();
        break;
	
    case 'add_trip' :
        add_trip();
        break;
	
    case 'add_maint' :
        add_maint();
        break;
      
    case 'modify' :
        modify_data();
        break;
      
    case 'modify_maint' :
        modify_maint();
        break;
      
    case 'modify_trip' :
        modify_trip();
        break;
      
    case 'return' :
        return_data();
        break;
        
    case 'delete' :
        delete_data();
        break;
        
    case 'delete_maint' :
        delete_maint();
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

	$car_id = $_POST['trip_id'];

	$dname = mysqli_real_escape_string($link, $_POST['driver_name']);
	$vehicle = mysqli_real_escape_string($link, $_POST['vehicle']);
	$plateno = mysqli_real_escape_string($link, $_POST['plateno']);
	$datev = $_POST['date_reserve'];
	$timev = $_POST['time_reserve'];
	$time_available = date("g:i A", strtotime($timev));

	$activity = mysqli_real_escape_string($link, $_POST['activity']);
	$destination = mysqli_real_escape_string($link, $_POST['destination']);
	$date_d = $_POST['date_dispatched'];
	$time_d = $_POST['time_dispatched'];
	$time_dispatched = date("g:i A", strtotime($time_d));

	$odobeg = mysqli_real_escape_string($link, $_POST['odo_beg']);
	$odoend = mysqli_real_escape_string($link, $_POST['odo_end']);
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);

	$vehicle_date = date("Y-m-d", strtotime($datev));
	$date_dispatched = date("Y-m-d", strtotime($date_d));
	
	$sql = $conn->prepare("INSERT INTO tbl_vehicle (tr_id, driver, vehicle, plateno, date_reserved, time_reserved, activity, destination, date_dispatched, time_dispatched, odo_beginning, odo_ending, remarks, is_deleted) 
												VALUES ('$car_id', '$dname', '$vehicle', '$plateno', '$vehicle_date', '$time_available', '$activity', '$destination', '$date_dispatched', '$time_dispatched', '$odobeg', '$odoend', '$remarks', '0')");
	$sql->execute();

	$id = $conn->lastInsertId();
	$uid = md5($id);
	
	$up = $conn->prepare("UPDATE tbl_vehicle SET uid = '$uid' WHERE vh_id = '$id'");
	$up->execute();
	
	/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Vehicle Logs added', '$vehicle', 'Vehicle Logs', '$uid', '$userId', '$today_date1')");
	$log->execute();
		
	header("Location: index.php?view=detail_trip&id=$car_id&error=Added Reservation Successfully");
}

function add_trip()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];

	$vehicle = mysqli_real_escape_string($link, $_POST['vehicle']);
	$plate_num = mysqli_real_escape_string($link, $_POST['plate']);
	
	$chk = $conn->prepare("SELECT * FROM tbl_vehicle_trip WHERE trip_vehicle = '$vehicle' AND trip_plate_num = '$plate_num' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header('Location: index.php?view=add&error=Vehicle already exist! Data entry failed.');
	}else{
        
		$sql = $conn->prepare("INSERT INTO tbl_vehicle_trip (trip_vehicle, trip_plate_num, is_deleted) 
													VALUES ('$vehicle', '$plate_num', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Vehicle Trip Added', '$vehicle', 'Vechicle Scheduled Trips', '$id', '$userId', '$today_date1')");
		$log->execute();
    
		header('Location: index.php?view=add_trip&error=Added Successfully');
	}
}

function add_maint()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];

	if(isset($_POST['id'])){
		$vehicle_id = $_POST['id'];
	}else{
		$vehicle_id = $_GET['id'];
	}

	$date_maint = mysqli_real_escape_string($link, $_POST['date_maintenance']);
	$odo_read = mysqli_real_escape_string($link, $_POST['odo_read']);
	$correct_maint = mysqli_real_escape_string($link, $_POST['correct_maint']);
	$prevent_maint = mysqli_real_escape_string($link, $_POST['prevent_maint']);
	$predict_maint = mysqli_real_escape_string($link, $_POST['predict_maint']);
	$expenses = mysqli_real_escape_string($link, $_POST['expenses']);
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);

	$datem = date("Y-m-d", strtotime($date_maint));
	
	$sql = $conn->prepare("INSERT INTO tbl_vehicle_maint (tr_id, date_maintenance, odo_reading, corrective_maint, preventive_maint, predictive_maint, expenses, remarks_maint, is_deleted) 
												VALUES ('$vehicle_id', '$datem', '$odo_read', '$correct_maint', '$prevent_maint', '$predict_maint', '$expenses', '$remarks', '0')");
	$sql->execute();

	$id = $conn->lastInsertId();
	$uid = md5($id);
	
	/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Vehicle Logs added', '$vehicle_id', 'Vehicle Logs', '$uid', '$userId', '$today_date1')");
	$log->execute();
		
	header("Location: index.php?view=detail_trip&id=$vehicle_id&error=Added Maintenance Successfully");
}


/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
		
	$id = $_POST['id'];
	
	$dname = mysqli_real_escape_string($link, $_POST['driver_name']);
	$vehicle = mysqli_real_escape_string($link, $_POST['vehicle']);
	$plateno = mysqli_real_escape_string($link, $_POST['plateno']);
	$datev = $_POST['date_reserve'];
	$timev = $_POST['time_reserve'];
	$time_available = date("g:i A", strtotime($timev));

	$activity = mysqli_real_escape_string($link, $_POST['activity']);
	$destination = mysqli_real_escape_string($link, $_POST['destination']);
	$date_d = $_POST['date_dispatched'];
	$time_d = $_POST['time_dispatched'];
	$time_dispatched = date("g:i A", strtotime($time_d));

	$odobeg = mysqli_real_escape_string($link, $_POST['odo_beg']);
	$odoend = mysqli_real_escape_string($link, $_POST['odo_end']);

	if($_POST['date_return'] != ""){
		$date_r = $_POST['date_return'];
		$date_returned = date("Y-m-d", strtotime($date_r));
	}else{
		$date_returned = "";
	}

	

	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);

	$date_reserv = date("Y-m-d", strtotime($datev));
	$date_dispatched = date("Y-m-d", strtotime($date_d));
	
	$sql = $conn->prepare("UPDATE tbl_vehicle SET driver = '$dname', vehicle = '$vehicle', plateno = '$plateno', date_reserved = '$date_reserv', time_reserved = '$time_available',  activity = '$activity', destination = '$destination', 
													date_dispatched = '$date_dispatched', time_dispatched = '$time_dispatched', date_returned = '$date_returned',  odo_beginning = '$odobeg', odo_ending = '$odoend', remarks = '$remarks' 
															WHERE vh_id = '$id'");
	$sql->execute();

/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Vehicle Logs modified', '$vehicle', 'Vehicle Logs', '$id', '$userId', '$today_date1')");
	$log->execute();
		   
	header("Location: index.php?view=modify&id=$id&error=Modified successfully");
	
}

function modify_maint()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];

	$id = $_POST['id'];
	$date_maint = mysqli_real_escape_string($link, $_POST['date_maintenance']);
	$odo_read = mysqli_real_escape_string($link, $_POST['odo_read']);
	$correct_maint = mysqli_real_escape_string($link, $_POST['correct_maint']);
	$prevent_maint = mysqli_real_escape_string($link, $_POST['prevent_maint']);
	$predict_maint = mysqli_real_escape_string($link, $_POST['predict_maint']);
	$expenses = mysqli_real_escape_string($link, $_POST['expenses']);
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);
	
	$datem = date("Y-m-d", strtotime($date_maint));
	
	$sql = $conn->prepare("UPDATE tbl_vehicle_maint SET date_maintenance = '$date_maint', odo_reading = '$odo_read', corrective_maint = '$correct_maint', preventive_maint = '$prevent_maint', 
							predictive_maint = '$predict_maint', expenses = '$expenses', remarks_maint = '$remarks' WHERE vm_id = '$id'");
	$sql->execute();

/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Vehicle Logs modified', '$vehicle', 'Vehicle Logs', '$id', '$userId', '$today_date1')");
	$log->execute();
		   
	header("Location: index.php?view=modify_maint&id=$id&error=Modified Successfully");
	
}

function modify_trip()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];

	$id = $_POST['id'];

	$vehicle = mysqli_real_escape_string($link, $_POST['vehicle']);
	$plate_num = mysqli_real_escape_string($link, $_POST['plate']);
	
	$sql = $conn->prepare("UPDATE tbl_vehicle_trip SET trip_vehicle = '$vehicle', trip_plate_num = '$plate_num' WHERE tr_id = '$id'");
	$sql->execute();

/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Vehicle Logs modified', '$vehicle', 'Vehicle Logs', '$id', '$userId', '$today_date1')");
	$log->execute();
		   
	header("Location: index.php?view=modify_trip&id=$id&error=Modified Successfully");
	
}

/*
    Return
*/
function return_data()
{
	include '../global-library/database.php';

    if(isset($_POST['trip_id'])){
		$veh_id = $_POST['trip_id'];
	}else{
		$veh_id = $_GET['trip_id'];
	}

	$date_r = $_POST['date_return'];
	$remarks = $_POST['remarks'];

	$date_returned = date("Y-m-d", strtotime($date_r));
	
	$sel = $conn->prepare("UPDATE tbl_vehicle SET date_returned = '$date_returned', remarks = '$remarks' WHERE vh_id = '$veh_id'");
	$sel->execute();

	$car = $conn->prepare("SELECT * FROM tbl_vehicle WHERE vh_id = '$veh_id'");
	$car->execute();
	$car_data = $car->fetch();

	$vehicle = $car_data['vehicle'];

	$tr_id = $car_data['tr_id'];
	
	/* Insert Log */
	$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
				VALUES ('Vehicle Returned', '$vehicle', 'Vehicle Logs', '$id', '$userId', '$today_date1')");
	$log->execute();
       
	header("Location: index.php?view=detail_trip&id=$tr_id&error=Returned Successfully");
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
	
	$sel = $conn->prepare("SELECT * FROM tbl_vehicle WHERE vh_id = '$id'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$vehicle = $sel_data['vehicle'];
	$tr_id = $sel_data['tr_id'];
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_vehicle SET is_deleted = '1' WHERE vh_id = '$id'");
	$sql->execute();
	
	/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Vehicle Logs deleted', '$vehicle', 'Vehicle Logs', '$id', '$userId', '$today_date1')");
		$log->execute();
       
	header("Location: index.php?view=detail_trip&id=$tr_id&error=Deleted Reservation Successfully");
}

function delete_maint()
{
	include '../global-library/database.php';	
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }

	//get the main vehicle record ID for reference
	$veh = $conn->prepare("SELECT * FROM tbl_vehicle_maint WHERE vm_id = '$id'");
	$veh->execute();
	$veh_data = $veh->fetch();

	$vehicle_id = $veh_data['tr_id'];
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_vehicle_maint SET is_deleted = '1' WHERE vm_id = '$id'");
	$sql->execute();
       
	header("Location: index.php?view=detail_trip&id=$vehicle_id&error=Deleted Maintenance Successfully");
}


?>