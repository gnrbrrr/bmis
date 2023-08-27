<head>

<script type="text/javascript">
// Auto calculate 1. Loan Application
// function startCalc1(){
// interval = setInterval("calc1()",1);
// }
// function calc1(){

// var userinput = document.getElementById("birthday").value;
// var birthday = new Date(userinput);

// //calculate month difference from current date in time
// var month_diff = Date.now() - birthday.getTime();

// //convert the calculated difference in date format
// var age_dt = new Date(month_diff);

// //extract year from date    
// var year = age_dt.getUTCFullYear();

// //now calculate the age of the user
// var age = Math.abs(year - 1970);

// document.form.age.value = (age * 1); // Age


// }
// function stopCalc1(){
// clearInterval(interval);
// }

function startCalc1() {
    interval = setInterval("calc1()",1);
}

function calc1() {
    var userinput = document.getElementById("birthday").value;
    var birthday = new Date(userinput);

    // Check if the birthday is February 29th
    var isLeapDay = (birthday.getMonth() == 1 && birthday.getDate() == 29);

    // Get the current date
    var current_date = new Date();

    // If the birthday is February 29th and the current year is not a leap year, set the birthday to February 28th
    if (isLeapDay && !isLeapYear(current_date.getFullYear())) {
        birthday.setMonth(1); // February
        birthday.setDate(28);
    }

    // Calculate the month difference from the current date in time
    var month_diff = current_date.getTime() - birthday.getTime();

    // Convert the calculated difference into a date format
    var age_dt = new Date(month_diff);

    // Extract the year from the date
    var year = age_dt.getUTCFullYear();

    // Now calculate the age of the user
    var age = Math.abs(year - 1970);

    document.form.age.value = (age * 1); // Age
}

function stopCalc1() {
    clearInterval(interval);
}

// Function to check if a given year is a leap year
function isLeapYear(year) {
    return (year % 4 == 0 && year % 100 != 0) || year % 400 == 0;
}
</script>

</head>
<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>

	<div class="row">
		<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
			<div class="col-md-12">
				<div class="white-box">
					<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Resident Information</h3>
					<p class="text-muted m-b-30 font-13"> Add Resident </p>
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
							else if($errorMessage == 'Resident already exist! Data entry failed.')
							{
						?>							
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
									<b><?php echo $errorMessage; ?></b>
								</div>
						<?php
							}
							else if($errorMessage == 'Household Number already exist! Data entry failed.')
							{
						?>							
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
									<b><?php echo $errorMessage; ?></b>
								</div>
						<?php								
							}else{}
						?>
					
					<div class="row">
						<?php include 'info/add_personal.php'; ?>
					</div>
					
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<!--<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit</button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>!-->
						</div>
					</div>
					
				</div>
			</div>			
		</form>
	</div>

<script type="text/javascript">

	$("#capture-option").click(function(){
		event.preventDefault();

		$("#video").show();
		$("#video").removeAttr("disabled");
		$("#capture-btn").show();

		navigator.mediaDevices.getUserMedia({ video: true })
			.then(stream => {
				video.srcObject = stream;
				video.play();
			})
			.catch(error => {
				console.error('Error accessing camera:', error);
			});
	});

	$(".cat").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "1"){ //Household Head
			$("#cust_name").show();
			$("#relationship").hide();
		}
		else{
			$("#cust_name").hide();
		}
		
		if(value_checked == "0"){ //Household Member
			$("#cust_name2").show();
			$("#relationship").show();
		}
		else{
			$("#cust_name2").hide();
		}
});
		


	$(".sc").click(function(){

		//0 = No and 1 = Yes
		var value_checked = $(this).val();
		
		if(value_checked == "1"){
			$("#senior1").show();
		}
		else{
			$("#senior1").hide();
		}
				
		if(value_checked == "0"){
			$("#senior1").hide();
		}
		else{
			$("#senior1").show();
		}
		
		
		if(value_checked == "1"){
			$("#senior2").show();
		}
		else{
			$("#senior2").hide();
		}
		
		if(value_checked == "0"){
			$("#senior2").hide();
		}
		else{
			$("#senior2").show();
		}
		
		
		if(value_checked == "1"){
			$("#senior3").show();
		}
		else{
			$("#senior3").hide();
		}
		
		if(value_checked == "0"){
			$("#senior3").hide();
		}
		else{
			$("#senior3").show();
		}
		
		
		// if(value_checked == "1"){
		// 	$("#senior4").show();
		// }
		// else{
		// 	$("#senior4").hide();
		// }
		
		// if(value_checked == "0"){
		// 	$("#senior4").hide();
		// }
		// else{
		// 	$("#senior4").show();
		// }
});

	$(".voterstatus").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "Registered"){
			$("#prect_no").show();
		}
		else{
			$("#prect_no").hide();
		}
		
		if(value_checked == "Unregistered"){
			$("#prect_no").hide();
		}
		else{
			$("#prect_no").show();
		}
		
});

$(".employ").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "Unemployed" || value_checked == "Student" || value_checked == "Out of School Youth" || value_checked == "None"){
			$("#employment_status").hide();

			$("#noc").removeAttr("required");
			$("#monthly").removeAttr("required");
			$("#company_post").removeAttr("required");
			$("#company_add").removeAttr("required");
		}
		else{
			$("#employment_status").show();
			
			$("#noc").attr("required", true);
			$("#monthly").attr("required", true);
			$("#company_post").attr("required", true);
			$("#company_add").attr("required", true);
		}

});

