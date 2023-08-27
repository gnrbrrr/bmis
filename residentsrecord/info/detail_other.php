<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$date_death = date("F d, Y", strtotime($sql_data['date_death']));

//pet1
if($sql_data['pet1_vac1_date'] != ""){
	$pet1_vac1_date = date("F d, Y", strtotime($sql_data['pet1_vac1_date']));
}else{
	$pet1_vac1_date = $sql_data['pet1_vac1_date'];
}

if($sql_data['pet1_vac2_date'] != ""){
	$pet1_vac2_date = date("F d, Y", strtotime($sql_data['pet1_vac2_date']));
}else{
	$pet1_vac2_date = $sql_data['pet1_vac2_date'];
}

if($sql_data['pet1_vac3_date'] != ""){
	$pet1_vac3_date = date("F d, Y", strtotime($sql_data['pet1_vac3_date']));
}else{
	$pet1_vac3_date = $sql_data['pet1_vac3_date'];
}

if($sql_data['pet1_reg1_date'] != ""){
	$pet1_reg1_date = date("F d, Y", strtotime($sql_data['pet1_reg1_date']));
}else{
	$pet1_reg1_date = $sql_data['pet1_reg1_date'];
}

if($sql_data['pet1_reg2_date'] != ""){
	$pet1_reg2_date = date("F d, Y", strtotime($sql_data['pet1_reg2_date']));
}else{
	$pet1_reg2_date = $sql_data['pet1_reg2_date'];
}

if($sql_data['pet1_reg3_date'] != ""){
	$pet1_reg3_date = date("F d, Y", strtotime($sql_data['pet1_reg3_date']));
}else{
	$pet1_reg3_date = $sql_data['pet1_reg3_date'];
}

//pet2
if($sql_data['pet2_vac1_date'] != ""){
	$pet2_vac1_date = date("F d, Y", strtotime($sql_data['pet2_vac1_date']));
}else{
	$pet2_vac1_date = $sql_data['pet2_vac1_date'];
}

if($sql_data['pet2_vac2_date'] != ""){
	$pet2_vac2_date = date("F d, Y", strtotime($sql_data['pet2_vac2_date']));
}else{
	$pet2_vac2_date = $sql_data['pet2_vac2_date'];
}

if($sql_data['pet2_vac3_date'] != ""){
	$pet2_vac3_date = date("F d, Y", strtotime($sql_data['pet2_vac3_date']));
}else{
	$pet2_vac3_date = $sql_data['pet2_vac3_date'];
}

if($sql_data['pet2_reg1_date'] != ""){
	$pet2_reg1_date = date("F d, Y", strtotime($sql_data['pet2_reg1_date']));
}else{
	$pet2_reg1_date = $sql_data['pet2_reg1_date'];
}

if($sql_data['pet2_reg2_date'] != ""){
	$pet2_reg2_date = date("F d, Y", strtotime($sql_data['pet2_reg2_date']));
}else{
	$pet2_reg2_date = $sql_data['pet2_reg2_date'];
}

if($sql_data['pet2_reg3_date'] != ""){
	$pet2_reg3_date = date("F d, Y", strtotime($sql_data['pet2_reg3_date']));
}else{
	$pet2_reg3_date = $sql_data['pet2_reg3_date'];
}

//pet3
if($sql_data['pet3_vac1_date'] != ""){
	$pet3_vac1_date = date("F d, Y", strtotime($sql_data['pet3_vac1_date']));
}else{
	$pet3_vac1_date = $sql_data['pet3_vac1_date'];
}

if($sql_data['pet3_vac2_date'] != ""){
	$pet3_vac2_date = date("F d, Y", strtotime($sql_data['pet3_vac2_date']));
}else{
	$pet3_vac2_date = $sql_data['pet3_vac2_date'];
}

if($sql_data['pet3_vac3_date'] != ""){
	$pet3_vac3_date = date("F d, Y", strtotime($sql_data['pet3_vac3_date']));
}else{
	$pet3_vac3_date = $sql_data['pet3_vac3_date'];
}

