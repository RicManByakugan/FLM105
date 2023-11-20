<?php 
	session_start();
	try{
		if (isset($_SESSION['idUser'])) {
			require_once('controller/controller.accueil.php');
		}else{
			require_once('controller/controller.login.php');
		}
	}catch(Exception $e){
		require_once('view/404E.php');
	}
 ?>