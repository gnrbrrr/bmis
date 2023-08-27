<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

if($user_data['access_level'] == 1){ $access = ""; }else{ $access = "AND user_id = '$userId'"; }
$sql = $conn->prepare("SELECT * FROM bs_user WHERE is_deleted != '1' $access ORDER BY lastname ASC");
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
				<h3 class="box-title m-b-0">User
								
				</h3>
				<p class="text-muted m-b-30">Display list of Users</p>
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
								<th>Image</th>
								<th>Name</th>
								<th>Username</th>
								<th>Last Login</th>
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
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{
										if ($sql_data['thumbnail']) {
											$thumbnail7 = WEB_ROOT . 'images/user/' . $sql_data['thumbnail'];
										} else {
											$thumbnail7 = WEB_ROOT . 'images/user/noimage.png';
										}
										
										$usid = $sql_data['user_id'];
										
										$datofocc = date("M d, Y | h:i A", strtotime($sql_data['last_login']));
										
										//$up = $conn->prepare("UPDATE bs_user SET uid = md5('$usid') WHERE user_id = '$usid'");
										//$up->execute();
							?>
										<tr>
											<td><img src="<?php echo $thumbnail7; ?>" style="width:75px; height:75px;" /></td>
											<td><?php echo $sql_data['firstname']; ?> <?php echo $sql_data['lastname']; ?> </td>
											<td> <?php echo $sql_data['username']; ?> </td>
											<td> <?php echo $datofocc; ?> </td>
											<td>
												<a href="index.php?view=modify&id=<?php echo $sql_data['uid']; ?>" class="btn btn-info waves-effect waves-light btn-xs"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>												
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