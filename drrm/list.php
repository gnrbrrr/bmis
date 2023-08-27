<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_inventory_drrm WHERE is_deleted != '1'");
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
				<h3 class="box-title m-b-0">BDRRM Inventory</h3>
				<p class="text-muted m-b-30">Display list of BDRRM Inventory Records</p></p>
					
					<a href="<?php echo WEB_ROOT; ?>drrm/index.php?view=add" class="btn btn-success pull-right m-t-10 font10">Add New</a>
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
								<th>Item</th>
								<th>Serial No.</th>
								<th>Amount</th>
								<th>Date</th>
								<th>Qty</th>
								<th>Condition</th>
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
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{
										$datofocc = date("M d, Y", strtotime($sql_data['in_dop']));
							?>
										<tr>
											<td><?php echo utf8_encode($sql_data['in_itemdesc']); ?></td>
											<td><?php echo $sql_data['in_serialno']; ?> </td>
											<td>&#8369;<?php echo number_format($sql_data['in_amt'], 2); ?></td>
											<td><?php echo $datofocc; ?></td>
											<td><?php echo $sql_data['in_qty']; ?></td>
											<td><?php echo $sql_data['in_condition']; ?></td>
											<td>
												<a href="../drrm/index.php?view=detail&id=<?php echo $sql_data['uid']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a href="../drrm/index.php?view=modify&id=<?php echo $sql_data['uid']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="../drrm/process.php?action=delete&id=<?php echo $sql_data['uid']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
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