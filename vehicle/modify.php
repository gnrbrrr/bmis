<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_vehicle WHERE vh_id = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();

	$timedis = $sql_data['time_dispatched'];
	$time_disp = date("H:i", strtotime($timedis));

	$timeres = $sql_data['time_reserved'];
	$time_reserve = date("H:i", strtotime($timeres));

	//$date_return = $sql_data['date_returned'];

	
?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back to List</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-8">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Vehicle</h3>
				<p class="text-muted m-b-30 font-13"> Modify Vehicle Record </p>
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
						else if($errorMessage == 'Data already exist! Data entry failed.')
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
						<label for="exampleInputuname" class="col-sm-3 control-label">Driver's Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Driver's Name" name="driver_name" autocomplete=off required value="<?php echo htmlspecialchars($sql_data['driver']); ?>" /> </div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Vehicle</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Vehicle" name="vehicle" autocomplete=off readonly value="<?php echo htmlspecialchars($sql_data['vehicle']); ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Plate No.</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Plate No." name="plateno" autocomplete=off readonly value="<?php echo htmlspecialchars($sql_data['plateno']); ?>" /> </div>
						</div>
					</div>

					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Reserved</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date Reserved" name="date_reserve" autocomplete=off value="<?php echo $sql_data['date_reserved']; ?>" /> </div>
						</div>
					</div>

					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Reserved</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="Time Reserved" name="time_reserve" autocomplete=off value="<?php echo $time_reserve; ?>" /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Activity</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Activity" name="activity" autocomplete=off value="<?php echo htmlspecialchars($sql_data['activity']); ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Destination</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Location" name="destination" autocomplete=off value="<?php echo $sql_data['destination']; ?>" /> </div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Dispatched</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date" name="date_dispatched" autocomplete=off value="<?php echo $sql_data['date_dispatched']; ?>" /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Dispatched</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="Time of Dispatch" name="time_dispatched" autocomplete=off value="<?php echo $time_disp; ?>" /> </div>
						</div>
					</div>

					<div class="form-group" id="date_return" style="display:none;" disabled>
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Returned</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date Returned" name="date_return" autocomplete=off value="<?php echo $sql_data['date_returned']; ?>" /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">ODO Meter Beginning</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="ODO Meter Beginning" name="odo_beg" autocomplete=off value="<?php echo htmlspecialchars($sql_data['odo_beginning']); ?>" /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">ODO Meter Ending</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="ODO Meter Ending" name="odo_end" autocomplete=off value="<?php echo htmlspecialchars($sql_data['odo_ending']); ?>" /> </div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Remarks</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Remarks" name="remarks" autocomplete=off value="<?php echo htmlspecialchars($sql_data['remarks']); ?>" /> </div>
						</div>
					</div>
					
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><i class="fa fa-save fa-fw"></i> Save</button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php?view=detail_trip&id=<?php echo $sql_data['tr_id']; ?>';">Cancel</button>
							<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>
	<style>
		.control-label{
			color:black;
		}
	</style>
	<script>
		var date_return = "<?php echo $sql_data['date_returned']; ?>";

		if(date_return === ""){
			date_return = "none";
		}

		if(date_return != "none"){
			$("#date_return").show();
			$("#date_return").removeAttr("disabled");
		}else{

		}
	</script>
<?php
}else{
	echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
}
?>