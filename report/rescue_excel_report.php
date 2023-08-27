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
            
            $query = "SELECT * FROM tbl_rescue WHERE (ph_date_incident BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY ph_date_incident";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Rescue Unit Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Patient Name</td>				
                                        <td class="tdlabel">Age</td>
                                        <td class="tdlabel">Gender</td>
                                        <td class="tdlabel">Contact No.</td>
                                        <td class="tdlabel">Date of Incident</td>
                                        <td class="tdlabel">Incident Case</td>
                                        <td class="tdlabel">Case Type</td>
                                        <td class="tdlabel">Time Reported</td>
                                        <td class="tdlabel">Time Incident</td>
                                        <td class="tdlabel">Location of Incident</td>
                                        <td class="tdlabel">Address</td>
                                        <td class="tdlabel">Reported By</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $date_incident = date("M d Y", strtotime($row["ph_date_incident"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["ph_name"].'</td>
                                            <td>' . $row["ph_age"].'</td>
                                            <td>' . $row["ph_gender"].'</td>
                                            <td>' . $row["ph_contact"].'</td>
                                            <td>' . $date_incident.'</td>
                                            <td>' . $row["ph_case"].'</td>
                                            <td>' . $row["ph_case_type"].'</td>
                                            <td>' . $row["ph_time_report"].'</td>
                                            <td>' . $row["ph_time_incident"].'</td>
                                            <td>' . $row["ph_location_incident"].'</td>
                                            <td>' . $row["ph_address"].'</td>
                                            <td>' . $row["ph_reported_by"].'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=Rescue Unit Report List.xls');
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