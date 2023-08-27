<?php

// Daily Revenue
	$drv = $conn->prepare("SELECT *, SUM(amount) as total_revenue FROM tbl_document_request WHERE is_deleted != '1' AND date_issued = '$today_date2'");
	$drv->execute();
	$drv_num = $drv->rowCount();
	$drv_data = $drv->fetch();
	$revenue = $drv_data['total_revenue'];

// Population
	$pop = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased'");
	$pop->execute();
	$pop_num = $pop->rowCount();
	
	$y8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018'");
	$y8->execute();
	$y8_num = $y8->rowCount();
	
	$y9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019'");
	$y9->execute();
	$y9_num = $y9->rowCount();
	
	$y0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020'");
	$y0->execute();
	$y0_num = $y0->rowCount();
	
	$y1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021'");
	$y1->execute();
	$y1_num = $y1->rowCount();
	
	$y2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022'");
	$y2->execute();
	$y2_num = $y2->rowCount();

	$y3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023'");
	$y3->execute();
	$y3_num = $y3->rowCount();

	$y4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024'");
	$y4->execute();
	$y4_num = $y4->rowCount();

	$y5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025'");
	$y5->execute();
	$y5_num = $y5->rowCount();

	$y6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026'");
	$y6->execute();
	$y6_num = $y6->rowCount();

	$y7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027'");
	$y7->execute();
	$y7_num = $y7->rowCount();
	

// Male
	$male = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND gender = 'Male'");
	$male->execute();
	$male_num = $male->rowCount();
	
	$m8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND gender = 'Male'");
	$m8->execute();
	$m8_num = $m8->rowCount();
	
	$m9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND gender = 'Male'");
	$m9->execute();
	$m9_num = $m9->rowCount();
	
	$m0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND gender = 'Male'");
	$m0->execute();
	$m0_num = $m0->rowCount();
	
	$m1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND gender = 'Male'");
	$m1->execute();
	$m1_num = $m1->rowCount();
	
	$m2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND gender = 'Male'");
	$m2->execute();
	$m2_num = $m2->rowCount();

	$m3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND gender = 'Male'");
	$m3->execute();
	$m3_num = $m3->rowCount();

	$m4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024' AND gender = 'Male'");
	$m4->execute();
	$m4_num = $m4->rowCount();

	$m5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025' AND gender = 'Male'");
	$m5->execute();
	$m5_num = $m5->rowCount();

	$m6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026' AND gender = 'Male'");
	$m6->execute();
	$m6_num = $m6->rowCount();

	$m7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027' AND gender = 'Male'");
	$m7->execute();
	$m7_num = $m7->rowCount();
	

// Female
	$female = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND gender = 'Female'");
	$female->execute();
	$female_num = $female->rowCount();
	
	$f8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND gender = 'Female'");
	$f8->execute();
	$f8_num = $f8->rowCount();
	
	$f9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND gender = 'Female'");
	$f9->execute();
	$f9_num = $f9->rowCount();
	
	$f0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND gender = 'Female'");
	$f0->execute();
	$f0_num = $f0->rowCount();
	
	$f1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND gender = 'Female'");
	$f1->execute();
	$f1_num = $f1->rowCount();
	
	$f2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND gender = 'Female'");
	$f2->execute();
	$f2_num = $f2->rowCount();

	$f3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND gender = 'Female'");
	$f3->execute();
	$f3_num = $f3->rowCount();

	$f4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024' AND gender = 'Female'");
	$f4->execute();
	$f4_num = $f4->rowCount();

	$f5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025' AND gender = 'Female'");
	$f5->execute();
	$f5_num = $f5->rowCount();

	$f6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026' AND gender = 'Female'");
	$f6->execute();
	$f6_num = $f6->rowCount();

	$f7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027' AND gender = 'Female'");
	$f7->execute();
	$f7_num = $f7->rowCount();

// deceased
	$deceased = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' ");
	$deceased->execute();
	$deceased_num = $deceased->rowCount();
	
	$d8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2018' ");
	$d8->execute();
	$d8_num = $d8->rowCount();
	
	$d9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2019' ");
	$d9->execute();
	$d9_num = $d9->rowCount();
	
	$d0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2020' ");
	$d0->execute();
	$d0_num = $d0->rowCount();
	
	$d1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2021' ");
	$d1->execute();
	$d1_num = $d1->rowCount();
	
	$d2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2022' ");
	$d2->execute();
	$d2_num = $d2->rowCount();

	$d3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2023' ");
	$d3->execute();
	$d3_num = $d3->rowCount();

	$d4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2024' ");
	$d4->execute();
	$d4_num = $d4->rowCount();

	$d5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2025' ");
	$d5->execute();
	$d5_num = $d5->rowCount();

	$d6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2026' ");
	$d6->execute();
	$d6_num = $d6->rowCount();

	$d7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status = 'Deceased' AND year_added = '2027' ");
	$d7->execute();
	$d7_num = $d7->rowCount();
	

