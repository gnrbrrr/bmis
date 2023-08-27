<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_ordinance WHERE is_deleted != '1'");
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

.select2 {
	border-bottom:solid 2px #666600;
	border-top:solid 0px #666600;
	border-left:solid 0px #666600;
	border-right:solid 0px #666600;
	width:227px;
	background:transparent;
}
</style>
</head>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Ordinance</h3>
				<p class="text-muted m-b-30">Display list of Ordinance</p></p>
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
								<th>Item No.</th>
								<th>Print</th>
								<th>Ordinance No.</th>
								<th class="title-column">Title</th>
								<th>Date Approved</th>
								<th>Comittee/Other</th>
								<th>Remarks</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th class="title-column"></th>
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
										$dateapp = date("M d, Y", strtotime($sql_data['ord_date']));
							?>
										<tr>
											<td><?php echo utf8_encode($sql_data['ord_itemno']); ?></td>
											<td style="text-align:center;"><a href="<?php echo WEB_ROOT; ?>ordinance/ordinance_form.php?id=<?php echo $sql_data['ord_id']; ?>"><i class="fa fa-print fa-fw"></i></a></td>
											<td><?php echo $sql_data['ord_no']; ?> </td>
											<td><div class="title-column"><?php echo $sql_data['ord_title']; ?></div></td>
											<td><?php echo $dateapp; ?></td>
											<td><?php echo $sql_data['ord_committee']; ?></td>
											<td><?php echo $sql_data['ord_remarks']; ?></td>
											<td>
												<a href="index.php?view=detail&id=<?php echo $sql_data['ord_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a href="index.php?view=modify&id=<?php echo $sql_data['ord_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="process.php?action=delete&id=<?php echo $sql_data['ord_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
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
	<style>
		.title-column {
			min-width: 350px;
			max-width: 350px;
			/* overflow: scroll; */
			word-wrap: break-word;
  			white-space: pre-wrap;
		}
	</style>