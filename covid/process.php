<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        add_data();
        break;

	case 'add_vac' :
		add_vac();
		break;
      
    case 'modify' :
        modify_data();
        break;
      
    case 'modify_vac' :
        modify_vac();
        break;
        
    case 'delete' :
        delete_data();
        break;
        
    case 'delete_vac' :
        delete_vac();
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
	
	$cname = mysqli_real_escape_string($link, $_POST['cname']);
	$age = $_POST['cage'];
	$gender = $_POST['cgender'];
	$address = mysqli_real_escape_string($link, $_POST['caddress']);
	$occupation = mysqli_real_escape_string($link, $_POST['coccupation']);
	$onset = $_POST['onset'];
	$history = mysqli_real_escape_string($link, $_POST['history']);
	$status = $_POST['status'];
	$dru = $_POST['dru'];
	$vaccination = mysqli_real_escape_string($link, $_POST['vstatus']);

	if($dru == "Other"){
		$dru = mysqli_real_escape_string($link, $_POST['otherf']);
	}else{

	}

		
        $sql = $conn->prepare("INSERT INTO tbl_covid_cases (cc_name, cc_age, cc_gender, cc_address, cc_occupation, cc_onset, cc_history, cc_status, cc_dru, cc_vaccination, is_deleted) 
													VALUES ('$cname', '$age', '$gender', '$address', '$occupation', '$onset', '$history', '$status', '$dru', '$vaccination', '0')");
		$sql->execute();

		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_covid_cases SET uid = '$uid' WHERE cc_id = '$id'");
		$up->execute();
    		
		header("Location: index.php?view=add&error=Added Successfully");
		
	
}


function add_vac()
{
	include '../global-library/database.php';

	$id = $_POST['id'];
	
	$dose_type = $_POST['dose_type'];
	$brand = mysqli_real_escape_string($link, $_POST['brand']);
	$dosage = $_POST['dosage'];
	$date_taken = $_POST['date_taken'];
	$location = mysqli_real_escape_string($link, $_POST['location']);

	$dtaken = date("Y-m-d", strtotime($date_taken));

		
        $sql = $conn->prepare("INSERT INTO tbl_covid_vaccine (cc_id, dose_type, brand, dosage, date_taken, location, is_deleted) 
													VALUES ('$id', '$dose_type', '$brand', '$dosage', '$dtaken', '$location', '0')");
		$sql->execute();
    		
		header("Location: index.php?view=add_vac&id=$id&error=Added Successfully");
}


/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';
	
		
	$id = $_POST['id'];
	$cname = mysqli_real_escape_string($link, $_POST['cname']);
	$age = $_POST['cage'];
	$gender = $_POST['cgender'];
	$address = mysqli_real_escape_string($link, $_POST['caddress']);
	$occupation = mysqli_real_escape_string($link, $_POST['coccupation']);
	$onset = $_POST['onset'];
	$history = mysqli_real_escape_string($link, $_POST['history']);
	$status = $_POST['status'];
	$dru = $_POST['dru'];
	$vaccination = mysqli_real_escape_string($link, $_POST['vstatus']);

	if($dru == "Other"){
		$dru = mysqli_real_escape_string($link, $_POST['otherf']);
	}else{

	}
		

		
		$sql = $conn->prepare("UPDATE tbl_covid_cases SET cc_name = '$cname', cc_age = '$age', cc_gender = '$gender', 
							cc_address = '$address', cc_occupation = '$occupation', cc_onset = '$onset', cc_history = '$history', 
							cc_status = '$status', cc_dru = '$dru', cc_vaccination = '$vaccination' WHERE uid = '$id'");
		$sql->execute();
		   
	header("Location: index.php?view=modify&id=$id&error=Modified successfully");
	
	
}


function modify_vac(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	
	$dose_type = $_POST['dose_type'];
	$brand = mysqli_real_escape_string($link, $_POST['brand']);
	$dosage = $_POST['dosage'];
	$date_taken = $_POST['date_taken'];
	$location = mysqli_real_escape_string($link, $_POST['location']);

	$dtaken = date("Y-m-d", strtotime($date_taken));

		$sql = $conn->prepare("UPDATE tbl_covid_vaccine SET dose_type = '$dose_type', dosage = '$dosage', brand = '$brand', date_taken = '$dtaken', location = '$location' 
								WHERE cv_id = '$id'");
		$sql->execute();

		header("Location: index.php?view=modify_vac&id=$id&error=Modified Successfully");
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
	$sql = $conn->prepare("UPDATE tbl_covid_cases SET is_deleted = '1' WHERE cc_id = '$id'");
	$sql->execute();

	$rest = $conn->prepare("UPDATE tbl_covid_vaccine SET is_deleted = '1' WHERE cc_id = '$id'");
	$rest->execute();
       
	header("Location: index.php?error=Deleted successfully");
}

function delete_vac(){
	include '../global-library/database.php';

	if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }

	$recall = $conn->prepare("SELECT * FROM tbl_covid_vaccine WHERE cv_id = '$id'");
	$recall->execute();
	$recaller = $recall->fetch();

	$cov_id = $recaller['cc_id'];

	$sql = $conn->prepare("UPDATE tbl_covid_vaccine SET is_deleted = '1' WHERE cv_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=detail&id=$cov_id&error=Deleted Successfully");
}


?>