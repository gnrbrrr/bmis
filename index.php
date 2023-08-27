<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

if (isset($_SESSION['user_id'])) {
	$userId = $_SESSION['user_id'];

	// set expiration date 1 year from today Feb- 16, 2024
	$expiration_date = strtotime('+1 year');

	// set countdown date 14 days before expiration date -365days
	$countdown_date = strtotime('-14days', $expiration_date);

	// get current time
	$today = time();

	// if the countdown date has passed, display the message and disable the page
	if ($today > $countdown_date) {
		echo "<script>
      alert('Your contract will expire in " . ceil(($expiration_date - $today) / (60 * 60 * 24)) . " days. Please contact the system provider to renew the contract.');
      window.onload = function() {
        document.addEventListener('mousedown', function(event){
          event.preventDefault();
          event.stopPropagation();
        }, true);
        document.addEventListener('keydown', function(event){
          event.preventDefault();
          event.stopPropagation();
        }, true);
      }
    </script>";
	}

	// if the expiration date has passed, display the message and disable the page
	if ($today > $expiration_date) {
		echo "<script>
      alert('Your contract has expired. Please contact the system provider to renew the contract.');
      window.onload = function() {
        document.addEventListener('mousedown', function(event){
          event.preventDefault();
          event.stopPropagation();
        }, true);
        document.addEventListener('keydown', function(event){
          event.preventDefault();
          event.stopPropagation();
        }, true);
      }
    </script>";

		// continue with the user's session
	} else {
		checkUser();
		$content = 'home.php';
		$pageTitle = $sett_data['system_title'];
		$script = array('main.js');
		require_once 'include/template.php';
	}
} else {
	header('Location: login.php');
	exit;
}
