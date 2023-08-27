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
							<td class="th">Employment Status</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['employeestatus']; ?></td>							
						</tr>
						<tr>
							<td class="th">Kasambahay</td>
							<td class="th">:</td>
							<td class="td"><?php if($sql_data['is_kasambahay'] == 1){ echo "Yes"; }else{ echo "No"; }; ?></td>							
						</tr>
						<tr>
							<td class="th">Occupation</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['occupation']; ?></td>							
						</tr>
						<tr>
							<td class="th">Name of Company</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['company_name']; ?></td>							
						</tr>
						<tr>
							<td class="th">Position</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['company_position']; ?></td>							
						</tr>						
						<tr>
							<td class="th" colspan="3">Address of Company :<br /><p class="par"><?php echo $sql_data['company_address']; ?></p></td>
														
						</tr>						
						<tr>
							<td class="th">Source of Income</td>
							<td class="th">:</td>
							<td class="td"><?php echo $sql_data['income_source']; ?></td>							
						</tr>
						<tr>
							<td class="th">OFW</td>
							<td class="th">:</td>
							<td class="td"><?php if($sql_data['is_ofw'] == 1){ echo "Yes"; }else{ echo "No"; }; ?></td>							
						</tr>						
					</tbody>
				</table>	
			</div>
		</div>
		