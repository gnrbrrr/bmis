<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
	
	$del = $conn->prepare("DELETE FROM tr_graph_votersstatus");
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
				
				$in0 = $conn->prepare("INSERT INTO tr_graph_votersstatus (status, total) VALUES ('$s0', '$sql0_num')");
				$in0->execute();						
		}
			
		$sql5 = $conn->prepare("SELECT *, COUNT(votersstatus) as total_votersstatus FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased' GROUP BY votersstatus");
		$sql5->execute();
		if($sql5->rowCount() > 0)
		{
			while($sql5_data = $sql5->fetch())
			{
				$s5 = $sql5_data['votersstatus'];
				$t5 = $sql5_data['total_votersstatus'];
				
				$in5 = $conn->prepare("INSERT INTO tr_graph_votersstatus (status, total) VALUES ('$s5', '$t5')");
				$in5->execute();
				
			} // End While
		}
		
		$in2 = $conn->prepare("INSERT INTO tr_graph_votersstatus (status, total) VALUES ('', '0')");
		$in2->execute();
		
		include 'votersstatus_graph.php';
?>
	