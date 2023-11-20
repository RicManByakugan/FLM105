<?php 
	/**
	 * 
	 */
	class Membre
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddFiangonana($image,$nomF,$prenomF,$dateNF,$sexeF,$professionF,$pereF,$mereF,$tituF,$AdresseF,$faritra,$TelephoneF,$Telephone2,$Telephone3,$EmailF,$FacebookF)
		{
			$nomFEA = strtoupper($nomF);
			$nomFE = htmlentities($nomFEA, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO fiangonana(imageF,nomF,prenomF,dateNF,sexeF,professionF,pereF,mereF,tituF,AdresseF,Faritra,TelephoneF,Telephone2,Telephone3,EmailF,FacebookF,inscriptionF) VALUES('$image','$nomFE','$prenomF','$dateNF','$sexeF','$professionF','$pereF','$mereF','$tituF','$AdresseF','$faritra','$TelephoneF','$Telephone2','$Telephone3','$EmailF','$FacebookF',NOW())";
			$this->bdd->exec($sql);
		}
		public function AddHafatra($header,$body,$datete,$num,$foot)
		{
			$headerInsert = htmlentities($header, ENT_QUOTES, "UTF-8");
			$bodyInsert = htmlentities($body, ENT_QUOTES, "UTF-8");
			$footInsert = htmlentities($foot, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO hafatra(hafatraHeader,hafatraBody,hafatraDaty,numHafatra,hafatraFoot,dateH,heureH) VALUES('$headerInsert','$bodyInsert','$datete',$num,'$footInsert',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
		public function AddSampanaLie($idFiangonanaS,$BIRAO,$PlaceB,$FANORENANA,$PlaceF,$FDL,$Place1,$FBL,$Place2,$SALOMA,$Place3,$KTLM,$Place4,$TMM,$Place5,$SKOTO,$Place6,$DIAKONA,$Place7,$VLM,$Place8,$DSERA,$Place9,$DFITAOVANA,$Place11,$DMOZIKA,$Place12,$DFIRAKETANA,$Place13,$fifil,$place14)
		{
			$sql = "INSERT INTO sampanafiangonana(idFiangonanaS,BIRAO,PlaceB,FANORENANA,PlaceF,FDL,Place1,FBL,Place2,SALOMA,Place3,KTLM,Place4,TMM,Place5,SKOTO,Place6,DIAKONA,Place7,VLM,Place8,DSERA,Place9,DFITAOVANA,Place11,DMOZIKA,Place12,DFIRAKETANA,Place13,FIFIL,Place14) VALUES('$idFiangonanaS','$BIRAO','$PlaceB','$FANORENANA','$PlaceF','$FDL','$Place1','$FBL','$Place2','$SALOMA','$Place3','$KTLM','$Place4','$TMM','$Place5','$SKOTO','$Place6','$DIAKONA','$Place7','$VLM','$Place8','$DSERA','$Place9','$DFITAOVANA','$Place11','$DMOZIKA','$Place12','$DFIRAKETANA','$Place13','$fifil','$place14')";
			$this->bdd->exec($sql);
		}

		public function AddDescLie($idFiangonana,$Batisa,$Mpandray,$Mpiandry,$Soratra,$Mariazy)
		{
			$sql = "INSERT INTO descfiangonana(idFiangonana,Batisa,Mpandray,Mpiandry,Soratra,Mariazy) VALUES('$idFiangonana','$Batisa','$Mpandray','$Mpiandry','$Soratra','$Mariazy')";
			$this->bdd->exec($sql);
		}

		public function AddDescLieBoucle($idFiangonana,$Batisa,$Mpandray,$Mpiandry,$Soratra,$Mariazy)
		{
			$sql = "INSERT INTO descfiangonana(idFiangonana,Batisa,Mpandray,Mpiandry,Soratra,Mariazy) VALUES('$idFiangonana','$Batisa','$Mpandray','$Mpiandry','$Soratra','$Mariazy')";
			$this->bdd->exec($sql);
		}
		public function AddUpdateBoucle($id)
		{
			$sql = "UPDATE descfiangonana SET Batisa='KO',Mpandray='KO',Mpiandry='KO',Soratra='KO',Mariazy='KO' WHERE idFiangonana='$id'";
			$this->bdd->exec($sql);
		}

		public function AddKaratraUser($idF,$numero)
		{
			$sqlVer = "SELECT * FROM karatra WHERE idFiangonanaNF='$idF' OR numero='$numero'";
			$recup = $this->bdd->query($sqlVer);
			$donne = $recup->fetch();
			if ($donne) {
				return $donne['idFiangonanaNF'];
			}else{
				$sql = "INSERT INTO karatra(idFiangonanaNF,numero) VALUES('$idF','$numero')";
				$this->bdd->exec($sql);
				return "ok";
			}
		}
		public function AddAdidyKaratra($idKaratra)
		{
			$taona = date("Y");
			$taona1 = date("Y")+1;
			$taona2 = date("Y")+2;
			$taona3 = date("Y")+3;
			$taona4 = date("Y")+4;
			$sql = "INSERT INTO adidy(idKaratra,Janvier,Fevrier,Mars,Avril,Mai,Juin,Juillet,Aout,Septembre,Octobre,Novembre,Decembre,TAONA) VALUES('$idKaratra',0,0,0,0,0,0,0,0,0,0,0,0,'$taona')";
			$this->bdd->exec($sql);

			$sql1 = "INSERT INTO adidy(idKaratra,Janvier,Fevrier,Mars,Avril,Mai,Juin,Juillet,Aout,Septembre,Octobre,Novembre,Decembre,TAONA) VALUES('$idKaratra',0,0,0,0,0,0,0,0,0,0,0,0,'$taona1')";
			$this->bdd->exec($sql1);
			
			$sql2 = "INSERT INTO adidy(idKaratra,Janvier,Fevrier,Mars,Avril,Mai,Juin,Juillet,Aout,Septembre,Octobre,Novembre,Decembre,TAONA) VALUES('$idKaratra',0,0,0,0,0,0,0,0,0,0,0,0,'$taona2')";
			$this->bdd->exec($sql2);
			
			$sql3 = "INSERT INTO adidy(idKaratra,Janvier,Fevrier,Mars,Avril,Mai,Juin,Juillet,Aout,Septembre,Octobre,Novembre,Decembre,TAONA) VALUES('$idKaratra',0,0,0,0,0,0,0,0,0,0,0,0,'$taona3')";
			$this->bdd->exec($sql3);
			
			$sql4 = "INSERT INTO adidy(idKaratra,Janvier,Fevrier,Mars,Avril,Mai,Juin,Juillet,Aout,Septembre,Octobre,Novembre,Decembre,TAONA) VALUES('$idKaratra',0,0,0,0,0,0,0,0,0,0,0,0,'$taona4')";
			$this->bdd->exec($sql4);
		}



		public function DelSomething($idUser,$type)
		{
			$sql = "UPDATE fiangonana SET $type=NULL WHERE idF='$idUser'";
			$this->bdd->exec($sql);
		}

		public function UpdateHafatra($idHafatra,$hafatraHeader,$hafatraId,$dateIdHafatra,$numHafatra,$tdId)
		{
			if ($hafatraHeader!="" || $hafatraHeader!=NULL) {
				$hafatraHeader = htmlentities($hafatraHeader, ENT_QUOTES, "UTF-8");
				$sql = "UPDATE hafatra SET hafatraHeader='$hafatraHeader' WHERE idHafatra='$idHafatra'";
				$this->bdd->exec($sql);
			}if ($hafatraId!="" || $hafatraId!=NULL) {
				$hafatraId = htmlentities($hafatraId, ENT_QUOTES, "UTF-8");
				$sql = "UPDATE hafatra SET hafatraBody='$hafatraId' WHERE idHafatra='$idHafatra'";
				$this->bdd->exec($sql);
			}if ($dateIdHafatra!="" || $dateIdHafatra!=NULL) {
				$sql = "UPDATE hafatra SET hafatraDaty='$dateIdHafatra' WHERE idHafatra='$idHafatra'";
				$this->bdd->exec($sql);
			}if ($numHafatra!="" || $numHafatra!=NULL) {
				$sql = "UPDATE hafatra SET numHafatra='$numHafatra' WHERE idHafatra='$idHafatra'";
				$this->bdd->exec($sql);
			}if ($tdId!="" || $tdId!=NULL) {
				$sql = "UPDATE hafatra SET hafatraFoot='$tdId' WHERE idHafatra='$idHafatra'";
				$this->bdd->exec($sql);
			}
		}

		public function UpdateFiangonana($idUser,$nomFile1,$anarana,$fanampiny,$dateU,$sexe,$province,$anaranaRay,$anaranaReny,$anaranaTmp,$adiresy,$faritra,$toerana,$phoneVraiOne,$phone2,$phone3,$maim,$fb)
		{
			if ($province!="" || $province!=NULL) {
				$sql = "UPDATE fiangonana SET professionF='$province' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($nomFile1!="" || $nomFile1!=NULL) {
				$sql = "UPDATE fiangonana SET imageF='$nomFile1' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($anarana!="" || $anarana!=NULL) {
				$sql = "UPDATE fiangonana SET nomF='$anarana' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($fanampiny!="" || $fanampiny!=NULL) {
				$sql = "UPDATE fiangonana SET prenomF='$fanampiny' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($dateU!="" || $dateU!=NULL) {
				$sql = "UPDATE fiangonana SET dateNF='$dateU' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($sexe!="" || $sexe!=NULL) {
				$sql = "UPDATE fiangonana SET sexeF='$sexe' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($anaranaRay!="" || $anaranaRay!=NULL) {
				$sql = "UPDATE fiangonana SET PereF='$anaranaRay' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($anaranaReny!="" || $anaranaReny!=NULL) {
				$sql = "UPDATE fiangonana SET mereF='$anaranaReny' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($anaranaTmp!="" || $anaranaTmp!=NULL) {
				$sql = "UPDATE fiangonana SET tituF='$anaranaTmp' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($adiresy!="" || $adiresy!=NULL) {
				$sql = "UPDATE fiangonana SET AdresseF='$adiresy' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($faritra!="" || $faritra!=NULL) {
				$sql = "UPDATE fiangonana SET Faritra='$faritra' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($toerana!="" || $toerana!=NULL) {
				$sql = "UPDATE fiangonana SET Toerana='$toerana' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($phoneVraiOne!="" || $phoneVraiOne!=NULL) {
				$sql = "UPDATE fiangonana SET TelephoneF='$phoneVraiOne' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($phone2!="" || $phone2!=NULL) {
				$sql = "UPDATE fiangonana SET Telephone2='$phone2' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($phone3!="" || $phone3!=NULL) {
				$sql = "UPDATE fiangonana SET Telephone3='$phone3' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($maim!="" || $maim!=NULL) {
				$sql = "UPDATE fiangonana SET EmailF='$maim' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($fb!="" || $fb!=NULL) {
				$sql = "UPDATE fiangonana SET FacebookF='$fb' WHERE idF='$idUser'";
				$this->bdd->exec($sql);
			}
		}

		public function UpdateSampanaLie($idUser,$birao,$PlaceB,$fanorenana,$PlaceF,$fdl,$place1,$fbl,$place2,$saloma,$place3,$ktlm,$place4,$tmm,$place5,$skoto,$place6,$diakona,$place7,$vlm,$place8,$dserasera,$place9,$dfitao,$place11,$dhira,$place12,$dfira,$place13,$fifil,$place14)
		{
			if ($fifil!="" || $fifil!=NULL) {
				if ($fifil=="KO") {
					$sql = "UPDATE sampanafiangonana SET FIFIL='$fifil' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET FIFIL='$fifil',Place14='$place14' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($birao!="" || $birao!=NULL) {
				if ($birao=="KO") {
					$sql = "UPDATE sampanafiangonana SET BIRAO='$birao' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET BIRAO='$birao',PlaceB='$PlaceB' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($fanorenana!="" || $fanorenana!=NULL) {
				if ($fanorenana=="KO") {
					$sql = "UPDATE sampanafiangonana SET FANORENANA='$fanorenana' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET FANORENANA='$fanorenana',PlaceF='$PlaceF' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($fdl!="" || $fdl!=NULL) {
				if ($fdl=="KO") {
					$sql = "UPDATE sampanafiangonana SET FDL='$fdl' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET FDL='$fdl',Place1='$place1' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($fbl!="" || $fbl!=NULL) {
				if ($fbl=="KO") {
					$sql = "UPDATE sampanafiangonana SET FBL='$fbl' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET FBL='$fbl',Place2='$place2' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($saloma!="" || $saloma!=NULL) {
				if ($saloma=="KO") {
					$sql = "UPDATE sampanafiangonana SET SALOMA='$saloma' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET SALOMA='$saloma',Place3='$place3' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($ktlm!="" || $ktlm!=NULL) {
				if ($ktlm=="KO") {
					$sql = "UPDATE sampanafiangonana SET KTLM='$ktlm' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET KTLM='$ktlm',Place4='$place4' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($tmm!="" || $tmm!=NULL) {
				if ($tmm=="KO") {
					$sql = "UPDATE sampanafiangonana SET TMM='$tmm' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET TMM='$tmm',Place5='$place5' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($skoto!="" || $skoto!=NULL) {
				if ($skoto=="KO") {
					$sql = "UPDATE sampanafiangonana SET SKOTO='$skoto' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET SKOTO='$skoto',Place6='$place6' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($diakona!="" || $diakona!=NULL) {
				if ($diakona=="KO") {
					$sql = "UPDATE sampanafiangonana SET DIAKONA='$diakona' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET DIAKONA='$diakona',Place7='$place7' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($vlm!="" || $vlm!=NULL) {
				if ($vlm=="KO") {
					$sql = "UPDATE sampanafiangonana SET VLM='$vlm' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET VLM='$vlm',Place8='$place8' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($dserasera!="" || $dserasera!=NULL) {
				if ($dserasera=="KO") {
					$sql = "UPDATE sampanafiangonana SET DSERA='$dserasera' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET DSERA='$dserasera',Place9='$place9' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($dfitao!="" || $dfitao!=NULL) {
				if ($dfitao=="KO") {
					$sql = "UPDATE sampanafiangonana SET DFITAOVANA='$dfitao' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET DFITAOVANA='$dfitao',Place11='$place11' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($dhira!="" || $dhira!=NULL) {
				if ($dhira=="KO") {
					$sql = "UPDATE sampanafiangonana SET DMOZIKA='$dhira' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET DMOZIKA='$dhira',Place12='$place12' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
			if ($dfira!="" || $dfira!=NULL) {
				if ($dfira=="KO") {
					$sql = "UPDATE sampanafiangonana SET DFIRAKETANA='$dfira' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}else{
					$sql = "UPDATE sampanafiangonana SET DFIRAKETANA='$dfira',Place13='$place13' WHERE idFiangonanaS='$idUser'";
					$this->bdd->exec($sql);
				}
			}
		}

		public function UpdateDescLie($idUser,$batisa,$mpandray,$mpiandry,$soratra,$mari)
		{
			if ($batisa!="" || $batisa!=NULL) {
				$sql = "UPDATE descfiangonana SET Batisa='$batisa' WHERE idFiangonana='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($mpandray!="" || $mpandray!=NULL) {
				$sql = "UPDATE descfiangonana SET Mpandray='$mpandray' WHERE idFiangonana='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($mpiandry!="" || $mpiandry!=NULL) {
				$sql = "UPDATE descfiangonana SET Mpiandry='$mpiandry' WHERE idFiangonana='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($soratra!="" || $soratra!=NULL) {
				$sql = "UPDATE descfiangonana SET Soratra='$soratra' WHERE idFiangonana='$idUser'";
				$this->bdd->exec($sql);
			}
			if ($mari!="" || $mari!=NULL) {
				$sql = "UPDATE descfiangonana SET Mariazy='$mari' WHERE idFiangonana='$idUser'";
				$this->bdd->exec($sql);
			}
		}

		public function AdidyUpdate($montant,$idKaratra,$taona,$jan,$fev,$mars,$avril,$mai,$juin,$juille,$aout,$sept,$oct,$nov,$dec)
		{
			if ($jan=="OK") {
				$sql = "UPDATE adidy SET Janvier='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($fev=="OK") {
				$sql = "UPDATE adidy SET Fevrier='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($mars=="OK") {
				$sql = "UPDATE adidy SET Mars='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($avril=="OK") {
				$sql = "UPDATE adidy SET Avril='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($mai=="OK") {
				$sql = "UPDATE adidy SET Mai='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($juin=="OK") {
				$sql = "UPDATE adidy SET Juin='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($juille=="OK") {
				$sql = "UPDATE adidy SET Juillet='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($aout=="OK") {
				$sql = "UPDATE adidy SET Aout='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($sept=="OK") {
				$sql = "UPDATE adidy SET Septembre='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($oct=="OK") {
				$sql = "UPDATE adidy SET Octobre='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($nov=="OK") {
				$sql = "UPDATE adidy SET Novembre='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
			if ($dec=="OK") {
				$sql = "UPDATE adidy SET Decembre='$montant' WHERE idKaratra='$idKaratra' AND TAONA='$taona'";
				$this->bdd->exec($sql);
			}
		}

		public function RemoveKaratraManAh($numero,$idKaratra)
		{
			$sql = "DELETE FROM karatra WHERE numero='$numero'";
				$this->bdd->exec($sql);
			$sql1 = "DELETE FROM adidy WHERE idKaratra='$idKaratra'";
				$this->bdd->exec($sql1);
		}

		public function DeleteHafatra($id)
		{
			$sql = "DELETE FROM hafatra WHERE idHafatra ='$id'";
			$this->bdd->exec($sql);
		}

		public function DelUser($idUser)
		{
			$sql = "DELETE FROM fiangonana WHERE idF='$idUser'";
			$sql2 = "DELETE FROM sampanafiangonana WHERE idFiangonanaS='$idUser'";
			$sql3 = "DELETE FROM descfiangonana WHERE idFiangonana='$idUser'";
			$this->bdd->exec($sql);
			$this->bdd->exec($sql2);
			$this->bdd->exec($sql3);
		}
		public function GetAdidy($numero)
		{
			$sql = "SELECT * FROM karatra INNER JOIN adidy ON karatra.idNF=adidy.idKaratra WHERE karatra.numero='$numero'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetUserLast()
		{
			$sql = "SELECT MAX(idF) AS lastId FROM fiangonana";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetLastKaratra()
		{
			$sql = "SELECT MAX(idNF) AS lastIdKaratra FROM karatra";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetUserBirao()
		{
			$sql = "SELECT * FROM sampanafiangonana INNER JOIN fiangonana ON sampanafiangonana.idFiangonanaS=fiangonana.idF WHERE sampanafiangonana.BIRAO='OK' ORDER BY sampanafiangonana.PlaceB";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetUserFanorenana()
		{
			$sql = "SELECT * FROM sampanafiangonana INNER JOIN fiangonana ON sampanafiangonana.idFiangonanaS=fiangonana.idF WHERE sampanafiangonana.FANORENANA='OK' ORDER BY sampanafiangonana.PlaceF";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetSampana($sampana)
		{
			if ($sampana=="FDL") {
				$place = "Place1";
			}elseif ($sampana=="FBL") {
				$place = "Place2";
			}elseif ($sampana=="SALOMA") {
				$place = "Place3";
			}elseif ($sampana=="KTLM") {
				$place = "Place4";
			}elseif ($sampana=="TMM") {
				$place = "Place5";
			}elseif ($sampana=="SKOTO") {
				$place = "Place6";
			}elseif ($sampana=="DIAKONA") {
				$place = "Place7";
			}elseif ($sampana=="VLM") {
				$place = "Place8";
			}elseif ($sampana=="DSERA") {
				$place = "Place9";
			}elseif ($sampana=="DFITAOVANA") {
				$place = "Place11";
			}elseif ($sampana=="DMOZIKA") {
				$place = "Place12";
			}elseif ($sampana=="DFIRAKETANA") {
				$place = "Place13";
			}elseif ($sampana=="FIFIL") {
				$place = "Place14";
			}

			$sql = "SELECT * FROM sampanafiangonana INNER JOIN fiangonana ON sampanafiangonana.idFiangonanaS=fiangonana.idF WHERE sampanafiangonana.$sampana='OK' ORDER BY sampanafiangonana.$place";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetFaritra($faritra)
		{
			$sql = "SELECT * FROM fiangonana WHERE faritra=$faritra ORDER BY Toerana DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetHafatraSearch($cle)
		{
			$sql = "SELECT * FROM hafatra WHERE hafatraHeader LIKE '%$cle%' OR hafatraBody LIKE '$cle%' OR hafatraFoot LIKE '$cle%' OR hafatraDaty LIKE '$cle%' ORDER BY hafatraDaty ASC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function GetHafatra()
		{
			$sql = "SELECT * FROM hafatra ORDER BY hafatraDaty ASC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function GetMois($month)
		{
			switch ($month) {
				case 1:
					$m = "janoary";
					break;
				case 2:
					$m = "febroary";
					break;
				case 3:
					$m = "martsa";
					break;
				case 4:
					$m = "aprily";
					break;
				case 5:
					$m = "may";
					break;
				case 6:
					$m = "jona";
					break;
				case 7:
					$m = "jolay";
					break;
				case 8:
					$m = "aogositra";
					break;
				case 9:
					$m = "septambra";
					break;
				case 10:
					$m = "oktobra";
					break;			
				case 11:
					$m = "Novambra";
					break;
				case 12:
					$m = "Desambra";
					break;
				default:
					$m = NULL;
					break;
			}

			return $m;
		}

		public function GetHafatraId($id)
		{
			$sql = "SELECT * FROM hafatra WHERE idHafatra = $id";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function TruncateMana()
		{
			$sql = "TRUNCATE hafatra";
			$this->bdd->exec($sql);
		}

		public function GetDepart($depart)
		{
			$sql = "SELECT * FROM sampanafiangonana INNER JOIN fiangonana ON sampanafiangonana.idFiangonanaS=fiangonana.idF WHERE sampanafiangonana.$depart='OK'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetUser6()
		{
			$sql = "SELECT * FROM fiangonana ORDER BY idF ASC LIMIT 6";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetUserAll()
		{
			$sql = "SELECT * FROM fiangonana ORDER BY idF ASC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetUserAllDistingue()
		{
			$sql = "SELECT DISTINCT TelephoneF,idF,imageF,nomF FROM fiangonana";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetUserId($id)
		{
			$sql = "SELECT * FROM fiangonana WHERE idF='$id'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetUserDescId($id)
		{
			$sql = "SELECT * FROM sampanafiangonana WHERE idFiangonanaS='$id'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetUserSuiteId($id)
		{
			$sql = "SELECT * FROM descfiangonana WHERE idFiangonana='$id'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetUserSearch($search,$toe,$sexe,$faritra)
		{
			if ($toe != "ko" && $sexe != "ko" && $faritra != "ko") {
				$sql = "SELECT * FROM fiangonana WHERE nomF LIKE '$search%' OR prenomF LIKE '$search%' OR TelephoneF LIKE '$search%' AND sexeF='$sexe' AND AdresseF LIKE '$toe%' AND Faritra=$faritra";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}elseif ($toe != "ko" && $sexe == "ko" && $faritra == "ko") {
				$sql = "SELECT * FROM fiangonana WHERE nomF LIKE '$search%' OR prenomF LIKE '$search%' OR TelephoneF LIKE '$search%' AND AdresseF LIKE '$toe%'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}elseif ($toe == "ko" && $sexe != "ko" && $faritra == "ko") {
				$sql = "SELECT * FROM fiangonana WHERE nomF LIKE '$search%' OR prenomF LIKE '$search%' OR TelephoneF LIKE '$search%' AND AdresseF LIKE '$toe%'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}elseif ($toe == "ko" && $sexe == "ko" && $faritra != "ko") {
				$sql = "SELECT * FROM fiangonana WHERE nomF LIKE '$search%' OR prenomF LIKE '$search%' AND Faritra=$faritra";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}else{
				$sql = "SELECT * FROM fiangonana WHERE nomF LIKE '$search%' OR prenomF LIKE '$search%' OR TelephoneF LIKE '$search%' OR AdresseF LIKE '$search%'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}
		}
		public function GetUserSearchOne($search){
			$sql = "SELECT * FROM fiangonana WHERE nomF LIKE '$search%' OR prenomF LIKE '$search%' OR TelephoneF LIKE '$search%'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
		}
		public function GetUserSearchKartra($search){
			$sql = "SELECT * FROM karatra INNER JOIN fiangonana ON karatra.idFiangonanaNF=fiangonana.idF WHERE karatra.numero='$search'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetUserMpandray($idUser)
		{
			$sql = "SELECT * FROM descfiangonana WHERE idFiangonana='$idUser'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetUserKartraIDF($idUser)
		{
			$sql = "SELECT * FROM fiangonana INNER JOIN karatra ON fiangonana.idF=karatra.idFiangonanaNF WHERE karatra.idFiangonanaNF='$idUser'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function GetUserSearchSampana($sampana,$search,$toe,$sexe)
		{
			if ($toe != "ko" && $sexe != "ko") {
				$sql = "SELECT * FROM fiangonana INNER JOIN sampanafiangonana ON fiangonana.idF=sampanafiangonana.idFiangonanaS WHERE fiangonana.nomF LIKE '$search%' OR fiangonana.prenomF LIKE '$search%' OR fiangonana.TelephoneF LIKE '$search%' AND fiangonana.sexeF='$sexe' AND fiangonana.AdresseF LIKE '$toe%' AND sampanafiangonana.$sampana='OK'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}elseif ($toe != "ko" && $sexe == "ko") {
				$sql = "SELECT * FROM fiangonana INNER JOIN sampanafiangonana ON fiangonana.idF=sampanafiangonana.idFiangonanaS WHERE fiangonana.nomF LIKE '$search%' OR fiangonana.prenomF LIKE '$search%' OR fiangonana.TelephoneF LIKE '$search%' AND fiangonana.AdresseF LIKE '$toe%' AND sampanafiangonana.$sampana='OK'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}elseif ($toe == "ko" && $sexe != "ko") {
				$sql = "SELECT * FROM fiangonana INNER JOIN sampanafiangonana ON fiangonana.idF=sampanafiangonana.idFiangonanaS WHERE fiangonana.nomF LIKE '$search%' OR fiangonana.prenomF LIKE '$search%' OR fiangonana.TelephoneF LIKE '$search%' AND fiangonana.AdresseF LIKE '$toe%' AND sampanafiangonana.$sampana='OK'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}else{
				$sql = "SELECT * FROM fiangonana INNER JOIN sampanafiangonana ON fiangonana.idF=sampanafiangonana.idFiangonanaS WHERE fiangonana.nomF LIKE '$search%' OR fiangonana.prenomF LIKE '$search%' OR fiangonana.TelephoneF LIKE '$search%' AND sampanafiangonana.$sampana='OK'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}
		}
		public function GetDonneNumS($donneS)
		{
			$sql = "SELECT COUNT(idSa) AS total FROM fiangonana INNER JOIN sampanafiangonana ON fiangonana.idF=sampanafiangonana.idFiangonanaS WHERE sampanafiangonana.$donneS='OK'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function GetDataFaritra($number)
		{
			$sql = "SELECT COUNT(idF) AS total FROM fiangonana WHERE Faritra='$number'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			return $donne["total"];
		}

		public function GetDataFaritraDetaille($number)
		{
			$sql = "SELECT * FROM fiangonana WHERE Faritra='$number'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetchall();
			return $donne;
		}

		public function GetDataFaritraParam($number, $sexe)
		{
			$sql = "SELECT COUNT(idF) AS total FROM fiangonana WHERE Faritra='$number' AND sexeF = '$sexe'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			return $donne["total"];
		}
		public function GetDataFaritraParamDesc($number, $desc, $valeur)
		{
			$sql = "SELECT COUNT(idF) AS total FROM fiangonana INNER JOIN descfiangonana ON fiangonana.idF = descfiangonana.idDe WHERE fiangonana.Faritra='$number' AND descfiangonana.$desc = '$valeur'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			return $donne["total"];
		}

		public function GetDonneNumF()
		{
			$sql = "SELECT COUNT(idF) AS total FROM fiangonana";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetDonneNumFDetaille()
		{
			$sql = "SELECT * AS total FROM fiangonana";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function GetDonneNumSDetaille($donneS)
		{
			if ($donneS=="FDL") {
				$place = "Place1";
			}elseif ($donneS=="FBL") {
				$place = "Place2";
			}elseif ($donneS=="SALOMA") {
				$place = "Place3";
			}elseif ($donneS=="KTLM") {
				$place = "Place4";
			}elseif ($donneS=="TMM") {
				$place = "Place5";
			}elseif ($donneS=="SKOTO") {
				$place = "Place6";
			}elseif ($donneS=="DIAKONA") {
				$place = "Place7";
			}elseif ($donneS=="VLM") {
				$place = "Place8";
			}elseif ($donneS=="DSERA") {
				$place = "Place9";
			}elseif ($donneS=="DFITAOVANA") {
				$place = "Place11";
			}elseif ($donneS=="DMOZIKA") {
				$place = "Place12";
			}elseif ($donneS=="DFIRAKETANA") {
				$place = "Place13";
			}elseif ($donneS=="FIFIL") {
				$place = "Place14";
			}
			$sql = "SELECT * FROM fiangonana INNER JOIN sampanafiangonana ON fiangonana.idF=sampanafiangonana.idFiangonanaS WHERE sampanafiangonana.$donneS='OK' ORDER BY sampanafiangonana.$place";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetDonneNumSLV($donneS,$sexe)
		{
			$sql = "SELECT COUNT(idSa) AS total FROM fiangonana INNER JOIN sampanafiangonana ON fiangonana.idF=sampanafiangonana.idFiangonanaS WHERE sampanafiangonana.$donneS='OK' AND fiangonana.sexeF='$sexe'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetDonneNumFC($sexe)
		{
			$sql = "SELECT COUNT(idF) AS total FROM fiangonana WHERE sexeF='$sexe'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetDonneNumFLVDetaille($sexe)
		{
			$sql = "SELECT * FROM fiangonana WHERE sexeF='$sexe'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetDonneNumSLVDetaille($donneS,$sexe)
		{
			if ($donneS=="FDL") {
				$place = "Place1";
			}elseif ($donneS=="FBL") {
				$place = "Place2";
			}elseif ($donneS=="SALOMA") {
				$place = "Place3";
			}elseif ($donneS=="KTLM") {
				$place = "Place4";
			}elseif ($donneS=="TMM") {
				$place = "Place5";
			}elseif ($donneS=="SKOTO") {
				$place = "Place6";
			}elseif ($donneS=="DIAKONA") {
				$place = "Place7";
			}elseif ($donneS=="VLM") {
				$place = "Place8";
			}elseif ($donneS=="DSERA") {
				$place = "Place9";
			}elseif ($donneS=="DFITAOVANA") {
				$place = "Place11";
			}elseif ($donneS=="DMOZIKA") {
				$place = "Place12";
			}elseif ($donneS=="DFIRAKETANA") {
				$place = "Place13";
			}elseif ($donneS=="FIFIL") {
				$place = "Place14";
			}
			$sql = "SELECT * FROM fiangonana INNER JOIN sampanafiangonana ON fiangonana.idF=sampanafiangonana.idFiangonanaS WHERE sampanafiangonana.$donneS='OK' AND fiangonana.sexeF='$sexe' ORDER BY sampanafiangonana.$place";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetDonneNumMK($mk,$donneS,$val)
		{
			$sql = "SELECT COUNT(idDe) AS total FROM sampanafiangonana INNER JOIN descfiangonana ON sampanafiangonana.idFiangonanaS=descfiangonana.idFiangonana WHERE descfiangonana.$mk='$val' AND sampanafiangonana.$donneS='OK'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetDonneNumMKF($mk,$val)
		{
			$sql = "SELECT COUNT(idDe) AS total FROM sampanafiangonana INNER JOIN descfiangonana ON sampanafiangonana.idFiangonanaS=descfiangonana.idFiangonana WHERE descfiangonana.$mk='$val'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetDonneNumFFMDetaille($mk,$val)
		{
			$sql = "SELECT * FROM sampanafiangonana INNER JOIN descfiangonana ON sampanafiangonana.idFiangonanaS=descfiangonana.idFiangonana WHERE descfiangonana.$mk='$val'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetDonneNumMDetaille($mk,$donneS,$val)
		{
			$sql = "SELECT * FROM sampanafiangonana INNER JOIN descfiangonana ON sampanafiangonana.idFiangonanaS=descfiangonana.idFiangonana WHERE descfiangonana.$mk='$val' AND sampanafiangonana.$donneS='OK'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function CalculeDAge($anne)
		{
			$now = date("Y-m-d");
			if (empty($anne)) {
				return "";
			}else{
				try{
					$res = intval($now) - intval($anne);
					if ($res==date("Y")) {
						return "Tsy misy date";
					}else if ($res > 0) {
						return $res." taona";
					}else{
						return "";
					}
				}catch(Exception $err){
					return 0;
				}
			}
		}





		
	}


 ?>