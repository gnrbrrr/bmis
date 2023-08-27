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
				<h3 style="color:#663399; font-weight:bold;">Other Info</h3>
				<hr />
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Category</label>
					<div class="col-sm-9">
						<div class="input-group">
							<?php
							if($sql_data['is_head_of_family'] != 1){
							?>
							<input type="radio" class="cat" name="ishof" id="optionsRadios1" value="1" /> Household Head
							&nbsp;
							<input type="radio" class="cat" name="ishof" id="optionsRadios2" value="0" checked="" /> Household Member
							<?php
							} else {
							?>
							<input type="radio" class="cat" name="ishof" id="optionsRadios1" value="1" checked="" /> Household Head
							&nbsp;
							<input type="radio" class="cat" name="ishof" id="optionsRadios2" value="0" /> Household Member
							<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="form-group" id="cust_name">
					<label for="exampleInputuname" class="col-sm-3 control-label">Household No</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-location-pin"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Household Number" name="household_no" value="<?php echo $sql_data['householdno']; ?>" autocomplete=off /> </div>
					</div>
				</div>
				
				<div class="form-group" id="cust_name2" style="display:none;">
					<label for="exampleInputuname" class="col-sm-3 control-label">Head of the Family</label>
					<div class="col-sm-9">
						<div class="input-group">
							
							
							<select name="head_family" class="select2" style="width:270px;">
							<?php
									if($sql_data['resident_status'] != "Resident"){
								?>
									<option value="0">" "</option>
								<?php
									}else{
										$head_family = $sql_data['headofthefamily_id'];

										if($head_family != 0){
											$head = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$head_family' and is_deleted != '1'");
											$head->execute();
											$head_data = $head->fetch();

											$head_family_name = "";

											if($head_data['lastname']){
												$head_family_name .= $head_data['lastname'];
											}else{

											}

											if($head_data['firstname']){
												$head_family_name .= ', ' . $head_data['firstname'];
											}else{

											}

											if($head_data['middlename']){
												$head_family_name .= ' ' . $head_data['middlename'];
											}else{

											}

											$head_id = $head_data['r_id'];
									
								?>
											<option value="<?php echo $head_id; ?>"><?php echo $head_family_name; ?></option>
								<?php
											$hofa = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status != 'Non-Resident' AND r_id != '$head_family' AND is_head_of_family = '1' AND r_id != '$id' AND is_deleted != '1'");
											$hofa->execute();
											if($hofa->rowCount() > 0)
											{
												while($hofa_data = $hofa->fetch())
												{
								?>
													<option value="<?php echo $hofa_data['r_id']; ?>"><?php echo $hofa_data['lastname']; ?>, <?php echo $hofa_data['firstname']; ?> <?php echo $hofa_data['middlename']; ?></option>											
								<?php
												}
											} // End While
										}else{

											$hofa2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status != 'Non-Resident' AND is_head_of_family = '1' AND r_id != '$id' AND is_deleted != '1'");
											$hofa2->execute();
											if($hofa2->rowCount() > 0)
											{
												while($hofa2_data = $hofa2->fetch())
												{
								?>
													<option value="<?php echo $hofa2_data['r_id']; ?>"><?php echo $hofa2_data['lastname']; ?>, <?php echo $hofa2_data['firstname']; ?> <?php echo $hofa2_data['middlename']; ?></option>											
								<?php
												}
											} // End While
										}
									}
								?>								
							</select>
							
						</div>
					</div>
				</div>

				<div class="form-group" id="relationship" style="display:none;">
					<label for="exampleInputuname" class="col-sm-3 control-label">Relationship With Head Of The Family</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="" id="rhof" name="rhof" value="<?php echo $sql_data['relationship_fam']?>" autocomplete=off /> </div>
					</div>
				</div>
				
				<?php
					$homeownerassoc = $sql_data['is_hoa'];
					
					if($homeownerassoc == '0'){
						$valhoa = '0';
						$hoaStat = 'No';
					} else if ($homeownerassoc == '1'){
						$valhoa = '1';
						$hoaStat = 'Yes';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Home Owner Association Member?</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="hoa" class="select2" style="width:270px;">
								<option value="<?php echo $valhoa; ?>"><?php echo $hoaStat; ?></option>
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<?php
					$voterstatus = $sql_data['votersstatus'];
					
					if($voterstatus == 'Registered'){
						$valvoterstat = 'Registered';
						$vtrstat = 'Registered';
					} else if ($voterstatus == 'Unregistered'){
						$valvoterstat = 'Unregistered';
						$vtrstat = 'Unregistered';
					}	else{
						$valvoterstat = '';
						$vtrstat = 'N/A';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Voter's Status</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="voters_status" class="select2" style="width:270px;">
								<option value="<?php echo $valvoterstat; ?>"><?php echo $vtrstat; ?></option>
								<option value="Registered">Registered</option>
								<option value="Unregistered">Unregistered</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Precint No</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Precint Number" name="precint_no" value="<?php echo $sql_data['precintno']; ?>" autocomplete=off /> </div>
					</div>
				</div>
				<?php
					$soloparent = $sql_data['is_soloparent'];
					
					if($soloparent == '0'){
						$valsoloparent = '0';
						$soloparentstat = 'No';
					} else if ($soloparent == '1'){
						$valsoloparent = '1';
						$soloparentstat = 'Yes';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Solo Parent</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="solo_parent" class="select2" style="width:270px;">
								<option value="<?php echo $valsoloparent; ?>"><?php echo $soloparentstat; ?></option>
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<?php
					$erpat = $sql_data['is_erpat'];
					
					if($erpat == '0'){
						$valerpat = '0';
						$erpatstat = 'No';
					} else if ($erpat == '1'){
						$valerpat = '1';
						$erpatstat = 'Yes';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Erpat</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="erpat" class="select2" style="width:270px;">
								<option value="<?php echo $valerpat; ?>"><?php echo $erpatstat; ?></option>
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<?php
					$kababaihan = $sql_data['is_kababaihan'];
					
					if($kababaihan == '0'){
						$valkababaihan = '0';
						$kababaihanstat = 'No';
					} else if ($kababaihan == '1'){
						$valkababaihan = '1';
						$kababaihanstat = 'Yes';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Kababaihan</label>
					<div class="col-sm-9">
						<div class="input-group">
							<select name="kababaihan" class="select2" style="width:270px;">
								<option value="<?php echo $valkababaihan; ?>"><?php echo $kababaihanstat; ?></option>
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<?php
					$pwd = $sql_data['is_pwd'];
					
					if($pwd == '0'){
						$valpwd = '0';
						$pwdstat = 'No';
					} else if ($pwd == '1'){
						$valpwd = '1';
						$pwdstat = 'Yes';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Person with Disability</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="pwd" class="select2" style="width:270px;">
								<option value="<?php echo $valpwd; ?>"><?php echo $pwdstat; ?></option>
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<?php
					$ps4 = $sql_data['is_ps4'];
					
					if($ps4 == '0'){
						$valps4 = '0';
						$ps4stat = 'No';
					} else if ($ps4 == '1'){
						$valps4 = '1';
						$ps4stat = 'Yes';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">4ps</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="ps4" class="select2" style="width:270px;">
								<option value="<?php echo $valps4; ?>"><?php echo $ps4stat; ?></option>
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<?php
					$indigenous = $sql_data['is_indigenous'];
					
					if($indigenous == '0'){
						$valindigenous = '0';
						$indigenousstat = 'No';
					} else if ($indigenous == '1'){
						$valindigenous = '1';
						$indigenousstat = 'Yes';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Indigenous People</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="ind" class="select2" style="width:270px;">
								<option value="<?php echo $valindigenous; ?>"><?php echo $indigenousstat; ?></option>
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<?php
					$informalsettler = $sql_data['is_informal_settler'];
					
					if($informalsettler == '0'){
						$valinfosett = '0';
						$infosettstat = 'No';
					} else if ($informalsettler == '1'){
						$valinfosett = '1';
						$infosettstat = 'Yes';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Informal Settler</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="set" class="select2" style="width:270px;">
								<option value="<?php echo $valinfosett; ?>"><?php echo $infosettstat; ?></option>
								<option value="0">No</option>
								<option value="1">Yes</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Civil Society Organization</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Civil Society Organization" name="cso" value="<?php echo $sql_data['cso']; ?>" autocomplete=off /> </div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Non Government Organization</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Non Government Organization" name="ngo" value="<?php echo $sql_data['ngo']; ?>" autocomplete=off /> </div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Transport Group</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Transport Group" name="transport_group" value="<?php echo $sql_data['transport_group']; ?>" autocomplete=off /> </div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Senior Citizen</label>
					<div class="col-sm-9">
						<div class="input-group">
							
							<input type="radio" class="sc" name="sc" id="optionsRadios7" value="0" checked="" /> No
							&nbsp;
							<input type="radio" class="sc" name="sc" id="optionsRadios8" value="1" /> Yes
						</div>
					</div>
				</div>

				<div class="white-box"><!--PET OWN WHITEBOX START-->
					<div class="form-group"> <!--PETS OWNED START-->
						<label for="exampleInputuname" class="col-sm-3 control-label">Pets Owned?</label>
						<div class="col-sm-9">
							<div class="input-group">								
								<select name="pet_own" class="pet_own" style="width:fit-content;">
									<option value="<?php echo $sql_data['pet_own']?>"><?php echo $sql_data['pet_own']?></option>
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
						</div>
					</div><!--PETS OWNED END-->

					<!--PET 1 START-->
					<div class="white-box" id="wb_1" style="display:none;">
						<div class="form-group" id="pet1" style="display:none;">
							<label for="pet1_type" class="col-sm-3 control-label">Pet Type #1</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="pet1_type" placeholder="Type of Pet" name="pet1_type" value="<?php echo $sql_data['pet1_type']; ?>" autocomplete=off /> </div>
							</div>
						</div>

						<div class="form-group" id="pet1_quanti" style="display:none;">
							<label for="pet1_quanti" class="col-sm-3 control-label">Pet #1 Quantity</label> <!--NUMBER OF PET TYPE #1-->
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_quanti" id="pet1_quanti_val" class="pet1_qty" style="width:fit-content;">
										<option value="<?php echo $sql_data['pet1_qty']; ?>"><?php echo $sql_data['pet1_qty']; ?></option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group" id="pet1_1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_vac1" id="pet1_vac1" class="pet1_vac1" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet1_vac1']; ?>"><?php echo $sql_data['is_pet1_vac1']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_date1" placeholder="" name="pet1_date1" value="<?php echo $sql_data['pet1_vac1_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_re1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_reg1" id="pet1_reg1" class="pet1_reg1" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet1_reg1']; ?>"><?php echo $sql_data['is_pet1_reg1']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_reg1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_regdate1" placeholder="" name="pet1_regdate1" value="<?php echo $sql_data['pet1_reg1_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet1_2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_vac2" id="pet1_vac2" class="pet1_vac2" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet1_vac2']; ?>"><?php echo $sql_data['is_pet1_vac2']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_date2" placeholder="" name="pet1_date2" value="<?php echo $sql_data['pet1_vac2_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_re2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_reg2" id="pet1_reg2" class="pet1_reg2" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet1_reg2']; ?>"><?php echo $sql_data['is_pet1_reg2']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_reg2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_regdate2" placeholder="" name="pet1_regdate2" value="<?php echo $sql_data['pet1_reg2_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>


						<div class="form-group" id="pet1_3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_vac3" id="pet1_vac3" class="pet1_vac3" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet1_vac3']; ?>"><?php echo $sql_data['is_pet1_vac3']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_date3" placeholder="" name="pet1_date3" value="<?php echo $sql_data['pet1_vac3_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_re3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet1_reg3" id="pet1_reg3" class="pet1_reg3" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet1_reg3']; ?>"><?php echo $sql_data['is_pet1_reg3']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet1_reg3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet1_regdate3" placeholder="" name="pet1_regdate3" value="<?php echo $sql_data['pet1_reg3_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
					</div>
					<!--PET 1 END-->


					<!--PET 2 START-->
					<div class="white-box" id="wb_2" style="display:none;">
						<div class="form-group" id="pet2" style="display:none;">
							<label for="pet2_type" class="col-sm-3 control-label">Pet Type #2</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="pet2_type" placeholder="Type of Pet" name="pet2_type" value="<?php echo $sql_data['pet2_type']; ?>" autocomplete=off /> </div>
							</div>
						</div>

						<div class="form-group" id="pet2_quanti" style="display:none;">
							<label for="pet2_quanti" class="col-sm-3 control-label">Pet #2 Quantity</label> <!--NUMBER OF PET TYPE #2-->
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_quanti" id="pet2_quanti_val" class="pet2_qty" style="width:fit-content;">
										<option value="<?php echo $sql_data['pet2_qty']; ?>"><?php echo $sql_data['pet2_qty']; ?></option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group" id="pet2_1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_vac1" id="pet2_vac1" class="pet2_vac1" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet2_vac1']; ?>"><?php echo $sql_data['is_pet2_vac1']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_date1" placeholder="" name="pet2_date1" value="<?php echo $sql_data['pet2_vac1_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_re1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_reg1" id="pet2_reg1" class="pet2_reg1" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet2_reg3']; ?>"><?php echo $sql_data['is_pet2_reg1']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_reg1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_regdate1" placeholder="" name="pet2_regdate1" value="<?php echo $sql_data['pet2_reg1_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet2_2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_vac2" id="pet2_vac2" class="pet2_vac2" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet2_vac2']; ?>"><?php echo $sql_data['is_pet2_vac2']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_date2" placeholder="" name="pet2_date2" value="<?php echo $sql_data['pet2_vac2_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_re2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_reg2" id="pet2_reg2" class="pet2_reg2" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet2_reg2']; ?>"><?php echo $sql_data['is_pet2_reg2']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_reg2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_regdate2" placeholder="" name="pet2_regdate2" value="<?php echo $sql_data['pet2_reg2_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet2_3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_vac3" id="pet2_vac3" class="pet2_vac3" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet2_vac3']; ?>"><?php echo $sql_data['is_pet2_vac3']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_date3" placeholder="" name="pet2_date3" value="<?php echo $sql_data['pet2_vac3_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_re3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet2_reg3" id="pet2_reg3" class="pet2_reg3" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet2_reg3']; ?>"><?php echo $sql_data['is_pet2_reg3']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet2_reg3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet2_regdate3" placeholder="" name="pet2_regdate3" value="<?php echo $sql_data['pet2_reg3_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
					</div>
					<!--PET 2 END-->

					<!--PET 3 START-->
					<div class="white-box" id="wb_3" style="display:none;">
						<div class="form-group" id="pet3" style="display:none;">
							<label for="pet3_type" class="col-sm-3 control-label">Pet #3</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="text" class="form-control" id="pet3_type" placeholder="Type of Pet" name="pet3_type" value="<?php echo $sql_data['pet3_type']; ?>" autocomplete=off /> </div>
							</div>
						</div>

						<div class="form-group" id="pet3_quanti" style="display:none;">
							<label for="pet3_quanti" class="col-sm-3 control-label">Pet #3 Quantity</label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_quanti" id="pet3_quanti_val" class="pet3_qty" style="width:fit-content;">
										<option value="<?php echo $sql_data['pet3_qty']; ?>"><?php echo $sql_data['pet3_qty']; ?></option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group" id="pet3_1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_vac1" id="pet3_vac1" class="pet3_vac1" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet3_vac1']; ?>"><?php echo $sql_data['is_pet3_vac1']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_date1" placeholder="" name="pet3_date1" value="<?php echo $sql_data['pet3_vac1_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_re1" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #1 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_reg1" id="pet3_reg1" class="pet3_reg1" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet3_reg1']; ?>"><?php echo $sql_data['is_pet3_reg1']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_reg1d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_regdate1" placeholder="" name="pet3_regdate1" value="<?php echo $sql_data['pet3_reg1_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet3_2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_vac2" id="pet3_vac2" class="pet3_vac2" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet3_vac2']; ?>"><?php echo $sql_data['is_pet3_vac2']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_date2" placeholder="" name="pet3_date2" value="<?php echo $sql_data['pet3_vac2_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_re2" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #2 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_reg2" id="pet3_reg2" class="pet3_reg2" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet3_reg2']; ?>"><?php echo $sql_data['is_pet3_reg2']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_reg2d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_regdate2" placeholder="" name="pet3_regdate2" value="<?php echo $sql_data['pet3_reg2_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>

						<div class="form-group" id="pet3_3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Vaccinated <label style="color:red;">(Anti-Rabbies)</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_vac3" id="pet3_vac3" class="pet3_vac3" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet3_vac3']; ?>"><?php echo $sql_data['is_pet3_vac3']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Vaccinated</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_date3" placeholder="" name="pet3_date3" value="<?php echo $sql_data['pet3_vac3_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_re3" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Is Pet #3 Registered</label></label>
							<div class="col-sm-9">
								<div class="input-group">
									<select name="pet3_reg3" id="pet3_reg3" class="pet3_reg3" style="width:50px;">
										<option value="<?php echo $sql_data['is_pet3_reg3']; ?>"><?php echo $sql_data['is_pet3_reg3']; ?></option>
										<option value=""></option>
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select><br />
								</div>
							</div>
						</div>
						<div class="form-group" id="pet3_reg3d" style="display:none;">
							<label for="exampleInputuname" class="col-sm-3 control-label">Date Registered</label>
							<div class="col-sm-9">
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
									<input type="date" class="form-control" id="pet3_regdate3" placeholder="" name="pet3_regdate3" value="<?php echo $sql_data['pet3_reg3_date']; ?>" autocomplete=off />
								</div>
							</div>
						</div>
					</div>
					<!--PET 3 START-->

				</div><!--PET OWN WHITEBOX END-->

				<?php
					$maynilad = $sql_data['maynilad'];

					if($maynilad == '0'){
						$maynilad_val = 0;
						$maynilad_title = 'No';
					}else{
						$maynilad_val = 1;
						$maynilad_title = 'Yes';
					}

					$meralco = $sql_data['meralco'];

					if($meralco == '0'){
						$meralco_val = 0;
						$meralco_title = 'No';
					}else{
						$meralco_val = 1;
						$meralco_title = 'Yes';
					}

					$septic = $sql_data['septic_tank'];

					if($septic == '0'){
						$septic_val = 0;
						$septic_title = 'No';
					}else{
						$septic_val = 1;
						$septic_title = 'Yes';
					}
				?>

				<!--3 senior start-->
				<div id="3_senior">
					<div class="form-group" id="senior4">
						<label for="exampleInputuname" class="col-sm-3 control-label">Maynilad (Own Meter)?</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="maynilad" class="select2" style="width:270px;">
									<option value="<?php echo $maynilad_val; ?>"><?php echo $maynilad_title; ?></option>
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select>
							</div>
						</div>
					</div>
					
					
					<div class="form-group" id="senior4">
						<label for="exampleInputuname" class="col-sm-3 control-label">Meralco (Own Meter)?</label>
						<div class="col-sm-9">
							<div class="input-group">								
								<select name="meralco" class="select2" style="width:270px;">
									<option value="<?php echo $meralco_val; ?>"><?php echo $meralco_title; ?></option>
									<option value="0">No</option>
									<option value="1">Yes</option>									
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="senior4">
						<label for="exampleInputuname" class="col-sm-3 control-label">Septic Tank</label>
						<div class="col-sm-9">
							<div class="input-group">								
								<select name="septic_tank" class="select2" style="width:270px;">
									<option value="<?php echo $septic_val; ?>"><?php echo $septic_title; ?></option>
									<option value="0">No</option>
									<option value="1">Yes</option>									
								</select>
							</div>
						</div>
					</div>
				</div><!--3 senior end-->

				<div class="form-group" id="structure">
					<label for="exampleInputuname" class="col-sm-3 control-label">House Structure</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="house_structure" class="select2" style="width:270px;">
								<option value="<?php echo $sql_data['house_structure']; ?>"><?php echo $sql_data['house_structure']; ?></option>
								<option value="Light Materials">Light Materials</option>
								<option value="Semi - Concrete">Semi - Concrete</option>
								<option value="Concrete">Concrete</option>
							</select>
						</div>
					</div>
				</div>

				<?php
					$vitstatus = $sql_data['status'];
					
					if($vitstatus == 'Alive'){
						$valstatus = 'Alive';
						$statusstat = 'Alive';
					} else if ($vitstatus == 'Deceased'){
						$valstatus = 'Deceased';
						$statusstat = 'Deceased';
					}	else{
						$valstatus = '';
						$statusstat = 'N/A';
					}					
				?>
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Vital Status</label>
					<div class="col-sm-9">
						<div class="input-group">								
							<select name="status" class="vitals" style="width:100px;">
								<option value="<?php echo $valstatus; ?>"><?php echo $statusstat; ?></option>
								<option value="Alive">Alive</option>
								<option value="Deceased">Deceased</option>									
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" id="date_death" style="display:none;">
					<label for="exampleInputuname" class="col-sm-3 control-label">Date Of Death</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="date" class="form-control" id="date_death" placeholder="" name="date_death" value="<?php echo $sql_data['date_death']; ?>" autocomplete=off />
						</div>
					</div>
				</div>
				<div class="form-group" id="cause_death" style="display:none;">
					<label for="exampleInputuname" class="col-sm-3 control-label">Cause Of Death</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="cause_death" placeholder="" name="cause_death" value="<?php echo $sql_data['cause_death']; ?>" autocomplete=off />
						</div>
					</div>
				</div>
				<div class="form-group" id="place_death" style="display:none;">
					<label for="exampleInputuname" class="col-sm-3 control-label">Place Of Death</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="place_death" placeholder="" name="place_death" value="<?php echo $sql_data['place_death']; ?>" autocomplete=off />
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<a href="#work" data-toggle="tab" class="btn btn-info waves-effect waves-light m-r-10 tab"><i class="fa fa-chevron-left fa-fw"></i> Back</a>
					&nbsp;
					<input type="hidden" name="id" value="<?php echo $id; ?>" />
					<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><i class="fa fa-save fa-fw"></i> Save</button>
				</div>
				
			</div>
		</div>
		<script>
			var status = "<?php echo $sql_data['status']; ?>";

			var family = "<?php echo $sql_data['is_head_of_family']; ?>";
			var resident = "<?php echo $sql_data['resident_status']; ?>";

			var white_box_arr = ["#wb_1", "#wb_2", "#wb_3"]; //whitebox
			var pets_arr = ["#pet1", "#pet2", "#pet3"]; //pet type divs

			var pet_quant_arr = ["#pet1_quanti", "#pet2_quanti", "#pet3_quanti"]; //pet1 dropdown quantity div

			//get quantity of owned pets
			var pet_own = "<?php echo $sql_data['pet_own']; ?>";

			//get quantity on each pet type
			var pet1_qty = "<?php echo $sql_data['pet1_qty']; ?>";
			var pet2_qty = "<?php echo $sql_data['pet2_qty']; ?>";
			var pet3_qty = "<?php echo $sql_data['pet3_qty']; ?>";

			//is vaccinated or registered dropdown divs
			var pet1_vac_arr = ["#pet1_1", "#pet1_2", "#pet1_3"]; //is vaccinated dropdown div on pet1
			var pet1_reg_arr = ["#pet1_re1", "#pet1_re2", "#pet1_re3"]; //is registered dropdnow on pet1

			var pet2_vac_arr = ["#pet2_1", "#pet2_2", "#pet2_3"];
			var pet2_reg_arr = ["#pet2_re1", "#pet2_re2", "#pet2_re3"];

			var pet3_vac_arr = ["#pet3_1", "#pet3_2", "#pet3_3"];
			var pet3_reg_arr = ["#pet3_re1", "#pet3_re2", "#pet3_re3"];

			//date vaccinated or registered divs
			var pet1_vac_date_arr = ["#pet1_1d", "#pet1_2d", "#pet1_3d"]; //date vaccinated div on pet1
			var pet1_reg_date_arr = ["#pet1_reg1d", "#pet1_reg2d", "#pet1_reg3d"]; //date registered div on pet1

			var pet2_vac_date_arr = ["#pet2_1d", "#pet2_2d", "#pet2_3d"];
			var pet2_reg_date_arr = ["#pet2_reg1d", "#pet2_reg2d", "#pet2_reg3d"];

			var pet3_vac_date_arr = ["#pet3_1d", "#pet3_2d", "#pet3_3d"];
			var pet3_reg_date_arr = ["#pet3_reg1d", "#pet3_reg2d", "#pet3_reg3d"];

			//pet1
			var is_pet1_vac_arr = ["<?php echo $sql_data['is_pet1_vac1']; ?>", "<?php echo $sql_data['is_pet1_vac2']; ?>", "<?php echo $sql_data['is_pet1_vac3']; ?>"]; //gets sql on pets on pet1 is vaccinated
			var is_pet1_reg_arr = ["<?php echo $sql_data['is_pet1_reg1']; ?>", "<?php echo $sql_data['is_pet1_reg2']; ?>", "<?php echo $sql_data['is_pet1_reg3']; ?>"]; //gets sql on pets on pet1 is registered

			//pet2
			var is_pet2_vac_arr = ["<?php echo $sql_data['is_pet2_vac1']; ?>", "<?php echo $sql_data['is_pet2_vac2']; ?>", "<?php echo $sql_data['is_pet2_vac3']; ?>"];
			var is_pet2_reg_arr = ["<?php echo $sql_data['is_pet2_reg1']; ?>", "<?php echo $sql_data['is_pet2_reg2']; ?>", "<?php echo $sql_data['is_pet2_reg3']; ?>"];

			//pet3
			var is_pet3_vac_arr = ["<?php echo $sql_data['is_pet3_vac1']; ?>", "<?php echo $sql_data['is_pet3_vac2']; ?>", "<?php echo $sql_data['is_pet3_vac3']; ?>"];
			var is_pet3_reg_arr = ["<?php echo $sql_data['is_pet3_reg1']; ?>", "<?php echo $sql_data['is_pet3_reg2']; ?>", "<?php echo $sql_data['is_pet3_reg3']; ?>"];


			for(let i = 0;i < pet_own;i++){
				$(white_box_arr[i]).show(); //shows whitebox
				$(pets_arr[i]).show(); //shows pet type div
				$(pet_quant_arr[i]).show(); //shows drop down quantity per pet owned
			}

			for(let i = 0;i < pet1_qty;i++){ //pet1
				$(pet1_vac_arr[i]).show();
				$(pet1_reg_arr[i]).show();

				if(is_pet1_vac_arr[i] == "Yes"){
					$(pet1_vac_date_arr[i]).show();
				}else{
					$(pet1_vac_date_arr[i]).hide();
				}

				if(is_pet1_reg_arr[i] == "Yes"){
					$(pet1_reg_date_arr[i]).show();
				}else{
					$(pet1_reg_date_arr[i]).hide();
				}
			}

			for(let i = 0;i < pet2_qty;i++){ //pet2
				$(pet2_vac_arr[i]).show();
				$(pet2_reg_arr[i]).show();

				if(is_pet2_vac_arr[i] == "Yes"){
					$(pet2_vac_date_arr[i]).show();
				}else{
					$(pet2_vac_date_arr[i]).hide();
				}

				if(is_pet2_reg_arr[i] == "Yes"){
					$(pet2_reg_date_arr[i]).show();
				}else{
					$(pet2_reg_date_arr[i]).hide();
				}
			}

			for(let i = 0;i < pet3_qty;i++){ //pet3
				$(pet3_vac_arr[i]).show();
				$(pet3_reg_arr[i]).show();

				if(is_pet3_vac_arr[i] == "Yes"){
					$(pet3_vac_date_arr[i]).show();
				}else{
					$(pet3_vac_date_arr[i]).hide();
				}

				if(is_pet3_reg_arr[i] == "Yes"){
					$(pet3_reg_date_arr[i]).show();
				}else{
					$(pet3_reg_date_arr[i]).hide();
				}
			}


			if(family != 1 && resident == "Resident"){ //member
				$("#cust_name").hide();
				$("#cust_name2").show();
				$("#relationship").show();
				$("#rhof").attr("required", true);

			}else{
				$("#cust_name").show();
				$("#cust_name2").hide();
				$("#relationship").hide();
				$("#rhof").removeAttr("required");
			}

			if(resident == "Non-Resident"){
				$("#category").hide();

			}else{
				$("#category").show();
			}

			if(status == "Deceased"){
				$("#date_death").show();
				$("#cause_death").show();
				$("#place_death").show();
				$("#date_death").removeAttr("disabled");
				$("#cause_death").removeAttr("disabled");
				$("#place_death").removeAttr("disabled");
			}else{
				$("#date_death").hide();
				$("#cause_death").hide();
				$("#place_death").hide();
				$("#date_death").attr("disabled", true);
				$("#cause_death").attr("disabled", true);
				$("#place_death").attr("disabled", true);
			}

			
		</script>
		<style>
			.control-label{
				color:black;
			}
		</style>
		