<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_bmis_default");
$output = '';
$output1 = '';



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

            $query = "SELECT * FROM tbl_covid_cases WHERE (cc_onset BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY cc_onset";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Covid-19 Monitoring Report</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Patient Name</td>
                                        <td class="tdlabel">Age</td>
                                        <td class="tdlabel">Gender</td>
                                        <td class="tdlabel">Address</td>
                                        <td class="tdlabel">Date</td>
                                        <td class="tdlabel">Status</td>
                                        <td class="tdlabel">DRU</td>
                                        <td class="tdlabel">Vaccination Status</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $date_onset = date("M d Y", strtotime($row["cc_onset"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["cc_name"].'</td>
                                            <td>' . $row["cc_age"].'</td>
                                            <td>' . $row["cc_gender"].'</td>
                                            <td>' . $row["cc_address"].'</td>
                                            <td>' . $date_onset.'</td>
                                            <td>' . $row["cc_status"].'</td>
                                            <td>' . $row["cc_dru"].'</td>
                                            <td>' . $row["cc_vaccination"].'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                
            }
            

            $cov = "SELECT * FROM tbl_covid_vaccine WHERE (date_taken BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY date_taken";
            $covv = mysqli_query($connect, $cov);
            if(mysqli_num_rows($covv)){
                $output1 .= '<br /><br /><br />';
                $output1 .= '<center>Covid-19 Vaccine History Report</center>';
                $output1 .= "<center>$from_converted to $to_converted</center><br />";
                $output1 .= '
                <table class="table" bordered="1">
                                        <tr>
                                            <td class="tdlabel">Patient Name</td>
                                            <td class="tdlabel">Age</td>
                                            <td class="tdlabel">Dose Type</td>
                                            <td class="tdlabel">Brand Name</td>
                                            <td class="tdlabel">Dosage</td>
                                            <td class="tdlabel">Date Taken</td>
                                            <td class="tdlabel">Location Vaccine Taken</td>
                                        </tr>
                ';
                while($covv_row = mysqli_fetch_array($covv)){
                    if($covv_row['cc_id'] != 0){
                        $cc_id = $covv_row['cc_id'];
                        $pat = "SELECT * FROM tbl_covid_cases WHERE cc_id = '$cc_id'";
                        $patient = mysqli_query($connect, $pat);
                        if(mysqli_num_rows($patient) > 0){
                            $patient_row = mysqli_fetch_array($patient);

                            $name = $patient_row['cc_name'];
                            $age = $patient_row['cc_age'];
                        }else{
                            $name = "-- --";
                            $age = "-- --";
                        }
                    }

                    $date_taken = date("M d Y", strtotime($covv_row['date_taken']));
                    $output1 .= '
                                        <tr>
                                            <td>' . $name.' </td>
                                            <td>' . $age.' </td>
                                            <td>' . $covv_row["dose_type"].' </td>
                                            <td>' . $covv_row["brand"].' </td>
                                            <td>' . $covv_row["dosage"].' </td>
                                            <td>' . $date_taken.' </td>
                                            <td>' . $covv_row["location"].' </td>
                                        </tr>
                    ';
                }
                    $output1 .= '</table>';
            }

            if($output != "" || $output1 != ""){
                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=Covid-19 Monitoring Report List.xls');
                echo $output;
                echo '<center>*** Nothing Follows ***</center>'. "\n" ;
                echo $output1;
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