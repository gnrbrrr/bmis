<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM bs_client WHERE cid = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();
	
	if ($sql_data['thumbnail']) {
		$thumbnail7 = WEB_ROOT . 'images/client/' . $sql_data['thumbnail'];
	} else {
		$thumbnail7 = WEB_ROOT . 'images/client/noimage_large.png';
	}

	$clientid = $sql_data['cid'];
?>

	<div class="row">
		<div class="col-md-5">
			<div class="white-box">
				<div class="user-bg"> <img width="100%" alt="user" src="<?php echo $thumbnail7; ?>">
					<div class="overlay-box">
						<div class="user-content">
							<a href="javascript:void(0)"><img src="<?php echo $thumbnail7; ?>" class="thumb-lg img-circle" alt="img"></a>
							<h4 class="text-white"><?php echo utf8_encode($sql_data['lastname']); ?>, <?php echo utf8_encode($sql_data['firstname']); ?> <?php echo utf8_encode($sql_data['middlename']); ?></h4>
							<h5 class="text-white"><?php echo $sql_data['mobile']; ?></h5>
							<p class="text-white"><?php echo $sql_data['job_position']; ?></p>							
						</div>
					</div>
				</div>				
			</div>
			<div class="white-box">
				<div class="tab-content">
				<table class="table table-striped">
					<tr>						
						<td colspan="3"><?php echo $sql_data['address']; ?></td>
					</tr>
					<tr>
						<td>Birthday</td>				
						<td>:</td>
						<td><?php echo $sql_data['birthday']; ?></td>
					</tr>
					<tr>
						<td>Civil Status</td>				
						<td>:</td>
						<td><?php echo $sql_data['civil_status']; ?></td>
					</tr>
					<tr>
						<td>Gender</td>				
						<td>:</td>
						<td><?php echo $sql_data['gender']; ?></td>
					</tr>
					<tr>
						<td>Employer</td>				
						<td>:</td>
						<td><?php echo $sql_data['employer']; ?></td>
					</tr>
					<tr>
						<td>Home Telephone</td>				
						<td>:</td>
						<td><?php echo $sql_data['home_telephone']; ?></td>
					</tr>
					<tr>
						<td>Office Telephone</td>				
						<td>:</td>
						<td><?php echo $sql_data['office_telephone']; ?></td>
					</tr>
					<tr>
						<td>Monthly Income</td>				
						<td>:</td>
						<td><?php echo $sql_data['monthly_income']; ?></td>
					</tr>
					<tr>
						<td>Dependents</td>				
						<td>:</td>
						<td><?php echo $sql_data['dependents']; ?></td>
					</tr>
					<tr>
						<td>Spouse Name</td>				
						<td>:</td>
						<td><?php echo $sql_data['spouse_name']; ?></td>
					</tr>
					<tr>
						<td>Spouse Office Telephone</td>				
						<td>:</td>
						<td><?php echo $sql_data['spouse_office_telephone']; ?></td>
					</tr>
					<tr>
						<td>Spouse Monthly Income</td>				
						<td>:</td>
						<td><?php echo $sql_data['spouse_monthly_income']; ?></td>
					</tr>
				</table>
				</div>
			</div>
		</div>
					
		<div class="col-md-7">
			<div class="white-box">
				<ul class="nav nav-tabs tabs customtab">				
					<li class="home tab">
						<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Amortization Table</span> </a>
					</li>
				</ul>
				<div class="tab-content">					
					
					<div class="tab-pane active" id="settings">
						<form class="form-horizontal form-material" method="post" enctype="multipart/form-data" name="form" id="form" action="process.php?action=modify">
							<table id="myTable" class="table table-striped" style="font-size:12px;">
								<thead>
									<tr>
										<th>Due Date</th>
										<th>Monthly Due</th>										
										<th>Amount Paid</th>
										<th>Paid Date</th>
										<th>Balance</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Due Date</th>
										<th>Monthly Due</th>										
										<th>Amount Paid</th>
										<th>Paid Date</th>
										<th>Balance</th>
									</tr>
								</tfoot>
								<tbody>
									
									<?php
										
										$led = $conn->prepare("SELECT * FROM tr_loan_ledger WHERE client_id = '$clientid'");
										$led->execute();

										if($led->rowCount() > 0)
										{
											while($led_data = $led->fetch())
											{
												$duedate = date("M d, Y", strtotime($led_data['due_date']));
												
												if($led_data['paid_date'] == "")
												{ $paiddate = "-- --"; }
												else{ $paiddate = date("M d, Y", strtotime($led_data['paid_date'])); }
												
												if($led_data['balance'] != '0.00')
												{ $bal = "&#8369;" . number_format($led_data['balance'], 2); }
												else{ $bal = "-- --"; }
									?>
												<tr>
													<td style="font-size:12px;"><?php echo $duedate; ?></td>
													<td style="font-size:12px;">&#8369;<?php echo number_format($led_data['monthly_due'], 2); ?></td>
													<td style="font-size:12px;">&#8369;<?php echo number_format($led_data['amount_paid'], 2); ?></td>
													<td style="font-size:12px;"><?php echo $paiddate; ?></td>
													<td style="font-size:12px;"><?php echo $bal; ?></td>
												</tr>
									<?php
											} // End While
										}else{}
									?>
									
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}else{
	echo "<center><h3>Processing...</h3><img src='../images/loader/loader_3.gif'><center>";
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
}
?>