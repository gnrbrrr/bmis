<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_certificate WHERE is_deleted != '1' AND is_show = '1' ORDER BY cer_id");
$sql->execute();

$sql7 = $conn->prepare("SELECT * FROM tbl_certificate WHERE is_deleted != '1' AND is_show = '1' ORDER BY cer_id");
$sql7->execute();

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
<head>
<style>
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
.select2 {
	border-bottom:solid 2px #666600;
	border-top:solid 0px #666600;
	border-left:solid 0px #666600;
	border-right:solid 0px #666600;
	width:227px;
	background:transparent;
}

.btn_bx {
	width: 117px;
	height:37px;
	font-weight:bold;
	font-size:17px;
}

.par
{   
   color: #666666 !important;
   font-family: Arial !important;  
   font-size:12px !important;
}
</style>
</head>
	<div class="row">
		<div class="col-lg-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Document Request</h3>
				<p class="text-muted m-b-30">Display list of Document Request</p>
					<?php
						if($errorMessage == 'Deleted successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}else{}
					?>
				<div class="vtabs">
					<ul class="nav tabs-vertical">
						<?php
							if($sql->rowCount() > 0)
							{
								while($sql_data = $sql->fetch())
								{
						?>
									<li class="tab" style="border: solid 0px; width:200px;">
										<a data-toggle="tab" href="#<?php echo $sql_data['cer_id']; ?>" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs" style="font-size:11px;"><?php echo $sql_data['cer_name']; ?></span> </a>
									</li>
						<?php
								} // End While
							}else{}
						?>
					</ul>
					
					<div class="tab-content" style="border: solid 1px; width:100%;">
						
						<?php
							if($sql7->rowCount() > 0)
							{
								while($sql7_data = $sql7->fetch())
								{
									$cerid = $sql7_data['cer_id'];
						?>
									
									<div id="<?php echo $sql7_data['cer_id']; ?>" class="tab-pane">
										<form method="post" action="add.php" class="nyroModal">
										<h4 style="color:#3366ff; font-weight:bold;"><?php echo $sql7_data['cer_name']; ?></h4>
										<br />
											<?php
												if($sql7_data['cer_id'] == '1003' || $sql7_data['cer_id'] == '1009')
												{
											?>
													<h5 class="m-t-30">Choose Business</h5>
													<select name="bus" class="select2">
														<?php
															$bus = $conn->prepare("SELECT * FROM tbl_business WHERE is_deleted != '1' ORDER BY businessname");
															$bus->execute();
															if($bus->rowCount() > 0)
															{
																while($bus_data = $bus->fetch())
																{
														?>														
																	<option value="<?php echo $bus_data['b_id']; ?>"><?php echo $bus_data['businessname']; ?></option>
														<?php
																} // End While
															}else{}
														?>
													</select>
													<input type="hidden" name="cerid" value="<?php echo $sql7_data['cer_id']; ?>" />
													&nbsp;
													<input type="submit" value="Search" class="btn btn-success btn_bx" />
													<br /><br />
													<div class="table-responsive">				
														<table id="<?php echo $sql7_data['table_id']; ?>" class="display nowrap" style="width:100%;">
															<thead>
																<tr>
																	<th>Book No.</th>
																	<th>Owner's Name</th>
																	<th>Business Name</th>
																	<th>Business Type</th>
																	<th>OR No.</th>
																	<th>Amount</th>
																	<th>Date Issued</th>
																	<th>Clearance Type</th>
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
																	<th></th>
																</tr>
															</tfoot>
															<tbody>
																<?php
																	$drb = $conn->prepare("SELECT * FROM tbl_business b, tbl_document_request r 
																								WHERE b.b_id = r.b_id AND r.is_deleted != '1' AND r.cer_id = '$cerid'");
																	$drb->execute();
																	if($drb->rowCount() > 0)
																	{
																		while($drb_data = $drb->fetch())
																		{
																			$dtissued_b = date("M d, Y", strtotime($drb_data['date_issued']));
																?>
																			<tr>
																				<td><?php echo $drb_data['book_no']; ?></td>
																				<td><?php echo $drb_data['ownername']; ?></td>
																				<td><?php echo $drb_data['businessname']; ?></td>
																				<td><?php echo $drb_data['typeofbusiness']; ?></td>
																				<td><?php echo $drb_data['or_num']; ?></td>
																				<td>&#8369;<?php echo number_format($drb_data['amount'], 2); ?></td>
																				<td><?php echo $dtissued_b; ?></td>
																				<td><?php echo $drb_data['clearance_type']; ?></td>
																			</tr>
																<?php
																		} // End While
																	}else{}
																?>
															</tbody>
														</table>
														
													</div>
													
											<?php
												}else{
											?>
													<h5 class="m-t-30">Choose Resident</h5>
													<select name="res" class="select2">
														<?php
															$res = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' ORDER BY lastname");
															$res->execute();
															if($res->rowCount() > 0)
															{
																while($res_data = $res->fetch())
																{
														?>														
																	<option value="<?php echo $res_data['r_id']; ?>"><?php echo $res_data['firstname']; ?> <?php echo $res_data['middlename']; ?> <?php echo $res_data['lastname']; ?></option>
														<?php
																} // End While
															}else{}
														?>
													</select>
													<input type="hidden" name="cerid" value="<?php echo $sql7_data['cer_id']; ?>" />
													&nbsp;
													<input type="submit" value="Search" class="btn btn-success btn_bx" />
													<br /><br />
													<div class="table-responsive">				
														<table id="<?php echo $sql7_data['table_id']; ?>" class="display nowrap" style="width:100%;">
															<thead>
																<tr>
																	<th>Reference No.</th>
																	<th>Requestor's Name</th>
																	<th>Purpose</th>																	
																	<th>Amount</th>
																	<th>Date Issued</th>
																	<th>Print</th>
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
																</tr>
															</tfoot>
															<tbody>
																<?php
																	$drr = $conn->prepare("SELECT * FROM tbl_resident b, tbl_document_request r 
																								WHERE b.r_id = r.r_id AND r.is_deleted != '1' AND r.cer_id = '$cerid'");
																	$drr->execute();
																	if($drr->rowCount() > 0)
																	{
																		while($drr_data = $drr->fetch())
																		{
																			$dtissued_r = date("M d, Y", strtotime($drr_data['date_issued']));
																?>
																			<tr>
																				<td><?php echo $drr_data['reference_num']; ?></td>
																				<td><?php echo $drr_data['firstname']; ?> <?php echo $drr_data['middlename']; ?> <?php echo $drr_data['lastname']; ?></td>																				
																				<td><?php echo $drr_data['or_num']; ?></td>
																				<td>&#8369;<?php echo number_format($drr_data['amount'], 2); ?></td>
																				<td><?php echo $dtissued_r; ?></td>
																				<td>
																					<a href="<?php echo WEB_ROOT; ?>certificate/<?php echo $sql7_data['page']; ?>.php?id=<?php echo $drr_data['uid']; ?>">With Sig</a>
																					&nbsp;
																					<a href="<?php echo WEB_ROOT; ?>certificate/<?php echo $sql7_data['page_noid']; ?>.php?id=<?php echo $drr_data['uid']; ?>">Without Sig</a>
																				</td>
																			</tr>
																<?php
																		} // End While
																	}else{}
																?>
															</tbody>
														</table>
														
													</div>
													
											<?php
												}
											?>
											
											
										</form>
									</div>																		
										
							<?php
									} // End While
								}else{}
							?>
							
					</div>	
					
				</div>
			</div>
		</div>
	</div>
</form>