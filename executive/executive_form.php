<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

	$id = $_GET['id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_executive WHERE ex_id = '$id'");
	$sql->execute();
	$sql_data = $sql->fetch();
	
	if ($sql_data['image']) {
		$image = WEB_ROOT . 'images/executive_order/' . $sql_data['image'];
	} else {
		$image = WEB_ROOT . 'images/resident/noimage.png';
	}

?>
<html>
<head>
<title>Building Permit</title>
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
	
<style>

.divBody {
	width: 562px;
	height: 906px;
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
	border: 0px solid;
	width: 350;
	height: ;
	font-family: courier;
	margin-top: 20px;
}

.towhom {
	margin-top: -8%;
	font-family: cambria;
	font-size: 18px;
	width: 98%;
}

.p1{
	font-family: cambria;
	font-size: 14px;
	text-align: justify;
	width: 98%;
}
.p2{
	font-family: cambria;
	font-size: 16px;
	text-align: justify;
	width: 98%;
}

.box1{
	font-size: 34px;
	margin-left: 250px;
	font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif;
}


</style>	

		<img src="<?php echo $image; ?>" style="width:100vw; height:100vh; object-fit:cover; object-position:center;"></img>
</body>
</html>
<?php
	$url = "../executive/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>