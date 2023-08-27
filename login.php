<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

$errorMessage = '&nbsp;';


if (isset($_POST['txtUserName'])) {
	$result = doLogin();

	if ($result != '') {
		$errorMessage = $result;
	}
}

# Get setting details
$stmt = $conn->prepare("SELECT * FROM bs_setting ");
$stmt->execute();
$row = $stmt->fetch();
	
?>
<input type="hidden" name="session_id" value="<?php echo session_id(); ?>">
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
    <title><?php echo $row['system_title']; ?></title>
    <!-- The styles -->
	<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['admin_dir'] . '/include/global-css.php'); ?>
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">	
        <div class="login-box">			
            <div class="white-box">
			<center><img src="<?php echo WEB_ROOT; ?>images/bmis_logo.png" style="height: 204px; width: 200px; object-fit: cover;" /></center>
			<br /><br />
                <form class="form-horizontal form-material" id="loginform" name="frmLogin" method="post">				
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="txtUserName" id="txtUserName" autocomplete=off />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="txtPassword" id="txtPassword" autocomplete=off />
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
							<!--<br /><br />
							<a href="../bmis_myaccount/registration.php" class="label label-rounded label-success pull-right" style="font-size:17px; font-weight:bold;">Register</a>
							!-->
                        </div>
                    </div>                    
                </form>
                
            </div>
        </div>
    </section>
    <!-- ==============================
        Required JS Files
    =============================== -->
    <?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['admin_dir'] . '/include/global-js.php'); ?>
</body>

</html>
