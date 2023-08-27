<?php
require_once '../global-library/config.php';
require_once '../include/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        add_data();
        break;
      
    case 'modify' :
        modify_data();
        break;
        
    case 'delete' :
        delete_data();
        break;
    
    case 'deleteImage' :
        deleteImage();
        break;
    
	   
    default :
        // if action is not defined or unknown
        // move to main category page
        header('Location: index.php');
}


/*
    Add Data
*/
function add_data()
{
	include '../global-library/database.php';
	$status = mysqli_real_escape_string($link, $_POST['status']);
	$bdk_unang_pangalan = mysqli_real_escape_string($link, $_POST['unang_pangalan']);
	$bdk_gitnang_pangalan = mysqli_real_escape_string($link, $_POST['gitnang_pangalan']);
	$bdk_huling_pangalan = mysqli_real_escape_string($link, $_POST['huling_pangalan']);
    $bdk_alyas = mysqli_real_escape_string($link, $_POST['alyas']);
	$bdk_kasarian = mysqli_real_escape_string($link, $_POST['kasarian']);
	$bdk_ktyng_sbl = mysqli_real_escape_string($link, $_POST['ktyng_sbl']);
	$bdk_petsa_kpnkn = $_POST['petsa_kpnkn'];
	$bdk_edad = $_POST['edad'];
	$bdk_lugar_kpnkn = mysqli_real_escape_string($link, $_POST['lugar_kpnkn']);
	$bdk_ksk_lugar_trn = mysqli_real_escape_string($link, $_POST['ksk_lugar_trn']);
	$bdk_lugar_prbnsy = mysqli_real_escape_string($link, $_POST['lugar_prbnsy']);
	$bdk_edksyn_nkmt = mysqli_real_escape_string($link, $_POST['edksyn_nkmt']);
	$bdk_trabaho = mysqli_real_escape_string($link, $_POST['trabaho']);
	$bdk_numero_tel = mysqli_real_escape_string($link, $_POST['numero_tel']);
	$bdk_socmed_acct = mysqli_real_escape_string($link, $_POST['socmed_acct']);
	$bdk_relihiyon = mysqli_real_escape_string($link, $_POST['relihiyon']);
	$bdk_taas = mysqli_real_escape_string($link, $_POST['taas']);
	$bdk_bigat = mysqli_real_escape_string($link, $_POST['bigat']);
	$bdk_kulaysamata = mysqli_real_escape_string($link, $_POST['kulaysamata']);
	$bdk_kulaysabalat = mysqli_real_escape_string($link, $_POST['kulaysabalat']);
	$bdk_kulaysabuhok = mysqli_real_escape_string($link, $_POST['kulaysabuhok']);
	$bdk_tattoo = mysqli_real_escape_string($link, $_POST['tattoo']);
	$bdk_droga_natikman = mysqli_real_escape_string($link, $_POST['droga_natikman']);
	$bdk_droga_benta = mysqli_real_escape_string($link, $_POST['droga_benta']);
	$bdk_droga_gamit = $_POST['droga_gamit'];
	$bdk_droga_katagal = mysqli_real_escape_string($link, $_POST['droga_katagal']);
	$bdk_droga_lugar = mysqli_real_escape_string($link, $_POST['droga_lugar']);
	$bdk_droga_tao = $_POST['droga_tao'];
	$bdk_droga_illegal = mysqli_real_escape_string($link, $_POST['droga_illegal']);
	$bdk_testigo = mysqli_real_escape_string($link, $_POST['testigo']);
	$bdk_date_ac = $_POST['date_ac'];

	
	
		//echo $itemdesc . ' ' . $serialno . ' ' . $amt . ' ' . $dateofpurchase . ' ' . $condition . ' ' . $quantity;
        $sql = $conn->prepare("INSERT INTO tbl_badak (status, bdk_unang_pangalan, bdk_gitnang_pangalan, bdk_huling_pangalan, bdk_alyas, bdk_kasarian, bdk_ktyng_sbl, bdk_petsa_kpnkn, bdk_edad, bdk_lugar_kpnkn, bdk_ksk_lugar_trn, bdk_lugar_prbnsy, bdk_edksyn_nkmt, bdk_trabaho, bdk_numero_tel, bdk_socmed_acct, bdk_relihiyon, bdk_taas, bdk_bigat, bdk_kulaysamata, bdk_kulaysabalat, bdk_kulaysabuhok, bdk_tattoo, bdk_droga_natikman, bdk_droga_benta, bdk_droga_gamit, bdk_droga_katagal, bdk_droga_lugar, bdk_droga_tao, bdk_droga_illegal, bdk_testigo, bdk_date_ac, is_deleted) 
													VALUES ('$status', '$bdk_unang_pangalan', '$bdk_gitnang_pangalan', '$bdk_huling_pangalan', '$bdk_alyas', '$bdk_kasarian', '$bdk_ktyng_sbl', '$bdk_petsa_kpnkn', '$bdk_edad', '$bdk_lugar_kpnkn', '$bdk_ksk_lugar_trn', '$bdk_lugar_prbnsy', '$bdk_edksyn_nkmt', '$bdk_trabaho', '$bdk_numero_tel', '$bdk_socmed_acct', '$bdk_relihiyon', '$bdk_taas', '$bdk_bigat', '$bdk_kulaysamata', '$bdk_kulaysabalat', '$bdk_kulaysabuhok', '$bdk_tattoo', '$bdk_droga_natikman', '$bdk_droga_benta', '$bdk_droga_gamit', '$bdk_droga_katagal', '$bdk_droga_lugar', '$bdk_droga_tao', '$bdk_droga_illegal', '$bdk_testigo', '$bdk_date_ac', '0')");
		$sql->execute();
		
		$id = $conn->lastInsertId();
		$uid = md5($id);
		
		$up = $conn->prepare("UPDATE tbl_badak SET uid = '$uid' WHERE bdk_id = '$id'");
		$up->execute();
    
		header('Location: index.php?view=badak_add&error=Added successfully');
		
	
}

/*
	Upload an image and return the uploaded image name
*/
function uploadimage($inputName, $uploadDir)
{
	include '../global-library/database.php';
	$image     = $_FILES[$inputName];
	$imagePath = '';
	$thumbnailPath = '';

	// if a file is given
	if (trim($image['tmp_name']) != '') {
		$ext = substr(strrchr($image['name'], "."), 1); //$extensions[$image['type']];

		// generate a random new file name to avoid name conflict
		$imagePath = md5(rand() * time()) . ".$ext";

		list($width, $height, $type, $attr) = getimagesize($image['tmp_name']);

		// make sure the image width does not exceed the
		// maximum allowed width
		if (LIMIT_IMAGE_WIDTH && $width > MAX_IMAGE_WIDTH) {
			$result    = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_IMAGE_WIDTH);
			$imagePath = $result;
		} else {
			$result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
		}

		if ($result) {
			// create thumbnail
			$thumbnailPath =  md5(rand() * time()) . ".$ext";
			$result = createThumbnail($uploadDir . $imagePath, $uploadDir . $thumbnailPath, THUMBNAIL_WIDTH);

			// create thumbnail failed, delete the image
			if (!$result) {
				unlink($uploadDir . $imagePath);
				$imagePath = $thumbnailPath = '';
			} else {
				$thumbnailPath = $result;
			}
		} else {
			// the image cannot be upload / resized
			$imagePath = $thumbnailPath = '';
		}

	}


	return array('image' => $imagePath, 'thumbnail' => $thumbnailPath);
}

