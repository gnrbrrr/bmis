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
	
	case 'search' :
		$content 	= 'search.php';		
		$pageTitle 	= $sett_data['system_title'];
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= $sett_data['system_title'];
}


$script    = array('artist.js');

require_once '../include/template.php';
?>
