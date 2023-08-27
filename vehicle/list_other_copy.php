<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}


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
</style>
</head>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Vehicle Record</h3>
				<p class="text-muted m-b-30">Display list of Vehicle Records</p>
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
					<ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#vlog" aria-controls="res" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-list"></i></span><span class="hidden-xs"> Vehicle Daily Records</span></a></li>
                                <li role="presentation" class=""><a href="#vmain" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Vehicle Maintenance</span></a></li>                                
                    </ul>
					
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="vlog">							
							<a href="index.php?view=add" class="btn btn-success pull-right m-t-10 font10">Add New</a><br /><br /><br /><br />
							<table id="example23" class="display nowrap">
								<thead>
									<tr>
										<th>Vehicle</th>
										<th>Driver</th>
										<th>Plate No.</th>
										<th>Date</th>										
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
									</tr>
								</tfoot>
								<tbody>
									
									<?php
										$sql = $conn->prepare("SELECT * FROM tbl_vehicle WHERE is_deleted != '1' ORDER BY date_activity ASC");
										$sql->execute();
										if($sql->rowCount() > 0)
										{
											while($sql_data = $sql->fetch())
											{
												$datev = date("M d, Y", strtotime($sql_data['date_activity']));
									?>
												<tr>
													<td><?php echo $sql_data['vehicle']; ?></td>
													<td><?php echo $sql_data['driver']; ?></td>
													<td><?php echo $sql_data['plateno']; ?></td>
													<td><?php echo $datev; ?></td>													
													<td>
														<a href="index.php?view=detail&id=<?php echo $sql_data['vh_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
														&nbsp;
														<a href="index.php?view=modify&id=<?php echo $sql_data['vh_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
														&nbsp;
														<a href="process.php?action=delete&id=<?php echo $sql_data['vh_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
													</td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									
								</tbody>
							</table>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="vmain">
							<table id="hof7" class="display nowrap">
								<thead>
									<tr>
										<th>Vehicle</th>
										<th>Driver</th>
										<th>Plate No.</th>
										<th>Expenses</th>
										<th>Date Maintenance</th>
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
										$sql7 = $conn->prepare("SELECT * FROM tbl_vehicle_maint WHERE is_deleted != '1' ORDER BY date_maintenance");
										$sql7->execute();
										if($sql7->rowCount() > 0)
										{
											while($sql7_data = $sql7->fetch())
											{
												$datev7 = date("M d, Y", strtotime($sql7_data['date_maintenance']));

												if($sql7_data['vh_id'] != 0){
													$vehicle_id = $sql7_data['vh_id'];
													$veh = $conn->prepare("SELECT * FROM tbl_vehicle WHERE vh_id = '$vehicle_id'");
													$veh->execute();
													$veh_data = $veh->fetch();
													
													$vehicle = $veh_data['vehicle'];
													$driver = $veh_data['driver'];
													$plateno = $veh_data['plateno'];
												}else{
													$vehicle = "-- --";
													$driver = "-- --";
													$plateno = "-- --";
												}
									?>
												<tr>													
													<td><?php echo $vehicle; ?></td>
													<td><?php echo $driver; ?></td>
													<td><?php echo $plateno; ?></td>
													<td>&#8369;<?php echo number_format($sql7_data['expenses'], 2); ?></td>
													<td><?php echo $datev7; ?></td>
													<td>
														<a href="index.php?view=detail_maint&id=<?php echo $sql7_data['vm_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
														&nbsp;
														<a href="index.php?view=modify_maint&id=<?php echo $sql7_data['vm_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
														&nbsp;
														<a href="process.php?action=delete_maint&id=<?php echo $sql7_data['vm_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
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