// Blotter
	$current_year = date("Y");
	$blt = $conn->prepare("SELECT * FROM tbl_blotter WHERE is_deleted != '1' AND year(date_reported) = '$current_year'");
	$blt->execute();
	$blt_num = $blt->rowCount();
	

// Household
	$house = $conn->prepare("SELECT *, SUM(householdno) as total_household FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased'");
	$house->execute();
	$house_num = $house->rowCount();
	$house_data = $house->fetch();
	$hse = $house_data['total_household'];
	
	$h8 = $conn->prepare("SELECT *, SUM(householdno) as total_household_8 FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018'");
	$h8->execute();
	$h8_num = $h8->rowCount();
	$h8_data = $h8->fetch();
	$hs8 = $h8_data['total_household_8'];
	
	$h9 = $conn->prepare("SELECT *, SUM(householdno) as total_household_9 FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019'");
	$h9->execute();
	$h9_num = $h9->rowCount();
	$h9_data = $h9->fetch();
	$hs9 = $h9_data['total_household_9'];
	
	$h0 = $conn->prepare("SELECT *, SUM(householdno) as total_household_10 FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020'");
	$h0->execute();
	$h0_num = $h0->rowCount();
	$h0_data = $h0->fetch();
	$hs0 = $h0_data['total_household_10'];
	
	$h1 = $conn->prepare("SELECT *, SUM(householdno) as total_household_11 FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021'");
	$h1->execute();
	$h1_num = $h1->rowCount();
	$h1_data = $h1->fetch();
	$hs1 = $h1_data['total_household_11'];
	
	$h2 = $conn->prepare("SELECT *, SUM(householdno) as total_household_12 FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022'");
	$h2->execute();
	$h2_num = $h2->rowCount();
	$h2_data = $h2->fetch();
	$hs2 = $h2_data['total_household_12'];
	
	$h3 = $conn->prepare("SELECT *, SUM(householdno) as total_household_13 FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023'");
	$h3->execute();
	$h3_num = $h3->rowCount();
	$h3_data = $h3->fetch();
	$hs3 = $h3_data['total_household_13'];
	

// Voters
	$voter = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND votersstatus = 'Registered'");
	$voter->execute();
	$voter_num = $voter->rowCount();
	
	$v8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND votersstatus = 'Registered'");
	$v8->execute();
	$v8_num = $v8->rowCount();
	
	$v9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND votersstatus = 'Registered'");
	$v9->execute();
	$v9_num = $v9->rowCount();
	
	$v0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND votersstatus = 'Registered'");
	$v0->execute();
	$v0_num = $v0->rowCount();
	
	$v1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND votersstatus = 'Registered'");
	$v1->execute();
	$v1_num = $v1->rowCount();
	
	$v2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND votersstatus = 'Registered'");
	$v2->execute();
	$v2_num = $v2->rowCount();
	
	$v3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND votersstatus = 'Registered'");
	$v3->execute();
	$v3_num = $v3->rowCount();
	
	
// Senior
	$senior = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND age >= '60'");
	$senior->execute();
	$senior_num = $senior->rowCount();
	
	$s8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND age >= '60'");
	$s8->execute();
	$s8_num = $s8->rowCount();
	
	$s9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND age >= '60'");
	$s9->execute();
	$s9_num = $s9->rowCount();
	
	$s0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND age >= '60'");
	$s0->execute();
	$s0_num = $s0->rowCount();
	
	$s1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND age >= '60'");
	$s1->execute();
	$s1_num = $s1->rowCount();
	
	$s2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND age >= '60'");
	$s2->execute();
	$s2_num = $s2->rowCount();
	
	$s3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND age >= '60'");
	$s3->execute();
	$s3_num = $s3->rowCount();
	
	
// Kasambahay
	$kasam = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND is_kasambahay = '1'");
	$kasam->execute();
	$kasam_num = $kasam->rowCount();
	
// Employed
	$emp = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$emp->execute();
	$emp_num = $emp->rowCount();
	
	$e8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e8->execute();
	$e8_num = $e8->rowCount();
	
	$e9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e9->execute();
	$e9_num = $e9->rowCount();
	
	$e0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e0->execute();
	$e0_num = $e0->rowCount();
	
	$e1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e1->execute();
	$e1_num = $e1->rowCount();
	
	$e2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e2->execute();
	$e2_num = $e2->rowCount();
	
	$e3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e3->execute();
	$e3_num = $e3->rowCount();
	
	$e4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e4->execute();
	$e4_num = $e4->rowCount();
	
	$e5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e5->execute();
	$e5_num = $e5->rowCount();
	
	$e6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e6->execute();
	$e6_num = $e6->rowCount();
	
	$e7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027' AND (employeestatus = 'Employed Private' OR employeestatus = 'Employed Government' OR employeestatus = 'Self-Employed')");
	$e7->execute();
	$e7_num = $e7->rowCount();
	
