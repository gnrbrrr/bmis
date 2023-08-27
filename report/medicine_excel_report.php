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

            $query = "SELECT * FROM tbl_medical_record WHERE (med_datereq BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY med_datereq";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Medicine Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Resident Name</td>				
                                        <td class="tdlabel">Medicine Requested</td>
                                        <td class="tdlabel">Quantity to Consume</td>
                                        <td class="tdlabel">Date Requested</td>
                                        <td class="tdlabel">Remarks</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    if($row["res_id"] != 0){
                        $res_id = $row["res_id"];
                        $med = "SELECT * FROM tbl_resident WHERE r_id = '$res_id'";
                        $medi = mysqli_query($connect, $med);
                        if(mysqli_num_rows($medi) > 0){
                            $medi_row = mysqli_fetch_array($medi);

                            $resident_name = $medi_row["firstname"] . " " . $medi_row["middlename"] . " " . $medi_row["lastname"];
                        }
                    }else{
                        
                    }
                    $date_req = date("M d Y", strtotime($row["med_datereq"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $resident_name.'</td>
                                            <td>' . $row["med_req"].'</td>
                                            <td>' . $row["med_qty"].'</td>
                                            <td>' . $date_req.'</td>
                                            <td>' . $row["remarks"].'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=Medicine Report List.xls');
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