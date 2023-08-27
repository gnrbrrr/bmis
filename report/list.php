<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}



// Check if the user has the necessary permissions to see the menu
$showReport = true; // Change this based on your permission check

if ($showReport) {
	// Check if the current user has VAWC and Blotter access
	$isDemograph1 = $user_data['is_resident_access'];
	$isDemograph2 = $user_data['is_business_access'];

	$isVawcAccess = $user_data['is_vawc_access'];
	$isBlotterAccess = $user_data['is_blotter_access'];
	$isInventoryAccess = $user_data['is_inventory_access'];
	$isMedicalAccess = $user_data['is_medical_access'];
	$isBCPCAccess = $user_data['is_bcpc_access'];
	$isLuponAccess = $user_data['is_lupon_access'];
	$isVehicleAccess = $user_data['is_vehicle_access'];
	$isBadacAccess = $user_data['is_badac_access'];
	$isDocument = $user_data['is_document_access'];
	$isMeeting = $user_data['is_minutes_access'];
	$isBorrowed = $user_data['is_borrow_access'];
	$isMedicine = $user_data['is_medicine_access'];
	$isCovid = $user_data['is_covid_access'];
	$isFacility = $user_data['is_facility_access'];
	$isDevelop = $user_data['is_facility_access'];
	$isRescue = $user_data['is_rescue_access'];

	$isResolution = $user_data['is_resolution_access'];
	$isOrdinance = $user_data['is_ordinance_access'];
	$isExecutive = $user_data['is_executive_access'];

	// Update the is_deleted column of the corresponding rows in bs_report based on access levels

	if($isDemograph1 != 0 || $isDemograph2 != 0){
		if($isDemograph1 == 1 && $isDemograph2 != 1){
			$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isDemograph1 == 0 ? 1 : 0) . " WHERE report_id = 1001");
			$sql->execute();
		}else if($isDemograph1 != 1 && $isDemograph2 == 1){
			$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isDemograph2 == 0 ? 1 : 0) . " WHERE report_id = 1001");
			$sql->execute();
		}else if($isDemograph1 == 1 && $isDemograph2 == 1){
			$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isDemograph1 == 0 ? 1 : 0) . " WHERE report_id = 1001");
			$sql->execute();
		}else{

		}
	}

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isVawcAccess == 0 ? 1 : 0) . " WHERE report_id = 1021");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isBlotterAccess == 0 ? 1 : 0) . " WHERE report_id = 1014");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isInventoryAccess == 0 ? 1 : 0) . " WHERE report_id = 1015");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isMedicalAccess == 0 ? 1 : 0) . " WHERE report_id = 1016");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isVehicleAccess == 0 ? 1 : 0) . " WHERE report_id = 1017");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isBCPCAccess == 0 ? 1 : 0) . " WHERE report_id = 1022");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isLuponAccess == 0 ? 1 : 0) . " WHERE report_id = 1023");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isBadacAccess == 0 ? 1 : 0) . " WHERE report_id = 1024");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isDocument == 0 ? 1 : 0) . " WHERE report_id = 1013");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isMeeting == 0 ? 1 : 0) . " WHERE report_id = 1025");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isBorrowed == 0 ? 1 : 0) . " WHERE report_id = 1026");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isMedicine == 0 ? 1 : 0) . " WHERE report_id = 1027");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isCovid == 0 ? 1 : 0) . " WHERE report_id = 1028");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isFacility == 0 ? 1 : 0) . " WHERE report_id = 1029");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isDevelop == 0 ? 1 : 0) . " WHERE report_id = 1030");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isResolution == 0 ? 1 : 0) . " WHERE report_id = 1031");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isOrdinance == 0 ? 1 : 0) . " WHERE report_id = 1032");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isExecutive == 0 ? 1 : 0) . " WHERE report_id = 1033");
	$sql->execute();

	$sql = $conn->prepare("UPDATE bs_report SET is_deleted = " . ($isRescue == 0 ? 1 : 0) . " WHERE report_id = 1034");
	$sql->execute();

	// Get the list of reports that are not deleted
	$sql = $conn->prepare("SELECT * FROM bs_report WHERE is_deleted != '1'");
	$sql->execute();

	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>


	<head>
		<style rel="stylesheet">
			th {
				color: #000 !important;
				font-family: Arial !important;
				font-weight: bold !important;
				font-size: 13px !important;
			}

			td {
				color: #666666 !important;
				font-family: Arial !important;
				font-size: 12px !important;
			}
		</style>
	</head>

	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Report</h3>
				<p class="text-muted m-b-30">Display list of Reports</p>

				<?php
				if ($errorMessage == 'Deleted successfully') {
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<b><?php echo $errorMessage; ?></b>
					</div>
				<?php
				} else {
				}
				?>
				<div class="table-responsive">
					<table id="example23" class="display nowrap">
						<thead>
							<tr>
								<th>Report Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
								<th></th>
							</tr>
						</tfoot>
						<tbody>

							<?php
							if ($sql->rowCount() > 0) {
								while ($sql_data = $sql->fetch()) {
							?>
									<tr>
										<td><?php echo utf8_encode($sql_data['name']); ?></td>
										<td>
											<a href="index.php?view=search&id=<?php echo $sql_data['uid']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
										</td>
									</tr>
							<?php
								} // End While
							} else {
							}
							?>

						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('input[type="search"]').css({
				'border': '2px solid black'
			});
		});
	</script>
<?php } ?>