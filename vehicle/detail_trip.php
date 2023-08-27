<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_vehicle_trip WHERE tr_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Vehicle</h3>
				<p class="text-muted m-b-30 font-13"> View Vehicle Record </p>
			
				<div class="m-l-40"><b class="text-info">Vehicle : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['trip_vehicle']; ?></p>
				</div>
				
				<div class="m-l-40"><b class="text-info">Plate No. : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['trip_plate_num']; ?></p>
				</div>
				
				<br /><br />
				<div class="form-group m-b-0">
					<div class="col-sm-offset-4 col-sm-9">
						<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify_trip&id=<?php echo $sql_data['tr_id']; ?>"><i class="fa fa-edit fa-fw"></i>Edit</a>
						<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
					</div>
				</div>
				<br /><br /><br />
			</div>
		</div>
		
		<!-- Maintenance End -->
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Vehicle Maintenance</h3>
				<p class="text-muted m-b-30">Display list of Maintenance</p></p>
				<?php
					if($errorMessage == 'Added Maintenance Successfully'){
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
						<b><?php echo $errorMessage; ?></b>
					</div>
				<?php
					}else if($errorMessage == 'Deleted Maintenance Successfully'){
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
						<b><?php echo $errorMessage; ?></b>
					</div>
				<?php
					}
				?>
				<div class="table-responsive">
					<a href="index.php?view=add_maint&id=<?php echo $sql_data['tr_id']; ?>" class="btn btn-success waves-effect waves-light btn-xs"><span>Add Maintenance Record</span></a>
					<table id="example23" class="display nowrap" style="font-size:12px;">
						<thead>
							<tr>
								<th>Date Maintenance</th>
								<th>Expenses</th>
								<th>Remarks</th>
								<th>Action</th>
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
								$maint = $conn->prepare("SELECT * FROM tbl_vehicle_maint WHERE tr_id = '$id' AND is_deleted != '1' ORDER BY date_maintenance");
								$maint->execute();
								if($maint->rowCount() > 0){
									while($maint_data = $maint->fetch()){
										$date_maint = date("M d, Y", strtotime($maint_data['date_maintenance']));
							?>
								<tr>
									<td><?php echo $date_maint; ?></td>
									<td>&#8369;<?php echo number_format($maint_data['expenses'], 2); ?></td>
									<td><?php echo $maint_data['remarks_maint']; ?></td>
									<td>
										<a href="index.php?view=detail_maint&id=<?php echo $maint_data['vm_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
										&nbsp;
										<a href="index.php?view=modify_maint&id=<?php echo $maint_data['vm_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
										&nbsp;
										<a href="process.php?action=delete_maint&id=<?php echo $maint_data['vm_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
									</td>
								</tr>
							<?php
									}
								}else{}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Reserve Trips End -->
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Vehicle Trips</h3>
				<p class="text-muted m-b-30">Display list of Trips</p></p>
				<?php
					if($errorMessage == 'Added Reservation Successfully'){
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
						<b><?php echo $errorMessage; ?></b>
					</div>
				<?php
					}else if($errorMessage == 'Deleted Reservation Successfully'){
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
						<b><?php echo $errorMessage; ?></b>
					</div>
				<?php
					}else if($errorMessage == 'Returned Successfully')
					{
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
						<b><?php echo $errorMessage; ?></b>
					</div>
				<?php
					}
				?>
				<div class="table-responsive">
					<a href="index.php?view=add&id=<?php echo $sql_data['tr_id']; ?>" class="btn btn-success waves-effect waves-light btn-xs"><span> Reserve Trip</span></a>
					<table id="t1" class="display nowrap" style="font-size:12px;">
						<thead>
							<tr>
								<th>Driver</th>
								<th>Time Reserved</th>
								<th>Date Reserved</th>
								<th>Date Returned</th>
								<th>Destination</th>
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
								$veh = $conn->prepare("SELECT * FROM tbl_vehicle WHERE tr_id = '$id' AND is_deleted != '1' ORDER BY date_reserved");
								$veh->execute();
								if($veh->rowCount() > 0){
									while($veh_data = $veh->fetch()){
										$date_res = date("M d, Y", strtotime($veh_data['date_reserved']));

										if($veh_data['date_returned']){
											$date_ret = date("M d, Y", strtotime($veh_data['date_returned']));
											$rtn_btn = "style='display:none;'";
										}else{
											$date_ret = "";
											$rtn_btn = "style='display:inline-block;'";
										}
							?>
								<tr>
									<td><?php echo $veh_data['driver']; ?></td>
									<td><?php echo $veh_data['time_reserved']; ?></td>
									<td><?php echo $date_res; ?></td>
									<td><?php echo $date_ret; ?></td>
									<td><?php echo $veh_data['destination']; ?></td>
									<td>
										<a href="index.php?view=detail&id=<?php echo $veh_data['vh_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
										&nbsp;
										<a href="index.php?view=modify&id=<?php echo $veh_data['vh_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
										&nbsp;
										<a href="process.php?action=delete&id=<?php echo $veh_data['vh_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
										&nbsp;
										<a <?php echo $rtn_btn; ?> href="index.php?view=return&id=<?php echo $veh_data['vh_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Return</span></a>
									</td>
								</tr>
							<?php
									}
								}else{}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
	</div>
	<style>
		p{
			color:black;
		}
	</style>
	<script>
		$(document).ready(function() {
			$('input[type="search"]').css({
				'border': '2px solid black'
			});
		});
	</script>