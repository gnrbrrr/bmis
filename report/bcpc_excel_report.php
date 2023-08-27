<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_bmis_default");
$output = '';



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

            $query = "SELECT * FROM tbl_vwac WHERE (vwac_date_accomplished BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY vwac_date_accomplished";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>BCPC Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Reference No.</td>				
                                        <td class="tdlabel">Case No.</td>
                                        <td class="tdlabel">Victim</td>
                                        <td class="tdlabel">Age</td>
                                        <td class="tdlabel">Perpetrator</td>
                                        <td class="tdlabel">Date Reported</td>
                                        <td class="tdlabel">Date Accomplished</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $victim = $row["vwac_victim_firstname"] . " " . $row["vwac_victim_middlename"] . " " . $row["vwac_victim_lastname"];
                    $perpetrator = $row["vwac_perpetrator_firstname"] . " " . $row["vwac_perpetrator_middlename"] . " " . $row["vwac_perpetrator_lastname"];
                    $date_reported = date("M d Y", strtotime($row["vwac_date_reported"]));
                    $date_accomplished = date("M d Y", strtotime($row["vwac_date_accomplished"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["reference_no"].'</td>
                                            <td>' . $row["case_no"].'</td>
                                            <td>' . $victim.'</td>
                                            <td>' . $row["vwac_age"].'</td>
                                            <td>' . $perpetrator.'</td>
                                            <td>' . $date_reported.'</td>
                                            <td>' . $date_accomplished.'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=BCPC Report List.xls');
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