// Un-Employed
	$unemp = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND employeestatus = 'Unemployed'");
	$unemp->execute();
	$unemp_num = $unemp->rowCount();
	
	$u8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND employeestatus = 'Unemployed'");
	$u8->execute();
	$u8_num = $u8->rowCount();
	
	$u9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND employeestatus = 'Unemployed'");
	$u9->execute();
	$u9_num = $u9->rowCount();
	
	$u0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND employeestatus = 'Unemployed'");
	$u0->execute();
	$u0_num = $u0->rowCount();
	
	$u1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND employeestatus = 'Unemployed'");
	$u1->execute();
	$u1_num = $u1->rowCount();
	
	$u2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND employeestatus = 'Unemployed'");
	$u2->execute();
	$u2_num = $u2->rowCount();
	
	$u3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND employeestatus = 'Unemployed'");
	$u3->execute();
	$u3_num = $u3->rowCount();
	
	$u4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024' AND employeestatus = 'Unemployed'");
	$u4->execute();
	$u4_num = $u4->rowCount();
	
	$u5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025' AND employeestatus = 'Unemployed'");
	$u5->execute();
	$u5_num = $u5->rowCount();
	
	$u6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026' AND employeestatus = 'Unemployed'");
	$u6->execute();
	$u6_num = $u6->rowCount();
	
	$u7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027' AND employeestatus = 'Unemployed'");
	$u7->execute();
	$u7_num = $u7->rowCount();
		
// Out of School Youth
	$osy = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND employeestatus = 'Out of School Youth'");
	$osy->execute();
	$osy_num = $osy->rowCount();
	
	$o8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND employeestatus = 'Out of School Youth'");
	$o8->execute();
	$o8_num = $o8->rowCount();
	
	$o9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND employeestatus = 'Out of School Youth'");
	$o9->execute();
	$o9_num = $o9->rowCount();
	
	$o0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND employeestatus = 'Out of School Youth'");
	$o0->execute();
	$o0_num = $o0->rowCount();
	
	$o1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND employeestatus = 'Out of School Youth'");
	$o1->execute();
	$o1_num = $o1->rowCount();
	
	$o2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND employeestatus = 'Out of School Youth'");
	$o2->execute();
	$o2_num = $o2->rowCount();
	
	$o3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND employeestatus = 'Out of School Youth'");
	$o3->execute();
	$o3_num = $o3->rowCount();
	
	$o4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024' AND employeestatus = 'Out of School Youth'");
	$o4->execute();
	$o4_num = $o4->rowCount();
	
	$o5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025' AND employeestatus = 'Out of School Youth'");
	$o5->execute();
	$o5_num = $o5->rowCount();
	
	$o6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026' AND employeestatus = 'Out of School Youth'");
	$o6->execute();
	$o6_num = $o6->rowCount();
	
	$o7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027' AND employeestatus = 'Out of School Youth'");
	$o7->execute();
	$o7_num = $o7->rowCount();
	
	
// Voter Registered
	$vr = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND votersstatus = 'Registered'");
	$vr->execute();
	$vr_num = $vr->rowCount();
	
// Voter Unregistered
	$vu = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND votersstatus = 'Unregistered'");
	$vu->execute();
	$vu_num = $vu->rowCount();


// 4ps
	$four = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND is_ps4 = '1'");
	$four->execute();
	$four_num = $four->rowCount();
	
	$fp8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND is_ps4 = '1'");
	$fp8->execute();
	$fp8_num = $fp8->rowCount();
	
	$fp9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND is_ps4 = '1'");
	$fp9->execute();
	$fp9_num = $fp9->rowCount();
	
	$fp0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND is_ps4 = '1'");
	$fp0->execute();
	$fp0_num = $fp0->rowCount();
	
	$fp1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND is_ps4 = '1'");
	$fp1->execute();
	$fp1_num = $fp1->rowCount();
	
	$fp2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND is_ps4 = '1'");
	$fp2->execute();
	$fp2_num = $fp2->rowCount();
	
	$fp3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND is_ps4 = '1'");
	$fp3->execute();
	$fp3_num = $fp3->rowCount();
	
	$fp4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024' AND is_ps4 = '1'");
	$fp4->execute();
	$fp4_num = $fp4->rowCount();
	
	$fp5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025' AND is_ps4 = '1'");
	$fp5->execute();
	$fp5_num = $fp5->rowCount();
	
	$fp6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026' AND is_ps4 = '1'");
	$fp6->execute();
	$fp6_num = $fp6->rowCount();
	
	$fp7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027' AND is_ps4 = '1'");
	$fp7->execute();
	$fp7_num = $fp7->rowCount();
	
