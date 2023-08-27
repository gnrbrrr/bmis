<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_bmis_default");
$output = '';
$status = '';



        if(isset($_POST['dfrom'])){
            $date_from = $_POST['dfrom'];
        }else{
            $date_from = $_GET['dfrom'];
        }

        if(isset($_POST['dto'])){
            $date_to = $_POST['dto'];
        }else{
            $date_to = $_GET['dto'];
        }

        if(isset($_POST['report_id'])){
            $report_id = $_POST['report_id'];
        }else{
            $report_id = $_GET['report_id'];
        }

        if($date_from === "" && $date_to === ""){
            header("Location: index.php?view=search&id=$report_id&error=Please Select Dates.");
        }else if($date_from === "" && $date_to != ""){
            header("Location: index.php?view=search&id=$report_id&error=Please Select Dates From.");
        }else if($date_to === "" && $date_from != ""){
            header("Location: index.php?view=search&id=$report_id&error=Please Select Dates To.");
        }else{

            $from_converted = date("M d Y", strtotime($date_from));
            $to_converted = date("M d Y", strtotime($date_to));

            $query = "SELECT * FROM tbl_badak WHERE (bdk_date_ac BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY bdk_date_ac";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>BADAC Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Status</td>				
                                        <td class="tdlabel">Name</td>
                                        <td class="tdlabel">Address</td>
                                        <td class="tdlabel">Contact No.</td>
                                        <td class="tdlabel">Witness</td>
                                        <td class="tdlabel">Date Accomplished</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $status = $row['status'];
                    $status_class = '';

                    //sets class name for row coloring
                    if($status == "Balay Silangan"){
                        $status_class = 'balay_silangan';
                    }else if($status ==	"Arrested"){
                        $status_class = 'arrested';
                    }else if($status == "Rehab/IOP"){
                        $status_class = 'rehab_iop';
                    }else if($status == "Deceased"){
                        $status_class = 'deceased';
                    }else if($status == "CBDRP Graduate"){
                        $status_class = 'cbdrp_graduate';
                    }else if($status == "General Intervention"){
                        $status_class = 'general_intervention';
                    }else if($status == "Non-Resident/Did-not-exist Cannot Be Located"){
                        $status_class = 'non_resident';
                    }else{
                        $status_class = 'plain';
                    }

                    $name = $row["bdk_unang_pangalan"] . " " . $row["bdk_gitnang_pangalan"] . " " . $row["bdk_huling_pangalan"];
                    $date_accomplished = date("M d Y", strtotime($row["bdk_date_ac"]));
                    $output .= '
                                        <tr>
                                            <td><p>' . $status.'</p></td>
                                            <td><p>' . $name.'</p></td>
                                            <td><p>' . $row["bdk_ksk_lugar_trn"].'</p></td>
                                            <td><p>' . $row["bdk_numero_tel"].'</p></td>
                                            <td><p>' . $row["bdk_testigo"].'</p></td>
                                            <td><p>' . $date_accomplished.'</p></td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=BADAC Report List.xls');
                    echo $output;
                    echo '<center>*** Nothing Follows ***</center>'. "\n" ;
            }else{
                header("Location: index.php?view=search&id=$report_id&error=No data on this report.");
            }
        }
?>
<script>
    var report_id = "<?php echo $report_id; ?>";

    console.log(report_id);
</script>