$(".educat").change(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "Elementary" || value_checked == "Highschool"){
			$("#eattain").hide();
			$("#eattain2").show();
			$("#skills").show();

		}else if(value_checked == "None"){
			$("#eattain").hide();
			$("#eattain2").hide();
			$("#skills").hide();

		}else{
			$("#eattain").show();
			$("#eattain2").hide();
			$("#skills").show();

		}

});

$(".kas").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "1"){
			$("#kas_status").hide();
		}
		else{
			$("#kas_status").show();
		}
		
		if(value_checked == "1"){
			$("#kas_status7").show();
		}
		else{
			$("#kas_status7").hide();
		}

});

$(".resstat").click(function(){

	var value_checked = $(this).val();

	if(value_checked == "Non-Resident"){ //Non Resident
		$("#head").hide();
		$("#resident_cat").hide();
		$("#res_cat").attr("disabled", true);
		$("#acc_number").hide();
		$("#acc_number").attr("disabled", true);
		$("#cust_name").hide();
		$("#cust_name2").hide();
		$("#relationship").hide();
		$("#year_resident").removeAttr("required");
		$("#yor_label").html("Years of Residency");
		$("#contact_label").html("Contact No<span style='color:red;'>*</span>");
		$("contact").removeAttr("required");
		// $("#alias").hide();
		// $("#height").hide();
		// $("#weight").hide();
		// $("#blood_type").hide();
		// $("#landline").hide();
		// $("#email").hide();
		// $("#per_address").hide();

		// $("#home_ownersh").hide();
		// $("#tin").hide();
		// $("#qci").hide();
		// $("#phil").hide();
		// $("#ibig").hide();
		// $("#gsis").hide();
		// $("#sss").hide();

		// $("#other_title").hide();
		// $("#head").hide();
		// $("#cust_name").hide();
		// $("#hoam").hide();
		// $("#vstat").hide();
		// $("#prect_no").hide();
		// $("#solo_p").hide();
		// $("#erpat").hide();
		// $("#kababaihan").hide();
		// $("#young").hide();
		// $("#disability").hide();
		// $("#4ps").hide();
		// $("#cvon").hide();
		// $("#indi").hide();
		// $("#informal").hide();
		// $("#civil_so").hide();
		// $("#non_go").hide();
		// $("#tg").hide();
		// $("#senior").hide();

		// $("#pets").hide();
		
		// $("#3_senior").hide();

		// $("#structure").hide();
		// $("#educ_info").hide();

		// $("#yor").hide(); //years of residency
		// $("#year_resident").removeAttr("required");

		// $("#employ_status").hide();
		// $("#kasambahay").hide();
		// $("#occupation").hide();

		// $("#sourceofincome").hide();
		// $("#monthlyincome").hide();

		// //name of company
		// $("#noc").attr("required", true);
		// $("#noc_label").html("Name of Company<span style='color:red;'>*</span>");

		// //company position
		// $("#company_post").attr("required", true);
		// $("#post_label").html("Position<span style='color:red;'>*</span>");

		// //company address
		// $("#company_add").attr("required", true);
		// $("#com_add_label").html("Address of Company<span style='color:red'>*</span>");



		// $("#ofw_info").hide();
	}else{ //Resident
		$("#head").show();
		$("#resident_cat").show();
		$("#res_cat").removeAttr("disabled");
		$("#acc_number").show();
		$("#acc_number").removeAttr("disabled");
		$("#cust_name").show();
		$("#yor_label").html("Years of Residency<span style='color:red;'>*</span>");
		$("#year_resident").attr("required", true);
		$("#contact_label").html("Contact No<span style='color:red;'>*</span>");
		$("contact").attr("required", true);

		// $("#alias").show();
		// $("#height").show();
		// $("#weight").show();
		// $("#blood_type").show();
		// $("#landline").show();
		// $("#email").show();
		// $("#per_address").show();

		// $("#home_ownersh").show();
		// $("#tin").show();
		// $("#qci").show();
		// $("#phil").show();
		// $("#ibig").show();
		// $("#gsis").show();
		// $("#sss").show();

		// $("#other_title").show();
		// $("#head").show();
		// $("#cust_name").show();
		// $("#hoam").show();
		// $("#vstat").show();
		// $("#prect_no").show();
		// $("#solo_p").show();
		// $("#erpat").show();
		// $("#kababaihan").show();
		// $("#young").show();
		// $("#disability").show();
		// $("#4ps").show();
		// $("#cvon").show();
		// $("#indi").show();
		// $("#informal").show();
		// $("#civil_so").show();
		// $("#non_go").show();
		// $("#tg").show();
		// $("#senior").show();

		// $("#pets").show();

		// $("#3_senior").show();

		// $("#structure").show();
		// $("#educ_info").show();

		// $("#yor").show(); //years of residency
		// $("#year_resident").attr("required", true);

		// $("#employ_status").show();
		// $("#kasambahay").show();
		// $("#occupation").show();

		// $("#sourceofincome").show();
		// $("#monthlyincome").show();

		// $("#ofw_info").show();
	}

});

