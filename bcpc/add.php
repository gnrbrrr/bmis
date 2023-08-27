<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = $conn->prepare("SELECT * FROM tbl_vwac ORDER BY vwac_id DESC LIMIT 1");
$sql->execute();

$sql_ref = $sql->fetch();

$current_year = date("Y");

if($sql_ref == 0){ //checks if tbl_document_request is empty or not
	$reference_num = $current_year . "-000";
} else {
	$previous_reference_num = $sql_ref['reference_no'];
	$previous_year = substr($previous_reference_num, 0, 4);
	$previous_number = intval(substr($previous_reference_num, 5));

	if ($previous_year == $current_year) {
		$number = $previous_number + 1;
		$reference_num = $current_year . "-" . sprintf("%03d", $number);
	} else {
		$reference_num = $current_year . "-000";
	}
}

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php'">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">BCPC</h3>
				<p class="text-muted m-b-30 font-13"> Add BCPC </p>
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
						else if($errorMessage == 'Client already exist! Data entry failed.')
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
				<div style="display:flex; width: fit-content;">
					<select name="typeofcase" id="type_case" class="form-control" style="width:300px;" placeholder="Type of Case" autocomplete=off required>
						<option value="RA 7610">RA 7610</option>
						<option value="CAR">CAR</option>
						<option value="RA 9344">RA 9344</option>
						<option value="CICL">CICL</option>
						<option value="Others">Others</option>
					</select><input type="text" id="type_case2" name="typeofcase2" style="flex:1; display:none; margin-left:3%; width:300px; border:0; border-bottom:2px solid black;"class="form-control" placeholder="Please Specify" autocomplete=off />
				</div>
				<br /><br />
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">							
							<input type="text" id="firstName" class="form-control" value="<?php echo $reference_num; ?>" placeholder="BCPC Reference No." name="refnum" readonly><br/>														
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">							
							<input type="text" id="lastName" class="form-control" placeholder="Case No." name="csnum"><br/> 														
						</div>
					</div>
					 
					<!--/span-->
				</div>			
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
                                                        <input type="text" id="firstName" class="form-control" placeholder="First Name" name="victim_first_name" autocomplete=off><br/>
                                                        <input type="text" id="secondName" class="form-control" placeholder="Middle Name" name="victim_middle_name" autocomplete=off><br/>
                                                        <input type="text" id="lastName" class="form-control" placeholder="Last Name" name="victim_last_name" autocomplete=off><br/>
													</div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Age</label>
														<input type="text" id="lastName" class="form-control" placeholder="Age" name="age" autocomplete=off><br/> 														
													</div>
                                                </div>
												<div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Address</label>
                                                        <textarea id="firstName" class="form-control" placeholder="Address" name="address" style="resize:vertical; width:350px; min-height:60px; max-height:100px;" autocomplete=off></textarea><br/> 														
													</div>
                                                </div>
												
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">B. Civil Status</label>
                                                        <select class="form-control" name="civil_status">
															<option>--Select your Status--</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
															<option value="Widowed">Widowed</option>
                                                        </select > 
													</div>
                                                </div>
												<div class="col-md-3">
                                                   <div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">C. Relationship to Perpetrator</label>
                                                        <input type="text" id="firstName" class="form-control" placeholder="Relationship" name="relationship_to_perpetrator" autocomplete=off><br/> 
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">D. Occupation / Proffesion</label>
                                                        <input type="text" id="firstName" class="form-control" placeholder="Complainant" name="cmplnt_proffesion" autocomplete=off><br/> 
													</div>
												</div>
											</div>

                                            <div class="row">
                                                <div class="col-md-5" style="width:270px;">
                                                    <div class="form-group" style="width:250px;">
                                                        <label class="control-label" style="font-size: 12px;">Name of Respondent</label>
                                                        <input type="text" id="firstName" class="form-control" placeholder="First Name" name="perp_first_name" style="width:250px;" autocomplete=off>
                                                        <label class="control-label" style="font-size: 12px;"><br /></label>
                                                        <input type="text" id="middleName" class="form-control" placeholder="Middle Name" name="perp_middle_name" style="width:250px;" autocomplete=off>
														<label class="control-label" style="font-size: 12px;"><br /></label>
                                                        <input type="text" id="lastName" class="form-control" placeholder="Last Name" name="perp_last_name" style="width:250px;" autocomplete=off>
													</div>
                                                </div>
												<div class="col-md-2">
                                                   <div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">Contact No.</label>
                                                        <input type="text" id="firstName" class="form-control" placeholder="Respondent Contact No" name="perpetrator_contact" autocomplete=off><br/> 
													</div>
												</div>
												<div class="col-md-5">
													<div class="form-group">
                                                        <label class="control-label" style="font-size: 12px;">Address</label>
                                                        <textarea id="firstName" class="form-control" placeholder="Respondent Address" name="perpetrator_address" style="resize:vertical; width:350px; min-height:60px; max-height:100px;" autocomplete=off></textarea><br/> 
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
                                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="date_violence_commited"></br> 
														<label class="control-label" style="font-size: 12px;">Date Reported</label>
                                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="date_reported"></br> 
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
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Physical" name="physical" autocomplete=off> </div>
																		</div>
																	</li>
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Sexual</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Sexual" name="sexual" autocomplete=off> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Psychological</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Psychological" name="psychological" autocomplete=off> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Economic Abuse</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Economic Abuse" name="economic_abuse" autocomplete=off> </div>
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
                                            <h3 class="box-title" style="color:#663399; font-weight:bold;">III. Action Taken / Assistance Extended / Provided to Victims</h3>
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
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Medical" name="medical" style="width: 500px;" autocomplete=off> </div>
																		</div>
																	</li>
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Counseling</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Counseling" name="counseling" style="width: 500px;" autocomplete=off> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Referral To</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Referral To" name="referral_to" style="width: 500px;" autocomplete=off> </div>
																		</div>
																	</li>
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Shelter</label>
																			<div class="col-sm-9">
																			<input type="text" class="form-control" id="inputEmail3" placeholder="Shelter" name="shelter" style="width: 500px;" autocomplete=off> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Issued BPO Date</label>
																			<div class="col-sm-9">
																			<input type="date" class="form-control" id="inputEmail3" placeholder="Issued BPO Date" name="issued_bpo_date" style="width: 500px;" autocomplete=off> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<label for="inputEmail3" class="col-sm-3 control-label">Date Accomplished</label>
																			<div class="col-sm-6">
																			<input type="date" class="form-control" id="inputEmail3" name="date_accomplished" style="width: 500px;" autocomplete=off> </div>
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
																			<textarea class="form-control" id="inputEmail3" name="providedby" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
																		</div>
																	</li>
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="providedby1" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="providedby2" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="providedby3" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
																		</div>
																	</li> 
																	<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="providedby4" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
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
																			<textarea class="form-control" id="inputEmail3" name="remarks" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
																		</div>
																</li>
																<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="remarks1" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
																		</div>
																</li> 
																<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="remarks2" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
																		</div>
																</li> 
																<li>
																		<div class="form-group">
																			<div class="col-sm-12">
																			<textarea class="form-control" id="inputEmail3" name="remarks3" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
																		</div>
																</li> 
																<li>
																	<div class="form-group">
																		<div class="col-sm-12">
																		<textarea class="form-control" id="inputEmail3" name="remarks4" style="resize:vertical; width:250px; min-height:60px; max-height:100px;" ></textarea> </div>
																	</div>
																</li> 																
															</ul>											
														</div>
                                                    </div>
                                                </div>
											</div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-paper-plane fa-fw"></i> Submit</button>
                                           <button type="button" class="btn btn-inverse waves-effect waves-light" onClick="history.go(-1);">Cancel</button>
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
	<script>
		$("#type_case").click(function(){
			
			var value_checked = $(this).val();
		
			if(value_checked != "Others"){
				$("#type_case2").hide();
				document.getElementById("type_case2").value="";
			}
			else{
				$("#type_case2").show();
			}
			
		});
	</script>
	<style>
		.control-label{
			color:black;
		}
	</style>