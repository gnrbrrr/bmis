<?php



// function doLogout()
// {
// 	// clear the session data
// 	session_unset();
// 	session_destroy();
// }
/*
	Check if a session user id exist or not. If not set redirect
	to login page. If the user session id exist and there's found
	$_GET['logout'] in the query string logout the user
*/
function checkUser()
{
	// define the web root constant or variable if it's not defined
	if (!defined('WEB_ROOT')) {
		define('WEB_ROOT', '/index.php');
	}

	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['user_id'])) {
		header('Location: ' . WEB_ROOT . 'login.php');
		exit;
	}

	// the user wants to logout
	if (isset($_GET['logout'])) {
		doLogout();
	}
}

function doLogin()
{
	include 'global-library/database.php';

	// if we found an error save the error message in this variable
	$errorMessage = '';

	$userName = mysqli_real_escape_string($link, $_POST['txtUserName']);
	$password = mysqli_real_escape_string($link, $_POST['txtPassword']);

	// first, make sure the username & password are not empty
	if ($userName == '') {
		$errorMessage = 'You must enter your username';
	} else if ($password == '') {
		$errorMessage = 'You must enter the password';
	} else {
		// check the database and see if the username and password combo do match

		$stmt = $conn->prepare("SELECT user_id, logged_in FROM bs_user WHERE username = '$userName' AND password = md5('$password') AND is_deleted != '1'");
		$stmt->execute();

		$randnum = rand(1000, 9000); // Generate random number
		$ip = $_SERVER['REMOTE_ADDR']; // Get IP Address of user

		if ($stmt->rowCount() == 1) {
			$row = $stmt->fetch();

			if ($row['logged_in'] == 1) {
				// user is already logged in on another device
				$errorMessage = 'You are already logged in on another device';
				echo "<script>alert('You are already logged in on another device!');</script>";
			} else {
				$_SESSION['user_id'] = $row['user_id'];
				$sql1 = $conn->prepare("UPDATE bs_user SET logged_in = '1' WHERE user_id = '{$row['user_id']}'");
				$sql1->execute();

				// log the time when the user last login
				$sql1 = $conn->prepare("UPDATE bs_user SET last_login = '$today_date1' WHERE user_id = '{$row['user_id']}'");
				$sql1->execute();

				/* Process the log attempt for security. Set 0 for authorized user */
				$in = $conn->prepare("INSERT INTO tr_login_attempt(rand, ip, username, password, status, auth, datetime, idnumber) VALUES('$randnum', '$ip', '$userName', '$password', '0', '0', '$today_date1', '')");
				$in->execute();

				$up = $conn->prepare("UPDATE tr_login_attempt SET status = '0' WHERE ip = '$ip'");
				$up->execute();
				/* End process log attempt */

				// now that the user is verified we move on to the next page
				// if the user had been in the admin pages before we move to
				// the last page visited
				if (isset($_SESSION['login_return_url'])) {
					header('Location: index.php');
					exit;
				} else {
					header('Location: index.php');
					exit;
				}
			}
		} else {

			/* Process the log attempt for security. Set 1 for unauthorized user */
			$in = $conn->prepare("INSERT INTO tr_login_attempt(rand, ip, username, password, status, auth, datetime, idnumber) VALUES('$randnum', '$ip', '$userName', '$password', '1', '1', '$today_date1', '')");
			$in->execute();
			/* End process log attempt */

			$errorMessage = 'Wrong username or password';
		}
	}

	return $errorMessage;
}

// /*
// 	Logout a user
// */
function doLogout()
{
	include 'global-library/database.php';
	if(!isset($_SESSION)) {
		session_start();
	}
	if (isset($_SESSION['user_id'])) {
		$userId = $_SESSION['user_id'];
		$sql1 = $conn->prepare("UPDATE bs_user SET logged_in = '0' WHERE user_id = '{$userId}'");
		$sql1->execute();
		unset($_SESSION['user_id']);
		$_SESSION['logged_in'] = false;
	}

	header('Location: login.php');
	exit;
}

function createThumbnail($srcFile, $destFile, $width, $quality = 75)
{
	$thumbnail = '';

	if (file_exists($srcFile)  && isset($destFile)) {
		$size        = getimagesize($srcFile);
		$w           = number_format($width, 0, ',', '');
		$h           = number_format(($size[1] / $size[0]) * $width, 0, ',', '');

		$thumbnail =  copyImage($srcFile, $destFile, $w, $h, $quality);
	}

	// return the thumbnail file name on sucess or blank on fail
	return basename($thumbnail);
}

/*
	Copy an image to a destination file. The destination
	image size will be $w X $h pixels
*/
function copyImage($srcFile, $destFile, $w, $h, $quality = 75)
{
	$tmpSrc     = pathinfo(strtolower($srcFile));
	$tmpDest    = pathinfo(strtolower($destFile));
	$size       = getimagesize($srcFile);

	if ($tmpDest['extension'] == "gif" || $tmpDest['extension'] == "jpg") {
		$destFile  = substr_replace($destFile, 'jpg', -3);
		$dest      = imagecreatetruecolor($w, $h);
		imageantialias($dest, TRUE);
	} elseif ($tmpDest['extension'] == "png") {
		$dest = imagecreatetruecolor($w, $h);
		imageantialias($dest, TRUE);
	} else {
		return false;
	}

	switch ($size[2]) {
		case 1:       //GIF
			$src = imagecreatefromgif($srcFile);
			break;
		case 2:       //JPEG
			$src = imagecreatefromjpeg($srcFile);
			break;
		case 3:       //PNG
			$src = imagecreatefrompng($srcFile);
			break;
		default:
			return false;
			break;
	}

	imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);

	switch ($size[2]) {
		case 1:
		case 2:
			imagejpeg($dest, $destFile, $quality);
			break;
		case 3:
			imagepng($dest, $destFile);
	}
	return $destFile;
}
