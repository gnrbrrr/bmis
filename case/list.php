<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$sql = $conn->prepare("SELECT * FROM tbl_lupon WHERE is_deleted != '1'");
$sql->execute();


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
	<div class="row colorbox-group-widget">
		<?php if($user_data['is_vawc_access'] == 1): ?>
			<div class="col-md-4 col-sm-6 info-color-box">
				<a href="<?php echo WEB_ROOT; ?>vawc/">
					<div class="white-box">
						<div class="media bg-primary">
							<div class="media-body">
								<h1 class="info-count">VAWC</h1>
							</div>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<?php if($user_data['is_bcpc_access'] == 1): ?>
			<div class="col-md-4 col-sm-6 info-color-box">
				<a href="<?php echo WEB_ROOT; ?>bcpc/index.php?view=vwac_list">
					<div class="white-box">
						<div class="media bg-primary">
							<div class="media-body">
								<h1 class="info-count">BCPC</h1>
							</div>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<!--<div class="col-md-3 col-sm-6 info-color-box">
			<a href="index.php?view=badak_list">
				<div class="white-box">
					<div class="media bg-primary">
						<div class="media-body">
							<h1 class="info-count">BADAC</h1>
						</div>
					</div>
				</div>
			</a>
		</div>!-->
		<?php if($user_data['is_lupon_access'] == 1): ?>
			<div class="col-md-4 col-sm-6 info-color-box">
				<a href="<?php echo WEB_ROOT; ?>lupon/index.php?view=list">
					<div class="white-box">
						<div class="media bg-primary">
							<div class="media-body">
								<h1 class="info-count">Lupon ng Tagapamayapa</h1>
							</div>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
	</div>