<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_facility WHERE f_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$date_req = date("M d, Y", strtotime($sql_data['req_date']));

	if ($sql_data['photo']) {
		$image = WEB_ROOT . 'images/facility/' . $sql_data['photo'];
	}else{

	}
	
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
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Facilities Management Record</h3>
				<p class="text-muted m-b-30 font-13"> View Facility</p>
					
					<div class="m-l-40"><b class="text-info">Working No. : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['work_num']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Status : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['status']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Issue Title : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['issue_title']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Requested By : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['req_by']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Requested Date : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['req_date']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Facility : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['facility']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Photo : </b>
						<br /><a href="<?php echo $image; ?>" class="nyroModal" ><img src="<?php echo $image; ?>" alt="" style="border: 3px solid black; width:300px; height:225px;"/></a>
                    </div><br />

					<div class="m-l-40"><b class="text-info">Product(s) / Material(s) : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['product']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Urgency : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['urgency']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Location : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['location']; ?></p>
                    </div>
										
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['f_id']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>