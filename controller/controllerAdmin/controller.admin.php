<?php 
		if (isset($_POST['connexionAdmin'])) {
			include '../../modele/modele.admin.php';
			include '../../config/connex.php';
			$modele = new Admin();

			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			if (empty($telephone) && empty($mdp)) {
				echo "Fenoy ny login sy teny miafina";
			}
			else{
				$donne = $modele->GetUserAdminCo($pseudo);
				if ($donne) {
					if ($donne['mdpA']==md5($mdp)) {
						session_start();
						$modele->ChangeStatusConnexion($donne['idAdmin'],"ok");
						$_SESSION['idUser'] = $donne['idAdmin'];
						echo "OK";
					}	
					else{
						echo "Teny miafina diso";
					}
				}else{
					echo "Login diso";
				}
			}

		}

		if (isset($_POST['deconnexion'])) {
			include '../../modele/modele.admin.php';
			include '../../config/connex.php';
			$modele = new Admin();
			session_start();
			$idAdmin = $_SESSION['idUser'];
			$modele->ChangeStatusConnexion($idAdmin,"ko");
			session_unset();
			session_destroy();
			echo "ok";
		}

		if (isset($_POST['new_mdpbtn'])) {
	 		include '../../modele/modele.admin.php';
			include '../../config/connex.php';
			$modele = new Admin();

	 		$id_admin = $_POST['id_admin'];
	 		$old_mdp = $_POST['old_mdp'];
	 		$new_mdp1 = $_POST['new_mdp1'];
	 		$new_mdp2 = $_POST['new_mdp2'];


	 		$val = $modele->GetUserId($id_admin);


	 		if ($new_mdp1==$new_mdp2) {
	 			if ($val['mdpA']==md5($old_mdp)) {
		 			$modele->UpdateaAdminMdp($id_admin,md5($new_mdp2));
		 			echo "OK";
		 		}else{
		 			echo "Teny miafina taloha diso";
		 		}	
	 		}else{
	 			echo "Tsy mitovy ny teny miafina roa vaovao";
	 		}
	 	}

 ?>