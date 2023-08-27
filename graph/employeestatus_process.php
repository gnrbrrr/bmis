<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
	
	$del = $conn->prepare("DELETE FROM tr_graph_employeestatus");
	$del->execute();
?>		
<!--<table>!-->
<?php
		$sql0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased'");
		$sql0->execute();
		$sql0_num = $sql0->rowCount();
		if($sql0_num > 0)
		{
			$sql0_data = $sql0->fetch();
			
				$s0 = "Total";
				
				$in0 = $conn->prepare("INSERT INTO tr_graph_employeestatus (status, total) VALUES ('$s0', '$sql0_num')");
				$in0->execute();						
		}
				
		$sql4 = $conn->prepare("SELECT *, COUNT(employeestatus) as total_employeestatus FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased' GROUP BY employeestatus");
		$sql4->execute();
		if($sql4->rowCount() > 0)
		{
			while($sql4_data = $sql4->fetch())
			{
				$s4 = $sql4_data['employeestatus'];
				$t4 = $sql4_data['total_employeestatus'];
				
				$in4 = $conn->prepare("INSERT INTO tr_graph_employeestatus (status, total) VALUES ('$s4', '$t4')");
				$in4->execute();
				
			} // End While
		}
		
		$in2 = $conn->prepare("INSERT INTO tr_graph_employeestatus (status, total) VALUES ('', '0')");
		$in2->execute();
		
		include 'employeestatus_graph.php';
?>
	