<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='../vehicle/index.php';">Back</button>
  </div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-8">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Vehicle Schedule Trip Record</h3>
				<p class="text-muted m-b-30 font-13"> Add Vehicle Trip </p>
					<?php
						if($errorMessage == 'Added Successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
						else if($errorMessage == 'Vehicle already exist! Data entry failed.')
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
						<label for="exampleInputuname" class="col-sm-3 control-label">Vehicle</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Car Type" name="vehicle" autocomplete=off required /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Plate No.</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Plate Number" name="plate" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Availability</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-clock"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="" name="time_avail" autocomplete=off required /> </div>
						</div>
					</div>
<!-- 
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Day Availability</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								&nbsp;
								<select class="select2" name="date_avail" style="width:150px;">
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thursday">Thursday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
									<option value="Sunday">Sunday</option>
								</select>
							</div>
						</div>
					</div> -->

					<div class="form-group">
						<label for="date-input" class="col-sm-3 control-label">Date Availability</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="date-input" placeholder="Date" name="date-input" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Dispatch</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-clock"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="#" name="time_dispatch" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Return</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-clock"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="#" name="time_return" autocomplete=off required /> </div>
						</div>
					</div>
					
				
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Location</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Location" name="trip_location" autocomplete=off required /> </div>
						</div>
					</div>
					
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='../vehicle/index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>
	
<script type="text/javascript">
	
</script>
<style>
	.control-label{
		color:black;
	}
</style>