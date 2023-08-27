<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

include ('../phpqrcode/qrlib.php');

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_document_request d, tbl_resident r WHERE d.uid = '$id' AND r.r_id = d.r_id");
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

	$date_issued = date("F d, Y", strtotime($sql_data['date_issued']));
	$dvalid = date("d", strtotime($sql_data['date_issued']));
	$mvalid = date("F", strtotime($sql_data['date_issued']));
	$yvalid = date("Y", strtotime($sql_data['date_issued'])) + 1;

	$valid_till = $mvalid . " " . $dvalid . ", " . $yvalid;
	
	$data = "Name: " . $name . "\n\nAddress: " . $address . "\n\nBirth Date: " . $birthdate . "\n\nIssued On: " . $date_issued . "\nValid Until: " . $valid_till;

	QRcode::png($data, 'qrcode.png', QR_ECLEVEL_M, 1);
	
	$day_issued = date("jS", strtotime($sql_data['date_issued']));
	$month_issued = date("F", strtotime($sql_data['date_issued']));
	$year_issued = date("Y", strtotime($sql_data['date_issued']));

	$day_iss = date("d", strtotime($sql_data['date_issued']));

	$day_birth = date("d", strtotime($sql_data['birthdate']));
	$month_birth = date("F", strtotime($sql_data['birthdate']));
	$year_birth = date("Y", strtotime($sql_data['birthdate']));
	
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
<title>Certificate of Residency</title>
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
	height: 640;
	margin-left:7%;
	font-family: cambria;
}




.pDiv {
	text-align: justify;
  	text-justify: inter-word;
}

.a{
	border: solid 0px;
		display: flex;
        width: 540px; 
        height: 500px;
        background-color: ;
        flex-direction: row;
        flex-wrap: wrap;
        align-content: flex-start
}

.a1{
	font-family: cambria;
	font-size: 16px;
	text-align: justify;
	width: 98%;
}

.towhom {
	margin-top: -8%;
	font-family: cambria;
	font-size: 18px;
	width: 98%;
}

.p1{
	font-family: courier;
	font-size: 18px;
	text-align: justify;
  	text-justify: inter-word;
	text-indent: 80px;
}
.p2{
	font-family: courier;
	font-size: 24px;
	text-align: justify;
  	text-justify: inter-word;
	text-indent: 80px;
}

.box1{
	font-size: 34px;
	margin-left: 250px;
	font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif;
}

.qrcode{
	position: absolute;
	margin-top: 8%;
	margin-left: 8%;
}


