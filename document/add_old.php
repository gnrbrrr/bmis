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

if($cerid != 1012 && $cerid != 1020 && $cerid != 1024 && $cerid != 1025 && $cerid != 1034)
{
	if(isset($_POST['res']))
	{ $resid = $_POST['res']; }else{ $resid = $_GET['res']; }
	
	$res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$resid'");
	$res->execute();
	$res_data = $res->fetch();
	$rfname = $res_data['firstname'];
	$rmname = $res_data['middlename'];
	$rlname = $res_data['lastname'];
	
	$blt = $conn->prepare("SELECT * FROM tbl_blotter WHERE suspect_firstname = '$rfname' AND suspect_lastname = '$rlname' AND suspect_middlename = '$rmname'");
	$blt->execute();
	if($blt->rowCount() > 0)
	{ $spn = "8"; $btnlabel = "Ignore and Proceed"; }else{ $spn = "12"; $btnlabel = "Proceed"; }		
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

	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add_<?php echo $sql_data['page']; ?>" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-<?php echo $spn; ?>">
			<div class="white-box">
				<h3 class="box-title m-b-0">Document Request</h3>
				<p class="text-muted m-b-30 font-13"><?php echo $sql_data['cer_name']; ?></p>
					
					<?php include 'form/' . $sql_data['page'] . '.php'; ?>
					
					<br /><br />
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<input type="hidden" name="cerid" value="<?php echo $cerid; ?>" />
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><?php echo $btnlabel; ?></button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
		<?php 
		if($sql_data['cer_id'] != 1012 && $sql_data['cer_id'] != 1020 && $sql_data['cer_id'] != 1024 && $sql_data['cer_id'] != 1025 && $sql_data['cer_id'] != 1034)
		{
			if($blt->rowCount() > 0)
			{
		?>
				<div class="col-md-4">
					<div class="white-box">
						<h3 class="box-title label label-rounded label-danger m-b-0">Blotter Record</h3>
						<br /><hr /><br />
						<ol style="padding:7px;">
						<?php
							while($blt_data = $blt->fetch())
							{
								$dto = date("M d, Y", strtotime($blt_data['dateofoccurence']));
						?>
								<li style="font-size:11px; padding:7px;">
									<a href="blotter_detail.php?id=<?php echo $blt_data['bl_id']; ?>&cid=<?php echo $cerid; ?>&rid=<?php echo $resid; ?>" class="nyroModal"><?php echo $dto; ?> - <?php echo $blt_data['natureofcase']; ?><br /></a>
									
								</li>
						<?php
							} // End While
						?>
						</ol>
					</div>
				</div>
		<?php
			}else{}
		}else{}
		?>
	</form>
	</div>