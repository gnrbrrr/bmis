<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_minutes WHERE m_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$date_held = date("M d, Y", strtotime($sql_data['date_held']));
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Minutes of the Meeting</h3>
				<p class="text-muted m-b-30 font-13"> View Record </p>
					
					<div class="m-l-40"><b class="text-info">Date Held : </b>
						<p style="padding-left:27px; color:black;"><?php echo $date_held; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Meeting Duration : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['meeting_time1']; ?> TO <?php echo $sql_data['meeting_time2']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Meeting's Agenda : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['meeting_agenda']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Meeting's Venue : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['meeting_venue']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Meeting's Attendee(s) : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['meeting_attendees']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Meeting's Discussion : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['meeting_discussion']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Meeting's Remarks : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['meeting_remarks']; ?></p>
                    </div>
										
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['m_id']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>