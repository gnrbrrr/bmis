<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_borrowed WHERE is_deleted != '1'");
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
</head>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Borrowed Items Tracker</h3>
				<p class="text-muted m-b-30">Display List of Borrowed Items Records</p></p>
					<form method="post" action="index.php?view=add">
						<div style="position:absolute;">
							<h5 >Select Item To Borrow</h5>
							<select id="item-selector" class="select2" name="item" style="position:relative; width:250px;">
								<?php
									$ite = $conn->prepare("SELECT * FROM tbl_inventory WHERE is_deleted != '1'");
									$ite->execute();

									while($items = $ite->fetch()){
								?>
										<option value="<?php echo $items['in_id']?>"><?php echo $items['in_item']; ?></option>
								<?php
									}
								?>
							</select>
						</div>
						&nbsp; <input type="submit" name="submit" value="Add New" class="btn btn-success pull-right m-t-10 font10"><br /><br />
						<br>
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
								<th>Borrower</th>
								<th>Description</th>
								<th>Date Borrowed</th>
								<th>Expected Date to Return</th>
								<th>Date Returned</th>
								<th>Status</th>
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
								<th></th>
								<th></th>
							</tr>
						</tfoot>
						<tbody>
							
							<?php
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{
										if($sql_data['r_id'] != 0){
											$r_id = $sql_data['r_id'];

											$sql2 = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$r_id'");
											$sql2->execute();
											$sql2_data = $sql2->fetch();

											$borrower = "";

											if($sql2_data['firstname']){
												$borrower .= $sql2_data['firstname'];
											}else{

											}

											if($sql2_data['middlename']){
												$borrower .= $sql2_data['middlename'];
											}else{

											}

											if($sql2_data['lastname']){
												$borrower .= $sql2_data['lastname'];
											}else{

											}


										}else{
											$borrower = "-- --";
										}

										$borroweddate = date("M d, Y", strtotime($sql_data['br_dateborrowed']));
										$expecteddate = date("M d, Y", strtotime($sql_data['br_dateexpected']));
									
										if($sql_data['is_returned'] == 0)
										{
											$status = "Lent";
											$btnreturn = "";
											$btnedit = "";
											$returndate = "";
										}else{
											$status = "Returned";
											$btnreturn = "style='display:none;'";
											$btnedit = "style='display:none;'";
											$returndate = date("M d, Y", strtotime($sql_data['br_datereturned']));
										}
							?>
										<tr>
											<td><?php echo $borrower; ?></td>
											<td><?php echo utf8_encode($sql_data['br_itemdesc']); ?></td>
											<td><?php echo $borroweddate; ?></td>
											<td><?php echo $expecteddate; ?></td>
											<td><?php echo $returndate; ?></td>
											<td><?php echo $status; ?></td>
											<td>
												<a href="index.php?view=detail&id=<?php echo $sql_data['br_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
												&nbsp;
												<a <?php echo $btnedit; ?> href="index.php?view=modify&id=<?php echo $sql_data['br_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="process.php?action=delete&id=<?php echo $sql_data['br_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
												&nbsp;
												<a <?php echo $btnreturn; ?> href="index.php?view=return&id=<?php echo $sql_data['br_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Return</span></a>
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
		</div>
	</div>
	<style>
		input[type="search"]{
			border:2px solid black;
		}
	</style>
	<!-- <script>
		$(document).ready(function() {
			$.ajax({
				url: "borrowed_checker.php",
				success: function(data){
					if(data){

						var medicines = data;

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
					}
				}
			});
		});
	</script> -->