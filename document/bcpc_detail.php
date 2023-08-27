<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$id = $_GET['id'];
	$cid = $_GET['cid'];
	$rid = $_GET['rid'];
	
	$bcpc = $conn->prepare("SELECT * FROM tbl_vwac WHERE vwac_id = '$id'");
	$bcpc->execute();
	$bcpc_data = $bcpc->fetch();
	
	$date_report = date("M d, Y", strtotime($bcpc_data['vwac_date_reported']));
	$date_violence = date("M d, Y", strtotime($bcpc_data['vwac_date_violence_commited']));
	
?>	
<head>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/misc-js.php'); ?>
</head>

		<div class="m-l-40"><b class="text-info">Type of Case : </b>
			<p style="padding-left:27px;"><?php echo $bcpc_data['vwac_typeofcase']; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Reference Number : </b>
			<p style="padding-left:27px;"><?php echo $bcpc_data['reference_no']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Case Number : </b>
			<p style="padding-left:27px;"><?php echo $bcpc_data['case_no']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Respondent's Name : </b>
			<p style="padding-left:27px;"> <?php echo $bcpc_data['vwac_perpetrator_lastname']?> <?php echo $bcpc_data['vwac_perpetrator_firstname']; ?> <?php echo $bcpc_data['vwac_perpetrator_middlename']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Respondent's Contact Number : </b>
			<p style="padding-left:27px;"><?php echo $bcpc_data['vwac_perpetrator_contact']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Respondent's Address : </b>
			<p style="padding-left:27px;"><?php echo $bcpc_data['vwac_perpetrator_address']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Date Reported : </b>
			<p style="padding-left:27px;"><?php echo $date_report; ?></p>
		</div>
		
		
		
		
	<a type="button" class="btn btn-info waves-effect waves-light nyroModal" href="add.php?cerid=<?php echo $cid; ?>&res=<?php echo $rid; ?>"><i class="ti-back-left me-1"></i> Go Back</a>
<style>
	#nyroModalWrapper{
		margin-top: -400px !important;
		height: 600px !important;
		width: 400px !important;
		overflow: auto;
		overflow-y: auto;
	}
</style>