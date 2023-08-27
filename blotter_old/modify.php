<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_blotter WHERE uid = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();

	$time_occurence = $sql_data['timeofoccurence'];
	$time_occurence_formatted = date("H:i", strtotime($time_occurence));

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
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Blotter Records</h3>
				<p class="text-muted m-b-30 font-13"> Modify Blotter Records </p>
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
						<label for="exampleInputuname" class="col-sm-3 control-label">Blotter No.</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Blotter No." name="blotterno" autocomplete=off value="<?php echo $sql_data['blotter_no']; ?>" required /> </div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Complainant Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Complainant" name="complainant" autocomplete=off value="<?php echo $sql_data['complainant']; ?>" required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Victim Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Victim" name="victim" autocomplete=off value="<?php echo $sql_data['victim']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Suspect First Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="First Name" name="fsuspect" autocomplete=off value="<?php echo $sql_data['suspect_firstname']; ?>" required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Suspect Last Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Last Name" name="lsuspect" autocomplete=off value="<?php echo $sql_data['suspect_lastname']; ?>" required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Suspect Middle Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Middle Name" name="msuspect" autocomplete=off value="<?php echo $sql_data['suspect_middlename']; ?>" required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Witness 1</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Witness 1" name="witness1" autocomplete=off value="<?php echo $sql_data['witness1']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Witness 2</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Witness 2" name="witness2" autocomplete=off value="<?php echo $sql_data['witness2']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Nature of case / Incident</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>								
								<select name="incident" class="oth">
									<option value="<?php echo $sql_data['natureofcase']; ?>"><?php echo $sql_data['natureofcase']; ?></option>
									<option value="">-- --</option>
									<option value="Theft">Theft</option>
									<option value="Unjust Vexation">Unjust Vexation</option>
									<option value="Malicious Mischief">Malicious Mischief</option>
									<option value="Vehicular Incident">Vehicular Incident</option>
									<option value="Incident Report">Incident Report</option>
									<option value="Other">Other Please Specify</option>
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="otherf" style="display:none;">
						<label for="exampleInputuname" class="col-sm-3 control-label">Other Nature of Case</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Please Specify" name="otherf" autocomplete=off /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time of Occurence</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-clock"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="Time of Occurence" name="timeofoccurence" autocomplete=off value="<?php echo $time_occurence_formatted; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date of Occurence</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Occurence" name="dateofoccurence" autocomplete=off value="<?php echo $sql_data['dateofoccurence']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Place of Occurence</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-location-pin"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Place of Occurence" name="placeofoccurence" autocomplete=off value="<?php echo $sql_data['placeofoccurence']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Narrative</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Narrative" name="narrative" autocomplete=off ><?php echo $sql_data['narrative']; ?></textarea> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Articles Involved</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Articles Involved" name="articles" autocomplete=off value="<?php echo $sql_data['articles']; ?>" /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Disposition</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Disposition" name="disposition" autocomplete=off value="<?php echo $sql_data['disposition']; ?>" />  </div>
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