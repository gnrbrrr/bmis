<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>

	
		<div class="col-md-12">
			<div class="white-box">
				<table id="myTable" class="display nowrap">
					<thead>
						<tr>
							<th>Relationship</th>
							<th>Full Name</th>
							<th>Birthday</th>
							<th>Age</th>							
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
							$mem = $conn->prepare("SELECT * FROM tbl_resident WHERE is_deleted != '1' AND status != 'Deceased' AND headofthefamily_id = '$residentid' ORDER BY lastname ASC");
							$mem->execute();
							if($mem->rowCount() > 0)
							{
								while($mem_data = $mem->fetch())
								{
									$bday = date("M d, Y", strtotime($mem_data['birthdate']));
						?>
									<tr>
										<td><?php echo $mem_data['relationship_fam']; ?></td>
										<td>
											<?php echo utf8_encode($mem_data['lastname']); ?>, <?php echo $mem_data['firstname']; ?> <?php echo $mem_data['middlename']; ?>
										</td>
										<td><?php echo $bday; ?></td>										
										<td><?php echo $mem_data['age']; ?></td>
										<td>
											<a href="details_pop.php?id=<?php echo $mem_data['uid']; ?>" class="btn btn-warning waves-effect waves-light btn-xs nyroModal"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
											&nbsp;
											<a href="index.php?view=modify&id=<?php echo $mem_data['uid']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
											&nbsp;
											<a href="process.php?action=delete&id=<?php echo $mem_data['uid']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>														
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
		<script>
			$(document).ready(function() {
				$('input[type="search"]').css({
					'border': '2px solid black'
				});
			});
		</script>
		