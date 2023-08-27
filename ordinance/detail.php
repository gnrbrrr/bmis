<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_ordinance WHERE ord_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$dateappr = date("M d, Y", strtotime($sql_data['ord_date']));

	if($sql_data['image']){
		$image = WEB_ROOT . 'images/ordinance/' . $sql_data['image'];
	}else{
		$image = WEB_ROOT . 'images/resident/noimage.png';
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
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0">Ordinance</h3>
				<p class="text-muted m-b-30 font-13"> View Ordinance </p>

					<div class="m-l-40"><b class="text-info">Ordinance Image : </b>
						<br /><a href="<?php echo $image; ?>" class="nyroModal"><img src="<?php echo $image; ?>" alt="Ordinance Image" style="border:3px solid black; width:300px; height:225px;"></a>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Item No. : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['ord_itemno']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Ordinance No. : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['ord_no']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Title : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['ord_title']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Date Approved : </b>
						<p style="padding-left:27px; color:black;"><?php echo $dateappr; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Remarks : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['ord_remarks']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Committee / Others : </b>
						<p style="padding-left:27px; color:black;"><?php echo $sql_data['ord_committee']; ?></p>
                    </div>
										
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['ord_id']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>