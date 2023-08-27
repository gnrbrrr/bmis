<?php
    require_once '../global-library/config.php';
    require_once '../include/functions.php';

    $low_qty = "";

    $medicine = $conn->prepare("SELECT * FROM tbl_med_inventory WHERE is_deleted != '1'");
    $medicine->execute();

    if($medicine->rowCount() > 0){
        while($medicine_data = $medicine->fetch()){
            $remaining_qty = $medicine_data['on_hand'];
            $med_name = $medicine_data['medicine'];
            if($remaining_qty <= 20){

                if(!empty($low_qty)){
                    $low_qty .= ", ";
                }
                
                $low_qty .= "$med_name";

                // if(substr($low_qty, -1) == ","){
                //     $low_qty = substr($low_qty, 0, -1);
                // }
            }
        }
        echo $low_qty;
    }else{
        echo "No medicines";
    }

    
?>