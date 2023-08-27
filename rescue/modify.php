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
		<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form" onload="showinput()">
			<div class="col-md-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Rescue Unit Information</h3>
					<p class="text-muted m-b-30 font-13"> Add Patient </p>
					<div class="row">
						<?php include 'modify_info.php'; ?>
					</div>
				</div>
			</div>			
		</form>
	</div>


<script type="text/javascript">

	function showinput(){


	var value_checked = $(".o2").val();
	
	if(value_checked == "Yes"){
		$("#a").show();
		$("#via").show();
	}
	else{
		$("#a").hide();
		$("#via").hide();
	}


	var value_checked = $(".meds").val();
	
	if(value_checked == "Yes"){
		$("#meds2").show();
	}
	else{
		$("#meds2").hide();
	}


	var value_checked = $(".bs").val();
	
	if(value_checked == "Yes"){
		$("#bs_ml").show();
	}
	else{
		$("#bs_ml").hide();
	}
				
};
	
</script>