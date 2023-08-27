<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM bs_registration WHERE is_deleted != '1'");
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
</style>
</head>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Registration</h3>
				<p class="text-muted m-b-30">Display list of Registrations</p></p>
						
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
								<th>Last Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
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
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{
										$datofocc = date("M d, Y | h:i A", strtotime($sql_data['date_registered']));
							?>
										<tr>
											<td><?php echo $sql_data['lastname']; ?></td>
											<td><?php echo $sql_data['middlename']; ?> </td>
											<td><?php echo $sql_data['lastname']; ?> </td>
											<td><?php echo $datofocc; ?></td>											
											<td>
												<a href="<?php echo WEB_ROOT; ?>images/registration/<?php echo $sql_data['image']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-file-image-o m-l-5"></i> <span>View</span></a>
												<!--&nbsp;
												<a href="process.php?action=delete&id=<?php echo $sql_data['uid']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
												!-->
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