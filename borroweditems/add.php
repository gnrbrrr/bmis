<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

//$item_id = $_POST['item'];

if(isset($_POST['item']))
{ $item_id = $_POST['item']; }else{ $item_id = $_GET['item']; }

$chk = $conn->prepare("SELECT * FROM tbl_inventory WHERE in_id = '$item_id'");
$chk->execute();

$item_data = $chk->fetch();

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<div class="row">
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Borrowed Items Tracker</h3>
				<p class="text-muted m-b-30 font-13"> Add Records </p>
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
						}else if($errorMessage == 'Borrowed Item Exceeds The Item Quantity'){
					?>
							<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}
					?>
							
				
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Name of Borrower</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="res_id" class="select2" id="" style="width:fit-content;">
									<?php
										$res = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status != 'Non-Resident' AND is_deleted != '1'");
										$res->execute();
										while($res_data = $res->fetch()){
									?>
										<option value="<?php echo $res_data['r_id']; ?>"><?php echo $res_data['firstname'];?> <?php echo $res_data['middlename']; ?> <?php echo $res_data['lastname']; ?></option>
									<?php
										}
									?>
								</select> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Item Name</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Item Description" name="item_name" value="<?php echo $item_data['in_item']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Item Description</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Item Description" name="item_desc" value="<?php echo $item_data['in_itemdesc']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Item Quantity</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="number" class="form-control" id="exampleInputuname" placeholder="Item Quantity" name="item_qty" value="<?php echo $item_data['in_available_qty']; ?>" autocomplete=off readonly /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Quantity Borrowed</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="number" class="form-control" id="exampleInputuname" placeholder="Quantity Borrowed" name="borrow_qty" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Item Condition</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="condition" class="select2" style="width:270px;">
									<option value="With Damage">With Damage</option>
									<option value="Good Condition">Good Condition</option>								
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Purpose</label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="purpose" class="select2" style="width:270px;">
									<option value="Seminar">Seminar</option>
									<option value="Wake">Wake</option>
									<option value="Social Gatherings">Social Gatherings</option>
									<option value="Feeding Programs">Feeding Programs</option>
									<option value="Music/Arts/Dance/Concert Events">Music/Arts/Dance/Concert Events</option>
									<option value="Meetings">Meetings</option>
									<option value="Wedding Parties/Events">Wedding Parties/Events</option>
									<option value="Birthday Parties/Events">Birthday Parties/Events</option>
									<option value="Festival Gatherings/Events">Festival Gatherings/Events</option>
									<option value="Baptismal">Baptismal</option>
									<option value="Others">Others</option>									
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Event Location</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea class="form-control" id="exampleInputuname" placeholder="Event Location" name="loc" style="width:370px; resize:vertical; min-height:60px; max-height:100px;" autocomplete=off required ></textarea> </div>
						</div>
					</div>

					</div>
					</div>

					<div class="col-md-6">
					<div class="white-box" style="height: 445px;">
					<br>
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Date</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Purchase" name="bdate" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Time</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="time" class="form-control" id="exampleInputuname" placeholder="Date of Purchase" name="btime" autocomplete=off required /> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Released by</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<input type="text" class="form-control" id="exampleInputuname" placeholder="Released by" name="released" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Expected date of Return</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-calender"></i></div>
								<input type="date" class="form-control" id="exampleInputuname" placeholder="Date of Purchase" name="erdate" autocomplete=off required /> </div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Remarks</label>
						<div class="col-sm-9">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-arrow-right"></i></div>
								<textarea class="form-control" id="exampleInputuname" placeholder="Remarks" name="remarks" style="resize:vertical; width:370px; min-height:60px; max-height:100px;" autocomplete=off ></textarea> </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label">Item Location</label>
						<div class="col-sm-9">
							<div class="input-group">
							<input type="text" class="form-control" id="exampleInputuname" placeholder="Item Location" name="item_location" value="Barangay Inventory" autocomplete=off readonly /> </div>
						</div>
					</div>
				
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<input name="inventory_id" type="hidden" id="id" value="<?php echo $item_id; ?>">
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Submit <i class="fa fa-paper-plane fa-fw"></i></button>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
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