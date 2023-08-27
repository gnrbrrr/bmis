<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?>
<head>
<style rel="stylesheet">
th
{   
   color: #000 !important;
   font-family: Arial !important;
   font-weight: bold !important;
   font-size:13px !important;
}
td
{   
   color: #666666 !important;
   font-family: Arial !important;  
   font-size:12px !important;
}
</style>
</head>
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0" style="color:#663399; font-weight:bold;">System Settings</h3>
				<p class="text-muted m-b-30">Display list of Settings</p>
					
					<?php
						if($errorMessage == 'Saved successfully')
						{
					?>
							<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
								<b><?php echo $errorMessage; ?></b>
							</div>
					<?php
						}else{}
					?>
				<div class="table-responsive">
					<ul class="nav customtab nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#mod" aria-hof="mod" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-list"></i></span><span class="hidden-xs"> Modules</span></a></li>
						<li role="presentation"><a href="#cer" aria-hof="mod" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-file"></i></span><span class="hidden-xs"> Certificate</span></a></li>
						
                    </ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="mod">
							<?php include 'module.php'; ?>
						</div>
						
						<div role="tabpanel" class="tab-pane fade in" id="cer">
							<?php include 'certificate.php'; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>