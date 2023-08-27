<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_blotter WHERE is_deleted != '1'");
$sql->execute();


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
<head>
<style rel="stylesheet">
	.settled-box{
		display: flex;
		align-items: center;
		justify-content: center;
		color: black;
		text-align: center;
		height: 40px;
		width: 120px;
		background: radial-gradient(circle at right top, white, #37d000);
		border: 2px solid black;
		border-radius: 5px;
	}

	.ongoing-box{
		display: flex;
		align-items: center;
		justify-content: center;
		color: black;
		text-align: center;
		height: 40px;
		width: 120px;
		background: radial-gradient(circle at right top, white, #d5d100);
		border: 2px solid black;
		border-radius: 5px;
	}

	.unsettled-box{
		display: flex;
		align-items: center;
		justify-content: center;
		color: black;
		text-align: center;
		height: 40px;
		width: 120px;
		background: radial-gradient(circle at right top, white, #d50000);
		border: 2px solid black;
		border-radius: 5px;
	}
	
	.counter{
		position:relative;
		top: 0;
		right: 0;
	}
	.counter td{
		color:black !important;
	}

	.counter #ongoing{
		background-color:#ffb136 !important;
		border-radius:5px;
	}
	.counter #settled{
		background-color:#00bbd9 !important;
		border-radius:5px;
	}
	.counter #unsettled{
		background-color:#e74a25 !important;
		border-radius:5px;
	}

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
<?php
	$cou = $conn->prepare("SELECT * FROM tbl_blotter WHERE is_deleted != '1'");
	$cou->execute();


	$settled = 0;
	$ongoing = 0;
	$unsettled = 0;

	while($cou_data = $cou->fetch()){

		
		if($cou_data['status'] == "Settled"){
			$settled++;
		}else if($cou_data['status'] == "On-going"){
			$ongoing++;
		}else if($cou_data['status'] == "Unsettled"){
			$unsettled++;
		}else{

		}
	}
?>
<br />
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<table class="counter">
					<tr>
						<td><div class="settled-box">Settled : <br /><?php echo $settled; ?></div></td>
						<td>&nbsp;&nbsp;</td>
						<td><div class="ongoing-box">On-going : <br /><?php echo $ongoing; ?></div></td>
						<td>&nbsp;&nbsp;</td>
						<td><div class="unsettled-box">Unsettled : <br /><?php echo $unsettled; ?></div></td>
					</tr>
				</table>
				<h3 class="box-title m-b-0">Blotter Record</h3>
				<p class="text-muted m-b-30">Display list of Blotter Records</p>
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
								<th>Status</th>
								<th>Blotter No</th>
								<th>Time created</th>
								<th>Date created</th>
								<th>Complainant</th>
								<th>Respondent</th>
								<th>Nature of Case </th>
								<th>Created By</th>
								<th>Action</th>
								<th>Print</th>
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
								<th></th>
								<th></th>
							</tr>
						</tfoot>
						<tbody style="text-align:center;">
							
							<?php
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{
										
										$date_created = date("M d, Y", strtotime($sql_data['date_created']));
										
							?>
							
										<tr>
											<td><?php echo $sql_data['status'];?></td>
											<td><?php echo $sql_data['blotter_no'];?></td>
											<td><?php echo $sql_data['time_created']; ?></td>
											<td><?php echo utf8_encode($date_created); ?></td>
											<td><?php echo $sql_data['complainant']; ?></td>
											<td><?php echo $sql_data['respondent_firstname']; ?>,<?php echo $sql_data['respondent_lastname']?></td>
											<td><?php echo $sql_data['natureofcase']; ?></td>
											<td><?php echo $sql_data['created_by']; ?></td>
											<td>
												<a href="index.php?view=detail&id=<?php echo $sql_data['bl_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a href="index.php?view=modify&id=<?php echo $sql_data['bl_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="process.php?action=delete&id=<?php echo $sql_data['bl_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
											</td>
											<td>
												<a href="<?php echo WEB_ROOT; ?>blotter/certificate.php?id=<?php echo $sql_data['bl_id']; ?>"><i class="fa fa-print fa-fw"></i></a>
											</td>
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