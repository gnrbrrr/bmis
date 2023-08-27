<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


	$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$id' AND is_deleted != '1'");
	$sql->execute();
	$sql_data = $sql->fetch();
?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
		<div class="col-md-8">
			<div class="white-box">
				<h3 style="color:#663399; font-weight:bold;">Work Info</h3>
				<hr />
				<?php
					$employmentstatus = $sql_data['employeestatus'];
					
					if($employmentstatus == 'Employed Private'){
						$valemployeestat = 'Employed Private';
						$employeestat = 'Employed Private';
					} else if ($employmentstatus == 'Employed Government'){
						$valemployeestat = 'Employed Government';
						$employeestat = 'Employed Government';
					} else if ($employmentstatus == 'Self-Employed'){
						$valemployeestat = 'Self-Employed';
						$employeestat = 'Self-Employed';
					} else if ($employmentstatus == 'Unemployed'){
						$valemployeestat = 'Unemployed';
						$employeestat = 'Unemployed';
					} else if ($employmentstatus == 'Student'){
						$valemployeestat = 'Student';
						$employeestat = 'Student';
					} else if ($employmentstatus == 'Out of School Youth'){
						$valemployeestat = 'Out of School Youth';
						$employeestat = 'Out of School Youth';											
					} else {
						$valemployeestat = 'None';
						$employeestat = 'None';
					} 
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Employment Status</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="employment_status" class="employ" style="width:270px;">
								<option value="<?php echo $valemployeestat; ?>"><?php echo $employeestat; ?></option>
								<option value="Employed Private">Employed Private</option>
								<option value="Employed Government">Employed Government</option>
								<option value="Self-Employed">Self-Employed</option>
								<option value="Unemployed">Unemployed</option>
								<option value="Student">Student</option>
								<option value="Out of School Youth">Out of School Youth</option>
								<option value="None">None</option>
							</select>
						</div>
					</div>
				</div>
				
				<div id="employment_status">
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Kasambahay</label>
						<div class="col-sm-9">
							<div class="input-group">
								<?php
								if($sql_data['is_kasambahay'] != 1){
								?>
								<input type="radio" class="kas" name="kas" id="optionsRadios3" value="0" checked="" /> No
								&nbsp;
								<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" /> Yes
								<?php
								} else {
								?>
								<input type="radio" class="kas" name="kas" id="optionsRadios3" value="0" /> No
								&nbsp;
								<input type="radio" class="kas" name="kas" id="optionsRadios4" value="1" checked="" /> Yes
								<?php
								}
								?>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="kas_name">
						<label for="exampleInputuname" class="col-sm-3 control-label">Occupation</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Occupation" name="occupation" value="<?php echo $sql_data['occupation']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					
					<div class="form-group" id="kas_name">
						<label for="exampleInputuname" class="col-sm-3 control-label">Name of Company</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Name of Company" name="company_name" value="<?php echo $sql_data['company_name']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					
					<div class="form-group" id="kas_name">
						<label for="exampleInputuname" class="col-sm-3 control-label">Position</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Position" name="company_position" value="<?php echo $sql_data['company_position']; ?>" autocomplete=off /> </div>
						</div>
					</div>
					
					<div class="form-group" id="kas_name">
						<label for="exampleInputuname" class="col-sm-3 control-label">Address of Company</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Address of Company" name="company_address" value="<?php echo $sql_data['company_address']; ?>" autocomplete=off /> </div>
						</div>
					</div>
				
					<?php
						$incomesource = $sql_data['income_source'];
						
						if($incomesource == 'Salary'){
							$valincomesource = 'Salary';
							$incomesStat = 'Salary';
						} else if ($incomesource == 'Remittance'){
							$valincomesource = 'Remittance';
							$incomesStat = 'Remittance';
						} else if ($incomesource == 'Business'){
							$valincomesource = 'Business';
							$incomesStat = 'Business';
						}	else{
							$valincomesource = '';
							$incomesStat = 'N/A';
						}					
					?>
					<div class="form-group" id="sourceofincome">
						<label for="exampleInputuname" class="col-sm-3 control-label">Source of Income</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="income_source" class="select2" style="width:270px;">
									<option value="<?php echo $valincomesource; ?>"><?php echo $incomesStat; ?></option>
									<option value="Salary">Salary</option>
									<option value="Remittance">Remittance</option>
									<option value="Business">Business</option>								
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="monthlyincome">
						<label for="exampleInputuname" class="col-sm-3 control-label">Monthly Income</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Monthly Income" name="income_monthly" onKeyUp="checkNumber(this);" value="<?php echo $sql_data['income_monthly']; ?>" autocomplete=off /> </div>
						</div>
					</div>
				</div>
				<?php
					$ofw = $sql_data['is_ofw'];
					
					if($ofw == '0'){
						$valofw = '0';
						$ofwStat = 'No';
					} else if ($ofw == '1'){
						$valofw = '1';
						$ofwStat = 'Yes';
					} 					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">OFW</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="ofw" class="select2" style="width:270px;">
								<option value="<?php echo $valofw; ?>"><?php echo $ofwStat; ?></option>
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<a href="#education" data-toggle="tab" class="btn btn-info waves-effect waves-light m-r-10 tab"><i class="fa fa-chevron-left fa-fw"></i> Back</a>
					&nbsp;
					<a href="#others" data-toggle="tab" class="btn btn-success waves-effect waves-light m-r-10 tab">Next <i class="fa fa-chevron-right fa-fw"></i></a>
				</div>
				
			</div>
		</div>
		<style>
			.control-label{
				color:black;
			}
		</style>
		