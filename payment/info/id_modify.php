<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
?>

	<form class="form-horizontal" method="post" action="process.php?action=modify_id" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12">
			<div class="white-box">
				<div class="m-l-40"><b class="text-info">ID No. : </b>
					<p style="padding-left:27px;"><input type="text" class="txt_bx" id="exampleInputuname" name="idno" value="<?php echo $sql_data['idno']; ?>" autocomplete=off required /></p>
				</div>

				<div class="m-l-40"><b class="text-info">Contact Person : </b>
					<p style="padding-left:27px;"><input type="text" class="txt_bx" id="exampleInputuname" name="contact_person" value="<?php echo $sql_data['contact_person']; ?>" autocomplete=off required /></p>
				</div>

				<div class="m-l-40"><b class="text-info">Contact No. : </b>
					<p style="padding-left:27px;"><input type="text" class="txt_bx" id="exampleInputuname" name="contact_person_num" value="<?php echo $sql_data['contact_person_num']; ?>" autocomplete=off required /></p>
				</div>

				<div class="m-l-40"><b class="text-info">Date Issued : </b>
					<p style="padding-left:27px;"><input type="date" class="txt_bx" id="exampleInputuname" name="dtissued" value="<?php echo $sql_data['date_issued']; ?>" autocomplete=off required /></p>
				</div>

				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<input name="id" type="hidden" value="<?php echo $id; ?>" />
						<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><i class="fa fa-save fa-fw"></i> Save</button>
						<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
					</div>
				</div>
				
			</div>
		</div>
	</form>
	<style>
		.m-l-40 p{
			color:black;
		}
	</style>
	