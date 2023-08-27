<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

?>
	<div class="col-md-6"> <!--Med START-->
		<div class="white-box">
			<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;"> Medicine Inventory</h3>
			<p class="text-muted m-b-30 font-13"> Medicine Inventory Records </p>
				<hr />
				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Medicine Name<label id="asterisk" style="color:red;">*</label></label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Medicine Name" name="medicine" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Total Quantity<label id="asterisk" style="color:red;">*</label></label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="number" class="form-control" id="exampleInputuname" placeholder="Total Quantity" name="quantity" autocomplete=off required /> </div>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputuname" class="col-sm-3 control-label">Remarks</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Remarks" name="remarks" autocomplete=off /> </div>
					</div>
				</div>

				<div class="form-group m-b-0">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
						<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
					</div>
				</div>
		</div>
	</div><!--med END-->
	<style>
		.control-label{
			color: black;
		}
	</style>