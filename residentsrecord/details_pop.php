<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

	$id = $_GET['id'];

	$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$reg = $sql_data['region_id'];
	$prv = $sql_data['province_id'];
	$mun = $sql_data['municipality_id'];
	$brg = $sql_data['barangay_id'];
	
	$residentid = $sql_data['r_id'];
	
	$bday = date("M d, Y", strtotime($sql_data['birthdate']));
	
	if ($sql_data['image']) {
		$thumbnail7 = WEB_ROOT . 'images/resident/' . $sql_data['image'];
	} else {
		$thumbnail7 = WEB_ROOT . 'images/resident/noimage.png';
	}
	
	$region = $conn->prepare("SELECT * FROM $dbphilippines.table_region WHERE region_id = '$reg'");
	$region->execute();
	if($region->rowCount() > 0)
	{
		$region_data = $region->fetch();
		$region_name = $region_data['region_description'];
	}else{ $region_name = ""; }
	
	$province = $conn->prepare("SELECT * FROM $dbphilippines.table_province WHERE province_id = '$prv'");
	$province->execute();
	if($province->rowCount() > 0)
	{
		$province_data = $province->fetch();
		$province_name = $province_data['province_name'];
	}else{ $province_name = ""; }
	
	$city = $conn->prepare("SELECT * FROM $dbphilippines.table_municipality WHERE municipality_id = '$mun'");
	$city->execute();
	if($city->rowCount() > 0)
	{
		$city_data = $city->fetch();
		$city_name = $city_data['municipality_name'];
	}else{ $city_name = ""; }
	
	$brgy = $conn->prepare("SELECT * FROM $dbphilippines.table_barangay WHERE barangay_id = '$brg'");
	$brgy->execute();
	if($brgy->rowCount() > 0)
	{
		$brgy_data = $brgy->fetch();
		$brgy_name = $brgy_data['barangay_name'];
	}else{ $brgy_name = ""; }
	
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>

