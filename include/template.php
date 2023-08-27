<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$self = WEB_ROOT . 'encrypt.php';

	function word_split($str,$words=15) {
		$arr = preg_split("/[\s]+/", $str,$words+1);
		$arr = array_slice($arr,0,$words);
		return join(' ',$arr);
	}		
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
	
    <title><?php echo $pageTitle; ?></title>
    <!-- The styles -->
	<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/global-css.php'); ?>
	<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/misc-js.php'); ?>
</head>

<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/header.php'); ?>
        </nav>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <aside class="sidebar">
            <?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/left-menu.php'); ?>
        </aside>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div class="page-wrapper">
            <!-- ===== Page-Container ===== -->
            <div class="container-fluid">
                <?php require_once $content; ?>   
            </div>
            <!-- ===== Page-Container-End ===== -->
            <footer class="footer t-a-c">
                <?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/footer.php'); ?>
            </footer>
        </div>
			<div class="right-sidebar" style="width:740px;">
				<div class="slimscrollright">
					<div class="rpanel-title"> Recent Activity Logs <span><i class="icon-close right-side-toggler"></i></span> </div>
						<div class="r-panel-body">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Action</th>
										<th>Date | Time</th>										
									</tr>
								</thead>
								<tbody>
									<?php
										$sds = $conn->prepare("SELECT * FROM bs_user u, tr_log l WHERE u.user_id = l.action_by");
										$sds->execute();
										if($sds->rowCount() > 0)
										{
											while($sds_data = $sds->fetch())
											{
												$datelog = date("M d, Y h:i A", strtotime($sds_data['log_action_date']));
									?>
												<tr>
													<td><?php echo $sds_data['lastname']; ?>, <?php echo $sds_data['firstname']; ?></td>
													<td><?php echo $sds_data['action']; ?><br /><b><?php echo $sds_data['description']; ?></b></td>
													<td><?php echo $datelog; ?></td>										
												</tr>
									<?php
											} // End While
										}else{}
									?>
								</tbody>
							</table>
						</div>
				</div>
			</div>
        <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/global-js.php'); ?>
</body>

</html>
