<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_blotter WHERE bl_id = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();

	$time_creat = $sql_data['time_created'];
	$time_created = date("H:i", strtotime($time_creat));

	$time_report = $sql_data['time_reported'];
	$time_reported = date("H:i", strtotime($time_report));


	$prepared = $sql_data['prepared'];

	if($prepared != ""){
		//no changes
	}else{
		$prepared = $sql_data['prepared']; 
	}

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-8">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Blotter Records</h3>
				<p class="text-muted m-b-30 font-13"> Modify Blotter Records </p>
					<?php
						if($errorMessage == 'Modified successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
						else if($errorMessage == 'Category already exist! Data entry failed.')
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
									<option value="<?php echo $sql_data['status']; ?>"><?php echo $sql_data['status']; ?></option>
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
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Blotter No." name="blotter_no" autocomplete=off value="<?php echo $sql_data['blotter_no']; ?>" readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Created</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="Time Created" name="time_created" autocomplete=off value="<?php echo $time_created; ?>" readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Created</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date Created" name="date_created" autocomplete=off value="<?php echo $sql_data['date_created']; ?>" readonly /> </div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Complainant Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Complainant" name="complainant" autocomplete=off value="<?php echo $sql_data['complainant']; ?>" required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Complainant Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="" name="complainant_address" style="resize:vertical; min-height:75px; max-height:300px;" autocomplete=off required ><?php echo $sql_data['complainant_address']; ?></textarea></div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Respondent Firstname</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Respondent Firstname" name="respondent_first" autocomplete=off value="<?php echo $sql_data['respondent_firstname']; ?>" required/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Respondent Middlename</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Respondent Middlename" name="respondent_middle" autocomplete=off value="<?php echo $sql_data['respondent_middlename']; ?>"/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Respondent Lastname</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Respondent Lastname" name="respondent_last" autocomplete=off value="<?php echo $sql_data['respondent_lastname']; ?>" required/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Respondent Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="" name="respondent_address" style="resize:vertical; min-height:75px; max-height:300px;" autocomplete=off required ><?php echo $sql_data['respondent_address']; ?></textarea></div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Reported</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="Time Reported" name="time_reported" autocomplete=off value="<?php echo $time_reported; ?>" readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Reported</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date Reported" name="date_reported" autocomplete=off value="<?php echo $sql_data['date_reported']; ?>" readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Place</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Place" name="place" autocomplete=off value="<?php echo $sql_data['place']; ?>" required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Origin</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Origin" name="origin" autocomplete=off value="<?php echo $sql_data['origin']; ?>" required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Articles/s Involed </label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Article/s Involved" name="involed" autocomplete=off value="<?php echo $sql_data['article']; ?>" required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Facts of the case</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Facts of the case" name="facts" autocomplete=off value="<?php echo $sql_data['facts_case']; ?>" required/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Disposition</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Disposition" name="disposition" autocomplete=off value="<?php echo $sql_data['disposition']; ?>" required/>  </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Nature of case / Incident</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>								
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Nature of Case / Incident" name="incident" autocomplete=off value="<?php echo $sql_data['natureofcase']; ?>" required/>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Prepared.</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<select id="prepared" class="prepared" name="prepared">
									<option value="<?php echo $prepared; ?>"><?php echo $prepared; ?></option>
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
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Created By" name="created_by" value="<?php echo $sql_data['created_by']; ?>" autocomplete=off required/> </div>
						</div>
					</div>
					
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><i class="fa fa-save fa-fw"></i> Save</button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
							<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">							
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
					$("#otherf").val("");
				}

		});
		
	</script>
	<style>
		.control-label{
			color:black;
		}
	</style>
<?php
}else{
	echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
}
?>