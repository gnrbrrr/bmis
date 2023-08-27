<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$userId = $_SESSION['user_id'];
	
	$reportId = $_GET['id']; // Get report id
	# Get report details from db
	$sql = $conn->prepare("SELECT * FROM bs_report WHERE uid = '$reportId'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
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
				<h3 class="box-title m-b-0">Report - <?php echo $sql_data['name']; ?></h3>
				<p class="text-muted m-b-30">Search Record</p>					
					
				<div class="table-responsive">
					<form class="form-horizontal" method="post" action="<?php echo $sql_data['page']; ?>.php" target=_new name="frm" id="frm">		
						<table style="border:solid 0px #000000; width:100%;">						
						<tbody>
							<tr>							
								<td class="data">
									<?php if($reportId != 'b8c37e33defde51cf91e1e03e51657da'){ ?>
										<b>From :</b> <input type="date" class="txt_bx" id="exampleInputuname" name="dfrom" value="<?php echo $newfrom; ?>" autocomplete=off required />
										&nbsp;&nbsp;
										<b>To :</b> <input type="date" class="txt_bx" id="exampleInputuname" name="dto" value="<?php echo $newto; ?>" autocomplete=off required />
										&nbsp;&nbsp;
									<?php }else{} ?>
										<?php if($reportId == '6b180037abbebea991d8b1232f8a8ca9'){ ?>
											<b>Type :</b>
											<select name="ctype" class="select2" style="width:170px; border:solid 2px #666600;">
												<option value="0">All</option>
												<?php
													$typ = $conn->prepare("SELECT * FROM tbl_certificate WHERE is_deleted != '1' ORDER BY cer_name");
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
										<?php }else{} ?>
										
										<?php if($reportId == 'b8c37e33defde51cf91e1e03e51657da'){ ?>
											<b>Type :</b>
											<select name="ctype" class="select2" style="width:170px; border:solid 2px #666600;">
												<option value="1">Barangay Records Summary</option>
												<option value="2">Business Establishment</option>
												<option value="3">Resident List</option>
											</select>
											&nbsp;&nbsp;
										<?php }else{} ?>
									<button type="submit" name="submit" class="btn btn-success waves-effect waves-light btn-xs">Submit</button>
								</td>
							</tr>
						</tbody>
						</table>
					</form>
					
				</div>
			</div>
		</div>
	</div>