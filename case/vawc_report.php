<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$sql = $conn->prepare("SELECT * FROM tbl_document_request");
$sql->execute();
$sql_for = $sql->fetch();

$date_issued = $sql_for['date_issued']

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

    #example23{
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
    <center><h3>VAWC REPORT</h3></center>

    <center><div class="table-responsive">				
					<table id="myTable" class="table table-striped">
						<thead>
							<tr>
								<th>Case No.</th>
								<th>Victim Name</th>
								<th>Perpetrator Name</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
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
												<?php echo utf8_encode($sql_data['entry_number']); ?></td>
											<td><?php echo $sql_data['last_name']; ?>, <?php echo $sql_data['given_name']; ?></td>
											<td><?php echo $sql_data['sus_last_name']; ?>, <?php echo $sql_data['sus_given_name']; ?></td>											
											<!--<td><a href="index.php?view=vwac_modify&id=<?php echo $sql_data['uid']; ?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-edit m-l-5"></i> <span>Edit</span></a>
												&nbsp;
												<a href="vwac_process.php?action=delete&id=<?php echo $sql_data['uid']; ?>" class="btn btn-danger waves-effect waves-light" onClick="return confirmDelete()"><i class="fa fa-trash m-l-5"></i> <span>Delete</span></a>
											</td>!-->
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
	$url = "../payment/index.php";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
?>