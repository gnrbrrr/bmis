<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_bmis_default");
$output = '';
$output2 = '';



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

            $query = "SELECT * FROM tbl_lupon WHERE (lpn_date BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY lpn_date";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Lupon ng Tagapamayapa Record</center>';
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Complainant/s</td>				
                                        <td class="tdlabel">Respondent/s</td>
                                        <td class="tdlabel">Complainant Address</td>
                                        <td class="tdlabel">Complainant Contact No.</td>
                                        <td class="tdlabel">Respondent Address</td>
                                        <td class="tdlabel">Respondent Contact No.</td>
                                        <td class="tdlabel">Date</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    $complainant = "";
                    $respondent = "";

                    if($row["lpn_complaints1_firstname"] && $row["lpn_complaints1_lastname"]){
                        $complainant = $row["lpn_complaints1_firstname"] . " " . $row["lpn_complaints1_middlename"] . " " . $row["lpn_complaints1_lastname"];
                        if($row["lpn_complaints2_firstname"] && $row["lpn_complaints2_lastname"]){
                            $complainant = $row["lpn_complaints1_firstname"] . " " . $row["lpn_complaints1_middlename"] . " " . $row["lpn_complaints1_lastname"] . ", " . $row["lpn_complaints2_firstname"] . " " . $row["lpn_complaints2_middlename"] . " " . $row["lpn_complaints2_lastname"];
                            if($row["lpn_complaints3_firstname"] && $row["lpn_complaints3_lastname"]){
                                $complainant = $row["lpn_complaints1_firstname"] . " " . $row["lpn_complaints1_middlename"] . " " . $row["lpn_complaints1_lastname"] . ", " . $row["lpn_complaints2_firstname"] . " " . $row["lpn_complaints2_middlename"] . " " . $row["lpn_complaints2_lastname"] . ", " . $row["lpn_complaints3_firstname"] . " " . $row["lpn_complaints3_middlename"] . " " . $row["lpn_complaints3_lastname"];
                            }else{

                            }
                        }else{

                        }
                    }else{

                    }


                    if($row["lpn_respondent1_firstname"] && $row["lpn_respondent1_lastname"]){
                        $respondent = $row["lpn_respondent1_firstname"] . " " . $row["lpn_respondent1_middlename"] . " " . $row["lpn_respondent1_lastname"];
                        if($row["lpn_respondent2_firstname"] && $row["lpn_respondent2_lastname"]){
                            $respondent = $row["lpn_respondent1_firstname"] . " " . $row["lpn_respondent1_middlename"] . " " . $row["lpn_respondent1_lastname"] . ", " . $row["lpn_respondent2_firstname"] . " " . $row["lpn_respondent2_middlename"] . " " . $row["lpn_respondent2_lastname"];
                            if($row["lpn_respondent3_firstname"] && $row["lpn_respondent3_lastname"]){
                                $respondent = $row["lpn_respondent1_firstname"] . " " . $row["lpn_respondent1_middlename"] . " " . $row["lpn_respondent1_lastname"] . ", " . $row["lpn_respondent2_firstname"] . " " . $row["lpn_respondent2_middlename"] . " " . $row["lpn_respondent2_lastname"] . ", " . $row["lpn_respondent3_firstname"] . " " . $row["lpn_respondent3_middlename"] . " " . $row["lpn_respondent3_lastname"];
                            }else{

                            }
                        }else{

                        }
                    }else{

                    }

                    $date = date("M d Y", strtotime($row["lpn_date"]));
                    $output .= '
                                        <tr>  
                                            <td>' . $complainant.'</td>
                                            <td>' . $respondent.'</td>
                                            <td>' . $row["lpn_tirahan_sumbong"].'</td>
                                            <td>' . $row["lpn_contactno"].'</td>
                                            <td>' . $row["lpn_tirahan_sumbong1"].'</td>
                                            <td>' . $row["lpn_contactno1"].'</td>
                                            <td>' . $date.'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
            }

            $lup = "SELECT * FROM tbl_lupon_summons WHERE (date_summon BETWEEN '$date_from' and '$date_to') AND is_deleted != '1' ORDER BY date_summon";
            $lups = mysqli_query($connect, $lup);
            if(mysqli_num_rows($lups) > 0){
                $output2 .= '<br /><br /><br />';
                $output2 .= '<center>Lupon ng Tagapamayapa Summons Record</center>';
                $output2 .= "<center>$from_converted to $to_converted</center><br />";

                $output2 .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Complainant/s</td>				
                                        <td class="tdlabel">Respondent/s</td>
                                        <td class="tdlabel">Complainant Address</td>
                                        <td class="tdlabel">Complainant Contact No.</td>
                                        <td class="tdlabel">Respondent Address</td>
                                        <td class="tdlabel">Respondent Contact No.</td>
                                        <td class="tdlabel">Date Summon</td>
                                        <td class="tdlabel">Time Summon</td>
                                    </tr>
                ';
                while($lup_row = mysqli_fetch_array($lups)){
                    if($lup_row["lpn_id"] != 0){
                        $lpn_id = $lup_row["lpn_id"];

                        $lupsu = "SELECT * FROM tbl_lupon_summons WHERE lpn_id = '$lpn_id'";
                        $lupsum = mysqli_query($connect, $lupsu);
                        if(mysqli_num_rows($lupsum) > 0){
                            $lupsum_row = mysqli_fetch_array($lupsum);

                            $comp_sum = "";
                            $resp_sum = "";

                            if($lupsum_row["complainant1_firstname"] && $lupsum_row["complainant1_lastname"]){
                                $comp_sum = $lupsum_row["complainant1_firstname"] . " " . $lupsum_row["complainant1_middlename"] . " " . $lupsum_row["complainant1_lastname"];
                                if($lupsum_row["complainant2_firstname"] && $lupsum_row["complainant3_lastname"]){
                                    $comp_sum = $lupsum_row["complainant1_firstname"] . " " . $lupsum_row["complainant1_middlename"] . " " . $lupsum_row["complainant1_lastname"] . ", " . $lupsum_row["complainant2_firstname"] . " " . $lupsum_row["complainant2_middlename"] . " " . $lupsum_row["complainant2_lastname"];
                                    if($lupsum_row["complainant3_firstname"] && $lupsum_row["complainant3_lastname"]){
                                        $comp_sum = $lupsum_row["complainant1_firstname"] . " " . $lupsum_row["complainant1_middlename"] . " " . $lupsum_row["complainant1_lastname"] . ", " . $lupsum_row["complainant2_firstname"] . " " . $lupsum_row["complainant2_middlename"] . " " . $lupsum_row["complainant2_lastname"] . ", " . $lupsum_row["complainant3_firstname"] . " " . $lupsum_row["complainant3_middlename"] . " " . $lupsum_row["complainant3_lastname"];
                                    }else{
            
                                    }
                                }else{
            
                                }
                            }else{
            
                            }
            
            
                            if($lupsum_row["respondent1_firstname"] && $lupsum_row["respondent1_lastname"]){
                                $resp_sum = $lupsum_row["respondent1_firstname"] . " " . $lupsum_row["respondent1_middlename"] . " " . $lupsum_row["respondent1_lastname"];
                                if($lupsum_row["respondent2_firstname"] && $lupsum_row["respondent2_lastname"]){
                                    $resp_sum = $lupsum_row["respondent1_firstname"] . " " . $lupsum_row["respondent1_middlename"] . " " . $lupsum_row["respondent1_lastname"] . ", " . $lupsum_row["respondent2_firstname"] . " " . $lupsum_row["respondent2_middlename"] . " " . $lupsum_row["respondent2_lastname"];
                                    if($lupsum_row["respondent3_firstname"] && $lupsum_row["respondent3_lastname"]){
                                        $resp_sum = $lupsum_row["respondent1_firstname"] . " " . $lupsum_row["respondent1_middlename"] . " " . $lupsum_row["respondent1_lastname"] . ", " . $lupsum_row["respondent2_firstname"] . " " . $lupsum_row["respondent2_middlename"] . " " . $lupsum_row["respondent2_lastname"] . ", " . $lupsum_row["respondent3_firstname"] . " " . $lupsum_row["respondent3_middlename"] . " " . $lupsum_row["respondent3_lastname"];
                                    }else{
            
                                    }
                                }else{
            
                                }
                            }else{
            
                            }
                        }
                    }

                    $date_summon = date("M d Y", strtotime($lup_row["date_summon"]));
                    $output2 .= '
                                        <tr>  
                                            <td>' . $comp_sum.'</td>
                                            <td>' . $resp_sum.'</td>
                                            <td>' . $lup_row["tirahan_sumbong"].'</td>
                                            <td>' . $lup_row["contactno"].'</td>
                                            <td>' . $lup_row["tirahan_sumbong1"].'</td>
                                            <td>' . $lup_row["contactno1"].'</td>
                                            <td>' . $date_summon.'</td>
                                            <td>' . $lup_row["time_summon"].'</td>
                                        </tr>
                    ';
                }
                    $output2 .= '</table>';
            }

            if($output != "" || $output2 != ""){
                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=Lupon ng Tagapamayapa Report List.xls');

                if($output != ""){
                    echo $output;
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