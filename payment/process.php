<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
      
    case 'modify_billboard' :
        modify_billboard();
        break;

	case 'modify_bir' :
		modify_bir();
		break;

	case 'modify_building' :
		modify_building();
		break;

	case 'modify_business' :
		modify_business();
		break;

	case 'modify_excavation' :
		modify_excavation();
		break;

	case 'modify_good_moral' :
		modify_good_moral();
		break;

	case 'modify_liquor' :
		modify_liquor();
		break;

	case 'modify_meter' :
		modify_meter();
		break;

	case 'modify_miscellaneous' :
		modify_miscellaneous();
		break;

	case 'modify_promotional' :
		modify_promotional();
		break;

	case 'modify_residency' :
		modify_residency();
		break;

	case 'modify_terminal' :
		modify_terminal();
		break;

	case 'modify_tfb' :
		modify_tfb();
		break;

	case 'modify_trd' :
		modify_trd();
		break;

	case 'modify_working' :
		modify_working();
		break;

	case 'modify_id' :
		modify_id();
		break;
        
    case 'delete' :
        delete_data();
        break;
    
	case 'confirm' :
        confirm_data();
        break;
	
    case 'deleteImage' :
        deleteImage();
        break;
    
	   
    default :
        // if action is not defined or unknown
        // move to main category page
        header('Location: index.php');
}




