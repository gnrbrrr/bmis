<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_bmis_default");
$output = '';


        if(isset($_POST['ctype'])){
            $cert_type = $_POST['ctype'];
        }else{
            $cert_type = $_GET['ctype'];
        }

        if(isset($_POST['report_id'])){
            $report_id = $_POST['report_id'];
        }else{
            $report_id = $_GET['report_id'];
        }

        if($cert_type != 0)
	    { $state = "AND cer_id = '$cert_type'"; }else{ $state = ""; }

        $cert = "SELECT * FROM tbl_certificate WHERE cer_id = '$cert_type'";
        $cert_result = mysqli_query($connect, $cert);
        $cert_row = mysqli_fetch_array($cert_result);

        if($cert_type != 0){
            $title = $cert_row["cer_name"];
        }else{
            $title = "Certificate";
        }
        
        

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

        if($date_from === "" && $date_to === ""){
            header("Location: index.php?view=search&id=$report_id&error=Please Select Dates.");
        }else if($date_from === "" && $date_to != ""){
            header("Location: index.php?view=search&id=$report_id&error=Please Select Dates From.");
        }else if($date_to === "" && $date_from != ""){
            header("Location: index.php?view=search&id=$report_id&error=Please Select Dates To.");
        }else{

            $from_converted = date("M d Y", strtotime($date_from));
            $to_converted = date("M d Y", strtotime($date_to));
        
            $query = "SELECT * FROM tbl_document_request WHERE (date_issued BETWEEN '$date_from' and '$date_to') $state AND is_deleted != '1' ORDER BY date_issued";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo "<center>$title List Record</center>";
                echo "<center>$from_converted to $to_converted</center>";
                echo '<br />';
                
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Reference No.</td>				
                                        <td class="tdlabel">Book No.</td>
                                        <td class="tdlabel">Name</td>
                                        <td class="tdlabel">Address</td>
                                        <td class="tdlabel">Contact No.</td>
                                        <td class="tdlabel">Transaction</td>
                                        <td class="tdlabel">Amount</td>
                                        <td class="tdlabel">Date Issued</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    if($row["cer_id"] != 0){
                        $certi_id = $row["cer_id"];
                        $cer = "SELECT * FROM tbl_certificate WHERE cer_id = '$certi_id'";
                        $cer_result = mysqli_query($connect, $cer);
                        if(mysqli_num_rows($cer_result) > 0){
                            $cer_row = mysqli_fetch_array($cer_result);

                            $transact = $cer_row["cer_name"];
                        }else{
                            $transact = "-- --";
                        }
                    }

                    if($row["b_id"] != 0){
                        $bus_id = $row["b_id"];
                        $business = "SELECT * FROM tbl_business WHERE b_id = '$bus_id'";
                        $bus_result = mysqli_query($connect, $business);
                        if(mysqli_num_rows($bus_result) > 0){
                            $bus_row = mysqli_fetch_array($bus_result);

                            $bookno = $bus_row['bookno'];
                            $name = $bus_row["businessname"];
                            $address = $bus_row["badd"];
                            $contact = $bus_row["ocontact"];
                        }else{
                            $name = "-- --";
                            $address = "-- --";
                            $contact = "-- --";
                        }
                    }else if($row["r_id"] != 0){
                        $res_id = $row["r_id"];
                        $resident = "SELECT * FROM tbl_resident WHERE r_id = '$res_id'";
                        $res_result = mysqli_query($connect, $resident);
                        if(mysqli_num_rows($res_result) > 0){
                            $res_row = mysqli_fetch_array($res_result);

                            $name = $res_row["firstname"] . " " . $res_row['middlename'] . " " . $res_row['lastname'];
                            $address = "";

                            if($res_row['house_num']){
                                $address .= $res_row['house_num'];
                            }else{

                            }

                            if($res_row['unit_name'] && $address != ""){
                                $address .= ', ' . $res_row['unit_name'];
                            }else if($res_row['unit_name'] && $address == ""){
                                $address .= $res_row['unit_name'];
                            }else{
                                
                            }

                            if($res_row['street_name'] && $address != ""){
                                $address .= ', ' . $res_row['street_name'];
                            }else if($res_row['street_name'] && $address == ""){
                                $address .= $res_row['street_name'];
                            }else{

                            }

                            if($res_row['purok'] && $address != ""){
                                $address .= ', ' . $res_row['purok'];
                            }else if($res_row['purok'] && $address == ""){
                                $address .= $res_row['purok'];
                            }else{

                            }

                            if($res_row['area_village'] && $address != ""){
                                $address .= ', ' . $res_row['area_village'];
                            }else if($res_row['area_village'] && $address == ""){
                                $address .= $res_row['area_village'];
                            }else{

                            }

                            if($res_row['barangay'] && $address != ""){
                                $address .= ', ' . $res_row['barangay'];
                            }else if($res_row['barangay'] && $address == ""){
                                $address .= $res_row['barangay'];
                            }else{

                            }

                            if($res_row['city_municipality'] && $address != ""){
                                $address .= ', ' . $res_row['city_municipality'];
                            }else if($res_row['city_municipality'] && $address == ""){
                                $address .= $res_row['city_municipality'];
                            }else{

                            }

                            $contact = $res_row["contactno"];
                            $bookno = "-- --";
                        }else{
                            $name = "-- --";
                            $address = "-- --";
                            $contact = "-- --";
                        }
                    }else{

                    }

                    if($row['b_id'] == 0 && $row['r_id'] == 0){
                        $bookno = "-- --";
                        $name = $row['requestor_name'];
                        $address = $row['requestor_address'];
                        $contact = "-- --";
                    }else{

                    }

                    $date_issued = date("M d Y", strtotime($row["date_issued"]));

                    $output .= '
                                        <tr>  
                                            <td>' . $row["reference_num"].'</td>
                                            <td>' . $bookno.'</td>
                                            <td>' . $name.'</td>
                                            <td>' . $address.'</td>
                                            <td>' . $contact.'</td>
                                            <td>' . $transact.'</td>
                                            <td>' . $row["amount"].'</td>
                                            <td>' . $date_issued.'</td>
                                        </tr>
                    ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header("Content-Disposition: attachment; filename=$title Report List.xls");
                    echo $output;
                    echo '<center>*** Nothing Follows ***</center>'. "\n" ;
            }else{
                header("Location: index.php?view=search&id=$report_id&error=No data on this category. Please choose another category!");
            }
        }
?>