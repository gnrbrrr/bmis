<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_rescue WHERE is_deleted != '1'");
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
	<div class="row"><!--Row Start-->
		<div class="col-sm-12"><!--Col Sm Start-->
			<div class="white-box" style="width:100%;"><!--White Box Start-->
				<h3 class="box-title m-b-0">Rescue Unit</h3>
				<p class="text-muted m-b-30">Display list of Rescue Unit Records</p></p>
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
				<table id="example23" class="display nowrap" style="overflow-x:scroll;text-align:center;">
					<thead>
						<tr>
							<th>Patient</th>
							<th>Gender</th>
							<th>Incident Case</th>
							<th>Contact</th>
							<th>Date Of Incident</th>										
							<th>Action</th>
							<th>Rescue Unit Form</th>
							<th>Emergency Care and Transportation Form</th>
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
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						
						<?php
							$sql = $conn->prepare("SELECT * FROM tbl_rescue WHERE is_deleted != '1' ORDER BY ph_date_incident");
							$sql->execute();
							if($sql->rowCount() > 0)
							{
								while($sql_data = $sql->fetch())
								{
									$datev = date("M d, Y", strtotime($sql_data['ph_date_incident']));
						?>
									<tr>
										<td><?php echo $sql_data['ph_name']; ?></td>
										<td><?php echo $sql_data['ph_gender']; ?></td>
										<td><?php echo $sql_data['ph_case_type']; ?></td>
										<td><?php echo $sql_data['ph_contact']; ?></td>
										<td><?php echo $datev; ?></td>													
										<td>
											<a href="index.php?view=detail&id=<?php echo $sql_data['res_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
											&nbsp;
											<a href="index.php?view=modify&id=<?php echo $sql_data['res_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
											&nbsp;
											<a href="process.php?action=delete&id=<?php echo $sql_data['res_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
										</td>
										<td>
											<a href="<?php echo WEB_ROOT; ?>rescue/rescue_form.php?id=<?php echo $sql_data['res_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
										</td>
										<td>
											<a href="<?php echo WEB_ROOT; ?>rescue/emergency_care_form.php?id=<?php echo $sql_data['res_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
										</td>
									</tr>
						<?php
								} // End While
							}else{}
						?>
						
					</tbody>
				</table>
				</div>
			</div><!--White Box Start-->
		</div><!--Col Sm Start-->
	</div><!--Row Start-->
	<script>
		$(document).ready(function() {
			$('input[type="search"]').css({
				'border': '2px solid black'
			});
		});
	</script>
