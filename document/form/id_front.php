<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

?>
	<table style="border:solid 0px #000000; width:100%;">						
		<tbody>			
			<?php									
				if(isset($_POST['res']))
				{ $resid = $_POST['res']; }else{ $resid = $_GET['res']; }
			
				$res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$resid'");
				$res->execute();
				$res_data = $res->fetch();
				
				$birthday = date("M d, Y", strtotime($res_data['birthdate']));

				$address = $res_data['house_num'] . $res_data['unit_name'] . $res_data['street_name'] . $res_data['purok'] . $res_data['area_village'] . $res_data['barangay'] . $res_data['city_municipality'];
			?>
					<tr>
						<td class="label"><b>ID No.</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="idno" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>								
						<td class="label"><b>Requestor's Name</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $res_data['firstname']; ?> <?php echo $res_data['middlename']; ?> <?php echo $res_data['lastname']; ?></td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>								
						<td class="label"><b>Precint No.</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $res_data['precintno']; ?></td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>								
						<td class="label"><b>Address</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $address; ?></td>
					</tr>
					<tr><td><br /></td></tr>


					<tr>								
						<td class="label"><b>Birth Date</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $birthday; ?></td>
					</tr>
					<tr><td><br /></td></tr>
					
					<tr>								
						<td class="label"><b>Civil Status</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $res_data['civilstatus']; ?></td>
					</tr>
					<tr><td><br /></td></tr>
					
					<tr>								
						<td class="label"><b>Gender</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $res_data['gender']; ?></td>
					</tr>
					<tr><td><br /></td></tr>

					<tr>
						<td class="label"><b>Contact Person</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="contact_person" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Contact No.</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="contact_person_num" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Date Issued</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="date" class="txt_bx" id="exampleInputuname" name="dtissued" autocomplete=off required />
						</td>
					</tr>
					<input type="hidden" name="resid" value="<?php echo $resid; ?>" />
			
		</tbody>
	</table>