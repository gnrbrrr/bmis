<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM tbl_badak WHERE bdk_id = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();
	
	if($sql_data['bdk_droga_gamit'] == 1){
		$dg = 1;
		$dgamit = "Buwanan";
	} else if($sql_data['bdk_droga_gamit'] == 2){
		$dg = 2;
		$dgamit = "Linggo2x";
	} else if($sql_data['bdk_droga_gamit'] == 3){
		$dg = 3;
		$dgamit = "Araw2x";
	} else { 
		$dg = 0;
		$dgamit = "--Select your Status--";
	}

	if($sql_data['bdk_droga_tao'] == 1){
		$dt = 1;
		$dtao = "Oo";
	} else if($sql_data['bdk_droga_tao'] == 2){
		$dt = 2;
		$dtao = "Hindi";
	} else { 
		$dt = 0;
		$dtao = "--Select your Status--";
	}
	
	if($sql_data['bdk_droga_illegal'] == 1){
		$di = 1;
		$dill = "Sa loob ng Barangay Cupang";
	} else if($sql_data['bdk_droga_illegal'] == 2){
		$di = 2;
		$dill = "Sa labas ng Barangay Cupang";
	} else { 
		$di = 0;
		$dill = "--Select your Status--";
	}
?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php?view=badak_list'">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="badak_process.php?action=modify" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Badak Record</h3>
				<p class="text-muted m-b-30 font-13"> Modify Badak Record </p>
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
										<div class="form-group">
                                            <h5>Status</h5>
                                            <select id="status" name="status" disabled>
                                                <option value="<?php echo $sql_data['status']; ?>"><?php echo $sql_data['status']; ?></option>
                                                <option value="Balay Silangan">Balay Silangan</option>
                                                <option value="Arrested">Arrested</option>
                                                <option value="Deceased">Deceased</option>
                                                <option value="CBDRP Graduate">CBDRP Graduate</option>
                                                <option value="Rehab/IOP">Rehab/IOP</option>
                                                <option value="General Intervention">General Intervention</option>
                                                <option value="Non-Resident/Did-not-exist Cannot Be Located">Non-Resident/Did-not-exist Cannot Be Located</option>
                                            </select>
                                        </div>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Unang Pangalan:</label>
                                                        <input type="text" id="firstName" class="form-control" name="pangalan" value="<?php echo $sql_data['bdk_unang_pangalan'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Gitnang Pangalan:</label>
                                                        <input type="text" id="firstName" class="form-control" name="pangalan" value="<?php echo $sql_data['bdk_gitnang_pangalan'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Huling Pangalan:</label>
                                                        <input type="text" id="firstName" class="form-control" name="pangalan" value="<?php echo $sql_data['bdk_huling_pangalan'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Trabaho:</label>
														<input type="text" id="lastName" class="form-control" name="trabaho" value="<?php echo $sql_data['bdk_trabaho'];?>"readonly><br/> 
													</div>
                                                </div>
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Anong uri ng Droga ang natikman mo?</label>
                                                        <input type="text" id="firstName" class="form-control" name="droga_natikman" value="<?php echo $sql_data['bdk_droga_natikman'];?>"readonly><br/> 
													</div>
                                                </div>
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Alyas:</label>
                                                        <input type="text" id="firstName" class="form-control" name="alyas" value="<?php echo $sql_data['bdk_alyas'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Numero ng Cellphone/Tel:</label>
														<input type="text" id="lastName" class="form-control" name="numero_tel" value="<?php echo $sql_data['bdk_numero_tel'];?>"readonly><br/> 
													</div>
                                                </div>
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Nagbebenta ka ba ng Droga?Gaano Kadalas?</label>
                                                        <input type="text" id="firstName" class="form-control" name="droga_benta" value="<?php echo $sql_data['bdk_droga_benta'];?>"readonly><br/> 
													</div>
                                                </div>
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Kasarian:</label>
                                                        <input type="text" id="firstName" class="form-control" name="kasarian" value="<?php echo $sql_data['bdk_kasarian'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Social Media Accounts (Specify):</label>
														<input type="text" id="lastName" class="form-control" name="socmed_acct" value="<?php echo $sql_data['bdk_socmed_acct'];?>"readonly><br/> 
													</div>
                                                </div>
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Gaano ka kadalas gumamit ng droga?</label>
                                                        <select class="form-control" name="droga_gamit"disabled>
															<option value="<?php echo $dg; ?>"><?php echo $dgamit; ?></option>
                                                            <option value="1">Buwanan</option>
                                                            <option value="2">Linggo2x</option>
															<option value="3">Araw2x</option>
                                                        </select > 
													</div>
                                                </div>
											</div>
											<div class="row">
												<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Katayuang Sibil:</label>
                                                        <input type="text" id="firstName" class="form-control" name="ktyng_sbl" value="<?php echo $sql_data['bdk_ktyng_sbl'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Relihiyon:</label>
														<input type="text" id="lastName" class="form-control" name="relihiyon" value="<?php echo $sql_data['bdk_relihiyon'];?>"readonly><br/> 
													</div>
                                                </div>
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Gaano kana katagal gumagamit ng Droga?</label>
                                                        <input type="text" id="firstName" class="form-control" name="droga_katagal" value="<?php echo $sql_data['bdk_droga_katagal'];?>"readonly><br/> 
													</div>
                                                </div>
                                            </div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Petsa ng Kapanganakan:</label>
                                                        <input type="date" id="firstName" class="form-control" name="petsa_kpnkn" value="<?php echo $sql_data['bdk_petsa_kpnkn'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Taas:</label>
														<input type="text" id="lastName" class="form-control" name="taas" value="<?php echo $sql_data['bdk_taas'];?>"readonly><br/> 
													</div>
                                                </div>
												  <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Saang lugar ka madalas gumagamit ng Droga?</label>
														<input type="text" id="lastName" class="form-control" name="droga_lugar" value="<?php echo $sql_data['bdk_droga_lugar'];?>"readonly><br/> 
													</div>
                                                </div>
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Edad:</label>
                                                        <input type="text" id="firstName" class="form-control" name="edad" value="<?php echo $sql_data['bdk_edad'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Bigat:</label>
														<input type="text" id="lastName" class="form-control" name="bigat" value="<?php echo $sql_data['bdk_bigat'];?>"readonly><br/> 
													</div>
                                                </div>
												<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" style="font-size: 12.5px;">Gumagamit ka ba ng droga na may kasamang ibang tao?</label>
														<select class="form-control" name="droga_tao" value="<?php echo $sql_data['bdk_droga_tao'];?>"disabled>
															<option value="<?php echo $dt; ?>"><?php echo $dtao; ?></option>
                                                            <option value="1">Oo</option>
                                                            <option value="2">Hindi</option>
                                                        </select >  
													</div>
                                                </div>
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Lugar ng Kapanganakan:</label>
                                                        <input type="text" id="firstName" class="form-control" name="lugar_kpnkn" value="<?php echo $sql_data['bdk_lugar_kpnkn'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Kulay ng Mata:</label>
														<input type="text" id="lastName" class="form-control" name="kulaysamata" value="<?php echo $sql_data['bdk_kulaysamata'];?>"readonly><br/> 
													</div>
                                                </div>
												<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" style="font-size: 12.5px;">Saan ka bumibili illegal na droga</label>														
														<input type="text" id="lastName" class="form-control" name="kulaysamata" value="<?php echo $sql_data['bdk_droga_illegal'];?>"readonly><br/> 
													</div>
                                                </div>
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Kasalukuyang lugar tirahan:</label>
                                                        <input type="text" id="firstName" class="form-control" name="ksk_lugar_trn" value="<?php echo $sql_data['bdk_ksk_lugar_trn'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Kulay ng Balat:</label>
														<input type="text" id="lastName" class="form-control" name="kulaysabalat" value="<?php echo $sql_data['bdk_kulaysabalat'];?>"readonly><br/> 
													</div>
                                                </div>												
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Lugar sa Probinsya</label>
                                                        <input type="text" id="firstName" class="form-control" name="lugar_prbnsy" value="<?php echo $sql_data['bdk_lugar_prbnsy'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Kulay ng Buhok:</label>
														<input type="text" id="lastName" class="form-control" name="kulaysabuhok" value="<?php echo $sql_data['bdk_kulaysabuhok'];?>"readonly><br/> 
													</div>
                                                </div>
												<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Testigo:</label>
														<input type="text" id="lastName" class="form-control" name="testigo" value="<?php echo $sql_data['bdk_testigo'];?>"readonly><br/> 
													</div>
                                                </div>
											</div>
											<div class="row">
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Edukasyong Nakamit:</label>
                                                        <input type="text" id="firstName" class="form-control" name="edksyn_nkmt" value="<?php echo $sql_data['bdk_edksyn_nkmt'];?>"readonly><br/>
													</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Pagkakilanlan Marka / Tattoo:</label>
														<input type="text" id="lastName" class="form-control" name="tattoo" value="<?php echo $sql_data['bdk_tattoo'];?>"readonly><br/> 
													</div>
                                                </div>
												<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Date Accomplished:</label>
														<input type="date" id="lastName" class="form-control" name="date_ac" value="<?php echo $sql_data['bdk_date_ac'];?>"readonly><br/> 
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
					<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">                 
                    <button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php?view=badak_list'">Back</button>
                  </div>
            </div>
				
			</div>
		</div>
	</form>
	</div>
<?php
}else{
	echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
}
?>
<style>
	.control-label{
		color:black;
	}
</style>