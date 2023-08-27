<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
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
    <title>BMIS - Registration</title>
    <!-- The styles -->
	<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['admin_dir'] . '/include/global-css.php'); ?>
	<?php include ($_SERVER["DOCUMENT_ROOT"] . '/' . $sett_data['directory'] . '/include/misc-js.php'); ?>	
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
                <form class="form-horizontal" method="post" action="process.php?action=registration" enctype="multipart/form-data" name="form" id="form">
                    <h3 class="box-title m-b-0">Registration</h3>
						<p class="text-muted m-b-30 font-13"> Fill out the fields </p>
							<?php
								if($errorMessage == 'Registration Successful. Your account will be verified within 24 hours. Thank You!')
								{
							?>
									<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
										<b><?php echo $errorMessage; ?></b>
									</div>
							<?php
								}
								else if($errorMessage == 'User already exist! Data entry failed.')
								{
							?>							
									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
										<b><?php echo $errorMessage; ?></b>
									</div>
							<?php								
								}else{}
							?>
					
					<div class="form-group ">
                        <div class="col-xs-12">
							* Provide Valid ID for verification
                            <input class="input-file uniform_on" name="fileImage" id="fileInput" placeholder="Valid ID" type="file" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required placeholder="First Name" name="fname" id="fname" autocomplete=off />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required placeholder="Middle Name" name="mname" id="mname" autocomplete=off />
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required placeholder="Last Name" name="lname" id="lname" autocomplete=off />
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" onClick="return confirmSubmit()">Submit Registration</button>
							
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
