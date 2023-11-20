<?php 
	/**
	 * 
	 */
	class Admin
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}
		public function GetUserAdminCo($pseudo)
		{
			$sql = "SELECT * FROM admin WHERE pseudoA='$pseudo'";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetch();
			}
		}
		public function ChangeStatusConnexion($idAdmin,$value)
		{
			$now = time();
			if ($value == "ok") {
				$sql = "UPDATE admin SET statusA='OK' WHERE idAdmin='$idAdmin'";
					$this->bdd->exec($sql);
				$sql2 = "UPDATE admin SET dernierCo='$now' WHERE idAdmin='$idAdmin'";
				$this->bdd->exec($sql2);
			}else{
				$sql = "UPDATE admin SET statusA='KO' WHERE idAdmin='$idAdmin'";
					$this->bdd->exec($sql);
				$sql2 = "UPDATE admin SET dernierCo='$now' WHERE idAdmin='$idAdmin'";
				$this->bdd->exec($sql2);
			}
		}
		public function GetUserId($id)
		{
			$sql = "SELECT * FROM admin WHERE idAdmin=$id";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function UpdateaAdminMdp($idAdmin,$mdp)
		{
			$sql = "UPDATE admin SET mdpA='$mdp' WHERE idAdmin='$idAdmin'";
			$this->bdd->exec($sql);
		}
	}
 ?>