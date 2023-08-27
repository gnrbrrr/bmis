<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_medical_record WHERE uid = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$resid = $sql_data['res_id'];
	
	$reqdate = date("M d, Y", strtotime($sql_data['med_datereq']));
	
	$res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$resid' AND is_deleted != '1'");
	$res->execute();
	if($res->rowCount() > 0)
	{
		$res_data = $res->fetch();
		$fullname = $res_data['lastname'] . ', ' . $res_data['firstname'] . ' ' . $res_data['middlename'];
	}else{ $fullname = '-- --'; }
										
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
		<div class="col-md-8">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Medicine Records</h3>
				<p class="text-muted m-b-30 font-13"> View Medicine Request </p>
					
					<div class="m-l-40"><b class="text-info">Resident Name : </b>
						<p style="padding-left:27px; color:black;"><?php echo $fullname; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Medicine Requested : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['med_req']; ?></p>
                    </div>
									
					<div class="m-l-40"><b class="text-info">Quantity : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['med_qty']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Date Requested : </b>
						<p style="padding-left:27px; color:black;"><?php echo $reqdate; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Remarks : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['remarks']; ?></p>
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