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
				<div>
					<select class="select2" name="cars_available" style="width:200px;">
						<?php
							$day_today = date("l"); //gets day today like Monday, Tuesday, and so on

							$day = $conn->prepare("SELECT * FROM tbl_vehicle_trip");
							$day->execute();
							
							while($day_data = $day->fetch()){
								$vehicle_day = $day_data['trip_date'];

								if($day_today == $vehicle_day){

						?>
							<option value="<?php echo $day_data['tr_id']; ?>"><?php echo $day_data['trip_vehicle']; ?></option>
						<?php
								}else{

								}
							}
						?>
						<option value=""></option>
					</select>
				</div>
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

					<!-- vehicle record start  -->
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
		</div>
	</div> <!-- VEHICLE RECORD END HERE-->

	
	<script>
		$(document).ready(function() {
			$('input[type="search"]').css({
				'border': '2px solid black'
			});
		});
	</script>