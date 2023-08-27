<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

include ('../phpqrcode/qrlib.php');

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();

	$name = "";
	$address = "";

	if($sql_data['firstname']){
		$name .= $sql_data['firstname'];
	}else{

	}

	if($sql_data['middlename']){
		$name .= ' ' . $sql_data['middlename'];
	}else{

	}

	if($sql_data['lastname']){
		$name .= ' ' . $sql_data['lastname'];
	}else{

	}

	if($sql_data['house_num']){
		$address .= $sql_data['house_num'];
	}else{

	}

	if($sql_data['unit_name'] && $address != ""){
		$address .= ', ' . $sql_data['unit_name'];
	}else if($sql_data['unit_name'] && $address == ""){
		$address .= $sql_data['unit_name'];
	}else{
		
	}

	if($sql_data['street_name'] && $address != ""){
		$address .= ', ' . $sql_data['street_name'];
	}else if($sql_data['street_name'] && $address == ""){
		$address .= $sql_data['street_name'];
	}else{

	}

	if($sql_data['purok'] && $address != ""){
		$address .= ', ' . $sql_data['purok'];
	}else if($sql_data['purok'] && $address == ""){
		$address .= $sql_data['purok'];
	}else{

	}

	if($sql_data['area_village'] && $address != ""){
		$address .= ', ' . $sql_data['area_village'];
	}else if($sql_data['area_village'] && $address == ""){
		$address .= $sql_data['area_village'];
	}else{

	}

	if($sql_data['barangay'] && $address != ""){
		$address .= ', ' . $sql_data['barangay'];
	}else if($sql_data['barangay'] && $address == ""){
		$address .= $sql_data['barangay'];
	}else{

	}

	if($sql_data['city_municipality'] && $address != ""){
		$address .= ', ' . $sql_data['city_municipality'];
	}else if($sql_data['city_municipality'] && $address == ""){
		$address .= $sql_data['city_municipality'];
	}else{

	}

	$birthdate = date("F d, Y", strtotime($sql_data['birthdate']));
	
	$data = "Name: " . $name . "\n\nAddress: " . $address . "\n\nBirth Date: " . $birthdate;

	QRcode::png($data, 'qrcode.png', QR_ECLEVEL_M, 2);

	$day_birth = date("jS", strtotime($sql_data['birthdate']));
	$month_birth = date("F", strtotime($sql_data['birthdate']));
	$year_birth = date("Y", strtotime($sql_data['birthdate']));

	$ddeath = date("jS", strtotime($sql_data['date_death']));
	$mdeath = date("F", strtotime($sql_data['date_death']));
	$ydeath = date("Y", strtotime($sql_data['date_death']));
	
	if ($sql_data['thumbnail']) {
		$thumbnail7 = WEB_ROOT . 'images/resident/' . $sql_data['thumbnail'];
		$orig_image = WEB_ROOT . 'images/resident/' . $sql_data['image'];
	} else {
		$thumbnail7 = WEB_ROOT . 'images/resident/noimage.png';
		$orig_image = WEB_ROOT . 'images/resident/noimage.png';
	}

?>
<html>
<head>
<title>Death Certificate</title>
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

<body onload="window.print()" style="border:solid 0px; background: url(../images/certificate/new_letter_head.png); background-repeat: no-repeat; background-size: 100% 100%;">
	
<style>

.divBody {
	width: 562px;
	height: 903px;
	margin-top: 130px;
	margin-left: 220px;
}

.divBody2 {
	width: 520px;
	height: 640px;
	/* border: 3px solid black; */
	margin-left: 9%;
	font-family: cambria;
}

.title{
	font-family: lucida calligraphy;
	font-size: 42px;
	font-weight: bold;
}

.sub-title{
	/* margin-top: -8%; */
	font-family: lucida calligraphy;
	font-size: 18px;
}

.name{
	margin-top: -8%;
	font-family: cambria;
	font-size: 28px;
	text-decoration: underline;
	width: 98%;
}

.date, .pdeath{
	/* margin-top: -8%; */
	text-decoration: underline;
	font-weight: bold;
	/* width: 98%; */
}

.p1 {
	font-family: lucida calligraphy;
	font-size: 18px;

}

#signage{
	width: 200px;
	border: 0;
	border-bottom: 1px solid black;
	background: transparent;
}

.towhom {
	margin-top: -8%;
	font-family: cambria;
	font-size: 18px;
	width: 98%;
}


</style>	

	<div class="divBody">
		<br />


		<div class="divBody2">
			<br /><br />

			<center><p class="title">Death Certificate</p></center>

			<center><p class="sub-title">This is to acknowledge the death of</p></center>

			<br /><br /><br />

			<center><p class="name"><b><span id="gender"></span></b> <b><?php echo $sql_data['firstname']; ?> <?php echo $sql_data['middlename'] ? $sql_data['middlename'] . ' ' : '&nbsp;'; ?><?php echo $sql_data['lastname']; ?></b></p></center>
			<center><p class="p1">On the <span class="date"><?php echo $ddeath; ?></span> Day of <span class="date"><?php echo $mdeath; ?></span>, In the year <span class="date"><?php echo $ydeath; ?></span>.</p></center>
			<center><p class="p1">At: <span class="pdeath"><?php echo $sql_data['place_death']; ?></span></p></center>
			<center><p class="p1">Cause of Death: <span class="pdeath"><?php echo $sql_data['cause_death']; ?></span></p></center>
			<center><p class="p1">Born on the <span class="date"><?php echo $day_birth; ?></span> Day of <span class="date"><?php echo $month_birth; ?></span>, In the year <span class="date"><?php echo $year_birth; ?></span>.</p></center>
			
			<br /><br />

			<center><p class="p1">Signed: <input type="text" name="" id="signage"></p></center>
			<center><p class="p1">Signed: <input type="text" name="" id="signage"></p></center>
			<center><img src="<?php echo "qrcode.png"?>" alt=""></center>
		</div>

	</div>			
</body>
</html>
<script>
	var civil_status = "<?php echo $sql_data['civilstatus']; ?>";
	var gender = "<?php echo $sql_data['gender']; ?>";

	if(civil_status == "Single" && gender == "Female" || civil_status == "Divorced" && gender == "Female" || civil_status == "Annulled" && gender == "Female"){
		document.getElementById("gender").innerHTML = "Ms.";
	}else if(civil_status == "Married" && gender == "Female" || civil_status == "Separated" && gender == "Female" || civil_status == "Widowed" && gender == "Female"){
		document.getElementById("gender").innerHTML = "Mrs.";
	}else{
		document.getElementById("gender").innerHTML = "Mr.";
	}
</script>
<?php
	$url = "../residentsrecord/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>