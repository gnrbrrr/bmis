<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_document_request d, tbl_business_other r WHERE d.uid = '$id' AND r.ob_id = d.ob_id");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$day_issued = date("jS", strtotime($sql_data['date_issued']));
	$month_issued = date("F", strtotime($sql_data['date_issued']));
	$year_issued = date("Y", strtotime($sql_data['date_issued']));
	
	$day_digit = date("d", strtotime($sql_data['date_issued']));
	$month_digit = date("m", strtotime($sql_data['date_issued']));

?>
<html>
<head>
<title>Business Clearance</title>
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

<body onload="window.print()" style="width:98%; height:97%; border:solid 0px; background-repeat: no-repeat; background-size: 100% 100%;">
	
<style>
table tr td {
	border: solid 0px;
}

.information{
	margin-left: -5%;
	margin-top: 3%;
}

.bottom-right{
	margin-top: 15%;
	margin-left: 75%;
}

.bname{
	margin-top: 5%;
}

.address{
	margin-top: 1%;
}

.date{
	margin-top: 2%;
}

.bottom-right p{
	font-family: Tahoma;
}

.nature{
	margin-left: 5%;
	margin-top: 8%;
}

.a1, .a2{
	margin-bottom: -11%;
}
</style>
	<table id="divToPrint" style="border:solid 0px; width: 661.4; height: 831.4px;">
		<tr>
			<td valign="top" style="border:solid 0px #000000; border-spacing: 0; border-collapse: collapse;">
				<table class="information" style="border:solid 0px #000000; width:100%; padding-left:17px;">

					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>


					<tr >
						<td class="bname" valign="top" style="font-size:18px; font-family: Tahoma;">					
						<center><p><b><?php echo strtoupper($sql_data['applicant_name']); ?></b></p></center>
						</td>
					</tr>

					<tr>
						<td valign="top" style="font-size:12px; font-family: Tahoma;">					
						<center><p class="address"><?php echo strtoupper($sql_data['applicant_address']); ?></p></center>
						</td>
					</tr>
					
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					
					<tr>
						<td valign="top" style="font-size:20px; font-family: Tahoma;">					
						<center><p><b> </p></center>
						</td>
					</tr>
					
					<tr><td><br /></td></tr>
					<tr><td><br /></td></tr>
					<tr>
						<td valign="top" style="font-size:12px; font-family: Tahoma;">					
						<center><p class="date"><b><?php echo $day_issued; ?> day of </b><b><?php echo $month_issued; ?>,</b> <b><?php echo $year_issued; ?></b>.</p></center>
						</td>
					</tr>
										
					<tr><td><br /><br /></td></tr>
					
				</table>

				<div>
					<p class="nature" style="font-family:Tahoma; font-weight: bold;"><?php echo strtoupper($sql_data['application_type']); ?></p>
				</div>

				<div class="bottom-right">
					<div class="a1">
						<p><?php echo $sql_data['or_num']; ?></p>
					</div>
					<div class="a2">
						<p id="date_below"><?php echo $month_digit ?> / <?php echo $day_digit; ?> / <?php echo $year_issued; ?></p>
					</div>
					<div class="a3">
						<p><?php echo $sql_data['amount']; ?></p>
					</div>
				</div>
			</td>
		</tr>
	</table>


<?php
$dateissued = date("M d, Y", strtotime($sql_data['date_issued']));

?>
	<div style="align: center; text-align: center; margin:20px;">
		



</body>
<script>
	var today = new Date();

	var current_day = today.getDate();
	var current_month = today.getMonth() + 1; //month array starts at 0
	var current_year = today.getFullYear();

	document.getElementById("day").innerHTML = current_day;
	document.getElementById("month").innerHTML = current_month;
	document.getElementById("year").innerHTML = current_year;

</script>
</html>
<?php
	$url = "../document/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>