/*
    Modify Data
*/
function modify_data()
{
	include '../global-library/database.php';
	$id = $_POST['id'];
	
    $status = mysqli_real_escape_string($link, $_POST['status']);
    $bdk_unang_pangalan = mysqli_real_escape_string($link, $_POST['unang_pangalan']);
	$bdk_gitnang_pangalan = mysqli_real_escape_string($link, $_POST['gitnang_pangalan']);
	$bdk_huling_pangalan = mysqli_real_escape_string($link, $_POST['huling_pangalan']);
    $bdk_alyas = mysqli_real_escape_string($link, $_POST['alyas']);
	$bdk_kasarian = mysqli_real_escape_string($link, $_POST['kasarian']);
	$bdk_ktyng_sbl = mysqli_real_escape_string($link, $_POST['ktyng_sbl']);
	$bdk_petsa_kpnkn = $_POST['petsa_kpnkn'];
	$bdk_edad = $_POST['edad'];
	$bdk_lugar_kpnkn = mysqli_real_escape_string($link, $_POST['lugar_kpnkn']);
	$bdk_ksk_lugar_trn = mysqli_real_escape_string($link, $_POST['ksk_lugar_trn']);
	$bdk_lugar_prbnsy = mysqli_real_escape_string($link, $_POST['lugar_prbnsy']);
	$bdk_edksyn_nkmt = mysqli_real_escape_string($link, $_POST['edksyn_nkmt']);
	$bdk_trabaho = mysqli_real_escape_string($link, $_POST['trabaho']);
	$bdk_numero_tel = mysqli_real_escape_string($link, $_POST['numero_tel']);
	$bdk_socmed_acct = mysqli_real_escape_string($link, $_POST['socmed_acct']);
	$bdk_relihiyon = mysqli_real_escape_string($link, $_POST['relihiyon']);
	$bdk_taas = mysqli_real_escape_string($link, $_POST['taas']);
	$bdk_bigat = mysqli_real_escape_string($link, $_POST['bigat']);
	$bdk_kulaysamata = mysqli_real_escape_string($link, $_POST['kulaysamata']);
	$bdk_kulaysabalat = mysqli_real_escape_string($link, $_POST['kulaysabalat']);
	$bdk_kulaysabuhok = mysqli_real_escape_string($link, $_POST['kulaysabuhok']);
	$bdk_tattoo = mysqli_real_escape_string($link, $_POST['tattoo']);
	$bdk_droga_natikman = mysqli_real_escape_string($link, $_POST['droga_natikman']);
	$bdk_droga_benta = mysqli_real_escape_string($link, $_POST['droga_benta']);
	$bdk_droga_gamit = $_POST['droga_gamit'];
	$bdk_droga_katagal = mysqli_real_escape_string($link, $_POST['droga_katagal']);
	$bdk_droga_lugar = mysqli_real_escape_string($link, $_POST['droga_lugar']);
	$bdk_droga_tao = $_POST['droga_tao'];
	$bdk_droga_illegal = mysqli_real_escape_string($link, $_POST['droga_illegal']);
	$bdk_testigo = mysqli_real_escape_string($link, $_POST['testigo']);
	$bdk_date_ac = $_POST['date_ac'];
			
		$sql = $conn->prepare("UPDATE tbl_badak SET status = '$status', bdk_unang_pangalan = '$bdk_unang_pangalan', bdk_gitnang_pangalan = '$bdk_gitnang_pangalan', bdk_huling_pangalan = '$bdk_huling_pangalan', bdk_alyas = '$bdk_alyas', bdk_kasarian = '$bdk_kasarian', bdk_ktyng_sbl = '$bdk_ktyng_sbl', bdk_petsa_kpnkn = '$bdk_petsa_kpnkn', bdk_edad = '$bdk_edad', bdk_lugar_kpnkn = '$bdk_lugar_kpnkn', bdk_ksk_lugar_trn = '$bdk_ksk_lugar_trn', bdk_lugar_prbnsy = '$bdk_lugar_prbnsy', bdk_edksyn_nkmt = '$bdk_edksyn_nkmt', bdk_trabaho = '$bdk_trabaho', bdk_numero_tel = '$bdk_numero_tel', bdk_socmed_acct = '$bdk_socmed_acct', bdk_relihiyon = '$bdk_relihiyon', bdk_taas = '$bdk_taas', bdk_bigat = '$bdk_bigat', bdk_kulaysamata = '$bdk_kulaysamata', 
										bdk_kulaysabalat = '$bdk_kulaysabalat', bdk_kulaysabuhok = '$bdk_kulaysabuhok', bdk_tattoo = '$bdk_tattoo', bdk_droga_natikman = '$bdk_droga_natikman', bdk_droga_benta = '$bdk_droga_benta', bdk_droga_gamit = '$bdk_droga_gamit', bdk_droga_katagal = '$bdk_droga_katagal', bdk_droga_lugar = '$bdk_droga_lugar', bdk_droga_tao = '$bdk_droga_tao', bdk_droga_illegal = '$bdk_droga_illegal', bdk_testigo = '$bdk_testigo', bdk_date_ac = '$bdk_date_ac' WHERE bdk_id = '$id'");
		$sql->execute();
               
		header("Location: index.php?view=badak_modify&id=$id&error=Modified successfully");
	

}

/*
    Remove Data
*/
function delete_data()
{
	include '../global-library/database.php';	
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: index.php');
    }    	
	
    // delete the category. set is_deleted to 1 as deleted;    
	$sql = $conn->prepare("UPDATE tbl_badak SET is_deleted = '1' WHERE bdk_id = '$id'");
	$sql->execute();
       
	header("Location: index.php?view=badak_list&error=Deleted successfully");
}


function _deleteImage($id)
{
	include '../global-library/database.php';
	// we will return the status
	// whether the image deleted successfully
	$deleted = false;
	
	$sql = $conn->prepare("SELECT flc_image, flc_thumbnail FROM tbl_resident WHERE cid = '$id'");
	$sql->execute();

	if ($sql->rowCount() > 0) {
		$sql_data = $sql->fetch();		

		if ($sql_data['flc_image'] && $sql_data['flc_thumbnail']) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/artist/$sql_data[flc_image]");
			$deleted = @unlink(SRV_ROOT . "images/artist/$sql_data[flc_thumbnail]");
		}
	}

	return $deleted;
}

?>