$(".pet_own").click(function(){ //Main Number of pets

	var pet_value = $(this).val();

	if(pet_value == "1"){
		$("#pet1").show();
		$("#pet1_quanti").show();
		$("#pet2").hide();
		$("#pet2_type").val("");
		$("#pet2_quanti").hide();
		$("#pet2_quanti_val").val("0");
		$("#pet3").hide();
		$("#pet3_type").val("");
		$("#pet3_quanti").hide();
		$("#pet3_quanti_val").val("0");

		//whitebox
		$("#wb_1").show();
		$("#wb_2").hide();
		$("#wb_3").hide();

		//pet2
		$("#pet2_1").hide();
		$("#pet2_vac1").prop('selectedIndex',0);
		$("#pet2_vac1").attr("disabled", true);
		$("#pet2_1d").hide();
		$("#pet2_1d").attr("disabled", true);

		$("#pet2_re1").hide();
		$("#pet2_reg1").prop('selectedIndex',0);
		$("#pet2_reg1").attr("disabled", true);
		$("#pet2_reg1d").hide();
		$("#pet2_regdate1").attr("disabled", true);

		$("#pet2_2").hide();
		$("#pet2_vac2").prop('selectedIndex',0);
		$("#pet2_vac2").attr("disabled", true);
		$("#pet2_2d").hide();
		$("#pet2_2d").attr("disabled", true);

		$("#pet2_re2").hide();
		$("#pet2_reg2").prop('selectedIndex',0);
		$("#pet2_reg2").attr("disabled", true);
		$("#pet2_reg2d").hide();
		$("#pet2_regdate2").attr("disabled", true);

		$("#pet2_3").hide();
		$("#pet2_vac3").prop('selectedIndex',0);
		$("#pet2_vac3").attr("disabled", true);
		$("#pet2_3d").hide();
		$("#pet2_3d").attr("disabled", true);

		$("#pet2_re3").hide();
		$("#pet2_reg3").prop('selectedIndex',0);
		$("#pet2_reg3").attr("disabled", true);
		$("#pet2_reg3d").hide();
		$("#pet2_regdate3").attr("disabled", true);

		//pet3
		$("#pet3_1").hide();
		$("#pet3_vac1").prop('selectedIndex',0);
		$("#pet3_vac1").attr("disabled", true);
		$("#pet3_1d").hide();
		$("#pet3_1d").attr("disabled", true);

		$("#pet3_re1").hide();
		$("#pet3_reg1").prop('selectedIndex',0);
		$("#pet3_reg1").attr("disabled", true);
		$("#pet3_reg1d").hide();
		$("#pet3_regdate1").attr("disabled", true);

		$("#pet3_2").hide();
		$("#pet3_vac2").prop('selectedIndex',0);
		$("#pet3_vac2").attr("disabled", true);
		$("#pet3_2d").hide();
		$("#pet3_2d").attr("disabled", true);

		$("#pet3_re2").hide();
		$("#pet3_reg2").prop('selectedIndex',0);
		$("#pet3_reg2").attr("disabled", true);
		$("#pet3_reg2d").hide();
		$("#pet3_regdate2").attr("disabled", true);

		$("#pet3_3").hide();
		$("#pet3_vac3").prop('selectedIndex',0);
		$("#pet3_vac3").attr("disabled", true);
		$("#pet3_3d").hide();
		$("#pet3_3d").attr("disabled", true);

		$("#pet3_re3").hide();
		$("#pet3_reg3").prop('selectedIndex',0);
		$("#pet3_reg3").attr("disabled", true);
		$("#pet3_reg3d").hide();
		$("#pet3_regdate3").attr("disabled", true);

	}else if(pet_value == "2"){
		$("#pet1").show();
		$("#pet1_quanti").show();
		$("#pet2").show();
		$("#pet2_quanti").show();
		$("#pet3").hide();
		$("#pet3_type").val("");
		$("#pet3_quanti").hide();
		$("#pet3_quanti_val").val("0");

		//whitebox
		$("#wb_1").show();
		$("#wb_2").show();
		$("#wb_3").hide();

		//pet3
		$("#pet3_1").hide();
		$("#pet3_vac1").prop('selectedIndex',0);
		$("#pet3_vac1").attr("disabled", true);
		$("#pet3_1d").hide();
		$("#pet3_1d").attr("disabled", true);

		$("#pet3_re1").hide();
		$("#pet3_reg1").prop('selectedIndex',0);
		$("#pet3_reg1").attr("disabled", true);
		$("#pet3_reg1d").hide();
		$("#pet3_regdate1").attr("disabled", true);

		$("#pet3_2").hide();
		$("#pet3_vac2").prop('selectedIndex',0);
		$("#pet3_vac2").attr("disabled", true);
		$("#pet3_2d").hide();
		$("#pet3_2d").attr("disabled", true);

		$("#pet3_re2").hide();
		$("#pet3_reg2").prop('selectedIndex',0);
		$("#pet3_reg2").attr("disabled", true);
		$("#pet3_reg2d").hide();
		$("#pet3_regdate2").attr("disabled", true);

		$("#pet3_3").hide();
		$("#pet3_vac3").prop('selectedIndex',0);
		$("#pet3_vac3").attr("disabled", true);
		$("#pet3_3d").hide();
		$("#pet3_3d").attr("disabled", true);

		$("#pet3_re3").hide();
		$("#pet3_reg3").prop('selectedIndex',0);
		$("#pet3_reg3").attr("disabled", true);
		$("#pet3_reg3d").hide();
		$("#pet3_regdate3").attr("disabled", true);

	}else if(pet_value == "3"){
		$("#pet1").show();
		$("#pet1_quanti").show();
		$("#pet2").show();
		$("#pet2_quanti").show();
		$("#pet3").show();
		$("#pet3_quanti").show();

		//whitebox
		$("#wb_1").show();
		$("#wb_2").show();
		$("#wb_3").show();

	}else{
		$("#pet1").hide();
		$("#pet1_type").val("");
		$("#pet1_quanti").hide();
		$("#pet1_quanti_val").val("0");
		$("#pet2").hide();
		$("#pet2_type").val("");
		$("#pet2_quanti").hide();
		$("#pet2_quanti_val").val("0");
		$("#pet3").hide();
		$("#pet3_type").val("");
		$("#pet3_quanti").hide();
		$("#pet3_quanti_val").val("0");

		//registered
		$("#pet1_re1").hide(); //hide registered
		$("#pet1_reg1").prop('selectedIndex',0); //reset select tag
		$("#pet1_reg1").attr("disabled", true); //disabled select tag
		$("#pet1_reg1d").hide(); //hide date
		$("#pet1_regdate1").attr("disabled", true); //disabled date tag

		$("#pet1_re2").hide();
		$("#pet1_reg2").prop('selectedIndex',0);
		$("#pet1_reg2").attr("disabled", true);
		$("#pet1_reg2d").hide();
		$("#pet1_regdate2").attr("disabled", true);

		$("#pet1_re3").hide();
		$("#pet1_reg3").prop('selectedIndex',0);
		$("#pet1_reg3").attr("disabled", true);
		$("#pet1_reg3d").hide();
		$("#pet1_regdate1").attr("disabled", true);

		//whitebox
		$("#wb_1").hide();
		$("#wb_2").hide();
		$("#wb_3").hide();

		//pet1
		$("#pet1_1").hide(); //is vaccinate div
		$("#pet1_vac1").prop('selectedIndex',0); //reset selection
		$("#pet1_vac1").attr("disabled", true); //stops sending data
		$("#pet1_1d").hide(); //date div
		$("#pet1_date1").attr("disabled", true); //date input

		$("#pet1_2").hide();
		$("#pet1_vac2").prop('selectedIndex',0);
		$("#pet1_vac2").attr("disabled", true);
		$("#pet1_2d").hide();
		$("#pet1_date2").attr("disabled", true);
		
		$("#pet1_3").hide();
		$("#pet1_vac3").prop('selectedIndex',0);
		$("#pet1_vac3").attr("disabled", true);
		$("#pet1_3d").hide();
		$("#pet1_date3").attr("disabled", true);

		//pet2
		$("#pet2_1").hide();
		$("#pet2_vac1").prop('selectedIndex',0);
		$("#pet2_vac1").attr("disabled", true);
		$("#pet2_1d").hide();
		$("#pet2_1d").attr("disabled", true);

		$("#pet2_re1").hide(); //hide registered
		$("#pet2_reg1").prop('selectedIndex',0); //reset select tag
		$("#pet2_reg1").attr("disabled", true); //disabled select tag
		$("#pet2_reg1d").hide(); //hide date
		$("#pet2_regdate1").attr("disabled", true); //disabled date tag

		$("#pet2_2").hide();
		$("#pet2_vac2").prop('selectedIndex',0);
		$("#pet2_vac2").attr("disabled", true);
		$("#pet2_2d").hide();
		$("#pet2_2d").attr("disabled", true);

		$("#pet2_re2").hide();
		$("#pet2_reg2").prop('selectedIndex',0);
		$("#pet2_reg2").attr("disabled", true);
		$("#pet2_reg2d").hide();
		$("#pet2_regdate2").attr("disabled", true);

		$("#pet2_3").hide();
		$("#pet2_vac3").prop('selectedIndex',0);
		$("#pet2_vac3").attr("disabled", true);
		$("#pet2_3d").hide();
		$("#pet2_3d").attr("disabled", true);

		$("#pet2_re3").hide();
		$("#pet2_reg3").prop('selectedIndex',0);
		$("#pet2_reg3").attr("disabled", true);
		$("#pet2_reg3d").hide();
		$("#pet2_regdate3").attr("disabled", true);

		//pet3
		$("#pet3_1").hide();
		$("#pet3_vac1").prop('selectedIndex',0);
		$("#pet3_vac1").attr("disabled", true);
		$("#pet3_1d").hide();
		$("#pet3_1d").attr("disabled", true);

		$("#pet3_re1").hide();
		$("#pet3_reg1").prop('selectedIndex',0);
		$("#pet3_reg1").attr("disabled", true);
		$("#pet3_reg1d").hide();
		$("#pet3_regdate1").attr("disabled", true);

		$("#pet3_2").hide();
		$("#pet3_vac2").prop('selectedIndex',0);
		$("#pet3_vac2").attr("disabled", true);
		$("#pet3_2d").hide();
		$("#pet3_2d").attr("disabled", true);

		$("#pet3_re2").hide();
		$("#pet3_reg2").prop('selectedIndex',0);
		$("#pet3_reg2").attr("disabled", true);
		$("#pet3_reg2d").hide();
		$("#pet3_regdate2").attr("disabled", true);

		$("#pet3_3").hide();
		$("#pet3_vac3").prop('selectedIndex',0);
		$("#pet3_vac3").attr("disabled", true);
		$("#pet3_3d").hide();
		$("#pet3_3d").attr("disabled", true);

		$("#pet3_re3").hide();
		$("#pet3_reg3").prop('selectedIndex',0);
		$("#pet3_reg3").attr("disabled", true);
		$("#pet3_reg3d").hide();
		$("#pet3_regdate3").attr("disabled", true);
	}
});

