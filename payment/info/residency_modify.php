<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
?>

	<form class="form-horizontal" method="post" action="process.php?action=modify_residency" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-12"> <!--PRE HOSPITAL START-->
			<div class="white-box">
				<div class="m-l-40"><b class="text-info">Purpose : </b>
					<p style="padding-left:27px;"><input type="text" class="txt_bx" id="exampleInputuname" name="purpose" value="<?php echo $purpose; ?>" autocomplete=off required /></p>
				</div>

				<div class="m-l-40"><b class="text-info">O.R No. : </b>
					<p style="padding-left:27px;"><input type="text" class="txt_bx" id="exampleInputuname" name="orno" value="<?php echo $sql_data['or_num']; ?>" autocomplete=off required /></p>
				</div>

				<div class="m-l-40"><b class="text-info">Amount : </b>
					<p style="padding-left:27px;"><input type="text" class="txt_bx" id="exampleInputuname" name="amount" onKeyUp="checkNumber(this);" value="<?php echo $sql_data['amount']; ?>" autocomplete=off required /></p>
				</div>

				<div class="m-l-40"><b class="text-info">Signing Official : </b>
					<p style="padding-left:27px;"><select class="text_bx" id="exampleInputuname" name="person_sign" required>
						<option value="<?php echo $sql_data['person_sign']; ?>"><?php echo $sql_data['person_sign']; ?></option>
						<option value="none"> </option>
						<option value="VINCENT JOAQUIN M. ESTACIO">Vincent Joaquin M. Estacio</option>
						<option value="DANILO C. MANIQUIS">Danilo C. Maniquis</option>
						<option value="HENRY B. CUDILLA">Henry B. Cudilla</option>
						<option value="ENRIQUE P. AÑONUEVO">Enrique P. Añonuevo</option>
						<option value="ABEL S. MANALANSAN">Abel S. Manalansan</option>
						<option value="MARIA CECILIA M. RAMOS">Maria Cecilia M. Ramos</option>
						<option value="PRECILLA C. NUEVA">Precilla C. Nueva</option>
					</select></p>
				</div>

				<div class="m-l-40"><b class="text-info">Date Issued : </b>
					<p style="padding-left:27px;"><input type="date" class="txt_bx" id="exampleInputuname" name="dtissued" value="<?php echo $sql_data['date_issued']; ?>" autocomplete=off required /></p>
				</div>

				<div class="m-l-40"><b class="text-info">Issued By : </b>
					<p style="padding-left:27px;"><input type="text" class="txt_bx" id="exampleInputuname" name="issued_by" value="<?php echo $sql_data['issued_by']; ?>" autocomplete=off required /></p>
				</div>

				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<input name="id" type="hidden" value="<?php echo $id; ?>" />
						<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()"><i class="fa fa-save fa-fw"></i> Save</button>
						<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
					</div>
				</div>

			</div>
		</div>
	</form>
	<style>
		.m-l-40 p{
			color:black;
		}
	</style>
	