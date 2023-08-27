<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_covid_cases WHERE uid = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();
	
?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-8">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Covid Cases</h3>
				<p class="text-muted m-b-30 font-13"> Modify Covid Cases Record </p>
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
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Name" name="cname" autocomplete=off required value="<?php echo $sql_data['cc_name']; ?>"/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Age</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="number" class="form-control" id="exampleInputuname" placeholder="Age" name="cage" autocomplete=off required value="<?php echo $sql_data['cc_age']; ?>"/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Gender</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Gender" name="cgender" autocomplete=off required value="<?php echo $sql_data['cc_gender']; ?>"/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type=text class="form-control" id="exampleInputuname" placeholder="Address" name="caddress" autocomplete=off required value="<?php echo $sql_data['cc_address']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Occupation" name="coccupation" autocomplete=off required value="<?php echo $sql_data['cc_occupation']; ?>"/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Onset of Illness</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Onset of Illness" name="onset" autocomplete=off required value="<?php echo $sql_data['cc_onset']; ?>"/> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">History of Exposure</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea class="form-control" id="exampleInputuname" placeholder="History of Exposure" style="resize:vertical; min-height:60px; max-height:200px;" name="history" autocomplete=off required ><?php echo $sql_data['cc_history']; ?></textarea></div>
						</div>
					</div>					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">DRU</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>								
								<select name="dru" class="oth">																		
									<option value="<?php echo $sql_data['cc_dru']; ?>"><?php echo $sql_data['cc_dru']; ?></option>
									<option value="">-- --</option>
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
									<option value="<?php echo $sql_data['cc_status']; ?>"><?php echo $sql_data['cc_status']; ?></option>
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
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Vaccination Status" name="vstatus" autocomplete=off required value="<?php echo $sql_data['cc_vaccination']; ?>"/> </div>
						</div>
					</div>

					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><i class="fa fa-save fa-fw"></i> Save</button>
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
	<script type="text/javascript">

		$(".oth").click(function(){


				var value_checked = $(this).val();
				
				if(value_checked == "Other"){
					$("#otherf").show();
				}
				else{
					$("#otherf").hide();
					$("#otherf").val("");
				}

		});
		
	</script>
<?php
}else{
	echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
}
?>