<head>
<style rel="stylesheet">
.th
{   
   color: #666666 !important;
   font-family: Arial !important;
   font-weight: bold !important;
   font-size:13px !important;
   padding:7px;
}
.td
{   
   color: #999933 !important;
   font-family: Arial !important;  
   font-size:14px !important;
}
.par
{   
   color: #999933 !important;
   font-family: Arial !important;  
   font-weight: normal !important;
   font-size:14px !important;
}
</style>
</head>
	<div class="row">
		<form class="form-horizontal" method="post" action="process.php?action=confirm" enctype="multipart/form-data" name="form" id="form">
		<div class="col-md-4">
                        <div class="white-box">
                            <div class="profile-widget">
                                <div class="profile-img">
                                    <img src="<?php echo $thumbnail7; ?>" alt="user-img" class="img-circle" style="width:127px; height:127px;">
                                    <p class="m-t-10 m-b-5"><a href="" class="profile-text font-22 font-semibold"><?php echo $sql_data['firstname']; ?> <?php echo $sql_data['middlename']; ?> <?php echo $sql_data['lastname']; ?></a></p>
                                    <span class="font-16"><?php echo $sql_data['occupation']; ?></span>
                                </div>
                                <div class="profile-info">
                                    <div class="col-xs-6 col-md-6 b-r">
                                        <h1 class="text-primary"><?php echo $sql_data['gender']; ?> </h1>
                                        <span class="font-16">Gender</span>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <h1 class="text-primary"><?php echo $sql_data['age']; ?> </h1>
                                        <span class="font-16">Age</span>
                                    </div>
                                </div>
                                <div class="profile-detail font-15">
                                    <p><?php echo $sql_data['purok']; ?><br /><?php echo $sql_data['address']; ?></p>
									<p><?php echo $brgy_name; ?> <?php echo $city_name; ?><br /><?php echo $province_name; ?><br /><?php echo $region_name; ?></p>
                                </div>
								<br /><br />
                            </div>
                        </div>
                    </div>
			<div class="col-md-8">
				<div class="white-box">
					<h3 class="box-title m-b-0">Resident Information</h3>
					<p class="text-muted m-b-30 font-13"> View Resident </p>
						
					<ul class="nav nav-tabs tabs customtab">
						<li class="active tab">
							<a href="#personal" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Personal Info</span> </a>
						</li>
						<li class="tab">
							<a href="#education" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-book"></i></span> <span class="hidden-xs">Education Info</span> </a>
						</li>
						<li class="tab">
							<a href="#work" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-cubes"></i></span> <span class="hidden-xs">Work Info</span> </a>
						</li>						
						<li class="tab">
							<a href="#others" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Other Info</span> </a>
						</li>
						<li class="tab">
							<a href="#member" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Family Member</span> </a>
						</li>
						<li class="tab">
							<a href="#trans" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Transaction History</span> </a>
						</li>
						<li class="tab">
							<a href="#case" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Case History</span> </a>
						</li>
					</ul>			
					
					<div class="tab-content" style="font-size:11px;">
						<div class="tab-pane active" id="personal">
							<div class="steamline">
								<?php include 'info/detail_personal.php'; ?>
							</div>
						</div>
						<div class="tab-pane" id="education">
							<div class="steamline">
								<?php include 'info/detail_education.php'; ?>
							</div>
						</div>
						<div class="tab-pane" id="work">
							<div class="steamline">
								<?php include 'info/detail_work.php'; ?>
							</div>
						</div>						
						<div class="tab-pane" id="others">
							<div class="steamline">
								<?php include 'info/detail_other.php'; ?>
							</div>
						</div>
						<div class="tab-pane" id="member">
							<div class="steamline">
								<?php include 'info/member.php'; ?>
							</div>
						</div>
						<div class="tab-pane" id="trans">
							<div class="steamline">
								<?php include 'info/transaction_history.php'; ?>
							</div>
						</div>
						<div class="tab-pane" id="case">
							<div class="steamline">
								<?php include 'info/case_history.php'; ?>
							</div>
						</div>
					</div>
					
					<div class="form-group m-b-0">
						<div class="col-sm-offset-3 col-sm-9">
							
							<a type="button" id="go_back" class="btn btn-info waves-effect waves-light pull-left" href="index.php?view=detail&id=<?php echo $sql_data['headofthefamily_id']; ?>"><i class="ti-back-left me-1"></i> Go Back</a>
								
						</div>
					</div>
					
				</div>
			</div>			
		</form>
	</div>

<script type="text/javascript">

	// var back_btn = document.getElementById("go_back");

	// back_btn.addEventListener("click", main_detail);

	// function main_detail(){
	// 	window.history.back();
	// 	window.close();
	// }

	$(".cat").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "1"){
			$("#cust_name").show();
		}
		else{
			$("#cust_name").hide();
		}
		
		if(value_checked == "0"){
			$("#cust_name2").show();
		}
		else{
			$("#cust_name2").hide();
		}
});
		
	$(".kas").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "0"){
			$("#kas_name").show();
		}
		else{
			$("#kas_name").hide();
		}
		
		if(value_checked == "1"){
			$("#kas_name").hide();
		}
		else{
			$("#kas_name").show();
		}
		
});


	$(".sc").click(function(){


		var value_checked = $(this).val();
		
		if(value_checked == "1"){
			$("#senior1").show();
		}
		else{
			$("#senior1").hide();
		}
				
		if(value_checked == "0"){
			$("#senior1").hide();
		}
		else{
			$("#senior1").show();
		}
		
		
		if(value_checked == "1"){
			$("#senior2").show();
		}
		else{
			$("#senior2").hide();
		}
		
		if(value_checked == "0"){
			$("#senior2").hide();
		}
		else{
			$("#senior2").show();
		}
		
		
		if(value_checked == "1"){
			$("#senior3").show();
		}
		else{
			$("#senior3").hide();
		}
		
		if(value_checked == "0"){
			$("#senior3").hide();
		}
		else{
			$("#senior3").show();
		}
		
		
		if(value_checked == "1"){
			$("#senior4").show();
		}
		else{
			$("#senior4").hide();
		}
		
		if(value_checked == "0"){
			$("#senior4").hide();
		}
		else{
			$("#senior4").show();
		}
});
	
</script>