<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

	$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$id' AND is_deleted != '1'");
	$sql->execute();
	$sql_data = $sql->fetch();
?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
		<div class="col-md-8">
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Education Info</h3>
				<hr />
				<?php
					$educational_attainment = $sql_data['educationalattainment'];
					
					if($educational_attainment == "Elementary"){
						$valeducattainment = "Elementary";
						$educattainmentStat = "Elementary";
					} else if ($educational_attainment == "Highschool"){
						$valeducattainment = "Highschool";
						$educattainmentStat = "Highschool";
					} else if ($educational_attainment == "Technical/Vocational"){
						$valeducattainment = "Technical/Vocational";
						$educattainmentStat = "Technical/Vocational";
					} else if ($educational_attainment == "College Undergrad"){
						$valeducattainment = "College Undergrad";
						$educattainmentStat = "College Undergrad";
					} else if ($educational_attainment == "Associates Degree"){
						$valeducattainment = "Associates Degree";
						$educattainmentStat = "Associates Degree";
					} else if ($educational_attainment == "Bachelor Degree"){
						$valeducattainment = "Bachelor Degree";
						$educattainmentStat = "Bachelor Degree";
					} else if ($educational_attainment == "Master Degree"){
						$valeducattainment = "Master Degree";
						$educattainmentStat = "Master Degree";
					} else if ($educational_attainment == "Professional Degree"){
						$valeducattainment = "Professional Degree";
						$educattainmentStat = "Professional Degree";
					} else if ($educational_attainment == "Doctorate Degree"){
						$valeducattainment = "Doctorate Degree";
						$educattainmentStat = "Doctorate Degree";						
					} else {
						$valeducattainment = 'None';
						$educattainmentStat = 'None';
					} 
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
					<div class="col-sm-9">
						<div class="input-group">													
							<select name="educational_attainment" class="educat" style="width:270px;">
								<option value="<?php echo $valeducattainment; ?>"><?php echo $educattainmentStat; ?></option>
								<option value="Elementary">Elementary</option>
								<option value="Highschool">Highschool</option>
								<option value="Technical/Vocational">Technical/Vocational</option>
								<option value="College Undergrad">College Undergrad</option>
								<option value="Associates Degree">Associates Degree</option>
								<option value="Bachelor Degree">Bachelor Degree</option>
								<option value="Master Degree">Master Degree</option>
								<option value="Professional Degree">Professional Degree</option>
								<option value="Doctorate Degree">Doctorate Degree</option>
								<option value="None">None</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="form-group" id="eattain">
					<label for="exampleInputuname" class="col-sm-3 control-label">Course</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Course" name="course" value="<?php echo $sql_data['course']; ?>" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group" id="eattain2" style="display:none;">
					<label for="exampleInputuname" class="col-sm-3 control-label">Name of School</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of School" name="school" autocomplete=off /> </div>
					</div>
				</div>
				
				<div class="form-group" id="skills">
					<label for="exampleInputuname" class="col-sm-3 control-label">Skills</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Skills" name="skills" value="<?php echo $sql_data['skills']; ?>" autocomplete=off /> </div>
					</div>
				</div>		

					<div class="form-group">
						<a href="#personal" data-toggle="tab" class="btn btn-info waves-effect waves-light m-r-10 tab"><i class="fa fa-chevron-left fa-fw"></i> Back</a>
						&nbsp;
						<a href="#work" data-toggle="tab" class="btn btn-success waves-effect waves-light m-r-10 tab">Next <i class="fa fa-chevron-right fa-fw"></i></a>
					</div>
			</div>
		</div>
		<style>
			.control-label{
				color:black;
			}
		</style>