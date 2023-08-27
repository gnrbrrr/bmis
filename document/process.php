<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
	case 'add_tfb_p' :
        add_tfb_p();
        break;  

	case 'add_id' :
        add_id();
        break;  
	
    case 'add_business' :
        add_business();
        break;          
	
	case 'add_bir' :
        add_bir();
        break;
	
	case 'add_building' :
        add_building();
        break;
	
	case 'add_closure' :
        add_closure();
        break;
	
	case 'add_residency' :
        add_residency();
        break;
		
	case 'add_residency_youth' :
        add_residency_youth();
        break;
	
	case 'add_excavation' :
        add_excavation();
        break;
		
	case 'add_good_moral' :
        add_good_moral();
        break;

	case 'add_miscellaneous' :
		add_miscellaneous();
		break;
	
	case 'add_meter' :
        add_meter();
        break;
		
	case 'add_promotional' :
        add_promotional();
        break;
	
	case 'add_billboard' :
        add_billboard();
        break;
	
	case 'add_terminal' :
        add_terminal();
        break;
	
	case 'add_trd' :
        add_trd();
        break;
		
	case 'add_working' :
        add_working();
        break;
	
	case 'add_locational' :
		add_locational();
		break;

	case 'add_liquor' :
		add_liquor();
		break;

	case 'add_id_front' :
		add_id_front();
		break;

	case 'add_other_business' :
		add_other_business();
		break;
	
    case 'delete' :
        delete_data();
        break;
		
	case 'delete_request' :
        delete_request();
        break;
    
    default :
        // if action is not defined or unknown
        // move to main category page
        header('Location: index.php');
}


/*
    Add Data
*/
function add_id()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $idno = $_POST['idno'];
	$rsince = $_POST['rsince'];
	$height = mysqli_real_escape_string($link, $_POST['height']);
	$weight = $_POST['weight'];	   
	$cperson = $_POST['cperson'];
	$cnumber = $_POST['cnumber'];
	$dtissued = $_POST['dtissued'];
	

	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, idno, rsince, height, weight, cperson, cnumber,  date_issued, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$idno', '$rsince', '$height', '$weight', '$cperson', '$cnumber', '$dateissued', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    		
		header("Location: ../certificate/id.php?id=$uid");
}

function add_business()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$busid = $_POST['busid'];
	$refno = $_POST['refno'];
	$bookno = $_POST['bookno'];
	$amount = $_POST['amount'];
	$orno = $_POST['orno'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = $_POST['issued_by'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, b_id, reference_num, amount, or_num, book_no, date_issued, person_sign, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$busid', '$refno', '$amount', '$orno', '$bookno', '$dateissued', '$person_sign', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/business.php?id=$uid");
}

function add_other_business()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$refno = $_POST['refno'];
	$obusid = $_POST['obusid'];
	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$dtissued = $_POST['dtissued'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, ob_id, reference_num, amount, or_num, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$obusid', '$refno', '$amount', '$orno', '$dateissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/other_business.php?id=$uid");
}

function add_trd()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
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
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, toda, toda_address, or_num, amount, make, motor_no, chassis_no, color_code, side_car_no, plate_no, date_issued, person_sign, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$toda', '$toda_address', '$orno', '$amount', '$make', '$motor', '$chassis', '$color', '$sidecar', '$plate', '$dateissued', '$person_sign', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    		
		header("Location: ../certificate/trd.php?id=$uid");
}

function add_tfb_p()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
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
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, or_num, amount, make, motor_no, chassis_no, color_code, side_car_no, plate_no, person_sign, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$orno', '$amount', '$make', '$motor', '$chassis', '$color', '$sidecar', '$plate', '$person_sign', '$dateissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    		
		header("Location: ../certificate/tfb_p.php?id=$uid");
}

function add_promotional()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
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

	$d1 = date("Y-m-d", strtotime($duration1));
	$d2 = date("Y-m-d", strtotime($duration2));
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, event, event_address, duration1, duration2, time1, time2, or_num, amount, date_issued, issued_by, person_sign, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$event', '$event_address', '$d1', '$d2', '$time1_formatted', '$time2_formatted', '$orno', '$amount', '$dateissued', '$issued_by', '$person_sign', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/promotional.php?id=$uid");
}

