<?php 

	include 'modele/modele.admin.php';
	
	$modeleAdmin = new Admin();

	if (isset($_SESSION['idUser'])) {
		$idUser = $_SESSION['idUser'];
		$user = $modeleAdmin->GetUserId($idUser);
		if ($user['imageA']==NULL || $user['imageA']=="") {
			$img = "data/user/profile.png";
		}else{
			$img = "data/user/".$user['imageA'];
		}
	}

	require_once('view/accueil.php');


 ?>