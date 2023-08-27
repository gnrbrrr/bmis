<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_vehicle WHERE vh_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$date_res = date("M d, Y", strtotime($sql_data['date_reserved']));
	$date_act = date("M d, Y", strtotime($sql_data['activity']));
	$date_dis = date("M d, Y", strtotime($sql_data['date_dispatched']));
	if($sql_data['date_returned']){
		$date_return = date("M d, Y", strtotime($sql_data['date_returned']));
	}else {
		$date_return = "-- --";
	}

	if($sql_data['remarks']){
		$remarks = $sql_data['remarks'];
	}else{
		$remarks = "-- --";
	}
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php?view=detail_trip&id=<?php echo $sql_data['tr_id']; ?>'">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Vehicle</h3>
				<p class="text-muted m-b-30 font-13"> View Vehicle Record </p>
				
				<div class="m-l-40"><b class="text-info">Driver's Name : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['driver']; ?></p>
				</div>
			
				<div class="m-l-40"><b class="text-info">Vehicle : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['vehicle']; ?></p>
				</div>
				
				<div class="m-l-40"><b class="text-info">Plate No. : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['plateno']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Date Reserved : </b>
					<p style="padding-left:27px;"><?php echo $date_res; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Time Reserved : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['time_reserved']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Activity : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['activity']; ?></p>
				</div>
				
				<div class="m-l-40"><b class="text-info">Destination : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['destination']; ?></p>
				</div>
			
				<div class="m-l-40"><b class="text-info">Date Dispatched : </b>
					<p style="padding-left:27px;"><?php echo $date_dis; ?></p>
				</div>
			
				<div class="m-l-40"><b class="text-info">Time Dispatched : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['time_dispatched']; ?></p>
				</div>
				
				<div class="m-l-40"><b class="text-info">Date Returned : </b>
					<p style="padding-left:27px;"><?php echo $date_return; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">ODO Meter Beginning : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['odo_beginning']; ?></p>
				</div>
				
				<div class="m-l-40"><b class="text-info">ODO Meter Ending : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['odo_ending']; ?></p>
				</div>
			
				<div class="m-l-40"><b class="text-info">Remarks : </b>
					<p style="padding-left:27px;"><?php echo $remarks; ?></p>
				</div>
									
				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['vh_id']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>
						<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php?view=detail_trip&id=<?php echo $sql_data['tr_id']; ?>';">Back</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
	
	<style>
		p{
			color:black;
		}
	</style>
	<script>
		$(document).ready(function() {
			$('input[type="search"]').css({
				'border': '2px solid black'
			});
		});
	</script>