function add_terminal()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
	$assoc_name = $_POST['assoc_name'];
	$assoc_address = $_POST['assoc_address'];
	$purpose = $_POST['purpose'];
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = $_POST['issued_by'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, toda, toda_address, or_num, amount, purpose, date_issued, person_sign, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$assoc_name', '$assoc_address', '$orno', '$amount', '$purpose', '$dateissued', '$person_sign', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/terminal.php?id=$uid");
}

function add_meter()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
	$provider = $_POST['provider'];
	$installation = $_POST['installation'];
	$property = $_POST['property'];	
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	$dtissued = $_POST['dtissued'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, or_num, amount, provider, installation_type, property_type, person_sign, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$orno', '$amount', '$provider', '$installation', '$property', '$person_sign', '$dateissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/meter.php?id=$uid");
}

function add_good_moral()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = $_POST['issued_by'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, or_num, amount, person_sign, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$orno', '$amount', '$person_sign', '$dateissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/good_moral.php?id=$uid");
}

function add_miscellaneous()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
	$position = $_POST['position'];
	$purpose = $_POST['purpose'];
	$control = $_POST['control'];
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = $_POST['issued_by'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, or_num, position, control_no, amount, person_sign, purpose, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$orno', '$position', '$control', '$amount', '$person_sign', '$purpose', '$dateissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/miscellaneous.php?id=$uid");
}

function add_excavation()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
    $refno = $_POST['refno'];
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
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, reference_num, requestor_name, requestor_address, or_num, amount, purpose, job_no, provider, date_issued, person_sign, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$refno', '$req_name', '$req_address', '$orno', '$amount', '$purpose', '$jobno', '$provider', '$dateissued', '$person_sign', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/excavation.php?id=$id");
}

function add_closure()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$busid = $_POST['busid'];
	$refno = $_POST['refno'];
	$dtclosure = $_POST['dtclosure'];
	$purpose = $_POST['purpose'];	
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$dtissued = $_POST['dtissued'];
	
	$dateclosure = date("Y-m-d", strtotime($dtclosure));
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, b_id, reference_num, or_num, amount, date_closure, purpose, date_issued, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$orno', '$amount', '$dateclosure', '$purpose', '$dateissued', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/closure.php?id=$uid");
}

function add_building()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
	$build_det = mysqli_real_escape_string($link, $_POST['build_det']);
	$build_address = mysqli_real_escape_string($link, $_POST['build_address']);
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);

	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, build_detail, build_address, or_num, amount, date_issued, issued_by, person_sign, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$build_det', '$build_address', '$orno', '$amount', '$dateissued', '$issued_by', '$person_sign', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/building.php?id=$uid");
}

function add_bir()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
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
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, deceased_name, relationship, date_death, purpose, or_num, amount, person_sign, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$dname', '$relation', '$dtdeath', '$purpose', '$orno', '$amount', '$person_sign', '$dateissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    		
		header("Location: ../certificate/bir.php?id=$uid");
}

function add_billboard()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$busid = $_POST['busid'];
	$refno = $_POST['refno'];
	$position = $_POST['position'];
	$type = $_POST['type'];
	$faced = $_POST['faced'];
	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = $_POST['issued_by'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, b_id, reference_num, position, type, faced, or_num, amount, person_sign, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$busid', '$refno', '$position', '$type', '$faced', '$orno', '$amount', '$person_sign', '$dateissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/billboard.php?id=$uid");
}

function add_residency()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
	$purpose = $_POST['purpose'];
	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$or_date = date("Y-m-d", strtotime($orno_date));
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, purpose, or_num, amount, person_sign, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$purpose', '$orno', '$amount', '$person_sign', '$dateissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    		
		header("Location: ../certificate/residency.php?id=$uid");
}

function add_residency_youth()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $refno = $_POST['refno'];
	$purpose = $_POST['purpose'];
	$dtissued = $_POST['dtissued'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, purpose, date_issued, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$purpose', '$dateissued', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    		
		header("Location: ../certificate/residency_youth.php?id=$uid");
}

function add_working()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];

    $refno = $_POST['refno'];
	$resid = $_POST['resid'];
	$purpose = $_POST['purpose'];
	$ctcno = $_POST['ctcno'];
    $orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, purpose, ctc_num, or_num, amount, person_sign, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$purpose', '$ctcno', '$orno', '$amount', '$person_sign', '$dateissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/working.php?id=$uid");
}

