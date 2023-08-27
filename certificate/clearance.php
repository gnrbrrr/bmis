<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

/*	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_document_request d, tbl_resident r WHERE d.uid = '$id' AND r.r_id = d.r_id");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	$day_issued = date("jS", strtotime($sql_data['date_issued']));
	$month_issued = date("F", strtotime($sql_data['date_issued']));
	$year_issued = date("Y", strtotime($sql_data['date_issued']));
	
	if ($sql_data['thumbnail']) {
		$thumbnail7 = WEB_ROOT . 'images/resident/' . $sql_data['thumbnail'];
	} else {
		$thumbnail7 = WEB_ROOT . 'images/resident/noimage.png';
	}
*/
?>
<html>
<head>
<title>Barangay Clearance</title>
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
	
	<style>
	@media print {
body {
   content:url(clearance.jpg);
  }
}
	</style>
</head>

<body background="clearance.jpg">
	<center>
		<table id="divToPrint" style="width:100%; border:solid 0px;">
		<tr>
			<td valign="top"><center><img src="<?php echo WEB_ROOT; ?>certificate/header.jpg" /></center></td>
		</tr>
		<tr><td></td></tr>
		<tr>
			<td valign="top"><center><h1>Barangay Clearance</h1></center></td>
		</tr>
		<tr>
			
			<td valign="top" style="border:solid 0px #000000;">
				<table style="border:solid 0px #000000; width:100%; padding-left:17px;">
					<tr><td></td></tr>
					<tr>
						<td valign="top" style="font-size:21px;"><center><img src="<?php echo $thumbnail7; ?>" style="width:155px; height:155px;" /><br /><b><?php echo $sql_data['reference_num']; ?></b></center></td>
					</tr>
		
					<tr><td><br /></td></tr>
					
					<tr>
						<td valign="top">	
							<center><img src="<?php echo WEB_ROOT; ?>certificate/footer.jpg" /></center>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		</table>
	</center>
</body>
</html>
<?php
//	$url = "../document/index.php";
//	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>