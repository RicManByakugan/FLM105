<?php 
/**
 * 
 */
class Notification
{
	
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddNotif($idUser,$descN)
		{
			$sql = "INSERT INTO notif(idUser,descNotif,dateNotif,heureNotif) VALUES('$idUser','$descN',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
}



 ?>