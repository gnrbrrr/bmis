<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
?>
	<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>global-library/common.js"></script>
	<!-- Confirm Submission of Form !-->
	<script LANGUAGE="JavaScript">
	<!--
		// Nannette Thacker http://www.shiningstar.net
		function confirmSubmit()
		{
			var agree=confirm("Make sure all informations are correct. Changes are not allowed once submitted. Please confirm to continue.");
			if (agree)
			return true ;
		else
			return false ;
		}
		
		// Nannette Thacker http://www.shiningstar.net
		function confirmDelete()
		{
			var agree=confirm("Are you sure to delete this item? Please confirm to continue.");
			if (agree)
			return true ;
		else
			return false ;
		}
	// -->
	</script>
	
	<!-- Pop Up nyroModal Library !-->
	<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>include/nyroModal/styles/nyroModalCal.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo WEB_ROOT; ?>include/nyroModal/js/jquery.min.js"></script>	
	<script type="text/javascript" src="<?php echo WEB_ROOT; ?>include/nyroModal/js/jquery.nyroModal-1.6.2.pack.js"></script>
	
	<!-- DropDown Hide/UnHide Library !-->
	<style rel="stylesheet" type="text/css">
		.hidden { display: none; }
		.unhidden { display: block; }
	
		.hidden { visibility: hidden; }
		.unhidden { visibility: visible; }
	
	</style>
	
	<script type="text/javascript">
		function unhide(divID) {
			var item = document.getElementById(divID);
			var item2 = document.getElementById(col2);
			if (item) {
				item.className=(item.className=='hidden')?'unhidden':'hidden';
				item2.className=(item2.className=='unhidden')?'hidden':'unhidden';
			}
 
		}
	</script>