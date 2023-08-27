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
				$obusid = $_POST['obus'];
				$obus = $conn->prepare("SELECT * FROM tbl_business_other WHERE ob_id = '$obusid'");
				$obus->execute();
				$obus_data = $obus->fetch();
			?>
				<tr>
						<td class="label"><b>Reference No.</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="refno" value="<?php echo $reference_num; ?>" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>

					<tr>								
						<td class="label"><b>Applicant's Name</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $obus_data['applicant_name']; ?></td>
					</tr>
					<tr><td><br /></td></tr>
					
					<tr>								
						<td class="label"><b>Applicant's Address</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $obus_data['applicant_address']; ?></td>
					</tr>
					<tr><td><br /></td></tr>

					<tr>
						<td class="label"><b>Application Type</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data"><?php echo $obus_data['application_type']?></td>
					</tr>
					<tr><td><br /></td></tr>

					<tr>
						<td class="label"><b>OR No</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="orno" autocomplete=off required />
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

					<tr>
						<td class="label"><b>Amount</b></td>
						<td class="dot"><b>:</b></td>
						<td class="data">
							<input type="text" class="txt_bx" id="exampleInputuname" name="amount" autocomplete=off required />
						</td>
					</tr>
					<tr><td><br /></td></tr>

					<input type="hidden" name="obusid" value="<?php echo $obusid; ?>" />
			
		</tbody>
	</table>

	<script>
		$(".nob").click(function(){
			var value_checked = $(this).val();

			if(value_checked == "Others"){
				$("#nob_txt").show();
			}
			else{
				$("#nob_txt").hide();
			}
		});
	</script>