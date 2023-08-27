<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_project WHERE uid = '$id'");
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
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Project</h3>
				<p class="text-muted m-b-30 font-13"> Modify Project Records </p>
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
						<label for="exampleInputuname" class="col-sm-3 control-label">Project Title</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Project Title" name="ptitle" value="<?php echo $sql_data['p_title']; ?>" autocomplete=off required /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Proponent/Project Leader</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Proponent/Project Leader" name="pleader" value="<?php echo $sql_data['p_leader']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Rationale/Overview of the Activity</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea type="text" class="form-control" id="exampleInputuname" placeholder="Rationale/Overview of the Activity" name="rationale" style="width:485px; resize:vertical; min-height:75px; max-height:100px;" autocomplete=off ><?php echo $sql_data['p_rationale']; ?></textarea> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Objectives</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Objectives" name="objectives" value="<?php echo $sql_data['p_objectives']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Project Location</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Project Location" name="location" value="<?php echo $sql_data['p_location']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Source of Funds</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Source of Funds" name="funds" value="<?php echo $sql_data['p_source']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Project Cost</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Project Cost" name="cost" value="<?php echo $sql_data['p_cost']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Target Completion Date</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Target Completion Date" name="cdate" value="<?php echo $sql_data['p_date']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Contractor</label>
						<div class="col-sm-9">
							<div class="input-group">
								<?php if($sql_data['is_contractor'] == 1){?>
								<input type="radio" class="cr" name="cr" id="optionsRadios7" value="0" /> No
								&nbsp;
								<input type="radio" class="cr" name="cr" id="optionsRadios8" value="1" checked="" /> Yes
								<?php }else{?>
								<input type="radio" class="cr" name="cr" id="optionsRadios7" value="0" checked="" /> No
								&nbsp;
								<input type="radio" class="cr" name="cr" id="optionsRadios8" value="1" /> Yes
								<?php } ?>
							</div>
						</div>
					</div>

				&nbsp;<div class="form-group" id="con1" style="display:none;">
						<label for="exampleInputuname" class="col-sm-3 control-label">Company Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Company Name" name="cname" value="<?php echo $sql_data['p_compname']; ?>" autocomplete=off /> </div>
						</div>
					</div>

				&nbsp;<div class="form-group" id="con2" style="display:none;">
						<label for="exampleInputuname" class="col-sm-3 control-label">Contact Person</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Contact Person" name="cperson" value="<?php echo $sql_data['p_contactp']; ?>" autocomplete=off /> </div>
						</div>
					</div>
				
				&nbsp;<div class="form-group" id="con3" style="display:none;">
						<label for="exampleInputuname" class="col-sm-3 control-label">Position</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Position" name="position" value="<?php echo $sql_data['p_position']; ?>" autocomplete=off /> </div>
						</div>
					</div>

				&nbsp;<div class="form-group" id="con4" style="display:none;">
						<label for="exampleInputuname" class="col-sm-3 control-label">Contact No.</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Contact No" name="contactno" value="<?php echo $sql_data['p_contactno']; ?>" autocomplete=off /> </div>
						</div>
					</div>

				&nbsp;<div class="form-group" id="con5" style="display:none;">
						<label for="exampleInputuname" class="col-sm-3 control-label">Company Address</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Company Address" name="caddress" value="<?php echo $sql_data['p_caddress']; ?>" autocomplete=off /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Status</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="status" class="select2" style="width:270px;">
									<option value="<?php echo $sql_data['p_status']; ?>"><?php echo $sql_data['p_status']; ?></option>
									<option value="Ongoing">Ongoing</option>
									<option value="Completed">Completed</option>									
								</select>
							</div>
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
	<script>
		var contractor = "<?php echo $sql_data['is_contractor']; ?>";

		if(contractor == 1){
			$("#con1").show();
			$("#con2").show();
			$("#con3").show();
			$("#con4").show();
			$("#con5").show();
		}else{
			
		}

		$(".cr").click(function(){


			var value_checked = $(this).val();
			
			if(value_checked == "1"){
				$("#con1").show();
				$("#con2").show();
				$("#con3").show();
				$("#con4").show();
				$("#con5").show();
			}
			else{
				$("#con1").hide();
				$("#con2").hide();
				$("#con3").hide();
				$("#con4").hide();
				$("#con5").hide();
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