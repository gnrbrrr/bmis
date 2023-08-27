<?php
    require_once '../global-library/config.php';
    require_once '../include/functions.php';

    $low_qty = "";

    $borrowed = $conn->prepare("SELECT * FROM tbl_borrowed");
    $borrowed->execute();

    while($borrowed_data = $borrowed->fetch()){
        
        if($remaining_qty <= 10){

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
?>


<script>
    var low_qty = "<?php echo $low_qty; ?>";

    console.log(low_qty);
</script>