$(".pet1_qty").click(function(){ //pet1 quantity
	var pet1_val = $(this).val();

	if(pet1_val == "1"){
		$("#pet1_1").show();
		$("#pet1_1").removeAttr("disabled");
		$("#pet1_vac1").removeAttr("disabled");

		$("#pet1_re1").show(); //show register div
		$("#pet1_reg1").removeAttr("disabled");  //remove disabled on select tag

		$("#pet1_2").hide();
		$("#pet1_vac2").prop('selectedIndex',0);
		$("#pet1_vac2").attr("disabled", true);
		$("#pet1_2d").hide();
		$("#pet1_date2").attr("disabled", true);

		$("#pet1_re2").hide(); //hide register div
		$("#pet1_reg2").prop('selectedIndex',0); //reset select tag
		$("#pet1_reg2").attr("disabled", true); //disable select tag
		$("#pet1_reg2d").hide();//hide date div
		$("#pet1_regdate2").attr("disabled", true); //disable date input

		$("#pet1_3").hide();
		$("#pet1_vac3").prop('selectedIndex',0);
		$("#pet1_vac3").attr("disabled", true);
		$("#pet1_3d").hide();
		$("#pet1_date3").attr("disabled", true);

		$("#pet1_re3").hide(); //hide register div
		$("#pet1_reg3").prop('selectedIndex',0); //reset select tag
		$("#pet1_reg3").attr("disabled", true); //disable select tag
		$("#pet1_reg3d").hide();//hide date div
		$("#pet1_regdate3").attr("disabled", true); //disable date input

	}else if(pet1_val == "2"){
		$("#pet1_1").show();
		$("#pet1_1").removeAttr("disabled");
		$("#pet1_vac1").removeAttr("disabled");

		$("#pet1_re1").show(); //show register div
		$("#pet1_reg1").removeAttr("disabled");  //remove disabled on select tag

		$("#pet1_2").show();
		$("#pet1_2").removeAttr("disabled");
		$("#pet1_vac2").removeAttr("disabled");
		$("#pet1_reg2").removeAttr("disabled");

		$("#pet1_re2").show();
		$("#pet1_reg2").removeAttr("disabled");

		$("#pet1_3").hide();
		$("#pet1_vac3").prop('selectedIndex',0);
		$("#pet1_vac3").attr("disabled", true);
		$("#pet1_3d").hide();
		$("#pet1_date3").attr("disabled", true);

		$("#pet1_re3").hide(); //hide register div
		$("#pet1_reg3").prop('selectedIndex',0); //reset select tag
		$("#pet1_reg3").attr("disabled", true); //disable select tag
		$("#pet1_reg3d").hide();//hide date div
		$("#pet1_regdate3").attr("disabled", true); //disable date input
		
	}else if(pet1_val == "3"){
		$("#pet1_1").show();
		$("#pet1_1").removeAttr("disabled");
		$("#pet1_vac1").removeAttr("disabled");

		$("#pet1_re1").show(); //show register div
		$("#pet1_reg1").removeAttr("disabled");  //remove disabled on select tag

		$("#pet1_2").show();
		$("#pet1_2").removeAttr("disabled");
		$("#pet1_vac2").removeAttr("disabled");

		$("#pet1_re2").show();
		$("#pet1_reg2").removeAttr("disabled");

		$("#pet1_3").show();
		$("#pet1_3").removeAttr("disabled");
		$("#pet1_vac3").removeAttr("disabled");

		$("#pet1_re3").show();
		$("#pet1_reg3").removeAttr("disabled");

	}else{
		$("#pet1_1").hide(); //is vaccinate div
		$("#pet1_vac1").prop('selectedIndex',0); //reset selection
		$("#pet1_vac1").attr("disabled", true); //stops sending data
		$("#pet1_1d").hide(); //date div
		$("#pet1_date1").attr("disabled", true); //date input

		$("#pet1_re1").hide(); //hide registered
		$("#pet1_reg1").prop('selectedIndex',0); //reset select tag
		$("#pet1_reg1").attr("disabled", true); //disabled select tag
		$("#pet1_reg1d").hide(); //hide date
		$("#pet1_regdate1").attr("disabled", true); //disabled date tag

		$("#pet1_2").hide();
		$("#pet1_vac2").prop('selectedIndex',0);
		$("#pet1_vac2").attr("disabled", true);
		$("#pet1_2d").hide();
		$("#pet1_date2").attr("disabled", true);

		$("#pet1_re2").hide();
		$("#pet1_reg2").prop('selectedIndex',0);
		$("#pet1_reg2").attr("disabled", true);
		$("#pet1_reg2d").hide();
		$("#pet1_regdate2").attr("disabled", true);
		
		$("#pet1_3").hide();
		$("#pet1_vac3").prop('selectedIndex',0);
		$("#pet1_vac3").attr("disabled", true);
		$("#pet1_3d").hide();
		$("#pet1_date3").attr("disabled", true);

		$("#pet1_re3").hide();
		$("#pet1_reg3").prop('selectedIndex',0);
		$("#pet1_reg3").attr("disabled", true);
		$("#pet1_reg3d").hide();
		$("#pet1_regdate1").attr("disabled", true);

	}
});

