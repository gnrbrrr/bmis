<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_new_vwac WHERE is_deleted != '1'");
$sql->execute();


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
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
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">VAWC</h3>
				<p class="text-muted m-b-30">Display list of VAWC Records</p>
					<form method="post" action="index.php?view=add">
						&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10">
					<form>
				
					<?php
						if($errorMessage == 'Added Successfully'){
					?>
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
							<b><?php echo $errorMessage; ?></b>
						</div>
					<?php
						}else if($errorMessage == 'Deleted Successfully')
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
								<th>Case No.</th>
								<th>Victim Name</th>
								<th>Perpetrator Name</th>
								<th>Action</th>
								<th>Print</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Case No.</th>
								<th>Victim Name</th>
								<th>Perpetrator Name</th>
								<th>Action</th>
								<th>Print</th>
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
											<td>
												<?php echo utf8_encode($sql_data['entry_number']); ?></td>
											<td><?php echo $sql_data['last_name']; ?>, <?php echo $sql_data['given_name']; ?></td>
											<td><?php echo $sql_data['sus_last_name']; ?>, <?php echo $sql_data['sus_given_name']; ?></td>
											<td>
												<a href="index.php?view=detail&id=<?php echo $sql_data['vwac_id']; ?>" class="btn btn-warning waves-effect waves-light"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a href="index.php?view=modify&id=<?php echo $sql_data['vwac_id']; ?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="process.php?action=delete&id=<?php echo $sql_data['vwac_id']; ?>" class="btn btn-danger waves-effect waves-light" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
											</td>
											<td><a href="<?php echo WEB_ROOT; ?>vawc/certificate.php?id=<?php echo $sql_data['vwac_id']; ?>"><i class="fa fa-print fa-fw"></i></a></td>
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