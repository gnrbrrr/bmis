<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$sql = $conn->prepare("SELECT * FROM tbl_badak WHERE is_deleted != '1'");
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

    .official{
        border: 0;
        width: 90%;
    }

    .official th, .official td{
        border: 0;
        text-align: center;
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
    <center><h3>BADAC REPORT</h3></center>

    <center><div class="table-responsive">				
					<table id="myTable" class="table table-striped">
						<thead>
							<tr>
								<th>Cases</th>
								<th>Contact No.</th>
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
												<?php echo utf8_encode($sql_data['bdk_pangalan']); ?>, <?php echo $sql_data['bdk_numero_tel']; ?> 
											</td>
											<td><?php echo $sql_data['bdk_numero_tel']; ?></td>
										</tr>
							<?php
									} // End While
								}else{}
							?>
							
						</tbody>
					</table></center>

    <br /><br />
    <table class="official">
        <tr>
            <td><p style="color:black; width:45%;">Prepared By: _______________</p></td>
            <td><p style="color:black; width:45%;">Acknowledged By: _______________</p></td>
        </tr>
    </table>
</div>
</form>
</body>
<script>
</script>
</html>
<?php
	$url = "../case/badak_list.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>