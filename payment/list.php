<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

if(isset($_SESSION['user_id'])){ 
	$user_id = $_SESSION['user_id'];
}else{
	
}


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['submit']))
{
	$dfrom = $_POST['dfrom'];
	$dto = $_POST['dto'];
	$ctype = $_POST['ctype'];
	
	# Format Date to match date in db
	$newfrom = date("Y-m-d", strtotime($dfrom));
	$newto = date("Y-m-d", strtotime($dto));
	
	$date_filter = "AND date_issued BETWEEN '$newfrom' and '$newto'";	
	
	if($ctype != 0)
	{
		$typ7 = $conn->prepare("SELECT * FROM tbl_certificate WHERE is_deleted != '1' AND cer_id = '$ctype' ORDER BY cer_name");
		$typ7->execute();
		$typ7_data = $typ7->fetch();
		$cerid = $typ7_data['cer_id'];
		$cername = $typ7_data['cer_name'];
		$cer_filter = "AND cer_id = '$ctype'";		
	}else{ $cerid = 0; $cername = "All"; $cer_filter = ""; }
	
}else{ $date_filter = ""; $crtyp_state = ""; $newfrom = ""; $newto = ""; $cerid = 0; $cername = "All"; $cer_filter = ""; }

$sql = $conn->prepare("SELECT * FROM tbl_document_request WHERE is_deleted != '1' $date_filter $cer_filter");
$sql->execute();

