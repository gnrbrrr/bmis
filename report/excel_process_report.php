<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_bmis_default");
$output = '';


        if(isset($_POST['ctype'])){
            $ctype = $_POST['ctype'];
        }else{
            $ctype = $_GET['ctype'];
        }

        

        if($ctype == '2'){
            $query = "SELECT * FROM tbl_business WHERE is_deleted != '1'";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                //title of The excel file
                echo '<center>Business List Record</center>';
               
                $output .= '
                <table class="table" bordered="1">  
                                    <tr>  
                                        <td class="tdlabel">Book No.</td>				
                                        <td class="tdlabel">Business Name</td>
                                        <td class="tdlabel">Owner</td>
                                        <td class="tdlabel">Contact No.fix</td>
                                        <td class="tdlabel">Type</td>
                                        <td class="tdlabel">Location</td>
                                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                $output .= '
                                    <tr>  
                                        <td>' . $row["bookno"].'</td>
                                        <td>' . $row["businessname"].'</td>
                                        <td>' . $row["oname"].'</td>
                                        <td>' . $row["ocontact"].'</td>
                                        <td>' . $row["btype"].'</td>
                                        <td>' . $row["badd"].'</td>
                                    </tr>
                ';
                }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=Business Report List.xls');
                    echo $output;
                    echo '<center>*** Nothing Follows ***</center>'. "\n" ;
            }else{
                header("Location: index.php?view=search&id=b8c37e33defde51cf91e1e03e51657da&error=No data on this category. Please choose another category!");
            }
        }else if($ctype == '3'){
            if(isset($_POST['rtype'])){
                $rtype = $_POST['rtype'];
            }else{
                $rtype = $_GET['rtype'];
            }

            if($rtype == 1) 
            { $choice = "AND is_kasambahay = '1'"; $title = "Kasambahay"; }
            else if($rtype == 2)
            { $choice = "AND is_ofw = '1'"; $title = "OFW";}
            else if($rtype == 3)
            { $choice = "AND is_head_of_family = '1'"; $title = "Head of the Family";}
            else if($rtype == 4)
            { $choice = "AND is_head_of_family != '1'"; $title = "Member of the Family";}
            else if($rtype == 5)
            { $choice = "AND votersstatus = 'Registered'"; $title = "Registered";}
            else if($rtype == 6)
            { $choice = "AND votersstatus = 'Unregistered'"; $title = "Unregistered";}
            else if($rtype == 7)
            { $choice = "AND is_soloparent = '1'"; $title = "Soloparent";}
            else if($rtype == 8)
            { $choice = "AND is_erpat = '1'"; $title = "Erpat";}
            else if($rtype == 9)
            { $choice = "AND is_kababaihan = '1'"; $title = "Kababaihan";}
            else if($rtype == 10)
            { $choice = "AND is_pwd = '1'"; $title = "PWD";}
            else if($rtype == 11)
            { $choice = "AND is_ps4 = '1'"; $title = "4p's";}
            else if($rtype == 12)
            { $choice = "AND is_indigenous = '1'"; $title = "indigenous";}
            else if($rtype == 13)
            { $choice = "AND is_informal_settler = '1'"; $title = "Informal Setter";}
            else if($rtype == 14)
            { $choice = "AND is_sc = '1'"; $title = "Senior";}
            else if($rtype == 15)
            { $choice = "AND gender = 'Male'"; $title = "Male";}
            else if($rtype == 16)
            { $choice = "AND gender = 'Female'"; $title = "Female";}
            else if($rtype == 17)
            { $choice = "AND employeestatus = 'Unemployed '"; $title = "Unemplyed";}
            else if($rtype == 18)
            { $choice = "AND employeestatus = 'Out of School Youth'"; $title = "Out of School Youth";}
            else if($rtype == 19)
            { $choice = "AND lgbtq != 'N/A'"; $title = "LGBTQ";}
            else if($rtype == 20)
            { $choice = "AND pet_own != '0'"; $title = "Pet Owner"; }
            else if($rtype == 21)
            { $choice = "AND maynilad = '1'"; $title = "Maynilad (Own Meter)"; }
            else if($rtype == 22)
            { $choice = "AND meralco = '1'"; $title = "Meralco (Own Meter)"; }
            else if($rtype == 23)
            { $choice = "AND septic_tank = '1'"; $title = "Septic Tank"; }
            else if($rtype == 24)
            { $choice = "AND age BETWEEN 0 AND 1"; $title = "Infant 0 to 1 Years old"; }
            else if($rtype == 25)
            { $choice = "AND age BETWEEN 2 AND 4"; $title = "Toddler 2 to 4 Years old"; }
            else if($rtype == 26)
            { $choice = "AND age BETWEEN 5 AND 12"; $title = "Child 5 to 12 Years old"; }
            else if($rtype == 27)
            { $choice = "AND age BETWEEN 13 AND 19"; $title = "Teen 13 to 19 Years old"; }
            else if($rtype == 28)
            { $choice = "AND age BETWEEN 20 AND 39"; $title = "Adult 20 to 39 Years old"; }
            else if($rtype == 29)
            { $choice = "AND age BETWEEN 40 AND 59"; $title = "Middle Aged Adult 40 to 59 Years old"; }
            else if($rtype == 30)
            { $choice = "AND age >= 60"; $title = "Senior"; }
            else{ $choice = "";$title = "All Record"; }

            if($rtype == 20){
                $query = "SELECT * FROM tbl_resident WHERE is_deleted != '1' AND resident_status != 'Non-Resident' $choice ORDER BY lastname";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    //title of The excel file
                    echo '<center>'. $title . ' List Record</center>';
                
                    $output .= '
                    <table class="table" bordered="1">  
                                        <tr>  
                                            <td class="tdlabel">Last Name</td>				
                                            <td class="tdlabel">First Name</td>
                                            <td class="tdlabel">Middle Name</td>
                                            <td class="tdlabel">Address</td>
                                            <td class="tdlabel">Contact No.</td>
                                            <td class="tdlabel">Pets Owned</td>
                                            <td class="tdlabel">Pet #1 Type</td>
                                            <td class="tdlabel">Pet #1 Quantity</td>
                                            <td class="tdlabel">is Pet#1 Vaccinated</td>
                                            <td class="tdlabel">is is Pet#1 Vaccination date</td>
                                            <td class="tdlabel">Pet #2 Type</td>
                                            <td class="tdlabel">Pet #2 Quantity</td>
                                            <td class="tdlabel">is Pet#2 Vaccinated</td>
                                            <td class="tdlabel">is Pet#2 Vaccination date</td>
                                            <td class="tdlabel">Pet #3 Type</td>
                                            <td class="tdlabel">Pet #3 Quantity</td>
                                            <td class="tdlabel">is Pet#3 Vaccinated</td>
                                        </tr>
                    ';
                    while($row = mysqli_fetch_array($result))
                    {

                        $address = "";

                        if($row['house_num']){
                            $address .= $row['house_num'];
                        }else{

                        }

                        if($row['unit_name'] && $address != ""){
                            $address .= ', ' . $row['unit_name'];
                        }else if($row['unit_name'] && $address == ""){
                            $address .= $row['unit_name'];
                        }else{
                            
                        }

                        if($row['street_name'] && $address != ""){
                            $address .= ', ' . $row['street_name'];
                        }else if($row['street_name'] && $address == ""){
                            $address .= $row['street_name'];
                        }else{

                        }

                        if($row['purok'] && $address != ""){
                            $address .= ', ' . $row['purok'];
                        }else if($row['purok'] && $address == ""){
                            $address .= $row['purok'];
                        }else{

                        }

                        if($row['area_village'] && $address != ""){
                            $address .= ', ' . $row['area_village'];
                        }else if($row['area_village'] && $address == ""){
                            $address .= $row['area_village'];
                        }else{

                        }

                        if($row['barangay'] && $address != ""){
                            $address .= ', ' . $row['barangay'];
                        }else if($row['barangay'] && $address == ""){
                            $address .= $row['barangay'];
                        }else{

                        }

                        if($row['city_municipality'] && $address != ""){
                            $address .= ', ' . $row['city_municipality'];
                        }else if($row['city_municipality'] && $address == ""){
                            $address .= $row['city_municipality'];
                        }else{

                        }
                        //for pet1 vac_date	
                        if($row['pet1_vac1_date']){
                            $pet1_date1 = date("M d Y", strtotime($row['pet1_vac1_date']));
                        }else {
                            $pet1_date1 = "";
                        }

                        //for pet2 vac_date	
                        if($row['pet2_vac1_date']){
                            $pet2_date1 = date("M d Y", strtotime($row['pet2_vac1_date']));
                        }else {
                            $pet2_date1 = "";
                        }

                        //for pet3 vac_date	
                        if($row['pet3_vac1_date']){
                            $pet3_date1 = date("M d Y", strtotime($row['pet3_vac1_date']));
                        }else{
                            $pet3_date1 = "";
                        }
                      

                     $output .= '
                                            <tr>  
                                                <td>' . $row["lastname"].'</td>
                                                <td>' . $row["firstname"].'</td>
                                                <td>' . $row["middlename"].'</td>
                                                <td>' . $address.'</td>
                                                <td>' . $row["contactno"].'</td>
                                                <td>' . $row["pet_own"].'</td>
                                                <td>' . $row["pet1_type"].'</td>
                                                <td>' . $row["pet1_qty"].'</td>
                                                <td>' . $row["is_pet1_vac1"].'</td>
                                                <td>' . $pet1_date1.'</td>
                                                <td>' . $row["pet2_type"].'</td>
                                                <td>' . $row["pet2_qty"].'</td>
                                                <td>' . $row["is_pet2_vac1"].'</td>
                                                <td>' . $pet2_date1.'</td>
                                                <td>' . $row["pet3_type"].'</td>
                                                <td>' . $row["pet3_qty"].'</td>
                                                <td>' . $row["is_pet3_vac1"].'</td>
                                                <td>' . $pet3_date1.'</td>
                                            </tr>
                        ';
                    }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=' . $title . '.xls');
                    echo $output;
                    echo '<center>*** Nothing Follows ***</center>'. "\n" ;
                }else{
                    header("Location: index.php?view=search&id=b8c37e33defde51cf91e1e03e51657da&error=No data on this category. Please choose another category!");
                }

            }else if($rtype == 24 || $rtype == 25 || $rtype == 26 || $rtype == 27 || $rtype == 28 || $rtype == 29 || $rtype == 30) {
                $query = "SELECT * FROM tbl_resident WHERE is_deleted != '1' AND resident_status != 'Non-Resident' $choice ORDER BY age";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    //title of The excel file
                    echo '<center>'. $title . ' List Record</center>';
                
                    $output .= '
                    <table class="table" bordered="1">  
                                        <tr>  
                                            <td class="tdlabel">Last Name</td>				
                                            <td class="tdlabel">First Name</td>
                                            <td class="tdlabel">Middle Name</td>
                                            <td class="tdlabel">Suffix</td>
                                            <td class="tdlabel">Gender</td>
                                            <td class="tdlabel">Age</td>
                                            <td class="tdlabel">Address</td>
                                            <td class="tdlabel">Contact No.</td>
                                            <td class="tdlabel">Civil Status</td>
                                            <td class="tdlabel">Civil Society Organization</td>
                                            <td class="tdlabel">Non Goverment Organization</td>
                                            <td class="tdlabel">Transport Group</td>
                                            <td class="tdlabel">House Structure</td>
                                        </tr>
                    ';
                    while($row = mysqli_fetch_array($result))
                    {
                        $address = "";

                        if($row['house_num']){
                            $address .= $row['house_num'];
                        }else{

                        }

                        if($row['unit_name'] && $address != ""){
                            $address .= ', ' . $row['unit_name'];
                        }else if($row['unit_name'] && $address == ""){
                            $address .= $row['unit_name'];
                        }else{
                            
                        }

                        if($row['street_name'] && $address != ""){
                            $address .= ', ' . $row['street_name'];
                        }else if($row['street_name'] && $address == ""){
                            $address .= $row['street_name'];
                        }else{

                        }

                        if($row['purok'] && $address != ""){
                            $address .= ', ' . $row['purok'];
                        }else if($row['purok'] && $address == ""){
                            $address .= $row['purok'];
                        }else{

                        }

                        if($row['area_village'] && $address != ""){
                            $address .= ', ' . $row['area_village'];
                        }else if($row['area_village'] && $address == ""){
                            $address .= $row['area_village'];
                        }else{

                        }

                        if($row['barangay'] && $address != ""){
                            $address .= ', ' . $row['barangay'];
                        }else if($row['barangay'] && $address == ""){
                            $address .= $row['barangay'];
                        }else{

                        }

                        if($row['city_municipality'] && $address != ""){
                            $address .= ', ' . $row['city_municipality'];
                        }else if($row['city_municipality'] && $address == ""){
                            $address .= $row['city_municipality'];
                        }else{

                        }

                        $output .= '
                                            <tr>  
                                                <td>' . $row["lastname"].'</td>
                                                <td>' . $row["firstname"].'</td>
                                                <td>' . $row["middlename"].'</td>
                                                <td>' . $row["suffix"].'</td>
                                                <td>' . $row["gender"].'</td>
                                                <td>' . $row["age"].'</td>
                                                <td>' . $address.'</td>
                                                <td>' . $row["contactno"].'</td>
                                                <td>' . $row["civilstatus"].'</td>
                                                <td>' . $row["cso"].'</td>
                                                <td>' . $row["ngo"].'</td>
                                                <td>' . $row["transport_group"].'</td>
                                                <td>' . $row["house_structure"].'</td>
                                            </tr>
                        ';
                    }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=' . $title . '.xls');
                    echo $output;
                    echo '<center>*** Nothing Follows ***</center>'. "\n" ;
                }else{
                    header("Location: index.php?view=search&id=b8c37e33defde51cf91e1e03e51657da&error=No data on this category. Please choose a different Option!");
                }
            }else {
                $query = "SELECT * FROM tbl_resident WHERE is_deleted != '1' AND resident_status != 'Non-Resident' $choice ORDER BY lastname";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    //title of The excel file
                    echo '<center>'. $title . ' List Record</center>';
                
                    $output .= '
                    <table class="table" bordered="1">  
                                        <tr>  
                                            <td class="tdlabel">Last Name</td>				
                                            <td class="tdlabel">First Name</td>
                                            <td class="tdlabel">Middle Name</td>
                                            <td class="tdlabel">Suffix</td>
                                            <td class="tdlabel">Gender</td>
                                            <td class="tdlabel">Age</td>
                                            <td class="tdlabel">Address</td>
                                            <td class="tdlabel">Contact No.</td>
                                            <td class="tdlabel">Civil Status</td>
                                            <td class="tdlabel">Civil Society Organization</td>
                                            <td class="tdlabel">Non Goverment Organization</td>
                                            <td class="tdlabel">Transport Group</td>
                                            <td class="tdlabel">House Structure</td>
                                        </tr>
                    ';
                    while($row = mysqli_fetch_array($result))
                    {
                        $address = "";

                        if($row['house_num']){
                            $address .= $row['house_num'];
                        }else{

                        }

                        if($row['unit_name'] && $address != ""){
                            $address .= ', ' . $row['unit_name'];
                        }else if($row['unit_name'] && $address == ""){
                            $address .= $row['unit_name'];
                        }else{
                            
                        }

                        if($row['street_name'] && $address != ""){
                            $address .= ', ' . $row['street_name'];
                        }else if($row['street_name'] && $address == ""){
                            $address .= $row['street_name'];
                        }else{

                        }

                        if($row['purok'] && $address != ""){
                            $address .= ', ' . $row['purok'];
                        }else if($row['purok'] && $address == ""){
                            $address .= $row['purok'];
                        }else{

                        }

                        if($row['area_village'] && $address != ""){
                            $address .= ', ' . $row['area_village'];
                        }else if($row['area_village'] && $address == ""){
                            $address .= $row['area_village'];
                        }else{

                        }

                        if($row['barangay'] && $address != ""){
                            $address .= ', ' . $row['barangay'];
                        }else if($row['barangay'] && $address == ""){
                            $address .= $row['barangay'];
                        }else{

                        }

                        if($row['city_municipality'] && $address != ""){
                            $address .= ', ' . $row['city_municipality'];
                        }else if($row['city_municipality'] && $address == ""){
                            $address .= $row['city_municipality'];
                        }else{

                        }

                        $output .= '
                                            <tr>  
                                                <td>' . $row["lastname"].'</td>
                                                <td>' . $row["firstname"].'</td>
                                                <td>' . $row["middlename"].'</td>
                                                <td>' . $row["suffix"].'</td>
                                                <td>' . $row["gender"].'</td>
                                                <td>' . $row["age"].'</td>
                                                <td>' . $address.'</td>
                                                <td>' . $row["contactno"].'</td>
                                                <td>' . $row["civilstatus"].'</td>
                                                <td>' . $row["cso"].'</td>
                                                <td>' . $row["ngo"].'</td>
                                                <td>' . $row["transport_group"].'</td>
                                                <td>' . $row["house_structure"].'</td>
                                            </tr>
                        ';
                    }
                    $output .= '</table>';
                    header('Content-Type: application/xls');
                    header('Content-Disposition: attachment; filename=' . $title . '.xls');
                    echo $output;
                    echo '<center>*** Nothing Follows ***</center>'. "\n" ;
                }else{
                    header("Location: index.php?view=search&id=b8c37e33defde51cf91e1e03e51657da&error=No data on this category. Please choose a different Option!");
                }
            }
        }
?>