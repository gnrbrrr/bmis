<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	if(isset($_POST['id'])){
		$car_id = $_POST['id'];
	}else{
		$car_id = $_GET['id'];
	}

	$car = $conn->prepare("SELECT * FROM tbl_vehicle v, tbl_vehicle_trip t WHERE v.vh_id = '$car_id' AND v.tr_id = t.tr_id");
	$car->execute();
	$car_data = $car->fetch();

	$time = $car_data['time_reserved'];
	$time_avail_formatted = date("H:i", strtotime($time));
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=return" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-8">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Vehicle</h3>
				<p class="text-muted m-b-30 font-13"> Add Vehicle Record</p>
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
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Driver's Name" name="driver_name" value="<?php echo $car_data['driver']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Vehicle</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Vehicle" name="vehicle" value="<?php echo $car_data['trip_vehicle']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Plate No.</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Plate No." name="plateno" value="<?php echo $car_data['trip_plate_num']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Reserved</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date" name="date_avail" autocomplete=off value="<?php echo $car_data['date_reserved']; ?>" readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Reserved</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="Time of Activity" name="time_avail" value="<?php echo $time_avail_formatted; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Returned</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date" name="date_return" autocomplete=off required /> </div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Remarks</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Remarks" name="remarks" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<input name="trip_id" type="hidden" id="id" value="<?php echo $car_id; ?>">
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
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