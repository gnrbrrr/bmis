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
				<h3 class="box-title m-b-0">Vehicle Schedule</h3>
				<p class="text-muted m-b-30">Display list of Inventory Records</p></p>
					<?php
						if($errorMessage == 'Deleted Successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}else if($errorMessage == 'Return Successfully')
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
							<li role="presentation" class="active"><a href="#cars" aria-controls="res" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-list"></i></span><span class="hidden-xs"> Vehicle List</span></a></li>
							<li role="presentation" class=""><a href="#trips" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Vehicle Scheduled Trips</span></a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="cars">
								<form method="post" action="index.php?view=add_trip">
									&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10"><br /><br /><br />
								<form>
								<table id="example23" class="display nowrap">
									<thead>
										<tr>
											<th>Car</th>
											<th>Plate No.</th>
											<th>Action</th>
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
											$sql = $conn->prepare("SELECT * FROM tbl_vehicle_trip WHERE is_deleted != '1'");
											$sql->execute();
											if($sql->rowCount() > 0)
											{
												while($sql_data = $sql->fetch())
												{
										?>
													<tr>
														<td><?php echo $sql_data['trip_vehicle']; ?></td>
														<td><?php echo $sql_data['trip_plate_num']; ?></td>
														<td>
															<a href="index.php?view=detail_trip&id=<?php echo $sql_data['tr_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
															&nbsp;
															<a href="index.php?view=modify_trip&id=<?php echo $sql_data['tr_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
															&nbsp;
															<a href="process.php?action=delete_trip&id=<?php echo $sql_data['tr_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
														</td>
													</tr>
										<?php
												} // End While
											}else{}
										?>
										
									</tbody>
								</table>
							</div> <!-- Cars Tab End -->

							<!-- Trips Tab Start -->
							<div role="tabpanel" class="tab-pane fade" id="trips">
								<table id="t3" class="display nowrap">
									<thead>
										<tr>
											<th>Driver</th>
											<th>Vehicle</th>
											<th>Plate No.</th>
											<th>Time Reserved</th>
											<th>Date Reserved</th>
											<th>Date Returned</th>
											<th>Destination</th>
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
											$veh = $conn->prepare("SELECT * FROM tbl_vehicle WHERE is_deleted != '1' ORDER BY date_reserved");
											$veh->execute();
											if($veh->rowCount() > 0){
												while($veh_data = $veh->fetch()){
													$date_res = date("M d, Y", strtotime($veh_data['date_reserved']));
													
													if($veh_data['date_returned']){
														$date_ret = date("M d, Y", strtotime($veh_data['date_returned']));
													}else{
														$date_ret = "-- --";
													}
													
													if($veh_data['tr_id'] != 0){
														$veht_id = $veh_data['tr_id'];
														$veht = $conn->prepare("SELECT * FROM tbl_vehicle_trip WHERE tr_id = '$veht_id'");
														$veht->execute();
														$veht_data = $veht->fetch();
														$car = $veht_data['trip_vehicle'];
														$plate = $veht_data['trip_plate_num'];
													}else{
														
													}
										?>
											<tr>
												<td><?php echo $veh_data['driver']; ?></td>
												<td><?php echo $car; ?></td>
												<td><?php echo $plate; ?></td>
												<td><?php echo $veh_data['time_reserved']; ?></td>
												<td><?php echo $date_res; ?></td>
												<td><?php echo $date_ret; ?></td>
												<td><?php echo $veh_data['destination']; ?></td>
											</tr>
										<?php
												}
											}else{}
										?>
									</tbody>
								</table>
							</div> <!-- Trips Tab End -->

						</div> <!-- Tab Content End -->
					</div> <!-- Table Responsive End -->
			</div><!--WHITE BOX END-->
		</div><!--COL SM START-->
	</div><!--ROW START-->
	<script>
		$(document).ready(function() {
			$('input[type="search"]').css({
				'border': '2px solid black'
			});
		});

		// Get the input element
		const dateInput = document.getElementById("date-input");

		// Add an event listener to the input element
		dateInput.addEventListener("change", function() {
			// Get the value of the input
			const inputDate = new Date(this.value);

			// Extract the date and day
			const outputDate = inputDate.toLocaleDateString();
			const outputDay = inputDate.toLocaleDateString('en-US', {weekday: 'long'});

			// Update the output elements
			document.getElementById("output-date").textContent = outputDate;
			document.getElementById("output-day").textContent = outputDay;
		});
	</script>




