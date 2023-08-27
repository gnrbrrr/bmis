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

            $query = "SELECT * FROM tbl_patient_info WHERE (mh_date_examination BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY mh_date_examination";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Patient Info Records</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                    <td class="tdlabel">Patient Name</td>
                                    <td class="tdlabel">Gender</td>
                                    <td class="tdlabel">Age</td>
                                    <td class="tdlabel">Patient Symptoms/Diagnosis</td>
                                    <td class="tdlabel">Address</td>
                                    <td class="tdlabel">Contact No.</td>
                                    <td class="tdlabel">Civil Status</td>
                                    <td class="tdlabel">Physician</td>
                                    <td class="tdlabel">Date Examination</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $date_exam = date("M d Y", strtotime($row["mh_date_examination"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["pi_name"].'</td>
                                            <td>' . $row["pi_sex"].'</td>
                                            <td>' . $row["pi_age"].'</td>
                                            <td>' . $row["mh_symp_diag"].'</td>
                                            <td>' . $row["pi_home_address"].'</td>
                                            <td>' . $row["pi_contact"].'</td>
                                            <td>' . $row["pi_civil_status"].'</td>
                                            <td>' . $row["mh_physician"].'</td>
                                            <td>' . $date_exam.'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                
            }
            

            $history = "SELECT * FROM tbl_med_history WHERE (history_date_examination BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY history_date_examination";
            $medh = mysqli_query($connect, $history);
            if(mysqli_num_rows($medh)){
                $output1 .= '<br /><br /><br />';
                $output1 .= '<center>Medical History Record</center>';
                $output1 .= "<center>$from_converted to $to_converted</center><br />";
                $output1 .= '
                <table class="table" bordered="1">
                                        <tr>
                                            <td class="tdlabel">Patient Name</td>
                                            <td class="tdlabel">Gender</td>
                                            <td class="tdlabel">Age</td>
                                            <td class="tdlabel">Patient Symptoms / Diagnosis</td>
                                            <td class="tdlabel">Address</td>
                                            <td class="tdlabel">Contact No.</td>
                                            <td class="tdlabel">Civil Status</td>
                                            <td class="tdlabel">Physician</td>
                                            <td class="tdlabel">Date Examination</td>
                                        </tr>
                ';
                while($medh_row = mysqli_fetch_array($medh)){
                    if($medh_row['pi_id'] != 0){
                        $pi_id = $medh_row['pi_id'];
                        $pat = "SELECT * FROM tbl_patient_info WHERE pi_id = '$pi_id'";
                        $patient = mysqli_query($connect, $pat);
                        if(mysqli_num_rows($patient) > 0){
                            $patient_row = mysqli_fetch_array($patient);

                            $name = $patient_row['pi_name'];
                            $gender = $patient_row['pi_sex'];
                            $age = $patient_row['pi_age'];
                            $address = $patient_row['pi_home_address'];
                            $contact = $patient_row['pi_contact'];
                            $civil_stat = $patient_row['pi_civil_status'];
                        }else{
                            $name = "-- --";
                            $gender = "-- --";
                            $age = "-- --";
                            $address = "-- --";
                            $contact = "-- --";
                            $civil_stat = "-- --";
                        }
                    }

                    $history_exam = date("M d Y", strtotime($medh_row['history_date_examination']));
                    $output1 .= '
                                        <tr>
                                            <td>' . $name.' </td>
                                            <td>' . $gender.' </td>
                                            <td>' . $age.' </td>
                                            <td>' . $medh_row["history_symp_diag"].' </td>
                                            <td>' . $address.' </td>
                                            <td>' . $contact.' </td>
                                            <td>' . $civil_stat.' </td>
                                            <td>' . $medh_row["history_physician"].' </td>
                                            <td>' . $history_exam.' </td>
                                        </tr>
                    ';
                }
                    $output1 .= '</table>';
            }

            if($output != "" || $output1 != ""){
                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=Medical Report List.xls');
                if($output != ""){
                    echo $output;
                    echo '<center>*** Nothing Follows ***</center>'. "\n" ;
                }else{

                }

                if($output1 != ""){
                    echo $output1;
                    echo '<center>*** Nothing Follows ***</center>'. "\n" ;
                }else{

                }
            }else{
                header("Location: index.php?view=search&id=$report_id&error=No data on this report.");
            }
        }

?>

<script>
    var report_id = "<?php echo $report_id; ?>";

    console.log(report_id);
</script>