<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_new_vwac WHERE is_deleted != '1'");
$sql->execute();


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">VAWC
					<form method="post" action="newvawcform/index.php" target=_new>
						&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10">
					<form>					
				</h3>
				<p class="text-muted m-b-30"></p>
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
					<table id="myTable" class="table table-striped">
						<thead>
							<tr>
								<th>Case No.</th>
								<th>Victim Name</th>
								<th>Perpetrator Name</th>
								<!--<th>Action</th>!-->
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Case No.</th>
								<th>Victim Name</th>
								<th>Perpetrator Name</th>
								<!--<th>Action</th>!-->
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
											<!--<td><a href="index.php?view=vwac_modify&id=<?php echo $sql_data['uid']; ?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="vwac_process.php?action=delete&id=<?php echo $sql_data['uid']; ?>" class="btn btn-danger waves-effect waves-light" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
											</td>!-->
										</tr>
							<?php
									} // End While
								}else{}
							?>
							
						</tbody>
					</table>
					
				</div>
				<a href="<?php echo WEB_ROOT; ?>case/vawc_report.php">PRINT</a>
			</div>
		</div>
	</div>