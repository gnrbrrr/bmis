<?php
    require_once '../global-library/config.php';
    require_once '../include/functions.php';

    if(isset($_POST['med_requested'])){
        $medicine_requested = $_POST['med_requested'];
    }else{
        $medicine_requested = $_GET['med_requested'];
    }

    $total_qty = 0;

    $me = $conn->prepare("SELECT * FROM tbl_med_inventory WHERE medicine = '$medicine_requested' AND is_deleted != '1'");
    $me->execute();

    $me_data = $me->fetch();
    
    $total_qty = $me_data['on_hand'];

    echo $total_qty;
?>


<script>
    var total = "<?php echo $total_qty; ?>";

    console.log(total);
</script>