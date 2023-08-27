<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

if(isset($_POST['cerid']))
{ $cerid = $_POST['cerid']; }else{ $cerid = $_GET['cerid']; }

$sql = $conn->prepare("SELECT * FROM tbl_certificate WHERE cer_id = '$cerid'");
$sql->execute();
$sql_data = $sql->fetch();

if($cerid != 1012 && $cerid != 1020 && $cerid != 1024 && $cerid != 1025 && $cerid != 1034 && $cerid != 1036)
{
	if(isset($_POST['res']))
	{ $resid = $_POST['res']; }else{ $resid = $_GET['res']; }
	
	$res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$resid'");
	$res->execute();
	$res_data = $res->fetch();
	$rfname = $res_data['firstname'];
	$rmname = $res_data['middlename'];
	$rlname = $res_data['lastname'];
	
	$blt = $conn->prepare("SELECT * FROM tbl_blotter WHERE respondent_firstname = '$rfname' AND respondent_lastname = '$rlname' AND respondent_middlename = '$rmname' AND is_deleted != '1'");
	$blt->execute();
	if($blt->rowCount() > 0)
	{
		$spn = "12";
		$div_spn = "col-sm-offset-1 col-sm-12";
		$btnlabel = "Ignore and Proceed";
	}else{
		$spn = "12";
		$div_spn = "col-sm-offset-3 col-sm-9";
		$btnlabel = "Proceed";
	}

	$vaw = $conn->prepare("SELECT * FROM tbl_new_vwac WHERE sus_given_name = '$rfname' AND sus_middle_name = '$rmname' AND sus_last_name = '$rlname' AND is_deleted != '1'");
	$vaw->execute();
	if($vaw->rowCount() > 0){
		$spn = "12";
		$div_spn = "col-sm-offset-1 col-sm-12";
		$btnlabel = "Ignore and Proceed";
	}else{
		$spn = "12";
		$div_spn = "col-sm-offset-3 col-sm-9";
		$btnlabel = "Proceed";
	}

	$bad = $conn->prepare("SELECT * FROM tbl_badak WHERE bdk_unang_pangalan = '$rfname' AND bdk_gitnang_pangalan = '$rmname' AND bdk_huling_pangalan = '$rlname' AND is_deleted != '1'");
	$bad->execute();
	if($bad->rowCount() > 0){
		$spn = "12";
		$div_spn = "col-sm-offset-1 col-sm-12";
		$btnlabel = "Ignore and Proceed";
	}else{
		$spn = "12";
		$div_spn = "col-sm-offset-3 col-sm-9";
		$btnlabel = "Proceed";
	}

	$bcp = $conn->prepare("SELECT * FROM tbl_vwac WHERE vwac_perpetrator_firstname = '$rfname' AND vwac_perpetrator_middlename = '$rmname' AND vwac_perpetrator_lastname = '$rlname' AND is_deleted != '1'");
	$bcp->execute();
	if($bcp->rowCount() > 0){
		$spn = "12";
		$div_spn = "col-sm-offset-1 col-sm-12";
		$btnlabel = "Ignore and Proceed";
	}else{
		$spn = "12";
		$div_spn = "col-sm-offset-3 col-sm-9";
		$btnlabel = "Proceed";
	}

	$lup = $conn->prepare("SELECT * FROM tbl_lupon WHERE lpn_respondent1_firstname = '$rfname' AND lpn_respondent1_lastname = '$rlname' AND is_deleted != '1' OR lpn_respondent2_firstname = '$rfname' AND lpn_respondent2_lastname = '$rlname' AND is_deleted != '1' OR lpn_respondent3_firstname = '$rfname' AND lpn_respondent3_lastname = '$rlname' AND is_deleted != '1'");
	$lup->execute();
	if($lup->rowCount() > 0){
		$spn = "12";
		$div_spn = "col-sm-offset-1 col-sm-12";
		$btnlabel = "Ignore and Proceed";
	}else{
		$spn = "12";
		$div_spn = "col-sm-offset-3 col-sm-9";
		$btnlabel = "Proceed";
	}
}else{ $btnlabel = "Proceed"; }

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<head>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/misc-js.php'); ?>
<style>
.label {
	font-size:13px;
	color:#000000;
}
.label b {
	font-size:13px;
	font-weight:normal;
}
.txt_bx {
	border-bottom:solid 2px #666600;
	border-top:solid 0px #666600;
	border-left:solid 0px #666600;
	border-right:solid 0px #666600;
	width:127px;
}
.dot {
	width:17px;
}
.data {
	font-size:13px;
	color:#000000;
}
</style>
</head>

	<!-- <div class="row"> -->
	<table>
		<tr>
			<td>
				<form class="form-horizontal" method="post" action="process.php?action=add_<?php echo $sql_data['page']; ?>" enctype="multipart/form-data" name="form" id="form">
					<div class="col-md-<?php echo $spn; ?>">
						<div class="white-box">
							<h3 class="box-title m-b-0">Document Request</h3>
							<p class="text-muted m-b-30 font-13"><?php echo $sql_data['cer_name']; ?></p>
								
								<?php include 'form/' . $sql_data['page'] . '.php'; ?>
								
								<br /><br />
								<div class="form-group m-b-0">
									<div class="<?php echo $div_spn; ?>">
										<input type="hidden" name="cerid" value="<?php echo $cerid; ?>" />
										<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><?php echo $btnlabel; ?></button>
										<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
									</div>
								</div>
							
						</div>
					</div>
				</form>
			</td>
			<td>
				<?php 
				if($sql_data['cer_id'] != 1012 && $sql_data['cer_id'] != 1020 && $sql_data['cer_id'] != 1024 && $sql_data['cer_id'] != 1025 && $sql_data['cer_id'] != 1034 && $sql_data['cer_id'] != 1036)
				{
					if($blt->rowCount() > 0 || $vaw->rowCount() > 0 || $bad->rowCount() > 0 || $bcp->rowCount() > 0 || $lup->rowCount() > 0){
				?>
					<div>
						<center><p style="color:red; font-size:14px;"><b>This Person has a Record on :</b></p></center>
					</div>
				<?php
						if($blt->rowCount() > 0)
						{
				?>
						<div class="col-md-12">
							<div class="white-box" style="margin-bottom:1%; padding-bottom:0; padding-top:15px;">
								<center><h3 class="box-title label label-rounded label-danger m-b-0">Blotter Record</h3></center>
								<hr style="margin-bottom:1px; margin-top:8px;"/>
								<ol style="padding:7px; padding-top:0; padding-bottom:0;">
								<?php
									while($blt_data = $blt->fetch())
									{
										$dto = date("M d, Y", strtotime($blt_data['date_reported']));
										$date_created = date("M d, Y", strtotime($blt_data['date_created']));
								?>
										<div style="font-size:11px; padding:7px; text-align:center;">
											<a href="blotter_detail.php?id=<?php echo $blt_data['bl_id']; ?>&cid=<?php echo $cerid; ?>&rid=<?php echo $resid; ?>" class="nyroModal"><b>Blotter No.:</b> <?php echo $blt_data['blotter_no']; ?><br /><b>Nature of Case:</b> <?php echo $blt_data['natureofcase']; ?><br /><b>Date Created:</b> <?php echo $date_created; ?></a>
											
										</div>
								<?php
									} // End While
								?>
								</ol>
							</div>
						</div>
				<?php
						}else{}
						if($vaw->rowCount() > 0)
						{
				?>
						<div class="col-md-12">
							<div class="white-box" style="margin-bottom:1%; padding-bottom:0; padding-top:15px;">
								<center><h3 class="box-title label label-rounded label-danger m-b-0">VAWC Record</h3></center>
								<hr style="margin-bottom:1px; margin-top:8px;"/>
								<ol style="padding:7px; padding-top:0; padding-bottom:0;">
								<?php
									while($vaw_data = $vaw->fetch())
									{
										$date_report = date("M d, Y", strtotime($vaw_data['date_report']));
								?>
										<div style="font-size:11px; padding:7px; text-align:center;">
											<a href="vawc_detail.php?id=<?php echo $vaw_data['vwac_id']; ?>&cid=<?php echo $cerid; ?>&rid=<?php echo $resid; ?>" class="nyroModal"><b>Entry No.:</b> <?php echo $vaw_data['entry_number']; ?><br /><b>Incident Type:</b> <?php echo $vaw_data['incident_type']; ?><br /><b>Date Reported:</b> <?php echo $date_report; ?></a>
											
										</div>
								<?php
									} // End While
								?>
								</ol>
							</div>
						</div>
				<?php
					}else{}
					if($bad->rowCount() > 0)
					{
				?>
						<div class="col-md-12">
							<div class="white-box" style="margin-bottom:1%; padding-bottom:0; padding-top:15px;">
								<center><h3 class="box-title label label-rounded label-danger m-b-0">BADAC Record</h3></center>
								<hr style="margin-bottom:1px; margin-top:8px;"/>
								<ol style="padding:7px; padding-bottom:0; padding-top:0;">
								<?php
									while($bad_data = $bad->fetch())
									{
										$date_accomp = date("M d, Y", strtotime($bad_data['bdk_date_ac']));
								?>
										<div style="font-size:11px; padding:7px; text-align:center;">
											<a href="badak_detail.php?id=<?php echo $bad_data['bdk_id']; ?>&cid=<?php echo $cerid; ?>&rid=<?php echo $resid; ?>" class="nyroModal"><b>Status: </b> <?php echo $bad_data['status']; ?><br /><b>Date Accomplished: </b><?php echo $date_accomp; ?></a>
											
										</div>
								<?php
									} // End While
								?>
								</ol>
							</div>
						</div>
				<?php 
					}else{}
					if($bcp->rowCount() > 0)
					{
				?>
						<div class="col-md-12" style="float:right;">
							<div class="white-box" style="margin-bottom:5%; padding-bottom:0; padding-top:15px;">
								<center><h3 class="box-title label label-rounded label-danger m-b-0">BCPC Record</h3></center>
								<hr style="margin-bottom:1px; margin-top:8px;">
								<ol style="padding:7px; padding-bottom:0; padding-top:0;">
								<?php
									while($bcp_data = $bcp->fetch())
									{
										$bcp_date = date("M d, Y", strtotime($bcp_data['vwac_date_reported']));
								?>
									<div style="font-size:11px; padding:7px; text-align:center;">
										<a href="bcpc_detail.php?id=<?php echo $bcp_data['vwac_id']; ?>&cid=<?php echo $cerid; ?>&rid=<?php echo $resid; ?>" class="nyroModal"><b>Type of Case: </b><?php echo $bcp_data['vwac_typeofcase']; ?><br><b>Reference No. : </b><?php echo $bcp_data['reference_no']; ?><br><b>Date Reported: </b><?php echo $bcp_date; ?></a>
									</div>
								<?php
									}
								?>
								</ol>
							</div>
						</div>
				<?php 
					}else{}
					if($lup->rowCount() > 0)
					{
				?>
						<div class="col-md-12" style="float:right;">
							<div class="white-box" style="margin-bottom:5%; padding-bottom:0; padding-top:15px;">
								<center><h3 class="box-title label label-rounded label-danger m-b-0">Lupon ng Tagapamayapa Record</h3></center>
								<hr style="margin-bottom:1px; margin-top:8px;">
								<ol style="padding:7px; padding-bottom:0; padding-top:0;">
								<?php
									while($lup_data = $lup->fetch())
									{
										$lup_date = date("M d, Y", strtotime($lup_data['lpn_date']));
								?>
									<div style="font-size:11px; padding:7px; text-align:center;">
										<a href="lupon_detail.php?id=<?php echo $lup_data['lpn_id']; ?>&cid=<?php echo $cerid; ?>&rid=<?php echo $resid; ?>" class="nyroModal"><b>Usaping Brgy BLG.: </b><?php echo $lup_data['lpn_usp_brgy_blg']; ?><br><b>Ukol sa: </b><?php echo $lup_data['lpn_ukol_sa']; ?><br><b>Date Recorded: </b><?php echo $lup_date; ?></a>
									</div>
								<?php
									}
								?>
								</ol>
							</div>
						</div>

				<?php
						}
					}
				}else{}
				?>
			</td>
		</tr>
	</table>
	
		
	<!-- </form> -->
	<!-- </div> -->
	<script>

		$("document").ready(function(){

			$.ajax({
				url: "checker.php",
				method: "POST",
				data: { name_id: <?php echo $resid; ?> }, // {$_POST['name_id'] : value}
				success: function(data){
					if(data){
						// var message = data;
						swal.fire({
							icon: 'warning',
							title: "This Person Has An Existing Record Case(s)!",
							// text: message,
							// html: message,
							showConfirmButton: true,
							showCancelButton: true,
							cancelButtonText: "Back",
							confirmButtonText: "Ignore and Proceed",
							reverseButtons:true,
							cancelButtonColor: '#0275d8',
							confirmButtonColor: '#7C5',
							allowOutsideClick: false,
						}).then((result) =>{
							if(result.isConfirmed){

							}else{
								window.location.href = "../document/index.php";
							}
						})
					}
				}
			});
		});
	</script>