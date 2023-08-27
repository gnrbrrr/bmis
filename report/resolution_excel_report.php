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
            
            $query = "SELECT * FROM tbl_resolution WHERE (re_date BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY re_date";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Barangay Resolution Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Item No.</td>				
                                        <td class="tdlabel">Resolution No.</td>
                                        <td class="tdlabel">Title</td>
                                        <td class="tdlabel">Date Approved</td>
                                        <td class="tdlabel">Committee / Others</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $date = date("M d Y", strtotime($row["re_date"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["re_itemno"].'</td>
                                            <td>' . $row["re_resno"].'</td>
                                            <td>' . $row["re_title"].'</td>
                                            <td>' . $date.'</td>
                                            <td>' . $row["re_committee"].'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=Barangay Resolution Report List.xls');
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