<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_bmis_default");
$output = '';
$output2 = '';
$output3 = '';



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

            $query = "SELECT * FROM tbl_inventory WHERE (in_dop BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY in_dop";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0){
                //title in The excel file
                $output .= '<center>Barangay Inventory Record</center>';
                $output .= "<center>$from_converted to $to_converted</center>";
                $output .= '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Serial No.</td>				
                                        <td class="tdlabel">Item</td>
                                        <td class="tdlabel">Item Description</td>
                                        <td class="tdlabel">Date Purchased</td>
                                        <td class="tdlabel">Amount</td>
                                        <td class="tdlabel">Condition</td>
                                        <td class="tdlabel">Total Quantity</td>
                                        <td class="tdlabel">Available Quantity</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $date_purchased = date("M d Y", strtotime($row["in_dop"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $row["in_serialno"].'</td>
                                            <td>' . $row["in_item"].'</td>
                                            <td>' . $row["in_itemdesc"].'</td>
                                            <td>' . $date_purchased.'</td>
                                            <td>' . $row["in_amt"].'</td>
                                            <td>' . $row["in_condition"].'</td>
                                            <td>' . $row["in_qty"].'</td>
                                            <td>' . $row["in_available_qty"].'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
            }


            $bdrrm = "SELECT * FROM tbl_bdrrm WHERE is_deleted != '1' ORDER BY particulars";
            $bdr = mysqli_query($connect, $bdrrm);
            if(mysqli_num_rows($bdr) > 0){
                $output2 .= '<br /><br /><br />';
                $output2 .= '<center>BDRRM Inventory Record</center>';
                $output2 .= "<center>$from_converted to $to_converted</center><br />";
                $output2 .= '
                <table class="table" bordered="1">
                                    <tr>
                                        <td class="tdlabel">Particulars</td>
                                        <td class="tdlabel">Quantity</td>
                                        <td class="tdlabel">Consumed</td>
                                        <td class="tdlabel">On Hand</td>
                                    </tr>
                ';
                while($bdr_row = mysqli_fetch_array($bdr)){
                    $output2 .= '
                                    <tr>  
                                        <td>' . $bdr_row["particulars"].'</td>
                                        <td>' . $bdr_row["quantity"].'</td>
                                        <td>' . $bdr_row["consumed"].'</td>
                                        <td>' . $bdr_row["on_hand"].'</td>
                                    </tr>
                    ';
                }
                    $output2 .= '</table>';
            }


            $medi = "SELECT * FROM tbl_med_inventory WHERE is_deleted != '1' ORDER BY medicine";
            $med = mysqli_query($connect, $medi);
            if(mysqli_num_rows($med) > 0){
                $output3 .= '<br /><br /><br />';
                $output3 .= '<center>Medicine Inventory Record</center>';
                $output3 .= '
                <table class="table" bordered="1">
                                    <tr>
                                        <td class="tdlabel">Medicine</td>
                                        <td class="tdlabel">Quantity</td>
                                        <td class="tdlabel">Consumed</td>
                                        <td class="tdlabel">On Hand</td>
                                    </tr>
                ';
                while($med_row = mysqli_fetch_array($med)){
                    $output3 .= '
                                    <tr>  
                                        <td>' . $med_row["medicine"].'</td>
                                        <td>' . $med_row["quantity"].'</td>
                                        <td>' . $med_row["consumed"].'</td>
                                        <td>' . $med_row["on_hand"].'</td>
                                    </tr>
                    ';
                }
                    $output3 .= '</table>';
            }
            
            if($output != "" || $output2 != "" || $output3 != ""){
                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=Inventory Report List.xls');
                if($output != ""){
                    echo $output;
                    echo '<center>*** Nothing Follows ***</center>'. "\n" ;
                }else{

                }

                if($output2 != ""){
                    echo $output2;
                    echo '<center>*** Nothing Follows ***</center>' . "\n";
                }else{
                    
                }

                if($output3 != ""){
                    echo $output3;
                    echo '<center>*** Nothing Follows ***</center>' . "\n";
                }else{

                }
                
            }else{
                header("Location: index.php?view=search&id=$report_id&error=No data on this report.");
            }
        }
        
        
        
        // else{
        //     header("Location: index.php?view=search&id=$report_id&error=No data on this report.");
        // }
?>
<script>
    var report_id = "<?php echo $report_id; ?>";

    console.log(report_id);
</script>