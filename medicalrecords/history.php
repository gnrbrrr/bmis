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

?>

	<form class="form-horizontal" method="post" action="process.php?action=add_history" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Patient</h3>
				<hr />	
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Name of Patient:</label>
						<div class="col-sm-9">
							<div class="input-group">
								<label class="control-label" style="color:#663399; font-weight:bold;"><?php echo $sql_data['pi_name']; ?></label> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Age:</label>
						<div class="col-sm-9">
							<div class="input-group">
								<label class="control-label" style="color:#663399; font-weight:bold;"><?php echo $sql_data['pi_age']; ?></label> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Sex:</label>
						<div class="col-sm-9">
							<div class="input-group">
								<label class="control-label" style="color:#663399; font-weight:bold;"><?php echo $sql_data['pi_sex']; ?></label> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Address:</label>
						<div class="col-sm-9">
							<div class="input-group">
								<label class="control-label" style="color:#663399; font-weight:bold;"><?php echo $sql_data['pi_home_address']; ?></label> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.:</label>
						<div class="col-sm-9">
							<div class="input-group">
								<label class="control-label" style="color:#663399; font-weight:bold;"><?php echo $sql_data['pi_contact']; ?></label> </div>
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
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Examination" name="mh_date_exam" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Allergies Food and Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Allergies Food and Medication" name="mh_afm" autocomplete=off /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Past Illness/es</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Past Illness/es*" name="mh_past_ill" autocomplete=off /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Present Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Present Medication" name="mh_pres_med" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Chief Complaint</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Chief Complaint" name="mh_chief" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">History of Present Illness</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="History of Present Illness" name="mh_history" rows="10" autocomplete=off ></textarea></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">BP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="BP" name="vs_bp" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">HR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="HR" name="vs_hr" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">RR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RR" name="vs_rr" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">T</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="T" name="vs_t" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">SPO2</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="SPO2" name="vs_spo2" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">RBS</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RBS" name="vs_rbs" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Physical Examination</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Physical Examination" name="mh_physical" rows="10" autocomplete=off ></textarea> </div>
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
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Symptoms / Diagnosis" name="mh_symp_diag" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Treatment / Management</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Treatment / Management" name="mh_treat" rows="10" autocomplete=off ></textarea> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Examining Physician</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Examining Physician" name="mh_physician" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Physician License No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Examining Physician License No" name="mh_license" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Save</button>
						<a href="index.php?view=detail&id=<?php echo $sql_data['pi_id']; ?>" class="btn btn-inverse waves-effect waves-light"><span>Cancel</span></a>
						<input name="id" type="hidden" value="<?php echo $id; ?>" />
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
	