<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_document_request WHERE dr_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();

	$death_day = date("d", strtotime($sql_data['date_death']));
	$death_month = date("F", strtotime($sql_data['date_death']));
	$death_year = date("Y", strtotime($sql_data['date_death']));

	$time1 = $sql_data['time1'];
	$time2 = $sql_data['time2'];

	//change the format compatible with input type time
	$time1_formatted = date("H:i", strtotime($time1));
	$time2_formatted = date("H:i", strtotime($time2));

	$ddeath = $death_year . " " . $death_day . ", " . $death_year;
	
	$cerid = $sql_data['cer_id']; //Gets Certificate ID

	$cer = $conn->prepare("SELECT * FROM tbl_certificate WHERE cer_id = '$cerid'");
	$cer->execute();
	$cer_data = $cer->fetch();

	$cert_name = $cer_data['cer_name']; //Gets Certificate name

	//checks if column purpose empty or not
	if($sql_data['purpose'] === ""){
		$purpose = "-- --";
	}else{
		$purpose = $sql_data['purpose'];
	}

	//checks if column position is empty or not
	if($sql_data['position'] === "" && $cerid = 1019 || $sql_data['position'] === "" && $cerid = 1020 || strtolower($sql_data['position']) == "owner" && $cerid = 1019 || strtolower($sql_data['position']) == "owner" && $cerid = 1020){
		$job_position = "-- --";
	}else{
		$job_position = $sql_data['position'];
	}

	//Checks if data is connected to Business Record
	if($sql_data['b_id'] != 0){
		$busi = $sql_data['b_id'];

		$bus = $conn->prepare("SELECT * FROM tbl_business WHERE b_id = '$busi'");
		$bus->execute();

		if($bus->rowCount() > 0){
			$bus_data = $bus->fetch();
			
			$book_number = $bus_data['bookno'];
			$requestor_name = $sql_data['requestor_name'];
			$bus_name = $bus_data['businessname'];
			$bus_owner = $bus_data['oname'];
			$bus_address = $bus_data['badd'];
			$bus_type = $bus_data['btype'];
			$bus_class = $bus_data['bclass'];

			if($cerid = 1019 || $cerid = 1020){
				if(strtolower($sql_data['position']) != "owner" || $sql_data['position'] == " "){
					$job_position = "-- --";
				}else{
					$job_position = "-- --";
				}
			}else{
				$job_position = "-- --";
			}
			
			$requestor_name = "-- --";
			$res_gender = "-- --";
			$res_bday = "-- --";
			$res_contact = "-- --";
			$res_status = "-- --";
			$res_purok = "-- --";
			$requestor_address = "-- --";
			$res_religion = "-- --";
			$res_civilstat = "-- --";
			$job_position = "-- --";
		}else{
			$book_number = "-- --";
			$bus_name = "-- --";
			$bus_owner = "-- --";
			$bus_address = "-- --";
			$bus_type = "-- --";
			$bus_class = "-- --";

			$requestor_name = "-- --";
			$res_gender = "-- --";
			$res_bday = "-- --";
			$res_contact = "-- --";
			$res_status = "-- --";
			$res_purok = "-- --";
			$requestor_address = "-- --";
			$res_religion = "-- --";
			$res_civilstat = "-- --";
		}

	//Checks if data is connected to Resident Record
	}else if($sql_data['r_id'] != 0){
		$resi = $sql_data['r_id'];
		
		$res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$resi'");
		$res->execute();

		if($res->rowCount() > 0){
			$res_data = $res->fetch();

			$firstname = $res_data['firstname'];
			$middlename = $res_data['middlename'];
			$lastname = $res_data['lastname'];
			if($res_data['suffix'] === ""){
				$suffix = "";
			}else{
				$suffix = $res_data['suffix'];
			}

			$bday = date("d", strtotime($res_data['birthdate']));
			$bmonth = date("F", strtotime($res_data['birthdate']));
			$byear = date("Y", strtotime($res_data['birthdate']));
			
			$requestor_name = $firstname . " " . $middlename . " " . $lastname . " " . $suffix;
			$requestor_address = $res_data['address'];
			$res_gender = $res_data['gender'];
			$res_bday = $bmonth . " " . $bday . ", " . $byear;

			if($res_data['contactno'] === ""){
				$res_contact = "-- --";
			}else{
				$res_contact = $res_data['contactno'];
			}
			$res_status = $res_data['resident_status'];
			$res_purok = $res_data['purok'];
			$res_religion = $res_data['religion'];
			$res_civilstat = $res_data['civilstatus'];
			
			if($cerid = 1019 || $cerid = 1020){
				if(strtolower($sql_data['position']) != "owner" || $sql_data['position'] == " "){
					$job_position = "-- --";
				}else{
					$job_position = $sql_data['position'];
				}
			}else if($res_data['company_position'] === " "){
				$job_position = "-- --";
			}else{
				$job_position = $res_data['company_position'];
			}

			$book_number = "-- --";
			$bus_name = "-- --";
			$bus_owner = "-- --";
			$bus_address = "-- --";
			$bus_type = "-- --";
			$bus_class = "-- --";
		}else{
			$book_number = "-- --";
			$bus_name = "-- --";
			$bus_owner = "-- --";
			$bus_address = "-- --";
			$bus_type = "-- --";
			$bus_class = "-- --";

			$requestor_name = "-- --";
			$res_gender = "-- --";
			$res_bday = "-- --";
			$res_contact = "-- --";
			$res_status = "-- --";
			$res_purok = "-- --";
			$requestor_address = "-- --";
			$res_religion = "-- --";
			$res_civilstat = "-- --";
		}

	}else if($sql_data['r_id'] == 0 && $sql_data['b_id'] == 0){
		$requestor_name = $sql_data['requestor_name'];
		$requestor_address = $sql_data['requestor_address'];

		$book_number = "-- --";
		$bus_name = "-- --";
		$bus_owner = "-- --";
		$bus_address = "-- --";
		$bus_type = "-- --";
		$bus_class = "-- --";
		
		$res_gender = "-- --";
		$res_bday = "-- --";
		$res_contact = "-- --";
		$res_status = "-- --";
		$res_purok = "-- --";
		$res_religion = "-- --";
		$res_civilstat = "-- --";

		if($cerid = 1019 || $cerid = 1020){
			if(strtolower($sql_data['position']) != "owner" || $sql_data['position'] == " "){
				$job_position = "-- --";
			}else{
				$job_position = $sql_data['position'];
			}
		}else{
			$job_position = "-- --";
		}
	}else{
		
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
	<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12">
			<div class="white-box"><!--Resident and Business Info Start-->
				<?php
					if($errorMessage == 'Modified Successfully'){
				?>
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
							<b><?php echo $errorMessage; ?></b>
						</div>
				<?php
					}else{

					}
				?>

				<div class="m-b-0"><b class="text-info">Reference Number</b>
					<p style="padding-left:27px;"><?php echo $sql_data['reference_num']; ?></p>
				</div>
				<br />
				<h3 class="box-title m-b-0" style="color:#663399; font-weight: bold;">Payment Information</h3>
				
				<div class="row">
					<?php include 'info/resident_bus_info.php'; ?>
				</div>
			</div><!--Resident Info End-->

			<div class="col-md-6">
				<div class="white-box" id="residency" style="display:none;"><!--Cert of Residency Start-->
					<h6 class="m-b-0"><b>Certificate of Residency Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/residency_modify.php'; ?>
					</div>
				</div><!--Cert of Residency End-->

				<div class="white-box" id="bus_clearance" style="display:none;"><!--Business Clearance Start-->
					<h6 class="m-b-0"><b>Business Clearance Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/bus_clearance_modify.php'; ?>
					</div>
				</div><!--Business Clearance End-->

				<div class="white-box" id="good_moral" style="display:none;"><!--Good Moral Start-->
					<h6 class="m-b-0"><b>Good Moral Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/good_moral_modify.php'; ?>
					</div>
				</div><!--Good Moral End-->

				<div class="white-box" id="miscellaneous" style="display:none;"><!--Miscellaneous Start-->
					<h6 class="m-b-0"><b>Miscellaneous Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/miscellaneous_modify.php'; ?>
					</div>
				</div><!--Miscellaneous End-->

				<div class="white-box" id="billboard" style="display:none;"<!--Signage Billboard Start-->
					<h6 class="m-b-0"><b>Signage Billboard Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/billboard_modify.php'; ?>
					</div>
				</div><!--Signage Billboard End-->

				<div class="white-box" id="working" style="display:none;"><!--Working Clearance Start-->
					<h6 class="m-b-0"><b>Working Clearance Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/working_modify.php'; ?>
					</div>
				</div><!--Working Clearance End-->

				<div class="white-box" id="meter" style="display:none;"><!--Meter Application Start-->
					<h6 class="m-b-0"><b>Meter Application Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/meter_modify.php'; ?>
					</div>
				</div><!--Meter Application End-->

				<div class="white-box" id="bir" style="display:none;"><!--Meter Application Start-->
					<h6 class="m-b-0"><b>BIR Real Estate Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/bir_modify.php'; ?>
					</div>
				</div><!--Meter Application End-->

				<div class="white-box" id="excavation" style="display:none;"><!--Excavation Permit Start-->
					<h6 class="m-b-0"><b>Excavation Permit Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/excavation_modify.php'; ?>
					</div>
				</div><!--Excavation Permit End-->

				<div class="white-box" id="trd" style="display:none;"><!--TRD Start-->
					<h6 class="m-b-0"><b>TRD Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/trd_modify.php'; ?>
					</div>
				</div><!--TRD End-->

				<div class="white-box" id="tfb" style="display:none;"><!--TFB Start-->
					<h6 class="m-b-0"><b>TFB Private Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/tfb_modify.php'; ?>
					</div>
				</div><!--TFB End-->

				<div class="white-box" id="promotional" style="display:none;"><!--Promotional Clearance Start-->
					<h6 class="m-b-0"><b>Promotional Clearance Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/promotional_modify.php'; ?>
					</div>
				</div><!--Promotional Clearance End-->

				<div class="white-box" id="terminal" style="display:none;"><!--Terminal Clearance Start-->
					<h6 class="m-b-0"><b>Terminal Clearance Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/terminal_modify.php'; ?>
					</div>
				</div><!--Terminal Clearance End-->

				<div class="white-box" id="building" style="display:none;"><!--Building Permit Start-->
					<h6 class="m-b-0"><b>Building Permit Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/building_modify.php'; ?>
					</div>
				</div><!--Building Permit End-->

				<div class="white-box" id="liquor" style="display:none;"><!--Liquor Permit Start-->
					<h6 class="m-b-0"><b>Liquor Permit Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/liquor_modify.php'; ?>
					</div>
				</div><!--Liquor Permit End-->
				
				<div class="white-box" id="id_card" style="display:none;"><!--id Start-->
					<h6 class="m-b-0"><b>ID Information</b></h6>
					<br />
					<div class="row">
						<?php include 'info/id_modify.php'; ?>
					</div>
				</div><!--id End-->

			</div>
		</div>
	</form>
	</div>
	<script>
		var cerid = "<?php echo $sql_data['cer_id']; ?>";

		if(cerid == 1002){ //certificate of residency
			$("#residency").show();
			// document.getElementById("residency").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1012){ //business clearance
			$("#bus_clearance").show();
			// document.getElementById("bus_clearance").style.display = "block";

			// document.getElementById("residency").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1018){ //good moral
			$("#good_moral").show();
			// document.getElementById("good_moral").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1019){ //miscellaneous
			$("#miscellaneous").show();
			// document.getElementById("miscellaneous").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";
		
		}else if(cerid == 1020){ //signage billboard
			$("#billboard").show();
			// document.getElementById("billboard").style.display = "block";
	
			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1021){ //working
			$("#working").show();
			// document.getElementById("working").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1022){ //meter
			$("#meter").show();
			// document.getElementById("meter").style.display = "block";
			
			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1023){ //bir real estate
			$("#bir").show();
			// document.getElementById("bir").style.display = "block";
			
			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1025){ //excavation
			$("#excavation").show();
			// document.getElementById("excavation").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1026){ //trd
			$("#trd").show();
			// document.getElementById("trd").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1027){ //tfb private
			$("#tfb").show();
			// document.getElementById("tfb").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1031){ //promotional clearance
			$("#promotional").show();
			// document.getElementById("promotional").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1032){ //terminal clearance
			$("#terminal").show();
			// document.getElementById("terminal").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1033){ //building permit
			$("#building").show();
			// document.getElementById("building").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("residency").style.display = "none";
			// document.getElementById("liquor").style.display = "none";

		}else if(cerid == 1034){ //liquor permit
			$("#liquor").show();
			// document.getElementById("liquor").style.display = "block";

			// document.getElementById("bus_clearance").style.display = "none";
			// document.getElementById("good_moral").style.display = "none";
			// document.getElementById("miscellaneous").style.display = "none";
			// document.getElementById("billboard").style.display = "none";
			// document.getElementById("working").style.display = "none";
			// document.getElementById("meter").style.display = "none";
			// document.getElementById("bir").style.display = "none";
			// document.getElementById("excavation").style.display = "none";
			// document.getElementById("trd").style.display = "none";
			// document.getElementById("tfb").style.display = "none";
			// document.getElementById("promotional").style.display = "none";
			// document.getElementById("terminal").style.display = "none";
			// document.getElementById("building").style.display = "none";
			// document.getElementById("residency").style.display = "none";
		}else if(cerid == 1035){
			$("#id_card").show();
		}else{

		}
	</script>