<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_vwac WHERE uid = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();
	
	if($sql_data['vwac_typeofcase'] == 1){
		$tc = 1;
		$tcase = "case 1";
	} else if($sql_data['vwac_typeofcase'] == 2){
		$tc = 2;
		$tcase = "case 2";
	}  else { 
		$tc = 0;
		$tcase = "--Select your Status--";
	}

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php'">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="vwac_process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">BCPC Record</h3>
				<p class="text-muted m-b-30 font-13"> View BCPC Record </p>
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
							
				
			<div class="modal-body">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Type of Case</h3>
				
				<input type="text" id="firstName" class="form-control" name="victim" value="<?php echo $sql_data['vwac_typeofcase']; ?>" readonly />
							
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                        <div class="form-body">
                                            <h3 class="box-title" style="color:#663399; font-weight:bold;">I. Personal Circumstances</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-5" style="width:270px;">
                                                    <div class="form-group">
                                                        <label class="control-label">A. Name of Complainant / Victim</label>
                                                        <input type="text" id="firstName" class="form-control" placeholder="First Name" name="victim_first_name" value="<?php echo $sql_data['vwac_victim_firstname'];?>" readonly><br/>
                                                        <input type="text" id="middleName" class="form-control" placeholder="Second Name" name="victim_second_name" value="<?php echo $sql_data['vwac_victim_middlename'];?>" readonly><br/>
                                                        <input type="text" id="lastName" class="form-control" placeholder="Last Name" name="victim_last_name" value="<?php echo $sql_data['vwac_victim_lastname'];?>" readonly><br/>
													</div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Age</label>
														<input type="text" id="lastName" class="form-control" placeholder="Age" name="age" value="<?php echo $sql_data['vwac_age'];?>" readonly><br/> 														
													</div>
                                                </div>
												<div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Address</label>
                                                        <textarea id="firstName" class="form-control" placeholder="Address" name="address" style="resize:vertical; width:350px; min-height:60px; max-height:100px;" autocomplete=off readonly><?php echo $sql_data['vwac_address']; ?></textarea><br/> 														
													</div>
                                                </div>
												
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">B. Civil Status</label>
                                                        <select class="form-control" name="civil_status" disabled>
															<option value="<?php echo $sql_data['vwac_civil_status']; ?>"><?php echo $sql_data['vwac_civil_status']; ?></option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
															<option value="Widowed">Widowed</option>
                                                        </select > 
													</div>
                                                </div>
												<div class="col-md-3">
                                                   <div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">C. Relationship to Perpetrator</label>
                                                        <input type="text" id="firstName" class="form-control" placeholder="Complainant" name="relationship_to_perpetrator" value="<?php echo $sql_data['vwac_relationship_to_perpetrator'];?>" readonly ><br/> 
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">D. Occupation / Proffesion</label>
                                                        <input type="text" id="firstName" class="form-control" placeholder="Complainant" name="cmplnt_proffesion" value="<?php echo $sql_data['vwac_cmplnt_proffesion'];?>" readonly><br/> 
													</div>
												</div>
											</div>

											<div class="row">
                                                <div class="col-md-5" style="width:270px;">
                                                    <div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">Name of Respondent</label>
                                                        <input type="text" id="firstName" class="form-control" placeholder="First Name" name="perp_first_name" value="<?php echo $sql_data['vwac_perpetrator_firstname']; ?>" readonly ><br/>
                                                        <input type="text" id="middleName" class="form-control" placeholder="Middle Name" name="perp_middle_name" value="<?php echo $sql_data['vwac_perpetrator_middlename']; ?>" readonly ><br/>
                                                        <input type="text" id="lastName" class="form-control" placeholder="Last Name" name="perp_last_name" value="<?php echo $sql_data['vwac_perpetrator_lastname']; ?>" readonly ><br/>
													</div>
                                                </div>
												<div class="col-md-2">
                                                   <div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">Contact No.</label>
                                                        <input type="text" id="firstName" class="form-control" placeholder="Respondent Contact No" name="perpetrator_contact" value="<?php echo $sql_data['vwac_perpetrator_contact']; ?>" readonly ><br/> 
													</div>
												</div>
												<div class="col-md-5">
													<div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">Address</label>
                                                        <textarea id="firstName" class="form-control" placeholder="Respondent Address" name="perpetrator_address" style="resize:vertical; width:350px; min-height:60px; max-height:100px;" readonly ><?php echo $sql_data['vwac_perpetrator_address']; ?></textarea><br/> 
													</div>
												</div>
											</div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                        <div class="form-body">
                                            <h3 class="box-title" style="color:#663399; font-weight:bold;">II. Incident Details</h3>
                                            <hr>     
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">A. Date of Violence Commited</label>
                                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="date_violence_commited" value="<?php echo $sql_data['vwac_date_violence_commited'];?>" readonly></br> 
														<label class="control-label" style="font-size: 12px;">Date Reported</label>
                                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="date_reported" value="<?php echo $sql_data['vwac_date_reported'];?>" readonly></br> 
                                                    </div>
                                                </div>
												<div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">B. Nature of Violence Inflicted by Perpetrator</label>
															<div class="input-group">
															<ul class="icheck-list">
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Physical</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Physical" name="physical" value="<?php echo $sql_data['vwac_physical'];?>" readonly> </div>
																		</div>
																	</li>
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Sexual</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Sexual" name="sexual" value="<?php echo $sql_data['vwac_sexual'];?>" readonly> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Psychological</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Psychological" name="psychological" value="<?php echo $sql_data['vwac_psychological'];?>" readonly> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Economic Abuse</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Economic Abuse" name="economic_abuse" value="<?php echo $sql_data['vwac_economic_abuse'];?>" readonly> </div>
																		</div>
																	</li> 
															</ul>
															</div>
                                                    </div>
                                                </div>
											</div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>	
					<div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                        <div class="form-body">
                                            <h3 class="box-title" style="color:#663399; font-weight:bold">III. Assistance Extended / Provided to Victims</h3>
                                            <hr>     
                                            <div class="row">                   
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" style="color:#663399; font-size: 15px;">(Specific Service Providers)</label>
															<div class="input-group">
															<ul class="icheck-list">
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Medical</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Medical" name="medical" style="width: 500px;" value="<?php echo $sql_data['vwac_medical'];?>" readonly> </div>
																		</div>
																	</li>
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Counseling</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Counseling" name="counseling" style="width: 500px;" value="<?php echo $sql_data['vwac_counseling'];?>" readonly> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Referral To</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Referral To" name="referral_to" style="width: 500px;" value="<?php echo $sql_data['vwac_referral_to'];?>" readonly> </div>
																		</div>
																	</li>
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Shelter</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Shelter" name="shelter" style="width: 500px;" value="<?php echo $sql_data['vwac_shelter'];?>" readonly> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Issued BPO Date</label>
																			<div class="col-sm-9">
																			<input type="date" class="form-control" id="inputEmail3" placeholder="Issued BPO Date" name="issued_bpo_date" style="width: 500px;" value="<?php echo $sql_data['vwac_issued_bpo_date'];?>" readonly> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Date Accomplished</label>
																			<div class="col-sm-6">
																			<input type="date" class="form-control" id="inputEmail3" name="date_accomplished" style="width: 500px;" value="<?php echo $sql_data['vwac_date_accomplished'];?>" readonly> </div>
																		</div>
																	</li> 
															</ul>
															</div>
                                                    </div>
                                                </div>
												
												<div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="color:#663399; font-size: 15px; margin-left: 45px;">(Provided By)</label>
															<div class="input-group">
															<ul class="icheck-list">
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																				<textarea class="form-control" id="inputEmail3" name="providedby" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" readonly><?php echo $sql_data['vwac_providedby'];?></textarea> </div>
																		</div>
																	</li>
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="providedby1" style="resize:vertical; width:250px; min-height:40px; max-height:100px;" readonly><?php echo $sql_data['vwac_providedby1'];?></textarea> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="providedby2" style="resize:vertical; width:250px; min-height:40px; max-height:100px;" readonly><?php echo $sql_data['vwac_providedby2'];?></textarea> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="providedby3" style="resize:vertical; width:250px; min-height:40px; max-height:100px;" readonly><?php echo $sql_data['vwac_providedby3'];?></textarea> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="providedby4" style="resize:vertical; width:250px; min-height:40px; max-height:100px;" readonly><?php echo $sql_data['vwac_providedby4'];?></textarea> </div>
																		</div>
																	</li> 
															</ul>
															</div>
                                                    </div>
                                                </div>
												<div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="color:#663399; font-size: 15px; margin-left:45px;">(Remarks)</label>
															<div class="input-group">
															<ul class="icheck-list">
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="remarks" style="resize:vertical; width:250px; min-height:40px; max-height:100px;" readonly><?php echo $sql_data['vwac_remarks'];?></textarea> </div>
																		</div>
																</li>
																<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="remarks1" style="resize:vertical; width:250px; min-height:40px; max-height:100px;" readonly><?php echo $sql_data['vwac_remarks1'];?></textarea> </div>
																		</div>
																</li> 
																<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="remarks2" style="resize:vertical; width:250px; min-height:40px; max-height:100px;" readonly><?php echo $sql_data['vwac_remarks2'];?></textarea> </div>
																		</div>
																</li> 
																<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="remarks3" style="resize:vertical; width:250px; min-height:40px; max-height:100px;" readonly><?php echo $sql_data['vwac_remarks3'];?></textarea> </div>
																		</div>
																</li> 
																<li>
																	<div class="form-group">
																		<div class="col-sm-12">
																		<textarea class="form-control" id="inputEmail3" name="remarks4" style="resize:vertical; width:250px; min-height:40px; max-height:100px;" readonly><?php echo $sql_data['vwac_remarks4'];?></textarea> </div>
																	</div>
																</li> 																
															</ul>											
														</div>
                                                    </div>
                                                </div>
											</div>
                                        </div>
                                    <div class="form-actions">
										<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
										<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php'">Back</button>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
				
			</div>
		</div>
	</form>
	</div>
	<style>
		.form-control, .control-label{
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