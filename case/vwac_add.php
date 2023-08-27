<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="vwac_process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">VAWC</h3>
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
							
				
				<div class="row">
					<div class="col-md-6">
						<div class="white-box">
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Point of Entry</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Point of Entry" name="p_entry" autocomplete=off required /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Date of Intake</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Intake" name="date" autocomplete=off /> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Address</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<textarea type="text" class="form-control" id="exampleInputuname" placeholder="address" name="address" autocomplete=off ></textarea> </div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Intake by</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Intake by" name="intake_by" autocomplete=off /> </div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Position</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Position" name="position_first" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Case Manager</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Case Manager" name="case_manager" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Position</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Position" name="position_second" autocomplete=off /> </div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Case / Blotter No.</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Case / Blotter No." name="caseno" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">First Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name" name="fname_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name" name="mname_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Last Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name" name="lname_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
								<div class="col-sm-9">
									<div class="input-group">														
										<select name="sex_victim" class="select2" style="width:270px;">
											<option value="Male">Male</option>
											<option value="Female">Female</option>									
										</select>
									</div>
								</div>
							</div>


							<div class="form-group" id="con1" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Date of Birth</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Birth" name="dob_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con2" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Age" name="age_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Civil Status</label>
								<div class="col-sm-9">
									<div class="input-group">														
										<select name="civil_victim" class="select2" style="width:270px;">
											<option value="Male">Single</option>
											<option value="Female">Married</option>	
											<option value="Male">Live-in</option>
											<option value="Female">Seperated</option>	
											<option value="Female">Widow</option>							
										</select>
									</div>
								</div>
							</div>
						
							<div class="form-group" id="con3" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Religion</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Religion" name="religion_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Highest Educational Attainment</label>
								<div class="col-sm-9">
									<div class="input-group">														
										<select name="education_victim" class="select2" style="width:270px;">
											<option value="Male">No formal Education</option>
											<option value="Female">Elementary Level/Graduated (Grade I-VI)</option>	
											<option value="Female">High School Level/Graduated (Grade VII-X)</option>	
											<option value="Male">Senior High School Level / Graduated</option>
											<option value="Female">Vocational</option>	
											<option value="Female">College Level/Graduated</option>		
											<option value="Female">Post Graduate</option>	
											<option value="Female">Others</option>						
										</select>
									</div>
								</div>
							</div>

							<div class="form-group" id="con4" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Complete Address</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Complete Address" name="caddress_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Alternative Address</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Alternative Address" name="altaddress_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Contact No." name="contact_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Occupation" name="occupation_victim" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">With Disablity?</label>
								<div class="col-sm-9">
									<div class="input-group">
										
										<input type="radio" class="kas" name="is_vdisable" id="optionsRadios3" value="0" checked="" /> No
										&nbsp;
										<input type="radio" class="kas" name="is_vdisable" id="optionsRadios4" value="1" /> Yes
									</div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Type of Disability</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Type of Disability" name="typeofdis" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Permanent? or Temporary?</label>
								<div class="col-sm-9">
									<div class="input-group">
										<select name="vdisable_type" class="select2" style="width:270px;">
											<option value="Ongoing">Permanent</option>
											<option value="Completed">Temporary</option>									
										</select>
									</div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">First Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="First Name" name="siba_fname" autocomplete=off /> </div>
								</div>
							</div>
							

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Age" name="siba_age" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Sex</label>
								<div class="col-sm-9">
									<div class="input-group">
										<select name="siba_sex" class="select2" style="width:270px;">
											<option value="Ongoing">Male</option>
											<option value="Completed">Female</option>									
										</select>
									</div>
								</div>
							</div>

							
							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Educational Attainment" name="siba_educ" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">First Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="First Name" name="sibb_fname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Age" name="sibb_age" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Sex</label>
								<div class="col-sm-9">
									<div class="input-group">
										<select name="sibb_sex" class="select2" style="width:270px;">
											<option value="Ongoing">Male</option>
											<option value="Completed">Female</option>									
										</select>
									</div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Educational Attainment" name="sibb_educ" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">First Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="First Name" name="sibc_fname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Age" name="sibc_age" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Sex</label>
								<div class="col-sm-9">
									<div class="input-group">
										<select name="sibc_sex" class="select2" style="width:270px;">
											<option value="Ongoing">Male</option>
											<option value="Completed">Female</option>									
										</select>
									</div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Educational Attainment" name="sibc_educ" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">First Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="vguardian_fname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="vguardian_mname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Last Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="vguardian_lname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="vguardian_contact" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Realtionship to victim-survivor</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="vguardian_relationship" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Complete Address of guardian</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="vguardian_address" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">First Name </label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">First Name </label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perp_fname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name </label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perp_mname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Last Name </label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perp_lname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Alias</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perp_alias" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Sex</label>
								<div class="col-sm-9">
									<div class="input-group">
										<select name="perp_sex" class="select2" style="width:270px;">
											<option value="Ongoing">Male</option>
											<option value="Completed">Female</option>									
										</select>
									</div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Date of Birth</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perp_dob" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perp_age" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Civil Status</label>
								<div class="col-sm-9">
									<div class="input-group">														
										<select name="perp_civil" class="select2" style="width:270px;">
											<option value="Male">Single</option>
											<option value="Female">Married</option>	
											<option value="Male">Live-in</option>
											<option value="Female">Seperated</option>	
											<option value="Female">Widow</option>							
										</select>
									</div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Religion</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perp_religion" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Highest Educational Attainment</label>
								<div class="col-sm-9">
									<div class="input-group">														
										<select name="perp_education" class="select2" style="width:270px;">
											<option value="Male">No formal Education</option>
											<option value="Female">Elementary Level/Graduated (Grade I-VI)</option>	
											<option value="Female">High School Level/Graduated (Grade VII-X)</option>	
											<option value="Male">Senior High School Level / Graduated</option>
											<option value="Female">Vocational</option>	
											<option value="Female">College Level/Graduated</option>		
											<option value="Female">Post Graduate</option>	
											<option value="Female">Others</option>						
										</select>
									</div>
								</div>
							</div>
							
							<div class="form-group" id="con4" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Complete Address</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Complete Address" name="perp_caddress" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Alternative Address</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Alternative Address" name="perp_altaddress" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Contact No." name="perp_contact" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:none;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Occupation" name="perp_occupation" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">With Disablity?</label>
								<div class="col-sm-9">
									<div class="input-group">
										
										<input type="radio" class="kas" name="is_pdisable" id="optionsRadios3" value="0" checked="" /> No
										&nbsp;
										<input type="radio" class="kas" name="is_pdisable" id="optionsRadios4" value="1" /> Yes
									</div>
								</div>
							</div>
							
							
							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Type of Disability</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Type of Disability" name="pdisable_type" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">With Disablity?</label>
								<div class="col-sm-9">
									<div class="input-group">
										
										<input type="radio" class="kas" name="is_pdisable" id="optionsRadios3" value="0" checked="" /> No
										&nbsp;
										<input type="radio" class="kas" name="is_pdisable" id="optionsRadios4" value="1" /> Yes
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Permanent? or Temporary?</label>
								<div class="col-sm-9">
									<div class="input-group">
										<select name="is_temporary" class="select2" style="width:270px;">
											<option value="Ongoing">Permanent</option>
											<option value="Completed">Temporary</option>									
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Relationship of Perpetrator to Victim</label>
								<div class="col-sm-9">
									<div class="input-group">
										<select name="perp_relation" class="select2" style="width:270px;">
											<option value="Ongoing">Current Spouse/Partner</option>
											<option value="Completed">Former Spouse/Partner</option>	
											<option value="Ongoing">Current Fiance/Dating Relationship</option>
											<option value="Completed">Former Fiance/Dating Relationship</option>	
											<option value="Ongoing">Coach/Trainer</option>
											<option value="Completed">Employer/Manager/Supervisor</option>	
											<option value="Ongoing">Teacher/Instructor/Professor</option>
											<option value="Completed">Stranger</option>	
											<option value="Ongoing">Agent of the Employer</option>	
											<option value="Completed">People of Authority/Service Provider</option>	
											<option value="Completed">Immediate Family</option>	
											<option value="Completed">Other Relatives</option>	
											<option value="Completed">Neighbors/Peers/Coworkers</option>		
											<option value="Completed">Others</option>					
										</select>
									</div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">First Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perpguardian_fname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perpguardian_mname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Last Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perpguardian_lname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perpguardian_contact" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Realtionship to victim-survivor</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perpguardian_relation" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Complete Address of guardian</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Parent / Guardian" name="perpguardian_address" autocomplete=off /> </div>
								</div>
							</div>
							
							
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="white-box">
						
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">R.A</label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas1" name="ra" id="optionsRadios4" value="1" /> R.A 9262 Anti-Violence Against Women and Their Children Act
										<br />
										<input type="radio" class="kas1" name="ra" id="optionsRadios4" value="1" /> R.A 8353 Anti Rape Law  of 1995
										<br />
										<input type="radio" class="kas1" name="ra" id="optionsRadios4" value="1" /> R.A  7877 Anti-Sexual Harassment Act
										<br />
										<input type="radio" class="kas1" name="ra" id="optionsRadios4" value="1" /> R.A 9208/10364 Anti-Trafficking in Persons Act  of 2003
										<br />
										<input type="radio" class="kas1" name="ra" id="optionsRadios4" value="1" /> R.A 9775 Anti-Child Pornography Act
										<br />
										<input type="radio" class="kas1" name="ra" id="optionsRadios4" value="1" /> R.A 9995 Anti-Photo and Voyeurism Act 2009
										<br />
										<input type="radio" class="kas1" name="ra" id="optionsRadios4" value="1" /> Revised Penal Code
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Sexual
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Physical
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Psychological
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Economic
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Others
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas1" name="kasa" id="optionsRadios4" value="1" /> R.A 8353 Anti-Rape Law of 1995
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Rape by Sexual Assault
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Rape by Sexual Intercourse
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas1" name="kasa" id="optionsRadios4" value="1" /> R.A 7877 Anti-Sexual Harassment Act
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Verbal
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Physical
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Use of objects,pictures,letters, or notes with sexual under-pinnings
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas1" name="kasa" id="optionsRadios4" value="1" /> R.A 9208/10364 Anti/Trafficking in Persons Act of 2003
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas1" name="kasa" id="optionsRadios4" value="1" /> R.A 9775 Anti-Child Pornography Act
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas1" name="kasa" id="optionsRadios4" value="1" /> R.A 9995 Anti-Photo and Voyeurism Act 2009
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas1" name="kasa" id="optionsRadios4" value="1" /> R.A Revised Penal Code
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Section 336 Acts of Lasciviousness
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Date of Latest Incident</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Intake" name="dtintake" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Place of Occurence</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Place of Occurence" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Description of Incident</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Address</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>
							
							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Address</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Address</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Crisis Intervention Including Rescue</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Intake" name="dtintake" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Issuance / Enforcement of Barangay Protection Order</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Intake" name="dtintake" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Referral to Local Social Welfare Department</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Intake" name="dtintake" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">City</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Counseling Services
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Economic Assistance
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Emergency Shelter
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Others
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Referral to Healthcare Provider</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Intake" name="dtintake" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Hospital / Clinic</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> First Aid
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Issuance of Medical Certificate
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Medico-Legal Exam
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Provision of Appropriate Medical Treatment
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Others
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Referral to Police Station</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Intake" name="dtintake" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Agency</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Referral to Legal Office</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Intake" name="dtintake" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Agency</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">Referral to other Service Provider</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Intake" name="dtintake" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Agency</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group" id="con5" style="display:;">
								<label for="exampleInputuname" class="col-sm-3 control-label">Type of Service</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Description of Incident" name="parentname" autocomplete=off /> </div>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputuname" class="col-sm-3 control-label">If the victim does not want to continue or pursue the case, please indicate
									herein the reason:
								</label>
								<div class="col-sm-9">
									<div class="input-group" style="font-size:11px;">
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Loss of interest to file
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Reconciled with the perpetrator (without mediation)
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Transfer of Residence
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Lack of confidence with the service provider
										<br />
										<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Others
									</div>
								</div>

								<div class="form-group m-b-0">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit</button>
										<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
									</div>
								</div>
							</div>
						
						</div>
					</div>

				</div>
			</div>
		</div>
	</form>
	</div>

	<script type="text/javascript">

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