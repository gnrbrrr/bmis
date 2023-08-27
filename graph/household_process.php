<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
	
	$del = $conn->prepare("DELETE FROM tr_graph_household");
	$del->execute();
?>		
<!--<table>!-->
<?php
		
		$sql1 = $conn->prepare("SELECT *, SUM(householdno) as total_household FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' GROUP BY year_added");
		$sql1->execute();
		if($sql1->rowCount() > 0)
		{
			while($sql1_data = $sql1->fetch())
			{
				$s1 = $sql1_data['year_added'];
				$t1 = $sql1_data['total_household'];
				
				$in1 = $conn->prepare("INSERT INTO tr_graph_household (status, total) VALUES ('$s1', '$t1')");
				$in1->execute();
				
			} // End While
		}
		
	
		$in2 = $conn->prepare("INSERT INTO tr_graph_household (status, total) VALUES ('', '0')");
		$in2->execute();
		
		//include 'gender_graph.php';
?>
	