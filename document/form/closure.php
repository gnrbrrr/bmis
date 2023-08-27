<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$sql = $conn->prepare("SELECT * FROM tbl_document_request ORDER BY dr_id DESC LIMIT 1");
$sql->execute();

$sql_ref = $sql->fetch();

$reference_num = intval($sql_ref['reference_num']) + 1;

$reference_num = sprintf("%04d", $reference_num);

?>
	<table style="border:solid 0px #000000; width:100%;">						
		<tbody>
				<tr>
						<td class="label"><b>Reference No.</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="refno" value="<?php echo $reference_num; ?>" autocomplete=off readonly />
						</td>
					</tr>
					<tr><td><br /></td></tr>

				<tr>								
						<td class="label"><b>Business Name</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="business_name" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>
					
					<tr>								
						<td class="label"><b>Business Address</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="business_address" autocomplete=off required />	
						</td>
					</tr>
					<tr><td><br /></td></tr>	

					<tr>								
						<td class="label"><b>Owner's Name</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="owner_name" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>

					<tr>
						<td class="label"><b>Date of Closure</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="date" class="txt_bx" id="exampleInputuname" name="dtclosure" autocomplete=off required />
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
						<td class="label"><b>OR Number</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="ornum" required />
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
					<tr><td><br /></td></tr>
			
		</tbody>
	</table>