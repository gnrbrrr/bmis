<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

if($_SESSION['user_id'] == 1046){
	$sql = $conn->prepare("SELECT * FROM bs_user WHERE is_deleted != '1' AND user_id != '1046'");
	$sql->execute();
}else if ($_SESSION['user_id'] == 1002){
	$sql = $conn->prepare("SELECT * FROM bs_user WHERE is_deleted != '1' AND user_id != '1002' AND user_id != '1046'");
	$sql->execute();
}



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
<br />
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">User Record</h3>
				<p class="text-muted m-b-30">Display list of User Records</p>
					<!-- <form method="post" action="index.php?view=add">
						&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10"><br /><br /><br /><br />
					<form>	 -->
					<?php
						if($errorMessage == 'User Logged Out Successfully!')
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
								<th>Name of User</th>
								<th>Login Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
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
										if($sql_data['logged_in'] == 1){
											$log_stats = "Logged In";
											$display = "style='display:block;'";
										}else{
											$log_stats = "Logged Out";
											$display = "style='display:none;'";
										}
										
							?>
							
										<tr>
											<td><?php echo $sql_data['firstname']; ?><?php echo $sql_data['lastname']; ?></td>
											<td><?php echo $log_stats; ?></td>
											<td>
												<a <?php echo $display; ?> href="process.php?action=logout&id=<?php echo $sql_data['user_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs"><i class="fa-sharp fa-solid fa-power-off"></i> <span>Logout</span></a>
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