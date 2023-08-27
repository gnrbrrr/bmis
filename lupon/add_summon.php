<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

	if(isset($_POST['id'])){
		$lpn_id = $_POST['id'];
	}else{
		$lpn_id = $_GET['id'];
	}

	$lpn = $conn->prepare("SELECT * FROM tbl_lupon WHERE lpn_id = '$lpn_id'");
	$lpn->execute();
	$lpn_data = $lpn->fetch();

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php'">Back to List</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add_summon" enctype="multipart/form-data" name="form" id="form">
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
                                                        <input type="text" id="usp_brgy_blg" class="form-control" name="usp_brgy_blg" value="<?php echo $lpn_data['lpn_usp_brgy_blg']; ?>" autocomplete=off readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Ukol sa:</label>
														<input type="text" id="ukol_sa" class="form-control" name="ukol_sa" value="<?php echo $lpn_data['lpn_ukol_sa']; ?>" autocomplete=off readonly><br/> 
													</div>
                                                </div>
												<div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Date:</label>
                                                        <input type="date" id="date" class="form-control" name="date"><br/> 
													</div>
                                                </div>
												<div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Time:</label>
                                                        <input type="time" id="time" class="form-control" name="time"><br/>
													</div>
                                                </div>
											</div>
											<div class="row">
												 <div class="col-md-5" style="width:700px;">
                                                    <div class="form-group">
														<label class="control-label">Pangalan ng Unang may Sumbong (Complainant/s):</label>
														<table>
															<tr style="align-items:center;">
																<td><input type="text" id="complaints1_firstname" class="form-control" placeholder="First Name" name="complaints1_firstname" value="<?php echo $lpn_data['lpn_complaints1_firstname']; ?>" autocomplete =off readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints1_middlename" class="form-control" placeholder="Middle Name" name="complaints1_middlename" value="<?php echo $lpn_data['lpn_complaints1_middlename']; ?>" autocomplete=off readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complains1_lastname" class="form-control" placeholder="Last Name" name="complaints1_lastname" value="<?php echo $lpn_data['lpn_complaints1_lastname']; ?>" autocomplete=off readonly/></td>
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
																<td><input type="text" id="complaints2_firstname" class="form-control" placeholder="First Name" name="complaints2_firstname" value="<?php echo $lpn_data['lpn_complaints2_firstname'];?>" autocomplete=off readonly /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints2_middlename" class="form-control" placeholder="Middle Name" name="complaints2_middlename" value="<?php echo $lpn_data['lpn_complaints2_middlename'];?>" autocomplete=off readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints2_lastname" class="form-control" placeholder="Last Name" name="complaints2_lastname" value="<?php echo $lpn_data['lpn_complaints2_lastname'];?>" autocomplete=off readonly/></td>
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
																<td><input type="text" id="complaints3_firstname" class="form-control" placeholder="First Name" name="complaints3_firstname" value="<?php echo $lpn_data['lpn_complaints3_firstname'];?>" autocomplete=off readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints3_middlename" class="form-control" placeholder="Middle Name" name="complaints3_middlename" value="<?php echo $lpn_data['lpn_complaints3_middlename'];?>" autocomplete=off readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="complaints3_lastname" class="form-control" placeholder="Last Name" name="complaints3_lastname" value="<?php echo $lpn_data['lpn_complaints3_lastname'];?>" autocomplete=off readonly /></td>
															</tr>
														</table>
													</div>
                                                </div>			
											</div>
											
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Contact Number:</label>
														<input type="text" id="contactno" class="form-control" name="contactno" value="<?php echo $lpn_data['lpn_contactno'];?>"autocomplete=off readonly><br/>
													</div>
												</div>                                               
											</div>
											<div class="row">
												<div class="col-md-5">
													<div class="form-group">
														<label class="control-label">Tirahan ng (mga) may sumbong (complainant/s):</label>
														<textarea type="text" id="tirahan_sumbong" class="form-control" name="tirahan_sumbong" readonly><?php echo $lpn_data['lpn_tirahan_sumbong'];?> </textarea><br/>
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
																<td><input type="text" id="respondent1_firstname" class="form-control" placeholder="First Name" name="respondent1_firstname" value="<?php echo $lpn_data['lpn_respondent1_firstname'];?>" readonly /></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent1_middlename" class="form-control" placeholder="Middle Name" name="respondent1_middlename" value="<?php echo $lpn_data['lpn_respondent1_middlename'];?>" readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent1_lastname" class="form-control" placeholder="Last Name" name="respondent1_lastname" value="<?php echo $lpn_data['lpn_respondent1_lastname'];?>" readonly/></td>
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
																<td><input type="text" id="respondent2_firstname" class="form-control" placeholder="First Name" name="respondent2_firstname" value="<?php echo $lpn_data['lpn_respondent2_firstname'];?>" readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent2_middlename" class="form-control" placeholder="Middle Name" name="respondent2_middlename" value="<?php echo $lpn_data['lpn_respondent2_middlename'];?>" readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent2_lastname" class="form-control" placeholder="Last Name" name="respondent2_lastname" value="<?php echo $lpn_data['lpn_respondent2_lastname'];?>" readonly/></td>
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
																<td><input type="text" id="respondent3_firstname" class="form-control" placeholder="First Name" name="respondent3_firstname" value="<?php echo $lpn_data['lpn_respondent3_firstname'];?>" readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent3_middlename" class="form-control" placeholder="Middle Name" name="respondent3_middlename" value="<?php echo $lpn_data ['lpn_respondent3_middlename'];?>" readonly/></td>
																<td style="width:20px;"><br /></td>
																<td><input type="text" id="respondent3_lastname" class="form-control" placeholder="Last Name" name="respondent3_lastname" value="<?php echo $lpn_data ['lpn_respondent3_lastname'];?>" readonly/></td>
															</tr>
														</table>
													</div>
												</div>			
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Contact Number:</label>
                                                        <input type="text" id="contactno1" class="form-control" name="contactno1" autocomplete=off readonly value="<?php echo $lpn_data ['lpn_contactno1']; ?>"><br/>
													</div>
                                                </div>			
											</div> 											
											<div class="row">
												<div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Tirahan ng (mga) may sumbong (complainant/s):</label>
                                                        <textarea type="text" id="tirahan_sumbong1" class="form-control" name="tirahan_sumbong1" readonly><?php echo $lpn_data['lpn_tirahan_sumbong1'];?></textarea><br/>
													</div>
                                                </div>
                                            </div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Unang Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan1" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $lpn_data['kasunduan1'];?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pangalawang Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan2" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $lpn_data['kasunduan2'];?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pangatlong Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan3" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $lpn_data['kasunduan3'];?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pang apat Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan4" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $lpn_data['kasunduan4']?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pang lima Kasunduan: <label style="color:red">Paalala: Huwag lagyan kung walang ilalagay</label></label>
                                                        <textarea type="text" id="kasunduan" class="form-control" name="kasunduan5" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $lpn_data['kasunduan5']?></textarea><br/>
													</div>
                                                 </div>
											</div>
											<div class="row">
												 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Narrative:</label>
                                                        <textarea type="text" id="narrative" class="form-control" name="narrative" style="resize:vertical; min-height:60px; max-height:300px;" readonly><?php echo $lpn_data['lpn_narrative'];?></textarea><br/>
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
						<input type="hidden" name="id" value=<?php echo $lpn_data['lpn_id']; ?> />
                    	<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
                    	<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php?view=detail&id=<?php echo $lpn_data['lpn_id']?>'">Cancel</button>
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

<!-- <script>
document.getElementById('update-list-button').addEventListener('click', function() {
    $.ajax({
        url: 'path/to/your/server/script.php',
        method: 'GET',
        success: function(data) {
            $('#t1 tbody').html(data);
        }
    });
});
</script> -->
