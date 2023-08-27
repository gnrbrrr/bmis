<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$id = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM tbl_patient_info WHERE pi_id = '$id' AND is_deleted != '1'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();

	if($sql_data['image']){
		$med_photo = WEB_ROOT . 'images/medical/' . $sql_data['image'];
	}else{
		$med_photo = WEB_ROOT . 'images/resident/noimage.png';
	}

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
				<hr />	
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Name" name="pi_name" value="<?php echo $sql_data['pi_name']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Home Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-home"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Home Address" name="pi_home_address" value="<?php echo $sql_data['pi_home_address']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Occupation" name="pi_occupation" value="<?php echo $sql_data['pi_occupation']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Email Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Email Address" name="pi_email_add" value="<?php echo $sql_data['pi_email_add']; ?>"autocomplete=off readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Place of Birth</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Place of Birth" name="pi_placeofbirth" value="<?php echo $sql_data['pi_placeofbirth']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date of Birth</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Birth" name="pi_dateofbirth" value="<?php echo $sql_data['pi_dateofbirth']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="number" class="form-control" id="exampleInputuname" placeholder="Age" name="pi_age" value="<?php echo $sql_data['pi_age']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Sex</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pi_sex" class="select2" style="width:fit-content;" disabled >
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
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Contact No" name="pi_contact" value="<?php echo $sql_data['pi_contact']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Nationality</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Nationality" name="pi_nationality" value="<?php echo $sql_data['pi_nationality']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Civil Status</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Civil Status" name="pi_civil" value="<?php echo $sql_data['pi_civil_status']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group" style="overflow-x:scroll;">
						<?php
							if($errorMessage == 'Added Successfully')
							{
						?>
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
									<b><?php echo $errorMessage; ?></b>
								</div>
						<?php
							}else{}
						?>
						<a href="index.php?view=history&id=<?php echo $sql_data['pi_id']; ?>" class="btn btn-success waves-effect waves-light btn-xs"><span>Add History Record</span></a>

							<table id="example23" class="display nowrap" style="font-size:12px;">
								<thead>
									<tr>
										<th style="display:none;">id</th>
										<th>Date Of Examination</th>
										<th>Action</th>
										<th>Medical Cert</th>
										<th>Prescription</th>
									</tr>
								</thead>
								<tfoot>
									<tr>									
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</tfoot>
								<tbody style="text-align:center;">
									
									<?php
										$sql = $conn->prepare("SELECT * FROM tbl_med_history WHERE pi_id = '$id' AND is_deleted != '1' ORDER BY med_id");
										$sql->execute();
										if($sql->rowCount() > 0)
										{
											while($sql_med = $sql->fetch())
											{
												$datev = date("M d, Y", strtotime($sql_med['history_date_examination']));
									?>
												<tr>
													<td style="display:none;"><?php echo $sql_data['med_id']; ?></td>
													<td><?php echo $sql_med['history_date_examination']; ?></td>
													<td>
														<a href="index.php?view=detail_history&id=<?php echo $sql_med['med_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
														&nbsp;
														<a href="index.php?view=modify_history&id=<?php echo $sql_med['med_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
														&nbsp;
														<a href="process.php?action=delete_history&id=<?php echo $sql_med['med_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
													</td>
													<td>
														<a href="<?php echo WEB_ROOT; ?>medicalrecords/other_certificate.php?id=<?php echo $sql_med['med_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
													</td>
													<td>
														<a href="<?php echo WEB_ROOT; ?>medicalrecords/other_prescription.php?id=<?php echo $sql_med['med_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
													</td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									
								</tbody>
							</table>
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
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Examination" name="mh_date_exam" value="<?php echo $sql_data['mh_date_examination']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Allergies Food and Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Allergies Food and Medication" name="mh_afm" value="<?php echo $sql_data['mh_allergies_food_medication']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Past Illness/es</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Past Illness/es*" name="mh_past_ill" value="<?php echo $sql_data['mh_past_illness']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Present Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Present Medication" name="mh_pres_med" value="<?php echo $sql_data['mh_present_medication']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Chief Complaint</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Chief Complaint" name="mh_chief" value="<?php echo $sql_data['mh_chief']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">History of Present Illness</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="History of Present Illness" name="mh_history" rows="10" autocomplete=off readonly ><?php echo $sql_data['mh_history']; ?></textarea></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">BP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="BP" name="vs_bp" value="<?php echo $sql_data['vs_bp']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">HR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="HR" name="vs_hr" value="<?php echo $sql_data['vs_hr']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">RR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RR" name="vs_rr" value="<?php echo $sql_data['vs_rr']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">T</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="T" name="vs_t" value="<?php echo $sql_data['vs_t']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">SPO2</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="SPO2" name="vs_spo2" value="<?php echo $sql_data['vs_spo2']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">RBS</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RBS" name="vs_rbs" value="<?php echo $sql_data['vs_rbs']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Physical Examination</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Physical Examination" name="mh_physical" rows="10" autocomplete=off readonly ><?php echo $sql_data['mh_physical']; ?></textarea> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Laboratory Results</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<br /><a href="<?php echo $med_photo; ?>" class="nyroModal" ><img src="<?php echo $med_photo; ?>" alt="" style="border: 3px solid black; width:300px; height:225px;"/></a></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Assessment / Diagnosis</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Symptoms / Diagnosis" name="mh_symp_diag" value="<?php echo $sql_data['mh_symp_diag']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Treatment / Management</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Treatment" name="mh_treat" rows="10" autocomplete=off readonly ><?php echo $sql_data['mh_treat']; ?></textarea> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Examining Physician</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Examining Physician" name="mh_physician" value="<?php echo $sql_data['mh_physician']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Physician License No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Examining Physician License No" name="mh_license" value="<?php echo $sql_data['mh_license']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>


					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
							<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />							
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
<?php
	}else{
		echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
		$url = "index.php";
		echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
	}
?>
	