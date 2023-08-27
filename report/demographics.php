<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
			
	$ctype = $_POST['ctype'];
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;'
?>		
<head>		
<title>Demographics Report</title>
<link rel="shortcut icon" href="<?php echo WEB_ROOT; ?>images/favicon.ico">
<style rel="stylesheet">
.tdlabel, .suffix_label, .gender_label, .age_label, .address_label, .contact_label, .civil_label, .cso_label, .ngo_label, .transpo_label, .house_label
{   
   color: #000 !important;
   font-family: Arial !important;
   font-weight: bold;
   font-size:14px;
}
.tddata, .suffix_data, .gender_data, .age_data, .address_data, .contact_data, .civil_data, .cso_data, .ngo_data, .transport_data, .house_data
{   
   color: #000 !important;
   font-family: Arial !important;  
   font-size:13px;
}
</style>
</head>
	
	<?php 
		if($ctype == '1'){ include ''; }
		else if($ctype == '2'){ include 'business.php'; }
		else if($ctype == '3'){ include 'resident.php'; }
		else{}
	?>