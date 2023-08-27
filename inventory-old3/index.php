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

	case 'add_parti' :
		$content	= 'add_parti.php';
		$pageTitle	= $sett_data['system_title'];
		break;

	case 'add_med' :
		$content	= 'add_med.php';
		$pageTitle	= $sett_data['system_title'];
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	case 'modify_parti' :
		$content	= 'modify_parti.php';
		$pageTitle	= $sett_data['system_title'];
		break;

	case 'modify_medicine' :
		$content	= 'modify_medicine.php';
		$pageTitle	= $sett_data['system_title'];
		break;
		
	case 'detail' :
		$content 	= 'detail.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= $sett_data['system_title'];
}


$script    = array('artist.js');

require_once '../include/template.php';
?>
