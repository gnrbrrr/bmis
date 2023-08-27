<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$id' AND is_deleted != '1'");
$sql->execute();
$sql_data = $sql->fetch();

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
		<div class="col-md-6">
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Personal Info</h3>
				<hr />
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Image</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input class="input-file uniform_on" name="fileImage" id="fileInput" type="file" /> </div>
						</div>
					</div>

					<div class="form-group" id="resident_cat">
						<label for="exampleInputuname" class="col-sm-3 control-label">Residential Status</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="res_cat" id="res_cat2">
									<option value="<?php echo $sql_data['resident_category']; ?>"><?php echo $sql_data['resident_category']; ?></option>
									<option value="Permanent">Permanent</option>
									<option value="Lot Owner">Lot Owner</option>
									<option value="Transient / Temporary">Transient / Temporary</option>
								</select></div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">First Name*</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="First Name" name="fname" value="<?php echo $sql_data['firstname']; ?>" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Middle Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Middle Name" name="mname" value="<?php echo $sql_data['middlename']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Last Name*</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Last Name" name="lname" value="<?php echo $sql_data['lastname']; ?>" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Suffix</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Suffix" name="suffix" value="<?php echo $sql_data['suffix']; ?>"autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Alias</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Alias" name="alias" value="<?php echo $sql_data['alias']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Birthdate</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Birthdate" name="birthdate" value="<?php echo $sql_data['birthdate']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Age" name="age" value="<?php echo $sql_data['age']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Birth Place</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Birth Place" name="birth_place" value="<?php echo $sql_data['birthplace']; ?>" autocomplete=off /></div>
						</div>
					</div>
					
				<?php
					$gender = $sql_data['gender'];
					
					if($gender == 'Male'){
						$val = 'Male';
						$valName = 'Male';
					} else {
						$val = 'Female';
						$valName = 'Female';
					}
				?>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
						<div class="col-sm-9">
							<div class="input-group">														
								<select name="gender" class="select2" style="width:270px;">
									<option value="<?php echo $val; ?>"><?php echo $valName; ?></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>									
								</select>
							</div>
						</div>
					</div>
					
				<?php
					$lgbtq = $sql_data['lgbtq'];
					
					if($lgbtq == 'N/A'){
						$vallgbtq = 'N/A';
						$lgbtqName = 'N/A';
					} else if ($lgbtq == 'Lesbian'){
						$vallgbtq = 'Lesbian';
						$lgbtqName = 'Lesbian';
					} else if ($lgbtq == 'Bisexual'){
						$vallgbtq = 'Bisexual';
						$lgbtqName = 'Bisexual';
					} else if ($lgbtq == 'Queer'){
						$vallgbtq = 'Queer';
						$lgbtqName = 'Queer';
					} else if ($lgbtq == 'Gay'){
						$vallgbtq = 'Gay';
						$lgbtqName = 'Gay';
					} else if ($lgbtq == 'Transgender/Transsexual'){
						$vallgbtq = 'Transgender/Transsexual';
						$lgbtqName = 'Transgender/Transsexual';
					} else if ($lgbtq == 'Intersexual'){
						$vallgbtq = 'Intersexual';
						$lgbtqName = 'Intersexual';
					} else if ($lgbtq == 'Axesual Gender'){
						$vallgbtq = 'Axesual Gender';
						$lgbtqName = 'Axesual Gender';
					}
				?>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">LGBTQ+</label>
						<div class="col-sm-9">
							<div class="input-group">														
								
								<select name="lgbtq" class="select2" style="width:270px;">
									<option value="<?php echo $vallgbtq; ?>"><?php echo $lgbtqName; ?></option>
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
		</div>
		<div class="col-md-6">
			<div class="white-box">
			
			<?php
					$civil_status = $sql_data['civilstatus'];
					
					if($civil_status == 'Single'){
						$valcivilstat = 'Single';
						$civilstatName = 'Single';
					} else if ($civil_status == 'Married'){
						$valcivilstat = 'Married';
						$civilstatName = 'Married';
					} else if ($civil_status == 'Divorced'){
						$valcivilstat = 'Divorced';
						$civilstatName = 'Divorced';
					} else if ($civil_status == 'Separated'){
						$valcivilstat = 'Separated';
						$civilstatName = 'Separated';
					} else if ($civil_status == 'Widowed'){
						$valcivilstat = 'Widowed';
						$civilstatName = 'Widowed';
					}
			?>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Civil Status</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group">														
								<select name="civil_status" class="select2" style="width:270px;">
									<option value="<?php echo $valcivilstat; ?>"><?php echo $civilstatName; ?></option>
									<option value="Single">Single</option>
									<option value="Married">Married</option>									
									<option value="Divorced">Divorced</option>									
									<option value="Separated">Separated</option>									
									<option value="Widowed">Widowed</option>									
								</select>
							</div>
							</div>
						</div>
					</div>
					
				<?php
					$religion = $sql_data['religion'];
					
					if($religion == 'Roman Catholic'){
						$valreligion = 'Roman Catholic';
						$religionName = 'Roman Catholic';
					} else if ($religion == 'Iglesia ni Cristo'){
						$valreligion = 'Iglesia ni Cristo';
						$religionName = 'Iglesia ni Cristo';
					} else if ($religion == 'Aglipayan'){
						$valreligion = 'Aglipayan';
						$religionName = 'Aglipayan';
					} else if ($religion == 'Seventh Day Adventist'){
						$valreligion = 'Seventh Day Adventist';
						$religionName = 'Seventh Day Adventist';
					} else if ($religion == 'Mormons'){
						$valreligion = 'Mormons';
						$religionName = 'Mormons';
					} else if ($religion == 'Muslim'){
						$valreligion = 'Muslim';
						$religionName = 'Muslim';
					} else if ($religion == 'Jehovah Witness'){
						$valreligion = 'Jehovah Witness';
						$religionName = 'Jehovah Witness';
					} else if ($religion == 'Others Please Specify'){
						$valreligion = 'Others Please Specify';
						$religionName = 'Others Please Specify';
					} else {
						$valreligion = $religion;
						$religionName = $religion;
					}

					$citizenship = $sql_data['citizenship'];

					if($citizenship == "Filipino"){
						$valcitizen = $citizenship;
						$citizen_name = $citizenship;
					} else {
						$valcitizen = '';
						$citizen_name = 'Please Select A Citizenship';
					}
				?>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Citizenship</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group">														
								<select name="citizenship" class="select2" style="width:270px;">
									<option value="<?php echo $valcitizen; ?>"><?php echo $citizen_name; ?></option>
									<option value="Filipino">Filipino</option>
									<option value="Dual Citizen">Dual Citizen</option>									
									<option value="Foreign National">Foreign National</option>								
								</select>
							</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Religion</label>
						<div class="col-sm-9">
							<div class="input-group">
								
								<select name="religion" class="religion_sel" style="width:270px;">
									<option value="<?php echo $valreligion; ?>"><?php echo $religionName; ?></option>
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
						<label for="exampleInputuname" class="col-sm-3 control-label">Contact No</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-phone"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Contact Number" name="contact_number" value="<?php echo $sql_data['contactno']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-email"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Email" name="email" value="<?php echo $sql_data['email']; ?>"autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">House / Lot Number</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="House / Lot Number" name="house_number" value="<?php echo $sql_data['house_num']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Unit / Building Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Unit / Building Name" name="unit_name" value="<?php echo $sql_data['unit_name']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Street Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Street Name" name="street_name" value="<?php echo $sql_data['street_name']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Purok/Zone</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Purok" name="purok" value="<?php echo $sql_data['purok']; ?>"autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Area / Village</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Area / Village" name="area_village" value="<?php echo $sql_data['area_village']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Barangay</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Barangay" name="barangay" value="<?php echo $sql_data['barangay']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">City / Municipality</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="City / Municipality" name="city_municipality" value="<?php echo $sql_data['city_municipality']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<!-- <div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Purok/Zone</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Purok" name="purok" value="<?php echo $sql_data['purok']; ?>"autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Current Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<textarea style="resize: none;" type="text" class="form-control" id="exampleInputuname" placeholder="Current Address" name="address" autocomplete=off ><?php echo $sql_data['address']; ?></textarea> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Permanent Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<textarea style="resize: none;" type="text" class="form-control" id="exampleInputuname" placeholder="Permanent Address" name="paddress" autocomplete=off ><?php echo $sql_data['paddress']; ?></textarea> </div>
						</div>
					</div> -->
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Years of Residency</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="number" class="form-control" id="exampleInputuname" placeholder="Years of Residency" name="years_residency" value="<?php echo $sql_data['yearsofresidency']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">In Danger Zone</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="danger_zone" class="danger" style="width:270px;">
								<?php
									$danger_zone = $sql_data['danger_zone'];

									if($danger_zone == ""){
										$danger_zone = "No";
									}else{

									}

									if($danger_zone == "No"){
								?>
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								<?php
									}else{
								?>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								<?php
									}
								?>
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="geo" style="display:none;">
						<label for="exampleInputuname" class="col-sm-3 control-label">Geographical Location</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="geographical_loc" class="" id="gloc" style="width:270px;">
								<?php
									if($sql_data['danger_zone'] == "No"){
								?>
									<option value="Flooded Area">Flooded Area</option>
									<option value="Landslide Area">Landslide Area</option>
								<?php
									}else{
								?>
									<option value="Landslide Area">Landslide Area</option>
									<option value="Flooded Area">Flooded Area</option>
								<?php
									}
								?>
								</select>
							</div>
						</div>
					</div>
					
				<?php
					$resident_status = $sql_data['resident_status'];
					
					if($resident_status == 'Resident'){
						$valresident = 'Resident';
						$residentStat = 'Resident';
					} else if ($resident_status == 'Non-Resident'){
						$valresident = 'Non-Resident';
						$residentStat = 'Non-Resident';
					} else {
						$valresident = '';
						$residentStat = 'Select Status';
					} 
				?>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Resident Status</label>
						<div class="col-sm-9">
							<div class="input-group">													
								<select name="resstat" class="select2" style="width:270px;">
									<option value="<?php echo $valresident; ?>"><?php echo $residentStat; ?></option>
									<option value="Resident">Resident</option>
									<option value="Non-Resident">Non-Resident</option>														
								</select>
							</div>
						</div>
					</div>
					
				<?php
					$typeofresidency = $sql_data['type_of_residency'];
					
					if($typeofresidency == 'Home Owner'){
						$valtypeofres = 'Home Owner';
						$typeofresStat = 'Home Owner';
					} else if ($typeofresidency == 'Rented'){
						$valtypeofres = 'Rented';
						$typeofresStat = 'Rented';
					} else if ($typeofresidency == 'Living with Immediate Family'){
						$valtypeofres = 'Living with Immediate Family';
						$typeofresStat = 'Living with Immediate Family';
					} else if ($typeofresidency == 'Living with Relatives'){
						$valtypeofres = 'Living with Relatives';
						$typeofresStat = 'Living with Relatives';
					} else if ($typeofresidency == 'Work/Company Provided'){
						$valtypeofres = 'Work/Company Provided';
						$typeofresStat = 'Work/Company Provided';
					} else {
						$valtypeofres = '';
						$typeofresStat = 'Select Status';
					} 
				?>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Homeownership</label>
						<div class="col-sm-9">
							<div class="input-group">													
								<select name="typeres" class="select2" style="width:270px;">
									<option value="<?php echo $valtypeofres; ?>"><?php echo $typeofresStat; ?></option>
									<option value="Home Owner">Home Owner</option>
									<option value="Rented">Rented</option>
									<option value="Living with Immediate Family">Living with Immediate Family</option>
									<option value="Living with Relatives">Living with Relatives</option>
									<option value="Work/Company Provided">Work/Company Provided</option>									
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<a href="#education" data-toggle="tab" class="btn btn-success waves-effect waves-light m-r-10 tab">Next <i class="fa fa-chevron-right fa-fw"></i></a>
					</div>
			</div>
		</div>
		<style>
			.control-label{
				color:black;
			}
		</style>
		<script>
			var danger_zone = "<?php echo $danger_zone; ?>";

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

			if(danger_zone == "Yes"){
				$("#geo").show();
				$("#gloc").removeAttr("disabled");
			}else{
				$("#geo").hide();
				$("#gloc").attr("disabled", true);
			}
		</script>
	