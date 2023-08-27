<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_covid_cases WHERE cc_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();

	$day_onset = date("d", strtotime($sql_data['cc_onset']));
	$month_onset = date("F", strtotime($sql_data['cc_onset']));
	$year_onset = date("Y", strtotime($sql_data['cc_onset']));

	$date_onset = $month_onset . " " . $day_onset . ", " . $year_onset;
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';



?>
<div class="background">
  <div class="transbox">
  <button type="button" class="btn btn-success waves-effect waves-light" onClick="window.location.href='index.php';">Back</button>
  </div>
</div>
<br>
	<form class="form-horizontal" method="post" action="process.php?action=add" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-6">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">Covid Cases</h3>
				<p class="text-muted m-b-30 font-13"> View Covid Case Record </p>
				

					<div class="m-l-40"><b class="text-info">Name : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['cc_name']; ?></p>
                    </div>

					<div class="m-l-40"><b class="text-info">Age : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['cc_age']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Gender : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['cc_gender']; ?></p>
                    </div>
				
					<div class="m-l-40"><b class="text-info">Address : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['cc_address']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Occupation : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['cc_occupation']; ?></p>
                    </div>
				
					<div class="m-l-40"><b class="text-info">Onset of Illness : </b>
					<p style="padding-left:27px;"><?php echo $date_onset; ?></p>
                    </div>
				
					<div class="m-l-40"><b class="text-info">History of Exposure : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['cc_history']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">Status : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['cc_status']; ?></p>
                    </div>
					
					<div class="m-l-40"><b class="text-info">DRU : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['cc_dru']; ?></p>
                    </div>
				
					<div class="m-l-40"><b class="text-info">Vaccination Status : </b>
						<p style="padding-left:27px;"><?php echo $sql_data['cc_vaccination']; ?></p>
                    </div>
										
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							<a class="btn btn-success waves-effect waves-light m-r-10" href="index.php?view=modify&id=<?php echo $sql_data['uid']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>
							<button type="button" class="btn btn-inverse waves-effect waves-light" onClick="window.location.href='index.php';">Cancel</button>
						</div>
					</div>
				
			</div>
		</div>

		<div class="col-md-6">
			<div class="white-box">
				<?php
					if($errorMessage == 'Deleted Successfully'){
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
						<b><?php echo $errorMessage; ?></b>
					</div>
				<?php
					}
				?>
				<a href="index.php?view=add_vac&id=<?php echo $sql_data['cc_id']; ?>" class="btn btn-success waves-effect waves-light btn-xs"><span>Add Covid Vaccine Record</span></a>
				<br /><br />
				<div class="table-responsive">
					<table id="t1" class="display nowrap" style="font-size:12px;">
						<thead>
							<th>Date Taken</th>
							<th>Type of Dose</th>
							<th>Brand</th>
							<th>Action</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tfoot>
						<tbody>
							<?php
								$vac = $conn->prepare("SELECT * FROM tbl_covid_vaccine WHERE cc_id = '$id' AND is_deleted != '1' ORDER BY date_taken");
								$vac->execute();
								if($vac->rowCount() > 0){
									while($vac_data = $vac->fetch()){
										$date_took = date("M d, Y", strtotime($vac_data['date_taken']));
							?>
								<tr>
									<td><?php echo $date_took; ?></td>
									<td><?php echo $vac_data['dose_type']?>, <?php echo $vac_data['dosage']; ?></td>
									<td><?php echo $vac_data['brand']?></td>
									<td>
										<a href="index.php?view=detail_vac&id=<?php echo $vac_data['cv_id']; ?>" class="btn btn-warning waves-effect waves-light btn-xs"><i class="fa fa-eye m-l-5"></i> <span>View</span></a>
										&nbsp;
										<a href="index.php?view=modify_vac&id=<?php echo $vac_data['cv_id']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
										&nbsp;
										<a href="process.php?action=delete_vac&id=<?php echo $vac_data['cv_id']; ?>" class="btn btn-danger waves-effect waves-light btn-xs" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
									</td>
								</tr>
							<?php
									}
								}else{}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
	<style>
		p{
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