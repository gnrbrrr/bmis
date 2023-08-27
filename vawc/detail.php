<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$id = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM tbl_new_vwac WHERE vwac_id = '$id'");
$sql->execute();
$sql_data = $sql->fetch();

$time_report = $sql_data['time_report'];
$time_report_reformatted = date("H:i", strtotime($time_report));

$time_incident = $sql_data['time_incident'];
$time_incident_reformatted = date("H:i", strtotime($time_incident));

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php?view=vawc_list'">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">VAWC</h3>
				<p class="text-muted m-b-30 font-13"> Add VAWC Records </p>
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
						else if($errorMessage == 'Client already exist! Data entry failed.')
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
						<label for="exampleInputuname" class="col-sm-3 control-label">Report Entry Number</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" name="ren_field" style="width:300px;" value="<?php echo $sql_data['entry_number']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Type Of Incident</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" name="toi_field" style="width:300px;" value="<?php echo $sql_data['incident_type']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Of Report</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" name="date_report" style="width:300px;" value="<?php echo $sql_data['date_report']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Of Report</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" name="time_report" style="width:300px;" value="<?php echo $time_report_reformatted; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					
					
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="white-box">
			<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">A. IMPORMASYON NG NAGREREKLAMO (REPORTING PERSON DATA)</h3>
				<div class="col-md-6">
					<div class="white-box">
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Of Incident</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="exampleInputuname" name="date_incident" value="<?php echo $sql_data['date_incident']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Time Of Incident</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="time" class="form-control" id="exampleInputuname" name="time_incident" value="<?php echo $time_incident_reformatted; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Contact Number</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="report_contact_number" value="<?php echo $sql_data['report_contact_number']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">ID Presented</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="id_presented" value="<?php echo $sql_data['id_presented']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Pronoun (Ms. Mr. Mrs.)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="id_presented" value="<?php echo $sql_data['pronoun1']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Last Name (Apelyido)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="last_name" value="<?php echo $sql_data['last_name']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Given Name (Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="given_name" value="<?php echo $sql_data['given_name']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name (Gitnang Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="middle_name" value="<?php echo $sql_data['middle_name']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Extension (jr, Sr, II, IV, ETC.)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="name_extension" value="<?php echo $sql_data['name_extension']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Nickname (Palayaw)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="nickname" value="<?php echo $sql_data['nickname']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Citizenship</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="citizenship" value="<?php echo $sql_data['citizenship']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
							<div class="col-sm-9">
								<div class="input-group">									
									<select id="gender" class="select2" name="gender" style="width:117px;" disabled>
										<option value="<?php echo $sql_data['gender']; ?>"><?php echo $sql_data['gender']; ?></option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Civil Status</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="civil_status" class="select2" name="civil_status" style="width:150px;" disabled>
										<option value="<?php echo $sql_data['civil_status']; ?>"><?php echo $sql_data['civil_status']; ?></option>
										<option value="Single">Single</option>
										<option value="In-Relationship">In-Relationship</option>
										<option value="Married">Married</option>
										<option value="Widow">Widow</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Of Birth</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="exampleInputuname" name="birth_date" value="<?php echo $sql_data['birth_date']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>						
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="white-box">
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="age" value="<?php echo $sql_data['age']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Place Of Birth</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="birth_place" value="<?php echo $sql_data['birth_place']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="educational_attainment" class="select2" name="educational_attainment" style="width:217px;" disabled>
										<option value="<?php echo $sql_data['educational_attainment']; ?>"><?php echo $sql_data['educational_attainment']; ?></option>
										<option value="High School (Grade 7 - 10)">High School (Grade 7 - 10)</option>
										<option value="Senior High (Grade 11 - 12)">Senior High (Grade 11 - 12)</option>
										<option value="Tesda Certificate">Tesda Certificate</option>
										<option value="College Undergraduate">College Undergraduate</option>
										<option value="College Degree">College Degree</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="occupation" class="select2" name="occupation" style="width:120px;" disabled>
										<option value="<?php echo $sql_data['occupation']; ?>"><?php echo $sql_data['occupation']; ?></option>
										<option value="Unemployed">Unemployed</option>
										<option value="Employed">Employed</option>
										<option value="Self Employed">Self Employed</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Address</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<textarea class="form-control" id="exampleInputuname" style="width:340px; resize:vertical; min-height:60px; max-height:100px;" name="current_address" autocomplete=off readonly ><?php echo $sql_data['current_address']; ?></textarea> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Barangay</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="barangay" value="<?php echo $sql_data['barangay']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Town/City</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="town_city" value="<?php echo $sql_data['town_city']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Province</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="province" value="<?php echo $sql_data['province']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						
					</div>					
				</div>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="white-box">
			<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">B. IMPORMASYON NG SUSPEK (SUSPECT DATA)</h3>
				<div class="col-md-6">
					<div class="white-box">
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Last Name (Apelyido)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_last_name" value="<?php echo $sql_data['sus_last_name']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Given Name (Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_given_name" value="<?php echo $sql_data['sus_given_name']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name (Gitnang Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_middle_name" value="<?php echo $sql_data['sus_middle_name']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Extension (jr, Sr, II, IV, ETC.)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_name_extension" value="<?php echo $sql_data['sus_name_extension']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Nickname (Palayaw)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_nickname" value="<?php echo $sql_data['sus_nickname']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Citizenship</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_citizenship" value="<?php echo $sql_data['sus_citizenship']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="sus_gender" class="select2" name="sus_gender" style="width:117px;" disabled>
										<option value="<?php echo $sql_data['sus_gender']; ?>"><?php echo $sql_data['sus_gender']; ?></option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Civil Status</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="sus_civil_status" class="select2" name="sus_civil_status" style="width:150px;" disabled>
										<option value="<?php echo $sql_data['sus_civil_status']; ?>"><?php echo $sql_data['sus_civil_status']; ?></option>
										<option value="Single">Single</option>
										<option value="In-Relationship">In-Relationship</option>
										<option value="Married">Married</option>
										<option value="Widow">Widow</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Of Birth</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="exampleInputuname" name="sus_birth_date" value="<?php echo $sql_data['sus_birth_date']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_age" value="<?php echo $sql_data['sus_age']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Place Of Birth</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_birth_place" value="<?php echo $sql_data['sus_birth_place']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
							<div class="col-sm-9">
								<div class="input-group">						
									<select id="sus_educational_attainment" class="select2" name="sus_educational_attainment" style="width:217px;" disabled>
										<option value="<?php echo $sql_data['sus_educational_attainment']; ?>"><?php echo $sql_data['sus_educational_attainment']; ?></option>
										<option value="High School (Grade 7 - 10)">High School (Grade 7 - 10)</option>
										<option value="Senior High (Grade 11 - 12)">Senior High (Grade 11 - 12)</option>
										<option value="Tesda Certificate">Tesda Certificate</option>
										<option value="College Undergraduate">College Undergraduate</option>
										<option value="College Degree">College Degree</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
							<div class="col-sm-9">
								<div class="input-group">							
									<select id="sus_occupation" class="select2" name="sus_occupation" style="width:120px;" disabled>
										<option value="<?php echo $sql_data['sus_occupation']; ?>"><?php echo $sql_data['sus_occupation']; ?></option>
										<option value="Unemployed">Unemployed</option>
										<option value="Employed">Employed</option>
										<option value="Self Employed">Self Employed</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Address</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<textarea class="form-control" id="exampleInputuname" style="width:340px; resize:vertical; min-height:60px; max-height:100px;" name="sus_current_address" autocomplete=off readonly ><?php echo $sql_data['sus_current_address']; ?></textarea> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Barangay</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_barangay" value="<?php echo $sql_data['sus_barangay']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>						
					</div>
					
				</div>
				
				<div class="col-md-6">
					<div class="white-box">
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Town/City</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_town_city" value="<?php echo $sql_data['sus_town_city']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Province</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_province" value="<?php echo $sql_data['sus_province']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Work Address</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<textarea class="form-control" id="exampleInputuname" style="width:340px; resize:vertical; min-height:60px; max-height:100px;" name="sus_work_address" autocomplete=off readonly ><?php echo $sql_data['sus_work_address']; ?></textarea> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Work Barangay</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_barangay2" value="<?php echo $sql_data['sus_barangay2']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Work Town/City</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_town_city2" value="<?php echo $sql_data['sus_town_city2']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Work Province</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_province2" value="<?php echo $sql_data['sus_province2']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">With Previous Criminal Record?</label>
							<div class="col-sm-9">
								<div class="input-group">
									<select id="prev_criminal_rec" class="select2" name="prev_criminal_rec" style="width:50px;" disabled>
										<option value="<?php echo $sql_data['prev_criminal_rec']; ?>"><?php echo $sql_data['prev_criminal_rec']; ?></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Status Of Previous Case</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="status_prev_case" value="<?php echo $sql_data['status_prev_case']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Under The Influence Of</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="influence_of" value="<?php echo $sql_data['influence_of']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="white-box">
			<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">FOR CHILDREN IN CONFLICT WITH LAW</h3>
				<div class="col-md-12">
					<div class="white-box">
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Pangalan Ng Magulang o Guardian</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="parent_guardian_name" value="<?php echo $sql_data['parent_guardian_name']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Address 1</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="parent_guardian_address1" value="<?php echo $sql_data['parent_guardian_address1']; ?>" autocomplete=off readonly/> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Address 2</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="parent_guardian_address2" value="<?php echo $sql_data['parent_guardian_address2']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Child Address</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="child_address" value="<?php echo $sql_data['child_address']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="white-box">
			<h3 class="box-title m-b-0" style="font-size:13px;">OTHER DISTINGUISHING FEATURES (DESCRIBE CLOTHES, VEHICLE, SUNGLASSES, WEAPONS, SCARS, AND OTHER DATA OR ACTIVITY OF THE SUSPECT/S WHICH WERE OBSERVED BY THE REPORTING PERSON AND/OR WITNESS/ES TO IDENTIFY THE SUSPECT/S. THESE ARE IMPORTANT AND MAY BECOME EVIDENCE TO IDENTIFY AND LINK TO THE CRIME THE SUSPECT/S.) USE ADDITIONAL SHEET/S IF NECESSARY.)</h3>
				<div class="col-md-12">
					<div class="white-box">
						<div class="form-group">					
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_additional_info" value="<?php echo $sql_data['sus_additional_info']; ?>" autocomplete=off readonly /> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="white-box">
			<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">C. IMPORMASYON NG BIKTIMA (VICTIM DATA)</h3>
				<div id="victim-info">
					<div class="col-md-6">
						<div class="white-box">
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Pronoun (Ms. Mr. Mrs.)</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="pronoun3" value="<?php echo $sql_data['pronoun3']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Last Name (Apelyido)</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_last_name" value="<?php echo $sql_data['vic_last_name']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Given Name (Pangalan)</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_given_name" value="<?php echo $sql_data['vic_given_name']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name (Gitnang Pangalan)</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_middle_name" value="<?php echo $sql_data['vic_middle_name']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Extension (jr, Sr, II, IV, ETC.)</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_name_extension" value="<?php echo $sql_data['vic_name_extension']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Nickname (Palayaw)</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_nickname" value="<?php echo $sql_data['vic_nickname']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Citizenship</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_citizenship" value="<?php echo $sql_data['vic_citizenship']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
								<div class="col-sm-9">
									<div class="input-group">									
										<select id="victim_gender" class="select2" name="victim_gender" style="width:117px;" disabled>
											<option value="<?php echo $sql_data['vic_gender']; ?>"><?php echo $sql_data['vic_gender']; ?></option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Civil Status</label>
								<div class="col-sm-9">
									<div class="input-group">								
										<select id="victim_civil_status" class="select2" name="victim_civil_status" style="width:150px;" disabled>
											<option value="<?php echo $sql_data['vic_civil_status']; ?>"><?php echo $sql_data['vic_civil_status']; ?></option>
											<option value="Single">Single</option>
											<option value="In-Relationship">In-Relationship</option>
											<option value="Married">Married</option>
											<option value="Widow">Widow</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Date Of Birth</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" name="victim_birth_date" value="<?php echo $sql_data['vic_birth_date']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>						
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="white-box">
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_age" value="<?php echo $sql_data['vic_age']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Place Of Birth</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_birth_place" value="<?php echo $sql_data['vic_birth_place']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
								<div class="col-sm-9">
									<div class="input-group">								
										<select id="victim_educational_attainment" class="select2" name="victim_educational_attainment" style="width:217px;" disabled>
											<option value="<?php echo $sql_data['vic_educational_attainment']; ?>"><?php echo $sql_data['vic_educational_attainment']; ?></option>
											<option value="Elementary Level">Elementary Level</option>
											<option value="Elementary Graduate">Elementary Graduate</option>
											<option value="High School Level">High School Level</option>
											<option value="High School Graduate">High School Graduate</option>
											<option value="Senior High Level">Senior High Level</option>
											<option value="Senior High Graduate">Senior High Graduate</option>
											<option value="Vocational/Tesda Certificate">Vocational/Tesda Certificate</option>
											<option value="College Level">College Level</option>
											<option value="College Degree">College Degree</option>
											<option value="Bachelor's Degree">Bachelor's Degree</option>
											<option value="Master's Degree">Master's Degree</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
								<div class="col-sm-9">
									<div class="input-group">								
										<select id="victim_occupation" class="select2" name="victim_occupation" style="width:120px;" disabled>
											<option value="<?php echo $sql_data['vic_occupation']; ?>"><?php echo $sql_data['vic_occupation']; ?></option>
											<option value="Unemployed">Unemployed</option>
											<option value="Employed">Employed</option>
											<option value="Self Employed">Self Employed</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Current Address</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<textarea class="form-control" id="exampleInputuname" style="width:340px; resize:vertical; min-height:60px; max-height:100px;" name="victim_current_address" autocomplete=off readonly ><?php echo $sql_data['vic_current_address']; ?></textarea> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Current Barangay</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_barangay" value="<?php echo $sql_data['vic_barangay']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Current Town/City</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_town_city" value="<?php echo $sql_data['vic_town_city']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Current Province</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" name="victim_province" value="<?php echo $sql_data['vic_province']; ?>" autocomplete=off readonly /> </div>
								</div>
							</div>

							
						</div>					
					</div>
				</div><!--Victim Info-->
				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php?view=vawc_list'">Back</button>
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