// Indigenous People
	$indp = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND is_indigenous = '1'");
	$indp->execute();
	$indp_num = $indp->rowCount();
	
	$ind8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND is_indigenous = '1'");
	$ind8->execute();
	$ind8_num = $ind8->rowCount();
	
	$ind9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND is_indigenous = '1'");
	$ind9->execute();
	$ind9_num = $ind9->rowCount();
	
	$ind0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND is_indigenous = '1'");
	$ind0->execute();
	$ind0_num = $ind0->rowCount();
	
	$ind1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND is_indigenous = '1'");
	$ind1->execute();
	$ind1_num = $ind1->rowCount();
	
	$ind2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND is_indigenous = '1'");
	$ind2->execute();
	$ind2_num = $ind2->rowCount();
	
	$ind3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND is_indigenous = '1'");
	$ind3->execute();
	$ind3_num = $ind3->rowCount();
	
	$ind4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024' AND is_indigenous = '1'");
	$ind4->execute();
	$ind4_num = $ind4->rowCount();
	
	$ind5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025' AND is_indigenous = '1'");
	$ind5->execute();
	$ind5_num = $ind5->rowCount();
	
	$ind6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026' AND is_indigenous = '1'");
	$ind6->execute();
	$ind6_num = $ind6->rowCount();
	
	$ind7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027' AND is_indigenous = '1'");
	$ind7->execute();
	$ind7_num = $ind7->rowCount();
	

// PWD
	$ind = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND is_pwd = '1'");
	$ind->execute();
	$ind_num = $ind->rowCount();
	
	$pwd8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND is_pwd = '1'");
	$pwd8->execute();
	$pwd8_num = $pwd8->rowCount();
	
	$pwd9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND is_pwd = '1'");
	$pwd9->execute();
	$pwd9_num = $pwd9->rowCount();
	
	$pwd0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND is_pwd = '1'");
	$pwd0->execute();
	$pwd0_num = $pwd0->rowCount();
	
	$pwd1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND is_pwd = '1'");
	$pwd1->execute();
	$pwd1_num = $pwd1->rowCount();
	
	$pwd2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND is_pwd = '1'");
	$pwd2->execute();
	$pwd2_num = $pwd2->rowCount();
	
	$pwd3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND is_pwd = '1'");
	$pwd3->execute();
	$pwd3_num = $pwd3->rowCount();
	
	$pwd4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024' AND is_pwd = '1'");
	$pwd4->execute();
	$pwd4_num = $pwd4->rowCount();
	
	$pwd5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025' AND is_pwd = '1'");
	$pwd5->execute();
	$pwd5_num = $pwd5->rowCount();
	
	$pwd6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026' AND is_pwd = '1'");
	$pwd6->execute();
	$pwd6_num = $pwd6->rowCount();
	
	$pwd7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027' AND is_pwd = '1'");
	$pwd7->execute();
	$pwd7_num = $pwd7->rowCount();
	
// Solo Parent
	$solo = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND is_soloparent = '1'");
	$solo->execute();
	$solo_num = $solo->rowCount();
	
	$sol8 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2018' AND is_soloparent = '1'");
	$sol8->execute();
	$sol8_num = $sol8->rowCount();
	
	$sol9 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2019' AND is_soloparent = '1'");
	$sol9->execute();
	$sol9_num = $sol9->rowCount();
	
	$sol0 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2020' AND is_soloparent = '1'");
	$sol0->execute();
	$sol0_num = $sol0->rowCount();
	
	$sol1 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2021' AND is_soloparent = '1'");
	$sol1->execute();
	$sol1_num = $sol1->rowCount();
	
	$sol2 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2022' AND is_soloparent = '1'");
	$sol2->execute();
	$sol2_num = $sol2->rowCount();
	
	$sol3 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2023' AND is_soloparent = '1'");
	$sol3->execute();
	$sol3_num = $sol3->rowCount();
	
	$sol4 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2024' AND is_soloparent = '1'");
	$sol4->execute();
	$sol4_num = $sol4->rowCount();
	
	$sol5 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2025' AND is_soloparent = '1'");
	$sol5->execute();
	$sol5_num = $sol5->rowCount();
	
	$sol6 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2026' AND is_soloparent = '1'");
	$sol6->execute();
	$sol6_num = $sol6->rowCount();
	
	$sol7 = $conn->prepare("SELECT * FROM tbl_resident WHERE resident_status = 'Resident' AND is_deleted != '1' AND status != 'Deceased' AND year_added = '2027' AND is_soloparent = '1'");
	$sol7->execute();
	$sol7_num = $sol7->rowCount();
?>