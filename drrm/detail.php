<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_inventory_drrm WHERE uid = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$invdate = date("M d, Y", strtotime($sql_data['in_dop']));
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='../inventory/index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">BDRRM Inventory</h3>
				<p class="text-muted m-b-30 font-13"> View BDRRM Inventory </p>
					
					<div class="m-l-40"><b class="text-info">Item : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['in_item']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Item Description : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['in_itemdesc']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Quantity : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['in_qty']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Serial No. : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['in_serialno']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Amount : </b>
						<p style="padding-left:27px;">&#8369;<?php echo number_format($sql_data['in_amt'], 2); ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Date of Purchase : </b>
						<p style="padding-left:27px;"><?php echo $invdate; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Condition : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['in_condition']; ?></p>
                    </div>
					
					
										
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['uid']; ?>">Edit</a>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='../inventory/index.php';">Back</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>
	<style>
		.control-label{
			color:black;
		}
	</style>