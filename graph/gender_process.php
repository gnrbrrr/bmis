<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
	
	$del = $conn->prepare("DELETE FROM tr_graph_gender");
	$del->execute();
?>		
<!--<table>!-->
<?php

		//resident_status = 'Resident' is added to parameter to exclude the numbers of non-resident to total population and numbers
		$sql0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased'");
		$sql0->execute();
		$sql0_num = $sql0->rowCount();
		if($sql0_num > 0)
		{
			$sql0_data = $sql0->fetch();
			
				$s0 = "Total";
				
				$in0 = $conn->prepare("INSERT INTO tr_graph_gender (status, total) VALUES ('$s0', '$sql0_num')");
				$in0->execute();						
		}
		
		$sql1 = $conn->prepare("SELECT *, COUNT(gender) as total_gender FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased' GROUP BY gender");
		$sql1->execute();
		if($sql1->rowCount() > 0)
		{
			while($sql1_data = $sql1->fetch())
			{
				$s1 = $sql1_data['gender'];
				$t1 = $sql1_data['total_gender'];
				
				$in1 = $conn->prepare("INSERT INTO tr_graph_gender (status, total) VALUES ('$s1', '$t1')");
				$in1->execute();
				
			} // End While
		}
		
	
		$in2 = $conn->prepare("INSERT INTO tr_graph_gender (status, total) VALUES ('', '0')");
		$in2->execute();
		
		include 'gender_graph.php';
?>
	