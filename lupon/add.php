<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php'">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Lupon Tagapamayapa</h3>
					<?php
						if($errorMessage == 'Added successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
						else if($errorMessage == 'Client already exist! Data entry failed.')
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
                                                        <input type="text" id="usp_brgy_blg" class="form-control" name="usp_brgy_blg" autocomplete=off><br/>
													</div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Ukol sa:</label>
														<input type="text" id="ukol_sa" class="form-control" name="ukol_sa" autocomplete=off><br/> 
													</div>
                                                </div>
												 <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Date:</label>
                                                        <input type="date" id="date" class="form-control" name="date"><br/> 
													</div>
                                                </div>
											</div>
											<div class="row">
												 <div class="col-md-5" style="width:700px;">
                                                    <div class="form-group">
														<label class="control-label">Pangalan ng Unang may Sumbong (Complainant/s):</label>
														<table>
															<tr style="align-items:center;">
																<td><input type="text" id="complaints1_firstname" class="form-control" placeholder="First Name" name="complaints1_firstname" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints1_middlename" class="form-control" placeholder="Middle Name" name="complaints1_middlename" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complains1_lastname" class="form-control" placeholder="Last Name" name="complaints1_lastname" /></td>
															</tr>
														</table>
													</div>
                                                </div>			
											</div>
											
											<div class="row">
												 <div class="col-md-5" style="width:700px;">
                                                    <div class="form-group">
														<label class="control-label">Pangalan ng Pangalawang may Sumbong (Complainant/s):</label>
														<table>
															<tr style="align-items:center;">
																<td><input type="text" id="complaints2_firstname" class="form-control" placeholder="First Name" name="complaints2_firstname" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints2_middlename" class="form-control" placeholder="Middle Name" name="complaints2_middlename" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints2_lastname" class="form-control" placeholder="Last Name" name="complaints2_lastname" /></td>
															</tr>
														</table>
													</div>
                                                </div>			
											</div>
											
											<div class="row">
												 <div class="col-md-5" style="width:700px;">
                                                    <div class="form-group">
														<label class="control-label">Pangalan ng Pangatlong may Sumbong (Complainant/s):</label>
														<table>
															<tr style="align-items:center;">
																<td><input type="text" id="complaints3_firstname" class="form-control" placeholder="First Name" name="complaints3_firstname" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints3_middlename" class="form-control" placeholder="Middle Name" name="complaints3_middlename" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints3_lastname" class="form-control" placeholder="Last Name" name="complaints3_lastname" /></td>
															</tr>
														</table>
													</div>
                                                </div>			
											</div>
											
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Contact Number:</label>
														<input type="text" id="contactno" class="form-control" name="contactno" autocomplete=off><br/>
													</div>
												</div>                                               
											</div>
											<div class="row">
												<div class="col-md-5">
													<div class="form-group">
														<label class="control-label">Tirahan ng (mga) may sumbong (complainant/s):</label>
														<textarea type="text" id="tirahan_sumbong" class="form-control" name="tirahan_sumbong"></textarea><br/>
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
																<td><input type="text" id="respondent1_firstname" class="form-control" placeholder="First Name" name="respondent1_firstname" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent1_middlename" class="form-control" placeholder="Middle Name" name="respondent1_middlename" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent1_lastname" class="form-control" placeholder="Last Name" name="respondent1_lastname" /></td>
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
																<td><input type="text" id="respondent2_firstname" class="form-control" placeholder="First Name" name="respondent2_firstname" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent2_middlename" class="form-control" placeholder="Middle Name" name="respondent2_middlename" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent2_lastname" class="form-control" placeholder="Last Name" name="respondent2_lastname" /></td>
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
																<td><input type="text" id="respondent3_firstname" class="form-control" placeholder="First Name" name="respondent3_firstname" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent3_middlename" class="form-control" placeholder="Middle Name" name="respondent3_middlename" /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent3_lastname" class="form-control" placeholder="Last Name" name="respondent3_lastname" /></td>
															</tr>
														</table>
													</div>
												</div>			
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Contact Number:</label>
                                                        <input type="text" id="contactno1" class="form-control" name="contactno1" autocomplete=off><br/>
													</div>
                                                </div>			
											</div> 											
											<div class="row">
												<div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Tirahan ng (mga) may sumbong (complainant/s):</label>
                                                        <textarea type="text" id="tirahan_sumbong1" class="form-control" name="tirahan_sumbong1"></textarea><br/>
													</div>
                                                </div>
                                            </div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Unang Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan1" style="resize:vertical; min-height:60px; max-height:300px;"></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pangalawang Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan2" style="resize:vertical; min-height:60px; max-height:300px;"></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pangatlong Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan3" style="resize:vertical; min-height:60px; max-height:300px;"></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pang apat Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan4" style="resize:vertical; min-height:60px; max-height:300px;"></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pang lima Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan5" style="resize:vertical; min-height:60px; max-height:300px;"></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Narrative:</label>
                                                        <textarea type="text" id="narrative" class="form-control" name="narrative" style="resize:vertical; min-height:60px; max-height:300px;"></textarea><br/>
													</div>
                                                 </div>                                              
											</div>											
										</div>                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-actions">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
                    <button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php'">Cancel</button>
                    </div>
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