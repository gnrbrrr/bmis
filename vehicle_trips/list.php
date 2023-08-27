<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_vehicle_trip WHERE is_deleted != '1'");
$sql->execute();


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
<head>
<style rel="stylesheet">
	.counter{
		position:relative;
		top: 0;
		right: 0;
	}
	.counter td{
		color:black !important;
	}

	.counter #ongoing{
		background-color:#ffb136 !important;
		border-radius:5px;
	}
	.counter #settled{
		background-color:#00bbd9 !important;
		border-radius:5px;
	}
	.counter #unsettled{
		background-color:#e74a25 !important;
		border-radius:5px;
	}

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
<br />
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Vehicle Trips Record</h3>
				<p class="text-muted m-b-30">Display list of Vehicle Trips Records</p>
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
								<th>Car</th>
								<th>Plate No.</th>
								<th>Time Available</th>
								<th>Day Available</th>
								<th>Time Dispatch</th>
								<th>Time Return</th>
								<th>Location</th>
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
							?>
										<tr>
											<td><?php echo $sql_data['trip_vehicle']; ?></td>
											<td><?php echo $sql_data['trip_plate_num']; ?></td>
											<td><?php echo $sql_data['trip_time']; ?></td>
											<td><?php echo $sql_data['trip_date']; ?></td>
											<td><?php echo $sql_data['trip_dispatch']; ?></td>
											<td><?php echo $sql_data['trip_return']; ?></td>
											<td><?php echo $sql_data['trip_location']; ?></td>
											<td>
												<a href="index.php?view=detail&id=<?php echo $sql_data['tr_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a href="index.php?view=modify&id=<?php echo $sql_data['tr_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="process.php?action=delete&id=<?php echo $sql_data['tr_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
											</td>
										</tr>
							<?php
									} // End While
								}else{}
							?>
							
						</tbody>
					</table>
					<br />
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