<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$id = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM tbl_patient_info WHERE pi_id = '$id' AND is_deleted != '1'");
$sql->execute();
$sql_data = $sql->fetch();

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php'">Back</button>
  </div>
</div>
<br>
	<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Patient Information</h3>
				<p class="text-muted m-b-30 font-13">Modify Patient Information </p>
				<?php
					if($errorMessage == 'Modified Successfully'){
				?>
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
							<b><?php echo $errorMessage; ?></b>
						</div>
				<?php
					}else{

					}
				?>
				<hr />	
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Name<label id="asterisk" style="color:red;">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Name" name="pi_name" value="<?php echo $sql_data['pi_name']; ?>" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Home Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-home"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Home Address" name="pi_home_address" value="<?php echo $sql_data['pi_home_address']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Occupation" name="pi_occupation" value="<?php echo $sql_data['pi_occupation']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Email Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Email Address" name="pi_email_add" value="<?php echo $sql_data['pi_email_add']; ?>"autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Place of Birth</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Place of Birth" name="pi_placeofbirth" value="<?php echo $sql_data['pi_placeofbirth']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date of Birth</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Birth" name="pi_dateofbirth" value="<?php echo $sql_data['pi_dateofbirth']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="number" class="form-control" id="exampleInputuname" placeholder="Age" name="pi_age" value="<?php echo $sql_data['pi_age']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Sex</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pi_sex" class="select2" style="width:80px;">
									<option value="<?php echo $sql_data['pi_sex']; ?>"><?php echo $sql_data['pi_sex']; ?></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>									
								</select>
							</div>
						</div>
					</div>	
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-phone"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Contact No" name="pi_contact" value="<?php echo $sql_data['pi_contact']; ?>" autocomplete=off /></div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Nationality</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Nationality" name="pi_nationality" value="<?php echo $sql_data['pi_nationality']; ?>" autocomplete=off /></div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Civil Status</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Civil Status" name="pi_civil" value="<?php echo $sql_data['pi_civil_status']; ?>" autocomplete=off /></div>
						</div>
					</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Medical History</h3>
				<hr />
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date of Examination</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Examination" name="mh_date_exam" value="<?php echo $sql_data['mh_date_examination']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Allergies Food and Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Allergies Food and Medication" name="mh_afm" value="<?php echo $sql_data['mh_allergies_food_medication']; ?>" autocomplete=off /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Past Illness/es</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Past Illness/es*" name="mh_past_ill" value="<?php echo $sql_data['mh_past_illness']; ?>" autocomplete=off /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Present Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Present Medication" name="mh_pres_med" value="<?php echo $sql_data['mh_present_medication']; ?>" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Chief Complaint</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Chief Complaint" name="mh_chief" value="<?php echo $sql_data['mh_chief']; ?>" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">History of Present Illness</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="History of Present Illness" name="mh_history" rows="10" autocomplete=off ><?php echo $sql_data['mh_history']; ?></textarea></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">BP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="BP" name="vs_bp" value="<?php echo $sql_data['vs_bp']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">HR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="HR" name="vs_hr" value="<?php echo $sql_data['vs_hr']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">RR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RR" name="vs_rr" value="<?php echo $sql_data['vs_rr']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">T</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="T" name="vs_t" value="<?php echo $sql_data['vs_t']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">SPO2</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="SPO2" name="vs_spo2" value="<?php echo $sql_data['vs_spo2']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">RBS</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RBS" name="vs_rbs" value="<?php echo $sql_data['vs_rbs']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Physical Examination</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Physical Examination" name="mh_physical" rows="10" autocomplete=off ><?php echo $sql_data['mh_physical']; ?></textarea> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Laboratory Results</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input class="input-file uniform_on" name="fileImage" id="fileInput" type="file" /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Assessment / Diagnosis</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Symptoms / Diagnosis" name="mh_symp_diag" value="<?php echo $sql_data['mh_symp_diag']; ?>" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Treatment / Management</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Treatment" name="mh_treat" rows="10" autocomplete=off ><?php echo $sql_data['mh_treat']; ?></textarea> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Examining Physician</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Examining Physician" name="mh_physician" value="<?php echo $sql_data['mh_physician']; ?>" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Physician License No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Examining Physician License No" name="mh_license" value="<?php echo $sql_data['mh_license']; ?>" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<input name="id" type="hidden" value="<?php echo $id; ?>" />
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><i class="fa fa-save fa-fw"></i> Save</button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	<style>
		label{
			color:black;
		}

		textarea{
			resize:none;
		}
	</style>
	