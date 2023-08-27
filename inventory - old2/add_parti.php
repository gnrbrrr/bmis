<head>
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
		<form class="form-horizontal" method="post" action="process.php?action=add_particular" enctype="multipart/form-data" name="form" id="form">
			<div class="col-md-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">BDRRM Inventory</h3>
					<p class="text-muted m-b-30 font-13"> Add Particular </p>
					<div class="row">
						<?php include 'parti_form.php'; ?>
					</div>
				</div>
			</div>			
		</form>
	</div>