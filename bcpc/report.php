<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$sql = $conn->prepare("SELECT * FROM tbl_vwac WHERE is_deleted != '1'");
$sql->execute();


?>

<html>
<head>
<style rel="stylesheet">
th
{   
   color: #000 !important;
   font-family: Arial !important;
   font-weight: bold !important;
   font-size:13px !important;
}
td
{   
   color: #666666 !important;
   font-family: Arial !important;  
   font-size:12px !important;
}
.txt_bx {
	border-bottom:solid 2px #666600;
	border-top:solid 2px #666600;
	border-left:solid 2px #666600;
	border-right:solid 2px #666600;
	width:127px;
}
.data {
	font-size:13px;
	color:#000000;
}
</style>
<style>
    @media print{
        body{
            content: table;
            height: auto;
            padding-bottom: 10%;
        }
    }

    #myTable{
        padding-top: 10%;
    }

    .divBody{

    }

    h3{
        
    }

    th, td{
        border-bottom-style: solid;
        border-width: 2px;
        border-color: black;
    }

    th, td{
        font-size: 12px;
        padding-right: 1rem;
    }

    .a1{
        margin-left: 10%;
    }

    .a2{
        display: flex;
        margin-top: -6.5%;
        margin-left: 60%;
    }
</style>
</head>
<body onload="window.print()">
<form>
<div class="divBody">
    <center><h3>BCPC REPORT</h3></center>

    <center><div class="table-responsive">				
					<table id="myTable" class="table table-striped">
						<thead>
							<tr>
								<th>Cases</th>
								<th>Address</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
								<th></th>
							</tr>
						</tfoot>
						<tbody>
							
							<?php
								if($sql->rowCount() > 0)
								{
									while($sql_data = $sql->fetch())
									{										
							?>
										<tr>
											<td>
												<?php echo utf8_encode($sql_data['vwac_victim']); ?>, <?php echo $sql_data['vwac_address']; ?> 
											</td>
											<td><?php echo $sql_data['vwac_address']; ?></td>
										</tr>
							<?php
									} // End While
								}else{}
							?>
							
						</tbody>
					</table></center>

    <br /><br />
    <div class="a1">
        <p>Prepared By:&ensp;_____________<p>
    </div>

    <div class="a2">
        <p>Acknowledged By:&ensp;_____________</p>
    </div>
</div>
</form>
</body>
<script>
</script>
</html>
<?php
	$url = "../case/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>