<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
	
	$rtype = $_POST['rtype'];

	if($rtype == 1)
	{ $state = "AND is_kasambahay = '1'"; $title = "Kasambahay"; }
	else if($rtype == 2)
	{ $state = "AND is_ofw = '1'"; $title = "OFW"; }
	else if($rtype == 3)
	{ $state = "AND is_head_of_family = '1'"; $title = "Head of the Family"; }
	else if($rtype == 4)
	{ $state = "AND is_head_of_family != '1'"; $title = "Member of the Family"; }
	else if($rtype == 5)
	{ $state = "AND votersstatus = 'Registered'"; $title = "Registered Voters"; }
	else if($rtype == 6)
	{ $state = "AND votersstatus = 'Unregistered'"; $title = "Unregistered Voters"; }
	else if($rtype == 7)
	{ $state = "AND is_soloparent = '1'"; $title = "Solo Parent"; }
	else if($rtype == 8)
	{ $state = "AND is_erpat = '1'"; $title = "Erpat"; }
	else if($rtype == 9)
	{ $state = "AND is_kababaihan = '1'"; $title = "Kababaihan"; }
	else if($rtype == 10)
	{ $state = "AND is_pwd = '1'"; $title = "PWD"; }
	else if($rtype == 11)
	{ $state = "AND is_ps4 = '1'"; $title = "4P's"; }
	else if($rtype == 12)
	{ $state = "AND is_indigenous = '1'"; $title = "Indigenous"; }
	else if($rtype == 13)
	{ $state = "AND is_informal_settler = '1'"; $title = "Informal Settler"; }
	else if($rtype == 14)
	{ $state = "AND is_sc = '1'"; $title = "Senior"; }
	else if($rtype == 15)
	{ $state = "AND gender = 'Male'"; $title = "Male"; }
	else if($rtype == 16)
	{ $state = "AND gender = 'Female'"; $title = "Female"; }
	else if($rtype == 17)
	{ $state = "AND employeestatus = 'Unemployed'"; $title = "Unemployed"; }
	else if($rtype == 18)
	{ $state = "AND employeestatus = 'Out of School Youth'"; $title = "Out of School Youth"; }
	else if($rtype == 19)
	{ $state = "AND lgbtq != 'N/A'"; $title = "LGBTQ+"; }
	else if($rtype == 20)
	{ $state = "AND pet_own != '0'"; $title = "Pet Owner"; }
	else if($rtype == 21)
	{ $state = "AND maynilad = '1'"; $title = "Maynilad (Own Meter)"; }
	else if($rtype == 22)
	{ $state = "AND meralco = '1'"; $title = "Meralco (Own Meter)"; }
	else if($rtype == 23)
	{ $state = "AND septic_tank = '1'"; $title = "Septic Tank"; }
	else if($rtype == 24)
	{ $state = "AND age BETWEEN 0 AND 1"; $title = "Infant 0 to 1 Years old"; }
	else if($rtype == 25)
	{ $state = "AND age BETWEEN 2 AND 4"; $title = "Toddler 2 to 4 Years old"; }
	else if($rtype == 26)
	{ $state = "AND age BETWEEN 5 AND 12"; $title = "Child 5 to 12 Years old"; }
	else if($rtype == 27)
	{ $state = "AND age BETWEEN 13 AND 19"; $title = "Teen 13 to 19 Years old"; }
	else if($rtype == 28)
	{ $state = "AND age BETWEEN 20 AND 39"; $title = "Adult 20 to 39 Years old"; }
	else if($rtype == 29)
	{ $state = "AND age BETWEEN 40 AND 59"; $title = "Middle Aged Adult 40 to 59 Years old"; }
	else if($rtype == 30)
	{ $state = "AND age >= 60"; $title = "Senior"; }
	else if($rtype == 31)
	{ $state = "AND status = 'Deceased'"; $title = "Deceased"; }
	else if($rtype == 32)
	{ $state = "AND danger_zone = 'Yes'"; $title = "Residents In Danger Zone"; }
	else{ $state = ""; $title = "Resident";}

	$columns = "firstname, middlename, lastname, date_death, cause_death, place_death, danger_zone, geographical_location";

	$suffix = $_POST['suffix'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$civil_stat = $_POST['civil_stat'];
	$cso = $_POST['cso'];
	$ngo = $_POST['ngo'];
	$transport_group = $_POST['transport_group'];
	$house_structure = $_POST['house_structure'];

	if($suffix == "Yes"){
		$columns .= ", suffix";
	}else{}

	if($gender == "Yes"){
		$columns .= ", gender";
	}else{}

	if($age == "Yes"){
		$columns .= ", age";
	}else{}

	if($address == "Yes"){
		$columns .= ", house_num, unit_name, street_name, purok, area_village, barangay, city_municipality";
	}else{}

	if($contact == "Yes"){
		$columns .= ", contactno";
	}else{}

	if($civil_stat == "Yes"){
		$columns .= ", civilstatus";
	}else{}

	if($cso == "Yes"){
		$columns .= ", cso";
	}else{}

	if($ngo == "Yes"){
		$columns .= ", ngo";
	}else{}

	if($transport_group == "Yes"){
		$columns .= ", transport_group";
	}else{}

	if($house_structure == "Yes"){
		$columns .= ", house_structure";
	}else{}

	// remove the leading comma from $columns if it exists
	if (substr($columns, 0, 2) === ", ") {
		$columns = substr($columns, 2);
	}

	// check if $columns is empty
	if (empty($columns)) {
		// if no columns were selected, select the default columns
		$columns = "firstname, middlename, lastname, date_death, cause_death, place_death, danger_zone, geographical_location";
	}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;'
?>
<?php
// for pets
	if($rtype == 20){
?>
<body onload="window.print();" style="background: url(../images/bmis_standard_head_big.png); background-repeat: no-repeat; background-size: 100% 25%;">
		<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3><?php echo $title; ?> List Report</h3>
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Last Name</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">First Name</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Middle Name</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Address</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Contact No.</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Pets Owned</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Pet #1 Type</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Pet #1 Quantity</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">is Pet#1 Vaccinated</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">is Pet#1 Vaccination date</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Pet #2 Type</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Pet #2 Quantity</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">is Pet#2 Vaccinated</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">is Pet#2 Vaccination date</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Pet #3 Type</td>
				<td width="20px;">&nbsp;</td>	
				<td class="tdlabel">Pet #3 Quantity</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">is Pet#3 Vaccinated</td>
				
			</tr>
			<tr>
				<td colspan="35"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$emp = $conn->prepare("SELECT * FROM tbl_resident
													WHERE is_deleted != '1' AND resident_status != 'Non-Resident' $state ORDER BY lastname");
										$emp->execute();
										if($emp->rowCount() > 0)
										{
											$ctr1 = 1;
											while($emp_data = $emp->fetch())
											{
												// $address = $emp_data['house_num'] . " " . $emp_data['unit_name'] . " " . $emp_data['street_name'] . " " . $emp_data['purok'] . " " . $emp_data['area_village'] . " " . $emp_data['barangay'] . " " . $emp_data['city_municipality'];

												//for pet1 vac_date	
												$pet1_date1 = date("M d, Y", strtotime($emp_data['pet1_vac1_date']));
												$pet1_date2 = date("M d, Y", strtotime($emp_data['pet1_vac2_date']));
												$pet1_date3 = date("M d, Y", strtotime($emp_data['pet1_vac3_date']));

												//for pet2 vac_date
												$pet2_date1 = date("M d, Y", strtotime($emp_data['pet2_vac1_date']));
												$pet2_date2 = date("M d, Y", strtotime($emp_data['pet2_vac2_date']));
												$pet2_date3 = date("M d, Y", strtotime($emp_data['pet2_vac3_date']));

												//for pet3 vac_date
												$pet3_date1 = date("M d, Y", strtotime($emp_data['pet3_vac1_date']));
												$pet3_date2 = date("M d, Y", strtotime($emp_data['pet3_vac2_date']));
												$pet3_date3 = date("M d, Y", strtotime($emp_data['pet3_vac3_date']));
												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $emp_data['lastname']; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['firstname']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['middlename']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top" style= "width:200px;"><?php echo $emp_data['house_num'] . " " . $emp_data['unit_name'] . " " . $emp_data['street_name'] . " " . $emp_data['purok'] . " " . $emp_data['area_village'] . " " . $emp_data['barangay'] . " " . $emp_data['city_municipality']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['contactno']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['pet_own']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['pet1_type']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['pet1_qty']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['is_pet1_vac1']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $pet1_date1; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['pet2_type']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['pet2_qty']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['is_pet2_vac1']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $pet2_date1; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['pet3_type']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['pet3_qty']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['is_pet3_vac1']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $pet3_date1; ?></td>
													
													
													
												</tr>
									<?php
											} // End While
										}else{}
									?>
									<tr>
										<td colspan="35"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="35" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
		</table>
</body>
<?php
	}else if ($rtype == 24 || $rtype == 25 || $rtype == 26 || $rtype == 27 || $rtype == 28 || $rtype == 29 || $rtype == 30){
?>
<body onload="window.print();" style="background: url(../images/bmis_standard_head_big.png); background-repeat: no-repeat; background-size: 100% 25%;">
		<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3><?php echo $title; ?> List Report</h3>
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Last Name</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">First Name</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Middle Name</td>
				<td width="20px;" id="suffix1" style="display:none;">&nbsp;</td>
				<td class="suffix_label" id="suffix2" style="display:none; width:40px;">Suffix</td>
				<td width="20px;" id="gender1" style="display:none;">&nbsp;</td>
				<td class="gender_label" id="gender2" style="display:none; width:40px;">Gender</td>
				<td width="20px;" id="age1" style="display:none;">&nbsp;</td>
				<td class="age_label" id="age2" style="display:none; width:40px;">Age</td>
				<td width="20px;" id="address1" style="display:none;">&nbsp;</td>
				<td class="address_label" id="address2" style="display:none; width:200px;">Address</td>
				<td width="20px;" id="contact1" style="display:none;">&nbsp;</td>
				<td class="contact_label" id="contact2" style="display:none; width:100px;">Contact No.</td>
				<td width="20px;" id="civil_stat1" style="display:none;">&nbsp;</td>
				<td class="civil_label" id="civil_stat2" style="display:none; width:200px;">Civil Status</td>
				<td width="20px;" id="cso1" style="display:none;">&nbsp;</td>
				<td class="cso_label" id="cso2" style="display:none; width:200px;">Civil Society Organization</td>
				<td width="20px;" id="ngo1" style="display:none;">&nbsp;</td>
				<td class="ngo_label" id="ngo2" style="display:none; width:200px;">Non Government Organization</td>
				<td width="20px;" id="transpo1" style="display:none;">&nbsp;</td>
				<td class="transpo_label" id="transpo2" style="display:none; width:200px;">Transport Group</td>
				<td width="20px;" id="house1" style="display:none;">&nbsp;</td>
				<td class="house_label" id="house2" style="display:none;">House Structure</td>
			</tr>
			<tr>
				<td colspan="23"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$emp = $conn->prepare("SELECT $columns FROM tbl_resident
													WHERE is_deleted != '1' AND resident_status != 'Non-Resident' $state ORDER BY age");
										$emp->execute();
										if($emp->rowCount() > 0)
										{
											$ctr1 = 1;
											while($emp_data = $emp->fetch())
											{

												if($address == "Yes"){
													$address2 = "";

													if($emp_data['house_num']){
														$address2 .= $emp_data['house_num'];
													}else{

													}

													if($emp_data['unit_name'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['unit_name'];
													}else if($emp_data['unit_name'] && $address2 == ""){
														$address2 .= $emp_data['unit_name'];
													}else{
														
													}

													if($emp_data['street_name'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['street_name'];
													}else if($emp_data['street_name'] && $address2 == ""){
														$address2 .= $emp_data['street_name'];
													}else{

													}

													if($emp_data['purok'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['purok'];
													}else if($emp_data['purok'] && $address2 == ""){
														$address2 .= $emp_data['purok'];
													}else{

													}

													if($emp_data['area_village'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['area_village'];
													}else if($emp_data['area_village'] && $address2 == ""){
														$address2 .= $emp_data['area_village'];
													}else{

													}

													if($emp_data['barangay'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['barangay'];
													}else if($emp_data['barangay'] && $address2 == ""){
														$address2 .= $emp_data['barangay'];
													}else{

													}

													if($emp_data['city_municipality'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['city_municipality'];
													}else if($emp_data['city_municipality'] && $address2 == ""){
														$address2 .= $emp_data['city_municipality'];
													}else{

													}
												}else{

												}
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $emp_data['lastname']; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['firstname']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['middlename']; ?></td>
													<td width="20px;" id="suffix3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="suffix4" style="display:none; width:40px;"><?php echo $emp_data['suffix']; ?></td>
													<td width="20px;" id="gender3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="gender4" style="display:none; width:40px;"><?php echo $emp_data['gender']; ?></td>
													<td width="20px;" id="age3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="age4" style="display:none; width:40px;"><?php echo $emp_data['age']; ?></td>
													<td width="20px;" id="address3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="address4" style="width:200px; display:none;"><?php echo $address2; ?></td>
													<td width="20px;" id="contact3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="contact4" style="display:none; width:100px;"><?php echo $emp_data['contactno']; ?></td>
													<td width="20px;" id="civil_stat3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="civil_stat4" style="display:none; width:200px;"><?php echo $emp_data['civilstatus']; ?></td>
													<td width="20px;" id="cso3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="cso4" style="display:none; width:200px;"><?php echo $emp_data['cso']; ?></td>
													<td width="20px;" id="ngo3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="ngo4" style="display:none; width:200px;"><?php echo $emp_data['ngo']; ?></td>
													<td width="20px;" id="transpo3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="transpo4" style="display:none; width:200px;"><?php echo $emp_data['transport_group']; ?></td>
													<td width="20px;" id="house3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="house4" style="display:none;"><?php echo $emp_data['house_structure']; ?></td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									<tr>
										<td colspan="23"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="23" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
		</table>
</body>
<?php
	}else if ($rtype == 31){
?>
<body onload="window.print();" style="background: url(../images/bmis_standard_head_big.png); background-repeat: no-repeat; background-size: 100% 25%;">
		<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3><?php echo $title; ?> List Report</h3>
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Last Name</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">First Name</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Middle Name</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Cause of Death</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Place of Death</td>
				<td width="20px;" id="suffix1" style="display:none;">&nbsp;</td>
				<td class="suffix_label" id="suffix2" style="display:none; width:40px;">Suffix</td>
				<td width="20px;" id="gender1" style="display:none;">&nbsp;</td>
				<td class="gender_label" id="gender2" style="display:none; width:40px;">Gender</td>
				<td width="20px;" id="age1" style="display:none;">&nbsp;</td>
				<td class="age_label" id="age2" style="display:none; width:40px;">Age</td>
				<td width="20px;" id="address1" style="display:none;">&nbsp;</td>
				<td class="address_label" id="address2" style="display:none; width:200px;">Address</td>
				<td width="20px;" id="contact1" style="display:none;">&nbsp;</td>
				<td class="contact_label" id="contact2" style="display:none; width:100px;">Contact No.</td>
				<td width="20px;" id="civil_stat1" style="display:none;">&nbsp;</td>
				<td class="civil_label" id="civil_stat2" style="display:none; width:200px;">Civil Status</td>
				<td width="20px;" id="cso1" style="display:none;">&nbsp;</td>
				<td class="cso_label" id="cso2" style="display:none; width:200px;">Civil Society Organization</td>
				<td width="20px;" id="ngo1" style="display:none;">&nbsp;</td>
				<td class="ngo_label" id="ngo2" style="display:none; width:200px;">Non Government Organization</td>
				<td width="20px;" id="transpo1" style="display:none;">&nbsp;</td>
				<td class="transpo_label" id="transpo2" style="display:none; width:200px;">Transport Group</td>
				<td width="20px;" id="house1" style="display:none;">&nbsp;</td>
				<td class="house_label" id="house2" style="display:none;">House Structure</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Date of Death</td>
			</tr>
			<tr>
				<td colspan="23"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$emp = $conn->prepare("SELECT $columns FROM tbl_resident
													WHERE is_deleted != '1' $state ORDER BY date_death");
										$emp->execute();
										if($emp->rowCount() > 0)
										{
											$ctr1 = 1;
											while($emp_data = $emp->fetch())
											{

												$date_death = date("M d, Y", strtotime($emp_data['date_death']));

												if($address == "Yes"){
													$address2 = "";

													if($emp_data['house_num']){
														$address2 .= $emp_data['house_num'];
													}else{

													}

													if($emp_data['unit_name'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['unit_name'];
													}else if($emp_data['unit_name'] && $address2 == ""){
														$address2 .= $emp_data['unit_name'];
													}else{
														
													}

													if($emp_data['street_name'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['street_name'];
													}else if($emp_data['street_name'] && $address2 == ""){
														$address2 .= $emp_data['street_name'];
													}else{

													}

													if($emp_data['purok'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['purok'];
													}else if($emp_data['purok'] && $address2 == ""){
														$address2 .= $emp_data['purok'];
													}else{

													}

													if($emp_data['area_village'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['area_village'];
													}else if($emp_data['area_village'] && $address2 == ""){
														$address2 .= $emp_data['area_village'];
													}else{

													}

													if($emp_data['barangay'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['barangay'];
													}else if($emp_data['barangay'] && $address2 == ""){
														$address2 .= $emp_data['barangay'];
													}else{

													}

													if($emp_data['city_municipality'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['city_municipality'];
													}else if($emp_data['city_municipality'] && $address2 == ""){
														$address2 .= $emp_data['city_municipality'];
													}else{

													}
												}else{

												}

												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $emp_data['lastname']; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['firstname']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['middlename']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['cause_death']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['place_death']; ?></td>
													<td width="20px;" id="suffix3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="suffix4" style="display:none; width:40px;"><?php echo $emp_data['suffix']; ?></td>
													<td width="20px;" id="gender3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="gender4" style="display:none; width:40px;"><?php echo $emp_data['gender']; ?></td>
													<td width="20px;" id="age3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="age4" style="display:none; width:40px;"><?php echo $emp_data['age']; ?></td>
													<td width="20px;" id="address3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="address4" style="width:200px; display:none;"><?php echo $address2; ?></td>
													<td width="20px;" id="contact3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="contact4" style="display:none; width:100px;"><?php echo $emp_data['contactno']; ?></td>
													<td width="20px;" id="civil_stat3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="civil_stat4" style="display:none; width:200px;"><?php echo $emp_data['civilstatus']; ?></td>
													<td width="20px;" id="cso3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="cso4" style="display:none; width:200px;"><?php echo $emp_data['cso']; ?></td>
													<td width="20px;" id="ngo3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="ngo4" style="display:none; width:200px;"><?php echo $emp_data['ngo']; ?></td>
													<td width="20px;" id="transpo3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="transpo4" style="display:none; width:200px;"><?php echo $emp_data['transport_group']; ?></td>
													<td width="20px;" id="house3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="house4" style="display:none;"><?php echo $emp_data['house_structure']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $date_death; ?></td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									<tr>
										<td colspan="23"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="23" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
		</table>
</body>
<?php
	}else if ($rtype == 32){
?>
<body onload="window.print();" style="background: url(../images/bmis_standard_head_big.png); background-repeat: no-repeat; background-size: 100% 25%;">
		<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3><?php echo $title; ?> List Report</h3>
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Last Name</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">First Name</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Middle Name</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Geographical Location</td>
				<td width="20px;" id="suffix1" style="display:none;">&nbsp;</td>
				<td class="suffix_label" id="suffix2" style="display:none; width:40px;">Suffix</td>
				<td width="20px;" id="gender1" style="display:none;">&nbsp;</td>
				<td class="gender_label" id="gender2" style="display:none; width:40px;">Gender</td>
				<td width="20px;" id="age1" style="display:none;">&nbsp;</td>
				<td class="age_label" id="age2" style="display:none; width:40px;">Age</td>
				<td width="20px;" id="address1" style="display:none;">&nbsp;</td>
				<td class="address_label" id="address2" style="display:none; width:200px;">Address</td>
				<td width="20px;" id="contact1" style="display:none;">&nbsp;</td>
				<td class="contact_label" id="contact2" style="display:none; width:100px;">Contact No.</td>
				<td width="20px;" id="civil_stat1" style="display:none;">&nbsp;</td>
				<td class="civil_label" id="civil_stat2" style="display:none; width:200px;">Civil Status</td>
				<td width="20px;" id="cso1" style="display:none;">&nbsp;</td>
				<td class="cso_label" id="cso2" style="display:none; width:200px;">Civil Society Organization</td>
				<td width="20px;" id="ngo1" style="display:none;">&nbsp;</td>
				<td class="ngo_label" id="ngo2" style="display:none; width:200px;">Non Government Organization</td>
				<td width="20px;" id="transpo1" style="display:none;">&nbsp;</td>
				<td class="transpo_label" id="transpo2" style="display:none; width:200px;">Transport Group</td>
				<td width="20px;" id="house1" style="display:none;">&nbsp;</td>
				<td class="house_label" id="house2" style="display:none;">House Structure</td>
			</tr>
			<tr>
				<td colspan="23"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$emp = $conn->prepare("SELECT $columns FROM tbl_resident
													WHERE is_deleted != '1' $state ORDER BY date_death");
										$emp->execute();
										if($emp->rowCount() > 0)
										{
											$ctr1 = 1;
											while($emp_data = $emp->fetch())
											{

												$date_death = date("M d, Y", strtotime($emp_data['date_death']));

												if($address == "Yes"){
													$address2 = "";

													if($emp_data['house_num']){
														$address2 .= $emp_data['house_num'];
													}else{

													}

													if($emp_data['unit_name'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['unit_name'];
													}else if($emp_data['unit_name'] && $address2 == ""){
														$address2 .= $emp_data['unit_name'];
													}else{
														
													}

													if($emp_data['street_name'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['street_name'];
													}else if($emp_data['street_name'] && $address2 == ""){
														$address2 .= $emp_data['street_name'];
													}else{

													}

													if($emp_data['purok'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['purok'];
													}else if($emp_data['purok'] && $address2 == ""){
														$address2 .= $emp_data['purok'];
													}else{

													}

													if($emp_data['area_village'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['area_village'];
													}else if($emp_data['area_village'] && $address2 == ""){
														$address2 .= $emp_data['area_village'];
													}else{

													}

													if($emp_data['barangay'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['barangay'];
													}else if($emp_data['barangay'] && $address2 == ""){
														$address2 .= $emp_data['barangay'];
													}else{

													}

													if($emp_data['city_municipality'] && $address2 != ""){
														$address2 .= ', ' . $emp_data['city_municipality'];
													}else if($emp_data['city_municipality'] && $address2 == ""){
														$address2 .= $emp_data['city_municipality'];
													}else{

													}
												}else{

												}

												
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $emp_data['lastname']; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['firstname']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['middlename']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['geographical_location']; ?></td>
													<td width="20px;" id="suffix3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="suffix4" style="display:none; width:40px;"><?php echo $emp_data['suffix']; ?></td>
													<td width="20px;" id="gender3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="gender4" style="display:none; width:40px;"><?php echo $emp_data['gender']; ?></td>
													<td width="20px;" id="age3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="age4" style="display:none; width:40px;"><?php echo $emp_data['age']; ?></td>
													<td width="20px;" id="address3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="address4" style="width:200px; display:none;"><?php echo $address2; ?></td>
													<td width="20px;" id="contact3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="contact4" style="display:none; width:100px;"><?php echo $emp_data['contactno']; ?></td>
													<td width="20px;" id="civil_stat3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="civil_stat4" style="display:none; width:200px;"><?php echo $emp_data['civilstatus']; ?></td>
													<td width="20px;" id="cso3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="cso4" style="display:none; width:200px;"><?php echo $emp_data['cso']; ?></td>
													<td width="20px;" id="ngo3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="ngo4" style="display:none; width:200px;"><?php echo $emp_data['ngo']; ?></td>
													<td width="20px;" id="transpo3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="transpo4" style="display:none; width:200px;"><?php echo $emp_data['transport_group']; ?></td>
													<td width="20px;" id="house3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="house4" style="display:none;"><?php echo $emp_data['house_structure']; ?></td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									<tr>
										<td colspan="23"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="23" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
		</table>
</body>
<?php
	}else{
?>
<body onload="window.print();" style="background: url(../images/bmis_standard_head_big.png); background-repeat: no-repeat; background-size: 100% 25%;">
		<table style="margin:auto; margin-top:20%;">
		<tr>
			<td></td>			
		</tr>
		<tr>		
			<td style="text-align:center;">
				<h3><?php echo $title; ?> List Report</h3>
			</td>
		</tr>
		<table>
		<table style="margin:auto;">
		<tr><td>		
			<table style="padding:7px;">
			<tr>
				<td class="tdlabel">#</td>
				<td width="20px;">&nbsp;</td>
				<td class="tdlabel">Last Name</td>				
				<td width="20px;">&nbsp;</td>				
				<td class="tdlabel">First Name</td>
				<td width="20px;">&nbsp;</td>								
				<td class="tdlabel">Middle Name</td>
				<td width="20px;" id="suffix1" style="display:none;">&nbsp;</td>
				<td class="suffix_label" id="suffix2" style="display:none; width:40px;">Suffix</td>
				<td width="20px;" id="gender1" style="display:none;">&nbsp;</td>
				<td class="gender_label" id="gender2" style="display:none; width:40px;">Gender</td>
				<td width="20px;" id="age1" style="display:none;">&nbsp;</td>
				<td class="age_label" id="age2" style="display:none; width:40px;">Age</td>
				<td width="20px;" id="address1" style="display:none;">&nbsp;</td>
				<td class="address_label" id="address2" style="display:none; width:200px;">Address</td>
				<td width="20px;" id="contact1" style="display:none;">&nbsp;</td>
				<td class="contact_label" id="contact2" style="display:none; width:100px;">Contact No.</td>
				<td width="20px;" id="civil_stat1" style="display:none;">&nbsp;</td>
				<td class="civil_label" id="civil_stat2" style="display:none; width:200px;">Civil Status</td>
				<td width="20px;" id="cso1" style="display:none;">&nbsp;</td>
				<td class="cso_label" id="cso2" style="display:none; width:200px;">Civil Society Organization</td>
				<td width="20px;" id="ngo1" style="display:none;">&nbsp;</td>
				<td class="ngo_label" id="ngo2" style="display:none; width:200px;">Non Government Organization</td>
				<td width="20px;" id="transpo1" style="display:none;">&nbsp;</td>
				<td class="transpo_label" id="transpo2" style="display:none; width:200px;">Transport Group</td>
				<td width="20px;" id="house1" style="display:none;">&nbsp;</td>
				<td class="house_label" id="house2" style="display:none;">House Structure</td>
			</tr>
			<tr>
				<td colspan="23"><hr color='black' /></td>
			</tr>
								  <tbody>
									<?php
										$emp = $conn->prepare("SELECT $columns FROM tbl_resident
													WHERE is_deleted != '1' AND resident_status != 'Non-Resident' $state ORDER BY lastname");
										$emp->execute();
										if($emp->rowCount() > 0)
										{
											$ctr1 = 1;
											while($emp_data = $emp->fetch())
											{
												$address = "";

												if($emp_data['house_num']){
													$address .= $emp_data['house_num'];
												}else{

												}

												if($emp_data['unit_name'] && $address != ""){
													$address .= ', ' . $emp_data['unit_name'];
												}else if($emp_data['unit_name'] && $address == ""){
													$address .= $emp_data['unit_name'];
												}else{
													
												}

												if($emp_data['street_name'] && $address != ""){
													$address .= ', ' . $emp_data['street_name'];
												}else if($emp_data['street_name'] && $address == ""){
													$address .= $emp_data['street_name'];
												}else{

												}

												if($emp_data['purok'] && $address != ""){
													$address .= ', ' . $emp_data['purok'];
												}else if($emp_data['purok'] && $address == ""){
													$address .= $emp_data['purok'];
												}else{

												}

												if($emp_data['area_village'] && $address != ""){
													$address .= ', ' . $emp_data['area_village'];
												}else if($emp_data['area_village'] && $address == ""){
													$address .= $emp_data['area_village'];
												}else{

												}

												if($emp_data['barangay'] && $address != ""){
													$address .= ', ' . $emp_data['barangay'];
												}else if($emp_data['barangay'] && $address == ""){
													$address .= $emp_data['barangay'];
												}else{

												}

												if($emp_data['city_municipality'] && $address != ""){
													$address .= ', ' . $emp_data['city_municipality'];
												}else if($emp_data['city_municipality'] && $address == ""){
													$address .= $emp_data['city_municipality'];
												}else{

												}
									?>
												<tr>
													<td class="tddata" valign="top"><?php echo $ctr1++; ?>. </td>
													<td width="20px;">&nbsp;</td>													
													<td class="tddata" valign="top"><?php echo $emp_data['lastname']; ?></td>													
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['firstname']; ?></td>
													<td width="20px;">&nbsp;</td>
													<td class="tddata" valign="top"><?php echo $emp_data['middlename']; ?></td>
													<td width="20px;" id="suffix3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="suffix4" style="display:none; width:40px;"><?php echo $emp_data['suffix']; ?></td>
													<td width="20px;" id="gender3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="gender4" style="display:none; width:40px;"><?php echo $emp_data['gender']; ?></td>
													<td width="20px;" id="age3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="age4" style="display:none; width:40px;"><?php echo $emp_data['age']; ?></td>
													<td width="20px;" id="address3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="address4" style="width:200px; display:none;"><?php echo $address; ?></td>
													<td width="20px;" id="contact3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="contact4" style="display:none; width:100px;"><?php echo $emp_data['contactno']; ?></td>
													<td width="20px;" id="civil_stat3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="civil_stat4" style="display:none; width:200px;"><?php echo $emp_data['civilstatus']; ?></td>
													<td width="20px;" id="cso3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="cso4" style="display:none; width:200px;"><?php echo $emp_data['cso']; ?></td>
													<td width="20px;" id="ngo3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="ngo4" style="display:none; width:200px;"><?php echo $emp_data['ngo']; ?></td>
													<td width="20px;" id="transpo3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="transpo4" style="display:none; width:200px;"><?php echo $emp_data['transport_group']; ?></td>
													<td width="20px;" id="house3" style="display:none;">&nbsp;</td>
													<td class="tddata" valign="top" id="house4" style="display:none;"><?php echo $emp_data['house_structure']; ?></td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									<tr>
										<td colspan="23"><hr color='black' /></td>
									</tr>
									<tr style="border-top: 1px;">
										<td colspan="23" align="center">*** Nothing Follows ***</td>
									</tr>
					  </tbody>
			</table>            
		</td></tr>
		</table>
</body>
<?php
	}
?>

<script>
	var columns = "<?php echo $columns; ?>";

	var suffix = "<?php echo $_POST['suffix']; ?>";
	var gender = "<?php echo $_POST['gender']; ?>";
	var age = "<?php echo $_POST['age']; ?>";
	var address = "<?php echo $_POST['address']; ?>";
	var contact = "<?php echo $_POST['contact']; ?>";
	var civil_stat = "<?php echo $_POST['civil_stat']; ?>";
	var cso = "<?php echo $_POST['cso']; ?>";
	var ngo = "<?php echo $_POST['ngo']; ?>";
	var transport = "<?php echo $_POST['transport_group']; ?>";
	var house_struc = "<?php echo $_POST['house_structure']; ?>";

	console.log(suffix);
	console.log(gender);
	console.log(age);
	console.log(address);
	console.log(contact);
	console.log(civil_stat);
	console.log(cso);
	console.log(ngo);
	console.log(transport);
	console.log(house_struc);

	console.log(columns);

	if(suffix == "Yes"){
		var suf1 = document.querySelectorAll('#suffix1');
		for (let suffix1 of suf1) {
			suffix1.style.display = "inline-block";
		}
		var suf2 = document.querySelectorAll('#suffix2');
		for (let suffix2 of suf2) {
			suffix2.style.display = "inline-block";
		}
		var suf3 = document.querySelectorAll('#suffix3');
		for (let suffix3 of suf3) {
			suffix3.style.display = "inline-block";
		}
		var suf4 = document.querySelectorAll('#suffix4');
		for (let suffix4 of suf4) {
			suffix4.style.display = "inline-block";
		}
	}else{

	}

	if(gender == "Yes"){
		var gen1 = document.querySelectorAll('#gender1');
		for (let gender1 of gen1) {
			gender1.style.display = "inline-block";
		}
		var gen2 = document.querySelectorAll('#gender2');
		for (let gender2 of gen2) {
			gender2.style.display = "inline-block";
		}
		var gen3 = document.querySelectorAll('#gender3');
		for (let gender3 of gen3) {
			gender3.style.display = "inline-block";
		}
		var gen4 = document.querySelectorAll('#gender4');
		for (let gender4 of gen4) {
			gender4.style.display = "inline-block";
		}
	}else{

	}

	if(age == "Yes"){
		var ages1 = document.querySelectorAll('#age1');
		for (let age1 of ages1) {
			age1.style.display = "inline-block";
		}
		var ages2 = document.querySelectorAll('#age2');
		for (let age2 of ages2) {
			age2.style.display = "inline-block";
		}
		var ages3 = document.querySelectorAll('#age3');
		for (let age3 of ages3) {
			age3.style.display = "inline-block";
		}
		var ages4 = document.querySelectorAll('#age4');
		for (let age4 of ages4) {
			age4.style.display = "inline-block";
		}
	}else{

	}

	if(address == "Yes"){
		var add1 = document.querySelectorAll('#address1');
		for (let address1 of add1) {
			address1.style.display = "inline-block";
		}
		var add2 = document.querySelectorAll('#address2');
		for (let address2 of add2) {
			address2.style.display = "inline-block";
		}
		var add3 = document.querySelectorAll('#address3');
		for (let address3 of add3) {
			address3.style.display = "inline-block";
		}
		var add4 = document.querySelectorAll('#address4');
		for (let address4 of add4) {
			address4.style.display = "inline-block";
		}
	}else{

	}

	if(contact == "Yes"){
		var con1 = document.querySelectorAll('#contact1');
		for (let contact1 of con1) {
			contact1.style.display = "inline-block";
		}
		var con2 = document.querySelectorAll('#contact2');
		for (let contact2 of con2) {
			contact2.style.display = "inline-block";
		}
		var con3 = document.querySelectorAll('#contact3');
		for (let contact3 of con3) {
			contact3.style.display = "inline-block";
		}
		var con4 = document.querySelectorAll('#contact4');
		for (let contact4 of con4) {
			contact4.style.display = "inline-block";
		}
	}else{

	}

	if(civil_stat == "Yes"){
		var civil1 = document.querySelectorAll('#civil_stat1');
		for (let civil_stat1 of civil1) {
			civil_stat1.style.display = "inline-block";
		}
		var civil2 = document.querySelectorAll('#civil_stat2');
		for (let civil_stat2 of civil2) {
			civil_stat2.style.display = "inline-block";
		}
		var civil3 = document.querySelectorAll('#civil_stat3');
		for (let civil_stat3 of civil3) {
			civil_stat3.style.display = "inline-block";
		}
		var civil4 = document.querySelectorAll('#civil_stat4');
		for (let civil_stat4 of civil4) {
			civil_stat4.style.display = "inline-block";
		}
	}else{

	}

	if(cso == "Yes"){
		var c1 = document.querySelectorAll('#cso1');
		for (let cso1 of c1) {
			cso1.style.display = "inline-block";
		}
		var c2 = document.querySelectorAll('#cso2');
		for (let cso2 of c2) {
			cso2.style.display = "inline-block";
		}
		var c3 = document.querySelectorAll('#cso3');
		for (let cso3 of c3) {
			cso3.style.display = "inline-block";
		}
		var c4 = document.querySelectorAll('#cso4');
		for (let cso4 of c4) {
			cso4.style.display = "inline-block";
		}
	}else{

	}

	if(ngo == "Yes"){
		var n1 = document.querySelectorAll('#ngo1');
		for (let ngo1 of n1) {
			ngo1.style.display = "inline-block";
		}
		var n2 = document.querySelectorAll('#ngo2');
		for (let ngo2 of n2) {
			ngo2.style.display = "inline-block";
		}
		var n3 = document.querySelectorAll('#ngo3');
		for (let ngo3 of n3) {
			ngo3.style.display = "inline-block";
		}
		var n4 = document.querySelectorAll('#ngo4');
		for (let ngo4 of n4) {
			ngo4.style.display = "inline-block";
		}
	}else{

	}

	if(transport == "Yes"){
		var t1 = document.querySelectorAll('#transpo1');
		for (let transpo1 of t1) {
			transpo1.style.display = "inline-block";
		}
		var t2 = document.querySelectorAll('#transpo2');
		for (let transpo2 of t2) {
			transpo2.style.display = "inline-block";
		}
		var t3 = document.querySelectorAll('#transpo3');
		for (let transpo3 of t3) {
			transpo3.style.display = "inline-block";
		}
		var t4 = document.querySelectorAll('#transpo4');
		for (let transpo4 of t4) {
			transpo4.style.display = "inline-block";
		}
	}else{

	}

	if(house_struc == "Yes"){
		var h1 = document.querySelectorAll('#house1');
		for (let house1 of h1) {
			house1.style.display = "inline-block";
		}
		var h2 = document.querySelectorAll('#house2');
		for (let house2 of h2) {
			house2.style.display = "inline-block";
		}
		var h3 = document.querySelectorAll('#house3');
		for (let house3 of h3) {
			house3.style.display = "inline-block";
		}
		var h4 = document.querySelectorAll('#house4');
		for (let house4 of h4) {
			house4.style.display = "inline-block";
		}
	}else{

	}
</script>