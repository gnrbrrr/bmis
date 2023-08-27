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
	$count = $conn->prepare("SELECT * FROM tbl_blotter WHERE is_deleted != '1'");
	$count->execute();

	$ongoing = 0;
	$settled = 0;
	$unsettled = 0;

	while($count_data = $count->fetch()){

		$status = $count_data['status'];

		if($status != ""){

		}else{
			$status = "Ongoing";
		}

		if($status == "Ongoing"){
			$ongoing++;
		}else if($status == "Settled"){
			$settled++;
		}else if($status == "Unsettled"){
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
						<td id="ongoing" style="text-align:center; width:100px; height:60px;">ONGOING:<br /><b><?php echo $ongoing; ?></b></td>
						<td style="width:20px;"><br /></td>
						<td id="settled" style="text-align:center; width:100px;">SETTLED:<br /><b><?php echo $settled; ?></b></td>
						<td style="width:20px;"><br /></td>
						<td id="unsettled" style="text-align:center; width:100px;">UNSETTLED:<br /><b><?php echo $unsettled; ?></b></td>
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
								<th>Case Status</th>
								<th>Blotter No.</th>
								<th>Complainant</th>
								<th>Victim</th>
								<th>Nature of Case</th>
								<th>Date of Occurence</th>
								<th>Place of Occurence</th>
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
							</tr>
						</tfoot>
						<tbody>
							
							<?php
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{
										$status = $sql_data['status'];

										if($status != ""){
											//no changes
										}else{
											$status = "Ongoing";
										}
										$datofocc = date("M d, Y", strtotime($sql_data['dateofoccurence']));
							?>
										<tr>
											<td><?php echo $status; ?></td>
											<td><?php echo $sql_data['blotter_no']; ?></td>
											<td><?php echo utf8_encode($sql_data['complainant']); ?></td>
											<td><?php echo $sql_data['victim']; ?></td>
											<td><?php echo $sql_data['natureofcase']; ?></td>
											<td><?php echo $datofocc; ?></td>
											<td><?php echo $sql_data['placeofoccurence']; ?></td>
											<td>
												<a href="index.php?view=detail&id=<?php echo $sql_data['uid']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a href="index.php?view=modify&id=<?php echo $sql_data['uid']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="process.php?action=delete&id=<?php echo $sql_data['uid']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
											</td>
											<td>
												<a href="<?php echo WEB_ROOT; ?>blotter/certificate.php?id=<?php echo $sql_data['uid']; ?>"><i class="fa fa-print fa-fw"></i></a>
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