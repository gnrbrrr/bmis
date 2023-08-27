<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_lupon WHERE lpn_id = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();
	

?>


<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php'">Back to List</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Lupon</h3>
				<p class="text-muted m-b-30 font-13"> View Lupon Record</p>
					<?php
						if($errorMessage == 'Modified successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
						else if($errorMessage == 'Category already exist! Data entry failed.')
						{
					?>							
							<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php								
						}else{}
					?>
							
				
						
			<div class="modal-body">		
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="#">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Usaping Brgy BLG:</label>
                                                        <input type="text" id="usp_brgy_blg" class="form-control" name="usp_brgy_blg" value="<?php echo $sql_data['lpn_usp_brgy_blg'];?>" readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Ukol sa:</label>
														<input type="text" id="ukol_sa" class="form-control" name="ukol_sa" value="<?php echo $sql_data['lpn_ukol_sa'];?>" readonly><br/> 
													</div>
                                                </div>
												 <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Date:</label>
                                                        <input type="date" id="date" class="form-control" name="date" value="<?php echo $sql_data['lpn_date'];?>" readonly><br/> 
													</div>
                                                </div>
											</div>
											<div class="row">
												 <div class="col-md-5" style="width:700px;">
                                                    <div class="form-group">
                                                        <label class="control-label">Pangalan ng Unang may sumbong (Complainant/s):</label>
														<table>
														<tr style="align-items:center;">
																<td><input type="text" id="complaints1_firstname" class="form-control" name="complaints1_firstname" value="<?php echo $sql_data['lpn_complaints1_firstname'];?>" readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints1_middlename" class="form-control" name="complaints1_middlename" value="<?php echo $sql_data['lpn_complaints1_middlename'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints1_lastname" class="form-control" name="complaints1_lastname" value="<?php echo $sql_data['lpn_complaints1_lastname'];?>"readonly></td>
														</tr>
														</table>
													</div>
                                                </div>			
											</div>
											<div class="row">
												 <div class="col-md-5" style="width:700px;">
                                                    <div class="form-group">
                                                        <label class="control-label">Pangalan ng Pangalawang may sumbong (Complainant/s):</label>
														<table>
														<tr style="align-items:center;">
																<td><input type="text" id="complaints2_firstname" class="form-control" name="complaints2_firstname" value="<?php echo $sql_data['lpn_complaints2_firstname'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints2_middlename" class="form-control" name="complaints2_middlename" value="<?php echo $sql_data['lpn_complaints2_middlename'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints2_lastname" class="form-control" name="complaints2_lastname" value="<?php echo $sql_data['lpn_complaints2_lastname'];?>"readonly></td>
														</tr>
														</table>
													</div>
                                                </div>			
											</div>
											<div class="row">
												 <div class="col-md-5" style="width:700px;">
                                                    <div class="form-group">
                                                        <label class="control-label">Pangalan ng Pangatlong may sumbong (Complainant/s):</label>
														<table>
														<tr style="align-items:center;">
																<td><input type="text" id="complaints3_firstname" class="form-control" name="complaints3_firstname" value="<?php echo $sql_data['lpn_complaints3_firstname'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints3_middlename" class="form-control" name="complaints3_middlename" value="<?php echo $sql_data['lpn_complaints3_middlename'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints3_lastname" class="form-control" name="complaints3_lastname" value="<?php echo $sql_data['lpn_complaints3_lastname'];?>"readonly></td>
														</tr>
														</table>
													</div>
                                                </div>			
											</div>
											
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Contact Number:</label>
                                                        <input type="number" id="contactno" class="form-control" name="contactno" value="<?php echo $sql_data['lpn_contactno'];?>" readonly><br/>
													</div>
                                                </div>                                               
											</div>
											<div class="row">
												<div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Tirahan ng (mga) may sumbong (complainant/s):</label>
                                                        <textarea type="text" id="tirahan_sumbong" class="form-control" name="tirahan_sumbong" readonly><?php echo $sql_data['lpn_tirahan_sumbong']; ?></textarea><br/>
													</div>
                                                </div>                                                
                                            </div>										
											<h4 class="box-title m-b-0">Laban Kay/Kina</h4>	
											<hr>
											<div class="row">
												<div class="col-md-5" style="width:700px;">
													<div class="form-group">
														<label class="control-label">Pangalan ng Unang ipinagsu-sumbong (Respondent/s):</label>
														<table>
															<tr style="align-items:center;">
																<td><input type="text" id="respondent1_firstname" class="form-control" placeholder="First Name" name="respondent1_firstname" value="<?php echo $sql_data['lpn_respondent1_firstname'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent1_middlename" class="form-control" placeholder="Middle Name" name="respondent1_middlename" value="<?php echo $sql_data['lpn_respondent1_middlename'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent1_lastname" class="form-control" placeholder="Last Name" name="respondent1_lastname" value="<?php echo $sql_data['lpn_respondent1_lastname'];?>"readonly></td>
															</tr>
														</table>
													</div>
												</div>			
											</div>
											<div class="row">
												<div class="col-md-5" style="width:700px;">
													<div class="form-group">
														<label class="control-label">Pangalan ng Pangalawang ipinagsu-sumbong (Respondent/s):</label>
														<table>
															<tr style="align-items:center;">
																<td><input type="text" id="respondent2_firstname" class="form-control" placeholder="First Name" name="respondent2_firstname" value="<?php echo $sql_data['lpn_respondent2_firstname'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent2_middlename" class="form-control" placeholder="Middle Name" name="respondent2_middlename" value="<?php echo $sql_data['lpn_respondent2_middlename'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent2_lastname" class="form-control" placeholder="Last Name" name="respondent2_lastname" value="<?php echo $sql_data['lpn_respondent2_lastname'];?>"readonly></td>
															</tr>
														</table>
													</div>
												</div>			
											</div>
											<div class="row">
												<div class="col-md-5" style="width:700px;">
													<div class="form-group">
														<label class="control-label">Pangalan ng Pangatlong ipinagsu-sumbong (Respondent/s):</label>
														<table>
															<tr style="align-items:center;">
																<td><input type="text" id="respondent3_firstname" class="form-control" placeholder="First Name" name="respondent3_firstname" value="<?php echo $sql_data['lpn_respondent3_firstname'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent3_middlename" class="form-control" placeholder="Middle Name" name="respondent3_middlename" value="<?php echo $sql_data['lpn_respondent3_middlename'];?>"readonly></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent3_lastname" class="form-control" placeholder="Last Name" name="respondent3_lastname" value="<?php echo $sql_data['lpn_respondent3_lastname'];?>"readonly></td>
															</tr>
														</table>
													</div>
												</div>			
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Contact Number:</label>
                                                        <input type="number" id="contactno1" class="form-control" name="contactno1" value="<?php echo $sql_data['lpn_contactno1']; ?>" readonly><br/>
													</div>
                                                </div>			
											</div> 											
											<div class="row">
												<div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Tirahan ng (mga) may sumbong (complainant/s):</label>
                                                        <textarea type="text" id="tirahan_sumbong1" class="form-control" name="tirahan_sumbong1" readonly><?php echo $sql_data['lpn_tirahan_sumbong1']; ?></textarea><br/>
													</div>
                                                </div>
                                            </div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Unang Kasunduan:</label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan1" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $sql_data['kasunduan1']; ?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pangalawang Kasunduan:</label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan2" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $sql_data['kasunduan2']; ?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pangatlong Kasunduan:</label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan3" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $sql_data['kasunduan3']; ?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pang apat Kasunduan:</label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan4" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $sql_data['kasunduan4']; ?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pang lima Kasunduan:</label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan5" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $sql_data['kasunduan5']; ?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Narrative:</label>
                                                        <textarea type="text" id="narrative" class="form-control" name="narrative" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $sql_data['lpn_narrative']; ?></textarea><br/>
													</div>
                                                 </div>                                              
											</div>

												<!-- SUMMONS TABLE START  -->
											<div class="col-md-12">
												<div class="white-box">
													<div class="table-responsive">
														<a href="index.php?view=add_summon&id=<?php echo $sql_data['lpn_id']; ?>" class="btn btn-success waves-effect waves-light btn-xs"><span style="color:white;"> Add Lupon Summons</span></a>
														<table id="t1" class="display nowrap">
															<thead>
																<tr>
																	<th>Date</th>
																	<th>Complainants</th>
																	<th>Respondents</th>
																	<th>Print</th>
																	<th>Action</th>
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
																	$sum = $conn->prepare("SELECT * FROM tbl_lupon_summons WHERE is_deleted != '1' AND lpn_id = '$id'");
																	$sum->execute();
																	while($sum_data = $sum->fetch()){
																		$complainants = "";
																		$respondents = "";
																		$date_summon = date("M d, Y", strtotime($sum_data['date_summon']));
																		
																		if($sum_data['complainant1_firstname'] && $sum_data['complainant1_lastname']){
																			$complainants = $sum_data['complainant1_firstname'] . " " . $sum_data['complainant1_middlename'] . " " . $sum_data['complainant1_lastname'];
																			if($sum_data['complainant2_firstname'] && $sum_data['complainant2_lastname']){
																				$complainants = $sum_data['complainant1_firstname'] . " " . $sum_data['complainant1_middlename'] . " " . $sum_data['complainant1_lastname'] . ", " . $sum_data['complainant2_firstname'] . " " . $sum_data['complainant2_middlename'] . " " . $sum_data['complainant2_lastname'];
																				if($sum_data['complainant3_firstname'] && $sum_data['complainant3_lastname']){
																					$complainants = $sum_data['complainant1_firstname'] . " " . $sum_data['complainant1_middlename'] . " " . $sum_data['complainant1_lastname'] . ", " . $sum_data['complainant2_firstname'] . " " . $sum_data['complainant2_middlename'] . " " . $sum_data['complainant2_lastname'] . ", " . $sum_data['complainant3_firstname'] . " " . $sum_data['complainant3_middlename'] . " " . $sum_data['complainant3_lastname'];
																				}else{

																				}
																			}else{

																			}
																		}else{

																		}

																		if($sum_data['respondent1_firstname'] && $sum_data['respondent1_lastname']){
																			$respondents = $sum_data['respondent1_firstname'] . " " . $sum_data['respondent1_middlename'] . " " . $sum_data['respondent1_lastname'];
																			if($sum_data['respondent2_firstname'] && $sum_data['respondent2_lastname']){
																				$respondents = $sum_data['respondent1_firstname'] . " " . $sum_data['respondent1_middlename'] . " " . $sum_data['respondent1_lastname'] . ", " . $sum_data['respondent2_firstname'] . " " . $sum_data['respondent2_middlename'] . " " . $sum_data['respondent2_lastname'];
																				if($sum_data['respondent3_firstname'] && $sum_data['respondent3_lastname']){
																					$respondents = $sum_data['respondent1_firstname'] . " " . $sum_data['respondent1_middlename'] . " " . $sum_data['respondent1_lastname'] . ", " . $sum_data['respondent2_firstname'] . " " . $sum_data['respondent2_middlename'] . " " . $sum_data['respondent2_lastname'] . ", " . $sum_data['respondent3_firstname'] . " " . $sum_data['respondent3_middlename'] . " " . $sum_data['respondent3_lastname'];
																				}else{

																				}
																			}else{

																			}
																		}else{

																		}

																?>
																	<tr>
																		<td><?php echo $date_summon; ?></td>
																		<td><?php echo $complainants; ?></td>
																		<td><?php echo $respondents; ?></td>
																		<td style="text-align:center;">
																			<a href="<?php echo WEB_ROOT; ?>lupon/summon_cert.php?id=<?php echo $sum_data['sm_id']; ?>"><i class="fa fa-print fa-fw" style="color:#337ab7;"></i></a>
																		</td>
																		<td>
																			<a href="index.php?view=detail_summon&id=<?php echo $sum_data['sm_id']; ?>" class="btn btn-warning waves-effect waves-light"><i class="fa fa-eye m-l-5" style="color:white;"></i> <span style="color:white;">View</span></a>
																			&nbsp;
																			<a href="index.php?view=modify_summon&id=<?php echo $sum_data['sm_id']; ?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-edit m-l-5" style="color:white;"></i> <span style="color:white;">Edit</span></a>
																			&nbsp;
																			<a href="process.php?action=delete_summon&id=<?php echo $sum_data['sm_id']; ?>" class="btn btn-danger waves-effect waves-light" onClick="return confirmDelete()" style="color:white;"> <i class="fa fa-trash m-l-5"></i> <span style="color:white;">Delete</span></a>
																		</td>
																	</tr>
																<?php
																	}
																?>
															</tbody>
														</table>
													</div>
												</div>
											</div> <!-- SUMMONS TABLE END -->


										</div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-actions">
						<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
                    	<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php'">Back</button>
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
	<script>
		$(document).ready(function() {
			$('input[type="search"]').css({
				'border': '2px solid black'
			});
		});
	</script>
<?php
}else{
	echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
}
?>