$(".pet1_vac1").click(function(){ //pet1 of 1 vaccinated

	var pet1_vac1 = $(this).val();

	if(pet1_vac1 == "" || pet1_vac1 == "No"){
		$("#pet1_1d").hide();
		$("#pet1_date1").attr("disabled", true);
	}else{
		$("#pet1_1d").show();
		$("#pet1_date1").removeAttr("disabled");
	}
})

$(".pet1_reg1").click(function(){ //pet1 of 1 registered

	var pet1_reg1 = $(this).val();

	if(pet1_reg1 == "" || pet1_reg1 == "No"){
		$("#pet1_reg1d").hide();
		$("#pet1_regdate1").attr("disabled", true);
	}else{
		$("#pet1_reg1d").show();
		$("#pet1_regdate1").removeAttr("disabled");
	}
});

$(".pet1_vac2").click(function(){ //pet1 of 2 vaccinated
	var pet1_vac2 = $(this).val();

	if(pet1_vac2 == "" || pet1_vac2 == "No"){
		$("#pet1_2d").hide();
		$("#pet1_date2").attr("disabled", true);
	}else{
		$("#pet1_2d").show();
		$("#pet1_date2").removeAttr("disabled");
	}
});

$(".pet1_reg2").click(function(){ //pet1 of 2 registered

var pet1_reg2 = $(this).val();

if(pet1_reg2 == "" || pet1_reg2 == "No"){
	$("#pet1_reg2d").hide();
	$("#pet1_regdate2").attr("disabled", true);
}else{
	$("#pet1_reg2d").show();
	$("#pet1_regdate2").removeAttr("disabled");
}
});

