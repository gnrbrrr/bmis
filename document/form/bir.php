<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$sql = $conn->prepare("SELECT * FROM tbl_document_request ORDER BY dr_id DESC LIMIT 1");
$sql->execute();

$sql_ref = $sql->fetch();

if($sql_ref == 0){ //checks if tbl_document_request is empty or not
	$reference_num = "0000";
	$reference_num = intval($reference_num) + 1;
	$reference_num = sprintf("%04d", $reference_num);
}else{
	$reference_num = intval($sql_ref['reference_num']) + 1;

	$reference_num = sprintf("%04d", $reference_num);
}

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
						<td class="label"><b>Reference No.</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="refno" value="<?php echo $reference_num; ?>" autocomplete=off readonly />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>								
						<td class="label"><b>Requestor's Name</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $res_data['firstname']; ?> <?php echo $res_data['middlename']; ?> <?php echo $res_data['lastname']; ?> <?php echo $res_data['suffix']; ?></td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>								
						<td class="label"><b>Address</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $address; ?></td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Deceased's Name</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="dname" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Relationship</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="relationship" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Date of Death</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="date" class="txt_bx" id="exampleInputuname" name="dtdeath" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Purpose</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="purpose" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>OR No.</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="orno" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Amount</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="amount" onKeyUp="checkNumber(this);" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Signing Person</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><select class="text_bx" id="exampleInputuname" name="person_sign" required>
							<option value="none"> </option>
							<option value="VINCENT JOAQUIN M. ESTACIO">Vincent Joaquin M. Estacio</option>
							<option value="DANILO C. MANIQUIS">Danilo C. Maniquis</option>
							<option value="HENRY B. CUDILLA">Henry B. Cudilla</option>
							<option value="ENRIQUE P. AÑONUEVO">Enrique P. Añonuevo</option>
							<option value="ABEL S. MANALANSAN">Abel S. Manalansan</option>
							<option value="MARIA CECILIA M. RAMOS">Maria Cecilia M. Ramos</option>
							<option value="PRECILLA C. NUEVA">Precilla C. Nueva</option>
						</select></td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Date Issued</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="date" class="txt_bx" id="exampleInputuname" name="dtissued" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					<tr>
						<td class="label"><b>Issued By:</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="issued_by" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>

					<input type="hidden" name="resid" value="<?php echo $resid; ?>" />
			
		</tbody>
	</table>