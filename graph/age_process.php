<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$userId = $_SESSION['user_id'];	
	
	$del = $conn->prepare("DELETE FROM tr_graph_age");
	$del->execute();
?>		
<!--<table>!-->
<?php
		
		// Infant
			$sql1 = $conn->prepare("SELECT *, COUNT(age) as total_infant FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased' AND age = '0'");
			$sql1->execute();
			if($sql1->rowCount() > 0)
			{
				$sql1_data = $sql1->fetch();
				
				$s1 = "Infant 0";
				$t1 = $sql1_data['total_infant'];
				
				$in1 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('$s1', '$t1', 'infant', 'e17055', 'baby', '0')");
				$in1->execute();
								
			}else{
				$in1 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('Infant', '0', 'infant', 'e17055', 'baby', '0')");
				$in1->execute();
			}
		
		// Children
			$sql2 = $conn->prepare("SELECT *, COUNT(age) as total_children FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased' AND age BETWEEN '1' and '6'");
			$sql2->execute();
			if($sql2->rowCount() > 0)
			{
				$sql2_data = $sql2->fetch();
				
				$s2 = "Children 1-6";
				$t2 = $sql2_data['total_children'];
				
				$in2 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('$s2', '$t2', 'children', '74b9ff', 'child', '1-6')");
				$in2->execute();
								
			}else{
				$in2 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('Children', '0', 'children', '74b9ff', 'child', '1-6')");
				$in2->execute();
			}
				
		// Youth
			$sql3 = $conn->prepare("SELECT *, COUNT(age) as total_youth FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased' AND age BETWEEN '7' and '17'");
			$sql3->execute();
			if($sql3->rowCount() > 0)
			{
				$sql3_data = $sql3->fetch();
				
				$s3 = "Youth 7-17";
				$t3 = $sql3_data['total_youth'];
				
				$in3 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('$s3', '$t3', 'youth', 'd63031', 'youth', '7-17')");
				$in3->execute();
								
			}else{
				$in3 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('Youth', '0', 'youth', 'd63031', 'youth', '7-17')");
				$in3->execute();
			}
		
		// Adult
			$sql4 = $conn->prepare("SELECT *, COUNT(age) as total_adult FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased' AND age BETWEEN '18' and '59'");
			$sql4->execute();
			if($sql4->rowCount() > 0)
			{
				$sql4_data = $sql4->fetch();
				
				$s4 = "Adult 18-59";
				$t4 = $sql4_data['total_adult'];
				
				$in4 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('$s4', '$t4', 'adult', 'a29bfe', 'adult', '18-59')");
				$in4->execute();
								
			}else{
				$in4 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('Adult', '0', 'adult', 'a29bfe', 'adult', '18-59')");
				$in4->execute();
			}
			
		// Senior
			$sql5 = $conn->prepare("SELECT *, COUNT(age) as total_senior FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1'  AND status != 'Deceased' AND age >= '60'");
			$sql5->execute();
			if($sql5->rowCount() > 0)
			{
				$sql5_data = $sql5->fetch();
				
				$s5 = "Senior 60-up";
				$t5 = $sql5_data['total_senior'];
				
				$in5 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('$s5', '$t5', 'senior', 'e84393', 'senior', '60-up')");
				$in5->execute();
								
			}else{
				$in5 = $conn->prepare("INSERT INTO tr_graph_age (status, total, style, color, icon, age) VALUES ('Senior', '0', 'senior', 'e84393', 'senior', '60-up')");
				$in5->execute();
			}
		
	
		$in6 = $conn->prepare("INSERT INTO tr_graph_age (status, total) VALUES ('', '0')");
		$in6->execute();
		
		//include 'age_graph.php';
?>
	