$(".pet1_vac3").click(function(){ //pet1 of 3 vaccinated
	var pet1_vac2 = $(this).val();

	if(pet1_vac2 == "" || pet1_vac2 == "No"){
		$("#pet1_3d").hide();
		$("#pet1_date3").attr("disabled", true);
	}else{
		$("#pet1_3d").show();
		$("#pet1_date3").removeAttr("disabled");
	}
});


$(".pet1_reg3").click(function(){ //pet1 of 3 registered

var pet1_reg3 = $(this).val();

if(pet1_reg3 == "" || pet1_reg3 == "No"){
	$("#pet1_reg3d").hide();
	$("#pet1_regdate3").attr("disabled", true);
}else{
	$("#pet1_reg3d").show();
	$("#pet1_regdate3").removeAttr("disabled");
}
});

$(".pet2_qty").click(function(){ //pet2 quantity
	var pet2_val = $(this).val();

	if(pet2_val == "1"){
		$("#pet2_1").show();
		$("#pet2_vac1").removeAttr("disabled");

		$("#pet2_re1").show(); //show register div
		$("#pet2_reg1").removeAttr("disabled");  //remove disabled on select tag

		$("#pet2_2").hide();
		$("#pet2_vac2").prop('selectedIndex',0);
		$("#pet2_vac2").attr("disabled", true);
		$("#pet2_2d").hide();
		$("#pet2_2d").attr("disabled", true);

		$("#pet2_re2").hide(); //hide register div
		$("#pet2_reg2").prop('selectedIndex',0); //reset select tag
		$("#pet2_reg2").attr("disabled", true); //disable select tag
		$("#pet2_reg2d").hide();//hide date div
		$("#pet2_regdate2").attr("disabled", true); //disable date input

		$("#pet2_3").hide();
		$("#pet2_vac3").prop('selectedIndex',0);
		$("#pet2_vac3").attr("disabled", true);
		$("#pet2_3d").hide();
		$("#pet2_3d").attr("disabled", true);

		$("#pet2_re3").hide(); //hide register div
		$("#pet2_reg3").prop('selectedIndex',0); //reset select tag
		$("#pet2_reg3").attr("disabled", true); //disable select tag
		$("#pet2_reg3d").hide();//hide date div
		$("#pet2_regdate3").attr("disabled", true); //disable date input

	}else if(pet2_val == "2"){
		$("#pet2_1").show();
		$("#pet2_vac1").removeAttr("disabled");

		$("#pet2_re1").show(); //show register div
		$("#pet2_reg1").removeAttr("disabled");  //remove disabled on select tag

		$("#pet2_2").show();
		$("#pet2_vac2").removeAttr("disabled");

		$("#pet2_re2").show();
		$("#pet2_reg2").removeAttr("disabled");

		$("#pet2_3").hide();
		$("#pet2_vac3").prop('selectedIndex',0);
		$("#pet2_vac3").attr("disabled", true);
		$("#pet2_3d").hide();
		$("#pet2_3d").attr("disabled", true);

		$("#pet2_re3").hide(); //hide register div
		$("#pet2_reg3").prop('selectedIndex',0); //reset select tag
		$("#pet2_reg3").attr("disabled", true); //disable select tag
		$("#pet2_reg3d").hide();//hide date div
		$("#pet2_regdate3").attr("disabled", true); //disable date input

	}else if(pet2_val == "3"){
		$("#pet2_1").show();
		$("#pet2_vac1").removeAttr("disabled");

		$("#pet2_re1").show(); //show register div
		$("#pet2_reg1").removeAttr("disabled");  //remove disabled on select tag

		$("#pet2_2").show();
		$("#pet2_vac2").removeAttr("disabled");

		$("#pet2_re2").show();
		$("#pet2_reg2").removeAttr("disabled");

		$("#pet2_3").show();
		$("#pet2_vac3").removeAttr("disabled");

		$("#pet2_re3").show();
		$("#pet2_reg3").removeAttr("disabled");

	}else{
		$("#pet2_1").hide();
		$("#pet2_vac1").prop('selectedIndex',0);
		$("#pet2_vac1").attr("disabled", true);
		$("#pet2_1d").hide();
		$("#pet2_1d").attr("disabled", true);

		$("#pet2_re1").hide(); //hide registered
		$("#pet2_reg1").prop('selectedIndex',0); //reset select tag
		$("#pet2_reg1").attr("disabled", true); //disabled select tag
		$("#pet2_reg1d").hide(); //hide date
		$("#pet2_regdate1").attr("disabled", true); //disabled date tag

		$("#pet2_2").hide();
		$("#pet2_vac2").prop('selectedIndex',0);
		$("#pet2_vac2").attr("disabled", true);
		$("#pet2_2d").hide();
		$("#pet2_2d").attr("disabled", true);

		$("#pet2_re2").hide();
		$("#pet2_reg2").prop('selectedIndex',0);
		$("#pet2_reg2").attr("disabled", true);
		$("#pet2_reg2d").hide();
		$("#pet2_regdate2").attr("disabled", true);

		$("#pet2_3").hide();
		$("#pet2_vac3").prop('selectedIndex',0);
		$("#pet2_vac3").attr("disabled", true);
		$("#pet2_3d").hide();
		$("#pet2_3d").attr("disabled", true);

		$("#pet2_re3").hide();
		$("#pet2_reg3").prop('selectedIndex',0);
		$("#pet2_reg3").attr("disabled", true);
		$("#pet2_reg3d").hide();
		$("#pet2_regdate3").attr("disabled", true);
	}
});