function modify_billboard(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$type = $_POST['type'];
	$faced = $_POST['faced'];
	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = $_POST['issued_by'];

	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET type = '$type', faced = '$faced', or_num = '$orno', amount = '$amount', person_sign = '$person_sign', 
							date_issued = '$dateissued', issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_bir(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$dname = mysqli_real_escape_string($link, $_POST['dname']);
	$relation = $_POST['relationship'];
	$dtdeath = $_POST['dtdeath'];
	$purpose = $_POST['purpose'];
	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];	   
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$datedeath = date("Y-m-d", strtotime($dtdeath));
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET deceased_name = '$dname', relationship = '$relation', date_death = '$datedeath', purpose = '$purpose', or_num = '$orno', 
							amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_building(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$build_det = mysqli_real_escape_string($link, $_POST['build_det']);
	$build_address = mysqli_real_escape_string($link, $_POST['build_address']);
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);

	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET build_detail = '$build_det', build_address = '$build_address', or_num = '$orno', amount = '$amount', 
							person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_business(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$amount = $_POST['amount'];
	$orno = $_POST['orno'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = $_POST['issued_by'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET  or_num = '$orno', amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', 
							issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_excavation(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$req_name = mysqli_real_escape_string($link, $_POST['req_name']);
	$req_address = mysqli_real_escape_string($link, $_POST['req_address']);
	$purpose = mysqli_real_escape_string($link, $_POST['purpose']);
	$jobno = $_POST['jobno'];
	$provider = mysqli_real_escape_string($link, $_POST['provider']);
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$dtissued = $_POST['dtissued'];
	$person_sign = $_POST['person_sign'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET requestor_name = '$req_name', requestor_address = '$req_address', purpose = '$purpose', job_no = '$jobno', 
							provider = '$provider', or_num = '$orno', amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' 
							WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_good_moral(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET or_num = '$orno', amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' 
							WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_liquor(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$req_name = mysqli_real_escape_string($link, $_POST['req_name']);
	$nature_business = mysqli_real_escape_string($link, $_POST['nature_business']);
	$control_no = mysqli_real_escape_string($link, $_POST['control_no']);
	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET requestor_name = '$req_name', nature_business = '$nature_business', control_no = '$control_no', or_num = '$orno', 
							amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_meter(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$provider = $_POST['provider'];
	$installation = $_POST['installation'];
	$property = $_POST['property'];	
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET provider = '$provider', installation_type = '$installation', property_type = '$property', or_num = '$orno', 
							amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_miscellaneous(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$purpose = $_POST['purpose'];
	$control = $_POST['control'];
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET purpose = '$purpose', control_no = '$control_no', or_num = '$orno', amount = '$amount', person_sign = '$person_sign', 
							date_issued = '$dateissued', issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_residency(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$purpose = $_POST['purpose'];
	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET purpose = '$purpose', or_num = '$orno', amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', 
							issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_promotional(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$event = mysqli_real_escape_string($link, $_POST['event']);
	$event_address = mysqli_real_escape_string($link, $_POST['event_address']);
	$duration1 = $_POST['duration1'];
	$duration2 = $_POST['duration2'];
	$time1 = $_POST['time1'];
	$time1_formatted = date("g:i A", strtotime($time1));
	$time2 = $_POST['time2'];
	$time2_formatted = date("g:i A", strtotime($time2));
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET event = '$event', event_address = '$event_address', duration1 = 'duration1', duration2 = 'duration2', time1 = 'time1_formatted', 
							time2 = 'time2_formatted', or_num = '$orno', amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' 
							WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_terminal(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$assoc_name = $_POST['assoc_name'];
	$assoc_address = $_POST['assoc_address'];
	$purpose = $_POST['purpose'];
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET toda = '$assoc_name', toda_address = '$assoc_address', purpose = '$purpose', or_num = '$orno', amount = '$amount', 
							person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_tfb(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$make = mysqli_real_escape_string($link, $_POST['make']);
	$motor = mysqli_real_escape_string($link, $_POST['motor']);
	$chassis = mysqli_real_escape_string($link, $_POST['chassis']);
	$color = mysqli_real_escape_string($link, $_POST['color']);
	$sidecar = mysqli_real_escape_string($link, $_POST['sidecar']);
	$plate = mysqli_real_escape_string($link, $_POST['plate']);
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET make = '$make', motor_no = '$motor', chassis_no = '$chassis', color_code = '$color', side_car_no = '$sidecar', 
							plate_no = '$plate', or_num = '$orno', amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' 
							WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_trd(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];


	$toda = mysqli_real_escape_string($link, $_POST['toda']);
	$toda_address = mysqli_real_escape_string($link, $_POST['toda_address']);
	$make = mysqli_real_escape_string($link, $_POST['make']);
	$motor = $_POST['motor'];
	$chassis = $_POST['chassis'];
	$color = mysqli_real_escape_string($link, $_POST['color']);
	$sidecar = $_POST['sidecar'];
	$plate = mysqli_real_escape_string($link, $_POST['plate']);
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET toda = '$toda', toda_address = '$toda_address', make = '$make', motor_no = '$motor', chassis_no = '$chassis', color_code = '$color', side_car_no = '$sidecar', 
							plate_no = '$plate', or_num = '$orno', amount = '$amount', person_sign = '$person_sign', date_issued = '$dateissued', issued_by = '$issued_by' 
							WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_working(){
	include '../global-library/database.php';

	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];

	$ctcno = $_POST['ctcno'];
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET ctc_num = '$ctcno', or_num = '$orno', amount = '$amount', person_sign = '$person_sign', 
							date_issued = '$dateissued', issued_by = '$issued_by' WHERE dr_id = '$id'");
	$sql->execute();

	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
}

function modify_id()
{
	include '../global-library/database.php';
	
	$id = $_POST['id'];
	$userId = $_SESSION['user_id'];
	
    $idno = $_POST['idno'];
	$cperson = $_POST['contact_person'];
	$cnumber = $_POST['contact_person_num'];
	$dtissued = $_POST['dtissued'];
	

	$dateissued = date("Y-m-d", strtotime($dtissued));

	$sql = $conn->prepare("UPDATE tbl_document_request SET idno = '$idno', contact_person = '$cperson', contact_person_num = '$cnumber', date_issued = '$dtissued' WHERE dr_id = '$id'");
	$sql->execute();
    		
	header("Location: index.php?view=modify&id=$id&error=Modified Successfully");
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

    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_document_request SET is_deleted = '1' WHERE dr_id = '$id'");
	$sql->execute();
       
	header("Location: index.php?error=Deleted Successfully");
}
?>