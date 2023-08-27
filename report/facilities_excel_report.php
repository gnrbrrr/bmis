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
            
            $query = "SELECT * FROM tbl_facility WHERE (req_date BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY req_date";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Facilities Management Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Working No.</td>				
                                        <td class="tdlabel">Status</td>
                                        <td class="tdlabel">Issue Title</td>
                                        <td class="tdlabel">Requested By</td>
                                        <td class="tdlabel">Requested Date</td>
                                        <td class="tdlabel">Facility</td>
                                        <td class="tdlabel">Product Material</td>
                                        <td class="tdlabel">Urgency</td>
                                        <td class="tdlabel">Location</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $date_requested = date("M d Y", strtotime($row["req_date"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["work_num"].'</td>
                                            <td>' . $row["status"].'</td>
                                            <td>' . $row["issue_title"].'</td>
                                            <td>' . $row["req_by"].'</td>
                                            <td>' . $date_requested.'</td>
                                            <td>' . $row["facility"].'</td>
                                            <td>' . $row["product"].'</td>
                                            <td>' . $row["urgency"].'</td>
                                            <td>' . $row["location"].'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=Facilities Management Report List.xls');
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