$(".pet2_vac1").click(function(){
	var pet2_vac1 = $(this).val();

	if(pet2_vac1 == "" || pet2_vac1 == "No"){
		$("#pet2_1d").hide();
		$("#pet2_date1").attr("disabled", true);
	}else{
		$("#pet2_1d").show();
		$("#pet2_date1").removeAttr("disabled");
	}
});

$(".pet2_reg1").click(function(){
	var pet2_reg1 = $(this).val();

	if(pet2_reg1 == "" || pet2_reg1 == "No"){
		$("#pet2_reg1d").hide();
		$("#pet2_regdate1").attr("disabled", true);
	}else{
		$("#pet2_reg1d").show();
		$("#pet2_regdate1").removeAttr("disabled");
	}
});

$(".pet2_vac2").click(function(){
	var pet2_vac2 = $(this).val();

	if(pet2_vac2 == "" || pet2_vac2 == "No"){
		$("#pet2_2d").hide();
		$("#pet2_date2").attr("disabled", true);
	}else{
		$("#pet2_2d").show();
		$("#pet2_date2").removeAttr("disabled");
	}
});

$(".pet2_reg2").click(function(){
	var pet2_reg2 = $(this).val();

	if(pet2_reg2 == "" || pet2_reg2 == "No"){
		$("#pet2_reg2d").hide();
		$("#pet2_regdate2").attr("disabled", true);
	}else{
		$("#pet2_reg2d").show();
		$("#pet2_regdate2").removeAttr("disabled");
	}
});

$(".pet2_vac3").click(function(){
	var pet2_vac3 = $(this).val();

	if(pet2_vac3 == "" || pet2_vac3 == "No"){
		$("#pet2_3d").hide();
		$("#pet2_date3").attr("disabled", true);
	}else{
		$("#pet2_3d").show();
		$("#pet2_date3").removeAttr("disabled");
	}
});

$(".pet2_reg3").click(function(){
	var pet2_reg3 = $(this).val();

	if(pet2_reg3 == "" || pet2_reg3 == "No"){
		$("#pet2_reg3d").hide();
		$("#pet2_regdate3").attr("disabled", true);
	}else{
		$("#pet2_reg3d").show();
		$("#pet2_regdate3").removeAttr("disabled");
	}
});

