<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_borrowed bo, tbl_resident r WHERE bo.br_id = '$id' AND bo.r_id = r.r_id");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$bdate = date("M d, Y", strtotime($sql_data['br_dateborrowed']));
	$ebdate = date("M d, Y", strtotime($sql_data['br_timeborrowed']));

	if($sql_data['br_datereturned'] == ""){
		$rdate = "";
	}else{
		$rdate = date("M d, Y", strtotime($sql_data['br_datereturned']));
	}

	$borrower = "";

	if($sql_data['firstname']){
		$borrower .= $sql_data['firstname'];
	}else{

	}

	if($sql_data['middlename']){
		$borrower .= $sql_data['middlename'];
	}else{

	}

	if($sql_data['lastname']){
		$borrower .= $sql_data['lastname'];
	}else{

	}
	
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if ($sql_data['is_returned'] == 0)
{
	$btnedit = "";
	$status = "Lent";
}else{
	$btnedit = "style='display:none;'";	
	$status = "Returned";
}

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
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Borrowed Items Tracker</h3>
				<p class="text-muted m-b-30 font-13"> View Records </p>
					
					<div class="m-l-40"><b class="text-info">Name of Borrower : </b>
						<p style="padding-left:27px;"><?php echo $borrower; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Item : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_item']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Item Description : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_itemdesc']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Item Quantity : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_item_qty']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Item Condition : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_condition']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Purpose : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_purpose']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Event Location : </b>
						<p style="padding-left:27px;" style="width:370px; overflow-wrap:break-word;"><?php echo $sql_data['br_location']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Date Borrowed : </b>
						<p style="padding-left:27px;"><?php echo $bdate; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Time Borrowed : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_timeborrowed']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Released by : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_releasedby']; ?></p>
                    </div>

					</div>
				</div>

					<div class="col-md-6">
			<div class="white-box">
					
					<div class="m-l-40"><b class="text-info">Expected Date of Return : </b>
						<p style="padding-left:27px;"><?php echo $ebdate; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Remarks when Borrowed : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_remarksb']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Return by : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_returnby']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Date Returned : </b>
						<p style="padding-left:27px;"><?php echo $rdate; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Time Returned : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_timereturned']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Received by : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_receivedby']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Remarks when Returned : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['br_remarksr']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Status : </b>
						<p style="padding-left:27px;"><?php echo $status; ?></p>
                    </div>
										
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<a <?php echo $btnedit; ?> class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['br_id']; ?>">Edit</a>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
						</div>
					</div>
				
			</div>
		</div>
	</form>
	</div>
	<style>
		p{
			color:black;
		}
	</style>