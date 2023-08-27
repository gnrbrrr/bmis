<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
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
							<input type="date" class="form-control" id="exampleInputuname" placeholder="Date" name="ph_date_incident" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Time of Incident</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-clock"></i></div>
							<input type="time" class="form-control" id="exampleInputuname" placeholder="Time Incident" name="ph_time_incident" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Patient's Name</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Patient's Name" name="ph_name" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Patient's Age" name="ph_age" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="ph_gender" class="thor" style="width:fit-content;">
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
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Patient's Contact No" name="ph_contact" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Address</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-home"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Patient's Address" name="ph_address" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Incident Case</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Incident Case" name="ph_case" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Case Type</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="ph_case_type" class="thor" style="width:fit-content;">
								<option value="CONDUCTION">CONDUCTION</option>
								<option value="EMERGENCY">EMERGENCY</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Time Reported</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-clock"></i></div>
							<input type="time" class="form-control" id="exampleInputuname" placeholder="Time Reported" name="ph_time_report" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Time of Arrival</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-clock"></i></div>
							<input type="time" class="form-control" id="exampleInputuname" placeholder="Time of Arrival" name="ph_time_arrival" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Location of Incident</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Location of Incident" name="ph_location_incident" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Reported By</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="ph_reported_by" class="thor" style="width:fit-content;">
								<option value="C3">C3</option>
								<option value="B/B">B/B</option>
								<option value="Walk-in">Walk-in</option>
								<option value="Phone Call">Phone Call</option>
								<option value="Traffic/Mapsa">Traffic/Mapsa</option>
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
								<input type="date" class="form-control" id="exampleInputuname" placeholder="vaccination date" name="pa_vacs_date" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Complaint</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Complaint" name="pa_complaint" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Allergy</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Allergy" name="pa_allergy" autocomplete=off /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Medication</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Medication" name="pa_medication" autocomplete=off /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Past Hx</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Past Hx" name="pa_past_hx" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Last Meal</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Last Meal" name="pa_last_meal" autocomplete=off /></div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Events Prior</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Events Prior" name="pa_events_prior" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onset</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Onset" name="pa_onset" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Palliation</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Palliation" name="pa_palliation" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Quality</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Quality" name="pa_quality" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Radiation</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Radiation" name="pa_radiation" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Severity</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Severity" name="pa_severity" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-clock"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="Time" name="pa_time" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Other MNGT/Assessment</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="OTHER MNGT/ASSESSMENT" name="pa_other" autocomplete=off /></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Thorough Assessment</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_thor_assess" class="thor" style="width:100px;">
									<option value=" "> </option>
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
								<select name="pa_rapid_assess" class="rapid" style="width:100px;">
									<option value=" "> </option>
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
								<select name="pa_o2_add" class="o2" style="width:100px;">
									<option value=" "> </option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								</select>
								<input type="text" class="form-control" id="a" placeholder="a" name="pa_o2_a" style="display:none;margin-top:3px;" autocomplete=off />
								<input type="text" class="form-control" id="via" placeholder="Via" name="pa_o2_via" style="display:none;margin-top:3px;" autocomplete=off />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Dressed Wound</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_dressed_wound" class="dress" style="width:100px;">
									<option value=" "> </option>
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
								<select name="pa_cpr" class="cpr" style="width:100px;">
									<option value=" "> </option>
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
								<select name="pa_iv_line" class="ivl" style="width:100px;">
									<option value=" "> </option>
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
								<select name="pa_gave_med" class="meds" style="width:100px;">
									<option value=" "> </option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>						
								</select>
								<input type="text" class="form-control" id="meds2" placeholder="Med Given" name="med_given" style="display:none;margin-top:3px;" autocomplete=off />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="bs_ml" class="col-sm-3 control-label">Blood Sugar</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_blood_sugar" class="bs" style="width:100px;">
									<option value=" "> </option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>								
								</select>
								<input type="text" class="form-control" id="bs_ml" placeholder="mg/dl" name="bs_ml" style="display:none;margin-top:3px;" autocomplete=off />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Splinting</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_splinting" class="splint" style="width:100px;">
									<option value=" "> </option>
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
								<select name="pa_complete_spine" class="csi" style="width:100px;">
									<option value=" "> </option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>									
								</select>
							</div>
						</div>
					</div>
			</div>
		</div><!--PATIENT ASSESSMENT END-->

		<div class="col-md-6"><!-- PA LVL CONSCIOUSNESS START-->
			<div class="white-box">
			<h3 style="color:#663399; font-weight:bold;">Patient Assessment</h3><h6 style="color:#663399; font-weight:bold;">Level of Consciousness</h6>
				<hr />

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Option 1</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="pa_option1" class="csi" style="width:fit-content;">
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
								<select name="pa_option2" class="csi" style="width:fit-content;">
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
								<input type="text" class="form-control" id="exampleInputuname" placeholder="BP" name="pa_on_bp" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onscene PR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="PR" name="pa_on_pr" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onscene RR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RR" name="pa_on_rr" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onscene TEMP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="TEMP" name="pa_on_temp" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onscene SPO2</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="spo2" name="pa_on_spo2" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit BP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="BP" name="pa_in_bp" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit PR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="PR" name="pa_in_pr" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit RR</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="RR" name="pa_in_rr" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit TEMP</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="TEMP" name="pa_in_temp" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Transit SPO2</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="spo2" name="pa_in_spo2" autocomplete=off required /> </div>
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
							<select name="gcs_eyes" class="splint" style="width:fit-content;">
								<option value=" "> </option>
								<option value="Blinks and Open Eyes Spontaneously">Blinks and Open Eyes Spontaneously</option>
								<option value="Open Eyes To Voice">Open Eyes To Voice</option>
								<option value="Open Eyes To Pain">Open Eyes To Pain</option>
								<option value="Does Not Open Eye">Does Not Open Eye</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Verbal</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="gcs_verbal" class="splint" style="width:fit-content;">
								<option value=" "> </option>
								<option value="Oriented and Converses">Oriented and Converses</option>
								<option value="Confused and Disoriented">Confused and Disoriented</option>
								<option value="Utter Inappropriate Words">Utter Inappropriate Words</option>
								<option value="Incomprehensive Sound">Incomprehensive Sound</option>
								<option value="Makes No Sound">Makes No Sound</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Infant</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="gcs_infant" class="splint" style="width:fit-content;">
								<option value=" "> </option>
								<option value="Babbles">Babbles</option>
								<option value="Irritable">Irritable</option>
								<option value="Cries To Pain">Cries To Pain</option>
								<option value="Moans">Moans</option>
								<option value="None">None</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Motor</label>
					<div class="col-sm-9">
						<div class="input-group">														
							<select name="gcs_motor" class="splint" style="width:fit-content;">
								<option value=" "> </option>
								<option value="Obeys Command">Obeys Command</option>
								<option value="Localizes To Pain">Localizes To Pain</option>
								<option value="Abnormal Flexion/Withdrawal To Pain">Abnormal Flexion/Withdrawal To Pain</option>
								<option value="Abnormal Flexion To Pain">Abnormal Flexion To Pain</option>
								<option value="Extension To Pain">Extension To Pain</option>
								<option value="No Movement">No Movement</option>
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
							<input type="text" class="form-control" id="exampleInputuname" placeholder="LMP" name="ob_lmp" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">EDC</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="EDC" name="ob_edc" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">G</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="G" name="ob_g" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">P</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="P" name="ob_p" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">AOG Weeks</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="AOG WEEKS" name="ob_aog_wks" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">AOG Days</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="AOG DAYS" name="ob_aog_days" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">T</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="T" name="ob_t" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">P</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="P" name="ob_p2" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">A</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="A" name="ob_a" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">L</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="L" name="ob_l" autocomplete=off /> </div>
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
							<select name="nb_gender" class="thor" style="width:fit-content;">
								<option value=" "> </option>
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
							<input type="time" class="form-control" id="exampleInputuname" placeholder="" name="nb_time" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Placenta</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Placenta" name="nb_placenta" autocomplete=off /> </div>
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
							<input type="text" class="form-control" id="exampleInputuname" placeholder="1 MIN" name="as_1min" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">5 MINS</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="5 MINS" name="as_5min" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">10 MINS</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="10 MINS" name="as_10min" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Receiving Facility</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Receiving Facility" name="as_rec_fac" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Receiving MD/Nurse/Midwife</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Receiving" name="as_receiving" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Team Leader</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Team Leader" name="as_team_lead" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Driver</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Driver" name="as_driver" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Rescuer/s</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Rescuer/s" name="as_rescuers" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Accomplished By</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Accomplished By" name="as_acc_by" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Encoded By</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Encoded By" name="as_enc_by" autocomplete=off required /> </div>
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
					<label for="exampleInputuname" class="col-sm-3 control-label">Person who signed</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Person who signed" name="rot_person_sign" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Witnessed</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Witnessed" name="witness" autocomplete=off /> </div>
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
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Patient/Relative" name="patient_rela" autocomplete=off /> </div>
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
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Hospital" name="hospital" autocomplete=off /> </div>
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
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Doctor" name="doctor_name" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Doctor's Address</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Doctor's Address" name="doctor_address" autocomplete=off /> </div>
					</div>
				</div>
				
				<div class="form-group">
					<p class="ref_treat">&nbsp;&nbsp;&nbsp;&nbsp;<b>I, the undersigned hereby authorize the BARANGAY MAGALLANES DRRM to provide me with transportation or transfer.</b></p>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Person who signed</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Person who signed" name="ect_name" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success">Save</button>
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
	