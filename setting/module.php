	<form class="form-horizontal" method="post" action="process.php?action=module" enctype="multipart/form-data" name="form" id="form">
														
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Resident Records : </label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="res" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
								<?php if($sett_data['mod_resident'] == 1){ ?>
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
								<?php if($sett_data['mod_business'] == 1){ ?>
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
								<?php if($sett_data['mod_document'] == 1){ ?>
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
								<?php if($sett_data['mod_payment'] == 1){ ?>
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
								<?php if($sett_data['mod_cases'] == 1){ ?>
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
								<?php if($sett_data['mod_vawc'] == 1){ ?>
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
								<?php if($sett_data['mod_bcpc'] == 1){ ?>
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
								<?php if($sett_data['mod_blotter'] == 1){ ?>
										<option value="1">Show</option><option value="0">Hide</option>
								<?php }else{ ?>
										<option value="0">Hide</option><option value="1">Show</option>
								<?php } ?>
							</select>										
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Lupon Ng Tagapamahala : </label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="lup" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
								<?php if($sett_data['mod_lupon'] == 1){ ?>
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
								<?php if($sett_data['mod_badac'] == 1){ ?>
										<option value="1">Show</option><option value="0">Hide</option>
								<?php }else{ ?>
										<option value="0">Hide</option><option value="1">Show</option>
								<?php } ?>
							</select>										
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Minutes of the Meeting : </label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="min" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
								<?php if($sett_data['mod_minutes'] == 1){ ?>
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
								<?php if($sett_data['mod_legislative'] == 1){ ?>
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
								<?php if($sett_data['mod_resolution'] == 1){ ?>
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
								<?php if($sett_data['mod_ordinance'] == 1){ ?>
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
								<?php if($sett_data['mod_executive'] == 1){ ?>
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
								<?php if($sett_data['mod_inventory'] == 1){ ?>
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
								<?php if($sett_data['mod_borrow'] == 1){ ?>
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
								<?php if($sett_data['mod_medicine'] == 1){ ?>
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
								<?php if($sett_data['mod_medical'] == 1){ ?>
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
								<?php if($sett_data['mod_covid'] == 1){ ?>
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
								<?php if($sett_data['mod_rescue'] == 1){ ?>
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
								<?php if($sett_data['mod_vehicle'] == 1){ ?>
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
								<?php if($sett_data['mod_facility'] == 1){ ?>
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
								<?php if($sett_data['mod_project'] == 1){ ?>
										<option value="1">Show</option><option value="0">Hide</option>
								<?php }else{ ?>
										<option value="0">Hide</option><option value="1">Show</option>
								<?php } ?>
							</select>										
						</div>
					</div>
				</div>
		
		<div class="form-group m-b-0">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Save</button>
				<br /><br />
			</div>
		</div>
		
	</form>
	<style>
		.control-label{
			color:black;
		}
	</style>