function add_locational()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
   
	$refno = $_POST['refno'];
    $projnature = $_POST['projnature'];
	$projlocation = $_POST['projlocation'];
	$docs = $_POST['docs'];
	$dtissued = $_POST['dtissued'];
	
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, reference_num, project_nature, project_location, document, date_issued, user_id, is_deleted) 
													VALUES ('$cerid', '$resid', '$refno', '$projnature', '$projlocation', '$docs', '$dtissued', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header('Location: index.php?view=list&error=Added successfully');
}

function add_liquor(){
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$busid = $_POST['busid'];
	$refno = $_POST['refno'];
	$req_name = mysqli_real_escape_string($link, $_POST['req_name']);
	$nature_business = mysqli_real_escape_string($link, $_POST['nature_business']);
	$permit_no = $_POST['permit_no'];
	$control_no = mysqli_real_escape_string($link, $_POST['control_no']);
	$orno = $_POST['orno'];
	$amount = $_POST['amount'];
	$person_sign = $_POST['person_sign'];
	$dtissued = $_POST['dtissued'];
	$issued_by = mysqli_real_escape_string($link, $_POST['issued_by']);
	
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
		$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, b_id, reference_num, requestor_name, nature_business, permit_no, control_no, or_num, amount, person_sign, date_issued, issued_by, user_id, is_deleted) 
													VALUES ('$cerid', '$busid', '$refno', '$req_name', '$nature_business', '$permit_no', '$control_no', '$orno', '$amount', '$person_sign', '$dtissued', '$issued_by', '$userId', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/liquor.php?id=$uid");
}

function add_id_front(){
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
	$cerid = $_POST['cerid'];
	$resid = $_POST['resid'];
    $idno = $_POST['idno'];  
	$contact_person = $_POST['contact_person'];
	$contact_person_num = $_POST['contact_person_num'];
	$dtissued = $_POST['dtissued'];
	
	$dateissued = date("Y-m-d", strtotime($dtissued));
	
	
	$sql = $conn->prepare("INSERT INTO tbl_document_request (cer_id, r_id, idno, contact_person, contact_person_num,  date_issued, user_id, is_deleted) 
												VALUES ('$cerid', '$resid', '$idno', '$contact_person', '$contact_person_num', '$dtissued', '$userId', '0')");
	$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_document_request SET uid = '$uid' WHERE dr_id = '$id'");
		$up->execute();
    
		header("Location: ../certificate/id_front.php?id=$uid");
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
	$id = $_POST['id'];
    $bname = $_POST['businessname'];
    $tbusiness = $_POST['typeofbusiness'];
	$nbusiness = $_POST['natureofbusiness'];
	$oname = $_POST['ownername'];
	$location = $_POST['location'];
	$contactperson = $_POST['contactperson'];
	$contactnumber = $_POST['contactnumber'];
	
	
	$chk = $conn->prepare("SELECT * FROM tbl_business WHERE typeofbusiness = '$tbusiness' AND businessname = '$bname' AND uid != '$id' AND is_deleted != '1'");
	$chk->execute();
	if($chk->rowCount() > 0)
	{
		header("Location: index.php?view=modify&id=$id&error=Client already exist! Data entry failed.");
	}else{
    
		$sql = $conn->prepare("UPDATE tbl_business SET businessname = '$bname', typeofbusiness = '$tbusiness', natureofbusiness = '$nbusiness', ownername = '$oname', location = '$location', contactperson = '$contactperson', contactnumber = '$contactnumber' WHERE uid = '$id'");
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
	$sql = $conn->prepare("UPDATE tbl_business SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
       
	header("Location: index.php?error=Deleted successfully");
}

/*
    Remove Request
*/
function delete_request()
{
	include '../global-library/database.php';	
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }
	
	$sel = $conn->prepare("SELECT * FROM tbl_doc_request_online WHERE uid = '$id'");
	$sel->execute();
	$sel_data = $sel->fetch();
	
	$refno = $sel_data['reference_no'];
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_doc_request_online SET is_deleted = '1' WHERE uid = '$id'");
	$sql->execute();
	
	/* Insert Log */
		$log = $conn->prepare("INSERT INTO tr_log (action, description, category, reference, action_by, log_action_date)
					VALUES ('Online Request Deleted', '$refno', 'Document Request', '$uid', '$id', '$today_date1')");
		$log->execute();
       
	header("Location: index.php?error=Deleted successfully");
}

?>