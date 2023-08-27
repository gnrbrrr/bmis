<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
	

switch ($view) {	
	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'add_summon' :
		$content 	= 'add_summon.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'modify_summon' :
		$content 	= 'modify_summon.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'detail' :
		$content 	= 'detail.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'detail_summon' :
		$content 	= 'detail_summon.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'report' :
		$content	= 'lupon_report.php';
		$pageTitle	= $sett_data['system_title'];
		break;
		
	case 'ledger' :
		$content 	= 'ledger.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= $sett_data['system_title'];
}


$script    = array('artist.js');

require_once '../include/template.php';
?>