</style>	

	<div class="divBody">
		<br />


		<div class="divBody2">
			<center><p style="font-family: lucida calligraphy; font-size:28px;">Certificate of Residency</p></center>

			<br /><br /><br />
			
			<p class="towhom">TO WHOM IT MAY CONCERN:</p>

			<center><p class="a1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b><span id="gender"></span></b> <b><?php echo $sql_data['firstname']; ?> <?php echo $sql_data['middlename']; ?> 
				<?php echo $sql_data['lastname']; ?></b> born on <b><?php echo $month_birth; ?> <?php echo $day_birth; ?>, <?php echo $year_birth; ?>, <?php echo $sql_data['civilstatus']; ?></b>, is a bonafide <b>resident</b> of 
				<b><?php echo $sql_data['address']; ?></b>, Barangay Novaliches Proper, District V, this City.</p></center>

			<center><p class="a1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The undersigned has certified that after a reasonable inquiry, I have verified the authenticity of barangay residency showing that the applicant has been 
				residing in the barangay for at least six (6) months prior to the application of this affidavit of Residency.</p></center>

			<center><p class="a1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is issued upon the request of the above named person as a supporting document for <b><?php echo $sql_data['purpose']; ?></b></p></center>

			<center><p class="a1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this <b><?php echo $day_issued; ?> day of <?php echo $month_issued; ?>, <?php echo $year_issued; ?></b> at Barangay Novaliches Proper, District V, 
				Quezon City.</p></center>

		</div>

		<div id="res_image" style="position:absolute; margin-top: -25%; margin-left: 6%;">
			<img src="<?php echo $orig_image; ?>" style="border: 2px solid black; width:130px; height:130px;"/>
			<p style="text-align: center; font-family: cambria;">Applicant Photo</p>
		</div>

		<div id="thumbmark" style="position:absolute; margin-top: -23%; margin-left: 24%;">
			<div style="border:2px solid black; background-color: white; margin-top: -15%; width:100px; height: 130px; content=''; position: relative;"></div>
			<p style="text-align: center; font-family: cambria;">Thumbmark</p>
		</div>

		<table style="text-align:center; position:absolute; margin-top:-25%; margin-left:41%;">
			<tr>
				<td>________________________<br />Applicant's Signature</td>
			</tr>
		</table>

		<table id="officials" style="margin-top:0%;position:absolute;">
				<tr>
					<td style="width: 250px;">
						<p style="color: red; font-size: 14; font-family: courier;">					
						<br />
						</p>						
					</td>
					<td style="text-align: center;">
						<p style="font-size:16px;"><b>ASUNCION M. VISAYA</b><br />						
						<p id="cap_title" style="font-size:12px;margin-top:-5%;">Punong Barangay</p></p>
					</td>
				</tr>
				<tr id="just_space">
					<td style="width:250px;height:40px;">
						<p>
						</p>
					</td>
					<td style="width:300px;height:40px;text-align:center;">
						<span id="authorization" style="font-family:cambria;font-style:italic;font-size:12px;"></span>
					</td>
				</tr>
				<tr id="just_space">
					<td style="width: 250px;">
						<p style="color: red; font-size: 14; font-family: courier;">					
						<br />
						</p>						
					</td>
					<td style="text-align: center;">
						<p style="font-size:16px;" id="sign_person"><b><?php echo $sql_data['person_sign']; ?></b><br />						
						<p id="job_title" style="font-size:12px;margin-top:-5%;"></p></p>
					</td>
				</tr>
			</table>

		<br />

		<ul style="position:absolute; font-size: 9px; margin-left:2%; margin-top:4%;">
			<li><span style="font-style:italic;">This certification document is not valid without Official Barangay Dry Seal,<br />Barangay Chairman Signature/Stamp.</span></li>
			<li><span style="font-style:italic;">Officials and applicants who will submit false certification or documents<br />shall be held liable for administrative/criminal liabilities.</span></li>
		</ul>

		<br />

		<table style="margin-left:6%; margin-top:-5%; position:absolute;">
			<tr>
				<td style="width:250px;">
					<p style="font-size: 14; font-family: calibri;">
						Issued On : <b><?php echo $month_issued; ?> <?php echo $day_iss; ?>, <?php echo $year_issued; ?></b>
						<br />
						Valid Until : <b><?php echo $month_issued; ?> <?php echo $day_iss; ?>, <?php echo $year_issued+1; ?></b>
					</p>
				</td>
			</tr>
		</table>
		<table style="margin-left:48%; margin-top:7%; position:absolute;">
			<tr>
				<td style="width:250px;">
					<p style="color: red; font-size: 14; font-family: calibri;">
					O.R Date : <b><?php echo $sql_data['date_issued']; ?></b>						
					<br />
					O.R No. :  <b><?php echo $sql_data['or_num']; ?></b>						
					<br />
					Amount :  <b>&#8369;<?php echo number_format($sql_data['amount'], 2); ?></b>
					<br />
					Issued By : <b><?php echo $sql_data['issued_by']; ?></b>
					</p>						
				</td>
			</tr>
		</table>

		<img src="<?php echo "qrcode.png"?>" alt="" class="qrcode">
	</div>			
</body>
</html>
<script>
	var person_signing = "<?php echo $sql_data['person_sign']; ?>";
	var civil_status = "<?php echo $sql_data['civilstatus']; ?>";
	var gender = "<?php echo $sql_data['gender']; ?>";

	//Old records have empty person_sign column
	if(person_signing === ""){
		person_signing = "none"; //sets none to person_signing var
	}else{

	}

	//checks for proper format
	if(person_signing != "none"){
		document.getElementById("job_title").innerHTML = "Barangay Kagawad";
		document.getElementById("authorization").innerHTML = "For and by the authority of the Punong Barangay:";
		document.getElementById("officials").style.marginTop = "-10%";
		document.getElementById("officials").style.marginLeft = "5%";
		document.getElementById("authorization").style.marginTop = "-5%";
	}else{
		document.getElementById("sign_person").innerHTML = " ";
		document.getElementById("job_title").innerHTML = " ";
		document.getElementById("authorization").innerHTML = " ";
		document.getElementById("just_space").style.display = "none";
		document.getElementById("officials").style.marginTop = "2%";
		document.getElementById("officials").style.marginLeft = "10%";
		document.getElementById("cap_title").style.marginTop = "-10%";
	}

	if(civil_status == "Single" && gender == "Female" || civil_status == "Divorced" && gender == "Female" || civil_status == "Annulled" && gender == "Female"){
		document.getElementById("gender").innerHTML = "Ms.";
	}else if(civil_status == "Married" && gender == "Female" || civil_status == "Separated" && gender == "Female" || civil_status == "Widowed" && gender == "Female"){
		document.getElementById("gender").innerHTML = "Mrs.";
	}else{
		document.getElementById("gender").innerHTML = "Mr.";
	}
</script>
<?php
	$url = "../document/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>