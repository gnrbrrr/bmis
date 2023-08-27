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
				<h3 class="box-title m-b-0">Covid 19 Monitoring</h3>
				<p class="text-muted m-b-30">Display Covid 19 Monitoring Records</p>
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
					<a href="index.php?view=add&opt=0" class="btn btn-success pull-right m-t-10 font10">Add New</a><br /><br /><br /><br />
					<table id="example23" class="display nowrap">
						<thead>
							<tr>
								<th>Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Address</th>										
								<th>Occupation</th>
								<th>Status</th>
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
								$sql = $conn->prepare("SELECT * FROM tbl_covid_cases WHERE is_deleted != '1' ORDER BY cc_name ASC");
								$sql->execute();
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{
							?>
										<tr>
											<td><?php echo $sql_data['cc_name']; ?></td>
											<td><?php echo $sql_data['cc_age']; ?></td>
											<td><?php echo $sql_data['cc_gender']; ?></td>
											<td><?php echo $sql_data['cc_address']; ?></td>
											<td><?php echo $sql_data['cc_occupation']; ?></td>
											<td><?php echo $sql_data['cc_status']; ?></td>													
											<td>
												<a href="index.php?view=detail&id=<?php echo $sql_data['cc_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a href="index.php?view=modify&id=<?php echo $sql_data['cc_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="process.php?action=delete&id=<?php echo $sql_data['cc_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
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