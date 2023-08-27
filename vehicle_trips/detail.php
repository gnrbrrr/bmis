<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_blotter WHERE uid = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$dto = date("M d, Y", strtotime($sql_data['dateofoccurence']));

	$time_occurence = $sql_data['timeofoccurence'];
	$time_occurence_formatted = date("H:i", strtotime($time_occurence));

	$status = $sql_data['status'];

	if($status != ""){
		//no changes
	}else{
		$status = "Ongoing";
	}
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Blotter Record</h3>
				<p class="text-muted m-b-30 font-13"> View Blotter </p>
					
					<div class="m-l-40"><b class="text-info">Blotter Case Status : </b>
						<p style="padding-left:27px; color:black;"><?php echo $status; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Blotter No. : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['blotter_no']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Complainant : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['complainant']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Victim : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['victim']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Defendant / Suspect : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['suspect_lastname']; ?>, <?php echo $sql_data['suspect_firstname']; ?> <?php echo $sql_data['suspect_middlename']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Witness 1 : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['witness1']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Witness 2 : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['witness2']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Nature of case / Incident : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['natureofcase']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Time of Occurence : </b>
						<p style="padding-left:27px; color:black;"><?php echo $time_occurence; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Date of Occurence : </b>
						<p style="padding-left:27px; color:black;"><?php echo $dto; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Place of Occurence : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['placeofoccurence']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Narrative : </b>
						<p style="padding-left:27px; color:black; overflow-wrap: break-word; text-align:justify;"><?php echo $sql_data['narrative']; ?></p>
                    </div>
										
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['uid']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>