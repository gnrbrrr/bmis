<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_patient_info WHERE is_deleted != '1'");
$sql->execute();


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
<head>
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
.select2 {
	border-bottom:solid 2px #666600;
	border-top:solid 0px #666600;
	border-left:solid 0px #666600;
	border-right:solid 0px #666600;
	width:227px;
	background:transparent;
}
</style>
</head>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Medical Records</h3>
				<p class="text-muted m-b-30">Display list of Patient Records</p></p>
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

					<div class="table-responsive"><!--TABLE TAB START-->
						<ul class="nav customtab nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#med" aria-controls="res" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-list"></i></span><span class="hidden-xs"> Initial Checkup</span></a></li>
									<li role="presentation" class=""><a href="#med_his" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Medical History</span></a></li>
						</ul>

						<!--TAB CONTENT START-->
						<div class="tab-content">

							<!--MEDICAL TAB START-->
							<div role="tabpanel" class="tab-pane fade active in" id="med">
								<table id="example23" class="display nowrap" style="overflow-x:scroll;">
									<thead>
										<tr>
											<th style="display:none;">id</th>
											<th>Patient</th>
											<th>Gender</th>
											<th>Contact</th>
											<th>Date of Examination</th>
											<th>Action</th>
											<th>Medical Certificate</th>
											<th>Prescription</th>
										</tr>
									</thead>
									<tfoot>
										<tr>									
											<th style="display:none;"></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
									</tfoot>
									<tbody>
										
										<?php
											$sql = $conn->prepare("SELECT * FROM tbl_patient_info WHERE is_deleted != '1' ORDER BY pi_id");
											$sql->execute();
											if($sql->rowCount() > 0)
											{
												while($sql_data = $sql->fetch())
												{
													$datev = date("M d, Y", strtotime($sql_data['mh_date_examination']));
										?>
													<tr>
														<td style="display:none;"><?php echo $sql_data['pi_id']; ?></td>
														<td><?php echo $sql_data['pi_name']; ?></td>
														<td><?php echo $sql_data['pi_sex']; ?></td>
														<td><?php echo $sql_data['pi_contact']; ?></td>
														<td><?php echo $datev; ?></td>
														<td>
															<a href="index.php?view=detail&id=<?php echo $sql_data['pi_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
															&nbsp;
															<a href="index.php?view=modify&id=<?php echo $sql_data['pi_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
															&nbsp;
															<a href="process.php?action=delete&id=<?php echo $sql_data['pi_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
														</td>
														<td>
															<a href="<?php echo WEB_ROOT; ?>medicalrecords/certificate.php?id=<?php echo $sql_data['pi_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
														</td>
														<td>
															<a href="<?php echo WEB_ROOT; ?>medicalrecords/prescription.php?id=<?php echo $sql_data['pi_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
														</td>
													</tr>
										<?php
												} // End While
											}else{}
										?>
										
									</tbody>
								</table>
							</div> <!--MEDICAL TAB END-->

							<!--MEDICAL HISTORY TAB START-->
							<div role="tabpanel" class="tab-pane fade" id="med_his">
								<table id="t4" class="display nowrap" style="overflow-x:scroll;">
									<thead>
										<tr>
											<th style="display:none;">id</th>
											<th>Patient</th>
											<th>Gender</th>
											<th>Contact</th>
											<th>Date of Examination</th>
											<th>Action</th>
											<th>Medical Certificate</th>
											<th>Prescription</th>
										</tr>
									</thead>
									<tfoot>
										<tr>									
											<th style="display:none;"></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
									</tfoot>
									<tbody>
										
										<?php
											$med = $conn->prepare("SELECT * FROM tbl_med_history WHERE is_deleted != '1' ORDER BY med_id");
											$med->execute();
											if($med->rowCount() > 0)
											{
												while($med_data = $med->fetch())
												{
													$dateh = date("M d, Y", strtotime($med_data['history_date_examination']));
													if($med_data['pi_id'] != 0){
														$patient_id = $med_data['pi_id'];

														$pat = $conn->prepare("SELECT * FROM tbl_patient_info WHERE pi_id = '$patient_id'");
														$pat->execute();
														$pat_data = $pat->fetch();

														$patient_name = $pat_data['pi_name'];
														$patient_gender = $pat_data['pi_sex'];
														$patient_contact = $pat_data['pi_contact'];
													}else{

													}
										?>
													<tr>
														<td style="display:none;"><?php echo $med_data['pi_id']; ?></td>
														<td><?php echo $patient_name; ?></td>
														<td><?php echo $patient_gender; ?></td>
														<td><?php echo $patient_contact; ?></td>
														<td><?php echo $dateh; ?></td>
														<td>
															<a href="index.php?view=detail_history&id=<?php echo $med_data['med_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
															&nbsp;
															<a href="index.php?view=modify_history&id=<?php echo $med_data['med_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
															&nbsp;
															<a href="process.php?action=delete_history&id=<?php echo $med_data['med_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
														</td>
														<td>
															<a href="<?php echo WEB_ROOT; ?>medicalrecords/other_certificate.php?id=<?php echo $med_data['med_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
														</td>
														<td>
															<a href="<?php echo WEB_ROOT; ?>medicalrecords/other_prescription.php?id=<?php echo $med_data['med_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
														</td>
													</tr>
										<?php
												} // End While
											}else{}
										?>
										
									</tbody>
								</table>
							</div> <!--MEDICAL HISTORY TAB END-->



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