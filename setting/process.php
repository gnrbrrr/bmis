<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'module' :
        module();
        break;
    
	case 'certificate' :
        certificate();
        break;
		
    default :
        // if action is not defined or unknown
        // move to main category page
        header('Location: index.php');
}


/*
    Modules
*/
function module()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
    $res = $_POST['res'];
	$bus = $_POST['bus'];
	$doc = $_POST['doc'];
    $pay = $_POST['pay'];
	$cas = $_POST['cas'];
	$vaw = $_POST['vaw'];
	$bcp = $_POST['bcp'];
	$blo = $_POST['blo'];
	$lup = $_POST['lup'];
	$bad = $_POST['bad'];
	$min = $_POST['min'];
	$leg = $_POST['leg'];
	$ordi = $_POST['ordi'];
	$exec = $_POST['exec'];

	$inv = $_POST['inv'];
	$bor = $_POST['bor'];
	$medi = $_POST['medi'];
	$med = $_POST['med'];
	$cov = $_POST['cov'];
	$rescue = $_POST['rescue'];

	$bor = $_POST['bor'];
	$veh = $_POST['veh'];
	$fac = $_POST['fac'];
	
	$reso = $_POST['reso'];
	$pro = $_POST['pro'];

	
		$up7 = $conn->prepare("UPDATE bs_setting SET mod_resident = '$res', mod_business = '$bus', mod_document = '$doc', mod_payment = '$pay', mod_cases = '$cas', mod_vawc = '$vaw', mod_bcpc = '$bcp', 
														mod_blotter = '$blo', mod_lupon = '$lup', mod_badac = '$bad', mod_minutes = '$min', mod_legislative = '$leg', mod_inventory = '$inv', mod_borrow = '$bor', 
														mod_medicine = '$medi', mod_medical = '$med', mod_covid = '$cov', mod_rescue = '$rescue', mod_borrow = '$bor', mod_vehicle = '$veh', 
														mod_facility = '$fac', mod_resolution = '$reso', mod_ordinance = '$ordi', mod_executive = '$exec', mod_project = '$pro'");
		$up7->execute();
		
		header("Location: index.php?error=Saved successfully");
	
}

/*
    Certificate
*/
function certificate()
{
	include '../global-library/database.php';
	
	$userId = $_SESSION['user_id'];
	
    if(isset($_POST['hidCartId']))
	{
		$pid = $_POST['hidCartId'];
	
		# Qty
		foreach ($pid as $prid)
		{
					
			if (isset($_POST['res_' . $prid]) && $_POST['res_' . $prid] > 0) 
			{
				$con = $_POST['res_' . $prid];
			
				foreach($con as $op)
				{
					
					$up7 = $conn->prepare("UPDATE tbl_certificate SET is_show = '$op' WHERE cer_id = '$prid'");
					$up7->execute();
				}
			}else{}		
		}
	}else{}
		
		header("Location: index.php?error=Saved successfully");
	
}

?>