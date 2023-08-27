<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>

	
		<div class="col-md-12">
			<div class="white-box">
				<table style="font-size:14px;" cellpadding="17" cellspacing="17">					
					<tbody>
						<tr>
							<td class="th">Educational Attainment</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['educationalattainment']; ?></td>							
						</tr>
						<tr>
							<td class="th">Course</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['course']; ?></td>							
						</tr>
						<tr>
							<td class="th">Skills</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['skills']; ?></td>							
						</tr>						
					</tbody>
				</table>	
			</div>
		</div>
		