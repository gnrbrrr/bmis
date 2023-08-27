<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_lupon WHERE is_deleted != '1'");
$sql->execute();


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
<style rel="stylesheet">
th
{   
   color: #000 !important;
   font-family: Arial !important;
   font-weight: bold !important;
   font-size:13px !important;
}
td
{   
   color: #666666 !important;
   font-family: Arial !important;  
   font-size:12px !important;
}
</style>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Lupon ng Tagapamayapa</h3>
				<p class="text-muted m-b-30">Display list of Lupon ng Tagapamayapa Records</p>
					<form method="post" action="index.php?view=add">
						&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10"><br /><br /><br /><br />
					<form>
				
					<?php
						if($errorMessage == 'Deleted successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}else{}
					?>
				<div class="table-responsive">				
					<table id="example23" class="display nowrap">
						<thead>
							<tr>
								<th>Cases</th>
								<th>Contact No.</th>
								<th>Action</th>
								<th>Print</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Cases</th>
								<th>Contact No.</th>
								<th>Action</th>
								<th></th>
							</tr>
						</tfoot>
						<tbody>
							
							<?php
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{
										$complainants = "";
										$respondents = "";

										//Complainants
										if($sql_data['lpn_complaints1_firstname'] && $sql_data['lpn_complaints1_lastname']){
											if($sql_data['lpn_complaints1_firstname']){
												$complainants .= $sql_data['lpn_complaints1_firstname'];
											}else{

											}

											if($sql_data['lpn_complaints1_middlename']){
												$complainants .= " " . $sql_data['lpn_complaints1_middlename'];
											}else{

											}

											if($sql_data['lpn_complaints1_lastname']){
												$complainants .= " " . $sql_data['lpn_complaints1_lastname'];
											}else{

											}
										}else{

										}

										if($sql_data['lpn_complaints2_firstname'] && $sql_data['lpn_complaints2_lastname']){
											if($sql_data['lpn_complaints2_firstname'] && $complainants != ""){
												$complainants .= ", " . $sql_data['lpn_complaints2_firstname'];
											}else{
												$complainants .= $sql_data['lpn_complaints2_firstname'];
											}

											if($sql_data['lpn_complaints2_middlename']){
												$complainants .= " " . $sql_data['lpn_complaints2_middlename'];
											}else{

											}

											if($sql_data['lpn_complaints2_lastname']){
												$complainants .= " " . $sql_data['lpn_complaints2_lastname'];
											}else{

											}
										}else{

										}

										if($sql_data['lpn_complaints3_firstname'] && $sql_data['lpn_complaints3_lastname']){
											if($sql_data['lpn_complaints3_firstname'] && $complainants != ""){
												$complainants .= ", " . $sql_data['lpn_complaints3_firstname'];
											}else{
												$complainants .= $sql_data['lpn_complaints3_firstname'];
											}

											if($sql_data['lpn_complaints3_middlename']){
												$complainants .= " " . $sql_data['lpn_complaints3_middlename'];
											}else{

											}

											if($sql_data['lpn_complaints3_lastname']){
												$complainants .= " " . $sql_data['lpn_complaints3_lastname'];
											}else{

											}
										}else{

										}

										//Respondents
										if($sql_data['lpn_respondent1_firstname'] && $sql_data['lpn_respondent1_lastname']){
											if($sql_data['lpn_respondent1_firstname']){
												$respondents .= $sql_data['lpn_respondent1_firstname'];
											}else{

											}

											if($sql_data['lpn_respondent1_middlename']){
												$respondents .= " " . $sql_data['lpn_respondent1_middlename'];
											}else{

											}

											if($sql_data['lpn_respondent1_lastname']){
												$respondents .= " " . $sql_data['lpn_respondent1_lastname'];
											}else{

											}
										}else{

										}

										if($sql_data['lpn_respondent2_firstname'] && $sql_data['lpn_respondent2_lastname']){
											if($sql_data['lpn_respondent2_firstname'] && $respondents != ""){
												$respondents .= ", " . $sql_data['lpn_respondent2_firstname'];
											}else{
												$respondents .= $sql_data['lpn_respondent2_firstname'];
											}

											if($sql_data['lpn_respondent2_middlename']){
												$respondents .= " " . $sql_data['lpn_respondent2_middlename'];
											}else{

											}

											if($sql_data['lpn_respondent2_lastname']){
												$respondents .= " " . $sql_data['lpn_respondent2_lastname'];
											}else{

											}
										}else{

										}

										if($sql_data['lpn_respondent3_firstname'] && $sql_data['lpn_respondent3_lastname']){
											if($sql_data['lpn_respondent3_firstname'] && $respondents != ""){
												$respondents .= ", " . $sql_data['lpn_respondent3_firstname'];
											}else{
												$respondents .= $sql_data['lpn_respondent3_firstname'];
											}

											if($sql_data['lpn_respondent3_middlename']){
												$respondents .= " " . $sql_data['lpn_respondent3_middlename'];
											}else{

											}

											if($sql_data['lpn_respondent3_lastname']){
												$respondents .= " " . $sql_data['lpn_respondent3_lastname'];
											}else{

											}
										}else{

										}
							?>
										<tr>
											<td>
												<?php echo utf8_encode($sql_data['lpn_usp_brgy_blg']); ?>, <?php echo $complainants; ?> | <?php echo $respondents; ?>
											</td>
											<td><?php echo $sql_data['lpn_contactno']; ?></td>
											<td>
												<a href="index.php?view=detail&id=<?php echo $sql_data['lpn_id']; ?>" class="btn btn-warning waves-effect waves-light"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a href="index.php?view=modify&id=<?php echo $sql_data['lpn_id']; ?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="process.php?action=delete&id=<?php echo $sql_data['lpn_id']; ?>" class="btn btn-danger waves-effect waves-light" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
											</td>
											<td>
												<a href="<?php echo WEB_ROOT; ?>lupon/certificate.php?id=<?php echo $sql_data['lpn_id']; ?>">Official</a>
												&nbsp; | &nbsp;
												<a href="<?php echo WEB_ROOT; ?>lupon/certificate2.php?id=<?php echo $sql_data['lpn_id']; ?>">With Council</a>
											</td>
										</tr>
							<?php
									} // End While
								}else{}
							?>
							
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('input[type="search"]').css({
				'border': '2px solid black'
			});
		});
	</script>

	