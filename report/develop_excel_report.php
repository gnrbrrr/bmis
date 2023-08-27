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
            
            $query = "SELECT * FROM tbl_project WHERE (p_date BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY p_date";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Development Project Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Project Title</td>				
                                        <td class="tdlabel">Project Leader</td>
                                        <td class="tdlabel">Project Location</td>
                                        <td class="tdlabel">Source of Funds</td>
                                        <td class="tdlabel">Project Cost</td>
                                        <td class="tdlabel">Target Completion Date</td>
                                        <td class="tdlabel">Company Name</td>
                                        <td class="tdlabel">Contact Person</td>
                                        <td class="tdlabel">Position</td>
                                        <td class="tdlabel">Contact No.</td>
                                        <td class="tdlabel">Company Address</td>
                                        <td class="tdlabel">Status</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $date_project = date("M d Y", strtotime($row["p_date"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["p_title"].'</td>
                                            <td>' . $row["p_leader"].'</td>
                                            <td>' . $row["p_location"].'</td>
                                            <td>' . $row["p_source"].'</td>
                                            <td>&#8369;' . number_format($row["p_cost"], 2).'</td>
                                            <td>' . $date_project.'</td>
                                            <td>' . $row["p_compname"].'</td>
                                            <td>' . $row["p_contactp"].'</td>
                                            <td>' . $row["p_position"].'</td>
                                            <td>' . $row["p_contactno"].'</td>
                                            <td>' . $row["p_caddress"].'</td>
                                            <td>' . $row["p_status"].'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=Development Report List.xls');
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