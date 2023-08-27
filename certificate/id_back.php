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

	
	if ($sql_data['thumbnail']) {
		$thumbnail7 = WEB_ROOT . 'images/resident/' . $sql_data['thumbnail'];
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

<body onload="window.print()" style="border:solid 0px; background: url(id_back.jpg); background-repeat: no-repeat; background-size: 325px 206px;">

<style>


.a{
	border: solid 0px;
		display: flex;
        background-color: ;
        flex-direction: row;
		height: 190px;
		
        align-content: flex-start
		margin-top: 100px;
		line-height: 0px;
}
.a1{
	border: solid 0px;
		
		margin-top: 74px;
}

.a2{
	border: solid 0px;
		
		margin-top: 26px;
		margin-left: 5px;
		font-family: Calibri;
		font-size: 10px;
		height: 90px;
		line-height: 12px;
		width: 150px;
		margin-left: 160px;
}
.b1{
	border: solid 0px;
		
		font-family: Calibri;
		font-size: 15px;
		margin-top: -10px;
}

.b2{
	border: solid 0px;
		
		font-family: Calibri;
		font-size: 15px;
		margin-top: -12px;
}

.p1{
	border: solid 0px;
		
		margin-top: -10px;
}

.p2{
	border: solid 0px;
		
		margin-top: -12px;
}

.div1{
	border: solid 0px;
		
		margin-top: -12px;
}
.b3{
	border: solid 0px;
		
		font-family: Calibri;
		font-size: 10px;
		margin-bottom: 20px;
}

.p4{
	border: solid 2px;
	width: 200px;
	line-height: 10px;
}
.img1{
	border: 1px solid;
}





</style>	

	
					

				<div class="a">
				
				
				<div class="a2">
					<p>
					<b><i><?php echo $sql_data['contact_person']; ?></i></b>
					<br />
					<b><i><?php echo $sql_data['contact_person_num']; ?></b>
					
					
					</p>
				
					
					
				</div>
					
				</div>

					


</body>
</html>
<?php
	$url = "../document/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>