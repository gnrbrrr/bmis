<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

if(isset($_POST['id']))
{ $id = $_POST['id']; }else{ $id = $_GET['id']; }


$sql = $conn->prepare("SELECT * FROM bs_user WHERE uid = '$id'");
$sql->execute();
if($sql->rowCount() > 0)
{
	$sql_data = $sql->fetch();
	
	if ($sql_data['image']) {
		$thumbnail7 = WEB_ROOT . 'images/user/' . $sql_data['image'];
	} else {
		$thumbnail7 = WEB_ROOT . 'images/user/noimage.png';
	}

?>

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="white-box">
				<div class="user-bg"> <img width="100%" alt="user" src="<?php echo $thumbnail7; ?>">
					<div class="overlay-box">
						<div class="user-content">
							<a href="javascript:void(0)"><img src="<?php echo $thumbnail7; ?>" class="thumb-lg img-circle" alt="img"></a>
							<h4 class="text-white"><?php echo $user_data['lastname']; ?>, <?php echo $user_data['firstname']; ?></h4>
							<h5 class="text-white"><?php echo $user_data['username']; ?></h5> </div>
					</div>
				</div>				
			</div>
		</div>
					
		<div class="col-md-8">
			<div class="white-box">
				<ul class="nav nav-tabs tabs customtab">				
					<li class="home tab">
						<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Update Profile</span> </a>
					</li>
				</ul>
				<div class="tab-content">					
					
					<div class="tab-pane active" id="settings">
						<form class="form-horizontal form-material" method="post" enctype="multipart/form-data" name="form" id="form" action="process.php?action=modify">
							<div class="form-group">
								<label class="col-md-12">First Name</label>
								<div class="col-md-12">
									<input type="text" name="fname" value="<?php echo $user_data['firstname']; ?>" class="form-control form-control-line" autocomplete=off required /> </div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Last Name</label>
								<div class="col-md-12">
									<input type="text" name="lname" value="<?php echo $user_data['lastname']; ?>" class="form-control form-control-line" autocomplete=off required /> </div>
							</div>
							<div class="form-group">
								<label for="example-email" class="col-md-12">Email</label>
								<div class="col-md-12">
									<input type="email" name="email" value="<?php echo $user_data['email']; ?>" class="form-control form-control-line" autocomplete=off /> </div>
							</div>
							<div class="form-group">
								<label for="example-email" class="col-md-12">Username</label>
								<div class="col-md-12">
									<input type="text" name="username" value="<?php echo $user_data['username']; ?>" class="form-control form-control-line" autocomplete=off required /> </div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Password</label>
								<div class="col-md-12">
									<input type="password" name="password" value="<?php echo $user_data['pass_text']; ?>" class="form-control form-control-line" autocomplete=off required /> </div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Contact No</label>
								<div class="col-md-12">
									<input type="text" name="contactno" value="<?php echo $user_data['contactno']; ?>" class="form-control form-control-line" autocomplete=off /> </div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Image</label>
								<div class="col-md-12">
									<input class="input-file uniform_on" name="fileImage" id="fileInput" type="file" /> </div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-success" onClick="return confirmSubmit()">Update Profile</button>
									<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}else{
	echo "<center><h3>Processing...</h3><img src='../../images/loader/loader_3.gif'><center>";
	$url = "index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
}
?>