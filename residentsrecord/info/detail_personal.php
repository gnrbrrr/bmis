<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

	$danger_zone = $sql_data['danger_zone'];

	if($danger_zone == ""){
		$danger_zone = "No";
	}else{
		$danger_zone = $sql_data['danger_zone'];
	}

?>

		<div class="col-md-6">
			<div class="white-box">
				<table style="font-size:14px;" cellpadding="17" cellspacing="17">					
					<tbody>
						<tr>
							<td class="th">Resident Account No.</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['acc_no_tag']; ?><?php echo $sql_data['acc_no']; ?></td>
						</tr>
						<tr>
							<td class="th">Residential Status</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['resident_category']; ?></td>
						</tr>
						<tr>
							<td class="th">First Name</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['firstname']; ?></td>							
						</tr>
						<tr>
							<td class="th">Middle Name</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['middlename']; ?></td>							
						</tr>
						<tr>
							<td class="th">Last Name</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['lastname']; ?></td>							
						</tr>
						<tr>
							<td class="th">Suffix</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['suffix']; ?></td>							
						</tr>
						<tr>
							<td class="th">Alias</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['alias']; ?></td>							
						</tr>
						<tr>
							<td class="th">Birthdate</td>
							<td class="th">:</td>
							<td class="td"><?php echo $bday; ?></td>							
						</tr>
						<tr>
							<td class="th">Age</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['age']; ?></td>							
						</tr>
						<tr>
							<td class="th" colspan="3">Birth Place :<br /><p class="par"><?php echo $sql_data['birthplace']; ?></p></td>
														
						</tr>
						<tr>
							<td class="th">Gender</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['gender']; ?></td>							
						</tr>
						<tr>
							<td class="th">LGBTQ+</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['lgbtq']; ?></td>							
						</tr>
					</tbody>
				</table>							
			</div>
		</div>
		<div class="col-md-6">
			<div class="white-box">
				<table style="font-size:14px;" cellpadding="17" cellspacing="17">					
					<tbody>
						<tr>
							<td class="th">Civil Status</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['civilstatus']; ?></td>							
						</tr>
						<tr>
							<td class="th">Citizenship</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['citizenship']; ?></td>							
						</tr>
						<tr>
							<td class="th">Religion</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['religion']; ?></td>							
						</tr>
						<tr>
							<td class="th">Contact No.</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['contactno']; ?></td>							
						</tr>
						<tr>
							<td class="th">Email</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['email']; ?></td>							
						</tr>
						<tr>
							<td class="th">House / Lot Number</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['house_num']; ?></td>							
						</tr>
						<tr>
							<td class="th">Unit / Building Name</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['unit_name']; ?></td>							
						</tr>
						<tr>
							<td class="th">Street Name</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['street_name']; ?></td>							
						</tr>
						<tr>
							<td class="th">Purok / Zone</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['purok']; ?></td>							
						</tr>
						<tr>
							<td class="th">Area / Village</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['area_village']; ?></td>							
						</tr>
						<tr>
							<td class="th">Barangay</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['barangay']; ?></td>							
						</tr>
						<tr>
							<td class="th">City / Municipality</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['city_municipality']; ?></td>							
						</tr>
						<tr>
							<td class="th">Years of Residency</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['yearsofresidency']; ?></td>							
						</tr>
						<tr>
							<td class="th">In Danger Zone</td>
							<td class="th">:</td>
							<td class="td"><?php echo $danger_zone; ?></td>							
						</tr>
						<tr id="geo" style="display:none;">
							<td class="th">Geographical Location</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['geographical_location']; ?></td>							
						</tr>
						<tr>
							<td class="th">Resident Status</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['resident_status']; ?></td>							
						</tr>
						<tr>
							<td class="th">Homeownership</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['type_of_residency']; ?></td>							
						</tr>
					</tbody>
				</table>			
			</div>
		</div>
		<script>
			var danger = "<?php echo $sql_data['danger_zone']; ?>";

			if(danger == ""){
				danger = "No";
			}else{

			}

			if(danger == "Yes"){
				$("#geo").show();
			}else{
				$("#geo").hide();
			}
		</script>
	