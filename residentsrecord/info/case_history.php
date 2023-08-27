<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>

	
		<div class="col-md-12">
			<div class="white-box" style="overflow-x: scroll;">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">VAWC</h3>
				<table id="t2" class="display nowrap">
					<thead>
						<tr>
							<th>Entry No.</th>
							<th>Incident Type</th>
							<th>Reporting Person</th>							
							<th>Date Reported</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						
						<?php							
							$vaw = $conn->prepare("SELECT * FROM tbl_new_vwac WHERE is_deleted != '1' AND sus_given_name = '$firstname' AND sus_middle_name = '$middlename' AND sus_last_name = '$lastname' ORDER BY date_report ASC");
							$vaw->execute();
							if($vaw->rowCount() > 0)
							{
								while($vaw_data = $vaw->fetch())
								{
									$reporting_person = "";

									if($vaw_data['given_name']){
										$reporting_person .= $vaw_data['given_name'];
									}else{
										
									}

									if($vaw_data['middle_name']){
										$reporting_person .= ' ' . $vaw_data['middle_name'];
									}else{

									}

									if($vaw_data['last_name']){
										$reporting_person .= ' ' . $vaw_data['last_name'];
									}else{

									}

									$date_report = date("M d, Y", strtotime($vaw_data['date_report']));
						?>
									<tr>
										<td><?php echo $vaw_data['entry_number']; ?></td>
										<td><?php echo $vaw_data['incident_type']; ?></td>
										<td><?php echo $reporting_person; ?></td>
										<td><?php echo $date_report; ?></td>
									</tr>
						<?php
								} // End While
							}else{}
						?>
						
					</tbody>
				</table>
			</div>

			<div class="white-box" style="overflow-x: scroll;">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">BCPC</h3>
				<table id="t3" class="display nowrap">
					<thead>
						<tr>
							<th>Reference No.</th>
							<th>Case No.</th>
							<th>Case Type</th>
							<th>Victim</th>							
							<th>Date Reported</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						
						<?php							
							$bcpc = $conn->prepare("SELECT * FROM tbl_vwac WHERE is_deleted != '1' AND vwac_perpetrator_firstname = '$firstname' AND vwac_perpetrator_middlename = '$middlename' AND vwac_perpetrator_lastname = '$lastname' ORDER BY vwac_date_reported ASC");
							$bcpc->execute();
							if($bcpc->rowCount() > 0)
							{
								while($bcpc_data = $bcpc->fetch())
								{
									$victim = "";

									if($bcpc_data['vwac_victim_firstname']){
										$victim .= $bcpc_data['vwac_victim_firstname'];
									}else{
										
									}

									if($bcpc_data['vwac_victim_middlename']){
										$victim .= ' ' . $bcpc_data['vwac_victim_middlename'];
									}else{

									}

									if($bcpc_data['vwac_victim_lastname']){
										$victim .= ' ' . $bcpc_data['vwac_victim_lastname'];
									}else{

									}

									$date_reported = date("M d, Y", strtotime($bcpc_data['vwac_date_reported']));
						?>
									<tr>
										<td><?php echo $bcpc_data['reference_no']; ?></td>
										<td><?php echo $bcpc_data['case_no']; ?></td>
										<td><?php echo $bcpc_data['vwac_typeofcase']; ?></td>
										<td><?php echo $victim; ?></td>
										<td><?php echo $date_report; ?></td>
									</tr>
						<?php
								} // End While
							}else{}
						?>
						
					</tbody>
				</table>
			</div>

			<div class="white-box" style="overflow-x: scroll;">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Blotter</h3>
				<table id="t4" class="display nowrap">
					<thead>
						<tr>
							<th>Blotter No.</th>
							<th>Complainant</th>
							<th>Nature of Case</th>
							<th>Date Filed</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						
						<?php							
							$blot = $conn->prepare("SELECT * FROM tbl_blotter WHERE is_deleted != '1' AND respondent_firstname = '$firstname' AND respondent_middlename = '$middlename' AND respondent_lastname = '$lastname' ORDER BY date_reported ASC");
							$blot->execute();
							if($blot->rowCount() > 0)
							{
								while($blot_data = $blot->fetch())
								{
									$date_reported = date("M d, Y", strtotime($blot_data['date_reported']));
						?>
									<tr>
										<td><?php echo $blot_data['blotter_no']; ?></td>
										<td><?php echo $blot_data['complainant']; ?></td>
										<td><?php echo $blot_data['natureofcase']; ?></td>
										<td><?php echo $date_reported; ?></td>
									</tr>
						<?php
								} // End While
							}else{}
						?>
						
					</tbody>
				</table>
			</div>

			<div class="white-box" style="overflow-x: scroll;">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Lupon Tagapamayapa</h3>
				<table id="t5" class="display nowrap">
					<thead>
						<tr>
							<th>Usaping Barangay BLG.</th>
							<th>Ukol sa</th>
							<th>Complainant/s</th>
							<th>Date</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						
						<?php							
							$lup = $conn->prepare("SELECT * FROM tbl_lupon WHERE is_deleted != '1' AND lpn_respondent1_firstname = '$firstname' AND lpn_respondent1_middlename = '$middlename' AND lpn_respondent1_lastname = '$lastname' OR lpn_respondent2_firstname = '$firstname' AND lpn_respondent2_middlename = '$middlename' AND lpn_respondent2_lastname = '$lastname' OR lpn_respondent3_firstname = '$firstname' AND lpn_respondent3_middlename = '$middlename' AND lpn_respondent3_lastname = '$lastname' ORDER BY lpn_date ASC");
							$lup->execute();
							if($lup->rowCount() > 0)
							{
								while($lup_data = $lup->fetch())
								{
									$lpn_date = date("M d, Y", strtotime($lup_data['lpn_date']));

									$complaints = "";

									if($lup_data['lpn_complaints1_firstname']){
										$complaints .= $lup_data['lpn_complaints1_firstname'];
									}else{

									}

									if($lup_data['lpn_complaints1_middlename']){
										$complaints .= ' ' . $lup_data['lpn_complaints1_middlename'];
									}else{

									}

									if($lup_data['lpn_complaints1_lastname']){
										$complaints .= ' ' . $lup_data['lpn_complaints1_lastname'];
									}else{

									}

									if($lup_data['lpn_complaints2_firstname']){
										$complaints .= ', ' . $lup_data['lpn_complaints2_firstname'];
									}else{

									}

									if($lup_data['lpn_complaints2_middlename']){
										$complaints .= ' ' . $lup_data['lpn_complaints2_middlename'];
									}else{

									}

									if($lup_data['lpn_complaints2_lastname']){
										$complaints .= ' ' . $lup_data['lpn_complaints2_lastname'];
									}else{

									}

									if($lup_data['lpn_complaints3_firstname']){
										$complaints .= ', ' . $lup_data['lpn_complaints3_firstname'];
									}else{

									}

									if($lup_data['lpn_complaints3_middlename']){
										$complaints .= ' ' . $lup_data['lpn_complaints3_middlename'];
									}else{

									}

									if($lup_data['lpn_complaints3_lastname']){
										$complaints .= ' ' . $lup_data['lpn_complaints3_lastname'];
									}else{

									}
						?>
									<tr>
										<td><?php echo $lup_data['lpn_usp_brgy_blg']; ?></td>
										<td><?php echo $lup_data['lpn_ukol_sa']; ?></td>
										<td><?php echo $complaints; ?></td>
										<td><?php echo $lpn_date; ?></td>
									</tr>
						<?php
								} // End While
							}else{}
						?>
						
					</tbody>
				</table>
			</div>

			<div class="white-box" style="overflow-x: scroll;">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">BADAC</h3>
				<table id="t6" class="display nowrap">
					<thead>
						<tr>
							<th>Contact No.</th>
							<th>Status</th>
							<th>Date Accomplished</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						
						<?php							
							$bad = $conn->prepare("SELECT * FROM tbl_badak WHERE is_deleted != '1' AND bdk_unang_pangalan = '$firstname' AND bdk_gitnang_pangalan = '$middlename' AND bdk_huling_pangalan = '$lastname' ORDER BY bdk_date_ac ASC");
							$bad->execute();
							if($bad->rowCount() > 0)
							{
								while($bad_data = $bad->fetch())
								{
									$bdk_date_acc = date("M d, Y", strtotime($bad_data['bdk_date_ac']));
						?>
									<tr>
										<td><?php echo $bad_data['bdk_numero_tel']; ?></td>
										<td><?php echo $bad_data['status']; ?></td>
										<td><?php echo $bdk_date_acc; ?></td>
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
		<!-- <style>
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
		</style> -->
		