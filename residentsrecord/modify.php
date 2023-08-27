<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE uid = '$id' AND is_deleted != '1'");
	$sql->execute();
	$sql_data = $sql->fetch();

?>

	<div class="row">
		<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
			<div class="col-md-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Resident Information</h3>
					<p class="text-muted m-b-30 font-13"> Modify Resident </p>
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
							}else if($errorMessage == 'Modified successfully')
							{
						?>							
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
									<b><?php echo $errorMessage; ?></b>
								</div>
						<?php								
							}else{}
						?>
					
					<!--<ul class="nav nav-tabs tabs customtab">
						<li class="active tab">
							<a href="#personal" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Personal Info</span> </a>
						</li>
						<li class="tab">
							<a href="#education" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-book"></i></span> <span class="hidden-xs">Education Info</span> </a>
						</li>
						<li class="tab">
							<a href="#work" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-cubes"></i></span> <span class="hidden-xs">Work Info</span> </a>
						</li>						
						<li class="tab">
							<a href="#others" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Other Info</span> </a>
						</li>
					</ul>!-->		
					
					<div class="tab-content">
						<div class="tab-pane active" id="personal">
							<div class="steamline">
								<?php include 'info/modify_personal.php'; ?>								
							</div>
						</div>
						<div class="tab-pane" id="education">
							<div class="steamline">
								<?php include 'info/modify_education.php'; ?>								
							</div>
						</div>
						<div class="tab-pane" id="work">
							<div class="steamline">
								<?php include 'info/modify_work.php'; ?>								
							</div>
						</div>						
						<div class="tab-pane" id="others">
							<div class="steamline">
								<?php include 'info/modify_other.php'; ?>
							</div>
						</div>
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
	

<?php
if($sql_data['is_kasambahay'] != 1){
?>
<script type="text/javascript">

$(".cat").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "1"){ //head of the family
			$("#cust_name").show();
			$("#relationship").hide();
			$("#hrof").attr("disabled", true);
		}
		else{
			$("#cust_name").hide();
		}
		
		if(value_checked == "0"){ //member
			$("#cust_name2").show();
			$("#relationship").show();
			$("#hrof").removeAttr("disabled");
		}
		else{
			$("#cust_name2").hide();
		}
});

	$(".kas").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "0"){
			$("#kas_name").show();
		}
		else{
			$("#kas_name").hide();
		}
		
		if(value_checked == "1"){
			$("#kas_name").hide();
		}
		else{
			$("#kas_name").show();
		}
		
});

</script>
<?php
} else {
?>
<script type="text/javascript">

	$(".kas").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "0"){
			$("#kas_name").hide();
		}
		else{
			$("#kas_name").show();
		}
		
		if(value_checked == "1"){
			$("#kas_name").show();
		}
		else{
			$("#kas_name").hide();
		}
		
});

</script>
<?php
}
?>
<?php
if($sql_data['is_head_of_family'] != 1){
?>
<script type="text/javascript">

	$(".cat").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "1"){ //head of the family
			$("#cust_name").show();
			$("#relationship").hide();
			$("#hrof").attr("disabled", true);
		}
		else{
			$("#cust_name").hide();
		}
		
		if(value_checked == "0"){ //member
			$("#cust_name2").show();
			$("#relationship").show();
			$("#hrof").removeAttr("disabled");
		}
		else{
			$("#cust_name2").hide();
		}
});

</script>
<?php
} else {
?>

<script type="text/javascript">

	$(".cat").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "0"){
			$("#cust_name2").show();
		}
		else{
			$("#cust_name2").hide();
		}
		
		if(value_checked == "1"){
			$("#cust_name2").hide();
		}
		else{
			$("#cust_name2").show();
		}
		
});

</script>
<?php
}
?>
<script type="text/javascript">
	$(".vitals").click(function(){

		var value_checked = $(this).val();

		if(value_checked == "Deceased"){
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

	$(".sc").click(function(){


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