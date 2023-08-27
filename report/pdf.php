<?php

    // Include the TCPDF library
    require_once('../libraries/tcpdf.php');
  

    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_bmis_scratch";
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    

    if(isset($_POST['ctype'])){
        $ctype = $_POST['ctype'];
        $rtype = $_POST['rtype'];
        $dfrom = $_GET["dfrom"];
        $dto = $_GET["dto"];
    }else{
        $ctype = $_GET['ctype'];
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
	else{ $choice = "";$title = "All Record"; }


		// if($ctype == '1'){ include ''; } 
		//Business Code Start here
        if($ctype == '2'){
             // Check connection
             if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            // Fetch data from MySQL tbl_business
            $sql = "SELECT * FROM tbl_business WHERE is_deleted != '1' $choice ORDER BY businessname";
            $result = $conn->query($sql);

            // Create new PDF document
            $pdf = new TCPDF('L', 'mm', array(216, 330), true, 'UTF-8', false);
            // Set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Your Name');
            $pdf->SetTitle('Business List Report');
            $pdf->SetSubject('MySQL to PDF using TCPDF');
            $pdf->SetKeywords('MySQL, PDF, TCPDF');


            // Add a page
            $pdf->AddPage();
             //Title PDF report
            $pdf->SetX(140); // Set X position to align with address column
            $pdf->Cell(0, 10, 'Business List Report', 0, 1);
          
            // Set font
            $pdf->SetFont('helvetica', 'B', 10);

           
                    // Add table headers
           
                    $pdf->Cell(20, 10, 'Book No.', 1, 0, 'C');
                    $pdf->Cell(80, 10, 'Business Name', 1, 0, 'C');
                    $pdf->Cell(50, 10, 'Owner', 1, 0, 'C');
                    $pdf->Cell(30, 10, 'Contact No.', 1, 0, 'C');
                    $pdf->Cell(50, 10, 'Type', 1, 0, 'C');
                    $pdf->Cell(80, 10, 'Location', 1, 1, 'C');

                


            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // check if adding this row will cause an overflow
                    //Y is for height and X is for Width
                    
                    $pdf->Cell(20, 10, $row["bookno"], 1, 0, 'C');
                    $pdf->SetX(30); // Set X position to align with address column
                    $pdf->MultiCell(80, 10, $row["businessname"], 1, 'L');

                    $pdf->SetY($pdf->GetY() -10);
                    $pdf->SetX(110); // Set X position to align with address column
                    $pdf->MultiCell(50, 10, $row["oname"], 1, 'L');

                    
                    
                    // for contact and btype
                    $pdf->SetY($pdf->GetY() - 10);
                    $pdf->SetX(160); // Set X position to align with address column
                    $pdf->Cell(30, 10, $row["ocontact"], 1, 0, 'C');
                    // $pdf->Cell(30, 10, $row["btype"], 1, 0, 'C');
                    $pdf->MultiCell(50, 10, $row["btype"], 1, 'L');

                    //for location
                    $pdf->SetY($pdf->GetY()-10);
                    $pdf->SetX(240);
                    $pdf->MultiCell(80, 10, $row["badd"], 1, 'L');
                    
                    // // for contact and civil
                    // $pdf->SetY($pdf->GetY() - 10); // Move Y position back by 10 units
                    // $pdf->SetX(250); // Set X position to align with address column
                    // $pdf->Cell(40, 10, $row["contactno"], 1, 0, 'L');
                    // $pdf->Cell(30, 10, $row["civilstatus"], 1, 1, 'L');
                    
                    
                }
               
            }
                     $pdf->SetX(140); // Set X position to align with address column
                     $pdf->Cell(0, 10, '*** Nothing Follows ***', 0, 1);
            
            // Output PDF
            $pdf->Output('Business List Report', 'D');
            
            // Close MySQL connection
            $conn->close();
            
                    //Business Code End here

         //Resident Code Start here
   }   else if($ctype == '3'){ 
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            // Fetch data from MySQL tbl_resident
            $sql = "SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' $choice ORDER BY lastname";
            $result = $conn->query($sql);

            // Create new PDF document
            $pdf = new TCPDF('L', 'mm', array(216, 330), true, 'UTF-8', false);
            // Set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Your Name');
            $pdf->SetTitle($title . ' List Report');
            $pdf->SetSubject('MySQL to PDF using TCPDF');
            $pdf->SetKeywords('MySQL, PDF, TCPDF');


            // Add a page
            $pdf->AddPage();
             //Title PDF report
            $pdf->SetX(140); // Set X position to align with address column
            $pdf->Cell(0, 10,  $title . ' List Report', 0, 1);
          
            // Set font
            $pdf->SetFont('helvetica', 'B', 10);

           
                    // Add table headers
           
            $pdf->Cell(30, 10, 'Last Name', 1, 0, 'C');
            $pdf->Cell(40, 10, 'First Name', 1, 0, 'C');
            $pdf->Cell(30, 10, 'Middle Name', 1, 0, 'C');
            $pdf->Cell(20, 10, 'Suffix', 1, 0, 'C');
            $pdf->Cell(20, 10, 'Gender', 1, 0, 'C');
            $pdf->Cell(20, 10, 'Age', 1, 0, 'C');
            $pdf->MultiCell(80, 10, 'Address', 1, 'C'); // Set height to 10
            $pdf->SetY($pdf->GetY() - 10); // Move Y position back by 10 units
            $pdf->SetX(250); // Set X position to align with address column
            $pdf->Cell(40, 10, 'Contact No.', 1, 0, 'C');
            $pdf->Cell(30, 10, 'Civil Status', 1, 1, 'C');

                


            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // check if adding this row will cause an overflow
                
                    
                    $pdf->Cell(30, 10, $row["lastname"], 1, 0, 'L');
                    $pdf->SetX(40); // Set X position to align with address column
                    $pdf->Cell(40, 10, $row["firstname"], 1, 0, 'L');
                    $pdf->SetX(80); // Set X position to align with address column
                    $pdf->Cell(30, 10, $row["middlename"], 1, 0, 'L');
                    
                    // for suffic,gender,age and address
                    $pdf->SetX(110); // Set X position to align with address column
                    $pdf->Cell(20, 10, $row["suffix"], 1, 0, 'C');
                    $pdf->Cell(20, 10, $row["gender"], 1, 0, 'C');
                    $pdf->Cell(20, 10, $row["age"], 1, 0, 'C');
                    $pdf->MultiCell(80, 10, $row["address"], 1, 'L');
                    
                    // for contact and civil
                    $pdf->SetY($pdf->GetY() - 10); // Move Y position back by 10 units
                    $pdf->SetX(250); // Set X position to align with address column
                    $pdf->Cell(40, 10, $row["contactno"], 1, 0, 'L');
                    $pdf->Cell(30, 10, $row["civilstatus"], 1, 1, 'L');
                    
                    
                }
               
            }
                     $pdf->SetX(140); // Set X position to align with address column
                     $pdf->Cell(0, 10, '*** Nothing Follows ***', 0, 1);
            
            // Output PDF
            $pdf->Output($title . ' List Report', 'D');
            
            // Close MySQL connection
            $conn->close();//business Code End here
            
                    }
         else{
          

           // Check connection
           if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        // Fetch data from MySQL tbl_resident
        $sql = "SELECT * FROM tbl_badak ";
        $result = $conn->query($sql);

        // Create new PDF document
        $pdf = new TCPDF('L', 'mm', array(216, 330), true, 'UTF-8', false);
        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle($title . ' List Report');
        $pdf->SetSubject('MySQL to PDF using TCPDF');
        $pdf->SetKeywords('MySQL, PDF, TCPDF');


        // Add a page
        $pdf->AddPage();
         //Title PDF report
        $pdf->SetX(140); // Set X position to align with address column
        $pdf->Cell(0, 10,  $title . ' List Report', 0, 1);
      
        // Set font
        $pdf->SetFont('helvetica', 'B', 10);

       
                // Add table headers
       
        $pdf->Cell(30, 10, 'Status', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Name', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Address', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Contact No.', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Witness', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Date Accomplished', 1, 0, 'C');
        // $pdf->MultiCell(80, 10, 'Address', 1, 'C'); // Set height to 10
        // $pdf->SetY($pdf->GetY() - 10); // Move Y position back by 10 units
        // $pdf->SetX(250); // Set X position to align with address column
        // $pdf->Cell(40, 10, 'Contact No.', 1, 0, 'C');
        // $pdf->Cell(30, 10, 'Civil Status', 1, 1, 'C');

            

        // $date_ex = date("M d, Y", strtotime($bdk_data['bdk_date_ac']));
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // check if adding this row will cause an overflow
            
                
                $pdf->Cell(30, 10, $row["bdk_pangalan"], 1, 0, 'L');
                $pdf->SetX(40); // Set X position to align with address column
                $pdf->Cell(40, 10, $row["bdk_ksk_lugar_trn"], 1, 0, 'L');
                $pdf->SetX(80); // Set X position to align with address column
                $pdf->Cell(30, 10, $row["bdk_numero_tel"], 1, 0, 'L');
                
                // for suffic,gender,age and address
                $pdf->SetX(110); // Set X position to align with address column
                $pdf->Cell(20, 10, $row["bdk_testigo"], 1, 0, 'C');
               
                
            }
           
        }
                 $pdf->SetX(140); // Set X position to align with address column
                 $pdf->Cell(0, 10, '*** Nothing Follows ***', 0, 1);
        
        // Output PDF
        $pdf->Output($title . ' List Report', 'D');
        
        // Close MySQL connection
        $conn->close();//PDF Code End here
         }
?>