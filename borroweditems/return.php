<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_borrowed WHERE br_id = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();

?>

	<div class="row">
		<form class="form-horizontal" method="post" action="process.php?action=return" enctype="multipart/form-data" name="form" id="form">
			<div class="col-md-6">
				<div class="white-box">
					<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Borrowed Items Tracker</h3>
					<p class="text-muted m-b-30 font-13"> Return Item </p>
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
							<label for="exampleInputuname" class="col-sm-3 control-label">Return by</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" placeholder="Return by" value="<?php echo $sql_data['br_returnby']; ?>" name="return_by" autocomplete=off  ?> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Returned</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="exampleInputuname" placeholder="Date Returned" name="date_returned" autocomplete=off ?></div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Time Returned</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="time" class="form-control" id="exampleInputuname" placeholder="Time Returned" name="time_returned" autocomplete=off ?></div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Received by</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" placeholder="Received by" name="received_by" autocomplete=off ?></div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname" class="col-sm-3 control-label">Remarks</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="exampleInputuname" placeholder="Remarks" name="remarks" autocomplete=off ?></div>
							</div>
						</div>
						
						<div class="form-group m-b-0">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
								<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
								<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
							</div>
						</div>
					
				</div>
			</div>
		</form>
	</div>
	<style>
		.control-label{
			color:black;
		}
	</style>
<?php
}else{
	echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
}
?>