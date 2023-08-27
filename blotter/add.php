<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = $conn->prepare("SELECT * FROM tbl_blotter ORDER BY bl_id DESC LIMIT 1");
$sql->execute();

$sql_data = $sql->fetch();

	if($sql_data == 0){
		$blotter_num = "0000";
		$blotter_num = intval($blotter_num) + 1;
		$blotter_num = sprintf("%04d", $blotter_num);
	}else{
		$blotter_num = intval($sql_data['blotter_no']) + 1;
		$blotter_num = sprintf("%04d", $blotter_num);
	}
?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-8">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Blotter Record</h3>
				<p class="text-muted m-b-30 font-13"> Add Blotter </p>
					<?php
						if($errorMessage == 'Added successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
						else if($errorMessage == 'Complaint already exist! Data entry failed.')
						{
					?>							
							<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php								
						}else{}
					?>
				

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Status</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<select id="stats" class="stat" name="status">
									<option value="Settled">Settled</option>
									<option value="On-going">On-going</option>
									<option value="Unsettled">Unsettled</option>
								</select></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Blotter No.</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Blotter No." name="blotter_no" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Created</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="" name="time_created" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Created</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="" name="date_created" autocomplete=off required /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Complainant Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Complainant" name="complainant" autocomplete=off required /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Complainant Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="" name="complainant_address" style="resize:vertical; min-height:75px; max-height:300px;" autocomplete=off required ></textarea></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Respondent Firstname</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Respondent Firstname" name="respondent_first" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Respondent Middlename</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Respondent Middlename" name="respondent_middle" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Respondent Lastname</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Respondent Lastname" name="respondent_last" autocomplete=off required/> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Respondent Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="" name="respondent_address" style="resize:vertical; min-height:75px; max-height:300px;" autocomplete=off required ></textarea></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Reported</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="" name="time_reported" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Reported</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="" name="date_reported" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Place</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Place" name="place" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Origin</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Origin" name="origin" autocomplete=off required/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Article/s Involved</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Article/s Involved" name="involed" autocomplete=off required/> </div>
						</div>
					</div>
					<div class="form-group" id="#">
						<label for="exampleInputuname" class="col-sm-3 control-label">Facts of the case</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Facts of the case" name="facts" autocomplete=off required/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Disposition</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Disposition" name="disposition" autocomplete=off required/> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Nature of case / Incident</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>								
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Nature of Case / Incident" name="incident" autocomplete=off required/>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Prepared By</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<select id="prepared" class="prepared" name="prepared">
									<option value="Day Shift">Day Shift</option>
									<option value="Night Shift">Night Shift</option>
									
								</select></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Created By</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Created By" name="created_by" autocomplete=off required/> </div>
						</div>
					</div>
					
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>
	
<script type="text/javascript">

$(".oth").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "Other"){
			$("#otherf").show();
		}
		else{
			$("#otherf").hide();
		}

});
	
</script>
<style>
	.control-label{
		color:black;
	}
</style>