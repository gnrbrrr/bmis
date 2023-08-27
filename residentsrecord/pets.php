<?php
 $id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<!--Form-->
	<form method="post" action="process.php?action=pets">
	
		<!--Fieldset-->
		<fieldset>
			<legend>PET INFORMATION</legend>
			
			<label>Number of Pets you own:</label>
			<input type="number" id="pets_own" name="pets_own" value="0"></input>
			<input type="button" id="confirm" value="Confirm" />
			
			<!--Table-->
			<table>
				<tr id="t1" style="display:none;">
					<td>Pet1</td>
					<td><input type="text" id="pet1" name="pet1" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity1" name="quantity1" value="0" disabled autocomplete=off /></td>
				</tr>
				<tr id="t2" style="display:none;">
					<td>Pet2</td>
					<td><input type="text" id="pet2" name="pet2" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity2" name="quantity2" value="0" disabled autocomplete=off /></td>
				</tr>
				<tr id="t3" style="display:none;">
					<td>Pet3</td>
					<td><input type="text" id="pet3" name="pet3" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity3" name="quantity3" value="0" disabled autocomplete=off /></td>
				</tr>
				<tr id="t4" style="display:none;">
					<td>Pet4</td>
					<td><input type="text" id="pet4" name="pet4" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity4" name="quantity4" value="0" disabled autocomplete=off /></td>
				</tr>
				<tr id="t5" style="display:none;">
					<td>Pet5</td>
					<td><input type="text" id="pet5" name="pet5" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity5" name="quantity5" value="0" disabled autocomplete=off /></td>
				</tr>
				<tr id="t6" style="display:none;">
					<td>Pet6</td>
					<td><input type="text" id="pet6" name="pet6" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity6" name="quantity6" value="0" disabled autocomplete=off /></td>
				</tr>
				<tr id="t7" style="display:none;">
					<td>Pet7</td>
					<td><input type="text" id="pet7" name="pet7" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity7" name="quantity7" value="0" disabled autocomplete=off /></td>
				</tr>
				<tr id="t8" style="display:none;">
					<td>Pet8</td>
					<td><input type="text" id="pet8" name="pet8" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity8" name="quantity8" value="0" disabled autocomplete=off /></td>
				</tr>
				<tr id="t9" style="display:none;">
					<td>Pet9</td>
					<td><input type="text" id="pet9" name="pet9" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity9" name="quantity9" value="0" disabled autocomplete=off /></td>
				</tr>
				<tr id="t10" style="display:none;">
					<td>Pet10</td>
					<td><input type="text" id="pet10" name="pet10" disabled autocomplete=off /></td>
					<td>Quantity</td>
					<td><input type="number" id="quantity10" name="quantity10" value="0" disabled autocomplete=off /></td>
				</tr>
			</table>
		</fieldset>
		
		<!--Submit Button-->
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input id="submit" type="submit" value="Submit Data" style="display:none;" disabled ></input>
	</form>
</body>
<script>
	//array for IDs
	var pet_arr = ["pet1","pet2","pet3","pet4","pet5","pet6","pet7","pet8","pet9","pet10"];
	var quant_arr = ["quantity1", "quantity2", "quantity3", "quantity4", "quantity5", "quantity6", "quantity7", "quantity8", "quantity9", "quantity10"];
	var table_arr = ["t1", "t2", "t3", "t4", "t5", "t6", "t7", "t8", "t9", "t10"];
	
	var confirmed = document.getElementById("confirm");
	confirmed.addEventListener("click", showTable);
	
	var latest_input;
	var last_input;
	
	function showTable(){
		document.getElementById("submit").style.display = "block";
		document.getElementById("submit").disabled = false;
		
		//Corrects field being shown
		if(latest_input == null){ //first input
			var latest_input = document.getElementById("pets_own").value;
			
			for(let num = 0; num < latest_input;num++){
				document.getElementById(table_arr[num]).style.display = "block";
				document.getElementById(pet_arr[num]).disabled = false;
				document.getElementById(quant_arr[num]).disabled = false;
			}
			var last_input = latest_input;
		}
		
		
		if(latest_input != null){ //user enter a new but low value
			latest_input = document.getElementById("pets_own").value;
			
			for(let num = latest_input; num <= last_input+1;num++){
				document.getElementById(table_arr[num]).style.display = "none";
				document.getElementById(pet_arr[num]).disabled = true;
				document.getElementById(quant_arr[num]).disabled = true;
			}
		}
	}
</script>
</html>