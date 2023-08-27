<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

if(isset($_POST['id'])){
	$id = $_POST['id'];
}else{
	$id = $_GET['id'];
}
$sql = $conn->prepare("SELECT * FROM tbl_vehicle_maint vm, tbl_vehicle_trip vt WHERE vm.vm_id = '$id' AND vm.tr_id = vt.tr_id");
$sql->execute();
$sql_data = $sql->fetch();
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php?view=detail_trip&id=<?php echo $sql_data['tr_id']; ?>'">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=modify_maint" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Vehicle</h3>
				<p class="text-muted m-b-30 font-13"> Add Vehicle Maintenance Record</p>
					<?php
						if($errorMessage == 'Modified Successfully')
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
				
					<div class="m-l-40"><b class="text-info">Vehicle : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['trip_vehicle']; ?></p>
					</div>
					
					<div class="m-l-40"><b class="text-info">Plate No. : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['trip_plate_num']; ?></p>
					</div>
			</div>
		</div>
		<!-- Driver Info End -->
		<div class="col-md-6">
			<div class="white-box">
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Date Maintenance</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-calender"></i></div>
							<input type="date" class="form-control" id="exampleInputuname" placeholder="Date" name="date_maintenance" autocomplete=off value="<?php echo $sql_data['date_maintenance']; ?>" required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">ODO Meter Reading</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="ODO Meter Reading" name="odo_read" autocomplete=off value="<?php echo $sql_data['odo_reading']; ?>" required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Corrective Maintenance</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Corrective Maintenance" name="correct_maint" autocomplete=off value="<?php echo $sql_data['corrective_maint']; ?>" required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Preventive Maintenance</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Preventive Maintenance" name="prevent_maint" autocomplete=off value="<?php echo $sql_data['preventive_maint']; ?>" required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Predictive Maintenance</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Predictive Maintenance" name="predict_maint" autocomplete=off value="<?php echo $sql_data['predictive_maint']; ?>" required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Expenses</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Expenses" name="expenses" autocomplete=off value="<?php echo $sql_data['expenses']; ?>" required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Remarks</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<textarea class="form-control" id="exampleInputuname" placeholder="Remarks" name="remarks" style="resize:vertical; width:430px; min-height:60px; max-height:100px;" autocomplete=off ><?php echo $sql_data['remarks_maint']; ?></textarea> </div>
					</div>
				</div>


				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<input type="hidden" name="id" value="<?php echo $id; ?>" />
						<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><i class="fa fa-save fa-fw"></i> Save</button>
						<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php?view=detail_trip&id=<?php echo $sql_data['tr_id']; ?>';">Cancel</button>
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