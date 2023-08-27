<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_business WHERE uid = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
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
				<h3 class="box-title m-b-0">Business Record</h3>
				<p class="text-muted m-b-30 font-13">View Business</p>
				
					<div class="m-l-40"><b class="text-info">Business Name : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['businessname']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Type of Business : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['typeofbusiness']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Nature of Business : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['natureofbusiness']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Owner's Name : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['ownername']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Location : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['location']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Contact Person : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['contactperson']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Contact Number : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['contactnumber']; ?></p>
                    </div>
					
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['uid']; ?>">Edit</a>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>