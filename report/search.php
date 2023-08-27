<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$userId = $_SESSION['user_id'];

	$users = $conn->prepare("SELECT * FROM bs_user WHERE user_id = '$userId'");
	$users->execute();
	$users_data = $users->fetch();
	
	if(isset($_POST['id'])){
		$reportId = $_POST['id'];
	}else{
		$reportId = $_GET['id']; // Get report id
	}
	# Get report details from db
	$sql = $conn->prepare("SELECT * FROM bs_report WHERE uid = '$reportId'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
<head>
<style rel="stylesheet">
th
{   
   color: #000 !important;
   font-family: Arial !important;
   font-weight: bold !important;
   font-size:13px !important;
}
td
{   
   color: #666666 !important;
   font-family: Arial !important;  
   font-size:12px !important;
}
.txt_bx {
	border-bottom:solid 2px #666600;
	border-top:solid 2px #666600;
	border-left:solid 2px #666600;
	border-right:solid 2px #666600;
	width:127px;
}
.data {
	font-size:13px;
	color:#000000;
}
</style>
</head>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php'">Back</button>
  </div>
</div>
<br>
	<?php
		if($errorMessage == 'No data on this category. Please choose another category!')
		{
	?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
				<b><?php echo $errorMessage; ?></b>
			</div>
	<?php
		}else if($errorMessage == 'No data on this category. Please choose a different Option!')
		{
	?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
				<b><?php echo $errorMessage; ?></b>
			</div>
	<?php
		}else if($errorMessage == 'Please Select Dates.')
		{
	?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
				<b><?php echo $errorMessage; ?></b>
			</div>
	<?php
		}else if($errorMessage == 'Please Select Dates From.')
		{
	?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
				<b><?php echo $errorMessage; ?></b>
			</div>
	<?php
		}else if($errorMessage == 'Please Select Dates To.')
		{
	?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
				<b><?php echo $errorMessage; ?></b>
			</div>
	<?php
		}else if($errorMessage == 'No data on this report.')
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
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Report - <?php echo $sql_data['name']; ?></h3>
				<p class="text-muted m-b-30">Search Record</p>
				<div class="table-responsive">
					<form class="form-horizontal" method="post" action="<?php echo $sql_data['page']; ?>.php" target=_new name="frm" id="frm">		
						<table style="border:solid 0px #000000; width:100%;">						
						<tbody>
							<tr>							
								<td class="data">
									<?php if($reportId != 'b8c37e33defde51cf91e1e03e51657da'){ ?>
										<b>From :</b> <input type="date" class="txt_bx" id="date_from" name="dfrom" value="<?php echo $newfrom; ?>" autocomplete=off required />
										&nbsp;&nbsp;
										<b>To :</b> <input type="date" class="txt_bx" id="date_to" name="dto" value="<?php echo $newto; ?>" autocomplete=off required />
										&nbsp;&nbsp;
									<?php }else{} ?>
										<?php if($reportId == '6b180037abbebea991d8b1232f8a8ca9'){ ?>
											<b>Type :</b>
											<select name="ctype" class="select2" id="cert_type" style="width:170px; border:solid 2px #666600;">
												<option value="0">All</option>
												<?php
													$typ = $conn->prepare("SELECT * FROM tbl_certificate WHERE is_deleted != '1' ORDER BY cer_name");
													$typ->execute();
													if($typ->rowCount() > 0)
													{
														while($typ_data = $typ->fetch())
														{
												?>														
															<option value="<?php echo $typ_data['cer_id']; ?>"><?php echo $typ_data['cer_name']; ?></option>
												<?php
														} // End While
													}else{}
												?>
											</select>
											&nbsp;&nbsp;
										<?php }else{} ?>
										
										<?php if($reportId == 'b8c37e33defde51cf91e1e03e51657da'){ ?>
											<b>Type :</b>
											<select name="ctype" class="rtype" id="resbus" style="width:170px; border:solid 2px #666600;">
												<!--<option value="1">Barangay Records Summary</option>!-->
												<?php
													if($users_data['is_business_access'] == 1){
												?>
													<option id="business" value="2">Business Establishment</option>
													<option id="resident" value="3">Resident List</option>
												<?php
													}else if($users_data['is_resident_access'] == 1){
												?>
													<option id="resident" value="3">Resident List</option>
													<option id="business" value="2">Business Establishment</option>
												<?php
													}
												?>
											</select>
											<br /><br />
											<div id="cust_name" style=" display:none;">
												<b>Option :</b>
												<select name="rtype" id="rtype" class="category" style="width:170px; border:solid 2px #666600;">
													<option value="0">All</option>
													<option value="1">Kasambahay</option>
													<option value="2">OFW</option>
													<option value="3">Head of the Family</option>
													<option value="4">Member of the Family</option>
													<option value="5">Registered Voter</option>
													<option value="6">Non Registered Voter</option>
													<option value="7">Solo Parent</option>
													<option value="8">Erpat</option>
													<option value="9">Kababaihan</option>
													<option value="10">PWD</option>
													<option value="11">4p's</option>
													<option value="12">Indigenous People</option>
													<option value="13">Informal Settler</option>
													<option value="14">Senior</option>
													<option value="15">Male</option>
													<option value="16">Female</option>
													<option value="17">Unemployed</option>
													<option value="18">Out of School Youth</option>
													<option value="19">LGBTQ+</option>
													<option value="20">Pet Owner</option>
													<option value="21">Maynilad (Own Meter)</option>
													<option value="22">Meralco (Own Meter)</option>
													<option value="23">Septic Tank</option>
													<option value="24">Infant 0 to 1 Years old</option>
													<option value="25">Toddler 2 to 4 Years old</option>
													<option value="26">Child 5 to 12 Years old</option>
													<option value="27">Teen 13 to 19 Years old</option>
													<option value="28">Adult 20 to 39 Years old</option>
													<option value="29">Middle Aged Adult 40 to 59 Years old</option>
													<option value="30">Senior</option>
													<option value="31">Deceased</option>
													<option value="32">Danger Zone</option>
												</select>
												<br /><br /><br /><br />
											</div>
											<div id="filters" style="display:none;">
												<label style="color:black;"><b>Choose Column(s) to Include:</b></label>
												<table>
													<td><label for="suffix">Suffix:&nbsp;</label><select name="suffix" id="suffix"><option value="No">No</option><option value="Yes">Yes</option></select></td>
													<td style="width:20px;"></td>
													<td><label for="gender">Gender:&nbsp;</label><select name="gender" id="gender" ><option value="No">No</option><option value="Yes">Yes</option></select></td>
													<td style="width:20px;"></td>
													<td><label for="age">Age:&nbsp;</label><select name="age" id="age"><option value="No">No</option><option value="Yes">Yes</option></select></td>
													<td style="width:20px;"></td>
													<td><label for="address">Address:&nbsp;</label><select name="address" id="address"><option value="No">No</option><option value="Yes">Yes</option></select></td>
													<td style="width:20px;"></td>
													<td><label for="contact">Contact No.:&nbsp;</label><select name="contact" id="contact"><option value="No">No</option><option value="Yes">Yes</option></select></td>
													<td style="width:20px;"></td>
													<td><label for="civil_stat">Civil Status:&nbsp;</label><select name="civil_stat" id="civil_stat"><option value="No">No</option><option value="Yes">Yes</option></select></td>
													<td style="width:20px;"></td>
													<td><label for="cso">CSO:&nbsp;</label><select name="cso" id="cso"><option value="No">No</option><option value="Yes">Yes</option></select></td>
													<td style="width:20px;"></td>
													<td><label for="ngo">NGO:&nbsp;</label><select name="ngo" id="ngo"><option value="No">No</option><option value="Yes">Yes</option></select></td>
													<td style="width:20px;"></td>
													<td><label for="transport_group">Transport Group:&nbsp;</label><select name="transport_group" id="transport_group"><option value="No">No</option><option value="Yes">Yes</option></select></td>
													<td style="width:20px;"></td>
													<td><label for="house_structure">House Structure:&nbsp;</label><select name="house_structure" id="house_structure"><option value="No">No</option><option value="Yes">Yes</option></select></td>
												</table>
											</div>
											&nbsp;&nbsp;
											<br /><br />
										<?php }else{} ?>
									<button type="submit" name="submit" class="btn btn-success waves-effect waves-light btn-xs" >Submit</button>
									<button type="button" id="excel" name="excel" class="btn btn-success waves-effect waves-light btn-xs" > Convert to Excel</button>
								</td>
							</tr>
						</tbody>
						</table>
					</form>
					
				</div>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
	var resident_access = "<?php echo $users_data['is_resident_access']?>";
	var business_access = "<?php echo $users_data['is_business_access']?>";

	//sets buttons
	var excel_btn = document.getElementById("excel");
	var pdf_btn = document.getElementById("pdf");

	var value_checked;
	var rtype;
	var category_val;

	var report_id = "<?php echo $reportId; ?>";

	console.log(report_id);

	var report_id_arr = [["766d856ef1a6b02f93d894415e6bfa0e", "blotter"], ["298923c8190045e91288b430794814c4", "inventory"], ["08fe2621d8e716b02ec0da35256a998d", "medical"], ["5d616dd38211ebb5d6ec52986674b6e4", "vehicle_log"], ["766d856ef1a6b02f93d894415e6bgb0e", "vawc"], ["766d856ef1a6b02f93d894415f7bgb0e", "bcpc"], ["766d856ef1a6b13f93d894415f7bgb0e", "lupon"], ["766e956ef1a6b13f93d894415f7bgb0e", "badac"], ["766e956ef1a6b13f93d894415f7bgb0c", "medicine"], ["766e956ef1a6b13f93d894415f7bgb0f", "borrow"], ["766e956ef1a6b13f93d894415f7bgb0w", "minutes"], ["766e956ef1a6b13f93d894415f7bgb0r", "covid"], ["766e956ef1a6b13f93d894415f7bgb0k", "facilities"], ["766e956ef1a6b13f93d894415f7bgblkp", "develop"], ["766e956ef1a6b13f93d894415f7bhcmkp", "resolution"], ["766e956ef2b7b13f93d894415f7bhcmkp", "ordinance"], ["766e845ef2b7b13f93d894415f7bhcmkp", "executive"], ["877e956ef2b7b13f93d894415f7bhcmkp", "rescue"]];

	if(resident_access == 1 && business_access == 1){
		$("#resident").show();
		$("#resident").removeAttr("disabled");
		$("#business").show();
		$("#business").removeAttr("disabled");
	}else{
		if(resident_access == 0){
			$("#resident").hide();
			$("#resident").attr("disabled", true);
		}else{
			$("#resident").show();
			$("#resident").removeAttr("disabled");
			$("#cust_name").show();
			$("#filters").show();
		}

		if(business_access == 0){
			$("#business").hide();
			$("#business").attr("disabled", true);
		}else{
			$("#business").show();
			$("#business").removeAttr("disabled");
		}
	}


	$(".rtype").click(function(){


			value_checked = $(this).val();
			
			if(value_checked == "3"){
				$("#cust_name").show();
				$("#filters").show();
			}
			else{
				$("#cust_name").hide();
				$("#filters").hide();
			}
			
			if(value_checked == "2"){
				$("#cust_name").hide();
			}
			else{
				$("#cust_name").show();
			}
			
	});

	// for pets in resident(demographic)
	$(".category").click(function(){

		category_val = $(this).val();

		if(category_val == "20"){
			$("#filters").hide();
		}else {
			$("#filters").show();
		}
	});
	



	excel_btn.addEventListener("click", excel_export);

	//EXCEL EXPORT
	function excel_export(){
		if(report_id == "b8c37e33defde51cf91e1e03e51657da"){
			rtype = document.getElementById("rtype").value;
			ctype = document.getElementById("resbus").value;

			if(typeof ctype !== 'undefined'){
				if(ctype == 2){
					window.location.href="excel_process_report.php?ctype=" + ctype;
				}else if(ctype == 3){
					window.location.href="excel_process_report.php?ctype=" + ctype + "&rtype=" + rtype;
				}else{

				}
			}else{
				window.location.href="excel_process_report.php?ctype=" + ctype;
			}
		}else if(report_id == "6b180037abbebea991d8b1232f8a8ca9"){
			var date_from = document.getElementById("date_from").value;
			var date_to = document.getElementById("date_to").value;
			var cert_type = document.getElementById("cert_type").value;

			window.location.href = "certificate_excel_report.php?ctype=" + cert_type + "&dfrom=" + date_from + "&dto=" + date_to + "&report_id=" + report_id;
		}else{
			for(var i = 0; i < 18; i++){
				if(report_id_arr[i][0] === report_id){
					var date_from = document.getElementById("date_from").value;
					var date_to = document.getElementById("date_to").value;

					var report_name = report_id_arr[i][1];

					console.log(report_name);

					window.location.href = report_name + "_excel_report.php?dfrom=" + date_from + "&dto=" + date_to + "&report_id=" + report_id;
				}
			}
		}
	}
</script>