?>
<head>
<style rel="stylesheet">
th
{   
   color: #000 !important;
   font-family: Arial !important;
   font-weight: bold !important;
   font-size:13px !important;
}
td
{   
   color: #666666 !important;
   font-family: Arial !important;  
   font-size:12px !important;
}
.txt_bx {
	border-bottom:solid 2px #666600;
	border-top:solid 2px #666600;
	border-left:solid 2px #666600;
	border-right:solid 2px #666600;
	width:127px;
}
.data {
	font-size:13px;
	color:#000000;
}
</style>
</head>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<?php
					if($errorMessage == 'Deleted Successfully'){
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
						<b><?php echo $errorMessage; ?></b>
					</div>
				<?php
					}
				?>
				<h3 class="box-title m-b-0">Payments</h3>
				<p class="text-muted m-b-30">Display list of Payments</p>
					
				
				<form class="form-horizontal" method="post" action="index.php?view=list" enctype="multipart/form-data" name="form" id="form">
					<table style="border:solid 0px #000000; width:100%;">						
					<tbody>
						<tr>							
							<div class="data">
								<b>From :</b> <input type="date" class="txt_bx" id="exampleInputuname" name="dfrom" value="<?php echo $newfrom; ?>" autocomplete=off required />
								&nbsp;&nbsp;
								<b>To :</b> <input type="date" class="txt_bx" id="exampleInputuname" name="dto" value="<?php echo $newto; ?>" autocomplete=off required />
								&nbsp;&nbsp;
								<b>Type :</b>
								<select name="ctype" class="select2" style="width:170px; border:solid 2px #666600;">
									<option value="<?php echo $cerid; ?>"><?php echo $cername; ?></option>
									<?php
										$typ = $conn->prepare("SELECT * FROM tbl_certificate WHERE is_deleted != '1' $crtyp_state AND cer_id != '$cerid' ORDER BY cer_name");
										$typ->execute();
										if($typ->rowCount() > 0)
										{
											while($typ_data = $typ->fetch())
											{
									?>														
												<option value="<?php echo $typ_data['cer_id']; ?>"><?php echo $typ_data['cer_name']; ?></option>
									<?php
											} // End While
										}else{}
									?>
								</select>
								&nbsp;&nbsp;
								<button type="submit" name="submit" class="btn btn-success waves-effect waves-light btn-xs">Submit</button>
							</div>

							<br />
						</tr>
					</tbody>
					</table>
				</form>
				<br /><br />
					<div class="table-responsive">
						<table id="example23" class="display nowrap">
							<thead>
								<tr>
									<th>Reference No.</th>
									<th>Book No.</th>
									<th>Name</th>
									<th>Type</th>
									<th>Amount</th>
									<th>Date</th>
									<th>User</th>
									<th id="action">Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th id="action"></th>
								</tr>
							</tfoot>
							<tbody>
								
								<?php
									if($sql->rowCount() > 0)
									{
										$total = 0;
										while($sql_data = $sql->fetch())
										{
											$certid = $sql_data['cer_id'];
											$ursid = $sql_data['user_id'];
											
											$dtissued_r = date("M d, Y", strtotime($sql_data['date_issued']));
											
											$crt = $conn->prepare("SELECT * FROM tbl_certificate WHERE cer_id = '$certid'");
											$crt->execute();
											$crt_data = $crt->fetch();
											
											if($sql_data['b_id'] != 0)
											{
												$bid = $sql_data['b_id'];
												$bus = $conn->prepare("SELECT * FROM tbl_business WHERE b_id = '$bid'");
												$bus->execute();
												if($bus->rowCount() > 0)
												{												
													$bus_data = $bus->fetch();
													
													$trans_name = $bus_data['businessname'];
													$refno = $sql_data['reference_num'];
													$bookno = $bus_data['bookno'];
												}else{
													$trans_name = "-- --";
													$refno = "-- --";
													$bookno = "-- --";
												}
											}else if($sql_data['r_id'] != 0){
												
												$rid = $sql_data['r_id'];
												$res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$rid'");
												$res->execute();
												if($res->rowCount() > 0)
												{
													$res_data = $res->fetch();
													
													$trans_name = $res_data['lastname'] . ', ' . $res_data['firstname'] . ' ' . $res_data['middlename'];
													$refno = $sql_data['reference_num'];
													$bookno = "-- --";
												}else{
													$trans_name = "-- --";
													$refno = "-- --";
													$bookno = "-- --";
												}
											} else {
												
											}
											
											# Get user details
											$urs = $conn->prepare("SELECT * FROM bs_user WHERE user_id = '$ursid'");
											$urs->execute();
											$urs_data = $urs->fetch();
											
											$total += $sql_data['amount'];
								?>
											<tr>
												<td><?php echo $refno; ?></td>
												<td><?php echo $bookno; ?></td>
												<td><?php echo $trans_name; ?></td>
												<td><?php echo $crt_data['cer_name']; ?></td>
												<td>&#8369;<?php echo number_format($sql_data['amount'], 2); ?></td>
												<td><?php echo $dtissued_r; ?></td>
												<td><?php echo $urs_data['lastname']; ?>, <?php echo $urs_data['firstname']; ?></td>
												<td id="buttons">
													<a id="buttons1"href="index.php?view=detail&id=<?php echo $sql_data['dr_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
													&nbsp;
													<a id="buttons2" href="index.php?view=modify&id=<?php echo $sql_data['dr_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
													&nbsp;
													<a id="buttons3"href="process.php?action=delete&id=<?php echo $sql_data['dr_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>														
												</td>
											</tr>
								<?php
										} // End While
									}else{ $total = 0.00; }
								?>
								
							</tbody>
						</table>
						<br />
					</div>
				<br />
				<center><b style="color:black;"><p style="color:#663399; font-weight: bold;">Total</p>&#8369;<?php echo number_format($total, 2); ?></b></center>
				<br />
				<!-- <a href="<?php echo WEB_ROOT; ?>payment/report.php">PRINT</a> -->
			</div>
		</div>
	</div>
	

	<script>
		var user = <?php echo $_SESSION['user_id']; ?>;

		console.log(user);

		if(user == 1002){
			let buttons = document.querySelectorAll('td#buttons');
			for (let button of buttons) {
				button.style.display = 'block';
			}
		}else if(user == 1038){
			let buttons2 = document.querySelectorAll('#buttons2');
			for (let button2 of buttons2) {
				button2.style.display = 'none';
			}

			let buttons3 = document.querySelectorAll('#buttons3');
			for (let button3 of buttons3) {
				button3.style.display = 'none';
			}
		}else{
			let buttons = document.querySelectorAll('td#buttons');
			for (let button of buttons) {
				button.style.display = 'none';
			}
		}

		$(document).ready(function(){
			$('input[type="search"]').css({
				'border' : '2px solid black'
			});
		});
	</script>