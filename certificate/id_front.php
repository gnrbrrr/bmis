<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_document_request d, tbl_resident r WHERE d.uid = '$id' AND r.r_id = d.r_id");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$day_issued = date("jS", strtotime($sql_data['date_issued']));
	$month_issued = date("F", strtotime($sql_data['date_issued']));
	$year_issued = date("Y", strtotime($sql_data['date_issued']));

	$bday = date("Y - d - m", strtotime($sql_data['birthdate']));

	
	if ($sql_data['thumbnail']) {
		$thumbnail7 = WEB_ROOT . 'images/resident/' . $sql_data['image'];
	} else {
		$thumbnail7 = WEB_ROOT . 'images/resident/noimage.png';
	}
?>
<html>
<head>
<title>Barangay ID</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title><?php echo $pageTitle; ?></title>
    <!-- The styles -->
	<script type="text/javascript">     
		function PrintDiv() {    
		   var divToPrint = document.getElementById('divToPrint');
		   var popupWin = window.open('', '_blank', 'width=auto,height=auto');
		   popupWin.document.open();
		   popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
			popupWin.document.close();
				}
	</script>
</head>

<body onload="window.print()">
	<div class="id_front">
		<img src="<?php echo WEB_ROOT; ?>certificate/id.jpg" style="position:absolute; object-fit:cover; width:100%; height:100%; margin-top:-16px; margin-left:-8px;"></img>
		<div style="position:absolute; margin-top:65px;">
			<img src="<?php echo $thumbnail7; ?>" class="img1" style="width:80px; height:80px; border:2px solid black;" />
		</div>
		
		<div class="a2" style="position:absolute; margin-top:-10px;">
			
			<div style="margin-top:75px; margin-left:90px; font-family:arial;">
				<p class="name_title" style="font-size:8px; font-style:italic;">LAST NAME, FIRST NAME, MI.</p>
				<p class="name" style="margin-top:-7px; font-size:12px; font-weight:bold;"><?php echo $sql_data['lastname']; ?>, <?php echo $sql_data['firstname']; ?> <?php echo $sql_data['middlename']; ?></p>
			</div>

			<br />

			<div style="position:absolute; margin-top:-15%; margin-left:90px; font-family:arial; font-size:8px;">
				<p class="name_title" style="font-style:italic;">DATE OF BIRTH</p>
				<p class="name" style="margin-top:-7px;font-weight:bold;"><?php echo $bday; ?></p>
			</div>
			<div style="position:absolute; margin-top:-15%; margin-left:160px; font-family:arial; font-size:8px;">
				<p class="name_title" style="font-style:italic; width:100px;">CIVIL STATUS</p>
				<p class="name" style="margin-top:-7px;font-weight:bold;"><?php echo $sql_data['civilstatus']?></p>
			</div>
			<div style="position:absolute; margin-top:-15%; margin-left:230px; font-family:arial; font-size:8px;">
				<p class="name_title" style="font-style:italic;">GENDER</p>
				<p class="name" style="margin-top:-7px;font-weight:bold;"><?php echo $sql_data['gender']; ?></p>
			</div>
			
			<!-- 2nd layer -->
			<div style="position:absolute; margin-top:-2%; margin-left:90px; font-family:arial; font-size:8px;">
				<p class="name_title" style="font-style:italic;">PRECINT NO.</p>
				<p class="name" style="margin-top:-7px;font-weight:bold;"><?php echo $sql_data['precintno']; ?></p>
			</div>
			<div style="position:absolute; margin-top:-2%; margin-left:160px; font-family:arial; font-size:8px;">
				<p class="name_title" style="font-style:italic; width:100px;">RESIDENT ID NO.</p>
				<p class="name" style="margin-top:-7px;font-weight:bold;"><?php echo $sql_data['idno']?></p>
			</div>

			<!-- address -->
			<div style="position:absolute; margin-top:10%; margin-left:90px; font-family:arial; font-size:8px;">
				<p class="name_title" style="font-style:italic;">ADDRESS</p>
				<p class="name" style="width:220px; margin-top:-7px; font-weight:bold; overflow-wrap:break-word;"><?php echo $sql_data['address']; ?></p>
			</div>
		</div>
	</div>
	<p style="page-break-after:always;"></p>
	<img src="<?php echo WEB_ROOT; ?>certificate/id_back.jpg" style="object-fit:cover; width:108%; height:108%; margin-top:0.1px; margin-left:-8px;"></img>
	<p style="position:absolute; font-family:arial; font-size:9px; margin-top:258px; margin-left:166px;"><b><?php echo $sql_data['contact_person']; ?></b></p>
	<p style="position:absolute; font-family:arial; font-size:9px; margin-top:273px; margin-left:166px;"><b><?php echo $sql_data['contact_person_num']; ?></b></p>
</body>
</html>
<?php
	$url = "../document/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>