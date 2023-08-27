<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
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
		<div class="col-md-8">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Medicine Records</h3>
				<p class="text-muted m-b-30 font-13"> Add Medicine Request </p>
					<?php
						if($errorMessage == 'Added Successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
						else if($errorMessage == 'Client already exist! Data entry failed.')
						{
					?>							
							<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}else if($errorMessage == 'Borrowed Item Exceeds The Item Quantity!')
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
									<?php
										$res = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' ORDER BY lastname");
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
								<select name="med_rqst" id="med_requested" class="select2" style="width:150px;" onchange="check_qty()">
									<option value="none">Select a Medicine</option>
									<?php
										$medr = $conn->prepare("SELECT * FROM tbl_med_inventory WHERE is_deleted != '1' AND on_hand != 0 ORDER BY medicine");
										$medr->execute();
										if($medr->rowCount() > 0){
											while($medr_data = $medr->fetch()){
									?>
												<option value="<?php echo $medr_data['medicine']; ?>"><?php echo $medr_data['medicine']; ?></option>
									<?php
											}
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="available" class="col-sm-3 control-label">Available Quantity</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="number" class="form-control" id="available" placeholder="" name="" autocomplete=off readonly /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Quantity to Consume</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="number" class="form-control" id="exampleInputuname" placeholder="Quantity to Consume" name="med_qty" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date Requested</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date Requested" name="datep" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Remarks</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Remarks" name="remarks" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit</button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
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
	<script>
		function check_qty(){
			var med_list_val = document.getElementById("med_requested").value;

			console.log(med_list_val);

			$.ajax({
				url: "quantity_checker.php",
				method: "POST",
				data: { med_requested : med_list_val },
				success: function(data){
					if(data){
						console.log(data);
						document.getElementById("available").value = parseInt(data);
					}else{

					}
				}
			});
		}
	</script>