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

            $query = "SELECT * FROM tbl_borrowed WHERE (br_dateborrowed BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY br_dateborrowed";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Borrowed Items Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Name of Borrower</td>				
                                        <td class="tdlabel">Item Name</td>
                                        <td class="tdlabel">Item Description</td>
                                        <td class="tdlabel">Borrowed Quantity</td>
                                        <td class="tdlabel">Item Condition</td>
                                        <td class="tdlabel">Returned By</td>
                                        <td class="tdlabel">Date Returned</td>
                                        <td class="tdlabel">Time Returned</td>
                                        <td class="tdlabel">Event Location</td>
                                        <td class="tdlabel">Date Borrowed</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    if($row["br_datereturned"]){
                        $date_returned = date("M d Y", strtotime($row["br_datereturned"]));
                    }else{
                        $date_returned = "";
                    }
                    
                    $date_borrowed = date("M d Y", strtotime($row["br_dateborrowed"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["br_name"].'</td>
                                            <td>' . $row["br_item"].'</td>
                                            <td>' . $row["br_itemdesc"].'</td>
                                            <td>' . $row["br_borrow_qty"].'</td>
                                            <td>' . $row["br_condition"].'</td>
                                            <td>' . $row["br_returnby"].'</td>
                                            <td>' . $date_returned.'</td>
                                            <td>' . $row["br_timereturned"].'</td>
                                            <td>' . $row["br_location"].'</td>
                                            <td>' . $date_borrowed.'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=Borrowed Items Report List.xls');
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