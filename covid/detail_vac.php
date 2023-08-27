<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$id = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM tbl_covid_vaccine v, tbl_covid_cases c WHERE v.cv_id = '$id' AND v.cc_id = c.cc_id");
$sql->execute();
$sql_data = $sql->fetch();
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
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
	else if($errorMessage == 'Modified Successfully')
	{
?>							
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
			<b><?php echo $errorMessage; ?></b>
		</div>
<?php								
	}else{}
?>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add_vac" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Covid 19 Monitoring</h3>
				<p class="text-muted m-b-30 font-13"> Add Covid Vaccine Record</p>
					

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Name of Patient:</label>
						<div class="col-sm-9">
							<div class="input-group">
								<label class="control-label" style="color:#663399; font-weight:bold;"><?php echo $sql_data['cc_name']; ?></label> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Age:</label>
						<div class="col-sm-9">
							<div class="input-group">
								<label class="control-label" style="color:#663399; font-weight:bold;"><?php echo $sql_data['cc_age']; ?></label> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Gender:</label>
						<div class="col-sm-9">
							<div class="input-group">
								<label class="control-label" style="color:#663399; font-weight:bold;"><?php echo $sql_data['cc_gender']; ?></label> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Occupation:</label>
						<div class="col-sm-9">
							<div class="input-group">
								<label class="control-label" style="color:#663399; font-weight:bold;"><?php echo $sql_data['cc_occupation']; ?></label> </div>
						</div>
					</div>
				
			</div>
		</div>

		<div class="col-md-6">
			<div class="white-box">
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Dose Type</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="dose_type" id="dose_type" disabled>
								<option value="<?php echo $sql_data['dose_type']; ?>"><?php echo $sql_data['dose_type']; ?></option>
								<option value="Regular Dose">Regular Dose</option>
								<option value="Booster">Booster</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Brand Name</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Vaccine Brand Name" name="brand" value="<?php echo $sql_data['brand']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Dosage</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="dosage" id="dosage" disabled>
								<option value="<?php echo $sql_data['dosage']; ?>"><?php echo $sql_data['dose_type']; ?></option>
								<option value="1st Dose">1st Dose</option>
								<option value="2nd Dose">2nd Dose</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Date Taken</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="date" class="form-control" id="exampleInputuname" placeholder="" name="date_taken" value="<?php echo $sql_data['date_taken']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Location Vaccine Taken</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<textarea class="form-control" id="exampleInputuname" placeholder="" name="location" style="resize:vertical; min-height:60px; max-height:100px;" autocomplete=off readonly ><?php echo $sql_data['location']; ?></textarea> </div>
					</div>
				</div>

				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<a href="index.php?view=detail&id=<?php echo $sql_data['cc_id']; ?>" class="btn btn-inverse waves-effect waves-light"><span>Cancel</span></a>
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