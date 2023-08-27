<?php

// /*
// 	Logout a user
// */
function doLogout()
{
	if (isset($_SESSION['user_id'])) {
		unset($_SESSION['user_id']);
		// session_unset();
		// session_destroy();
		//session_unregister('user_id');
	}

	header('Location: login.php');
	exit;
}

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

function getUserById($userId)
{
	global $pdo;

	$stmt = $pdo->prepare("SELECT * FROM bs_user WHERE userId = :userId");
	$stmt->bindParam(":userId", $userId);
	$stmt->execute();

	return $stmt->fetch();
}

function getUserByIdV2($userId)
{
	global $pdo;

	$sql = "SELECT * FROM bs_user WHERE user_id = :userId";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":userId", $userId);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC);
}

function setLoggedInFlag($userId, $loggedIn)
{
	// update the logged_in flag in the database
	global $pdo;

	$stmt = $pdo->prepare("UPDATE bs_user SET logged_in = :loggedIn WHERE user_id = :userId");
	$stmt->bindParam(":loggedIn", $loggedIn, PDO::PARAM_INT);
	$stmt->bindParam(":userId", $userId);
	$stmt->execute();
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

		$stmt = $conn->prepare("SELECT user_id FROM bs_user WHERE username = '$userName' AND password = md5('$password') AND is_deleted != '1'");
		$stmt->execute();

		$randnum = rand(1000, 9000); // Generate random number
		$ip = $_SERVER['REMOTE_ADDR']; // Get IP Address of user

		if ($stmt->rowCount() == 1) {
			$row = $stmt->fetch();
			$_SESSION['user_id'] = $row['user_id'];

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
