<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_bmis_default");
$output = '';
$output1 = '';
$output2 = '';
$total = 0;



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

            $query = "SELECT * FROM tbl_vehicle_trip WHERE is_deleted != '1'";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Vehicle List Records</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Vehicle</td>
                                        <td class="tdlabel">Plate No.</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $output .= '
                                        <tr>  
                                            <td>' . $row["trip_vehicle"].'</td>
                                            <td>' . $row["trip_plate_num"].'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                
            }
            

            $reserve = "SELECT * FROM tbl_vehicle WHERE (date_reserved BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY date_reserved";
            $trip = mysqli_query($connect, $reserve);
            if(mysqli_num_rows($trip)){
                $output1 .= '<br /><br /><br />';
                $output1 .= '<center>Vehicle Scheduled Trips Record</center>';
                $output1 .= "<center>$from_converted to $to_converted</center><br />";
                $output1 .= '
                <table class="table" bordered="1">
                                    <tr>
                                        <td class="tdlabel">Driver</td>
                                        <td class="tdlabel">Vehicle</td>
                                        <td class="tdlabel">Plate No.</td>
                                        <td class="tdlabel">Date Reserved</td>
                                        <td class="tdlabel">Time Reserved</td>
                                        <td class="tdlabel">Activity</td>
                                        <td class="tdlabel">Destination</td>
                                        <td class="tdlabel">Date Dispatched</td>
                                        <td class="tdlabel">Time Dispatched</td>
                                        <td class="tdlabel">Date Returned</td>
                                        <td class="tdlabel">Odo Beginning</td>
                                        <td class="tdlabel">Odo Ending</td>
                                    </tr>
                ';
                while($trip_row = mysqli_fetch_array($trip)){

                    $date_reserved = date("M d Y", strtotime($trip_row['date_reserved']));
                    $date_dispatched = date("M d Y", strtotime($trip_row['date_dispatched']));
                    $date_returned = date("M d Y", strtotime($trip_row['date_returned']));
                    $output1 .= '
                                        <tr>
                                            <td>' . $trip_row['driver'].' </td>
                                            <td>' . $trip_row['vehicle'].' </td>
                                            <td>' . $trip_row['plateno'].' </td>
                                            <td>' . $date_reserved.' </td>
                                            <td>' . $trip_row['time_reserved'].' </td>
                                            <td>' . $trip_row['activity'].' </td>
                                            <td>' . $trip_row['destination'].' </td>
                                            <td>' . $date_dispatched.' </td>
                                            <td>' . $trip_row['time_dispatched'].' </td>
                                            <td>' . $date_returned.' </td>
                                            <td>' . $trip_row['odo_beginning'].' </td>
                                            <td>' . $trip_row['odo_ending'].' </td>
                                        </tr>
                    ';
                }
                    $output1 .= '</table>';
            }

            $maint = "SELECT * FROM tbl_vehicle_maint WHERE (date_maintenance BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY date_maintenance";
            $vehm = mysqli_query($connect, $maint);
            if(mysqli_num_rows($vehm)){
                $output2 .= '<br /><br /><br />';
                $output2 .= '<center>Vehicle Maintenance Record</center>';
                $output2 .= "<center>$from_converted to $to_converted</center><br />";
                $output2 .= '
                <table class="table" bordered="1">
                                    <tr>
                                        <td>Vehicle</td>
                                        <td>Plate No.</td>
                                        <td>Date Maintenance</td>
                                        <td>Corrective Maintenance</td>
                                        <td>Preventive Maintenance</td>
                                        <td>Predictive Maintenance</td>
                                        <td>Expenses</td>
                                    </tr>
                ';
                while($vehm_row = mysqli_fetch_array($vehm)){
                    if($vehm_row['tr_id'] != 0){
                        $tr_id = $vehm_row['tr_id'];
                        $car = "SELECT * FROM tbl_vehicle_trip WHERE tr_id = '$tr_id'";
                        $cars = mysqli_query($connect, $car);
                        if(mysqli_num_rows($cars) > 0){
                            $cars_row = mysqli_fetch_array($cars);

                            $vehicle = $cars_row['trip_vehicle'];
                            $plate_num = $cars_row['trip_plate_num'];
                        }else{
                            $vehicle = "-- --";
                            $plate_num = "-- --";
                        }
                    }
                    $total += $vehm_row['expenses'];
                    $date_maint = date("M d Y", strtotime($vehm_row['date_maintenance']));
                    $output2 .= '
                                    <tr>
                                        <td>' . $vehicle.'</td>
                                        <td>' . $plate_num.'</td>
                                        <td>' . $date_maint.'</td>
                                        <td>' . $vehm_row['corrective_maint'].'</td>
                                        <td>' . $vehm_row['preventive_maint'].'</td>
                                        <td>' . $vehm_row['predictive_maint'].'</td>
                                        <td>&#8369; ' . number_format($vehm_row['expenses'], 2).'</td>
                                    </tr>
                    ';
                }
                    $output2 .= '
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align:right;">Total:</td>
                                        <td>&#8369; ' . number_format($total, 2).'</td>
                                    </tr>
                    ';
                    $output2 .= '</table>';
            }

            if($output != "" || $output1 != "" || $output2 != ""){
                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=Vehicle Log Report List.xls');
                
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

                if($output2 != ""){
                    echo $output2;
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