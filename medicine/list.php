<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_medical_record WHERE is_deleted != '1' GROUP BY res_id");
$sql->execute();


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


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
</style>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css"> -->
</head>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Medicine Records</h3>
				<p class="text-muted m-b-30">Display list of Medicine Records</p></p>
					<form method="post" action="index.php?view=add">
						&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10"><br /><br /><br /><br />
						
					<form>										
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
				<div class="table-responsive">				
					<table id="example23" class="display nowrap">
						<thead>
							<tr>
								<th>Resident</th>
								<th>Birthday</th>
								<th>Age</th>
								<th>Gender</th>								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>													
							</tr>
						</tfoot>
						<tbody>
							
							<?php
								if($sql->rowCount() > 0)
								{
									$col_a = 1001;
									$coll_a = 1001;
									while($sql_data = $sql->fetch())
									{
										
										
										$resid = $sql_data['res_id'];
										
										$res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$resid' AND is_deleted != '1'");
										$res->execute();
										if($res->rowCount() > 0)
										{
											$res_data = $res->fetch();
											$fullname = $res_data['lastname'] . ', ' . $res_data['firstname'] . ' ' . $res_data['middlename'];
											$birthdate = date("M d, Y", strtotime($res_data['birthdate']));
											$age = $res_data['age'];
											$gender = $res_data['gender'];
											$rid = $res_data['r_id'];
										}else{ $fullname = '-- --'; $birthdate = '-- --'; $age = '-- --'; $gender = '-- --'; $rid = 0; }
							?>
										<tr>
											<td>
												<div id="col2" class="unhidden">
													<a href="javascript:unhide('<?php echo $col_a++; ?>','col2');" title="View Details"><b><?php echo $fullname; ?></b></a>
												</div>
													<div id="<?php echo $coll_a++; ?>" class="hidden">
													
														<div class="table-responsive">				
															<table id="example23" class="display nowrap">
																<thead>
																	<tr>																		
																		<th>Medicine</th>
																		<th>Qty</th>
																		<th>Date</th>
																		<th>Remarks</th>
																		<th></th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th></th>
																		<th></th>
																		<th></th>
																		<th></th>
																		<th></th>								
																	</tr>
																</tfoot>
																<tbody>
																	
																	<?php
																		$sql7 = $conn->prepare("SELECT * FROM tbl_resident r, tbl_medical_record m WHERE r.r_id = '$rid' AND r.r_id = m.res_id AND m.is_deleted != '1'");
																		$sql7->execute();
																		if($sql7->rowCount() > 0)
																		{
																			while($sql7_data = $sql7->fetch())
																			{
																				
																				$reqdate = date("M d, Y", strtotime($sql7_data['med_datereq']));
																				
																				$fullname = $sql7_data['lastname'] . ', ' . $sql7_data['firstname'] . ' ' . $sql7_data['middlename'];
																	?>
																				<tr>																					
																					<td><?php echo $sql7_data['med_req']; ?></td>
																					<td><?php echo $sql7_data['med_qty']; ?></td>
																					<td><?php echo $reqdate; ?></td>
																					<td><?php echo $sql7_data['remarks']; ?></td>
																					<td>		
																						<a href="index.php?view=detail&id=<?php echo $sql7_data['uid']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
																						&nbsp;
																						<a href="index.php?view=modify&id=<?php echo $sql7_data['uid']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
																						&nbsp;
																						<a href="process.php?action=delete&id=<?php echo $sql7_data['uid']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
																					</td>
																				</tr>
																	<?php
																			} // End While
																		}else{}
																	?>
																	
																</tbody>
															</table>
														</div>
														
													</div>
											</td>
											<td valign="top"><?php echo $birthdate; ?></td>
											<td valign="top"><?php echo $age; ?></td>
											<td valign="top"><?php echo $gender; ?></td>											
										</tr>
							<?php
									} // End While
								}else{}
							?>
							
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
	<style>
		input[type="search"]{
			border:2px solid black;
		}
	</style>
	<script>
		$(document).ready(function() {
			$.ajax({
				url: "inventory_checker.php",
				success: function(data){
					if(data){

						var medicines = data;
						console.log(medicines);

						if(medicines != "" && medicines != "No medicines"){

							swal.fire({
								icon: 'warning',
								title: "These Medicine(s) are low on stock!",
								text: medicines,
								html: medicines,
								showConfirmButton: true,
								showCancelButton: false,
								cancelButtonText: "Back",
								confirmButtonText: "I Understand",
								reverseButtons:true,
								cancelButtonColor: '#0275d8',
								confirmButtonColor: '#7C5',
								allowOutsideClick: false,
							}).then((result) =>{
								if(result.isConfirmed){
									swal.close();
									// window.location.href = "../inventory/index.php";
								}else{
									
								}
							})
						}else if(medicines == "No medicines"){
							swal.fire({
								icon: 'warning',
								title: "There are no Medicine(s) in stock",
								// text: medicines,
								// html: medicines,
								showConfirmButton: true,
								showCancelButton: false,
								cancelButtonText: "Back",
								confirmButtonText: "Head to Inventory",
								reverseButtons:true,
								cancelButtonColor: '#0275d8',
								confirmButtonColor: '#7C5',
								allowOutsideClick: false,
							}).then((result) =>{
								if(result.isConfirmed){
									swal.close();
									window.location.href = "../inventory/index.php";
								}else{
									
								}
							})
						}
					}else{

					}
				}
			});
		});
	</script>