<?php
if (!defined('WEB_ROOT')) {
	header('Location: index.php');
	exit;
}
	if ($user_data['thumbnail']) {
		$thumbnail7 = WEB_ROOT . 'images/user/' . $user_data['thumbnail'];
	} else {
		$thumbnail7 = WEB_ROOT . 'images/user/noimage.png';
	}
?>	
	<div class="scroll-sidebar">
		<div class="user-profile">
			<div class="dropdown user-pro-body">
				<div class="profile-image">
					<img src="<?php echo $thumbnail7; ?>" alt="user-img" class="img-circle">
					<a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<span class="badge badge-danger">
							<i class="fa fa-angle-down"></i>
						</span>
					</a>
					<ul class="dropdown-menu animated flipInY">
						<li><a href="<?php echo WEB_ROOT; ?>user/index.php?view=profile&id=<?php echo $user_data['uid']; ?>"><i class="fa fa-user"></i> Profile</a></li>
						<li><a href="<?php echo WEB_ROOT; ?>user/"><i class="fa fa-user"></i> Users</a></li>
						<?php if($user_data['access_level'] == 1){ ?>
							<li><a href="<?php echo WEB_ROOT; ?>setting/"><i class="fa fa-gear"></i> Setting</a></li>
						<?php }else{} ?>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo $self; ?>?logout"><i class="fa fa-power-off"></i> Logout</a></li>
					</ul>
				</div>
				<p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> <?php echo $user_data['lastname']; ?>, <?php echo $user_data['firstname']; ?></a></p>
			</div>
		</div>
		<nav class="sidebar-nav">
			<ul id="side-menu">
				<li>
					<?php if($sett_data['mod_resident'] == 1): ?>
						<?php if($user_data['is_resident_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>residentsrecord/" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <span class="hide-menu"> Resident Record </span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_business'] == 1): ?>
						<?php if($user_data['is_business_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>businessrecord/" aria-expanded="false"><i class="fa fa-database fa-fw"></i> <span class="hide-menu"> Business Record</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_document'] == 1): ?>
						<?php if($user_data['is_document_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>document/" aria-expanded="false"><i class="fa fa-file fa-fw"></i> <span class="hide-menu"> Document Request</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_payment'] == 1): ?>
						<?php if($user_data['is_payment_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>payment/" aria-expanded="false"><i class="fa fa-rub fa-fw"></i> <span class="hide-menu"> Payment</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_blotter'] == 1): ?>
						<?php if($user_data['is_blotter_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>blotter/" aria-expanded="false"><i class="fa fa-file-text fa-fw"></i> <span class="hide-menu"> Blotter</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_inventory'] == 1): ?>
						<?php if($user_data['is_inventory_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>inventory/" aria-expanded="false"><i class="fa fa-th-list fa-fw"></i> <span class="hide-menu"> Inventory</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_medical'] == 1): ?>
						<?php if($user_data['is_medical_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>medicalrecords/" aria-expanded="false"><i class="fa fa-stethoscope fa-fw"></i> <span class="hide-menu"> Medical Records</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_medicine'] == 1): ?>
						<?php if($user_data['is_medicine_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>medicine/" aria-expanded="false"><i class="fa fa-th-list fa-fw"></i> <span class="hide-menu"> Medicince</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_rescue'] == 1): ?>
						<?php if($user_data['is_rescue_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>rescue/" aria-expanded="false"><i class="fa fa-th-list fa-fw"></i> <span class="hide-menu"> Rescue Unit</span></a>
						<?php endif; ?>
					<?php endif; ?>

					<!--</?php if($sett_data['mod_drrm'] == 1): ?>
						</?php if($user_data['is_drrm_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>drrm/" aria-expanded="false"><i class="fa fa-th fa-fw"></i> <span class="hide-menu"> DRRM</span></a>
						</?php endif; ?>
					</?php endif; ?>	!-->	
					
					<?php if($sett_data['mod_cases'] == 1): ?>
						<?php if($user_data['is_cases_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>case/" aria-expanded="false"><i class="fa fa-gavel fa-fw"></i> <span class="hide-menu"> Cases</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_vawc'] == 1): ?>
						<?php if($user_data['is_vawc_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>vawc/" aria-expanded="false"><i class="fa fa-gavel fa-fw"></i> <span class="hide-menu"> VAWC</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_bcpc'] == 1): ?>
						<?php if($user_data['is_bcpc_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>bcpc/" aria-expanded="false"><i class="fa fa-gavel fa-fw"></i> <span class="hide-menu"> BCPC</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_lupon'] == 1): ?>
						<?php if($user_data['is_lupon_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>lupon/" aria-expanded="false"><i class="fa fa-gavel fa-fw"></i> <span class="hide-menu"> Lupon Ng Tagapamahala</span></a>
						<?php endif; ?>
					<?php endif; ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>case/index.php?view=badak_list" aria-expanded="false"><i class="fa fa-list-alt fa-fw"></i> <span class="hide-menu"> BADAC</span></a>
					<?php if($sett_data['mod_borrow'] == 1): ?>
						<?php if($user_data['is_borrow_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>borroweditems/" aria-expanded="false"><i class="fa fa-list fa-fw"></i> <span class="hide-menu"> BDRRM/Borrowed Items</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_vehicle'] == 1): ?>
						<?php if($user_data['is_vehicle_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>vehicle/" aria-expanded="false"><i class="fa fa-automobile fa-fw"></i> <span class="hide-menu"> Vehicle Logs</span></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($sett_data['mod_covid'] == 1): ?>
						<?php if($user_data['is_covid_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>covid/" aria-expanded="false"><i class="fa fa-hospital-o fa-fw"></i> <span class="hide-menu"> Covid-19 Monitoring</span></a>
						<?php endif; ?>
					<?php endif; ?>				
					<?php if($sett_data['mod_resolution'] == 1): ?>
						<?php if($user_data['is_resolution_access'] == 1): ?>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>resolution/" aria-expanded="false"><i class="fa fa-file-text-o fa-fw"></i> <span class="hide-menu"> Resolution</span></a>
						<?php endif; ?>
					<?php endif; ?>
					
					
					<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>report/" aria-expanded="false"><i class="fa fa-tasks fa-fw"></i> <span class="hide-menu"> Report</span></a>
				</li>
			</ul>
		</nav>		
	</div>
	