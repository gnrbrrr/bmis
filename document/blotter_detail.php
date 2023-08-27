<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$id = $_GET['id'];
	$cid = $_GET['cid'];
	$rid = $_GET['rid'];
	
	$blt7 = $conn->prepare("SELECT * FROM tbl_blotter WHERE bl_id = '$id'");
	$blt7->execute();
	$blt7_data = $blt7->fetch();
	
	$dto = date("M d, Y", strtotime($blt7_data['dateofoccurence']));
	
?>	
<head>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/misc-js.php'); ?>
</head>
		
		<div class="m-l-40"><b class="text-info">Blotter No. : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['blotter_no']; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Complainant : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['complainant']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Victim : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['victim']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Defendant / Suspect : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['suspect_lastname']; ?>, <?php echo $blt7_data['suspect_firstname']; ?> <?php echo $blt7_data['suspect_middlename']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Witness 1 : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['witness1']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Witness 2 : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['witness2']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Nature of case / Incident : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['natureofcase']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Time of Occurence : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['timeofoccurence']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Date of Occurence : </b>
			<p style="padding-left:27px;"><?php echo $dto; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Place of Occurence : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['placeofoccurence']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Narrative : </b>
			<p style="padding-left:27px;"><?php echo $blt7_data['narrative']; ?></p>
		</div>
		
	<a type="button" class="btn btn-info waves-effect waves-light nyroModal" href="add.php?cerid=<?php echo $cid; ?>&res=<?php echo $rid; ?>"><i class="ti-back-left me-1"> Go Back</a>