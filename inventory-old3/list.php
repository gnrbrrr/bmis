<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_inventory WHERE is_deleted != '1'");
$sql->execute();


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
<head>
<style rel="stylesheet">
th
{
	text-align: center;
	color: #000 !important;
	font-family: Arial !important;
	font-weight: bold !important;
	font-size:13px !important;
}
td
{
	text-align: center;
	color: #666666 !important;
	font-family: Arial !important;
	font-size:12px !important;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>
	<div class="row"><!--ROW START-->
		<div class="col-sm-12"><!--SOL SM START-->
			<div class="white-box"><!--WHITE BOX START-->
				<h3 class="box-title m-b-0">Inventory</h3>
				<p class="text-muted m-b-30">Display list of Inventory Records</p></p>		
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
									<li role="presentation" class="active"><a href="#brgy_inven" aria-controls="res" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-list"></i></span><span class="hidden-xs"> Barangay Inventory</span></a></li>
									<li role="presentation" class=""><a href="#bdrrm" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Rescue Unit Inventory</span></a></li>                                
									<li role="presentation" class=""><a href="#medicine" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Medicine Inventory</span></a></li>                                
						</ul>

						<!--TAB CONTENT START-->
						<div class="tab-content">

							<!--BRGY INVENTORY START-->
							<div role="tabpanel" class="tab-pane fade active in" id="brgy_inven">
								<form method="post" action="index.php?view=add">
									&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10"><br /><br /><br />
								<form>
								<div class="table-responsive">
									<table id="example23" class="display nowrap">
										<thead>
											<tr>
												<th>Item</th>
												<th>Serial No.</th>
												<th>Amount</th>
												<th>Date</th>
												<th>Total Quantity</th>
												<th>Available Quantity</th>
												<th>Condition</th>
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
												<th></th>
											</tr>
										</tfoot>
										<tbody>
											
											<?php
												if($sql->rowCount() > 0)
												{
													while($sql_data = $sql->fetch())
													{
														$datofocc = date("M d, Y", strtotime($sql_data['in_dop']));
														
											?>
														<tr>
															<td><?php echo utf8_encode($sql_data['in_item']); ?></td>
															<td><?php echo $sql_data['in_serialno']; ?> </td>
															<td>&#8369;<?php echo number_format($sql_data['in_amt'], 2); ?></td>
															<td><?php echo $datofocc; ?></td>
															<td style="text-align:center;"><?php echo $sql_data['in_qty']; ?></td>
															<td style="text-align:center;"><?php echo $sql_data['in_available_qty']; ?></td>
															<td><?php echo $sql_data['in_condition']; ?></td>
															<td>
																<a href="index.php?view=detail&id=<?php echo $sql_data['uid']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
																&nbsp;
																<a href="index.php?view=modify&id=<?php echo $sql_data['uid']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
																&nbsp;
																<a href="process.php?action=delete&id=<?php echo $sql_data['uid']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
															</td>
														</tr>
											<?php
													} // End While
												}else{}
											?>
											
										</tbody>
									</table>
								</div>
							</div><!--BRGY INVENTORY END-->

							<!--BDRRM START-->
							<div role="tabpanel" class="tab-pane fade" id="bdrrm">
								<a href="index.php?view=add_parti" class="btn btn-success pull-right m-t-10 font10"><span>Add Particular</span></a><br /><br /><br />
								<table id="hof7" class="display nowrap">
									<thead>
										<tr>
											<th style="display:none;">s_id</th>
											<th>Particulars</th>
											<th>Total Quantity</th>
											<th>Consumed</th>
											<th>Available Quantity</th>
											<th>Remarks</th>										
											<th>Action</th>
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
										</tr>
									</tfoot>
									<tbody>
										<?php
										$sql = $conn->prepare("SELECT * FROM tbl_bdrrm WHERE is_deleted != '1' ORDER BY s_id");
										$sql->execute();
										while($bdrrm = $sql->fetch()){
										?>
											<tr>
												<td style="display:none;"><?php echo $bdrrm['s_id']; ?></td>
												<td><?php echo $bdrrm['particulars']; ?></td>
												<td><?php echo $bdrrm['quantity']; ?></td>
												<td><?php echo $bdrrm['consumed']; ?></td>
												<td><?php echo $bdrrm['on_hand']; ?></td>
												<td><?php echo $bdrrm['remarks']; ?></td>
												<td>
													<a href="index.php?view=modify_parti&id=<?php echo $bdrrm['s_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
													&nbsp;
													<a href="process.php?action=delete_particular&id=<?php echo $bdrrm['s_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
												</td>
											</tr>

										<?php
										}
										?>
									</tbody>
								</table>
							</div> <!--BDRRM END-->

							<!-- medicine start -->
							<div role="tabpanel" class="tab-pane fade" id="medicine">
								<a href="index.php?view=add_med" class="btn btn-success pull-right m-t-10 font10"><span>Add Medicine</span></a><br /><br /><br />
								<table id="t1" class="display nowrap">
									<thead>
										<tr>
											<th style="display:none;">s_id</th>
											<th>Medicine</th>
											<th>Total Quantity</th>
											<th>Consumed</th>
											<th>Available Quantity</th>
											<th>Remarks</th>										
											<th>Action</th>
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
										</tr>
									</tfoot>
									<tbody>
										<?php
										$sql = $conn->prepare("SELECT * FROM tbl_med_inventory WHERE is_deleted != '1' ORDER BY medi_id");
										$sql->execute();
										while($med = $sql->fetch()){
										?>
											<tr>
												<td style="display:none;"><?php echo $med['medi_id']; ?></td>
												<td><?php echo $med['medicine']; ?></td>
												<td><?php echo $med['quantity']; ?></td>
												<td><?php echo $med['consumed']; ?></td>
												<td><?php echo $med['on_hand']; ?></td>
												<td><?php echo $med['remarks']; ?></td>
												<td>
													<a href="index.php?view=modify_medicine&id=<?php echo $med['medi_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
													&nbsp;
													<a href="process.php?action=delete_medicine&id=<?php echo $med['medi_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
												</td>
											</tr>

										<?php
										}
										?>
									</tbody>
								</table>
							</div> <!--medicine END-->

						</div><!--TAB CONTENT END-->

					</div><!--TABLE TAB END-->
			</div><!--WHITE BOX END-->
		</div><!--COL SM START-->
	</div><!--ROW START-->
	<style>
		input[type="search"]{
			border:2px solid black;
		}
	</style>