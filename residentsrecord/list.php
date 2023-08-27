<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$new = $conn->prepare("SELECT * FROM tbl_resident WHERE is_active = '0'");
	$new->execute();
	$new_num = $new->rowCount();
	
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
.par
{   
   color: #666666 !important;
   font-family: Arial !important;  
   font-size:14px !important;
}
</style>
</head>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Resident Record</h3>
				<p class="text-muted m-b-30">Display list of Resident Records</p>
					<form method="post" action="index.php?view=add">
						&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10">
					</form>		
					<?php
						if($errorMessage == 'Deleted successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
						else if($errorMessage == 'Confirmed successfully')
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
					<ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#res" aria-controls="res" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-list"></i></span><span class="hidden-xs"> List of Residents</span></a></li>
                                <li role="presentation" class=""><a href="#non_res" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">List of Non-Residents</span></a></li>
                                <li role="presentation" class=""><a href="#hof" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Household</span></a></li>
                                <li role="presentation" class=""><a href="#dec" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">List of Deceased</span></a></li>
                    </ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="res"> <!-- Resident list-->
							<table id="example23" class="display nowrap">
								<thead>
									<tr>
										<th>Resident Account ID</th>
										<th>Name</th>
										<th>Mobile No.</th>
										<th>Gender</th>
										<th>Civil Status</th>
										<th>Household No.</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
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
										$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' AND status != 'Deceased' AND resident_status = 'Resident' ORDER BY lastname ASC");
										$sql->execute();
										if($sql->rowCount() > 0)
										{
											while($sql_data = $sql->fetch())
											{												
									?>
												<tr>
													<td><?php echo $sql_data['acc_no_tag']; ?><?php echo $sql_data['acc_no']; ?></td>
													<td>
														<?php echo $sql_data['lastname']; ?>, <?php echo $sql_data['firstname']; ?> <?php echo $sql_data['middlename']; ?> <?php echo $sql_data['suffix']; ?>
													</td>
													<td><?php echo $sql_data['contactno']; ?></td>
													<td><?php echo $sql_data['gender']; ?></td>
													<td><?php echo $sql_data['civilstatus']; ?></td>
													<td><?php echo $sql_data['householdno']; ?></td>
													<td>
														<a href="index.php?view=detail&id=<?php echo $sql_data['r_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
														&nbsp;
														<a href="index.php?view=modify&id=<?php echo $sql_data['r_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
														&nbsp;
														<a href="process.php?action=delete&id=<?php echo $sql_data['r_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>														
													</td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									
								</tbody>
							</table>
						</div>

						<div role="tabpanel" class="tab-pane fade" id="non_res"> <!--Non-Resident list-->
							<table id="t3" class="display nowrap">
								<thead>
									<tr>
										<th>Name</th>
										<th>Mobile No.</th>
										<th>Gender</th>
										<th>Civil Status</th>
										<th>Household No.</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
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
										$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' AND status != 'Deceased' AND resident_status != 'Resident' ORDER BY lastname ASC");
										$sql->execute();
										if($sql->rowCount() > 0)
										{
											while($sql_data = $sql->fetch())
											{												
									?>
												<tr>
													<td>
														<?php echo $sql_data['lastname']; ?>, <?php echo $sql_data['firstname']; ?> <?php echo $sql_data['middlename']; ?> <?php echo $sql_data['suffix']; ?>
													</td>
													<td><?php echo $sql_data['contactno']; ?></td>
													<td><?php echo $sql_data['gender']; ?></td>
													<td><?php echo $sql_data['civilstatus']; ?></td>
													<td><?php echo $sql_data['householdno']; ?></td>
													<td>
														<a href="index.php?view=detail&id=<?php echo $sql_data['r_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
														&nbsp;
														<a href="index.php?view=modify&id=<?php echo $sql_data['r_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
														&nbsp;
														<a href="process.php?action=delete&id=<?php echo $sql_data['r_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>														
													</td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									
								</tbody>
							</table>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="hof"> <!--Head of the family-->
							<table id="hof7" class="display nowrap">
								<thead>
									<tr>
										<th>Resident Account ID</th>
										<th>Head of Family</th>
										<th>Mobile No.</th>
										<th>Gender</th>
										<th>Civil Status</th>
										<th>Age</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
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
										$sql7 = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' AND status != 'Deceased' AND is_head_of_family = '1' AND resident_status = 'Resident' ORDER BY lastname ASC");
										$sql7->execute();
										if($sql7->rowCount() > 0)
										{
											while($sql7_data = $sql7->fetch())
											{										
									?>
												<tr>
													<td><?php echo $sql7_data['acc_no_tag']; ?><?php echo $sql7_data['acc_no']; ?></td>
													<td>
														<?php echo utf8_encode($sql7_data['lastname']); ?>, <?php echo $sql7_data['firstname']; ?> <?php echo $sql7_data['middlename']; ?> <?php echo $sql7_data['suffix']; ?>
													</td>
													<td><?php echo $sql7_data['contactno']; ?></td>
													<td><?php echo $sql7_data['gender']; ?></td>
													<td><?php echo $sql7_data['civilstatus']; ?></td>
													<td><?php echo $sql7_data['age']; ?></td>
													<td>
														<a href="index.php?view=detail&id=<?php echo $sql7_data['r_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>Views</span></a>
														&nbsp;
														<a href="index.php?view=modify&id=<?php echo $sql7_data['r_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
														&nbsp;
														<a href="process.php?action=delete&id=<?php echo $sql7_data['r_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
													</td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									
								</tbody>
							</table>
						</div>

						<div role="tabpanel" class="tab-pane fade" id="dec"> <!--deceased list-->
							<table id="t4" class="display nowrap">
								<thead>
									<tr>
										<th>Name</th>
										<th>Mobile No.</th>
										<th>Gender</th>
										<th>Civil Status</th>
										<th>Household No.</th>
										<th>Action</th>
										<th>Death Certificate</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
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
										$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' AND status = 'Deceased' ORDER BY lastname ASC");
										$sql->execute();
										if($sql->rowCount() > 0)
										{
											while($sql_data = $sql->fetch())
											{												
									?>
												<tr>
													<td>
														<?php echo $sql_data['lastname']; ?>, <?php echo $sql_data['firstname']; ?> <?php echo $sql_data['middlename']; ?> <?php echo $sql_data['suffix']; ?>
													</td>
													<td><?php echo $sql_data['contactno']; ?></td>
													<td><?php echo $sql_data['gender']; ?></td>
													<td><?php echo $sql_data['civilstatus']; ?></td>
													<td><?php echo $sql_data['householdno']; ?></td>
													<td>
														<a href="index.php?view=detail&id=<?php echo $sql_data['r_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
														&nbsp;
														<a href="index.php?view=modify&id=<?php echo $sql_data['r_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
														&nbsp;
														<a href="process.php?action=delete&id=<?php echo $sql_data['r_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>														
													</td>
													<td>
														<a href="<?php echo WEB_ROOT; ?>residentsrecord/death_cert.php?id=<?php echo $sql_data['r_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
													</td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									
								</tbody>
							</table>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="newreg"> 
							<table id="t1" class="display nowrap">
								<thead>
									<tr>
										<th>Head of Family</th>
										<th>Mobile No.</th>
										<th>Gender</th>
										<th>Civil Status</th>
										<th>Age</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
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
										$sql77 = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' AND is_active != '1' ORDER BY lastname ASC");
										$sql77->execute();
										if($sql77->rowCount() > 0)
										{
											while($sql77_data = $sql77->fetch())
											{
												if ($sql77_data['image']) {
													$thumbnail7 = WEB_ROOT . 'images/resident/' . $sql77_data['image'];
												} else {
													$thumbnail7 = WEB_ROOT . 'images/resident/noimage.png';
												}
									?>
												<tr>
													<td>
														<?php echo utf8_encode($sql77_data['lastname']); ?>, <?php echo $sql77_data['firstname']; ?> <?php echo $sql77_data['middlename']; ?>
													</td>
													<td><?php echo $sql77_data['contactno']; ?></td>
													<td><?php echo $sql77_data['gender']; ?></td>
													<td><?php echo $sql77_data['civilstatus']; ?></td>
													<td><?php echo $sql77_data['age']; ?></td>
													<td>
														<a href="index.php?view=detail&id=<?php echo $sql77_data['uid']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
														&nbsp;
														<a href="index.php?view=modify&id=<?php echo $sql77_data['uid']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
														&nbsp;
														<a href="process.php?action=delete&id=<?php echo $sql77_data['uid']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
														<?php if($sql77_data['is_active'] == 1){ ?>
															&nbsp;&nbsp;<span class="label label-rounded label-success"><b>Active</b></span>
														<?php }else{ ?>
															&nbsp;
															<a href="" class="btn btn-primary waves-effect waves-light btn-xs" data-toggle="modal" data-target="#myModal_<?php echo $sql77_data['uid']; ?>"><i class="fa fa-check m-l-5"></i> <span>Confirm</span></a>
														
															<!-- sample modal content -->
															<div id="myModal_<?php echo $sql77_data['uid']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																			<div class="profile-img pull-right">
																				<img src="<?php echo $thumbnail7; ?>" alt="user-img" class="img-circle" style="width:127px; height:127px;">																				
																			</div>
																			<h4 class="modal-title" id="myModalLabel">																				
																				<b><?php echo utf8_encode($sql77_data['lastname']); ?>, <?php echo $sql77_data['firstname']; ?> <?php echo $sql77_data['middlename']; ?></b>
																				<hr />
																				<p class="par"><?php echo utf8_encode($sql77_data['contactno']); ?>
																					<br /><?php echo utf8_encode($sql77_data['gender']); ?>
																					<br /><?php echo utf8_encode($sql77_data['age']); ?>
																				</p>																				
																			</h4>
																		</div>
																		<div class="modal-body">
																			<h4>Are you sure to confirm this Resident?</h4>
																			<p><?php echo $sql77_data['purok']; ?></p>
																			<p><?php echo $sql77_data['address']; ?></p>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-info waves-effect pull-left" data-dismiss="modal">Close</button>
																			<form method="post" action="process.php?action=confirm">
																				<input type="hidden" name="id" value="<?php echo $sql77_data['uid']; ?>" />
																				&nbsp; <input type="submit" name="submit" value="Confirm Resident" class="btn btn-success pull-right m-t-10 font10">
																			</form>
																		</div>
																	</div>
																	<!-- /.modal-content -->
																</div>
																<!-- /.modal-dialog -->
															</div>
														<?php } ?>
													</td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									
								</tbody>
							</table>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="newreg">
							<table id="t1" class="display nowrap">
								<thead>
									<tr>
										<th>Head of Family</th>
										<th>Mobile No.</th>
										<th>Gender</th>
										<th>Civil Status</th>
										<th>Age</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
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
										$sql77 = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' AND is_active != '1' ORDER BY lastname ASC");
										$sql77->execute();
										if($sql77->rowCount() > 0)
										{
											while($sql77_data = $sql77->fetch())
											{
												if ($sql77_data['image']) {
													$thumbnail7 = WEB_ROOT . 'images/resident/' . $sql77_data['image'];
												} else {
													$thumbnail7 = WEB_ROOT . 'images/resident/noimage.png';
												}
										?>
												<tr>
													<td>
														<?php echo utf8_encode($sql77_data['lastname']); ?>, <?php echo $sql77_data['firstname']; ?> <?php echo $sql77_data['middlename']; ?>
													</td>
													<td><?php echo $sql77_data['contactno']; ?></td>
													<td><?php echo $sql77_data['gender']; ?></td>
													<td><?php echo $sql77_data['civilstatus']; ?></td>
													<td><?php echo $sql77_data['age']; ?></td>
													<td>
														<a href="index.php?view=detail&id=<?php echo $sql77_data['uid']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
														&nbsp;
														<a href="index.php?view=modify&id=<?php echo $sql77_data['uid']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
														&nbsp;
														<a href="process.php?action=delete&id=<?php echo $sql77_data['uid']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
														<?php if($sql77_data['is_active'] == 1){ ?>
															&nbsp;&nbsp;<span class="label label-rounded label-success"><b>Active</b></span>
														<?php }else{ ?>
															&nbsp;
															<a href="" class="btn btn-primary waves-effect waves-light btn-xs" data-toggle="modal" data-target="#myModal_<?php echo $sql77_data['uid']; ?>"><i class="fa fa-check m-l-5"></i> <span>Confirm</span></a>
														
															<!-- sample modal content -->
															<div id="myModal_<?php echo $sql77_data['uid']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																			<div class="profile-img pull-right">
																				<img src="<?php echo $thumbnail7; ?>" alt="user-img" class="img-circle" style="width:127px; height:127px;">																				
																			</div>
																			<h4 class="modal-title" id="myModalLabel">																				
																				<b><?php echo utf8_encode($sql77_data['lastname']); ?>, <?php echo $sql77_data['firstname']; ?> <?php echo $sql77_data['middlename']; ?></b>
																				<hr />
																				<p class="par"><?php echo utf8_encode($sql77_data['contactno']); ?>
																					<br /><?php echo utf8_encode($sql77_data['gender']); ?>
																					<br /><?php echo utf8_encode($sql77_data['age']); ?>
																				</p>																				
																			</h4>
																		</div>
																		<div class="modal-body">
																			<h4>Are you sure to confirm this Resident?</h4>
																			<p><?php echo $sql77_data['purok']; ?></p>
																			<p><?php echo $sql77_data['address']; ?></p>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-info waves-effect pull-left" data-dismiss="modal">Close</button>
																			<form method="post" action="process.php?action=confirm">
																				<input type="hidden" name="id" value="<?php echo $sql77_data['uid']; ?>" />
																				&nbsp; <input type="submit" name="submit" value="Confirm Resident" class="btn btn-success pull-right m-t-10 font10">
																			</form>
																		</div>
																	</div>
																	<!-- /.modal-content -->
																</div>
																<!-- /.modal-dialog -->
															</div>
														<?php } ?>
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
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('input[type="search"]').css({
				'border': '2px solid black'
			});
		});
	</script>