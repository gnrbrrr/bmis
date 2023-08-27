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

            $query = "SELECT * FROM tbl_new_vwac WHERE (date_report BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY date_report";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>VAWC Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Entry No.</td>				
                                        <td class="tdlabel">Complainant</td>
                                        <td class="tdlabel">Contact No.</td>
                                        <td class="tdlabel">Suspect</td>
                                        <td class="tdlabel">Date Incident</td>
                                        <td class="tdlabel">Date Report</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $complainant = $row["last_name"] . ", " . $row["given_name"] . " " . $row["middle_name"];
                    $suspect = $row["sus_last_name"] . ", " . $row["sus_given_name"] . " " . $row["sus_middle_name"];
                    $date_incident = date("M d Y", strtotime($row["date_incident"]));
                    $date_report = date("M d Y", strtotime($row["date_report"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["entry_number"].'</td>
                                            <td>' . $complainant.'</td>
                                            <td>' . $row["report_contact_number"].'</td>
                                            <td>' . $suspect.'</td>
                                            <td>' . $date_incident.'</td>
                                            <td>' . $date_report.'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=VAWC Report List.xls');
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