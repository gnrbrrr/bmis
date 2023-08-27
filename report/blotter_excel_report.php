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

            $query = "SELECT * FROM tbl_blotter WHERE (date_reported BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY date_reported";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Blotter Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Blotter No.</td>				
                                        <td class="tdlabel">Complainant</td>
                                        <td class="tdlabel">Suspect</td>
                                        <td class="tdlabel">Nature of Case</td>
                                        <td class="tdlabel">Date Reported</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $suspect = $row["respondent_firstname"] . " " . $row["respondent_middlename"] . " " . $row["respondent_lastname"];
                    $date_reported = date("M d Y", strtotime($row["date_reported"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["blotter_no"].'</td>
                                            <td>' . $row["complainant"].'</td>
                                            <td>' . $suspect.'</td>
                                            <td>' . $row["natureofcase"].'</td>
                                            <td>' . $date_reported.'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=Blotter Report List.xls');
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