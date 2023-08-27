<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
?>

	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6"> <!--Resident Info Start-->
			<div class="white-box">
				<h6 class="m-b-0"><b>Resident Information</b></h6>
				<br />
				<div class="m-l-40"><b class="text-info">Requestor's Name : </b>
					<p style="padding-left:27px;"><?php echo $requestor_name; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Requestor's Address : </b>
					<p style="padding-left:27px;"><?php echo $requestor_address; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Requestor's Gender : </b>
					<p style="padding-left:27px;"><?php echo $res_gender; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Requestor's Civil Status : </b>
					<p style="padding-left:27px;"><?php echo $res_civilstat; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Requestor's Birth Date : </b>
					<p style="padding-left:27px;"><?php echo $res_bday; ?></p>
				</div>
				
				<div class="m-l-40"><b class="text-info">Requestor's Contact : </b>
					<p style="padding-left:27px;"><?php echo $res_contact; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Requestor's Resident Status : </b>
					<p style="padding-left:27px;"><?php echo $res_status; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Requestor's Religion : </b>
					<p style="padding-left:27px;"><?php echo $res_religion; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Requestor's Job Position : </b>
					<p style="padding-left:27px;"><?php echo $job_position; ?></p>
				</div>
			</div>
		</div><!--Resident Info End-->

		<div class="col-md-6"> <!--Business Info Start-->
			<div class="white-box">
				<h6 class="m-b-0"><b>Business Information</b></h6>
				<br />
				<div class="m-l-40"><b class="text-info">Book No : </b>
					<p style="padding-left:27px;"><?php echo $book_number; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Business Name : </b>
					<p style="padding-left:27px;"><?php echo $bus_name; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Business Owner : </b>
					<p style="padding-left:27px;"><?php echo $bus_owner; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Business Address : </b>
					<p style="padding-left:27px;"><?php echo $bus_address; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Business Type : </b>
					<p style="padding-left:27px;"><?php echo $bus_type; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Business Class : </b>
					<p style="padding-left:27px;"><?php echo $bus_class; ?></p>
				</div>
			</div>
		</div><!--Business Info End-->


	</form>
	<style>
	</style>
	