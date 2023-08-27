<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$id = $_GET['id'];
	$cid = $_GET['cid'];
	$rid = $_GET['rid'];
	
	$lupo = $conn->prepare("SELECT * FROM tbl_lupon WHERE lpn_id = '$id'");
	$lupo->execute();
	$lupo_data = $lupo->fetch();
	
	$date_reported = date("M d, Y", strtotime($lupo_data['lpn_date']));

	$complainants = "";
	$respondents = "";

	//Complainants
	if($lupo_data['lpn_complaints1_firstname'] && $lupo_data['lpn_complaints1_lastname']){
		if($lupo_data['lpn_complaints1_firstname']){
			$complainants .= $lupo_data['lpn_complaints1_firstname'];
		}else{

		}

		if($lupo_data['lpn_complaints1_middlename']){
			$complainants .= " " . $lupo_data['lpn_complaints1_middlename'];
		}else{

		}

		if($lupo_data['lpn_complaints1_lastname']){
			$complainants .= " " . $lupo_data['lpn_complaints1_lastname'];
		}else{

		}
	}else{

	}

	if($lupo_data['lpn_complaints2_firstname'] && $lupo_data['lpn_complaints2_lastname']){
		if($lupo_data['lpn_complaints2_firstname'] && $complainants != ""){
			$complainants .= ", " . $lupo_data['lpn_complaints2_firstname'];
		}else{
			$complainants .= $lupo_data['lpn_complaints2_firstname'];
		}

		if($lupo_data['lpn_complaints2_middlename']){
			$complainants .= " " . $lupo_data['lpn_complaints2_middlename'];
		}else{

		}

		if($lupo_data['lpn_complaints2_lastname']){
			$complainants .= " " . $lupo_data['lpn_complaints2_lastname'];
		}else{

		}
	}else{

	}

	if($lupo_data['lpn_complaints3_firstname'] && $lupo_data['lpn_complaints3_lastname']){
		if($lupo_data['lpn_complaints3_firstname'] && $complainants != ""){
			$complainants .= ", " . $lupo_data['lpn_complaints3_firstname'];
		}else{
			$complainants .= $lupo_data['lpn_complaints3_firstname'];
		}

		if($lupo_data['lpn_complaints3_middlename']){
			$complainants .= " " . $lupo_data['lpn_complaints3_middlename'];
		}else{

		}

		if($lupo_data['lpn_complaints3_lastname']){
			$complainants .= " " . $lupo_data['lpn_complaints3_lastname'];
		}else{

		}
	}else{

	}

	//Respondents
	if($lupo_data['lpn_respondent1_firstname'] && $lupo_data['lpn_respondent1_lastname']){
		if($lupo_data['lpn_respondent1_firstname']){
			$respondents .= $lupo_data['lpn_respondent1_firstname'];
		}else{

		}

		if($lupo_data['lpn_respondent1_middlename']){
			$respondents .= " " . $lupo_data['lpn_respondent1_middlename'];
		}else{

		}

		if($lupo_data['lpn_respondent1_lastname']){
			$respondents .= " " . $lupo_data['lpn_respondent1_lastname'];
		}else{

		}
	}else{

	}

	if($lupo_data['lpn_respondent2_firstname'] && $lupo_data['lpn_respondent2_lastname']){
		if($lupo_data['lpn_respondent2_firstname'] && $respondents != ""){
			$respondents .= ", " . $lupo_data['lpn_respondent2_firstname'];
		}else{
			$respondents .= $lupo_data['lpn_respondent2_firstname'];
		}

		if($lupo_data['lpn_respondent2_middlename']){
			$respondents .= " " . $lupo_data['lpn_respondent2_middlename'];
		}else{

		}

		if($lupo_data['lpn_respondent2_lastname']){
			$respondents .= " " . $lupo_data['lpn_respondent2_lastname'];
		}else{

		}
	}else{

	}

	if($lupo_data['lpn_respondent3_firstname'] && $lupo_data['lpn_respondent3_lastname']){
		if($lupo_data['lpn_respondent3_firstname'] && $respondents != ""){
			$respondents .= ", " . $lupo_data['lpn_respondent3_firstname'];
		}else{
			$respondents .= $lupo_data['lpn_respondent3_firstname'];
		}

		if($lupo_data['lpn_respondent3_middlename']){
			$respondents .= " " . $lupo_data['lpn_respondent3_middlename'];
		}else{

		}

		if($lupo_data['lpn_respondent3_lastname']){
			$respondents .= " " . $lupo_data['lpn_respondent3_lastname'];
		}else{

		}
	}else{

	}
	
?>	
<head>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/misc-js.php'); ?>
</head>

		<div class="m-l-40"><b class="text-info">Usaping Brgy BLG. : </b>
			<p style="padding-left:27px;"><?php echo $lupo_data['lpn_usp_brgy_blg']; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Ukol sa : </b>
			<p style="padding-left:27px;"><?php echo $lupo_data['lpn_ukol_sa']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Complainant(s) : </b>
			<p style="padding-left:27px;"><?php echo $complainants; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Complainant(s) Contact No. : </b>
			<p style="padding-left:27px;"><?php echo $lupo_data['lpn_contactno']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Complainant(s) Address : </b>
			<p style="padding-left:27px;"><?php echo $lupo_data['lpn_tirahan_sumbong']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Respondent(s) : </b>
			<p style="padding-left:27px;"> <?php echo $respondents; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Respondent(s) Contact No. : </b>
			<p style="padding-left:27px;"><?php echo $lupo_data['lpn_contactno1']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Respondent(s) Address : </b>
			<p style="padding-left:27px;"><?php echo $lupo_data['lpn_tirahan_sumbong1']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Narrative : </b>
			<p style="padding-left:27px;"><?php echo $lupo_data['lpn_narrative']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Date Reported : </b>
			<p style="padding-left:27px;"><?php echo $date_reported; ?></p>
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