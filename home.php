<?php
	include 'graph/data/data.php';
	include 'graph/age_process.php';
	include 'graph/household_process.php';

	//updates age based on birthday
    $bday = $conn->prepare("UPDATE tbl_resident SET age = TIMESTAMPDIFF(YEAR, birthdate, CURDATE())");
    $bday->execute();

    //updates senior if age is 60
    $sen = $conn->prepare("UPDATE tbl_resident SET is_sc = 1 WHERE age > 59");
    $sen->execute();
?>
<head>
<style>
.marquee {
  width: 100%;
  height: auto;
  margin: 0 auto;
  overflow: hidden;
  white-space: nowrap;
  border: 0px solid blue;
}
.marquee-content {
  display: inline-block;
  margin-top: 5px;
  animation: marquee 47s linear infinite;
}
.item-collection-1 {
  position: relative;
  left: 0%;
  animation: swap 15s linear infinite;
}

.marquee-content:hover {
  animation-play-state: paused
}
.item1 {
  display: inline-block;
  height: auto;
  width: 300px;
  background: cyan;
  vertical-align: top;
  
}

/* Transition */

@keyframes marquee {
  0% {
    transform: translateX(0)
  }
  100% {
    transform: translateX(-70%)
  }
}
</style>
</head>
	<div class="row">
		<div class="col-md-12 col-sm-12">
					
					<div class="marquee">
						<div class="marquee-content">
							<div class="item-collection-1">
								<!-- Start Population  !-->									
									<div class="info-box item1" style="background-color:#00bbd9;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/population.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $pop_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Total Population</p>
												
											</div>
										</div>
									</div>
									<div class="info-box item1" style="background-color:#ffb136;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/male.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $male_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Total Male</p>
												
											</div>
										</div>
									</div>
									<div class="info-box item1" style="background-color:#4a23ad;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/female.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $female_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Total Female</p>
												
											</div>
										</div>
									</div>
								<!-- End Population  !-->
								
								<!-- Start Employment  !-->
									<div class="info-box item1" style="background-color:#55efc4;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/employed.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $emp_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Total Employed</p>
												
											</div>
										</div>
									</div>
									<div class="info-box item1" style="background-color:#fdcb6e;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/unemployed.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $unemp_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Total UnEmployed</p>
												
											</div>
										</div>
									</div>
									<div class="info-box item1" style="background-color:#81ecec;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/osy.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $osy_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Out of School Youth</p>
												
											</div>
										</div>
									</div>
								<!-- End Employment  !-->
								
								<!-- Start Blotter  !-->
									<div class="info-box item1" style="background-color:#6c5ce7;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/blotter.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $blt_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Total Blotter</p>
												
											</div>
										</div>
									</div>
								<!-- End Blotter  !-->
								
								<!-- Start Age  !-->
									<?php
										$ad7 = $conn->prepare("SELECT * FROM tr_graph_age ORDER BY pop_id");
										$ad7->execute();
										if($ad7->rowCount() > 0)
										{
											while($ad7_data = $ad7->fetch())
											{
												if($ad7_data['total'] != 0)
												{
									?>
													<div class="info-box item1" style="background-color:#<?php echo $ad7_data['color']; ?>;">
														<div class="media">
															<div class="media-left">
																<img src="<?php echo WEB_ROOT; ?>images/<?php echo $ad7_data['icon']; ?>.png" />
															</div>
															<div class="media-body">
																<br />
																<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $ad7_data['total']; ?></h3>
																<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;"><?php echo $ad7_data['status']; ?> - <b>AGE <?php echo $ad7_data['age']; ?></b></p>
																
															</div>
														</div>
													</div>
									<?php
												}else{}
											} // End While
										}else{}
									?>
											
								<!-- End Age  !-->
								
								<!-- Start Voters  !-->
									<div class="info-box item1" style="background-color:#00b894;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/registered_voter.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $vr_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Registered Voters</p>
												
											</div>
										</div>
									</div>
									<div class="info-box item1" style="background-color:#ffeaa7;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/unregistered_voter.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $vu_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">UnRegistered Voters</p>
												
											</div>
										</div>
									</div>
								<!-- End Voters  !-->
								
								<!-- Start Beneficiaries  !-->
									<div class="info-box item1" style="background-color:#00cec9;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/kasambahay.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $four_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Total 4P's</p>
												
											</div>
										</div>
									</div>
									<div class="info-box item1" style="background-color:#fab1a0;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/indigenous.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $indp_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Indigenous People</p>
												
											</div>
										</div>
									</div>
									<div class="info-box item1" style="background-color:#0984e3;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/pwd.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $ind_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">PWD</p>
												
											</div>
										</div>
									</div>
									<div class="info-box item1" style="background-color:#ff7675;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/solo.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:47px; color:#ffffff;"><?php echo $solo_num; ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Solo Parent</p>
												
											</div>
										</div>
									</div>
									<div class="info-box item1" style="background-color:#6c5ce7;">
										<div class="media">
											<div class="media-left">
												<img src="<?php echo WEB_ROOT; ?>images/peso.png" />
											</div>
											<div class="media-body">
												<br />
												<h3 class="info-count" style="font-weight:bold; font-size:37px; color:#ffffff;"><?php echo number_format($revenue, 2); ?></h3>
												<p class="info-text font-12" style="font-weight:normal; font-size:37px; color:#ffffff;">Daily Revenue</p>
												
											</div>
										</div>
									</div>
								<!-- End Beneficiaries  !-->
							</div>
						</div>
					</div>
			
		</div>
	</div>

<!-- Start Graph !-->
	<div class="row">
		<div class="col-md-6 col-sm-6"><?php include 'graph/gender.php'; ?></div>
		<div class="col-md-6 col-sm-6"><?php include 'graph/employment.php'; ?></div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-sm-6">
			<div class="white-box" style="height:500px;">
				<h3 class="box-title">Age Demographics &nbsp; <a href="<?php echo WEB_ROOT; ?>graph/print/age_graph.php" target=_new><i class="fa fa-print fa-fw"></i></a></h3>				
				<?php include 'graph/age_graph.php'; ?>
				<!--<ul class="list-inline text-right">
					<?php
						$ad = $conn->prepare("SELECT * FROM tr_graph_age ORDER BY pop_id");
						$ad->execute();
						if($ad->rowCount() > 0)
						{
							while($ad_data = $ad->fetch())
							{
								if($ad_data['total'] != 0)
								{
					?>
									<li><h5><i class="fa fa-circle text-<?php echo $ad_data['style']; ?> m-r-5"></i><?php echo $ad_data['status']; ?> (<?php echo $ad_data['total']; ?>)</h5></li>
					<?php
								}else{}
							} // End While
						}else{}
					?>
				</ul>!-->
			</div>
		</div>
		
		<div class="col-md-6 col-sm-6"><?php include 'graph/voter.php'; ?></div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-sm-6"><?php include 'graph/beneficiary.php'; ?></div>
		<div class="col-md-6 col-sm-6">
			<div class="white-box" style="height:500px;">
				<h3 class="box-title">Household Record &nbsp; <a href="<?php echo WEB_ROOT; ?>graph/print/household_graph.php" target=_new><i class="fa fa-print fa-fw"></i></a></h3>				
				<?php include 'graph/household_graph.php'; ?>				
			</div>
		</div>
	</div>
<!-- End Graph !-->
	
	
