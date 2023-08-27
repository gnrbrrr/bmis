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
    <center><h3>REVENUE REPORT</h3></center>

    <center><table id="example23" class="display nowrap">
            <thead>
                <tr>
                    <th>Reference No.</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        <tbody>
            
            <?php
            $sql = $conn->prepare("SELECT * FROM tbl_document_request ORDER BY $date_issued");
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                $total = 0;
                while($sql_data = $sql->fetch())
                {
                    $certid = $sql_data['cer_id'];
                    $ursid = $sql_data['user_id'];
                    
                    $dtissued_r = date("M d, Y", strtotime($sql_data['date_issued']));
                    
                    $crt = $conn->prepare("SELECT * FROM tbl_certificate WHERE cer_id = '$certid'");
                    $crt->execute();
                    $crt_data = $crt->fetch();
                    
                    if($sql_data['b_id'] != 0)
                    {
                        $bid = $sql_data['b_id'];
                        $bus = $conn->prepare("SELECT * FROM tbl_business WHERE b_id = '$bid'");
                        $bus->execute();
                        if($bus->rowCount() > 0)
                        {												
                            $bus_data = $bus->fetch();
                            
                            $trans_name = $bus_data['businessname'];
                            $refno = $sql_data['book_no'];
                        }else{
                            $trans_name = "-- --";
                            $refno = "-- --";
                        }
                    }else{
                        
                        $rid = $sql_data['r_id'];
                        $res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$rid'");
                        $res->execute();
                        if($res->rowCount() > 0)
                        {
                            $res_data = $res->fetch();
                            
                            $trans_name = $res_data['lastname'] . ', ' . $res_data['firstname'] . ' ' . $res_data['middlename'];
                            $refno = $sql_data['reference_num'];
                        }else{
                            $trans_name = "-- --";
                            $refno = "-- --";
                        }
                    }
                    
                    # Get user details
                    $urs = $conn->prepare("SELECT * FROM bs_user WHERE user_id = '$ursid'");
                    $urs->execute();
                    $urs_data = $urs->fetch();
                    
                    $total += $sql_data['amount'];
        ?>
                    <tr>
                        <td><?php echo $refno; ?></td>
                        <td><?php echo $trans_name; ?></td>
                        <td><?php echo $crt_data['cer_name']; ?></td>
                        <td>&#8369;<?php echo number_format($sql_data['amount'], 2); ?></td>
                        <td><?php echo $dtissued_r; ?></td>
                    </tr>
        <?php
                } // End While
        ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>&#8369;<?php echo number_format($total, 2); ?></b></td>
                    </tr>
        <?php
            }else{ $total = 0.00; }
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