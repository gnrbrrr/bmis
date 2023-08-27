<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_lupon WHERE is_deleted != '1'");
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
			<div class="background">
				<div class="transbox">
					<button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
				</div>
			</div>
				<h3 class="box-title m-b-0">Lupon ng Tagapamayapa
					<form method="post" action="index.php?view=lupon_add">
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
					<table id="myTable" class="display nowrap">
						<thead>
							<tr>
								<th>Cases</th>
								<th>Contact No.</th>
								<th>Action</th>
								<th>Print</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Cases</th>
								<th>Contact No.</th>
								<th>Action</th>
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
											<td>
												<?php echo utf8_encode($sql_data['lpn_usp_brgy_blg']); ?>, <?php echo $sql_data['lpn_respondents']; ?> 
											</td>
											<td><?php echo $sql_data['lpn_contactno']; ?></td>
											<td>
												<a href="index.php?view=lupon_view&id=<?php echo $sql_data['uid']; ?>" class="btn btn-warning waves-effect waves-light"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a href="index.php?view=lupon_modify&id=<?php echo $sql_data['uid']; ?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="lupon_process.php?action=delete&id=<?php echo $sql_data['uid']; ?>" class="btn btn-danger waves-effect waves-light" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
											</td>
											<td>
												<a href="<?php echo WEB_ROOT; ?>case/lupon_certificate.php?id=<?php echo $sql_data['uid']; ?>"><i class="fa fa-print fa-fw"></i></a>
											</td>
										</tr>
							<?php
									} // End While
								}else{}
							?>
							
						</tbody>
					</table>
					
				</div>
				<a href="<?php echo WEB_ROOT; ?>case/lupon_report.php">PRINT</a>
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