<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

function generateNumber(){
	$number = rand(10000000, 99999999);
	return $number;
}

function checkNumber($conn){
	$number = generateNumber();

	$chck = $conn->prepare("SELECT * FROM tbl_resident WHERE acc_no = '$number' AND is_deleted != '1'");
	$chck->execute();
	if($chck->rowCount() > 0){
		return checkNumber($conn);
	}else{
		return $number;
	}
}

$number = checkNumber($conn);

?>
		<div class="col-md-6">
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Personal Info</h3>
				<hr />
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Image</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input class="input-file uniform_on" name="fileImage" id="fileInput" type="file" /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<center><video id="video" style="height:400px; width:400px; display:none;" disabled autoplay></video></center>
						<button id="capture-btn" style="display:none; margin-left:27%;">Capture Photo</button>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Resident Status</label>
						<div class="col-sm-9">
							<div class="input-group">													
								<input type="radio" class="resstat" name="resstat" id="optionsRadios1" value="Resident" checked="" /> Resident
								&nbsp;
								<input type="radio" class="resstat" name="resstat" id="optionsRadios2" value="Non-Resident" /> Non-Resident
							</div>
						</div>
					</div>

					<div class="form-group" id="head">
					<label for="exampleInputuname" class="col-sm-3 control-label">Category</label>
					<div class="col-sm-9">
						<div class="input-group">
							
							<input type="radio" class="cat" name="ishof" id="optionsRadios1" value="1" checked="" /> Household Head
							&nbsp;
							<input type="radio" class="cat" name="ishof" id="optionsRadios2" value="0" /> Household Member
						</div>
					</div>
				</div>

				<div class="form-group" id="resident_cat">
					<label for="exampleInputuname" class="col-sm-3 control-label">Residential Status</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="res_cat" id="res_cat2">
								<option value="Permanent">Permanent</option>
								<option value="Lot Owner">Lot Owner</option>
								<option value="Transient / Temporary">Transient / Temporary</option>
							</select></div>
					</div>
				</div>
				
				
				<div class="form-group" id="cust_name">
					<label for="exampleInputuname" class="col-sm-3 control-label">Household No</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-location-pin"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Household Number" name="household_no" autocomplete=off /> </div>
					</div>
				</div>
				
				<div class="form-group" id="cust_name2" style="display:none;">
					<label for="exampleInputuname" class="col-sm-3 control-label">Head of the Family</label>
					<div class="col-sm-9">
						<div class="input-group">
							
							<select name="head_family" class="select2" style="width:270px;">
								<option disabled selected value> -- select -- </option>
								<?php
									$hofa = $conn->prepare("SELECT * FROM tbl_resident WHERE is_head_of_family = '1' AND is_deleted != '1'");
									$hofa->execute();
									if($hofa->rowCount() > 0)
									{
										while($hofa_data = $hofa->fetch())
										{
								?>
											<option value="<?php echo $hofa_data['r_id']; ?>"><?php echo $hofa_data['lastname']; ?>, <?php echo $hofa_data['firstname']; ?> <?php echo $hofa_data['middlename']; ?></option>											
								<?php
										} // End While
									}else{}
								?>								
							</select>
							
						</div>
					</div>
				</div>

					<div class="form-group" id="relationship" style="display:none;">
						<label for="exampleInputuname" class="col-sm-3 control-label">Relationship With Head Of The Family</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="" id="rhof" name="rhof" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group" id="acc_number">
						<label for="exampleInputuname" class="col-sm-3 control-label">Resident Account No.</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="" name="resident_accno" value="<?php echo $number; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">First Name<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="First Name" name="fname" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Middle Name" name="mname" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Last Name<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Last Name" name="lname" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Suffix <label style="color:red">(Optional)</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Suffix" name="suffix" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group" id="alias">
						<label for="exampleInputuname" class="col-sm-3 control-label">Alias</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Alias" name="alias" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Birthdate<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input class="form-control" type="date" name="birthdate" id="birthday" placeholder="Date of Birth" onFocus="startCalc1();" onBlur="stopCalc1();" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input class="form-control" type="text" name="age" id="age" placeholder="Age" readonly autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group" id="height">
						<label for="exampleInputuname" class="col-sm-3 control-label">Height</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Height" name="height" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group" id="weight">
						<label for="exampleInputuname" class="col-sm-3 control-label">Weight</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Weight" name="weight" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group" id="blood_type">
						<label for="exampleInputuname" class="col-sm-3 control-label">Blood Type</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Blood Type" name="blood_type" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Birth Place<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Birth Place" name="birth_place" autocomplete=off required /></div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Gender<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="gender" class="select2" style="width:270px;" required>
									<option value="Male">Male</option>
									<option value="Female">Female</option>									
								</select>
							</div>
						</div>
					</div>
					<div class="form-group" id="lgbtq">
						<label for="exampleInputuname" class="col-sm-3 control-label">LGBTQ+<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">														
								
								<select name="lgbtq" class="select2" style="width:270px;" required>
									<option value="N/A">N/A</option>
									<option value="Lesbian">Lesbian</option>
									<option value="Bisexual">Bisexual</option>
									<option value="Queer">Queer</option>
									<option value="Gay">Gay</option>
									<option value="Transgender/Transsexual">Transgender/Transsexual</option>
									<option value="Intersexual">Intersexual</option>
									<option value="Axesual Gender">Axesual Gender</option>									
								</select>
								
							</div>
						</div>
					</div>					
			</div>
			
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;" id="other_title">Other Info</h3>
				<hr />
				<div class="form-group" id="hoam">
					<label for="exampleInputuname" class="col-sm-3 control-label">Home Owner Association Member?</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="hoa" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				
				<div class="form-group" id="vstat">
					<label for="exampleInputuname" class="col-sm-3 control-label">Voter's Status</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="voters_status" class="voterstatus" style="width:270px;">
								<option value="Registered">Registered</option>
								<option value="Unregistered">Unregistered</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="prect_no">
					<label for="exampleInputuname" class="col-sm-3 control-label">Precint No</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Precint Number" name="precint_no" autocomplete=off /> </div>
					</div>
				</div>
				<div class="form-group" id="solo_p">
					<label for="exampleInputuname" class="col-sm-3 control-label">Solo Parent</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="solo_parent" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>

				<div class="form-group" id="ofw_info">
					<label for="exampleInputuname" class="col-sm-3 control-label">OFW</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="ofw" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>

				<div class="form-group" id="erpat">
					<label for="exampleInputuname" class="col-sm-3 control-label">Erpat</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="erpat" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="kababaihan">
					<label for="exampleInputuname" class="col-sm-3 control-label">Kababaihan</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="kababaihan" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="young">
					<label for="exampleInputuname" class="col-sm-3 control-label">Youth</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="youth" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				
				<div class="form-group" id="disability">
					<label for="exampleInputuname" class="col-sm-3 control-label">Person with Disability</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="pwd" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="4ps">
					<label for="exampleInputuname" class="col-sm-3 control-label">4ps</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="ps4" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="cvon">
					<label for="exampleInputuname" class="col-sm-3 control-label">CVON / PWUD</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="cvon_pwud" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="indi">
					<label for="exampleInputuname" class="col-sm-3 control-label">Indigenous People</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="ind" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="informal">
					<label for="exampleInputuname" class="col-sm-3 control-label">Informal Settler</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="set" class="select2" style="width:270px;">
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="civil_so">
					<label for="exampleInputuname" class="col-sm-3 control-label">Civil Society Organization</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Civil Society Organization" name="cso" autocomplete=off /> </div>
					</div>
				</div>
				<div class="form-group" id="non_go">
					<label for="exampleInputuname" class="col-sm-3 control-label">Non Government Organization</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Non Government Organization" name="ngo" autocomplete=off /> </div>
					</div>
				</div>
				
				<div class="form-group" id="tg">
					<label for="exampleInputuname" class="col-sm-3 control-label">Transport Group</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Transport Group" name="transport_group" autocomplete=off /> </div>
					</div>
				</div>
				
				<div class="form-group" id="senior">
					<label for="exampleInputuname" class="col-sm-3 control-label">Senior Citizen</label>
					<div class="col-sm-9">
						<div class="input-group">
							
							<input type="radio" class="sc" name="sc" id="optionsRadios7" value="0" checked="" /> No
							&nbsp;
							<input type="radio" class="sc" name="sc" id="optionsRadios8" value="1" /> Yes
						</div>
					</div>
				</div>

				<div class="white-box" id="pets"><!--PET OWN WHITEBOX START-->
					<div class="form-group"> <!--PETS OWNED START-->
						<label for="exampleInputuname" class="col-sm-3 control-label">Pets Owned?</label>
						<div class="col-sm-9">
							<div class="input-group">								
								<select name="pet_own" class="pet_own" style="width:fit-content;">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
						</div>
					</div><!--PETS OWNED END-->

					<!--PET 1 START-->
					<div class="white-box" id="wb_1" style="display:none;">
						<div class="form-group" id="pet1" style="display:none;">
							<label for="pet1_type" class="col-sm-3 control-label">Pet Type #1</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="pet1_type" placeholder="Type of Pet" name="pet1_type" autocomplete=off /> </div>
							</div>
						</div>

						<div class="form-group" id="pet1_quanti" style="display:none;">
							<label for="pet1_quanti" class="col-sm-3 control-label">Pet #1 Quantity</label> <!--NUMBER OF PET TYPE #1-->
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_quanti" id="pet1_quanti_val" class="pet1_qty" style="width:fit-content;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group" id="pet1_1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_vac1" id="pet1_vac1" class="pet1_vac1" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_date1" placeholder="" name="pet1_date1" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_re1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_reg1" id="pet1_reg1" class="pet1_reg1" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_reg1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_regdate1" placeholder="" name="pet1_regdate1" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet1_2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_vac2" id="pet1_vac2" class="pet1_vac2" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_date2" placeholder="" name="pet1_date2" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_re2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_reg2" id="pet1_reg2" class="pet1_reg2" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_reg2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_regdate2" placeholder="" name="pet1_regdate2" autocomplete=off />
								</div>
							</div>
						</div>


						<div class="form-group" id="pet1_3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_vac3" id="pet1_vac3" class="pet1_vac3" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_date3" placeholder="" name="pet1_date3" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_re3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_reg3" id="pet1_reg3" class="pet1_reg3" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_reg3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_regdate3" placeholder="" name="pet1_regdate3" autocomplete=off />
								</div>
							</div>
						</div>
					</div>
					<!--PET 1 END-->


					<!--PET 2 START-->
					<div class="white-box" id="wb_2" style="display:none;">
						<div class="form-group" id="pet2" style="display:none;">
							<label for="pet2_type" class="col-sm-3 control-label">Pet Type #2</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="pet2_type" placeholder="Type of Pet" name="pet2_type" autocomplete=off /> </div>
							</div>
						</div>

						<div class="form-group" id="pet2_quanti" style="display:none;">
							<label for="pet2_quanti" class="col-sm-3 control-label">Pet #2 Quantity</label> <!--NUMBER OF PET TYPE #2-->
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_quanti" id="pet2_quanti_val" class="pet2_qty" style="width:fit-content;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group" id="pet2_1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_vac1" id="pet2_vac1" class="pet2_vac1" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_date1" placeholder="" name="pet2_date1" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_re1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_reg1" id="pet2_reg1" class="pet2_reg1" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_reg1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_regdate1" placeholder="" name="pet2_regdate1" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet2_2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_vac2" id="pet2_vac2" class="pet2_vac2" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_date2" placeholder="" name="pet2_date2" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_re2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_reg2" id="pet2_reg2" class="pet2_reg2" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_reg2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_regdate2" placeholder="" name="pet2_regdate2" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet2_3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_vac3" id="pet2_vac3" class="pet2_vac3" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_date3" placeholder="" name="pet2_date3" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_re3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_reg3" id="pet2_reg3" class="pet2_reg3" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_reg3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_regdate3" placeholder="" name="pet2_regdate3" autocomplete=off />
								</div>
							</div>
						</div>
					</div>
					<!--PET 2 END-->

					<!--PET 3 START-->
					<div class="white-box" id="wb_3" style="display:none;">
						<div class="form-group" id="pet3" style="display:none;">
							<label for="pet3_type" class="col-sm-3 control-label">Pet #3</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="pet3_type" placeholder="Type of Pet" name="pet3_type" autocomplete=off /> </div>
							</div>
						</div>

						<div class="form-group" id="pet3_quanti" style="display:none;">
							<label for="pet3_quanti" class="col-sm-3 control-label">Pet #3 Quantity</label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_quanti" id="pet3_quanti_val" class="pet3_qty" style="width:fit-content;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group" id="pet3_1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_vac1" id="pet3_vac1" class="pet3_vac1" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_date1" placeholder="" name="pet3_date1" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_re1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_reg1" id="pet3_reg1" class="pet3_reg1" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_reg1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_regdate1" placeholder="" name="pet3_regdate1" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet3_2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_vac2" id="pet3_vac2" class="pet3_vac2" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_date2" placeholder="" name="pet3_date2" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_re2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_reg2" id="pet3_reg2" class="pet3_reg2" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_reg2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_regdate2" placeholder="" name="pet3_regdate2" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet3_3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_vac3" id="pet3_vac3" class="pet3_vac3" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_date3" placeholder="" name="pet3_date3" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_re3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_reg3" id="pet3_reg3" class="pet3_reg3" style="width:50px;">
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_reg3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_regdate3" placeholder="" name="pet3_regdate3" autocomplete=off />
								</div>
							</div>
						</div>
					</div>
					<!--PET 3 START-->

				</div><!--PET OWN WHITEBOX END-->
				
				<!--3 senior start-->
				<div id="3_senior">
					<div class="form-group" id="senior4">
						<label for="exampleInputuname" class="col-sm-3 control-label">Maynilad (Own Meter)?</label>
						<div class="col-sm-9">
							<div class="input-group">								
								<select name="maynilad" class="select2" style="width:270px;">
									<option value="0">No</option>
									<option value="1">Yes</option>									
								</select>
							</div>
						</div>
					</div>
					
					
					<div class="form-group" id="senior4">
						<label for="exampleInputuname" class="col-sm-3 control-label">Meralco (Own Meter)?</label>
						<div class="col-sm-9">
							<div class="input-group">								
								<select name="meralco" class="select2" style="width:270px;">
									<option value="0">No</option>
									<option value="1">Yes</option>									
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="senior4">
						<label for="exampleInputuname" class="col-sm-3 control-label">Septic Tank</label>
						<div class="col-sm-9">
							<div class="input-group">								
								<select name="septic_tank" class="select2" style="width:270px;">
									<option value="0">No</option>
									<option value="1">Yes</option>									
								</select>
							</div>
						</div>
					</div>
				</div><!--3 senior end-->
				
				
				<div class="form-group" id="structure">
					<label for="exampleInputuname" class="col-sm-3 control-label">House Structure</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="house_structure" class="select2" style="width:270px;">
								<option value="Light Materials">Light Materials</option>
								<option value="Semi - Concrete">Semi - Concrete</option>
								<option value="Concrete">Concrete</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="form-group" id="submit">
					
					<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
				</div>
				
			</div>
			
		</div>
		<div class="col-md-6">
			<div class="white-box">	
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Civil Status<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group">														
								<select name="civil_status" class="select2" style="width:270px;">
									<option value="Single">Single</option>
									<option value="Married">Married</option>									
									<option value="Divorced">Divorced</option>									
									<option value="Separated">Separated</option>									
									<option value="Widowed">Widowed</option>									
									<option value="Annulled">Annulled</option>									
								</select>
							</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Citizenship<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group">														
								<select name="citizenship" class="select2" style="width:270px;">
									<option value="Filipino">Filipino</option>
									<option value="Dual Citizen">Dual Citizen</option>									
									<option value="Foreign National">Foreign National</option>								
								</select>
							</div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Religion<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								
								<select name="religion" class="religion_sel" style="width:270px;">
									<option value="Roman Catholic">Roman Catholic</option>
									<option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
									<option value="Aglipayan">Aglipayan</option>
									<option value="Seventh Day Adventist">Seventh Day Adventist</option>
									<option value="Mormons">Mormons</option>
									<option value="Muslim">Muslim</option>
									<option value="Jehovahs Witness">Jehovah's Witness</option>												
									<option value="Others">Others Please Specify</option>
								</select>
								<br />
								<input type="text" class="form-control" id="other_rel" placeholder="" name="other_rel" style="display:none; border:0; border-bottom:2px solid black; width:200px;" autocomplete=off />
								
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="contact" id="contact_label" class="col-sm-3 control-label">Contact No<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-phone"></i></div>
								<input type="text" class="form-control" id="contact" placeholder="Contact Number" name="contact_number" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group" id="landline">
						<label for="exampleInputuname" class="col-sm-3 control-label">Landline No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-phone"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Landline No" name="landline_number" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group" id="email">
						<label for="exampleInputuname" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-email"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Email" name="email" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">House / Lot Number</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="House / Lot Number" name="house_number" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Unit / Building Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Unit / Building Name" name="unit_name" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Street Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Street Name" name="street_name" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Purok/Zone</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Purok" name="purok" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Area / Village</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Area / Village" name="area_village" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Barangay</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Barangay" name="barangay" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">City / Municipality</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="City / Municipality" name="city_municipality" autocomplete=off /> </div>
						</div>
					</div>

					<!-- <div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Purok/Zone</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Purok" name="purok" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="c_address" id="cadd_label" class="col-sm-3 control-label">Current Address<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<textarea style="resize: none;" type="text" class="form-control" id="c_address" placeholder="Current Address" name="address" autocomplete=off required></textarea> </div>
						</div>
					</div>
					<div class="form-group" id="per_address">
						<label for="exampleInputuname" class="col-sm-3 control-label">Permanent Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<textarea style="resize: none;" type="text" class="form-control" id="exampleInputuname" placeholder="Permanent Address" name="paddress" autocomplete=off ></textarea> </div>
						</div>
					</div> -->
					
					<div class="form-group" id="yor">
						<label for="year_resident" id="yor_label" class="col-sm-3 control-label">Years of Residency<label style="color:red">*</label></label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="number" class="form-control" id="year_resident" placeholder="Years of Residency" name="years_residency" autocomplete=off required /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Danger Zone</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="danger_zone" class="danger" style="width:270px;">
									<option value="No">No</option>
									<option value="Yes">Yes</option>							
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="geo" style="display:none;">
						<label for="exampleInputuname" class="col-sm-3 control-label">Geographical Location</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="geographical_loc" class="" id="gloc" style="width:270px;">
									<option value="Flooded Area">Flooded Area</option>
									<option value="Landslide Area">Landslide Area</option>							
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="home_ownersh">
						<label for="exampleInputuname" class="col-sm-3 control-label">Homeownership</label>
						<div class="col-sm-9">
							<div class="input-group">													
								<select name="typeres" class="select2" style="width:270px;">
									<option value="Home Owner">Homeowner</option>
									<option value="Rented">Rented</option>
									<option value="Living with Immediate Family">Living with Immediate Family</option>
									<option value="Living with Relatives">Living with Relatives</option>
									<option value="Work/Company Provided">Work/Company Provided</option>									
								</select>
							</div>
						</div>
					</div>

					<div class="form-group" id="tin">
						<label for="exampleInputuname" class="col-sm-3 control-label">Tax Identification No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-email"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Tax Identification No" name="tax_number" autocomplete=off /> </div>
						</div>
					</div>

					<!-- <div class="form-group" id="qci">
						<label for="exampleInputuname" class="col-sm-3 control-label">Q.C. ID No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-email"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Q.C. ID No" name="qci_number" autocomplete=off /> </div>
						</div>
					</div> -->

					<div class="form-group" id="phil">
						<label for="exampleInputuname" class="col-sm-3 control-label">Philhealth No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-email"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Philhealth No" name="philhealth_number" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group" id="ibig">
						<label for="exampleInputuname" class="col-sm-3 control-label">Pag-ibig No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-email"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Pag-ibig No" name="pagibig_number" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group" id="gsis">
						<label for="exampleInputuname" class="col-sm-3 control-label">GSIS ID No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-email"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="GSIS ID No" name="gsis_number" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group" id="sss">
						<label for="exampleInputuname" class="col-sm-3 control-label">SSS No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-email"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="SSS No" name="sss_number" autocomplete=off /> </div>
						</div>
					</div>
			</div>
			
			<div class="white-box" id="educ_info">
				<h3 style="color:#663399; font-weight:bold;">Education Info</h3>
				<hr />
				<div class="form-group" id="resident">
					<label for="exampleInputuname" class="col-sm-3 control-label">Educational Attainment</label>
					<div class="col-sm-9">
						<div class="input-group">													
							<select name="educational_attainment" class="educat" style="width:270px;">
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
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Course" name="course" autocomplete=off /> </div>
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
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Skills" name="skills" autocomplete=off /> </div>
					</div>
				</div>		

			</div>
			
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Work Info</h3>
				<hr />
				<div class="form-group" id="employ_status">
					<label for="exampleInputuname" class="col-sm-3 control-label">Employment Status</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="employment_status" class="employ" style="width:270px;">
								<option value="Employed Private">Employed Private</option>
								<option value="Employed Government">Employed Government</option>
								<option value="Self-Employed">Self-Employed</option>
								<option value="Unemployed">Unemployed</option>
								<option value="Student">Student</option>
								<option value="Out of School Youth">Out of School Youth</option>
								<option value="None">None</option>
							</select>
						</div>
					</div>
				</div>
				<div id="employment_status">
					<div class="form-group" id="kasambahay">
						<label for="exampleInputuname" class="col-sm-3 control-label">Kasambahay</label>
						<div class="col-sm-9">
							<div class="input-group">
								
								<input type="radio" class="kas" name="kas" id="optionsRadios3" value="0" checked="" /> No
								&nbsp;
								<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Yes
							</div>
						</div>
					</div>										
					
					<div id="kas_status">
							<div class="form-group" id="occupation" class="occupation">
								<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Occupation" name="occupation" autocomplete=off /> </div>
								</div>
							</div>
					
							<div class="form-group" id="kas_name">
								<label for="noc" id="noc_label" class="col-sm-3 control-label">Name of Company</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="noc" placeholder="Name of Company" name="company_name" autocomplete=off /> </div>
								</div>
							</div>
							
							<div class="form-group" id="kas_name">
								<label for="company_post" id="post_label" class="col-sm-3 control-label">Position</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="company_post" placeholder="Position" name="company_position" autocomplete=off /> </div>
								</div>
							</div>
							
							<div class="form-group" id="kas_name">
								<label for="company_add" id="com_add_label"class="col-sm-3 control-label">Address of Company</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="company_add" placeholder="Address of Company" name="company_address" autocomplete=off /> </div>
								</div>
							</div>	
					</div>
					
					<div id="kas_status7" style="display:none;">
							
							<div class="form-group" id="kas_name">
								<label for="exampleInputuname" class="col-sm-3 control-label">Name of Employer</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Employer" name="employer_name" autocomplete=off /> </div>
								</div>
							</div>
							
							<div class="form-group" id="kas_name">
								<label for="exampleInputuname" class="col-sm-3 control-label">Address of Employer</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
										<input type="text" class="form-control" id="exampleInputuname" placeholder="Address of Employer" name="employer_address" autocomplete=off /> </div>
								</div>
							</div>	
					</div>
					
					
					<div class="form-group" id="sourceofincome">
						<label for="exampleInputuname" class="col-sm-3 control-label">Source of Income</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="income_source" class="select2" style="width:270px;">
									<option value="Salary">Salary</option>
									<option value="Remittance">Remittance</option>
									<option value="Business">Business</option>								
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="monthlyincome">
						<label for="monthly" id="monthly_title" class="col-sm-3 control-label">Monthly Income</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="monthly" placeholder="Monthly Income" name="income_monthly" onKeyUp="checkNumber(this);" autocomplete=off /> </div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>

		<style>
			.form-group label{
				color:black;
			}

			#pet1_quanti input, #pet2_quanti input, #pet3_quanti input{
				width:50px;
			}
		</style>
		<script>
			$(".danger").change(function(){
				var dan_value = $(this).val();

				if(dan_value == "Yes"){
					$("#geo").show();
					$("#gloc").removeAttr("disabled");
				}else{
					$("#geo").hide();
					$("#gloc").attr("disabled", true);
				}
			});
		</script>
	