if($sql_data['pet3_reg1_date'] != ""){
	$pet3_reg1_date = date("F d, Y", strtotime($sql_data['pet3_reg1_date']));
}else{
	$pet3_reg1_date = $sql_data['pet3_reg1_date'];
}

if($sql_data['pet3_reg2_date'] != ""){
	$pet3_reg2_date = date("F d, Y", strtotime($sql_data['pet3_reg2_date']));
}else{
	$pet3_reg2_date = $sql_data['pet3_reg2_date'];
}

if($sql_data['pet3_reg3_date'] != ""){
	$pet3_reg3_date = date("F d, Y", strtotime($sql_data['pet3_reg3_date']));
}else{
	$pet3_reg3_date = $sql_data['pet3_reg3_date'];
}

?>

	
		<div class="col-md-6">
			<div class="white-box">
				<table style="font-size:14px;" cellpadding="17" cellspacing="17">					
					<tbody>
						<tr>
							<td class="th">Category</td>
							<td class="th">:</td>
							<td class="td"><?php if($sql_data['is_head_of_family'] == 1){ echo "Head of the Family"; }else{ echo "Member"; }; ?></td>							
						</tr>
						<tr>
							<td class="th">Household No.</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['householdno']; ?></td>							
						</tr>
						<tr>
							<td class="th">Head of the Family</td>
							<td class="th">:</td>
							<td class="td">
								<?php
									$hofam = $sql_data['headofthefamily_id'];
									$hofa = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' AND r_id = '$hofam'");
									$hofa->execute();
									if($hofa->rowCount() > 0)
									{
										$hofa_data = $hofa->fetch();
										echo $hofa_data['lastname'] . ', ' . $hofa_data['firstname'] . ' ' . $hofa_data['middlename'];
									}else{ echo "-- --"; }
								?>
							</td>							
						</tr>
						<tr>
							<td class="th">Relationship With Head Of The Family</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['relationship_fam']; ?></td>
						</tr>
						<tr>
							<td class="th">Home Owner Association Member?</td>
							<td class="th">:</td>
							<td class="td"><?php if($sql_data['is_hoa'] == 1){ echo "Yes"; }else{ echo "No"; }; ?></td>							
						</tr>
						<tr>
							<td class="th">Voter's Status</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['votersstatus']; ?></td>							
						</tr>												
						<tr>
							<td class="th">Precint No.</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['precintno']; ?></td>							
						</tr>
						<tr>
							<td class="th">Solo Parent</td>
							<td class="th">:</td>
							<td class="td"><?php if($sql_data['is_soloparent'] == 1){ echo "Yes"; }else{ echo "No"; }; ?></td>							
						</tr>
						<tr>
							<td class="th">Person with Disability</td>
							<td class="th">:</td>
							<td class="td"><?php if($sql_data['is_pwd'] == 1){ echo "Yes"; }else{ echo "No"; }; ?></td>							
						</tr>
						<tr>
							<td class="th">4ps</td>
							<td class="th">:</td>
							<td class="td"><?php if($sql_data['is_ps4'] == 1){ echo "Yes"; }else{ echo "No"; }; ?></td>							
						</tr>
						<tr>
							<td class="th">Indigenous People</td>
							<td class="th">:</td>
							<td class="td"><?php if($sql_data['is_indigenous'] == 1){ echo "Yes"; }else{ echo "No"; }; ?></td>							
						</tr>
						<tr>
							<td class="th">Non Government Organization</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['ngo']; ?></td>							
						</tr>
						<tr>
							<td class="th">Transport Group</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['transport_group']; ?></td>							
						</tr>
						<tr>
							<td class="th">Senior Citizen</td>
							<td class="th">:</td>
							<td class="td"><?php if($sql_data['is_sc'] == 1){ echo "Yes"; }else{ echo "No"; }; ?></td>							
						</tr>
						<tr>
							<td class="th">Vital Status</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['status']; ?></td>							
						</tr>
						<tr id="date_death">
							<td class="th">Date of Death</td>
							<td class="th">:</td>
							<td class="td"><?php echo $date_death; ?></td>							
						</tr>
						<tr id="cause_death">
							<td class="th">Cause of Death</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['cause_death']; ?></td>							
						</tr>
						<tr id="place_death">
							<td class="th">Place of Death</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['place_death']; ?></td>							
						</tr>
					</tbody>
				</table>	
			</div>
		</div>


		<div class="col-md-9">
			<div class="white-box">
				<table style="font-size:14px;" cellpadding="17" cellspacing="17">					
					<tbody>
						<tr>
							<td class="th">Pets Owned</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['pet_own']; ?></td>
						</tr>
						<tr><td><br /></td></tr>
						<tr><td><br /></td></tr>
						<tr id="pet1_type" style="display:none;">
							<td class="th">Pet #1</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['pet1_type']; ?></td>
						</tr>
						<tr id="pet1_qty" style="display:none;">
							<td class="th">Pet #1 Quantity</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['pet1_qty']; ?></td>
						</tr>
						<tr id="pet1v1" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet1_type'];?> #1 Vaccinated</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet1_vac1']; ?></td>
							<td class="th" id="p1_1dvac" style="display:none;">&nbsp;&nbsp;Date Vaccinated :</td>
							<td class="td" id="p1_1dvac2" style="display:none;"><?php echo $pet1_vac1_date; ?></td>
						</tr>
						<tr id="pet1r1" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet1_type'];?> #1 Registered</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet1_reg1']; ?></td>
							<td class="th" id="p1_1dreg" style="display:none;">&nbsp;&nbsp;Date Registered :</td>
							<td class="td" id="p1_1dreg2" style="display:none;"><?php echo $pet1_reg1_date; ?></td>
						</tr>
						<tr id="pet1v2" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet1_type'];?> #2 Vaccinated</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet1_vac2']; ?></td>
							<td class="th" id="p1_2dvac" style="display:none;">&nbsp;&nbsp;Date Vaccinated :</td>
							<td class="td" id="p1_2dvac2" style="display:none;"><?php echo $pet1_vac2_date; ?></td>
						</tr >
						<tr id="pet1r2" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet1_type'];?> #2 Registered</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet1_reg2']; ?></td>
							<td class="th" id="p1_2dreg" style="display:none;">&nbsp;&nbsp;Date Registered :</td>
							<td class="td" id="p1_2dreg2" style="display:none;"><?php echo $pet1_reg2_date; ?></td>
						</tr>
						<tr id="pet1v3" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet1_type'];?> #3 Vaccinated</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet1_vac3']; ?></td>
							<td class="th" id="p1_3dvac" style="display:none;">&nbsp;&nbsp;Date Vaccinated :</td>
							<td class="td" id="p1_3dvac2" style="display:none;"><?php echo $pet1_vac3_date; ?></td>
						</tr>
						<tr id="pet1r3" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet1_type'];?> #3 Registered</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet1_reg3']; ?></td>
							<td class="th" id="p1_3dreg" style="display:none;">&nbsp;&nbsp;Date Registered :</td>
							<td class="td" id="p1_3dreg2" style="display:none;"><?php echo $pet1_reg3_date; ?></td>
						</tr>
						<tr><td><br /></td></tr>
						<tr id="pet2_type" style="display:none;">
							<td class="th">Pet #2</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['pet2_type']; ?></td>
						</tr>
						<tr id="pet2_qty" style="display:none;">
							<td class="th">Pet #2 Quantity</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['pet2_qty']; ?></td>
						</tr>
						<tr id="pet2v1" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet2_type'];?> #1 Vaccinated</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet2_vac1']; ?></td>
							<td class="th" id="p2_1dvac" style="display:none;">&nbsp;&nbsp;Date Vaccinated :</td>
							<td class="td" id="p2_1dvac2" style="display:none;"><?php echo $pet2_vac1_date; ?></td>
						</tr>
						<tr id="pet2r1" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet2_type'];?> #1 Registered</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet2_reg1']; ?></td>
							<td class="th" id="p2_1dreg" style="display:none;">&nbsp;&nbsp;Date Registered :</td>
							<td class="td" id="p2_1dreg2" style="display:none;"><?php echo $pet2_reg1_date; ?></td>
						</tr>
						<tr id="pet2v2" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet2_type'];?> #2 Vaccinated</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet2_vac2']; ?></td>
							<td class="th" id="p2_2dvac" style="display:none;">&nbsp;&nbsp;Date Vaccinated :</td>
							<td class="td" id="p2_2dvac2" style="display:none;"><?php echo $pet2_vac2_date; ?></td>
						</tr >
						<tr id="pet2r2" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet2_type'];?> #2 Registered</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet2_reg2']; ?></td>
							<td class="th" id="p2_2dreg" style="display:none;">&nbsp;&nbsp;Date Registered :</td>
							<td class="td" id="p2_2dreg2" style="display:none;"><?php echo $pet2_reg2_date; ?></td>
						</tr>
						<tr id="pet2v3" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet2_type'];?> #3 Vaccinated</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet2_vac3']; ?></td>
							<td class="th" id="p2_3dvac" style="display:none;">&nbsp;&nbsp;Date Vaccinated :</td>
							<td class="td" id="p2_3dvac2" style="display:none;"><?php echo $pet2_vac3_date; ?></td>
						</tr>
						<tr id="pet2r3" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet2_type'];?> #3 Registered</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet2_reg3']; ?></td>
							<td class="th" id="p2_3dreg" style="display:none;">&nbsp;&nbsp;Date Registered :</td>
							<td class="td" id="p2_3dreg2" style="display:none;"><?php echo $pet2_reg3_date; ?></td>
						</tr>
						<tr><td><br /></td></tr>
						<tr id="pet3_type" style="display:none;">
							<td class="th">Pet #3</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['pet3_type']; ?></td>
						</tr>
						<tr id="pet3_qty" style="display:none;">
							<td class="th">Pet #3 Quantity</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['pet3_qty']; ?></td>
						</tr>
						<tr id="pet3v1" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet3_type'];?> #1 Vaccinated</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet3_vac1']; ?></td>
							<td class="th" id="p3_1dvac" style="display:none;">&nbsp;&nbsp;Date Vaccinated :</td>
							<td class="td" id="p3_1dvac2" style="display:none;"><?php echo $pet3_vac1_date; ?></td>
						</tr>
						<tr id="pet3r1" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet3_type'];?> #1 Registered</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet3_reg1']; ?></td>
							<td class="th" id="p3_1dreg" style="display:none;">&nbsp;&nbsp;Date Registered :</td>
							<td class="td" id="p3_1dreg2" style="display:none;"><?php echo $pet3_reg1_date; ?></td>
						</tr>
						<tr id="pet3v2" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet3_type'];?> #2 Vaccinated</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet3_vac2']; ?></td>
							<td class="th" id="p3_2dvac" style="display:none;">&nbsp;&nbsp;Date Vaccinated :</td>
							<td class="td" id="p3_2dvac2" style="display:none;"><?php echo $pet3_vac2_date; ?></td>
						</tr >
						<tr id="pet3r2" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet3_type'];?> #2 Registered</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet3_reg2']; ?></td>
							<td class="th" id="p3_2dreg" style="display:none;">&nbsp;&nbsp;Date Registered :</td>
							<td class="td" id="p3_2dreg2" style="display:none;"><?php echo $pet3_reg2_date; ?></td>
						</tr>
						<tr id="pet3v3" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet3_type'];?> #3 Vaccinated</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet3_vac3']; ?></td>
							<td class="th" id="p3_3dvac" style="display:none;">&nbsp;&nbsp;Date Vaccinated :</td>
							<td class="td" id="p3_3dvac2" style="display:none;"><?php echo $pet3_vac3_date; ?></td>
						</tr>
						<tr id="pet3r3" style="display:none;">
							<td class="th">is <?php echo $sql_data['pet3_type'];?> #3 Registered</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['is_pet3_reg3']; ?></td>
							<td class="th" id="p2_3dreg" style="display:none;">&nbsp;&nbsp;Date Registered :</td>
							<td class="td" id="p2_3dreg2" style="display:none;"><?php echo $pet3_reg3_date; ?></td>
						</tr>
					</tbody>
				</table>	
			</div>
		</div>
		<script>
			var status = "<?php echo $sql_data['status']; ?>";


			var pets_owned = "<?php echo $sql_data['pet_own']; ?>";

			var pets_arr = [["#pet1_type", "#pet1_qty"], ["#pet2_type", "#pet2_qty"], ["#pet3_type", "#pet3_qty"]];

			var pet1v_arr = ["#pet1v1", "#pet1v2", "#pet1v3"]; //table rows vaccinated
			var pet2v_arr = ["#pet2v1", "#pet2v2", "#pet2v3"];
			var pet3v_arr = ["#pet3v1", "#pet3v2", "#pet3v3"];

			var pet1_vac_arr = ["#p1_1dvac", "#p1_2dvac", "#p1_3dvac"]; //date title
			var pet2_vac_arr = ["#p2_1dvac", "#p2_2dvac", "#p2_3dvac"];
			var pet3_vac_arr = ["#p3_1dvac", "#p3_2dvac", "#p3_3dvac"];

			var pet1_vac2_arr = ["#p1_1dvac2", "#p1_2dvac2", "#p1_3dvac2"]; //dates
			var pet2_vac2_arr = ["#p2_1dvac2", "#p2_2dvac2", "#p2_3dvac2"];
			var pet3_vac2_arr = ["#p3_1dvac2", "#p3_2dvac2", "#p3_3dvac2"];

			var pet1r_arr = ["#pet1r1", "#pet1r2", "#pet1r3"]; //table rows registered
			var pet2r_arr = ["#pet2r1", "#pet2r2", "#pet2r3"];
			var pet3r_arr = ["#pet3r1", "#pet3r2", "#pet3r3"];

			var pet1_reg_arr = ["#p1_1dreg", "#p1_2dreg", "p1_3dreg"]; //date title
			var pet2_reg_arr = ["#p2_1dreg", "#p2_2dreg", "p2_3dreg"];
			var pet3_reg_arr = ["#p3_1dreg", "#p3_2dreg", "p3_3dreg"];

			var pet1_reg2_arr = ["#p1_1dreg2", "#p1_2dreg2", "#p1_3dreg2"]; //dates
			var pet2_reg2_arr = ["#p2_1dreg2", "#p2_2dreg2", "#p2_3dreg2"];
			var pet3_reg2_arr = ["#p3_1dreg2", "#p3_2dreg2", "#p3_3dreg2"];

			var pet1_quant = "<?php echo $sql_data['pet1_qty']; ?>"; //quantity per pet type
			var pet2_quant = "<?php echo $sql_data['pet2_qty']; ?>";
			var pet3_quant = "<?php echo $sql_data['pet3_qty']; ?>";

			//pets vaccine status array
			var pet1_vac_val = ["<?php echo $sql_data['is_pet1_vac1']; ?>", "<?php echo $sql_data['is_pet1_vac2']; ?>", "<?php echo $sql_data['is_pet1_vac3']; ?>"];
			var pet2_vac_val = ["<?php echo $sql_data['is_pet2_vac1']; ?>", "<?php echo $sql_data['is_pet2_vac2']; ?>", "<?php echo $sql_data['is_pet2_vac3']; ?>"];
			var pet3_vac_val = ["<?php echo $sql_data['is_pet3_vac1']; ?>", "<?php echo $sql_data['is_pet3_vac2']; ?>", "<?php echo $sql_data['is_pet3_vac3']; ?>"];

			//pets register status array
			var pet1_reg_val = ["<?php echo $sql_data['is_pet1_reg1']; ?>", "<?php echo $sql_data['is_pet1_reg2']; ?>", "<?php echo $sql_data['is_pet1_reg3']; ?>"];
			var pet2_reg_val = ["<?php echo $sql_data['is_pet2_reg1']; ?>", "<?php echo $sql_data['is_pet2_reg2']; ?>", "<?php echo $sql_data['is_pet2_reg3']; ?>"];
			var pet3_reg_val = ["<?php echo $sql_data['is_pet3_reg1']; ?>", "<?php echo $sql_data['is_pet3_reg2']; ?>", "<?php echo $sql_data['is_pet3_reg3']; ?>"];


			for(let i = 0;i < pets_owned;i++){
				$(pets_arr[i]).show();
				$(pets_arr[i][1]).show();
			}


			for(let i = 0;i < pet1_quant;i++){ //loops base on pet1 quantity
				$(pet1v_arr[i]).show(); //shows pet1 vaccine rows
				$(pet1r_arr[i]).show(); //shows pet1 register rows
				if(pet1_vac_val[i] == "Yes"){ //shows date of vaccine cell if true
					$(pet1_vac_arr[i]).show();
					$(pet1_vac2_arr[i]).show();
				}else{
					$(pet1_vac_arr[i]).hide();
					$(pet1_vac2_arr[i]).hide();
				}

				if(pet1_reg_val[i] == "Yes"){ //shows date of register cell if true
					$(pet1_reg_arr[i]).show();
					$(pet1_reg2_arr[i]).show();
				}else{
					$(pet1_reg_arr[i]).hide();
					$(pet1_reg2_arr[i]).hide();
				}
			}

			for(let i = 0;i < pet2_quant;i++){ //loops base on pet2 quantity
				$(pet2v_arr[i]).show(); //shows pet2 vaccine rows
				$(pet2r_arr[i]).show(); //shows pet2 register rows
				if(pet2_vac_val[i] == "Yes"){ //shows date of vaccine cell if true
					$(pet2_vac_arr[i]).show();
					$(pet2_vac2_arr[i]).show();
				}else{
					$(pet2_vac_arr[i]).hide();
					$(pet2_vac2_arr[i]).hide();
				}

				if(pet2_reg_val[i] == "Yes"){ //shows date of register cell if true
					$(pet2_reg_arr[i]).show();
					$(pet2_reg2_arr[i]).show();
				}else{
					$(pet2_reg_arr[i]).hide();
					$(pet2_reg2_arr[i]).hide();
				}
			}

			for(let i = 0;i < pet3_quant;i++){ //loops base on pet3 quantity
				$(pet3v_arr[i]).show(); //shows pet3 vaccine rows
				$(pet3r_arr[i]).show(); //shows pet3 register rows
				if(pet3_vac_val[i] == "Yes"){ //shows date cell if true
					$(pet3_vac_arr[i]).show();
					$(pet3_vac2_arr[i]).show();
				}else{
					$(pet3_vac_arr[i]).hide();
					$(pet3_vac2_arr[i]).hide();
				}

				if(pet3_reg_val[i] == "Yes"){
					$(pet3_reg_arr[i]).show();
					$(pet3_reg2_arr[i]).show();
				}else{
					$(pet3_reg_arr[i]).hide();
					$(pet3_reg2_arr[i]).hide();
				}
			}


			if(status == "Deceased"){
				$("#date_death").show();
				$("#cause_death").show();
				$("#place_death").show();
			}else{
				$("#date_death").hide();
				$("#cause_death").hide();
				$("#place_death").hide();
			}



		</script>

		
		