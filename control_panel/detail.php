<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_blotter WHERE bl_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$date_created = date("M d, Y", strtotime($sql_data['date_created']));
	$date_reported = date("M d, Y", strtotime($sql_data['date_reported']));

	// $time_creat = $sql_data['time_created'];
	// $time_created = date("H:i", strtotime($time_creat));

	// $time_resp = $sql_data['time_reported'];
	// $time_reported = date("H:i", strtotime($time_resp));
	
	

	// $status = $sql_data['status'];

	// if($status != ""){
	// 	//no changes
	// }else{
	// 	$status = "Ongoing";
	// }
	
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
					
					
					<div class="m-l-40"><b class="text-info">Blotter No. : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['blotter_no']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Date Created : </b>
						<p style="padding-left:27px; color:black;"><?php echo $date_created; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Time Created : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['time_created']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Complainant Name : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['complainant']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Complainant Address : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['complainant_address']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Respondent First Name : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['respondent_firstname']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Respondent Middle Name : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['respondent_middlename']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Respondent Last Name : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['respondent_lastname']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Respondent Address : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['respondent_lastname']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Time Reported : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['time_reported']; ?></p>                   
				    </div>
					
					<div class="m-l-40"><b class="text-info">Date Reported: </b>
						<p style="padding-left:27px; color:black;"><?php echo $date_reported; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Place : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['place']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Origin : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['origin']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Article/s Involved : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['article']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Facts of the case : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['facts_case']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Disposition : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['disposition']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Nature of Case : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['natureofcase']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Prepared By : </b>
						<p style="padding-left:27px; color:black; overflow-wrap: break-word; text-align:justify;"><?php echo $sql_data['prepared']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Created By : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['created_by']; ?></p>
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