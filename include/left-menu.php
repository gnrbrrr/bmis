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
<link href="<?php echo WEB_ROOT; ?>less/icons/font-awesome6/css/all.min.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>less/icons/font-awesome6/css/all.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>less/icons/font-awesome6/css/brands.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>less/icons/font-awesome6/css/fontawesome.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>less/icons/font-awesome6/css/fontawesome.min.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>less/icons/font-awesome6/css/regular.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>less/icons/font-awesome6/css/regular.min.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>less/icons/font-awesome6/css/solid.min.css" rel="stylesheet">
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
					<?php if ($user_data['access_level'] == 1) { ?>
						<li><a href="<?php echo WEB_ROOT; ?>setting/"><i class="fa fa-gear"></i> Setting</a></li>
					<?php } else {
					} ?>
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
				<?php if ($user_data['user_id'] == 1046 || $user_data['user_id'] == 1002) : ?>
					<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>control_panel/" aria-expanded="false"><i class="fa-sharp fa-solid fa-tachograph-digital"></i> <span class="hide-menu"> Control Panel</span></a>
				<?php endif; ?>
				<?php if ($sett_data['mod_resident'] == 1) : ?>
					<?php if ($user_data['is_resident_access'] == 1) : ?>
						<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>residentsrecord/" aria-expanded="false"><i class="fa-solid fa-users"></i> <span class="hide-menu"> Resident Record </span></a>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_business'] == 1) : ?>
					<?php if ($user_data['is_business_access'] == 1) : ?>
						<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>businessrecord/" aria-expanded="false"><i class="fa-sharp fa-solid fa-briefcase"></i> <span class="hide-menu"> Business Record</span></a>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_document'] == 1) : ?>
					<?php if ($user_data['is_document_access'] == 1) : ?>
						<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>document/" aria-expanded="false"><i class="fa-solid fa-folder-open"></i> <span class="hide-menu"> Document Request</span></a>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_payment'] == 1) : ?>
					<?php if ($user_data['is_payment_access'] == 1) : ?>
						<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>payment/" aria-expanded="false"><i class="fa-sharp fa-solid fa-credit-card"></i><span class="hide-menu"> Payment</span></a>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_cases'] == 1) : ?>
					<?php if ($user_data['is_cases_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>case/" aria-expanded="false">
							<i class="fa-solid fa-scale-balanced"></i><span class="hide-menu"> Cases</span>
								<span class="fa arrow"></span>
							</a>
							<ul class="nav nav-second-level">
								<?php if ($sett_data['mod_vawc'] == 1) : ?>
									<?php if ($user_data['is_vawc_access'] == 1) : ?>
										<li>
											<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>vawc/"><i class="fa-solid fa-person-harassing"></i> <span class="hide-menu"> VAWC</span></a>
										</li>
									<?php endif; ?>
								<?php endif; ?>
								<?php if ($sett_data['mod_bcpc'] == 1) : ?>
									<?php if ($user_data['is_bcpc_access'] == 1) : ?>
										<li>
											<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>bcpc/"><i class="fa-solid fa-hands-holding-child"></i><span class="hide-menu"> BCPC</span></a>
										</li>
									<?php endif; ?>
								<?php endif; ?>
							<?php if ($sett_data['mod_blotter'] == 1) : ?>
								<?php if ($user_data['is_blotter_access'] == 1) : ?>
									<li>
										<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>blotter/" aria-expanded="false"><i class="fa-sharp fa-solid fa-handcuffs"></i><span class="hide-menu"> Blotter</span></a>
									</li>
								<?php endif; ?>
							<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>
				<?php endif; ?>



				

				
				<?php if ($sett_data['mod_lupon'] == 1) : ?>
					<?php if ($user_data['is_lupon_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>lupon/"><i class="fa-solid fa-gavel"></i><span class="hide-menu" style="font-size:14px;"> Lupon Ng Tagapamayapa</span></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_badac'] == 1) : ?>
					<?php if ($user_data['is_badac_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>case/index.php?view=badak_list" aria-expanded="false"><i class="fa-sharp fa-solid fa-cannabis"></i><span class="hide-menu"> BADAC</span></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_minutes'] == 1) : ?>
					<?php if ($user_data['is_minutes_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>minutes/" aria-expanded="false"><i class="fa-sharp fa-solid fa-user-clock"></i><span class="hide-menu"> Minutes of the Meeting</span></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_inventory'] == 1) : ?>
					<?php if ($user_data['is_inventory_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>inventory/" aria-expanded="false"><i class="fa-sharp fa-solid fa-warehouse"></i> <span class="hide-menu"> Inventory</span></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_borrow'] == 1) : ?>
					<?php if ($user_data['is_borrow_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>borroweditems/" aria-expanded="false"><i class="fa-solid fa-dna"></i> <span class="hide-menu"> BDRRM/Borrowed Items</span></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_medicine'] == 1) : ?>
					<?php if ($user_data['is_medicine_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>medicine/" aria-expanded="false"><i class="fa-sharp fa-solid fa-pills"></i><span class="hide-menu"> Medicines</span></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_medical'] == 1) : ?>
					<?php if ($user_data['is_medical_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>medicalrecords/" aria-expanded="false"><i class="fa-solid fa-book-medical"></i><span class="hide-menu"> Medical Records</span></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_covid'] == 1) : ?>
					<?php if ($user_data['is_covid_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>covid/" aria-expanded="false"><i class="fa-solid fa-hospital"></i> <span class="hide-menu"> Covid-19 Monitoring</span></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sett_data['mod_rescue'] == 1) : ?>
					<?php if ($user_data['is_rescue_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>rescue/" aria-expanded="false"><i class="fa-sharp fa-solid fa-truck-medical"></i><span class="hide-menu"> Rescue Unit</span></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>

				
				
				<?php if ($sett_data['mod_vehicle'] == 1) : ?>
					<?php if ($user_data['is_vehicle_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>vehicle/" aria-expanded="false"><i class="fa-sharp fa-solid fa-car-side"></i><span class="hide-menu"> Vehicle Record</span></a>
						</li>
					<?php endif ?>
				<?php endif; ?>

				<?php if ($sett_data['mod_facility'] == 1) : ?>
					<?php if ($user_data['is_facility_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>facility/" aria-expanded="false"><i class="fa-sharp fa-solid fa-person-shelter"></i><span class="hide-menu"> Facilities Management</span></a>
						</li>
					<?php endif ?>
				<?php endif; ?>

				<?php if ($sett_data['mod_project'] == 1) : ?>
					<?php if ($user_data['is_project_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>project/" aria-expanded="false"><i class="fa-sharp fa-solid fa-helmet-safety"></i><span class="hide-menu"> Development Project</span></a>
						</li>
					<?php endif ?>
				<?php endif; ?>

				<?php if ($sett_data['mod_legislative'] == 1) : ?>
					<?php if ($user_data['is_legislative_access'] == 1) : ?>
						<li>
							<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>legislative/" aria-expanded="false">
							<i class="fa-sharp fa-solid fa-scroll"></i><span class="hide-menu"> Legislative</span>
								<span class="fa arrow"></span>
							</a>
							<ul class="nav nav-second-level">
								<?php if ($sett_data['mod_resolution'] == 1) : ?>
									<?php if ($user_data['is_resolution_access'] == 1) : ?>
										<li>
											<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>resolution/" aria-expanded="false"><i class="fa-sharp fa-solid fa-book"></i><span class="hide-menu"> Barangay Resolution</span></a>
										<li>
									<?php endif; ?>
								<?php endif; ?>
								<?php if ($sett_data['mod_ordinance'] == 1) : ?>
									<?php if ($user_data['is_ordinance_access'] == 1) : ?>
										<li>
											<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>ordinance/"><i class="fa-sharp fa-solid fa-file-circle-check"></i><span class="hide-menu"> Barangay Ordinance</span></a>
										</li>
									<?php endif; ?>
								<?php endif; ?>
								<?php if ($sett_data['mod_executive'] == 1) : ?>
									<?php if ($user_data['is_executive_access'] == 1) : ?>
										<li>
											<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>executive/"><i class="fa-sharp fa-solid fa-building-columns"></i><span class="hide-menu"> Executive Order</span></a>
										</li>
									<?php endif; ?>
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				
				

				<li>
					<a class="active waves-effect" href="<?php echo WEB_ROOT; ?>report/" aria-expanded="false"><i class="fa-solid fa-file-lines"></i> <span class="hide-menu"> Report</span></a>
				</li>
			</li>
		</ul>
	</nav>
</div>