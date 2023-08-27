<?php
    require_once '../global-library/config.php';
    require_once '../include/functions.php';

    if(isset($_POST['name_id'])){
        $name_id = $_POST['name_id'];
    }else{
        $name_id = $_GET['name_id'];
    }

    $res = $conn->prepare("SELECT * FROM tbl_resident WHERE r_id = '$name_id'");
    $res->execute();
    $res_data = $res->fetch();
    
    $firstname = $res_data['firstname'];
    $middlename = $res_data['middlename'];
    $lastname = $res_data['lastname'];

    $blot = $conn->prepare("SELECT * FROM tbl_blotter WHERE respondent_firstname = '$firstname' AND respondent_lastname = '$lastname' AND is_deleted != '1'");
    $blot->execute();
    if($blot->rowCount() > 0){

        // echo "There is a case here blotter";
        echo "<script>console.log('There is a case here blotter');</script>";
    }else{

    }

    $vawc = $conn->prepare("SELECT * FROM tbl_new_vwac WHERE sus_given_name = '$firstname' AND sus_last_name = '$lastname' AND is_deleted != '1'");
    $vawc->execute();
    if($vawc->rowCount() > 0){

        // echo "There is a case here VAWC";
        echo "<script>console.log('There is a case here VAWC');</script>";
    }else{

    }

    $bcpc = $conn->prepare("SELECT * FROM tbl_vwac WHERE vwac_perpetrator_firstname = '$firstname' AND vwac_perpetrator_lastname = '$lastname' AND is_deleted != '1'");
    $bcpc->execute();
    if($bcpc->rowCount() > 0){

        // echo "There is a case here BCPC";
        echo "<script>console.log('There is a case here BCPC');</script>";
    }else{
        
    }

    $lups = $conn->prepare("SELECT * FROM tbl_lupon WHERE lpn_respondent1_firstname = '$firstname' AND lpn_respondent1_lastname = '$lastname' AND is_deleted != '1' OR lpn_respondent2_firstname = '$firstname' AND lpn_respondent2_lastname = '$lastname' AND is_deleted != '1' OR lpn_respondent3_firstname = '$firstname' AND lpn_respondent3_lastname = '$lastname' AND is_deleted != '1'");
    $lups->execute();
    if($lups->rowCount() > 0){

        // echo "There is a case here lups";
        echo "<script>console.log('There is a case here Lups');</script>";
    }else{
        
    }
?>