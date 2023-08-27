<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
	

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'add_trip' :
		$content 	= 'add_trip.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'add_maint' :
		$content 	= 'add_maint.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'modify_trip' :
		$content 	= 'modify_trip.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'modify_maint' :
		$content 	= 'modify_maint.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'detail' :
		$content 	= 'detail.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'detail_trip' :
		$content 	= 'detail_trip.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'detail_maint' :
		$content 	= 'detail_maint.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;
		
	case 'return' :
		$content 	= 'return.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= $sett_data['system_title'];
}


$script    = array('artist.js');

require_once '../include/template.php';
?>
