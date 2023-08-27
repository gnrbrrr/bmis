<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
	

switch ($view) {
	case 'vwac_add' :
		$content 	= 'vwac_add.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
				
	case 'vwac_list':
		$content 	= 'vwac_list.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'vwac_modify':
		$content 	= 'vwac_modify.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'vawc_report':
		$content	= 'vawc_report.php';
		$pageTitle	= $sett_data['system_title'];
		break;
		
	case 'badak_add' :
		$content 	= 'badak_add.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'badak_list' :
		$content 	= 'badak_list.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'badak_modify' :
		$content 	= 'badak_modify.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'badak_view' :
		$content 	= 'badak_view.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'badak_report' :
		$content	= 'badak_report.php';
		$pageTitle	= $sett_data['system_title'];
		break;
		
	case 'lupon_add' :
		$content 	= 'lupon_add.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'lupon_list' :
		$content 	= 'lupon_list.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'lupon_modify' :
		$content 	= 'lupon_modify.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'lupon_view' :
		$content 	= 'lupon_view.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'lupon_report' :
		$content	= 'lupon_report.php';
		$pageTitle	= $sett_data['system_title'];
		break;
		
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= $sett_data['system_title'];
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
