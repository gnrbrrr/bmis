<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM bs_user WHERE uid = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();

?>
<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
	<div class="row">	
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Client</h3>
				<p class="text-muted m-b-30 font-13"> Modify Client </p>
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
						<label for="exampleInputuname" class="col-sm-3 control-label">Image Upload</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-picture"></i></div>
								<input class="input-file uniform_on" name="fileImage" id="fileInput" type="file" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">First Name*</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="First Name" name="fname" autocomplete=off required value="<?php echo $sql_data['firstname']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Last Name*</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Last Name" name="lname" autocomplete=off required value="<?php echo $sql_data['lastname']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="Email" class="form-control" id="exampleInputuname" placeholder="Email" name="email" autocomplete=off required value="<?php echo $sql_data['email']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Username</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Username" name="username" autocomplete=off required value="<?php echo $sql_data['username']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="passsword" class="form-control" id="exampleInputuname" placeholder="Password" name="password" autocomplete=off required value="<?php echo $sql_data['pass_text']; ?>" /> </div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Contact Number</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Contact Number" name="contactno" autocomplete=off required value="<?php echo $sql_data['contactno']; ?>" /> </div>
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
		
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Photo</h3>
				<?php
					if ($sql_data['image']) {
						$image = WEB_ROOT . 'images/user/' . $sql_data['image'];
					} else {
						$image = WEB_ROOT . 'images/user/noimagelarge.png';
					}
				?>
				<img src="<?php echo $image; ?>" style="width: 100%; height: 100%;"/>
			</div>
		</div>
	</div>
	
	<?php if($user_data['access_level'] == 1){ ?>
	<div class="row">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">User Access</h3>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Resident Records : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="res" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_resident_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Business Records : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="bus" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_business_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Document Request : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="doc" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_document_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Payment : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="pay" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_payment_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Cases : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="cas" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_cases_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">VAWC : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="vaw" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_vawc_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">BCPC : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="bcp" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_bcpc_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
			
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Blotter : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="blo" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_blotter_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Lupon : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="lup" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_lupon_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">BADAC : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="bad" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_badac_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
			</div>	
		</div>	
		
		<div class="col-md-6">
			<div class="white-box">
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Minutes of the Meeting : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="min" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_minutes_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Legislative : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="leg" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_legislative_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">BRGY Resolution : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="reso" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_resolution_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">BRGY Ordinance : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="ordi" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_ordinance_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Executive Order : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="exec" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_executive_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Inventory : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="inv" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_inventory_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">BDRRM/Borrowed Items : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="bor" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_borrow_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Medicine : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="medi" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_medicine_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Medical Records : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="med" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_medical_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Covid 19 Monitoring : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="cov" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_covid_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Rescue Unit : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="rescue" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_rescue_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
				
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Vehicle Logs : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="veh" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_vehicle_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Facilities Management : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="fac" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_facility_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Development Project : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="pro" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($sql_data['is_project_access'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
					
					
					
			</div>
		</div>
	<?php }else{} ?>
	</div>
</form>
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