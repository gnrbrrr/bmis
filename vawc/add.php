<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

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
						if($errorMessage == 'Added successfully')
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
								<input type="text" class="form-control" id="exampleInputuname" name="ren_field" style="width:300px;" autocomplete=off required /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Type Of Incident</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" name="toi_field" style="width:300px;" autocomplete=off required /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Of Report</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" name="date_report" style="width:300px;" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time Of Report</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" name="time_report" style="width:300px;" autocomplete=off required /> </div>
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
									<input type="date" class="form-control" id="exampleInputuname" name="date_incident" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Time Of Incident</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="time" class="form-control" id="exampleInputuname" name="time_incident" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Contact Number</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="report_contact_number" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">ID Presented</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="id_presented" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Pronoun (Ms. Mr. Mrs.)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="pronoun1" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Last Name (Apelyido)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="last_name" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Given Name (Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="given_name" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name (Gitnang Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="middle_name" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Extension (jr, Sr, II, IV, ETC.)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="name_extension" autocomplete=off /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Nickname (Palayaw)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="nickname" autocomplete=off /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Citizenship</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="citizenship" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
							<div class="col-sm-9">
								<div class="input-group">									
									<select id="gender" class="select2" name="gender" style="width:117px;">
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
									<select id="civil_status" class="select2" name="civil_status" style="width:150px;">
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
									<input type="date" class="form-control" id="exampleInputuname" name="birth_date" autocomplete=off required /> </div>
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
									<input type="text" class="form-control" id="exampleInputuname" name="age" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Place Of Birth</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="birth_place" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="educational_attainment" class="select2" name="educational_attainment" style="width:217px;">
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
									<select id="occupation" class="occupation1" name="occupation" style="width:120px;">
										<option value="Unemployed">Unemployed</option>
										<option value="Employed">Employed</option>
										<option value="Self Employed">Self Employed</option>
										<option value="Others">Others</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group" id="other_occupation1" style="display:none;">
							<div class="col-sm-9">
								<input type="text" class="form-control" id="occupation_others1" name="occupation_others1" style="border:0; width:200px; border-bottom: 2px solid black; margin-top:-5%; margin-left:36%;" autocomplete=off ></input>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Address</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<textarea class="form-control" id="exampleInputuname" style="width:340px; resize:vertical; min-height:60px; max-height:100px;" name="current_address" autocomplete=off required ></textarea> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Barangay</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="barangay" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Town/City</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="town_city" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Province</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="province" autocomplete=off required /> </div>
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
							<label for="exampleInputuname" class="col-sm-3 control-label">Pronoun (Ms. Mr. Mrs.)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="pronoun2" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Last Name (Apelyido)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_last_name" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Given Name (Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_given_name" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name (Gitnang Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_middle_name" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Extension (jr, Sr, II, IV, ETC.)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_name_extension" autocomplete=off /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Nickname (Palayaw)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_nickname" autocomplete=off /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Citizenship</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_citizenship" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="sus_gender" class="select2" name="sus_gender" style="width:117px;">
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
									<select id="sus_civil_status" class="select2" name="sus_civil_status" style="width:150px;">
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
									<input type="date" class="form-control" id="exampleInputuname" name="sus_birth_date" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_age" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Place Of Birth</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_birth_place" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
							<div class="col-sm-9">
								<div class="input-group">						
									<select id="sus_educational_attainment" class="select2" name="sus_educational_attainment" style="width:217px;">
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
									<select id="sus_occupation" class="occupation2" name="sus_occupation" style="width:120px;">
										<option value="Unemployed">Unemployed</option>
										<option value="Employed">Employed</option>
										<option value="Self Employed">Self Employed</option>
										<option value="Others">Others</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group" id="other_occupation2" style="display:none;">
							<div class="col-sm-9">
								<input type="text" class="form-control" id="occupation_others2" name="occupation_others2" style="border:0; width:200px; border-bottom: 2px solid black; margin-top:-5%; margin-left:36%;" autocomplete=off ></input>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Address</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<textarea class="form-control" id="exampleInputuname" style="width:340px; resize:vertical; min-height:60px; max-height:100px;" name="sus_current_address" autocomplete=off required ></textarea> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Barangay</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_barangay" autocomplete=off required /> </div>
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
									<input type="text" class="form-control" id="exampleInputuname" name="sus_town_city" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Current Province</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_province" autocomplete=off required /> </div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Work Address</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<textarea class="form-control" id="exampleInputuname" style="width:340px; resize:vertical; min-height:60px; max-height:100px;" name="sus_work_address" autocomplete=off required ></textarea> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Work Barangay</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_barangay2" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Work Town/City</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_town_city2" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Work Province</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="sus_province2" autocomplete=off required /> </div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">With Previous Criminal Record?</label>
							<div class="col-sm-9">
								<div class="input-group">
									<select id="prev_criminal_rec" class="select2" name="prev_criminal_rec" style="width:50px;">
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
									<input type="text" class="form-control" id="exampleInputuname" name="status_prev_case" autocomplete=off /> </div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Under The Influence Of</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="influence_of" autocomplete=off /> </div>
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
									<input type="text" class="form-control" id="exampleInputuname" name="parent_guardian_name" autocomplete=off /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Address 1</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="parent_guardian_address1" autocomplete=off /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Address 2</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="parent_guardian_address2" autocomplete=off /> </div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Child Address</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" name="child_address" autocomplete=off /> </div>
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
									<input type="text" class="form-control" id="exampleInputuname" name="sus_additional_info" autocomplete=off /> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="white-box">
			<span style="color:black;">Same Information as Reporting Person?</span>
			<select id="same-info" name="same_info" class="same-info">
				<option value="No">No</option>
				<option value="Yes">Yes</option>
			</select><br />
			<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">C. IMPORMASYON NG BIKTIMA (VICTIM DATA)</h3>
			<div id="victim-info">
				<div class="col-md-6">
					<div class="white-box">
						<div class="form-group">
							<label for="pronoun3" class="col-sm-3 control-label">Pronoun (Ms. Mr. Mrs.)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="pronoun3" name="pronoun3" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_last_name" class="col-sm-3 control-label">Last Name (Apelyido)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_last_name" name="victim_last_name" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_given_name" class="col-sm-3 control-label">Given Name (Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_given_name" name="victim_given_name" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_middle_name" class="col-sm-3 control-label">Middle Name (Gitnang Pangalan)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_middle_name" name="victim_middle_name" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_name_extension" class="col-sm-3 control-label">Extension (jr, Sr, II, IV, ETC.)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_name_extension" name="victim_name_extension" autocomplete=off /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_nickname" class="col-sm-3 control-label">Nickname (Palayaw)</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_nickname" name="victim_nickname" autocomplete=off /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_citizenship" class="col-sm-3 control-label">Citizenship</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_citizenship" name="victim_citizenship" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_gender" class="col-sm-3 control-label">Gender</label>
							<div class="col-sm-9">
								<div class="input-group">									
									<select id="victim_gender" class="select2" name="victim_gender" style="width:117px;">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_civil_status" class="col-sm-3 control-label">Civil Status</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="victim_civil_status" class="select2" name="victim_civil_status" style="width:150px;">
										<option value="Single">Single</option>
										<option value="In-Relationship">In-Relationship</option>
										<option value="Married">Married</option>
										<option value="Widow">Widow</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_birth_date" class="col-sm-3 control-label">Date Of Birth</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="victim_birth_date" name="victim_birth_date" autocomplete=off required /> </div>
							</div>
						</div>						
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="white-box">
						<div class="form-group">
							<label for="victim_age" class="col-sm-3 control-label">Age</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_age" name="victim_age" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_birth_place" class="col-sm-3 control-label">Place Of Birth</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_birth_place" name="victim_birth_place" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_educational_attainment" class="col-sm-3 control-label">Educational Attainment</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="victim_educational_attainment" class="select2" name="victim_educational_attainment" style="width:217px;">
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
							<label for="victim_occupation" class="col-sm-3 control-label">Occupation</label>
							<div class="col-sm-9">
								<div class="input-group">								
									<select id="victim_occupation" class="occupation3" name="victim_occupation" style="width:120px;">
										<option value="Unemployed">Unemployed</option>
										<option value="Employed">Employed</option>
										<option value="Self Employed">Self Employed</option>
										<option value="Others">Others</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group" id="other_occupation3" style="display:none;">
							<div class="col-sm-9">
								<input type="text" class="form-control" id="occupation_others3" name="occupation_others3" style="border:0; width:200px; border-bottom: 2px solid black; margin-top:-5%; margin-left:36%;" autocomplete=off ></input>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_current_address" class="col-sm-3 control-label">Current Address</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<textarea class="form-control" id="victim_current_address" style="width:340px; resize:vertical; min-height:60px; max-height:100px;" name="victim_current_address" autocomplete=off required ></textarea> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_barangay" class="col-sm-3 control-label">Current Barangay</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_barangay" name="victim_barangay" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_town_city" class="col-sm-3 control-label">Current Town/City</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_town_city" name="victim_town_city" autocomplete=off required /> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="victim_province" class="col-sm-3 control-label">Current Province</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="victim_province" name="victim_province" autocomplete=off required /> </div>
							</div>
						</div>

						
					</div>					
				</div>
			</div><!--Victim Info-->
			<div class="form-group m-b-0">
				<div class="col-sm-offset-3 col-sm-9">
					<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
					<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
				</div>
			</div>
		</div>
	</form>
	</div>

	<script type="text/javascript">

	$(".occupation1").click(function(){

		var value_checked = $(this).val();

		if(value_checked == "Others"){
			$("#other_occupation1").show();
			
		}else{
			$("#other_occupation1").hide();
			$("#occupation_others1").val("");
		}
	});

	$(".occupation2").click(function(){

		var value_checked = $(this).val();

		if(value_checked == "Others"){
			$("#other_occupation2").show();
			
		}else{
			$("#other_occupation2").hide();
			$("#occupation_others2").val("");
		}
	});

	$(".occupation3").click(function(){

		var value_checked = $(this).val();

		if(value_checked == "Others"){
			$("#other_occupation3").show();
			
		}else{
			$("#other_occupation3").hide();
			$("#occupation_others3").val("");
		}
	});

	$(".same-info").click(function(){

		var value_checked = $(this).val();

		if(value_checked == "Yes"){
			$("#victim-info").hide();

			$("#pronoun3").removeAttr("required");
			$("#victim_last_name").removeAttr("required");
			$("#victim_given_name").removeAttr("required");
			$("#victim_middle_name").removeAttr("required");
			$("#victim_citizenship").removeAttr("required");
			$("#victim_birth_date").removeAttr("required");
			$("#victim_age").removeAttr("required");
			$("#victim_birth_place").removeAttr("required");
			$("#victim_current_address").removeAttr("required");
			$("#victim_barangay").removeAttr("required");
			$("#victim_town_city").removeAttr("required");
			$("#victim_province").removeAttr("required");

		}else{
			$("#victim-info").show();

			$("#pronoun3").attr("required", true);
			$("#victim_last_name").attr("required", true);
			$("#victim_given_name").attr("required", true);
			$("#victim_middle_name").attr("required", true);
			$("#victim_citizenship").attr("required", true);
			$("#victim_birth_date").attr("required", true);
			$("#victim_age").attr("required", true);
			$("#victim_birth_place").attr("required", true);
			$("#victim_current_address").attr("required", true);
			$("#victim_barangay").attr("required", true);
			$("#victim_town_city").attr("required", true);
			$("#victim_province").attr("required", true);

		}
	});

	$(".cr").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "1"){
			$("#con1").show();
		}
		else{
			$("#con1").hide();
		}
		
		

		
		if(value_checked == "1"){
			$("#con2").show();
		}
		else{
			$("#con2").hide();
		}
		


		if(value_checked == "1"){
			$("#con3").show();
		}
		else{
			$("#con3").hide();
		}
		
	
		
		if(value_checked == "1"){
			$("#con4").show();
		}
		else{
			$("#con4").hide();
		}
		
		

		if(value_checked == "1"){
			$("#con5").show();
		}
		else{
			$("#con5").hide();
		}
		
		
});
</script>
<style>
	.control-label{
		color:black;
	}
</style>