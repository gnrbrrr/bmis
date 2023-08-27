<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$id = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM tbl_rescue WHERE res_id = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();

	$time_incident = $sql_data['ph_time_incident'];
	$time_incident_formatted = date("H:i", strtotime($time_incident));

	$time_report = $sql_data['ph_time_report'];
	$time_report_formatted = date("H:i", strtotime($time_report));

	$time_arrival = $sql_data['ph_time_arrival'];
	$time_arrival_formatted = date("H:i", strtotime($time_arrival));

	$pa_time = $sql_data['pa_time'];
	$pa_time_formatted = date("H:i", strtotime($pa_time));

	$nb_time = $sql_data['nb_time'];
	$nb_time_formatted = date("H:i", strtotime($nb_time));
?>

	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6"> <!--PRE HOSPITAL START-->
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Pre-Hospital Care Report</h3>
				<hr />
				
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Date of Incident</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-calender"></i></div>
							<input type="date" class="form-control" id="exampleInputuname" placeholder="Date" name="ph_date_incident" value="<?php echo $sql_data['ph_date_incident']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Time of Incident</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-clock"></i></div>
							<input type="time" class="form-control" id="exampleInputuname" placeholder="Time Incident" name="ph_time_incident" value="<?php echo $time_incident_formatted; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Patient's Name</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Patient's Name" name="ph_name" value="<?php echo $sql_data['ph_name']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Patient's Age" name="ph_age" value="<?php echo $sql_data['ph_age']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="ph_gender" class="thor" style="width:fit-content;" disabled>
								<option value="<?php echo $sql_data['ph_gender']; ?>" readonly><?php echo $sql_data['ph_gender']; ?></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Contact No</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-phone"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Patient's Contact No" name="ph_contact" value="<?php echo $sql_data['ph_contact']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Address</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-home"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Patient's Address" name="ph_address" value="<?php echo $sql_data['ph_address']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Incident Case</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-home"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Incident Case" name="ph_case" value="<?php echo $sql_data['ph_case']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Case Type</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="ph_case_type" class="thor" style="width:fit-content;" disabled>
								<option value="<?php echo $sql_data['ph_case_type']; ?>" ><?php echo $sql_data['ph_case_type']; ?></option>
								<option value="Conduction">CONDUCTION</option>
								<option value="Emergency">EMERGENCY</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Time Reported</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-clock"></i></div>
							<input type="time" class="form-control" id="exampleInputuname" placeholder="Time Reported" name="ph_time_report" value="<?php echo $time_report_formatted; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Time of Arrival</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-clock"></i></div>
							<input type="time" class="form-control" id="exampleInputuname" placeholder="Time of Arrival" name="ph_time_arrival" value="<?php echo $time_arrival_formatted; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Location of Incident</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Location of Incident" name="ph_location_incident" value="<?php echo $sql_data['ph_location_incident']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Reported By</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="ph_reported_by" class="thor" style="width:fit-content;" disabled>
								<option value="<?php echo $sql_data['ph_reported_by']; ?>" ><?php echo $sql_data['ph_reported_by']; ?></option>
								<option value="C3">C3</option>
								<option value="B/B">B/B</option>
								<option value="Walk-in">WALK-IN</option>
								<option value="Phone Call">PHONE CALL</option>
								<option value="Traffic/Mapsa">TRAFFIC/MAPSA</option>
							</select>
						</div>
					</div>
				</div>

			</div>
		</div> <!--PRE HOSPITAL END-->

		<div class="col-md-6"><!--PATIENT ASSESSMENT START-->
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Patient Assessment</h3>
				<hr />

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Vaccination Date</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="vaccination date" name="pa_vacs_date" value="<?php echo $sql_data['pa_vacs_date']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Complaint</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Complaint" name="pa_complaint" value="<?php echo $sql_data['pa_complaint']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Allergy</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Allergy" name="pa_allergy" value="<?php echo $sql_data['pa_allergy']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Medication" name="pa_medication" value="<?php echo $sql_data['pa_medication']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Past Hx</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Past Hx" name="pa_past_hx" value="<?php echo $sql_data['pa_past_hx']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Last Meal</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Last Meal" name="pa_last_meal" value="<?php echo $sql_data['pa_last_meal']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Events Prior</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Events Prior" name="pa_events_prior" value="<?php echo $sql_data['pa_events_prior']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onset</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Onset" name="pa_onset" value="<?php echo $sql_data['pa_onset']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Palliation</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Palliation" name="pa_palliation" value="<?php echo $sql_data['pa_palliation']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Quality</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Quality" name="pa_quality" value="<?php echo $sql_data['pa_quality']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Radiation</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Radiation" name="pa_radiation" value="<?php echo $sql_data['pa_radiation']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Severity</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Severity" name="pa_severity" value="<?php echo $sql_data['pa_severity']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-clock"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="Time" name="pa_time" value="<?php echo $pa_time_formatted; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Other MNGT/Assessment</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="OTHER MNGT/ASSESSMENT" name="pa_other" value="<?php echo $sql_data['pa_other']; ?>" autocomplete=off readonly /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Thorough Assessment</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_thor_assess" class="thor" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_thor_assess']; ?>" ><?php echo $sql_data['pa_is_thor_assess']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Rapid Assessment</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_rapid_assess" class="rapid" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_rapid_assess']; ?>" ><?php echo $sql_data['pa_is_rapid_assess']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="via" class="col-sm-3 control-label">O2 Administer</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_o2_add" class="o2" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_o2_adm']; ?>" ><?php echo $sql_data['pa_is_o2_adm']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								</select>
								<input type="text" class="form-control" id="a" placeholder="a" name="pa_o2_a" value="<?php echo $sql_data['o2_value']; ?>" style="display:none;margin-top:3px;" autocomplete=off readonly />
								<input type="text" class="form-control" id="via" placeholder="Via" name="pa_o2_via" value="<?php echo $sql_data['o2_via']; ?>" style="display:none;margin-top:3px;" autocomplete=off readonly />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Dressed Wound</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_dressed_wound" class="dress" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_dressed_wound']; ?>" ><?php echo $sql_data['pa_is_dressed_wound']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">CPR</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_cpr" class="cpr" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_cpr']; ?>" ><?php echo $sql_data['pa_is_cpr']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">IV Line Of Suction Secretion</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_iv_line" class="ivl" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_iv_line']; ?>" ><?php echo $sql_data['pa_is_iv_line']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>						
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="meds2" class="col-sm-3 control-label">Gave Meds</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_gave_med" class="meds" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_gave_med']; ?>" ><?php echo $sql_data['pa_is_gave_med']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>						
								</select>
								<input type="text" class="form-control" id="meds2" placeholder="Med Given" name="med_given" value="<?php echo $sql_data['med_given']; ?>" style="display:none;margin-top:3px;" autocomplete=off readonly />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="bs_ml" class="col-sm-3 control-label">Blood Sugar</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_blood_sugar" class="bs" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_blood_sugar']; ?>" ><?php echo $sql_data['pa_is_blood_sugar']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>								
								</select>
								<input type="text" class="form-control" id="bs_ml" placeholder="mg/dl" name="bs_ml" value="<?php echo $sql_data['bloods_mg_dl']; ?>" style="display:none;margin-top:3px;" autocomplete=off readonly />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Splinting</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_splinting" class="splint" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_splinting']; ?>" ><?php echo $sql_data['pa_is_splinting']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>								
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Complete Spine IMM</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_complete_spine" class="csi" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_is_complete_spine']; ?>" ><?php echo $sql_data['pa_is_complete_spine']; ?></option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>									
								</select>
							</div>
						</div>
					</div>
			</div>
		</div><!--PATIENT ASSESSMENT END-->

		<div class="col-md-6"><!--PA LVL CONSCIOUSNESS START-->
			<div class="white-box">
			<h3 style="color:#663399; font-weight:bold;">Patient Assessment</h3><h6 style="color:#663399; font-weight:bold;">Level of Consciousness</h6>
				<hr />

				<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Option 1</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_option1" class="csi" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_option1']; ?>" ><?php echo $sql_data['pa_option1']; ?></option>
									<option value=""> </option>
									<option value="Alert">Alert</option>
									<option value="Verbal">Verbal</option>
									<option value="Pain">Pain</option>
									<option value="Unconscious">Unconscious</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Option 2</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_option2" class="csi" style="width:100px;" disabled>
									<option value="<?php echo $sql_data['pa_option2']; ?>" ><?php echo $sql_data['pa_option2']; ?></option>
									<option value=""> </option>
									<option value="Green">Green</option>									
									<option value="Yellow">Yellow</option>									
									<option value="Red">Red</option>									
									<option value="Black">Black</option>									
								</select>
							</div>
						</div>
					</div>

					<!--
					<div class="form-group">
						<center><table id="loc" style="text-align: center;">
							<tr>
								<th>Alert</th>
								<th>Verbal</th>
								<th>Pain</th>
								<th>Unconscious</th>
							</tr>
							<tr>
								<td><input type="checkbox" id="alert" placeholder="" name="pa_alert" autocomplete=off value="Yes" /></td>
								<td><input type="checkbox" id="verbal" placeholder="" name="pa_verbal" autocomplete=off value= "Yes" /></td>
								<td><input type="checkbox" id="pain" placeholder="" name="pa_pain" autocomplete=off value="Yes" /></td>
								<td><input type="checkbox" id="unconscious" placeholder="" name="pa_unconscious" autocomplete=off value="Yes" /></td>
							</tr>
						</table></center>
					</div>
					-->

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onscene BP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="BP" name="pa_on_bp" value="<?php echo $sql_data['pa_on_bp']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onscene PR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="PR" name="pa_on_pr" value="<?php echo $sql_data['pa_on_pr']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onscene RR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RR" name="pa_on_rr" value="<?php echo $sql_data['pa_on_rr']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onscene TEMP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="TEMP" name="pa_on_temp" value="<?php echo $sql_data['pa_on_temp']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onscene SPO2</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="spo2" name="pa_on_spo2" value="<?php echo $sql_data['pa_on_spo2']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit BP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="BP" name="pa_in_bp" value="<?php echo $sql_data['pa_in_bp']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit PR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="PR" name="pa_in_pr" value="<?php echo $sql_data['pa_in_pr']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit RR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RR" name="pa_in_rr" value="<?php echo $sql_data['pa_in_rr']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit TEMP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="TEMP" name="pa_in_temp" value="<?php echo $sql_data['pa_in_temp']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit SPO2</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="spo2" name="pa_in_spo2" value="<?php echo $sql_data['pa_in_spo2']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
			</div>
		</div> <!--PA LVL CONSCIOUSNESS END-->

		<div class="col-md-6"><!--GLASGOW COMA SCALE START-->
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Glasgow Coma Scale</h3>
				<hr />

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Eyes</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="gcs_eyes" class="splint" style="width:fit-content;" disabled>
								<option value="<?php echo $sql_data['gcs_eyes']; ?>" ><?php echo $sql_data['gcs_eyes']; ?></option>
								<option value="BLINKS AND OPEN EYES SPONTANEOUSLY">Blinks and Open Eyes Spontaneously</option>
								<option value="OPEN EYES TO VOICE">Open Eyes To Voice</option>
								<option value="OPEN EYES TO PAIN">Open Eyes To Pain</option>
								<option value="DOES NOT OPEN EYE">Does Not Open Eye</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Verbal</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="gcs_verbal" class="splint" style="width:fit-content;" disabled>
								<option value="<?php echo $sql_data['gcs_verbal']; ?>" ><?php echo $sql_data['gcs_verbal']; ?></option>
								<option value="ORIENTED AND CONVERSES">Oriented and Converses</option>
								<option value="CONFUSED AND DISORIENTED">Confused and Disoriented</option>
								<option value="UTTER INAPPROPRIATE WORDS">Utter Inappropriate Words</option>
								<option value="INCOMPREHENSIVE SOUND">Incomprehensive Sound</option>
								<option value="MAKES NO SOUND">Makes No Sound</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Infant</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="gcs_infant" class="splint" style="width:fit-content;" disabled>
								<option value="<?php echo $sql_data['gcs_infant']; ?>" ><?php echo $sql_data['gcs_infant']; ?></option>
								<option value="BABBLES">Babbles</option>
								<option value="IRRITABLE">Irritable</option>
								<option value="CRIES TO PAIN">Cries To Pain</option>
								<option value="MOANS">Moans</option>
								<option value="NONE">None</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Motor</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="gcs_motor" class="splint" style="width:fit-content;" disabled>
								<option value="<?php echo $sql_data['gcs_motor']; ?>" ><?php echo $sql_data['gcs_motor']; ?></option>
								<option value="OBEYS COMMAND">Obeys Command</option>
								<option value="LOCALIZES TO PAIN">Localizes To Pain</option>
								<option value="ABNORMAL FLEXION/WITHDRAWAL TO PAIN">Abnormal Flexion/Withdrawal To Pain</option>
								<option value="ABNORMAL FLEXION TO PAIN">Abnormal Flexion To Pain</option>
								<option value="EXTENSION TO PAIN">Extension To Pain</option>
								<option value="NO MOVEMENT">No Movement</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div><!--GLASGOW COMA SCALE END-->

		<div class="col-md-6"><!--OB HISTORY START-->
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">OB History</h3>
				<hr />

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">LMP</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="LMP" name="ob_lmp" value="<?php echo $sql_data['ob_lmp']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">EDC</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="EDC" name="ob_edc" value="<?php echo $sql_data['ob_edc']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">G</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="G" name="ob_g" value="<?php echo $sql_data['ob_g']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">P</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="P" name="ob_p" value="<?php echo $sql_data['ob_p1']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">AOG Weeks</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="AOG WEEKS" name="ob_aog_wks" value="<?php echo $sql_data['ob_aog_wks']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">AOG Days</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="AOG DAYS" name="ob_aog_days" value="<?php echo $sql_data['ob_aog_day']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">T</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="T" name="ob_t" value="<?php echo $sql_data['ob_t']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">P</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="P" name="ob_p2" value="<?php echo $sql_data['ob_p2']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">A</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="A" name="ob_a" value="<?php echo $sql_data['ob_a']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">L</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="L" name="ob_l" value="<?php echo $sql_data['ob_l']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

			</div>
		</div><!--OB HISTORY END-->

		<div class="col-md-6"><!--NEWBORN START-->
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Newborn</h3>
				<hr />

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="nb_gender" class="thor" style="width:fit-content;" disabled>
								<option value="<?php echo $sql_data['nb_gender']; ?>" ><?php echo $sql_data['nb_gender']; ?></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Time</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="time" class="form-control" id="exampleInputuname" placeholder="" name="nb_time" value="<?php echo $nb_time_formatted; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Placenta</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Placenta" name="nb_placenta" value="<?php echo $sql_data['nb_placenta']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>
				
			</div>
		</div><!--NEWBORN END-->

		<div class="col-md-6"><!--APGAR SCORE START-->
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Apgar Score</h3>
				<hr />

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">1 MIN</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="1 MIN" name="as_1min" value="<?php echo $sql_data['as_1min']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">5 MINS</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="5 MINS" name="as_5min" value="<?php echo $sql_data['as_5min']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">10 MINS</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="10 MINS" name="as_10min" value="<?php echo $sql_data['as_10min']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Receiving Facility</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Receiving Facility" name="as_rec_fac" value="<?php echo $sql_data['receiving_facility']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Receiving MD/Nurse/Midwife</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Team Leader" name="as_receiving" value="<?php echo $sql_data['receiver']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Team Leader</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Team Leader" name="as_team_lead" value="<?php echo $sql_data['team_leader']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Driver</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Driver" name="as_driver" value="<?php echo $sql_data['driver']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Rescuer/s</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Rescuer/s" name="as_rescuers" value="<?php echo $sql_data['rescuers']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Accomplished By</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Accomplished By" name="as_acc_by" value="<?php echo $sql_data['accomplished_by']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Encoded By</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Encoded By" name="as_enc_by" value="<?php echo $sql_data['encoded_by']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>
				
			</div>
		</div><!--APGAR SCORE END-->

		<div class="col-md-6"><!--REFUSAL TREATMENT START-->
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Refusal Of Treatment</h3>
				<hr />

				<div class="form-group">
					<p class="ref_treat">&nbsp;&nbsp;&nbsp;&nbsp;I hereby refuse treatment / transport to a hospital, and I acknowledge that such treatment / transportation
						 was advised by the ambulance crew or physician. I hereby such persons from liability for respecting and following my expressed wishes.</p>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Witnessed</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Witnessed" name="witness" value="<?php echo $sql_data['rot_witness']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>
				
			</div>
		</div><!--REFUSAL TREATMENT END-->

		<div class="col-md-6"><!--ACCEPTANCE OF SERVICE START-->
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Acceptance Of Service</h3>
				<hr />

				<div class="form-group">
					<p class="acc_serv">&nbsp;&nbsp;&nbsp;&nbsp;I, the undersigned, hereby authorized the <b>BARANGAY MAGALLANES DRRM</b> to provide me with emergency or
					 non-emergency transportation and/or any Medical treatment of services it deems necessary.</p>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Name of Patient/Relative</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Patient/Relative" name="patient_rela" value="<?php echo $sql_data['aos_name']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>
				
			</div>
		</div><!--ACCEPTANCE OF SERVICE END-->

		<div class="col-md-6"><!--EMERGENCY CARE AND TRANSPORTATION START-->
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Refusal Of Treatment</h3>
				<hr />

				<div class="form-group">
					<p class="ref_treat">&nbsp;&nbsp;&nbsp;&nbsp;I acknowledge that <b>BM DRRM</b> is not responsible for any risk that may happen to the patient upon
					 transport by the ambulance and if, at any time, due to such circumstances as an injury or sudden illness, medical treatment is necessary,
					  I authorize the crew <b>BM DRRM</b> to take whatever emergency measures they deem necessary for the Patient while in transport.</p>
					<br />
					<p class="ref_treat">&nbsp;&nbsp;&nbsp;&nbsp;I understand that this may involve contacting a doctor, interpreting and carrying out his or her instructions,
						 and transporting the Patient to a hospital or doctor's office, including the possible use of an ambulance.</p>
					<br />
					<p class="ref_treat">&nbsp;&nbsp;&nbsp;&nbsp;If possible, the hospital will be</p>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Hospital</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Hospital" name="hospital" value="<?php echo $sql_data['ect_hospital_name']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<p class="ref_treat">&nbsp;&nbsp;&nbsp;&nbsp;or the doctor contacted will be</p>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Doctor</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Doctor" name="doctor_name" value="<?php echo $sql_data['ect_doctor_name']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Doctor's Address</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Doctor's Address" name="doctor_address" value="<?php echo $sql_data['ect_doctor_address']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>
				
				<div class="form-group">
					<p class="ref_treat">&nbsp;&nbsp;&nbsp;&nbsp;<b>I, the undersigned hereby authorize the BARANGAY MAGALLANES DRRM to provide me with transportation or transfer.</b></p>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Name</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Name" name="ect_name" value="<?php echo $sql_data['ect_requestor_name']; ?>" autocomplete=off readonly /> </div>
					</div>
				</div>

				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
					</div>
				</div>

			</div>
		</div><!--EMERGENCY CARE AND TRANSPORTATION END-->
	</form>
	<style>
		label{
			color:black;
		}

		#loc th, #loc td{
			padding-left: 2rem;
			padding-right: 2rem;
		}

		.ref_treat, .acc_serv{
			color: black;
			text-align: justify;
		}
	</style>
	<script>
			var o2_checker = "<?php echo $sql_data['pa_is_o2_adm']; ?>";

			if(o2_checker == "Yes"){
				document.getElementById("a").style.display = "block";
				document.getElementById("via").style.display = "block";
			}else{
				document.getElementById("a").style.display = "none";
				document.getElementById("via").style.display = "none";
			}

			var med_given_checker = "<?php echo $sql_data['pa_is_gave_med']; ?>";

			if(med_given_checker == "Yes"){
				document.getElementById("meds2").style.display = "block";
			}else{
				document.getElementById("meds2").style.display = "none";
			}

			var blood_sug_checker = "<?php echo $sql_data['pa_is_blood_sugar']; ?>";

			if(blood_sug_checker == "Yes"){
				document.getElementById("bs_ml").style.display = "block";
			}else{
				document.getElementById("bs_ml").style.display = "none";
			}
	</script>
<?php
	}else{
		echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
		$url = "index.php";
		echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
	}
?>