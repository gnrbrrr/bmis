<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_medical_record WHERE uid = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();
	
	$resid = $sql_data['res_id'];
	
	$res7 = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$resid' AND is_deleted != '1'");
	$res7->execute();
	if($res7->rowCount() > 0)
	{
		$res_data7 = $res7->fetch();		
		$fullname = $res_data7['lastname'] . ', ' . $res_data7['firstname'] . ' ' . $res_data7['middlename'];
	}else{ $fullname = '-- --'; }

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0">Medical Record</h3>
				<p class="text-muted m-b-30 font-13"> Modify Medical Record </p>
					<?php
						if($errorMessage == 'Modified successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
						else if($errorMessage == 'Category already exist! Data entry failed.')
						{
					?>							
							<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php								
						}else{}
					?>
											
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Resident Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								
								<select name="res_name" class="select2" style="width:270px;">
									<option value="<?php echo $resid; ?>"><?php echo $fullname; ?></option>
									<?php
										$res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id != '$resid' AND is_deleted != '1' ORDER BY lastname");
										$res->execute();
										if($res->rowCount() > 0)
										{
											while($res_data = $res->fetch())
											{
									?>														
												<option value="<?php echo $res_data['r_id']; ?>"><?php echo $res_data['firstname']; ?> <?php echo $res_data['middlename']; ?> <?php echo $res_data['lastname']; ?></option>
									<?php
											} // End While
										}else{}
									?>
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Medicine Requested</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Medicine Requested" name="med_rqst" autocomplete=off value="<?php echo $sql_data['med_req']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Quantity</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Quantity" name="med_qty" autocomplete=off value="<?php echo $sql_data['med_qty']; ?>" required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date of Requested</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Requested" name="datep" autocomplete=off value="<?php echo $sql_data['med_datereq']; ?>" /> </div>
						</div>
					</div>
					
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Save</button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
							<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">							
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>
<?php
}else{
	echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
}
?>