<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
	
}

	$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_active = '0'");
	$sql->execute();
	$sql_num = $sql->rowCount();
	
	$doc = $conn->prepare("SELECT * FROM tbl_resident r, tbl_certificate c, tbl_doc_request_online o 
								WHERE r.r_id = o.res_id AND o.is_open = '0' AND o.is_deleted != '1' AND c.cer_id = o.cer_id");
	$doc->execute();
	$doc_num = $doc->rowCount();
?>

<style>
.text {
  position: absolute;
  top: 2px;
  left: 40.5%;
  font-size: 25px;
  color: #000000;
  margin-top: 10px; /* adjust this value as needed */
  font-family:Castellar;
}

#logo { /* if in laptop the margin left and top: -6, -3.6, if in pc margin left -5, margin-top -3*/
	margin-left: -6%; 
	margin-top: -3.6%;
	position: absolute;
	width: 55px;
	height: 55px;
}
/* #logo1 {
	margin-left:13%;
	margin-top: 0.1%;
	position: absolute;
	width: 55px;
	height: 55px;
}
#logo2 {
	margin-left:36.5%;
	margin-top: 0.1%;
	position: absolute;
	width: 55px;
	height: 55px;
	transform: scaleX(-1);
} */


</style>
	<div class="navbar-header">
		<a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
			<i class="fa fa-bars"></i>
		</a>
		<div class="top-left-part">
		<center>
			<a class="logo" href="<?php echo WEB_ROOT; ?>">		
				<b>
					MATECH
					<img id="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Department_of_the_Interior_and_Local_Government_%28DILG%29_Seal_-_Logo.svg/600px-Department_of_the_Interior_and_Local_Government_%28DILG%29_Seal_-_Logo.svg.png?20180630180804" alt="logo">
				</b>
				
			</a>
		</center>
		</div>
		<ul class="nav navbar-top-links navbar-left hidden-xs">
			<li>
				<a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
			</li>	
				<li class="right-side-toggle">
					<a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="javascript:void(0)">
						<i class="fa fa-th"></i>
					</a>
				</li>		
				<div>
				
				<p class="text"><b>Barangay Novaliches Proper</b></p>	
				<!-- <img id="logo1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTLWuTwQRmkf-sJ6GSiExDebt83tUO_ciGBsQ3fM-zJg&s" alt="logo"> -->
				<!-- <img id="logo2" src="https://cdn.pixabay.com/photo/2021/11/22/15/49/philippines-6816753_960_720.png" alt="logo"> -->

			</div>
				
					
		</ul>		
		<b style="font-size:17px; color:#ffffff; padding-right:17px; margin-top:17px; color:#000000" class="pull-right"><?php echo $today_date3; ?></b>	
			
	</div>