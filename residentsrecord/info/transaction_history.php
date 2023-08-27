<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>

	
		<div class="col-md-12">
			<div class="white-box" style="overflow-x: scroll;">
				<table id="t1" class="display nowrap">
					<thead>
						<tr>
							<th>Reference No.</th>
							<th class="cert-column">Certificate/Clearance Name</th>
							<th>Purpose</th>
							<th>Date Issued</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th class="cert-column"></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						
						<?php							
							$doc = $conn->prepare("SELECT * FROM tbl_document_request WHERE is_deleted != '1' AND r_id = '$id' ORDER BY date_issued ASC");
							$doc->execute();
							if($doc->rowCount() > 0)
							{
								while($doc_data = $doc->fetch())
								{
									$cer_id = $doc_data['cer_id'];
									$purpose = $doc_data['purpose'];
									$date_issued = date("M d, Y", strtotime($doc_data['date_issued']));

									$cer = $conn->prepare("SELECT * FROM tbl_certificate WHERE cer_id = '$cer_id'");
									$cer->execute();
									$cer_data = $cer->fetch();

									$cert_name = $cer_data['cer_name'];
						?>
									<tr>
										<td><?php echo $doc_data['reference_num']; ?></td>
										<td class="cert-column"><?php echo $cert_name; ?></td>
										<td><?php echo $purpose; ?></td>
										<td><?php echo $date_issued; ?></td>
									</tr>
						<?php
								} // End While
							}else{}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('input[type="search"]').css({
					'border': '2px solid black'
				});
			});
		</script>
		<style>
			.cert-column {
				min-width: 200px !important;
				max-width: 200px !important;
				/* overflow: scroll; */
				word-wrap: break-word;
				white-space: pre-wrap !important;
			}
			
			.remark-column {
				min-width: 300px !important;
				max-width: 300px !important;
				/* overflow: scroll; */
				word-wrap: break-word;
				white-space: pre-wrap !important;
			}
		</style>
		