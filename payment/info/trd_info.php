<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
?>

	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12">
			<div class="white-box">
				<div class="m-l-40"><b class="text-info">Toda : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['toda']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Toda Address : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['toda_address']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Make : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['make']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Motor No. : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['motor_no']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Chassis No. : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['chassis_no']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Color Code : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['color_code']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Side Car No. : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['side_car_no']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Plate No. : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['plate_no']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">O.R No. : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['or_num']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Amount : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['amount']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Signing Official : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['person_sign']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Date Issued : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['date_issued']; ?></p>
				</div>

				<div class="m-l-40"><b class="text-info">Issued By : </b>
					<p style="padding-left:27px;"><?php echo $sql_data['issued_by']; ?></p>
				</div>

				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
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
	