$(".pet3_qty").click(function(){ //pet3 quantity
	var pet1_val = $(this).val();

	if(pet1_val == "1"){
		$("#pet3_1").show();
		$("#pet3_vac1").removeAttr("disabled");

		$("#pet3_re2").show();
		$("#pet3_reg2").removeAttr("disabled");

		$("#pet3_2").hide();
		$("#pet3_vac2").prop('selectedIndex',0);
		$("#pet3_vac2").attr("disabled", true);
		$("#pet3_2d").hide();
		$("#pet3_2d").attr("disabled", true);

		$("#pet3_re2").hide();
		$("#pet3_reg2").prop('selectedIndex',0);
		$("#pet3_reg2").attr("disabled", true);
		$("#pet3_reg2d").hide();
		$("#pet3_regdate2").attr("disabled", true);

		$("#pet3_3").hide();
		$("#pet3_vac3").prop('selectedIndex',0);
		$("#pet3_vac3").attr("disabled", true);
		$("#pet3_3d").hide();
		$("#pet3_3d").attr("disabled", true);

		$("#pet3_re3").hide();
		$("#pet3_reg3").prop('selectedIndex',0);
		$("#pet3_reg3").attr("disabled", true);
		$("#pet3_reg3d").hide();
		$("#pet3_regdate3").attr("disabled", true);

	}else if(pet1_val == "2"){
		$("#pet3_1").show();
		$("#pet3_vac1").removeAttr("disabled");

		$("#pet3_re1").show();
		$("#pet3_reg1").removeAttr("disabled");

		$("#pet3_2").show();
		$("#pet3_vac2").removeAttr("disabled");

		$("#pet3_re2").show();
		$("#pet3_reg2").removeAttr("disabled");

		$("#pet3_3").hide();
		$("#pet3_vac3").prop('selectedIndex',0);
		$("#pet3_vac3").attr("disabled", true);
		$("#pet3_3d").hide();
		$("#pet3_3d").attr("disabled", true);

		$("#pet3_re3").hide();
		$("#pet3_reg3").prop('selectedIndex',0);
		$("#pet3_reg3").attr("disabled", true);
		$("#pet3_reg3d").hide();
		$("#pet3_regdate3").attr("disabled", true);

	}else if(pet1_val == "3"){
		$("#pet3_1").show();
		$("#pet3_vac1").removeAttr("disabled");

		$("#pet3_re1").show();
		$("#pet3_reg1").removeAttr("disabled");

		$("#pet3_2").show();
		$("#pet3_vac2").removeAttr("disabled");

		$("#pet3_re2").show();
		$("#pet3_reg2").removeAttr("disabled");

		$("#pet3_3").show();
		$("#pet3_vac3").removeAttr("disabled");

		$("#pet3_re3").show();
		$("#pet3_reg3").removeAttr("disabled");

	}else{
		//pet3
		$("#pet3_1").hide();
		$("#pet3_vac1").prop('selectedIndex',0);
		$("#pet3_vac1").attr("disabled", true);
		$("#pet3_1d").hide();
		$("#pet3_1d").attr("disabled", true);

		$("#pet3_re1").hide();
		$("#pet3_reg1").prop('selectedIndex',0);
		$("#pet3_reg1").attr("disabled", true);
		$("#pet3_reg1d").hide();
		$("#pet3_regdate1").attr("disabled", true);

		$("#pet3_2").hide();
		$("#pet3_vac2").prop('selectedIndex',0);
		$("#pet3_vac2").attr("disabled", true);
		$("#pet3_2d").hide();
		$("#pet3_2d").attr("disabled", true);

		$("#pet3_re2").hide();
		$("#pet3_reg2").prop('selectedIndex',0);
		$("#pet3_reg2").attr("disabled", true);
		$("#pet3_reg2d").hide();
		$("#pet3_regdate2").attr("disabled", true);

		$("#pet3_3").hide();
		$("#pet3_vac3").prop('selectedIndex',0);
		$("#pet3_vac3").attr("disabled", true);
		$("#pet3_3d").hide();
		$("#pet3_3d").attr("disabled", true);

		$("#pet3_re3").hide();
		$("#pet3_reg3").prop('selectedIndex',0);
		$("#pet3_reg3").attr("disabled", true);
		$("#pet3_reg3d").hide();
		$("#pet3_regdate3").attr("disabled", true);
		
	}
});

$(".pet3_vac1").click(function(){
	var pet3_vac1 = $(this).val();

	if(pet3_vac1 == "" || pet3_vac1 == "No"){
		$("#pet3_1d").hide();
		$("#pet3_date1").attr("disabled", true);
	}else{
		$("#pet3_1d").show();
		$("#pet3_date1").removeAttr("disabled");
	}
});

$(".pet3_reg1").click(function(){ //pet1 of 3 registered

var pet3_reg1 = $(this).val();

if(pet3_reg1 == "" || pet3_reg1 == "No"){
	$("#pet3_reg1d").hide();
	$("#pet3_regdate1").attr("disabled", true);
}else{
	$("#pet3_reg1d").show();
	$("#pet3_regdate1").removeAttr("disabled");
}
});

$(".pet3_vac2").click(function(){
	var pet3_vac2 = $(this).val();

	if(pet3_vac2 == "" || pet3_vac2 == "No"){
		$("#pet3_2d").hide();
		$("#pet3_date2").attr("disabled", true);
	}else{
		$("#pet3_2d").show();
		$("#pet3_date2").removeAttr("disabled");
	}
});

$(".pet3_reg2").click(function(){ //pet1 of 3 registered

var pet3_reg2 = $(this).val();

if(pet3_reg2 == "" || pet3_reg2 == "No"){
	$("#pet3_reg2d").hide();
	$("#pet3_regdate2").attr("disabled", true);
}else{
	$("#pet3_reg2d").show();
	$("#pet3_regdate2").removeAttr("disabled");
}
});

$(".pet3_vac3").click(function(){
	var pet3_vac3 = $(this).val();

	if(pet3_vac3 == "" || pet3_vac3 == "No"){
		$("#pet3_3d").hide();
		$("#pet3_date3").attr("disabled", true);
	}else{
		$("#pet3_3d").show();
		$("#pet3_date3").removeAttr("disabled");
	}
});

$(".pet3_reg3").click(function(){ //pet1 of 3 registered

var pet3_reg3 = $(this).val();

if(pet3_reg3 == "" || pet3_reg3 == "No"){
	$("#pet3_reg3d").hide();
	$("#pet3_regdate3").attr("disabled", true);
}else{
	$("#pet3_reg3d").show();
	$("#pet3_regdate3").removeAttr("disabled");
}
});


$(".religion_sel").click(function(){

	var religion_val = $(this).val();

	if(religion_val == "Others"){
		$("#other_rel").show();
	}else{
		$("#other_rel").hide();
		$("#other_rel").val("");
	}
});
	
</script>