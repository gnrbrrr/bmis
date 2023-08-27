<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$id = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM tbl_patient_info p, tbl_med_history m WHERE m.med_id = '$id' AND m.pi_id = p.pi_id");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();

	if($sql_data['history_image']){
		$med_photo = WEB_ROOT . 'images/medical/' . $sql_data['history_image'];
	}else{
		$med_photo = WEB_ROOT . 'images/resident/noimage.png';
	}

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
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Examination" name="mh_date_exam" value="<?php echo $sql_data['history_date_examination']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Allergies Food and Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Allergies Food and Medication" name="mh_afm" value="<?php echo $sql_data['history_allergies_food_medication']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Past Illness/es</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Past Illness/es*" name="mh_past_ill" value="<?php echo $sql_data['history_past_illness']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Present Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Present Medication" name="mh_pres_med" value="<?php echo $sql_data['history_present_medication']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Chief Complaint</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Chief Complaint" name="mh_chief" value="<?php echo $sql_data['history_chief']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">History of Present Illness</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="History of Present Illness" name="mh_history" rows="10" autocomplete=off readonly ><?php echo $sql_data['history_history']; ?></textarea></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">BP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="BP" name="vs_bp" value="<?php echo $sql_data['history_bp']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">HR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="HR" name="vs_hr" value="<?php echo $sql_data['history_hr']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">RR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RR" name="vs_rr" value="<?php echo $sql_data['history_rr']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">T</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="T" name="vs_t" value="<?php echo $sql_data['history_t']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">SPO2</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="SPO2" name="vs_spo2" value="<?php echo $sql_data['history_spo2']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">RBS</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RBS" name="vs_rbs" value="<?php echo $sql_data['history_rbs']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Physical Examination</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Physical Examination" name="mh_physical" rows="10" autocomplete=off readonly ><?php echo $sql_data['history_physical']; ?></textarea> </div>
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
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Symptoms / Diagnosis" name="mh_symp_diag" value="<?php echo $sql_data['history_symp_diag']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Treatment / Management</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Treatment / Management" name="mh_treat" rows="10" autocomplete=off readonly ><?php echo $sql_data['history_treat']; ?></textarea> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Examining Physician</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Examining Physician" name="mh_physician" value="<?php echo $sql_data['history_physician']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Physician License No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Examining Physician License No" name="mh_license" value="<?php echo $sql_data['history_license']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-actions">
						<a href="index.php?view=detail&id=<?php echo $sql_data['pi_id']; ?>" class="btn btn-inverse waves-effect waves-light"><span>Back</span></a>
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
	