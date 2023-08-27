<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_project WHERE uid = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$expectedDate= date("M d, Y", strtotime($sql_data['p_date']));
	
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
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Project</h3>
				<p class="text-muted m-b-30 font-13"> View Project </p>
					
					<div class="m-l-40"><b class="text-info">Project Title : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_title']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Proponent/Project Leader : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_leader']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Rationale/Overview of the Activity : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_rationale']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Objectives : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_objectives']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Project Location : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_location']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Source of Funds : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_source']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Project Cost : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_cost']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Target Completion Date : </b>
					<p style="padding-left:27px; color:black;"><?php echo $expectedDate; ?></p>
                    </div>

					<br /><br />

					<h6>Contractor</h6>
					<div class="m-l-40"><b class="text-info">Company Name : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_compname']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Contact Person : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_contactp']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Position : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_position']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Contact No.: </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_contactno']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Company Address : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_caddress']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Status : </b>
					<p style="padding-left:27px; color:black;"><?php echo $sql_data['p_status']; ?></p>
                    </div>
										
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['uid']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>