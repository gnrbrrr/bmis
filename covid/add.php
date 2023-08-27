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
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Covid 19 Monitoring</h3>
				<p class="text-muted m-b-30 font-13"> Add Covid Case Record</p>
					<?php
						if($errorMessage == 'Added successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
						else if($errorMessage == 'Data already exist! Data entry failed.')
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
					<label for="exampleInputuname" class="col-sm-3 control-label">Name</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Name" name="cname" autocomplete=off required /> </div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Age" name="cage" autocomplete=off required /> </div>
					</div>
				</div>
				<div class="form-group">
				<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
				<div class="col-sm-9">
					<div class="input-group">								
						<select name="cgender" class="select2" style="width:100px;">
							<option value="Male">Male</option>
							<option value="Female">Female</option>									
						</select>
					</div>
				</div>
			</div>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Address</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<textarea class="form-control" id="exampleInputuname" placeholder="Address" style="resize:vertical; min-height:60px; max-height:100px;" name="caddress" autocomplete=off required ></textarea> </div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Occupation" name="coccupation" autocomplete=off required /> </div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Onset of Illness</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="date" class="form-control" id="exampleInputuname" placeholder="Onset of Illness" name="onset" autocomplete=off required /> </div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">History of Exposure</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<textarea class="form-control" id="exampleInputuname" placeholder="History of Exposure" style="resize:vertical; min-height:60px; max-height:200px;" name="history" autocomplete=off required ></textarea> </div>
					</div>
				</div>					
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">DRU</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>								
							<select name="dru" class="oth">																		
								<option value="Home">Home</option>
								<option value="Hospital">Hospital</option>
								<option value="Brgy. Facility/Vargas">Brgy. Facility/Vargas</option>
								<option value="Hotel">Hotel</option>
								<option value="Hope">Hope</option>
								<option value="Other">Other Facility</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="form-group" id="otherf" style="display:none;">
					<label for="exampleInputuname" class="col-sm-3 control-label">Other Facility</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Other Facility" name="otherf" autocomplete=off /> </div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Status</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>								
							<select name="status">																		
								<option value="Recovering">Recovering</option>
								<option value="Recovered">Recovered</option>
								<option value="Died">Died</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Vaccination Status</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Vaccination Status" name="vstatus" autocomplete=off required /> </div>
					</div>
				</div>
			
				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
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
	
<script type="text/javascript">

$(".oth").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "Other"){
			$("#otherf").show();
		}
		else{
			$("#otherf").hide();
		}

});
	
</script>