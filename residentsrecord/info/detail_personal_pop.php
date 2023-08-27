<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>

		<div class="col-md-6">
			<div class="white-box">
				<table style="font-size:14px;" cellpadding="17" cellspacing="17">					
					<tbody>
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
							<td class="th">Purok/Zone</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['purok']; ?></td>							
						</tr>						
						<tr>
							<td class="th" colspan="3">Current Address :<br /><p class="par"><?php echo $sql_data['address']; ?></p></td>
														
						</tr>
						<tr>
							<td class="th" colspan="3">Permanent Address :<br /><p class="par"><?php echo $sql_data['paddress']; ?></p></td>
														
						</tr>
						<tr>
							<td class="th">Years of Residency</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['yearsofresidency']; ?></td>							
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
	