<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	$id = $_GET['id'];
	$cid = $_GET['cid'];
	$rid = $_GET['rid'];
	
	$bada = $conn->prepare("SELECT * FROM tbl_badak WHERE bdk_id = '$id'");
	$bada->execute();
	$bada_data = $bada->fetch();
	
	$date_accom = date("M d, Y", strtotime($bada_data['bdk_date_ac'])); //Nov 15, 2022
	$bday = date("M d, Y", strtotime($bada_data['bdk_petsa_kpnkn']));

	
?>	
<head>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/misc-js.php'); ?>
</head>
		
		<div class="m-l-40"><b class="text-info">Status : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['status']; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Pangalan : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_unang_pangalan']; ?> <?php echo $bada_data['bdk_gitnang_pangalan']; ?> <?php echo $bada_data['bdk_huling_pangalan']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Alyas : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_alyas']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Numero ng Cellphone/Tel : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_numero_tel']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Kasarian : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_kasarian']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Katayuang Sibil : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_ktyng_sbl']; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Relihiyon : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_relihiyon']; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Petsa ng Kapanganakan : </b>
			<p style="padding-left:27px;"><?php echo $bday; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Edad : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_edad']; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Lugar ng Kapanganakan : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_lugar_kpnkn']; ?></p>
		</div>

		<div class="m-l-40"><b class="text-info">Kasalukuyang Lugar Tirahan : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_ksk_lugar_trn']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Testigo : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_testigo']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Edukasyong Nakamit : </b>
			<p style="padding-left:27px;"><?php echo $bada_data['bdk_edksyn_nkmt']; ?></p>
		</div>
		
		<div class="m-l-40"><b class="text-info">Date Accomplished : </b>
			<p style="padding-left:27px;"><?php echo $date_accom; ?></p>
		</div>
		
		
	<a type="button" class="btn btn-info waves-effect waves-light nyroModal" href="add.php?cerid=<?php echo $cid; ?>&res=<?php echo $rid; ?>"><i class="ti-back-left me-1"></i> Go Back</a>
	<style>
		#nyroModalWrapper{
			margin-top: -400px !important;
			width: 400px !important;
			overflow: auto;
		}
	</style>