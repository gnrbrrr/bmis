<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_project WHERE is_deleted != '1'");
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
				<h3 class="box-title m-b-0">Project</h3>
				<p class="text-muted m-b-30">Display list of Project</p></p>
					<form method="post" action="index.php?view=add">
						&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10"><br /><br /><br />
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
								<th>Title</th>
								<th>Proponent/Project Leader</th>
								<th>Project Cost</th>
								<th>Target Completion Date</th>
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
							</tr>
						</tfoot>
						<tbody>
							
							<?php
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{
										$dateofcom = date("M d, Y", strtotime($sql_data['p_date']));
							?>
										<tr>
											<td><?php echo utf8_encode($sql_data['p_title']); ?></td>
											<td><?php echo $sql_data['p_leader']; ?></td>
											<td>&#8369;<?php echo number_format($sql_data['p_cost'], 2); ?></td>
											<td><?php echo $dateofcom; ?></td>
											<td><?php echo $sql_data['p_status']; ?></td>
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
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('input[type="search"]').css({
				'border' : '2px solid black'
			});
		});
	</script>