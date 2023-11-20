<?php 
	if (isset($_POST['Hampidirina'])) {
			include '../../modele/modele.membre.php';
			include '../../modele/modele.notif.php';
			include '../../config/connex.php';
			$modele = new Membre();
			$modeleNotif = new Notification();
	
			$idAdmin = $_POST['idUser'];

			$anarana = $_POST['anarana'];
			$fanampiny = $_POST['fanampiny'];
			$profession = $_POST['profession'];
			$adiresy = $_POST['add'];
			$faritra = $_POST['fraitra'];

			//OK 18
			$anaranaRay = $_POST['anaranaRay'];
			$anaranaReny = $_POST['anaranaReny'];
			$anaranaTmp = $_POST['anaranaTmp'];
			$phoneTmp = $_POST['phoneTmp'];
			$dateU = $_POST['dateU'];

			//KO 18
			$phone1 = $_POST['phone1'];
			$phone2 = $_POST['phone2'];
			$phone3 = $_POST['phone3'];
			$maim = $_POST['maim'];
			$fb = $_POST['fb'];

			if (empty($phone1)) {
				$phoneVraiOne = $phoneTmp;
			}else{
				$phoneVraiOne = $phone1;	
			}

			if (isset($_POST['sexe']) && !empty($_POST['sexe'])) {
				$sexe = $_POST['sexe'];
			}else{
				$sexe = "TSY FANTATRA";
			}
			

			//SUITE
			isset($_POST['batisa']) ? $batisa = "OK" : $batisa = "KO";
			isset($_POST['mpandray']) ? $mpandray = "OK" : $mpandray = "KO";
			isset($_POST['mpiandry']) ? $mpiandry = "OK" : $mpiandry = "KO";
			isset($_POST['soratra']) ? $soratra = "OK" : $soratra = "KO";
			isset($_POST['mari']) ? $mari = "OK" : $mari = "KO";

			//SAMPANA
			isset($_POST['bira']) ? $birao = "OK" : $birao = "KO";
			$birao=="OK" ? $PlaceB = $_POST['biraT'] : $PlaceB = "KO";
			
			isset($_POST['faaa']) ? $fanorenana = "OK" : $fanorenana = "KO";
			$fanorenana=="OK" ? $PlaceF = $_POST['faaaT'] : $PlaceF = "KO";
			
			isset($_POST['fdl']) ? $fdl = "OK" : $fdl = "KO";
			$fdl=="OK" ? $place1 = $_POST['fdlT'] : $place1 = "KO";

			isset($_POST['fbl']) ? $fbl = "OK" : $fbl = "KO";
			$fbl=="OK" ? $place2 = $_POST['fblT'] : $place2 = "KO";
			
			isset($_POST['sa']) ? $saloma = "OK" : $saloma = "KO";
			$saloma=="OK" ? $place3 = $_POST['saT'] : $place3 = "KO";
			
			isset($_POST['kt']) ? $ktlm = "OK" : $ktlm = "KO";
			$ktlm=="OK" ? $place4 = $_POST['ktT'] : $place4 = "KO";
			
			isset($_POST['tmm']) ? $tmm = "OK" : $tmm = "KO";
			$tmm=="OK" ? $place5 = $_POST['tmmT'] : $place5 = "KO";

			isset($_POST['skoto']) ? $skoto = "OK" : $skoto = "KO";
			$skoto=="OK" ? $place6 = $_POST['skotoT'] : $place6 = "KO";

			isset($_POST['dia']) ? $diakona = "OK" : $diakona = "KO";
			$diakona=="OK" ? $place7 = $_POST['diaT'] : $place7 = "KO";

			isset($_POST['vlm']) ? $vlm = "OK" : $vlm = "KO";
			$vlm=="OK" ? $place8 = $_POST['vlmT'] : $place8 = "KO";

			isset($_POST['ds']) ? $dserasera = "OK" : $dserasera = "KO";
			$dserasera=="OK" ? $place9 = $_POST['dsT'] : $place9 = "KO";

			isset($_POST['df']) ? $dfitao = "OK" : $dfitao = "KO";
			$dfitao=="OK" ? $place11 = $_POST['dfT'] : $place11 = "KO";
			
			isset($_POST['dh']) ? $dhira = "OK" : $dhira = "KO";
			$dhira=="OK" ? $place12 = $_POST['dhT'] : $place12 = "KO";

			isset($_POST['dfi']) ? $dfira = "OK" : $dfira = "KO";
			$dfira=="OK" ? $place13 = $_POST['dfiT'] : $place13 = "KO";

			isset($_POST['fifil']) ? $fifil = "OK" : $fifil = "KO";
			$fifil=="OK" ? $place14 = $_POST['fifilT'] : $place14 = "KO";

			// ADD
			$nomFile1 = "";
			$imageM = $_FILES['imageM']['name'];
			if (!empty($imageM)) {
				$fileInfo = pathinfo($_FILES['imageM']['name']);
				$ext = $fileInfo['extension'];
				$nomFile1 = rand().time().'flmImage.'.$ext;
				$target = "../../data/user/".$nomFile1;
				
				 	if (file_exists($target) && !empty($imageM)) {
				 			$target = rand().$target;
							if (move_uploaded_file($_FILES['imageM']['tmp_name'], $target)) {
								$errora = NULL;
							}
				 	}else{
				 			if (move_uploaded_file($_FILES['imageM']['tmp_name'], $target)) {
								$errora = NULL;
							}
				 	}
			}


			$modele->AddFiangonana($nomFile1,$anarana,$fanampiny,$dateU,$sexe,$profession,$anaranaRay,$anaranaReny,$anaranaTmp,$adiresy,$faritra,$phoneVraiOne,$phone2,$phone3,$maim,$fb);

			$last = $modele->GetUserLast();
			
			$modele->AddSampanaLie($last['lastId'],$birao,$PlaceB,$fanorenana,$PlaceF,$fdl,$place1,$fbl,$place2,$saloma,$place3,$ktlm,$place4,$tmm,$place5,$skoto,$place6,$diakona,$place7,$vlm,$place8,$dserasera,$place9,$dfitao,$place11,$dhira,$place12,$dfira,$place13,$fifil,$place14);

			$modele->AddDescLie($last['lastId'],$batisa,$mpandray,$mpiandry,$soratra,$mari);

			$descN = "AJOUT";
			$modeleNotif->AddNotif($idAdmin,$descN);
			echo "ok";
?>
<script type="text/javascript">
	window.top.window.alert('Vita tompoko');
	window.top.window.ResetForm('nadd');
	window.top.window.Go("Hampiditra");
</script>
<?php 
	}

	if (isset($_POST['modifBabe'])) {
			include '../../modele/modele.membre.php';
			include '../../config/connex.php';
			include '../../modele/modele.notif.php';
			$modeleNotif = new Notification();
			$modele = new Membre();

			$idAdmin = $_POST['idAdminModif'];
			$idUser = $_POST['idUserModif'];

			$anarana = $_POST['nomModif'];
			$fanampiny = $_POST['prenomModif'];
			$dateU = $_POST['dateModif'];
			$sexe = $_POST['sexeModif'];
			$province = $_POST['provinceModif'];
			$adiresy = $_POST['adresseModif'];
			$faritraModif = $_POST['faritraModif'];
			$ToeranafaritraModif = $_POST['ToeranafaritraModifT'];

			$anaranaRay = $_POST['rayModif'];
			$anaranaReny = $_POST['renyModif'];
			$anaranaTmp = $_POST['tituModif'];
			$phoneTmp = $_POST['phoneTmp'];

			$phone1 = $_POST['finday1Modif'];
			$phone2 = $_POST['finday2Modif'];
			$phone3 = $_POST['finday3Modif'];
			$maim = $_POST['EmailModif'];
			$fb = $_POST['fbModif'];

			if (empty($phone1)) {
				$phoneVraiOne = $phoneTmp;
			}else{
				$phoneVraiOne = $phone1;	
			}

			isset($_POST['batisaModif']) ? $batisa = "OK" : $batisa = "KO";
			isset($_POST['MpandrayModif']) ? $mpandray = "OK" : $mpandray = "KO";
			isset($_POST['mpiandryModif']) ? $mpiandry = "OK" : $mpiandry = "KO";
			isset($_POST['soratraModif']) ? $soratra = "OK" : $soratra = "KO";
			isset($_POST['mariaModif']) ? $mari = "OK" : $mari = "KO";

			isset($_POST['biraModif']) ? $birao = "OK" : $birao = "KO";
			$birao=="OK" ? $PlaceB = $_POST['biraTModif'] : $PlaceB = "KO";
			
			isset($_POST['faaaModif']) ? $fanorenana = "OK" : $fanorenana = "KO";
			$fanorenana=="OK" ? $PlaceF = $_POST['faaaTModif'] : $PlaceF = "KO";
			
			isset($_POST['fdlModif']) ? $fdl = "OK" : $fdl = "KO";
			$fdl=="OK" ? $place1 = $_POST['fdlTModif'] : $place1 = "KO";

			isset($_POST['fblModif']) ? $fbl = "OK" : $fbl = "KO";
			$fbl=="OK" ? $place2 = $_POST['fblTModif'] : $place2 = "KO";
			
			isset($_POST['saModif']) ? $saloma = "OK" : $saloma = "KO";
			$saloma=="OK" ? $place3 = $_POST['saTModif'] : $place3 = "KO";
			
			isset($_POST['ktModif']) ? $ktlm = "OK" : $ktlm = "KO";
			$ktlm=="OK" ? $place4 = $_POST['ktTModif'] : $place4 = "KO";
			
			isset($_POST['tmmModif']) ? $tmm = "OK" : $tmm = "KO";
			$tmm=="OK" ? $place5 = $_POST['tmmTModif'] : $place5 = "KO";

			isset($_POST['skotoModif']) ? $skoto = "OK" : $skoto = "KO";
			$skoto=="OK" ? $place6 = $_POST['skotoTModif'] : $place6 = "KO";

			isset($_POST['diaModif']) ? $diakona = "OK" : $diakona = "KO";
			$diakona=="OK" ? $place7 = $_POST['diaTModif'] : $place7 = "KO";

			isset($_POST['vlmModif']) ? $vlm = "OK" : $vlm = "KO";
			$vlm=="OK" ? $place8 = $_POST['vlmTModif'] : $place8 = "KO";

			isset($_POST['dsModif']) ? $dserasera = "OK" : $dserasera = "KO";
			$dserasera=="OK" ? $place9 = $_POST['dsTModif'] : $place9 = "KO";

			isset($_POST['dfModif']) ? $dfitao = "OK" : $dfitao = "KO";
			$dfitao=="OK" ? $place11 = $_POST['dfTModif'] : $place11 = "KO";
			
			isset($_POST['dhModif']) ? $dhira = "OK" : $dhira = "KO";
			$dhira=="OK" ? $place12 = $_POST['dhTModif'] : $place12 = "KO";

			isset($_POST['dfiModif']) ? $dfira = "OK" : $dfira = "KO";
			$dfira=="OK" ? $place13 = $_POST['dfiTModif'] : $place13 = "KO";

			isset($_POST['fifilModifT']) ? $fifil = "OK" : $fifil = "KO";
			$fifil=="OK" ? $place14 = $_POST['fifilModifT'] : $place14 = "KO";

			$nomFile1 = "";
			$imageModif = $_FILES['imageModif']['name'];
			if (!empty($imageModif)) {

					$fileInfo = pathinfo($_FILES['imageModif']['name']);
					$ext = $fileInfo['extension'];
					$nomFile1 = rand().time().'flmImage.'.$ext;
					$target = "../../data/user/".$nomFile1;
					
					 	if (file_exists($target) && !empty($imageModif)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['imageModif']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['imageModif']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

			$modele->UpdateFiangonana($idUser,$nomFile1,$anarana,$fanampiny,$dateU,$sexe,$province,$anaranaRay,$anaranaReny,$anaranaTmp,$adiresy,$faritraModif,$ToeranafaritraModif,$phoneVraiOne,$phone2,$phone3,$maim,$fb);
			
			$modele->UpdateSampanaLie($idUser,$birao,$PlaceB,$fanorenana,$PlaceF,$fdl,$place1,$fbl,$place2,$saloma,$place3,$ktlm,$place4,$tmm,$place5,$skoto,$place6,$diakona,$place7,$vlm,$place8,$dserasera,$place9,$dfitao,$place11,$dhira,$place12,$dfira,$place13,$fifil,$place14);

			$modele->UpdateDescLie($idUser,$batisa,$mpandray,$mpiandry,$soratra,$mari);

			$descN = "MODIFICATION";
			$modeleNotif->AddNotif($idAdmin,$descN);
	?>
<script type="text/javascript">
	window.top.window.alert('Vita tompoko');
	window.top.window.ModifierUser(<?php echo $idUser; ?>);
</script>
<?php	
	}


	if (isset($_POST['hafatraId']) && isset($_POST['hafatraHeader']) && isset($_POST['dateIdHafatra']) && isset($_POST['tdId'])) {
		include '../../modele/modele.membre.php';
		include '../../modele/modele.notif.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$modeleNotif = new Notification();

		$hafatraHeader = $_POST['hafatraHeader'];
		$hafatraId = $_POST['hafatraId'];
		$dateIdHafatra = $_POST['dateIdHafatra'];
		list($numHafatra1,$numHafatra) = explode(" ", date($dateIdHafatra." z"));
		$tdId = $_POST['tdId'];

		if (!empty($hafatraId) && !empty($hafatraHeader) && !empty($dateIdHafatra) && !empty($tdId)) {
			$modele->AddHafatra($hafatraHeader,$hafatraId,$dateIdHafatra,$numHafatra,$tdId);
			echo "ok";
		}else{
			echo "Tsy feno ny banga";
		}
	}

	if (isset($_POST['hafatraIdHH']) && isset($_POST['hafatraHeaderHH']) && isset($_POST['dateIdHafatraHH']) && isset($_POST['tdIdHH']) && isset($_POST['idHafatra'])) {
		include '../../modele/modele.membre.php';
		include '../../modele/modele.notif.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$modeleNotif = new Notification();

		$hafatraHeader = $_POST['hafatraHeaderHH'];
		$hafatraId = $_POST['hafatraIdHH'];
		$dateIdHafatra = $_POST['dateIdHafatraHH'];
		list($numHafatra1,$numHafatra) = explode(" ", date($dateIdHafatra." z"));
		$tdId = $_POST['tdIdHH'];
		$idHafatra = $_POST['idHafatra'];

		$modele->UpdateHafatra($idHafatra,$hafatraHeader,$hafatraId,$dateIdHafatra,$numHafatra,$tdId);
		echo "ok";
	}

	if (isset($_POST['searchManaVal']) && !empty($_POST['searchManaVal'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data = $modele->GetHafatraSearch($_POST['searchManaVal']);
		if ($data) {
			foreach ($data as $key => $value) {
				list($Y,$m,$d) = explode("-", $value['hafatraDaty']);
				echo "
					<div class='col-md-3'>
			            <div class='card card-info collapsed-card'>
			              <div class='card-header'>
			                <h3 class='card-title'>
			                	".$d."-".$m."-".$Y."
			                	<br>
		                		<small>".$value['hafatraHeader']."</small>
			                </h3>

			                <div class='card-tools'>
			                  <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-plus'></i>
			                  </button>
			                </div>
			              </div>
			              <div class='card-body' style='display: none;'>
			                <h6>".nl2br($value['hafatraBody'])."</h6>
			                <small>".$value['hafatraFoot']."</small>
			                <button class='mt-3 btn btn-info btn-sm btn-block' data-target='#EditManaForm' data-toggle='modal' onclick='EditMana(".$value['idHafatra'].")'><i class='fa fa-edit'></i></button>
			              </div>
			            </div>
		          	</div>
				";
			}
		}
	}

	if (isset($_POST['listMana'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data = $modele->GetHafatra();
		if ($data) {
			foreach ($data as $key => $value) {
				list($Y,$m,$d) = explode("-", $value['hafatraDaty']);
				echo "
					<div class='col-md-3'>
			            <div class='card card-info collapsed-card'>
			              <div class='card-header'>
			                <h3 class='card-title'>
			                	".$d."-".$m."-".$Y."
			                	<br>
		                		<small>".$value['hafatraHeader']."</small>
			                </h3>

			                <div class='card-tools'>
			                  <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-plus'></i>
			                  </button>
			                </div>
			              </div>
			              <div class='card-body' style='display: none;'>
			                <h6>".nl2br($value['hafatraBody'])."</h6>
			                <small>".$value['hafatraFoot']."</small>
			                <button class='mt-3 btn btn-info btn-sm btn-block' data-target='#EditManaForm' data-toggle='modal' onclick='EditMana(".$value['idHafatra'].")'><i class='fa fa-edit'></i></button>
			              </div>
			            </div>
		          	</div>
				";
			}
		}
	}

	if (isset($_POST['listManaPDF']) && isset($_POST['moisChoice']) && !empty($_POST['moisChoice'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data = $modele->GetHafatra();
		if ($data) {
			$moisAff = $modele->GetMois($_POST['moisChoice']);
			echo "
				<div class='container row'>
					<div class='col-md-12 text-left'>
						<h3 align='left'><button class='btn btn-info' onclick=\"PDFMANA('".date("Y")."-MANA')\" >PDF <i class='fas fa-file-pdf'></i></button></h3>
					</div>
				</div>
				<div class='container container' id='pdfmanamilayeuh'>
					<div class='mt-3'>
						<div class='d-flex justify-content-center align-items-center text-center'>
	          				<img src='data/logo.png' width='100' height='100' class='img-circle' alt='FLM105' style='opacity: .8' >
							<div class='ml-5 mr-5'>
					          <h5 class='text-dark'>FIANGONANA LOTERANA MALAGASY</h5>
					          <h5 class='text-dark'>SYNODAM-PARITANY ANTANANARIVO</h5>
					          <h5 class='text-dark'>FILEOVANA AMBOHIBAO</h5>
					          <h5 class='text-dark'>FITANDREMANA TOBY BETESDA AMBOHIBAO</h5>
					          <h3 class='mt-3 text-dark'>FLM AMBOHIDRATRIMO</h3>
					          <h6 class='mb-1 text-secondary'>“ fa izay mitady ny voninahitr’Izay naniraka azy no marina “ Jaona 7 : 18b</h6>
							</div>
	          				<img src='data/logo.png' width='100' height='100' class='img-circle' alt='FLM105' style='opacity: .8' >
						</div>
					</div>
					<hr>

					<div class='container text-center'>
						<h5 class='mt-4 text-dark'>DEPARTEMANTA AMBOHIDRATRIMO</h5>
						<h5 class='text-muted'>MANA ".strtoupper($moisAff)."</h5>
					</div>

					<hr>

					<div class='mt-5 row'>
			";
						foreach ($data as $key => $value) {
							list($Y,$m,$d) = explode("-", $value['hafatraDaty']);
							if ($_POST['moisChoice'] == $m) {
								echo "
									<div class='col-md-3'>
							            <div class='card card-info collapsed-card'>
							              <div class='card-header'>
							                <h3 class='card-title'>
							                	".$d."-".$m."-".$Y."
							                	<br>
						                		<small>".$value['hafatraHeader']."</small>
							                </h3>
							              </div>
							              <div class='card-body' style='display: block;'>
							                <h6>".nl2br($value['hafatraBody'])."</h6>
							                <small>".$value['hafatraFoot']."</small>
							              </div>
							            </div>
						          	</div>
								";
							}
						}
			echo "
		          	</div>

		          	<hr>
					<div class='row'>
						<div class='col-sm-4 text-center'>
						</div>
						<div class='col-sm-8 text-right'>
							<h6 class='mt-0 mb-0 mr-2 text-dark'>DEPARTEMANTA SERASERA/FIRAIKETANA</h6>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 34 24 877 19</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 32 67 925 59</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Email : flm.ambohidratrimo.105@gmail.com</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Facebook : FLM AMBOHIDRATRIMO</small><br>
						</div>
					</div>
				</div>
			";
		}
	}

	if (isset($_POST['editM']) && !empty($_POST['editM'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data = $modele->GetHafatraId($_POST['editM']);
		if ($data) {
			echo "
				<h5 class='text-left'><i class='fa fa-envelope-open mr-2'></i> Hanitsy</h5>
                <input type='text' name='hafatraHeaderHH' id='hafatraHeaderHH' value='".$data['hafatraHeader']."' class='form-control mt-2 mb-2'>
                <textarea class='form-control mt-2 mb-2' name='hafatraIdHH' id='hafatraIdHH' placeholder='".$data['hafatraBody']."' style='height: 199px;'></textarea>
                <input type='date' name='dateIdHafatraHH' id='dateIdHafatraHH' class='form-control mt-2 mb-2' value='".$data['hafatraDaty']."'>
                <input type='text' name='tdIdHH' id='tdIdHH' value='".$data['hafatraFoot']."' class='form-control mt-2 mb-2'>
                
              	<div class='row'>
	              	<div class='col-sm-6'>
	            		<button class='btn btn-info btn-block btn-sm' onclick='EditHafatraFinal(this,".$data['idHafatra'].")'>Ahitsy</button>
	                </div>
	              	<div class='col-sm-6'>
	            		<button class='btn btn-danger btn-block btn-sm' onclick='DeleteHafatra(".$data['idHafatra'].")'>Amafa</button>
	                </div>
                </div>
                <small class='text-danger' id='resErreurHafatraHH'></small>
			";
		}
	}

	if (isset($_POST['editMdelete']) && !empty($_POST['editMdelete'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data = $modele->GetHafatraId($_POST['editMdelete']);
		if ($data) {
			$modele->DeleteHafatra($_POST['editMdelete']);
			echo "ok";
		}
	}

	if (isset($_POST['listManaMois'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data = $modele->GetHafatra();
		$thisMonth = date("m");
		if ($data) {
			foreach ($data as $key => $value) {
				list($Y,$m,$d) = explode("-", $value['hafatraDaty']);
				if ($thisMonth == $m) {
					echo "
						<div class='col-md-3'>
				            <div class='card card-info collapsed-card'>
				              <div class='card-header'>
				                <h3 class='card-title'>
				                	".$d."-".$m."-".$Y."
			                		<br>
			                		<small>".$value['hafatraHeader']."</small>
				                </h3>

				                <div class='card-tools'>
				                  <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-plus'></i>
				                  </button>
				                </div>
				              </div>
				              <div class='card-body' style='display: none;'>
			                	<h6>".nl2br($value['hafatraBody'])."</h6>
								<small>".$value['hafatraFoot']."</small>
			                	<button class='mt-3 btn btn-info btn-sm btn-block' data-target='#EditManaForm' data-toggle='modal' onclick='EditMana(".$value['idHafatra'].")'><i class='fa fa-edit'></i></button>
				              </div>
				            </div>
			          	</div>
					";
				}
			}
		}
	}

	if (isset($_POST['listManaAnio'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data = $modele->GetHafatra();
		$today = date("d/m/Y");
		if ($data) {
			foreach ($data as $key => $value) {
				list($Y,$m,$d) = explode("-", $value['hafatraDaty']);
				if ($today == $d."/".$m."/".$Y) {
					echo "
						<div class='col-md-3'>
				            <div class='card card-info collapsed-card'>
				              <div class='card-header'>
				                <h3 class='card-title'>
				                	".$d."-".$m."-".$Y."
			                		<br>
			                		<small>".$value['hafatraHeader']."</small>
				                </h3>

				                <div class='card-tools'>
				                  <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-plus'></i>
				                  </button>
				                </div>
				              </div>
				              <div class='card-body' style='display: none;'>
			                	<h6>".nl2br($value['hafatraBody'])."</h6>
								<small>".$value['hafatraFoot']."</small>
			                	<button class='mt-3 btn btn-info btn-sm btn-block' data-target='#EditManaForm' data-toggle='modal' onclick='EditMana(".$value['idHafatra'].")'><i class='fa fa-edit'></i></button>
				              </div>
				            </div>
			          	</div>
					";
				}
			}
		}
	}

	if (isset($_POST['numberListGo'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$donne = $modele->GetUserAllDistingue();
		if ($donne) {
			foreach ($donne as $key => $value) {
				if ($value['imageF']!=NULL || $value['imageF']!="") {
					$url = "data/user/".$value['imageF'];
				}else{
					$url = "data/user/profile.png";
				}
				if ($value['TelephoneF']) {
					echo "
						<div class='col-md-3'>
				            <div class='card card-info collapsed-card'>
				              <div class='card-header'>
				                <h3 class='card-title'> <i class='fa fa-phone mr-3'></i> ".$value['TelephoneF']."</h3>

				                <div class='card-tools'>
				                  <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-plus'></i>
				                  </button>
				                </div>
				              </div>
				              <div class='card-body' style='display: none;'>
				                <div class='card card-widget widget-user'>
				                  <div class='widget-user-header bg-info'>
				                    <h3 class='widget-user-username'>".$value['nomF']."</h3>
				                  </div>
				                  <div class='widget-user-image'>
				                    <img data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");' class='img-circle elevation-2' src='".$url."' alt='".$value['nomF']."'>
				                  </div>
				                </div>
				              </div>
				            </div>
			          	</div>
					";
				}
			}
		}
	}

	if (isset($_POST['viderMana'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$modele->TruncateMana();
		echo "ok";
	}

	if (isset($_POST['donnedetailleBirao'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$donnedetailleBirao = $_POST['donnedetailleBirao'];

		if ($donnedetailleBirao=="birao") {
			$donne = $modele->GetUserBirao();
		}else{
			$donne = $modele->GetUserFanorenana();
		}

		if ($donne) {
			foreach ($donne as $key => $value) {
				if ($donnedetailleBirao=="birao") {
					$place = $value['PlaceB'];
				}else{
					$place = $value['PlaceF'];
				}

				if ($value['imageF']!=NULL || $value['imageF']!="") {
					$url = "data/user/".$value['imageF'];
				}else{
					$url = "data/user/profile.png";
				}

				if ($value['EmailF']) {
					$email = "<p class='text-muted text-sm'><b>Email: </b> ".$value['EmailF']." </p>";
				}else{
					$email = "";
				}
				if ($value['FacebookF']) {
					$facebook = "<p class='text-muted text-sm'><b>Facebook: </b> ".$value['FacebookF']." </p>";
				}else{
					$facebook = "";
				}

				list($inscri) =explode("-", $value['inscriptionF']);
				echo "
					<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
		              <div class='card bg-light'>
				        <div class='card-header text-muted border-bottom-0'>
					        <span class='badge badge-info'>
			                  ".$place."
			                </span>
		                </div>
		                <div class='card-header text-muted border-bottom-0'></div>
		                <div class='card-body pt-0'>
		                  <div class='row'>
		                    <div class='col-7'>
		                      <h2 class='lead'><b>".$value['nomF']." ".$value['prenomF']."</b></h2>
		                      <hr>
		                      <ul class='ml-4 mb-0 fa-ul text-muted'>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-map-marker'></i></span> Faritra ".$value['Faritra']."</li>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> ".$value['AdresseF']."</li>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> ".$value['TelephoneF']."</li>
		                      </ul><hr>
		                      <p class='text-muted text-sm'><b>Fidirana : </b> ".$inscri." </p>
		                      ".$email."
		                      ".$facebook."
		                    </div>
		                    <div class='col-5 text-center'>
		                      <img src='".$url."' alt='".$value['prenomF']."' class='img-circle w-100' style='height:200px, object-fit: contain;'>
		                    </div>
		                  </div>
		                </div>
		                <div class='card-footer'>
		                  <div class='text-right'>
		                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>
		                      <i class='fas fa-eye'></i> HIJERY 
		                    </a>
		                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$value['idF'].");'>
		                      <i class='fas fa-edit'></i> HANITSY 
		                    </a>
		                    <a class='btn btn-sm btn-info'>
		                      <i class='fas fa-trash'></i> FAFANA 
		                    </a>
		                  </div>
		                </div>
		              </div>
		            </div>
				";
			}
		}
	}

	if (isset($_POST['donne'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$donne = $modele->GetUser6();

		if ($donne) {
			foreach ($donne as $key => $value) {

				if ($value['imageF']!=NULL || $value['imageF']!="") {
					$url = "data/user/".$value['imageF'];
				}else{
					$url = "data/user/profile.png";
				}

				if ($value['EmailF']) {
					$email = "<p class='text-muted text-sm'><b>Email: </b> ".$value['EmailF']." </p>";
				}else{
					$email = "";
				}
				if ($value['FacebookF']) {
					$facebook = "<p class='text-muted text-sm'><b>Facebook: </b> ".$value['FacebookF']." </p>";
				}else{
					$facebook = "";
				}

				list($inscri) =explode("-", $value['inscriptionF']);
				echo "
					<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
		              <div class='card bg-light'>
		                <div class='card-header text-muted border-bottom-0'></div>
		                <div class='card-body pt-0'>
		                  <div class='row'>
		                    <div class='col-7'>
		                      <h2 class='lead'><b>".$value['nomF']." ".$value['prenomF']."</b></h2>
		                      <hr>
		                      <ul class='ml-4 mb-0 fa-ul text-muted'>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-map-marker'></i></span> Faritra ".$value['Faritra']."</li>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> ".$value['AdresseF']."</li>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> ".$value['TelephoneF']."</li>
		                      </ul><hr>
		                      <p class='text-muted text-sm'><b>Fidirana : </b> ".$inscri." </p>
		                      ".$email."
		                      ".$facebook."
		                    </div>
		                    <div class='col-5 text-center'>
		                      <img src='".$url."' alt='".$value['prenomF']."' class='img-circle w-100' style='height:200px, object-fit: contain;'>
		                    </div>
		                  </div>
		                </div>
		                <div class='card-footer'>
		                  <div class='text-right'>
		                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>
		                      <i class='fas fa-eye'></i> HIJERY 
		                    </a>
		                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$value['idF'].");'>
		                      <i class='fas fa-edit'></i> HANITSY 
		                    </a>
		                    <a class='btn btn-sm btn-info'>
		                      <i class='fas fa-trash'></i> FAFANA 
		                    </a>
		                  </div>
		                </div>
		              </div>
		            </div>
				";
			}
		}
	}

	if (isset($_POST['donneAll'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$donne = $modele->GetUserAll();

		if ($donne) {
			foreach ($donne as $key => $value) {

				if ($value['imageF']!=NULL || $value['imageF']!="") {
					$url = "data/user/".$value['imageF'];
				}else{
					$url = "data/user/profile.png";
				}

				if ($value['EmailF']) {
					$email = "<p class='text-muted text-sm'><b>Email: </b> ".$value['EmailF']." </p>";
				}else{
					$email = "";
				}
				if ($value['FacebookF']) {
					$facebook = "<p class='text-muted text-sm'><b>Facebook: </b> ".$value['FacebookF']." </p>";
				}else{
					$facebook = "";
				}

				list($inscri) =explode("-", $value['inscriptionF']);
				echo "
					<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
		              <div class='card bg-light'>
		                <div class='card-header text-muted border-bottom-0'></div>
		                <div class='card-body pt-0'>
		                  <div class='row'>
		                    <div class='col-7'>
		                      <h2 class='lead'><b>".$value['nomF']." ".$value['prenomF']."</b></h2>
		                      <hr>
		                      <ul class='ml-4 mb-0 fa-ul text-muted'>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-map-marker'></i></span> Faritra ".$value['Faritra']."</li>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> ".$value['AdresseF']."</li>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> ".$value['TelephoneF']."</li>
		                      </ul><hr>
		                      <p class='text-muted text-sm'><b>Fidirana : </b> ".$inscri." </p>
		                      ".$email."
		                      ".$facebook."
		                    </div>
		                    <div class='col-5 text-center'>
		                      <img src='".$url."' alt='user-avatar' class='img-circle w-100' style='height:200px, object-fit: contain;'>
		                    </div>
		                  </div>
		                </div>
		                <div class='card-footer'>
		                  <div class='text-right'>
		                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>
		                      <i class='fas fa-eye'></i> HIJERY 
		                    </a>
		                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$value['idF'].");'>
		                      <i class='fas fa-edit'></i> HANITSY 
		                    </a>
		                    <a class='btn btn-sm btn-info' onclick='DeleteUser(".$value['idF'].")'>
		                      <i class='fas fa-trash'></i> FAFANA 
		                    </a>
		                  </div>
		                </div>
		              </div>
		            </div>
				";
			}
		}
	}
	if (isset($_POST['donneR'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$ds = $_POST['search'];
		$s = $_POST['sexe'];
		$t = $_POST['t'];
		$f = $_POST['faritra'];
		empty($s) ? $ss = "ko" : $ss = $s;
		empty($t) ? $tt = "ko" : $tt = $t;
		empty($f) ? $ff = "ko" : $ff = $f;
		$donne = $modele->GetUserSearch($ds,$tt,$ss,$ff);

		if ($donne) {
			foreach ($donne as $key => $value) {

				if ($value['imageF']!=NULL || $value['imageF']!="") {
					$url = "data/user/".$value['imageF'];
				}else{
					$url = "data/user/profile.png";
				}

				if ($value['EmailF']) {
					$email = "<p class='text-muted text-sm'><b>Email: </b> ".$value['EmailF']." </p>";
				}else{
					$email = "";
				}
				if ($value['FacebookF']) {
					$facebook = "<p class='text-muted text-sm'><b>Facebook: </b> ".$value['FacebookF']." </p>";
				}else{
					$facebook = "";
				}

				list($inscri) =explode("-", $value['inscriptionF']);
				$affchie = "
					<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
		              <div class='card bg-light'>
		                <div class='card-header text-muted border-bottom-0'></div>
		                <div class='card-body pt-0'>
		                  <div class='row'>
		                    <div class='col-7'>
		                      <h2 class='lead'><b>".$value['nomF']." ".$value['prenomF']."</b></h2>
		                      <hr>
		                      <ul class='ml-4 mb-0 fa-ul text-muted'>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-map-marker'></i></span> Faritra ".$value['Faritra']."</li>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> ".$value['AdresseF']."</li>
		                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> ".$value['TelephoneF']."</li>
		                      </ul><hr>
		                      <p class='text-muted text-sm'><b>Fidirana : </b> ".$inscri." </p>
		                      ".$email."
		                      ".$facebook."
		                    </div>
		                    <div class='col-5 text-center'>
		                      <img src='".$url."' alt='user-avatar' class='img-circle w-100' style='height:200px; object-fit: contain;'>
		                    </div>
		                  </div>
		                </div>
		                <div class='card-footer'>
		                  <div class='text-right'>
		                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>
		                      <i class='fas fa-eye'></i> HIJERY 
		                    </a>
		                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$value['idF'].");'>
		                      <i class='fas fa-edit'></i> HANITSY 
		                    </a>
		                    <a class='btn btn-sm btn-info' onclick='DeleteUser(".$value['idF'].")'>
		                      <i class='fas fa-trash'></i> FAFANA 
		                    </a>
		                  </div>
		                </div>
		              </div>
		            </div>
				";
				echo $affchie;
			}
		}
	}
	if (isset($_POST['donneDelUser'])) {
		include '../../modele/modele.membre.php';
		include '../../modele/modele.notif.php';
		include '../../config/connex.php';
		$modeleNotif = new Notification();
		$modele = new Membre();

		$idAdmin = $_POST['idAdmin'];
		$idUser = $_POST['idUser'];
		
		$modele->DelUser($idUser);
		
		$descN = "SUPPRESSION MEMBRE";
		$modeleNotif->AddNotif($idAdmin,$descN);
		echo "ok";
	}

	if (isset($_POST['donneRS'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$sampana = $_POST['donneRS'];
		$ds = $_POST['search'];
		$s = $_POST['s'];
		$t = $_POST['t'];
		empty($s) ? $ss = "ko" : $ss = $s;
		empty($t) ? $tt = "ko" : $tt = $t;
		$donne = $modele->GetUserSearchSampana($sampana,$ds,$tt,$ss);

		if ($donne) {
			foreach ($donne as $key => $value) {
				if ($sampana=="FDL") {
					$place = $value['Place1'];
				}elseif ($sampana=="FBL"){
					$place = $value['Place2'];
				}elseif ($sampana=="SALOMA"){
					$place = $value['Place3'];
				}elseif ($sampana=="KTLM"){
					$place = $value['Place4'];
				}elseif ($sampana=="TMM"){
					$place = $value['Place5'];
				}elseif ($sampana=="SKOTO"){
					$place = $value['Place6'];
				}elseif ($sampana=="DIAKONA"){
					$place = $value['Place7'];
				}elseif ($sampana=="VLM"){
					$place = $value['Place8'];
				}elseif ($sampana=="FIFIL"){
					$place = $value['Place14'];
				}

				if ($value['imageF']!=NULL || $value['imageF']!="") {
					$url = "data/user/".$value['imageF'];
				}else{
					$url = "data/user/profile.png";
				}

				if ($value['EmailF']) {
					$email = "<p class='text-muted text-sm'><b>Email: </b> ".$value['EmailF']." </p>";
				}else{
					$email = "";
				}
				if ($value['FacebookF']) {
					$facebook = "<p class='text-muted text-sm'><b>Facebook: </b> ".$value['FacebookF']." </p>";
				}else{
					$facebook = "";
				}

				list($inscri) =explode("-", $value['inscriptionF']);
				if ($place != "KO") {
					echo "
						<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
			              <div class='card bg-light'>
			                <div class='card-header text-muted'>
			                	<span class='badge badge-info'>
				                  ".$place."
				                </span>
			                </div>
			                <div class='card-body pt-0'>
			                  <div class='row'>
			                    <div class='col-7'>
			                      <h2 class='lead'><b>".$value['nomF']." ".$value['prenomF']."</b></h2>
			                      <hr>
			                      <ul class='ml-4 mb-0 fa-ul text-muted'>
			                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-map-marker'></i></span> Faritra ".$value['Faritra']."</li>
			                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> ".$value['AdresseF']."</li>
			                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> ".$value['TelephoneF']."</li>
			                      </ul><hr>
			                      <p class='text-muted text-sm'><b>Fidirana : </b> ".$inscri." </p>
			                      ".$email."
			                      ".$facebook."
			                    </div>
			                    <div class='col-5 text-center'>
			                      <img src='".$url."' alt='user-avatar' class='img-circle w-100' style='height:200px; object-fit: contain;'>
			                    </div>
			                  </div>
			                </div>
			                <div class='card-footer'>
			                  <div class='text-right'>
			                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>
			                      <i class='fas fa-eye'></i> HIJERY 
			                    </a>
			                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$value['idF'].");'>
			                      <i class='fas fa-edit'></i> HANITSY 
			                    </a>
			                    <a class='btn btn-sm btn-info' onclick='DeleteUser(".$value['idF'].")'>
			                      <i class='fas fa-trash'></i> FAFANA 
			                    </a>
			                  </div>
			                </div>
			              </div>
			            </div>
					";
				}
			}
		}
	}
	if (isset($_POST['donneRD'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$depart = $_POST['donneRD'];
		$ds = $_POST['search'];
		$s = $_POST['s'];
		$t = $_POST['t'];
		empty($s) ? $ss = "ko" : $ss = $s;
		empty($t) ? $tt = "ko" : $tt = $t;
		$donne = $modele->GetUserSearchSampana($depart,$ds,$tt,$ss);

		if ($donne) {
			foreach ($donne as $key => $value) {
				if ($depart=="DSERA") {
					$place = $value['Place9'];
				}elseif ($depart=="DFITAOVANA"){
					$place = $value['Place11'];
				}elseif ($depart=="DMOZIKA"){
					$place = $value['Place12'];
				}elseif ($depart=="DFIRAKETANA"){
					$place = $value['Place13'];
				}

				if ($value['imageF']!=NULL || $value['imageF']!="") {
					$url = "data/user/".$value['imageF'];
				}else{
					$url = "data/user/profile.png";
				}

				if ($value['EmailF']) {
					$email = "<p class='text-muted text-sm'><b>Email: </b> ".$value['EmailF']." </p>";
				}else{
					$email = "";
				}
				if ($value['FacebookF']) {
					$facebook = "<p class='text-muted text-sm'><b>Facebook: </b> ".$value['FacebookF']." </p>";
				}else{
					$facebook = "";
				}

				list($inscri) =explode("-", $value['inscriptionF']);
				if ($place != "KO") {
					echo "
						<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
			              <div class='card bg-light'>
			                <div class='card-header text-muted border-bottom-0'>
			                	<span class='badge badge-info'>
				                  ".$place."
				                </span>
			                </div>
			                <div class='card-body pt-0'>
			                  <div class='row'>
			                    <div class='col-7'>
			                      <h2 class='lead'><b>".$value['nomF']." ".$value['prenomF']."</b></h2>
			                      <hr>
			                      <ul class='ml-4 mb-0 fa-ul text-muted'>
			                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-map-marker'></i></span> Faritra ".$value['Faritra']."</li>
			                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> ".$value['AdresseF']."</li>
			                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> ".$value['TelephoneF']."</li>
			                      </ul><hr>
			                      <p class='text-muted text-sm'><b>Fidirana : </b> ".$inscri." </p>
			                      ".$email."
			                      ".$facebook."
			                    </div>
			                    <div class='col-5 text-center'>
			                      <img src='".$url."' alt='user-avatar' class='img-circle w-100' style='height:200px; object-fit: contain;'>
			                    </div>
			                  </div>
			                </div>
			                <div class='card-footer'>
			                  <div class='text-right'>
			                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>
			                      <i class='fas fa-eye'></i> HIJERY 
			                    </a>
			                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$value['idF'].");'>
			                      <i class='fas fa-edit'></i> HANITSY 
			                    </a>
			                    <a class='btn btn-sm btn-info' onclick='DeleteUser(".$value['idF'].")'>
			                      <i class='fas fa-trash'></i> FAFANA 
			                    </a>
			                  </div>
			                </div>
			              </div>
			            </div>
					";
				}
			}
		}
	}

	if (isset($_POST['donneDel'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		include '../../modele/modele.notif.php';
		$modele = new Membre();
		$modeleNotif = new Notification();

		$type = $_POST['donneDel'];
		$id = $_POST['idUser'];
		$idAdmin = $_POST['idAdmin'];
		
		$modele->DelSomething($id,$type);
		
		$descN = "MODIFICATION";
		$modeleNotif->AddNotif($idAdmin,$descN);
		
		echo "ok";
	}


	if (isset($_POST['donneModif'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$id = $_POST['idUser'];
		$idAdmin = $_POST['idAdmin'];
		$donne = $modele->GetUserId($id);
		$donneB = $modele->GetUserSuiteId($id);
		$donneS = $modele->GetUserDescId($id);

		if ($donneB['Batisa']=="OK") {
			$batisa = " <input type='checkbox' name='batisaModif' checked />
						<label>Batisa (Vita)</label>";
		}else{
			$batisa = "<input type='checkbox' name='batisaModif' />
						<label>Batisa</label>";
		}
		if ($donneB['Mpandray']=="OK") {
			$mpandray = "<input type='checkbox' name='MpandrayModif' checked />
							<label>Mpandray (Vita)</label>";
		}else{
			$mpandray = "<input type='checkbox' name='MpandrayModif' />
							<label>Mpandray</label>";
		}
		if ($donneB['Soratra']=="OK") {
			$soratra = "<input type='checkbox' name='soratraModif' checked />
							<label>Soratra (Vita)</label>";
		}else{
			$soratra = "<input type='checkbox' name='soratraModif' />
							<label>Soratra</label>";
		}
		if ($donneB['Mpiandry']=="OK") {
			$mpiandry = "<input type='checkbox' name='mpiandryModif' checked />
							<label>Mpiandry (Vita)</label>";
		}else{
			$mpiandry = "<input type='checkbox' name='mpiandryModif' />
							<label>Mpiandry</label>";
		}
		if ($donneB['Mariazy']=="OK") {
			$maria = "<input type='checkbox' name='mariaModif' checked />
							<label>Mariazy (Vita)</label>";
		}else{
			$maria = "<input type='checkbox' name='mariaModif' />
							<label>Mariazy</label>";
		}

		if ($donneS['BIRAO']=="OK") {
			$birao = "
				<input type='checkbox' id='biraModif' name='biraModif' checked>
				    <label for='biraModif'>Birao</label>
				    <select class='form-control' id='biraTModif' name='biraTModif'>
					    <option selected>".$donneS['PlaceB']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$birao = "
				<input type='checkbox' id='biraModif' name='biraModif' data-toggle='collapse' href='#biraTModif'>
				    <label for='biraModif' data-toggle='collapse' href='#biraTModif'>Birao</label>
				    <select class='form-control collapse' id='biraTModif' name='biraTModif'>
				    <option selected disabled>Toerana</option>
				    <option>Mambra</option>
				    <option>Filoha</option>
				    <option>Filoha Lefitra</option>
				    <option>Mpitahiry vola</option>
				    <option>Secretaire 1</option>
				    <option>Secretaire 2</option>
				    <option>Komity</option>
				    </select>
			";
		}

		if ($donneS['FANORENANA']=="OK") {
			$fanorenana = "
				<input type='checkbox' id='faaaModif' name='faaaModif' checked>
				    <label for='faaaModif'>Fanorenana</label>
				    <select class='form-control' id='faaaTModif' name='faaaTModif'>
					    <option selected>".$donneS['PlaceF']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$fanorenana = "
				<input type='checkbox' id='faaaModif' name='faaaModif' data-toggle='collapse' href='#faaaTModif'>
				                <label for='faaaModif' data-toggle='collapse' href='#faaaTModif'>Fanorenana</label>
				                <select class='form-control collapse' id='faaaTModif' name='faaaTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['FDL']=="OK") {
			$fdl = "
				<input type='checkbox' id='fdlModif' name='fdlModif' checked>
				    <label for='fdlModif'>FDL</label>
				    <select class='form-control' id='fdlTModif' name='fdlTModif'>
					    <option selected>".$donneS['Place1']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$fdl = "
				<input type='checkbox' id='fdlModif' name='fdlModif' data-toggle='collapse' href='#fdlTModif'>
				                <label for='fdlModif' data-toggle='collapse' href='#fdlTModif'>Fikambanan-Dehilahy Loterana</label>
				                <select class='form-control collapse' id='fdlTModif' name='fdlTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['FBL']=="OK") {
			$fbl = "
				<input type='checkbox' id='fblModif' name='fblModif' checked>
				    <label for='fblModif'>Fikambanan-Behivahy Loterana</label>
				    <select class='form-control' id='fblTModif' name='fblTModif'>
					    <option selected>".$donneS['Place2']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$fbl = "
				 <input type='checkbox' id='fblModif' name='fblModif' data-toggle='collapse' href='#fblTModif'>
				                <label for='fblModif' data-toggle='collapse' href='#fblTModif'>Fikambanan-Behivahy Loterana</label>
				                <select class='form-control collapse' id='fblTModif' name='fblTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['SALOMA']=="OK") {
			$saloma = "
				<input type='checkbox' id='saModif' name='saModif' checked>
				    <label for='saModif'>Sekoly Alahady Loterana MAlagasy</label>
				    <select class='form-control' id='saTModif' name='saTModif'>
					    <option selected>".$donneS['Place3']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$saloma = "
				 <input type='checkbox' id='saModif' name='saModif' data-toggle='collapse' href='#saTModif'>
				                <label for='saModif' data-toggle='collapse' href='#saTModif'>Sekoly Alahady Loterana MAlagasy</label>
				                <select class='form-control collapse' id='saTModif' name='saTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['KTLM']=="OK") {
			$ktml = "
				<input type='checkbox' id='ktModif' name='ktModif' checked>
				    <label for='ktModif'>Kristiana Tanora Loterana Malagasy</label>
				    <select class='form-control' id='ktTModif' name='ktTModif'>
					    <option selected>".$donneS['Place4']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$ktml = "
				 <input type='checkbox' id='ktModif' name='ktModif' data-toggle='collapse' href='#ktTModif'>
				                <label for='ktModif' data-toggle='collapse' href='#ktTModif'>Kristiana Tanora Loterana Malagasy</label>
				                <select class='form-control collapse' id='ktTModif' name='ktTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['TMM']=="OK") {
			$tmm = "
				<input type='checkbox' id='tmmModif' name='tmmModif' checked>
				    <label for='tmmModif'>Tafika Masina Maharitra</label>
				    <select class='form-control' id='tmmTModif' name='tmmTModif'>
					    <option selected>".$donneS['Place5']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$tmm = "
				 <input type='checkbox' id='tmmModif' name='tmmModif' data-toggle='collapse' href='#tmmTModif'>
				                <label for='tmmModif' data-toggle='collapse' href='#tmmTModif'>Tafika Masina Maharitra</label>
				                <select class='form-control collapse' id='tmmTModif' name='tmmTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['SKOTO']=="OK") {
			$skoto = "
				<input type='checkbox' id='skotoModif' name='skotoModif' checked>
				    <label for='skotoModif'>SKOTO</label>
				    <select class='form-control' id='skotoTModif' name='skotoTModif'>
					    <option selected>".$donneS['Place6']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$skoto = "
				 <input type='checkbox' id='skotoModif' name='skotoModif' data-toggle='collapse' href='#skotoTModif'>
				                <label for='skotoModif' data-toggle='collapse' href='#skotoTModif'>SKOTO</label>
				                <select class='form-control collapse' id='skotoTModif' name='skotoTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['DIAKONA']=="OK") {
			$diakona = "
				<input type='checkbox' id='diaModif' name='diaModif' checked>
				    <label for='diaModif'>DIAKONA</label>
				    <select class='form-control' id='diaTModif' name='diaTModif'>
					    <option selected>".$donneS['Place7']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$diakona = "
				 <input type='checkbox' id='diaModif' name='diaModif' data-toggle='collapse' href='#diaTModif'>
				                <label for='diaModif' data-toggle='collapse' href='#diaTModif'>DIAKONA</label>
				                <select class='form-control collapse' id='diaTModif' name='diaTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['VLM']=="OK") {
			$vlm = "
				<input type='checkbox' id='vlmModif' name='vlmModif' checked>
				    <label for='vlmModif'>Vokovokomanga Loterana Malagasy</label>
				    <select class='form-control' id='vlmTModif' name='vlmTModif'>
					    <option selected>".$donneS['Place8']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$vlm = "
				 <input type='checkbox' id='vlmModif' name='vlmModif' data-toggle='collapse' href='#vlmTModif'>
				                <label for='vlmModif' data-toggle='collapse' href='#vlmTModif'>Vokovokomanga Loterana Malagasy</label>
				                <select class='form-control collapse' id='vlmTModif' name='vlmTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['DMOZIKA']=="OK") {
			$dh = "
				<input type='checkbox' id='dhModif' name='dhModif' checked>
				    <label for='dhModif'>Departemanta Hira sy Mozika</label>
				    <select class='form-control' id='dhTModif' name='dhTModif'>
					    <option selected>".$donneS['Place12']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$dh = "
				 <input type='checkbox' id='dhModif' name='dhModif' data-toggle='collapse' href='#dhTModif'>
				                <label for='dhModif' data-toggle='collapse' href='#dhTModif'>Departemanta Hira sy Mozika</label>
				                <select class='form-control collapse' id='dhTModif' name='dhTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['DSERA']=="OK") {
			$ds = "
				<input type='checkbox' id='dsModif' name='dsModif' checked>
				    <label for='dsModif'>Departemanta SERASERA</label>
				    <select class='form-control' id='dsTModif' name='dsTModif'>
					    <option selected>".$donneS['Place9']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$ds = "
				 <input type='checkbox' id='dsModif' name='dsModif' data-toggle='collapse' href='#dsTModif'>
				                <label for='dsModif' data-toggle='collapse' href='#dsTModif'>Departemanta SERASERA</label>
				                <select class='form-control collapse' id='dsTModif' name='dsTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['DFITAOVANA']=="OK") {
			$df = "
				<input type='checkbox' id='dfModif' name='dfModif' checked>
				    <label for='dfModif'>Departemanta Fitaovana</label>
				    <select class='form-control' id='dfTModif' name='dfTModif'>
					    <option selected>".$donneS['Place11']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$df = "
				 <input type='checkbox' id='dfModif' name='dfModif' data-toggle='collapse' href='#dfTModif'>
				                <label for='dfModif' data-toggle='collapse' href='#dfTModif'>Departemanta Fitaovana</label>
				                <select class='form-control collapse' id='dfTModif' name='dfTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['DFIRAKETANA']=="OK") {
			$dfira = "
				<input type='checkbox' id='dfiModif' name='dfiModif' checked>
				    <label for='dfiModif'>Departemanta Firaketana</label>
				    <select class='form-control' id='dfiTModif' name='dfiTModif'>
					    <option selected>".$donneS['Place13']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$dfira = "
				 <input type='checkbox' id='dfiModif' name='dfiModif' data-toggle='collapse' href='#dfiTModif'>
				                <label for='dfiModif' data-toggle='collapse' href='#dfiTModif'>Departemanta Firaketana</label>
				                <select class='form-control collapse' id='dfiTModif' name='dfiTModif'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}

		if ($donneS['FIFIL']=="OK") {
			$fifil = "
				<input type='checkbox' id='fifilModif' name='fifilModif' checked>
				    <label for='fifilModif'>FIFIL</label>
				    <select class='form-control' id='fifilModifT' name='fifilModifT'>
					    <option selected>".$donneS['Place14']."</option>
					    <option>Mambra</option>
					    <option>Filoha</option>
					    <option>Filoha Lefitra</option>
					    <option>Mpitahiry vola</option>
					    <option>Secretaire 1</option>
					    <option>Secretaire 2</option>
					    <option>Komity</option>
				    </select>
			";
		}else{
			$fifil = "
				 <input type='checkbox' id='fifilModif' name='fifilModif' data-toggle='collapse' href='#fifilModifT'>
				                <label for='fifilModif' data-toggle='collapse' href='#fifilModifT'>FIFIL</label>
				                <select class='form-control collapse' id='fifilModifT' name='fifilModifT'>
				                  <option selected disabled>Toerana</option>
				                  <option>Mambra</option>
				                  <option>Filoha</option>
				                  <option>Filoha Lefitra</option>
				                  <option>Mpitahiry vola</option>
				                  <option>Secretaire 1</option>
				                  <option>Secretaire 2</option>
				                  <option>Komity</option>
				                </select>
			";
		}


		if ($donne['Toerana'] != NULL) {
			$toeranaFaritra = "
				<input type='checkbox' id='ToeranafaritraModif' name='ToeranafaritraModif' checked>
			    <label for='ToeranafaritraModif'>Toerana Faritra</label>
			    <select class='form-control' id='ToeranafaritraModifT' name='ToeranafaritraModifT'>
				    <option selected>".$donne['Toerana']."</option>
				    <option>Mambra</option>
				    <option>Filoha</option>
				    <option>Filoha Lefitra</option>
				    <option>Mpitahiry vola</option>
				    <option>Secretaire 1</option>
				    <option>Secretaire 2</option>
				    <option>Komity</option>
			    </select>
			";
		}else{
			$toeranaFaritra = "
				 <input type='checkbox' id='ToeranafaritraModif' name='ToeranafaritraModif' data-toggle='collapse' href='#ToeranafaritraModifT'>
                <label for='ToeranafaritraModif' data-toggle='collapse' href='#ToeranafaritraModifT'>Toerana Faritra</label>
                <select class='form-control collapse' id='ToeranafaritraModifT' name='ToeranafaritraModifT'>
                  <option selected disabled>Toerana</option>
                  <option>Mambra</option>
                  <option>Filoha</option>
                  <option>Filoha Lefitra</option>
                  <option>Mpitahiry vola</option>
                  <option>Secretaire 1</option>
                  <option>Secretaire 2</option>
                  <option>Komity</option>
                </select>
			";
		}



		if ($donne) {

			if ($donne['imageF']=="" || $donne['imageF']==NULL) {
				$urlModif = "<img src='data/user/profile.png' width='150' height='150' id='imageOneModifA' class='img-reponsive'>";
			}else{
				$urlModif = "<img src='data/user/".$donne['imageF']."' width='150' height='150' id='imageOneModifA' class='img-reponsive'>";
			}
		
			echo "
				<form method='POST' action='controller/controllerMembre/controller.membre.php' target='envoie' id='naddModif' enctype='multipart/form-data'>
					<input type='text' value='".$donne['idF']."' name='idUserModif' hidden />
					<input type='text' value='".$idAdmin."' name='idAdminModif' hidden />
					<div class='modal-header'>
				        <h4 class='modal-title'>FLM AMBOHIDRATRIMO (FANITSINA)</h4>
				        <button type='button' class='close' data-dismiss='modal'>×</button>
			        </div>
			        <div class='modal-body'>
						<div class='row'>
							<div class='col'>
								<h5><u>Mombamomba</u></h5><br>
								<div class='form-group'>
									<label>Anarana <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'nomF')\"></i></label>
									<input type='text' class='form-control' placeholder='".$donne['nomF']."' name='nomModif' />
				        		</div>
								<div class='form-group'>
									<label>Fanampiny <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'prenomF')\"></i></label>
									<input type='text' class='form-control' placeholder='".$donne['prenomF']."' name='prenomModif' />
				        		</div>
								<div class='form-group'>
									<label>Daty nahaterahana</label>
									<input type='date' class='form-control' placeholder='".$donne['dateNF']."' name='dateModif' />
				        		</div>
								<div class='form-group'>
									<label>".$donne['sexeF']."</label>
									<select class='form-control btn' name='sexeModif'>
										<option selected disabled>".$donne['sexeF']."</option>
										<option>Lehilahy</option>
										<option>Vehivavy</option>
									</select>
				        		</div>
				        		<div class='form-group'>
									<label>Asa andavan-andro</label>
									<input type='text' class='form-control' placeholder='".$donne['professionF']."' name='provinceModif' />
				        		</div>
			        			<div class='form-group'>
									<label>Adiresy</label>
									<input type='text' class='form-control' placeholder='".$donne['AdresseF']."' name='adresseModif' />
				        		</div>
				        		<div class='form-group'>
									<label>Faritra</label>
									<input type='number' class='form-control' placeholder='".$donne['Faritra']."' name='faritraModif' />
				        		</div>
			        		</div>
			        		<div class='col'>
			        			<h5><u>Tohiny</u></h5><br>
								<div class='form-group'>
									<label>Ray niteraka <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'pereF')\"></i></label>
									<input type='text' class='form-control' placeholder='".$donne['pereF']."' name='rayModif' />
				        		</div>
								<div class='form-group'>
									<label>Reny niteraka <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'mereF')\"></i></label>
									<input type='text' class='form-control' placeholder='".$donne['mereF']."' name='renyModif' />
				        		</div>
				        		<div class='form-group'>
									<label>Tompon'andraikitra <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'tituF')\"></i></label>
									<input type='text' class='form-control' placeholder='".$donne['tituF']."' name='tituModif' />
				        		</div>
			        		</div>
			        		<div class='col'>
			        			<h5><u>Fifandraisana</u></h5><br>
								<div class='form-group'>
									<label>Finday</label>
									<input type='tel' class='form-control' placeholder='".$donne['TelephoneF']."' name='finday1Modif' />
				        		</div>
								<div class='form-group'>
									<label>Finday faha-2 <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'Telephone2')\"></i></label>
									<input type='tel' class='form-control' placeholder='".$donne['Telephone2']."' name='finday2Modif' />
				        		</div>
				        		<div class='form-group'>
									<label>Finday faha-3 <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'Telephone3')\"></i></label>
									<input type='tel' class='form-control' placeholder='".$donne['Telephone3']."' name='finday3Modif' />
				        		</div>
				        		<div class='form-group'>
									<label>Email <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'EmailF')\"></i></label>
									<input type='email' class='form-control' placeholder='".$donne['EmailF']."' name='EmailModif' />
				        		</div>
				        		<div class='form-group'>
									<label>Facebook <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'FacebookF')\"></i></label>
									<input type='text' class='form-control' placeholder='".$donne['FacebookF']."' name='fbModif' />
				        		</div>
			        		</div>
			        	</div>
			        	<hr>
			        	<div class='row'>
							<div class='col'>
			        			<h5><u>Maha kristiana</u></h5><br>
								<div class='form-group'>
									".$batisa."
				        		</div>
				        		<div class='form-group'>
									".$mpandray."
				        		</div>
				        		<div class='form-group'>
									".$mpiandry."
				        		</div>
				        		<div class='form-group'>
									".$soratra."
				        		</div>
				        		<div class='form-group'>
									".$maria."
				        		</div>
			        		</div>
			        		
			        		<div class='col'>
			        			<h5><u>Andraikitra</u></h5><br>
			        			<div class='form-group'>
					                ".$birao."
					             </div>
					            <div class='form-group'>
					                ".$fanorenana."
					              </div>
					              <div class='form-group'>
					                ".$fdl."
					              </div>
					              <div class='form-group'>
					               ".$fbl."
					              </div>
					              <div class='form-group'>
					                ".$saloma."
					              </div>
					              <div class='form-group'>
					                ".$ktml."
					              </div>
					              <div class='form-group'>
					                ".$tmm."
					              </div>
					              <div class='form-group'>
					                ".$fifil."
					              </div>
					              <div class='form-group'>
					                ".$skoto."
					              </div>
					              <div class='form-group'>
					                ".$diakona."
					              </div>
					              <div class='form-group'>
					                ".$vlm."
					              </div>
					              <div class='form-group'>
					                ".$ds."
					              </div>
					              <div class='form-group'>
					                ".$dh."
					              </div>
					              <div class='form-group'>
					                ".$df."
					              </div>
					              <div class='form-group'>
					                ".$toeranaFaritra."
					              </div>
			        		</div>
			        		<div class='col'>
			        			<h5><u>Sary</u> <i class='fas fa-trash' style='cursor:pointer;' onclick=\"DeleSomething(".$donne['idF'].",'imageF')\"></i></h5><br>
			        			<div class='row'>
							        <label for='imageModif' class='btn btn-info btn-block'>Ampiditra na Hanova</label>
							        <input type='file' name='imageModif' id='imageModif' hidden accept='.jpg,.png,.jpeg' class='inputfile' onchange=\"CheckImage(this,'imageOneModifA');\">
							    </div>
							    <div style='text-align: center;'>
							          ".$urlModif."
							    </div>
			        		</div>
			        	</div>
			        </div>
			        <div class='modal-footer'>
					    <p data-dismiss='modal' class='btn btn-info'>Ajanona</p>
					    <button type='submit' class='btn btn-info' name='modifBabe' onclick=\"alert('Miandrasa kely ... (tsindrio ny OK)')\">Havaozina ny momba azy</button>
					</div>
				</form>
			";
		}
	}



	if (isset($_POST['donnedetaille'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$id = $_POST['idUser'];
		$donne = $modele->GetUserId($id);
		$donneB = $modele->GetUserSuiteId($id);
		$donneS = $modele->GetUserDescId($id);

		if ($donne) {
			
				if ($donne['imageF']!=NULL || $donne['imageF']!="") {
					$url = "data/user/".$donne['imageF'];
				}else{
					$url = "data/user/profile.png";
				}


				$p2 = "";
				$p3 = "";
				$maill = "";
				$fb = "";
				if ($donne['Telephone2']!="" || $donne['Telephone2']!=NULL) {
					$p2 = "<li class='small'><b>Finday : </b>".$donne['Telephone2']."</li>";
				}
				if ($donne['Telephone3']!="" || $donne['Telephone3']!=NULL) {
					$p3 = "<li class='small'><b>Finday : </b>".$donne['Telephone3']."</li>";
				}
				if ($donne['EmailF']!="" || $donne['EmailF']!=NULL) {
					$maill = "<li class='small'><b>Email : </b>".$donne['EmailF']."</li>";
				}if ($donne['FacebookF']!="" || $donne['FacebookF']!=NULL) {
					$fb = "<li class='small'><b>Facebook : </b>".$donne['FacebookF']."</li>";
				}


				$btnMA = "";
				$btnB = "";
				$btnM = "";
				$btnS = "";
				$btnMp = "";
				if ($donneB['Batisa']=="OK") {
					$btnB = "<label class='badge badge-info'>Vita Batisa <i class='fas fa-check-square'></i></label>";
				}else{
					$btnB = "<label class='badge badge-info'>Tsy vita Batisa <i class='fas fa-ban'></i></label>";
				}

				if ($donneB['Mpandray']=="OK") {
					$btnM = "<label class='badge badge-info'>Mpandray Fanasan'i Tompo <i class='fas fa-check-square'></i></label>";
				}else{
					$btnM = "<label class='badge badge-info'>Tsy vita Mpandray Fanasan'i Tompo<i class='fas fa-ban'></i></label>";
				}

				if ($donneB['Mpiandry']=="OK") {
					$btnMp = "<label class='badge badge-info'>Mpiandry <i class='fas fa-check-square'></i></label>";
				}else{
					$btnMp = "<label class='badge badge-info'>Tsy mbola Mpiandry <i class='fas fa-ban'></i></label>";
				}

				if ($donneB['Soratra']=="OK") {
					$btnS = "<label class='badge badge-info'>Vita Soratra <i class='fas fa-check-square'></i></label>";
				}else{
					$btnS = "";
				}

				if ($donneB['Mariazy']=="OK") {
					$btnMA = "<label class='badge badge-info'>Vita Mariazy <i class='fas fa-check-square'></i></label>";
				}else{
					$btnMA = "";
				}

				$birao = "";
				$FANORENANA = "";
				$FDL = "";
				$FBL = "";
				$SALOMA = "";
				$KTLM = "";
				$TMM = "";
				$FIFIL = "";
				$SKOTO = "";
				$DIAKONA = "";
				$VLM = "";
				$DSERA = "";
				$DFITAOVANA = "";
				$DMOZIKA = "";
				$DFIRAKETANA = "";
				$FARITRA = "";

				if ($donneS['BIRAO']=="OK") {
					$birao = "<li class='list-group-item small'><b>BIRAO</b> : ".$donneS['PlaceB']."</li>";
				}
				if ($donneS['FANORENANA']=="OK") {
					$FANORENANA = "<li class='list-group-item small'><b>FANORENANA</b> : ".$donneS['PlaceF']."</li>";
				}
				if ($donneS['FDL']=="OK") {
					$FDL = "<li class='list-group-item small'><b>FDL</b> : ".$donneS['Place1']."</li>";
				}
				if ($donneS['FBL']=="OK") {
					$FBL = "<li class='list-group-item small'><b>FBL</b> : ".$donneS['Place2']."</li>";
				}
				if ($donneS['SALOMA']=="OK") {
					$SALOMA = "<li class='list-group-item small'><b>SALOMA</b> : ".$donneS['Place3']."</li>";
				}
				if ($donneS['KTLM']=="OK") {
					$KTLM = "<li class='list-group-item small'><b>KTLM</b> : ".$donneS['Place4']."</li>";
				}
				if ($donneS['TMM']=="OK") {
					$TMM = "<li class='list-group-item small'><b>TMM</b> : ".$donneS['Place5']."</li>";
				}
				if ($donneS['SKOTO']=="OK") {
					$SKOTO = "<li class='list-group-item small'><b>SKOTO</b> : ".$donneS['Place6']."</li>";
				}
				if ($donneS['FIFIL']=="OK") {
					$FIFIL = "<li class='list-group-item small'><b>FIFIL</b> : ".$donneS['Place14']."</li>";
				}
				if ($donneS['DIAKONA']=="OK") {
					$DIAKONA = "<li class='list-group-item small'><b>DIAKONA</b> : ".$donneS['Place7']."</li>";
				}
				if ($donneS['VLM']=="OK") {
					$VLM = "<li class='list-group-item small'><b>VLM</b> : ".$donneS['Place8']."</li>";
				}
				if ($donneS['DSERA']=="OK") {
					$DSERA = "<li class='list-group-item small'><b>SERASERA</b> : ".$donneS['Place9']."</li>";
				}
				if ($donneS['DFITAOVANA']=="OK") {
					$DFITAOVANA = "<li class='list-group-item small'><b>FITAOVANA</b> : ".$donneS['Place11']."</li>";
				}
				if ($donneS['DMOZIKA']=="OK") {
					$DMOZIKA = "<li class='list-group-item small'><b>HIRA SY MOZIKA</b> : ".$donneS['Place12']."</li>";
				}
				if ($donneS['DFIRAKETANA']=="OK") {
					$DFIRAKETANA = "<li class='list-group-item small'><b>FIRAKETANA</b> : ".$donneS['Place13']."</li>";
				}
				if ($donne['Toerana'] != NULL) {
					$FARITRA = "<li class='list-group-item small text-uppercase'><b>FARITRA</b> : ".$donne['Toerana']."</li>";
				}else{
					$FARITRA = "<li class='list-group-item small'><b>MAMBRA</b></li>";
				}


				if ($donne['pereF']!="" || $donne['mereF']!="" || $donne['mereF']!=NULL || $donne['pereF']!=NULL) {
					!empty($donne['pereF']) ? $p = "<li class='small'><b>Ray niteraka : </b> ".$donne['pereF']."</li>" : $p="";
					!empty($donne['mereF']) ? $m = "<li class='small'><b>Reny niteraka : </b> ".$donne['mereF']."</li>" : $m = "";
					!empty($donne['tituF']) ? $t = "<li class='small'><b>Tompon'andraikitra : </b> ".$donne['tituF']."</li>" : $t="";
					$rad = "
						<br>
						<ul class='ml-4 mb-0 fa-ul text-muted'>
							".$p."
							".$m."
							".$t."
						</ul>
					";
				}else{
					$rad = "";
				}

				list($Yu, $Mu, $Du) = explode("-", $donne['dateNF']);
				if ($Yu == date("Y") && $Mu == date("m")) {
					$afficheDate = "TSY FANTATRA";
				}else{
					$afficheDate = $Yu."-".$Mu."-".$Du;
				}

				$imgUrl = "
                    <div class='position-relative'>
                      <img src='".$url."' alt='".$donne['prenomF']."' class='img-responsive img-circle w-100' style='height:400px;object-fit: contain;'>
                      <div class='ribbon-wrapper ribbon-lg'>
                        <div class='ribbon bg-info text-lg'>
                          ".substr($donne['prenomF'], 0, 10)."
                        </div>
                      </div>
                    </div>
				";

				echo "
									<div class='modal-header'>
		                              <h4 class='modal-title'>FLM AMBOHIDRATRIMO</h4>
		                              <button type='button' class='close' data-dismiss='modal'>×</button>
		                            </div>
		                            <div class='modal-body'>
		                                <div class='row'>
		                                  <div class='col-7'>
								            <small class='small'><b>Mombamomba</b></small><hr>
		                                  	<div class='row'>
		                                  		<div class='col-7'>
								                    <h6 class='small'><b>".$donne['sexeF']." - ".$modele->CalculeDAge($donne['dateNF'])."</b> </h6>
				                                    <ul class='ml-4 mb-0 fa-ul text-muted'>
								                        <li class='small'><b>Anarana : </b>".$donne['nomF']."</li>
								                        <li class='small'><b>Fanampiny : </b>".$donne['prenomF']."</li>
								                        <li class='small'><b>Nahaterahana : </b>".$afficheDate."</li>
								                        <li class='small'><b>Fonenana : </b>".$donne['AdresseF']."</li>
								                        <li class='small'><b>Faritra : </b>".$donne['Faritra']."</li>
								                    	<li class='small'><b>Asa andavan-andro: </b>".$donne['professionF']."</li>
								                    </ul>
								                    ".$rad."
		                                  		</div>
		                                  		<div class='col-5'>
			                                  		<br>
				                                    <ul class='ml-4 mb-0 fa-ul text-muted'>
								                        <li class='small'><b>Fifandraisana</b></li>
								                        <li class='small'><b>Finday 1 : </b>".$donne['TelephoneF']."</li>
								                        ".$p2."
								                        ".$p3."
								                        ".$maill."
								                        ".$fb."
								                    </ul>
		                                  		</div>
		                                  	</div>

								            <hr>
								            <div class='text-center'>
									            ".$btnB."
									            ".$btnM."
									            ".$btnS."
									            ".$btnMA."
								            </div>
								            <hr>
								            <div class='row'>
		                                  		<div class='col'>
								                    <small class='small text-uppercase'><b>Andraikitra</b></small><hr>
				                                    <ul class='list-group list-group-horizontal ml-4 mb-0 fa-ul text-muted'>
								                        ".$birao."
								                        ".$FANORENANA."
								                        ".$FDL."
								                        ".$FBL."
								                        ".$SALOMA."
								                        ".$KTLM."
								                        ".$TMM."
								                        ".$FIFIL."
								                        ".$SKOTO."
								                        ".$DIAKONA."
								                        ".$VLM."
								                        ".$DSERA."
								                        ".$DFITAOVANA."
								                        ".$DMOZIKA."
								                        ".$DFIRAKETANA."
								                    </ul>
								            		<hr>
								                    <small class='small text-uppercase'><b>Faritra ".$donne['Faritra']."</b></small><hr>
				                                    <ul class='list-group list-group-horizontal ml-4 mb-0 fa-ul text-muted'>
								                        ".$FARITRA."
								                    </ul>
		                                  		</div>
		                                  	</div>


		                                  </div>
		                                  <div class='col-5 text-center'>
	                                  			".$imgUrl."
		                                  </div> 
		                                </div>
		                            </div>
				";
		}
	}


	if (isset($_POST['SampaGet'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$sampana = $_POST['SampaGet'];

		$donne = $modele->GetSampana($sampana);
		
		echo "
				<section class='content container'>
					<div class='card card-solid'>
				        <div class='card-header'>
				        	<h4 class='card-title'>".$sampana."</h4>
				        </div>
				        <div class='card-body pb-0'>
				                <div class='row'>
				                    <div class='col-md-10 offset-md-1'>
				                         <div class='row'>
				                            <div class='col-7'>
				                                <div class='form-group'>
				                                    <label>Toerana (tsy voatery)</label>
				                                    <input type='text' id='toeranaM' class='form-control' placeholder='Ampidiro...'>
				                                </div>
				                            </div>
				                            <div class='col-5'>
				                                <div class='form-group'>
				                                    <label>Lahy / Vavy (tsy voatery)</label>
				                                    <select class='form-control' id='sexeM' style='width: 100%;'>
				                                        <option selected disabled></option>
				                                        <option>Lehilahy</option>
				                                        <option>Vehivavy</option>
				                                    </select>
				                                </div>
				                            </div>
				                        </div>
				                        <div class='form-group'>
				                            <div class='input-group input-group-lg'>
				                                <input type='search' class='form-control form-control-lg' placeholder='Hitady krisitanina...' id='tenaIM'>
				                                <div class='input-group-append'>
				                                    <button class='btn btn-lg btn-default' onclick=\"RechercheSampana('".$sampana."');\">
				                                        <i class='fa fa-search'></i>
				                                    </button>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				        </div>
				      </div>
				</section>
		";

		if ($donne) {
			echo "
				<table class='table' style='display:none;' id='sampanaListeAr'>
					<thead class='thead-dark'>
				      <tr>
				        <th>Toerana</th>
				        <th>Anarana</th>
				        <th>Fanampiny</th>
				        <th>Adiresy</th>
				        <th>Finday</th>
				        <th>Finday 2</th>
				      </tr>
				    </thead>
				    <tbody>
				";
				foreach ($donne as $key => $valueT) {
						if ($sampana=="FDL") {
							$place = $valueT['Place1'];
						}elseif ($sampana=="FBL"){
							$place = $valueT['Place2'];
						}elseif ($sampana=="SALOMA"){
							$place = $valueT['Place3'];
						}elseif ($sampana=="KTLM"){
							$place = $valueT['Place4'];
						}elseif ($sampana=="TMM"){
							$place = $valueT['Place5'];
						}elseif ($sampana=="FIFIL"){
							$place = $valueT['Place14'];
						}elseif ($sampana=="SKOTO"){
							$place = $valueT['Place6'];
						}elseif ($sampana=="DIAKONA"){
							$place = $valueT['Place7'];
						}elseif ($sampana=="VLM"){
							$place = $valueT['Place8'];
						}
						echo "
						<tr>
							<td>".$place."</td>
							<td>".$valueT['nomF']."</td>
					      	<td>".$valueT['prenomF']."</td>
					      	<td>".$valueT['AdresseF']."</td>
					      	<td>".$valueT['TelephoneF']."</td>
					      	<td>".$valueT['Telephone2']."</td>
					    </tr>
						";	
				}
			echo "
				    </tbody>
				    <tbody>
				</table>
			";
			echo "
				<section class='content container'>
				    <div class='card card-solid'>
				        <div class='card-header'>
				          <h4 class='card-title'>Lisitra ".$sampana."</h4>
				        </div>
			";

			echo "
				<div class='card-body pb-0'>
				            <div class='row d-flex align-items-stretch' id='listSampanaS'>
			";
							foreach ($donne as $key => $value) {
								if ($sampana=="FDL") {
									$place = $value['Place1'];
								}elseif ($sampana=="FBL"){
									$place = $value['Place2'];
								}elseif ($sampana=="SALOMA"){
									$place = $value['Place3'];
								}elseif ($sampana=="KTLM"){
									$place = $value['Place4'];
								}elseif ($sampana=="TMM"){
									$place = $value['Place5'];
								}elseif ($sampana=="FIFIL"){
									$place = $value['Place14'];
								}elseif ($sampana=="SKOTO"){
									$place = $value['Place6'];
								}elseif ($sampana=="DIAKONA"){
									$place = $value['Place7'];
								}elseif ($sampana=="VLM"){
									$place = $value['Place8'];
								}


								if ($value['imageF']!=NULL || $value['imageF']!="") {
									$url = "data/user/".$value['imageF'];
								}else{
									$url = "data/user/profile.png";
								}

								if ($value['EmailF']) {
									$email = "<p class='text-muted text-sm'><b>Email: </b> ".$value['EmailF']." </p>";
								}else{
									$email = "";
								}
								if ($value['FacebookF']) {
									$facebook = "<p class='text-muted text-sm'><b>Facebook: </b> ".$value['FacebookF']." </p>";
								}else{
									$facebook = "";
								}

								list($inscri) =explode("-", $value['inscriptionF']);
								echo "
									<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
						              <div class='card bg-light'>
								        <div class='card-header text-muted border-bottom-0'>
									        <span class='badge badge-info'>
							                  ".$place."
							                </span>
						                </div>
						                <div class='card-header text-muted border-bottom-0'></div>
						                <div class='card-body pt-0'>
						                  <div class='row'>
						                    <div class='col-7'>
						                      <h2 class='lead'><b>".$value['nomF']." ".$value['prenomF']."</b></h2>
						                      <hr>
						                      <ul class='ml-4 mb-0 fa-ul text-muted'>
		                        				<li class='small'><span class='fa-li'><i class='fas fa-lg fa-map-marker'></i></span> Faritra ".$value['Faritra']."</li>
						                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> ".$value['AdresseF']."</li>
						                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> ".$value['TelephoneF']."</li>
						                      </ul><hr>
						                      <p class='text-muted text-sm'><b>Fidirana : </b> ".$inscri." </p>
						                      ".$email."
						                      ".$facebook."
						                    </div>
						                    <div class='col-5 text-center'>
						                      <img src='".$url."' alt='".$value['prenomF']."' class='img-circle w-100' style='height:200px; object-fit: contain;'>
						                    </div>
						                  </div>
						                </div>
						                <div class='card-footer'>
						                  <div class='text-right'>
						                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>
						                      <i class='fas fa-eye'></i> HIJERY 
						                    </a>
						                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$value['idF'].");'>
						                      <i class='fas fa-edit'></i> HANITSY 
						                    </a>
						                  </div>
						                </div>
						              </div>
						            </div>
								";
							}
			echo "
				            </div>
				        </div>
				    </div>
				</section>
			";
		}
	}

	if (isset($_POST['FaritraGet'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$Faritra = $_POST['FaritraGet'];

		$donne = $modele->GetFaritra($Faritra);
		if ($donne) {
			$comptage = 0;
			foreach ($donne as $key => $value) {
				$comptage += 1;
			}
			echo "
				<section class='content container'>
				    <div class='card card-solid'>
				        <div class='card-header'>
				          <h4 class='card-title'>FARITRA ".$Faritra." - ".$comptage."</h4>
				        </div>
						<div class='card-body pb-0'>
				            <div class='row d-flex align-items-stretch' id='listSampanaS'>
			";
							foreach ($donne as $key => $value) {
								if ($value['imageF']!=NULL || $value['imageF']!="") {
									$url = "data/user/".$value['imageF'];
								}else{
									$url = "data/user/profile.png";
								}

								if ($value['EmailF']) {
									$email = "<p class='text-muted text-sm'><b>Email: </b> ".$value['EmailF']." </p>";
								}else{
									$email = "";
								}
								if ($value['FacebookF']) {
									$facebook = "<p class='text-muted text-sm'><b>Facebook: </b> ".$value['FacebookF']." </p>";
								}else{
									$facebook = "";
								}

								if ($value['Toerana'] == NULL) {
									$place = "MAMBRA";
								}else{
									$place = $value['Toerana'];
								}

								list($inscri) =explode("-", $value['inscriptionF']);
								echo "
									<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
						              <div class='card bg-light'>
								        <div class='card-header text-muted border-bottom-0'>
									        <span class='badge badge-info'>
							                  ".$place."
							                </span>
						                </div>
						                <div class='card-header text-muted border-bottom-0'></div>
						                <div class='card-body pt-0'>
						                  <div class='row'>
						                    <div class='col-7'>
						                      <h2 class='lead'><b>".$value['nomF']." ".$value['prenomF']."</b></h2>
						                      <hr>
						                      <ul class='ml-4 mb-0 fa-ul text-muted'>
		                        				<li class='small'><span class='fa-li'><i class='fas fa-lg fa-map-marker'></i></span> Faritra ".$value['Faritra']."</li>
						                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> ".$value['AdresseF']."</li>
						                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> ".$value['TelephoneF']."</li>
						                      </ul><hr>
						                      <p class='text-muted text-sm'><b>Fidirana : </b> ".$inscri." </p>
						                      ".$email."
						                      ".$facebook."
						                    </div>
						                    <div class='col-5 text-center'>
						                      <img src='".$url."' alt='".$value['prenomF']."' class='img-circle w-100' style='height:200px; object-fit: contain;'>
						                    </div>
						                  </div>
						                </div>
						                <div class='card-footer'>
						                  <div class='text-right'>
						                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>
						                      <i class='fas fa-eye'></i> HIJERY 
						                    </a>
						                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$value['idF'].");'>
						                      <i class='fas fa-edit'></i> HANITSY 
						                    </a>
						                  </div>
						                </div>
						              </div>
						            </div>
								";
							}
			echo "
				            </div>
				        </div>
				    </div>
				</section>
			";
		}
	}

	if (isset($_POST['DepartGet'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$depart = $_POST['DepartGet'];

		$donne = $modele->GetDepart($depart);

		if ($depart=="DSERA") {
			$da = "SERASERA";
		}elseif ($depart=="DMOZIKA") {
			$da = "HIRA SY MOZIKA";
		}elseif ($depart=="DFITAOVANA") {
			$da = "FITAOVANA";
		}elseif ($depart=="DFIRAKETANA") {
			$da = "FIRAKETANA";
		}
		
		echo "
				<section class='content container'>
					<div class='card card-solid'>
				        <div class='card-header'>
				        	<h4 class='card-title'>".$da."</h4>
				        </div>
				        <div class='card-body pb-0'>
				                <div class='row'>
				                    <div class='col-md-10 offset-md-1'>
				                         <div class='row'>
				                            <div class='col-7'>
				                                <div class='form-group'>
				                                    <label>Toerana (tsy voatery)</label>
				                                    <input type='text' id='toeranaMD' class='form-control' placeholder='Ampidiro...'>
				                                </div>
				                            </div>
				                            <div class='col-5'>
				                                <div class='form-group'>
				                                    <label>Lahy / Vavy (tsy voatery)</label>
				                                    <select class='form-control' id='sexeMD' style='width: 100%;'>
				                                        <option selected disabled></option>
				                                        <option>Lehilahy</option>
				                                        <option>Vehivavy</option>
				                                    </select>
				                                </div>
				                            </div>
				                        </div>
				                        <div class='form-group'>
				                            <div class='input-group input-group-lg'>
				                                <input type='search' class='form-control form-control-lg' placeholder='Hitady krisitanina...' id='tenaIMD'>
				                                <div class='input-group-append'>
				                                    <button class='btn btn-lg btn-default' onclick=\"RechercheDepart('".$depart."');\">
				                                        <i class='fa fa-search'></i>
				                                    </button>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				        </div>
			      	</div>
				</section>
		";

		if ($donne) {
			echo "
				<table class='table table-responsive-xl' style='display:none;' id='departListeAr'>
					<thead class='thead-dark'>
				      <tr>
				        <th>Toerana</th>
				        <th>Anarana</th>
				        <th>Fanampiny</th>
				        <th>Adiresy</th>
				        <th>Finday</th>
				        <th>Finday 2</th>
				      </tr>
				    </thead>
				    <tbody>
				";
				foreach ($donne as $key => $valueT) {
								if ($depart=="DSERA") {
									$place = $valueT['Place9'];
								}elseif ($depart=="DFITAOVANA"){
									$place = $valueT['Place11'];
								}elseif ($depart=="DMOZIKA"){
									$place = $valueT['Place12'];
								}elseif ($depart=="DFIRAKETANA"){
									$place = $valueT['Place13'];
								}
						echo "
						<tr>
							<td>".$place."</td>
							<td>".$valueT['nomF']."</td>
					      	<td>".$valueT['prenomF']."</td>
					      	<td>".$valueT['AdresseF']."</td>
					      	<td>".$valueT['TelephoneF']."</td>
					      	<td>".$valueT['Telephone2']."</td>
					    </tr>
						";	
				}
			echo "
				    </tbody>
				    <tbody>
				</table>
			";

			echo "
				<section class='content container'>
				    <div class='card card-solid'>
				        <div class='card-header'>
				          <h4>Lisitra ".$da."</h4>

				        </div>
				        <div class='card-body pb-0'>
				            <div class='row d-flex align-items-stretch' id='listDepartS'>
			";
							foreach ($donne as $key => $value) {
								if ($depart=="DSERA") {
									$place = $value['Place9'];
								}elseif ($depart=="DFITAOVANA"){
									$place = $value['Place11'];
								}elseif ($depart=="DMOZIKA"){
									$place = $value['Place12'];
								}elseif ($depart=="DFIRAKETANA"){
									$place = $value['Place13'];
								}else{
									$place = "KO";
								}


								if ($value['imageF']!=NULL || $value['imageF']!="") {
									$url = "data/user/".$value['imageF'];
								}else{
									$url = "data/user/profile.png";
								}

								if ($value['EmailF']) {
									$email = "<p class='text-muted text-sm'><b>Email: </b> ".$value['EmailF']." </p>";
								}else{
									$email = "";
								}
								if ($value['FacebookF']) {
									$facebook = "<p class='text-muted text-sm'><b>Facebook: </b> ".$value['FacebookF']." </p>";
								}else{
									$facebook = "";
								}

								list($inscri) =explode("-", $value['inscriptionF']);
								if ($place != "KO") {
									echo "
										<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
							              <div class='card bg-light'>
									        <div class='card-header text-muted border-bottom-0'>
							                	<span class='badge badge-info'>
							                  		".$place."
							                	</span>
							                </div>
							                <div class='card-header text-muted border-bottom-0'></div>
							                <div class='card-body pt-0'>
							                  <div class='row'>
							                    <div class='col-7'>
							                      <h2 class='lead'><b>".$value['nomF']." ".$value['prenomF']."</b></h2>
							                      <hr>
							                      <ul class='ml-4 mb-0 fa-ul text-muted'>
			                        				<li class='small'><span class='fa-li'><i class='fas fa-lg fa-map-marker'></i></span> Faritra ".$value['Faritra']."</li>
							                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> ".$value['AdresseF']."</li>
							                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> ".$value['TelephoneF']."</li>
							                      </ul><hr>
							                      <p class='text-muted text-sm'><b>Fidirana : </b> ".$inscri." </p>
							                      ".$email."
							                      ".$facebook."
							                    </div>
							                    <div class='col-5 text-center'>
							                      <img src='".$url."' alt='".$value['prenomF']."' class='img-circle w-100' style='height:200px; object-fit: contain;'>
							                    </div>
							                  </div>
							                </div>
							                <div class='card-footer'>
							                  <div class='text-right'>
							                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>
							                      <i class='fas fa-eye'></i> HIJERY 
							                    </a>
							                    <a class='btn btn-sm btn-info' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$value['idF'].");'>
							                      <i class='fas fa-edit'></i> HANITSY 
							                    </a>
							                  </div>
							                </div>
							              </div>
							            </div>
									";
								}
							}
			echo "
				            </div>
				        </div>
				    </div>
				</section>
			";
		}
	}

	if (isset($_POST['FianNomerija'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$donneT = $modele->GetDonneNumF();
		$donneL = $modele->GetDonneNumFC("Lehilahy");
		$donneV = $modele->GetDonneNumFC("Vehivavy");
		
		$donneBOK = $modele->GetDonneNumMKF("Batisa","OK");
		$donneMOK = $modele->GetDonneNumMKF("Mpandray","OK");
		$donneSOK = $modele->GetDonneNumMKF("Soratra","OK");
		$donneMAOK = $modele->GetDonneNumMKF("Mariazy","OK");

		$donneBOKN = $modele->GetDonneNumMKF("Batisa","KO");
		$donneMOKN = $modele->GetDonneNumMKF("Mpandray","KO");
		$donneSOKN = $modele->GetDonneNumMKF("Soratra","KO");
		$donneMAOKN = $modele->GetDonneNumMKF("Mariazy","KO");

		echo "
			<section class='content container'
		      <div class='card card-solid'>
		        <div class='card-body'>
		           <h3><b>Isa fiangonana</b></h3><hr>

		           <div class='row'>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneT['total']."</h3>
		                    <p>Fitambarany</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('all')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>

		                </div>
		              </div>
		           
		              <div class='col-lg-3 col-6'></div>
		              
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneL['total']."</h3>
		                    <p>Lehilahy</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('th')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneV['total']."</h3>
		                    <p>Vehivavy</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('tv')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>


		           </div>

		           <h3><b>Maha-kristiana fiangonana</b></h3><hr>
		           <div class='row'>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneBOK['total']."</h3>
		                    <p>Vita batisa</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('bok')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneMOK['total']."</h3>
		                    <p>Mpandray</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('mok')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneSOK['total']."</h3>
		                    <p>Vita soratra</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('sok')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneMAOK['total']."</h3>
		                    <p>Vita mariazy</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('maok')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>

		            </div>
		            <div class='row'>
		            	<div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneBOKN['total']."</h3>
		                    <p>Tsy vita batisa</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('bko')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneMOKN['total']."</h3>
		                    <p>Tsy mpandray</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('mko')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneSOKN['total']."</h3>
		                    <p>Tsy vita soratra</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('sko')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneMAOKN['total']."</h3>
		                    <p>Tsy vita mariazy</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetFiangonanaNomerikaDetaille('mako')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleFiangonana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		            </div>
		            </div>

		        </div>
		      </div>
		</section>
		";

	}



	if (isset($_POST['SampaGetNomerika'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$donneSD = $_POST['SampaGetNomerika'];

		$donneT = $modele->GetDonneNumS($donneSD);
		$donneL = $modele->GetDonneNumSLV($donneSD,"Lehilahy");
		$donneV = $modele->GetDonneNumSLV($donneSD,"Vehivavy");
		
		$donneBOK = $modele->GetDonneNumMK("Batisa",$donneSD,"OK");
		$donneMOK = $modele->GetDonneNumMK("Mpandray",$donneSD,"OK");
		$donneSOK = $modele->GetDonneNumMK("Soratra",$donneSD,"OK");
		$donneMAOK = $modele->GetDonneNumMK("Mariazy",$donneSD,"OK");

		$donneBOKN = $modele->GetDonneNumMK("Batisa",$donneSD,"KO");
		$donneMOKN = $modele->GetDonneNumMK("Mpandray",$donneSD,"KO");
		$donneSOKN = $modele->GetDonneNumMK("Soratra",$donneSD,"KO");
		$donneMAOKN = $modele->GetDonneNumMK("Mariazy",$donneSD,"KO");




		echo "
			<section class='content container'
		      <div class='card card-solid'>
		        <div class='card-body'>
		           <h3><b>Isa (".$donneSD.") : (".$donneT['total'].")</b></h3><hr>

		           <div class='row'>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneT['total']."</h3>
		                    <p>Fitambarany</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','all')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		           
		              <div class='col-lg-3 col-6'></div>
		              
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneL['total']."</h3>
		                    <p>Lehilahy</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','th')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneV['total']."</h3>
		                    <p>Vehivavy</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','tv')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>


		           </div>

		           <h3><b>Maha-kristiana (".$donneSD.")</b></h3><hr>
		           <div class='row'>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneBOK['total']."</h3>
		                    <p>Vita batisa</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','bok')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneMOK['total']."</h3>
		                    <p>Mpandray</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','mok')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneSOK['total']."</h3>
		                    <p>Vita soratra</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','sok')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneMAOK['total']."</h3>
		                    <p>Vita mariazy</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','maok')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>

		            </div>
		            <div class='row'>
		            	<div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneBOKN['total']."</h3>
		                    <p>Tsy vita batisa</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','bko')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneMOKN['total']."</h3>
		                    <p>Tsy mpandray</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','mko')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneSOKN['total']."</h3>
		                    <p>Tsy vita soratra</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','sko')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-3 col-6'>
		                <div class='small-box bg-info'>
		                  <div class='inner'>
		                    <h3>".$donneMAOKN['total']."</h3>
		                    <p>Tsy vita mariazy</p>
		                  </div>
		                  <div class='icon'>
		                    <i class='ion ion-bag'></i>
		                  </div>
		                  <a style='cursor:pointer;' onclick=\"GetSampanaNomerikaDetaille('".$donneSD."','mako')\" class='small-box-footer' data-toggle='modal' data-target='#DetailleSampana'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		            </div>
		            </div>

		        </div>
		      </div>
		</section>
		";
	}
	if (isset($_POST['SampaGetNomerikaDetaille'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$donneSD = $_POST['SampaGetNomerikaDetaille'];
		$detaille = $_POST['detailleAz'];

		$donne1 = $modele->GetDonneNumS($donneSD);
		$donne2 = $modele->GetDonneNumSLV($donneSD,"Lehilahy");
		$donne3 = $modele->GetDonneNumSLV($donneSD,"Vehivavy");
		
		$donne4 = $modele->GetDonneNumMK("Batisa",$donneSD,"OK");
		$donne5 = $modele->GetDonneNumMK("Mpandray",$donneSD,"OK");
		$donne6 = $modele->GetDonneNumMK("Soratra",$donneSD,"OK");
		$donne7 = $modele->GetDonneNumMK("Mariazy",$donneSD,"OK");

		$donne8 = $modele->GetDonneNumMK("Batisa",$donneSD,"KO");
		$donne9 = $modele->GetDonneNumMK("Mpandray",$donneSD,"KO");
		$donne10 = $modele->GetDonneNumMK("Soratra",$donneSD,"KO");
		$donne11 = $modele->GetDonneNumMK("Mariazy",$donneSD,"KO");

		if ($donneSD == "FBL") {
			$abbr = "Fikambanan-Behivahy Loterana";
		}elseif ($donneSD == "DSERA") {
			$abbr = "Departemanta Serasera";
		}elseif ($donneSD == "DMOZIKA") {
			$abbr = "Departemanta Hira sy Mozika";
		}elseif ($donneSD == "DFITAOVANA") {
			$abbr = "Departemanta Fitaovana";
		}elseif ($donneSD == "DFIRAKETANA") {
			$abbr = "Departemanta Firaketana";
		}elseif ($donneSD == "FDL") {
			$abbr = "Fikambanan-Dehilahy Loterana";
		}elseif ($donneSD == "TMM") {
			$abbr = "Tafika Masina Maharitra";
		}elseif ($donneSD == "FIFIL") {
			$abbr = "";
		}elseif ($donneSD == "KTLM") {
			$abbr = "Kristiana Tanora Loterana Malagasy";
		}elseif ($donneSD == "VLM") {
			$abbr = "Vokovokomanga Loterana Malagasy";
		}elseif ($donneSD == "SALOMA") {
			$abbr = "Sekoly Alahady Loterana MAlagasy";
		}elseif ($donneSD == "DIAKONA") {
			$abbr = "";
		}elseif ($donneSD == "SKOTO") {
			$abbr = "";
		}else {
			$abbr = "";
		}

		if ($detaille=="all") {
			$donneT = $modele->GetDonneNumSDetaille($donneSD);
			$donneTM = "";
			$titre = "Isa rehetra : ".$donneSD;
		}
		elseif ($detaille=="th") {
			$donneT = $modele->GetDonneNumSLVDetaille($donneSD,"Lehilahy");
			$donneTM = "";
			$titre = "Lehilahy rehetra : ".$donneSD;
		}
		elseif ($detaille=="tv") {
			$donneT = $modele->GetDonneNumSLVDetaille($donneSD,"Vehivavy");
			$donneTM = "";
			$titre = "Vehivavy rehetra : ".$donneSD;
		}
		elseif ($detaille=="bok") {
			$donneTM = $modele->GetDonneNumMDetaille("Batisa",$donneSD,"OK");
			$donneT = "";
			$titre = "Vita batisa : ".$donneSD;
		}
		elseif ($detaille=="bko") {
			$donneTM = $modele->GetDonneNumMDetaille("Batisa",$donneSD,"KO");
			$donneT = "";
			$titre = "Tsy vita batisa : ".$donneSD;
		}
		elseif ($detaille=="mok") {
			$donneTM = $modele->GetDonneNumMDetaille("Mpandray",$donneSD,"OK");
			$donneT = "";
			$titre = "Efa mpandray : ".$donneSD;
		}
		elseif ($detaille=="mko") {
			$donneTM = $modele->GetDonneNumMDetaille("Mpandray",$donneSD,"KO");
			$donneT = "";
			$titre = "Tsy mpandray : ".$donneSD;
		}
		elseif ($detaille=="sok") {
			$donneTM = $modele->GetDonneNumMDetaille("Soratra",$donneSD,"OK");
			$donneT = "";
			$titre = "Vita soratra : ".$donneSD;
		}
		elseif ($detaille=="sko") {
			$donneTM = $modele->GetDonneNumMDetaille("Soratra",$donneSD,"KO");
			$donneT = "";
			$titre = "Tsy vita soratra : ".$donneSD;
		}
		elseif ($detaille=="maok") {
			$donneTM = $modele->GetDonneNumMDetaille("Mariazy",$donneSD,"OK");
			$donneT = "";
			$titre = "Vita mariazy : ".$donneSD;
		}
		elseif ($detaille=="mako") {
			$donneTM = $modele->GetDonneNumMDetaille("Mariazy",$donneSD,"KO");
			$donneT = "";
			$titre = "Tsy vita mariazy : ".$donneSD;
		}else{
			$donneT = NULL;
			$donneTM = NULL;
			$titre = NULL;
		}

		if ($donneT && $donneTM=="" && $donneT!=NULL) {
			echo "
				<div class='container row'>
					<div class='col-md-12 text-left'>
						<h3 align='right'><button class='btn btn-info' onclick=\"PDFPDSDIsa('".date("Y")."-".$titre."')\" >PDF <i class='fas fa-file-pdf'></i></button></h3>
					</div>
				</div>
				<div id='sdimpirmeit'>
					<div class='mt-3'>
						<div class='d-flex justify-content-center align-items-center text-center'>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
							<div class='ml-5 mr-5'>
					          <h5 class='text-dark'>FIANGONANA LOTERANA MALAGASY</h5>
					          <h5 class='text-dark'>SYNODAM-PARITANY ANTANANARIVO</h5>
					          <h5 class='text-dark'>FILEOVANA AMBOHIBAO</h5>
					          <h5 class='text-dark'>FITANDREMANA TOBY BETESDA AMBOHIBAO</h5>
					          <h3 class='mt-3 text-dark'>FLM AMBOHIDRATRIMO</h3>
					          <h6 class='mb-1 text-secondary'>“ fa izay mitady ny voninahitr’Izay naniraka azy no marina “ Jaona 7 : 18b</h6>
							</div>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
						</div>
					</div>
					<hr>
					<div class='container text-center'>
						<h5 class='mt-4 text-dark'>".strtoupper($abbr)." AMBOHIDRATRIMO</h5>
						<h5 class='text-muted small'>".strtoupper($titre)." AMBOHIDRATRIMO</h5>
					</div>
					<table class='mt-2 table table-responsive-xl'>
						<thead class='thead-info'>
					      <tr>
					        <th>Toerana</th>
					        <th>Anarana</th>
					        <th>Fanampiny</th>
					        <th>Adiresy</th>
					        <th>Finday</th>
					        <!--<th>Hijery</th>
					        <th>Hanitsy</th>-->
					      </tr>
					    </thead>
					    <tbody>
				";
				foreach ($donneT as $key => $valueT) {
								if ($donneSD=="FDL") {
									$place = $valueT['Place1'];
								}elseif ($donneSD=="FBL"){
									$place = $valueT['Place2'];
								}elseif ($donneSD=="SALOMA"){
									$place = $valueT['Place3'];
								}elseif ($donneSD=="KTLM"){
									$place = $valueT['Place4'];
								}elseif ($donneSD=="TMM"){
									$place = $valueT['Place5'];
								}elseif ($donneSD=="FIFIL"){
									$place = $valueT['Place14'];
								}elseif ($donneSD=="SKOTO"){
									$place = $valueT['Place6'];
								}elseif ($donneSD=="DIAKONA"){
									$place = $valueT['Place7'];
								}elseif ($donneSD=="VLM"){
									$place = $valueT['Place8'];
								}elseif ($donneSD=="DSERA") {
									$place = $valueT['Place9'];
								}elseif ($donneSD=="DFITAOVANA") {
									$place = $valueT['Place11'];
								}elseif ($donneSD=="DMOZIKA") {
									$place = $valueT['Place12'];
								}elseif ($donneSD=="DFIRAKETANA") {
									$place = $valueT['Place13'];
								}
						echo "
						<tr>
							<td>".$place."</td>
							<td>".$valueT['nomF']."</td>
					      	<td>".$valueT['prenomF']."</td>
					      	<td>".$valueT['AdresseF']."</td>
					      	<td>".$valueT['TelephoneF']."</td>
					      	<!--<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$valueT['idF'].");'><i class='fas fa-eye'></i></button></td>
					      	<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$valueT['idF'].");'><i class='fas fa-edit'></i></button></td>-->
					    </tr>
						";	
				}
			echo "
					    </tbody>
					    <tbody>
					</table>
					<hr>
					<hr>
					<div class='row'>
						<div class='col-sm-1'></div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              <div class='inner'>
				                <h6 class='mt-1 text-dark'>Fitambarany : ".$donne1['total']."</h6>
				          		<h5 class='mt-1 text-dark small'>Lahy : ".$donne2['total']."</h5>
				          		<h5 class='mt-1 text-dark small'>Vavy : ".$donne3['total']."</h5>
				              </div>
				            </div>
						</div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              	<div class='inner'>
						          	<h6 class='mt-1 text-dark'>Mpandray</h6>
						          	<h5 class='mt-1 text-dark small'>Vita : ".$donne5['total']."</h5>
					          		<h5 class='mt-1 text-dark small'>Tsy vita : ".$donne9['total']."</h5>
								</div>
				            </div>
						</div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              	<div class='inner'>
						          	<h6 class='mt-1 text-dark'>Batisa</h6>
						          	<h5 class='mt-1 text-dark small'>Vita : ".$donne4['total']."</h5>
						          	<h5 class='mt-1 text-dark small'>Tsy vita : ".$donne8['total']."</h5>
								</div>
				            </div>
						</div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              	<div class='inner'>
						          	<h6 class='mt-1 text-dark'>Soratra</h6>
						          	<h5 class='mt-1 text-dark small'>Vita : ".$donne6['total']."</h5>
					          		<h5 class='mt-1 text-dark small'>Tsy vita : ".$donne10['total']."</h5>
								</div>
				            </div>
						</div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              	<div class='inner'>
						          	<h6 class='mt-1 text-dark'>Mariazy</h6>
						          	<h5 class='mt-1 text-dark small'>Vita : ".$donne7['total']."</h5>
						          	<h5 class='mt-1 text-dark small'>Tsy vita : ".$donne11['total']."</h5>
								</div>
				            </div>
						</div>
						<div class='col-sm-1'></div>
					</div>
					<hr>
					<hr>
					<div class='row'>
						<div class='col-sm-4 text-center'>
						</div>
						<div class='col-sm-8 text-right'>
							<h6 class='mt-0 mb-0 mr-2 text-dark'>DEPARTEMANTA SERASERA/FIRAIKETANA</h6>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 34 24 877 19</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 32 67 925 59</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Email : flm.ambohidratrimo.105@gmail.com</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Facebook : FLM AMBOHIDRATRIMO</small><br>
						</div>
					</div>
				</div>
			";
		}elseif ($donneTM && $donneT=="" && $donneTM!=NULL) {
			echo "
				<div class='container row'>
					<div class='col-md-12 text-left'>
						<h3 align='right'><button class='btn btn-info' onclick=\"PDFPDSDIsa('".date("Y")."-".$titre."')\" >PDF <i class='fas fa-file-pdf'></i></button></h3>
					</div>
				</div>
				<div id='sdimpirmeit'>
					<div class='mt-3'>
						<div class='d-flex justify-content-center align-items-center text-center'>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
							<div class='ml-5 mr-5'>
					          <h5 class='text-dark'>FIANGONANA LOTERANA MALAGASY</h5>
					          <h5 class='text-dark'>SYNODAM-PARITANY ANTANANARIVO</h5>
					          <h5 class='text-dark'>FILEOVANA AMBOHIBAO</h5>
					          <h5 class='text-dark'>FITANDREMANA TOBY BETESDA AMBOHIBAO</h5>
					          <h3 class='mt-3 text-dark'>FLM AMBOHIDRATRIMO</h3>
					          <h6 class='mb-1 text-secondary'>“ fa izay mitady ny voninahitr’Izay naniraka azy no marina “ Jaona 7 : 18b</h6>
							</div>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
						</div>
					</div>
					<hr>
					<div class='container text-center'>
						<h5 class='mt-4 text-dark'>".strtoupper($abbr)." AMBOHIDRATRIMO</h5>
						<h5 class='text-muted small'>".strtoupper($titre)." AMBOHIDRATRIMO</h5>
					</div>
					<table class='mt-2 table table-responsive-xl'>
						<thead class='thead-info'>
					      <tr>
					        <th>Toerana</th>
					        <th>Anarana</th>
					        <th>Fanampiny</th>
					        <th>Adiresy</th>
					        <th>Finday</th>
					        <!--<th>Hijery</th>
					        <th>Hanitsy</th>-->
					      </tr>
					    </thead>
					    <tbody>
				";
				foreach ($donneTM as $key => $valueT) {
								$donneUser = $modele->GetUserId($valueT['idFiangonana']);
								if ($donneSD=="FDL") {
									$place = $valueT['Place1'];
								}elseif ($donneSD=="FBL"){
									$place = $valueT['Place2'];
								}elseif ($donneSD=="SALOMA"){
									$place = $valueT['Place3'];
								}elseif ($donneSD=="KTLM"){
									$place = $valueT['Place4'];
								}elseif ($donneSD=="TMM"){
									$place = $valueT['Place5'];
								}elseif ($donneSD=="FIFIL"){
									$place = $valueT['Place14'];
								}elseif ($donneSD=="SKOTO"){
									$place = $valueT['Place6'];
								}elseif ($donneSD=="DIAKONA"){
									$place = $valueT['Place7'];
								}elseif ($donneSD=="VLM"){
									$place = $valueT['Place8'];
								}elseif ($donneSD=="DSERA") {
									$place = $valueT['Place9'];
								}elseif ($donneSD=="DFITAOVANA") {
									$place = $valueT['Place11'];
								}elseif ($donneSD=="DMOZIKA") {
									$place = $valueT['Place12'];
								}elseif ($donneSD=="DFIRAKETANA") {
									$place = $valueT['Place13'];
								}
						echo "
						<tr>
							<td>".$place."</td>
							<td>".$donneUser['nomF']."</td>
					      	<td>".$donneUser['prenomF']."</td>
					      	<td>".$donneUser['AdresseF']."</td>
					      	<td>".$donneUser['TelephoneF']."</td>
					      	<!--<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$donneUser['idF'].");'><i class='fas fa-eye'></i></button></td>
					      	<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$donneUser['idF'].");'><i class='fas fa-edit'></i></button></td>-->
					    </tr>
						";	
				}
			echo "
					    </tbody>
					    <tbody>
					</table>
					<hr>
					<hr>
					<div class='row'>
						<div class='col-sm-1'></div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              <div class='inner'>
				                <h6 class='mt-1 text-dark'>Fitambarany : ".$donne1['total']."</h6>
				          		<h5 class='mt-1 text-dark small'>Lahy : ".$donne2['total']."</h5>
				          		<h5 class='mt-1 text-dark small'>Vavy : ".$donne3['total']."</h5>
				              </div>
				            </div>
						</div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              	<div class='inner'>
						          	<h6 class='mt-1 text-dark'>Mpandray</h6>
						          	<h5 class='mt-1 text-dark small'>Vita : ".$donne5['total']."</h5>
					          		<h5 class='mt-1 text-dark small'>Tsy vita : ".$donne9['total']."</h5>
								</div>
				            </div>
						</div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              	<div class='inner'>
						          	<h6 class='mt-1 text-dark'>Batisa</h6>
						          	<h5 class='mt-1 text-dark small'>Vita : ".$donne4['total']."</h5>
						          	<h5 class='mt-1 text-dark small'>Tsy vita : ".$donne8['total']."</h5>
								</div>
				            </div>
						</div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              	<div class='inner'>
						          	<h6 class='mt-1 text-dark'>Soratra</h6>
						          	<h5 class='mt-1 text-dark small'>Vita : ".$donne6['total']."</h5>
					          		<h5 class='mt-1 text-dark small'>Tsy vita : ".$donne10['total']."</h5>
								</div>
				            </div>
						</div>
						<div class='col-sm-2 text-center'>
							<div class='small-box bg-info'>
				              	<div class='inner'>
						          	<h6 class='mt-1 text-dark'>Mariazy</h6>
						          	<h5 class='mt-1 text-dark small'>Vita : ".$donne7['total']."</h5>
						          	<h5 class='mt-1 text-dark small'>Tsy vita : ".$donne11['total']."</h5>
								</div>
				            </div>
						</div>
						<div class='col-sm-1'></div>
					</div>
					<hr>
					<hr>
					<div class='row'>
						<div class='col-sm-4 text-center'>
						</div>
						<div class='col-sm-8 text-right'>
							<h6 class='mt-0 mb-0 mr-2 text-dark'>DEPARTEMANTA SERASERA/FIRAIKETANA</h6>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 34 24 877 19</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 32 67 925 59</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Email : flm.ambohidratrimo.105@gmail.com</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Facebook : FLM AMBOHIDRATRIMO</small><br>
						</div>
					</div>
				</div>
			";
		}

	}
	
	if (isset($_POST['isaFaritra'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data1 = $modele->GetDataFaritra(1);
		$data2 = $modele->GetDataFaritra(2);
		$data3 = $modele->GetDataFaritra(3);
		$data4 = $modele->GetDataFaritra(4);
		echo "
            <canvas id='pieChart' style='min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;'></canvas>
			<div class='ml-5 mr-5 mt-3 d-flex justify-content-between'>
	            <small class='card text-uppercase text-bold' onclick='GetFaritraDetaille(1)' style='cursor: pointer;color: #f56954;'>Faritra I : ".$data1."</small>
	            <small class='card text-uppercase text-bold' onclick='GetFaritraDetaille(2)' style='cursor: pointer;color: #00a65a;'>Faritra II : ".$data2."</small>
	            <small class='card text-uppercase text-bold' onclick='GetFaritraDetaille(3)' style='cursor: pointer;color: #f39c12;'>Faritra III : ".$data3."</small>
	            <small class='card text-uppercase text-bold' onclick='GetFaritraDetaille(4)' style='cursor: pointer;color: #00c0ef;'>Faritra IV : ".$data4."</small>
			</div>
			<script>
				CreatePieChart(['Faritra I','Faritra II','Faritra III','Faritra IV'], [".$data1.",".$data2.",".$data3.",".$data4."])
			</script>
		";
	}

	if (isset($_POST['isaFaritraDetailleModal']) && !empty($_POST['isaFaritraDetailleModal'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data = $modele->GetDataFaritraDetaille($_POST['isaFaritraDetailleModal']);
		$count = $modele->GetDataFaritra($_POST['isaFaritraDetailleModal']);

		if ($_POST['isaFaritraDetailleModal'] == 1) {
			$soratra = "I";
			$bgcolor = "#f56954";
		}elseif ($_POST['isaFaritraDetailleModal'] == 2) {
			$soratra = "II";
			$bgcolor = "#00a65a";
		}elseif ($_POST['isaFaritraDetailleModal'] == 3) {
			$soratra = "III";
			$bgcolor = "#f39c12";
		}elseif ($_POST['isaFaritraDetailleModal'] == 4) {
			$soratra = "IV";
			$bgcolor = "#00c0ef";
		}else{
			$soratra = "";
			$bgcolor = "";
		}

		if ($data && $data!=NULL) {
			echo "
				<div class='container row'>
					<div class='col-md-12 text-left'>
						<h3 align='right'><button class='btn btn-info' onclick=\"FaritraPdp('".date("Y")."-FARITRA".$soratra."')\" >PDF <i class='fas fa-file-pdf'></i></button></h3>
					</div>
				</div>
				<div id='sdimpirmeit'>
					<div class='mt-3'>
						<div class='d-flex justify-content-center align-items-center text-center'>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
							<div class='ml-5 mr-5'>
					          <h5 class='text-dark'>FIANGONANA LOTERANA MALAGASY</h5>
					          <h5 class='text-dark'>SYNODAM-PARITANY ANTANANARIVO</h5>
					          <h5 class='text-dark'>FILEOVANA AMBOHIBAO</h5>
					          <h5 class='text-dark'>FITANDREMANA TOBY BETESDA AMBOHIBAO</h5>
					          <h3 class='mt-3 text-dark'>FLM AMBOHIDRATRIMO</h3>
					          <h6 class='mb-1 text-secondary'>“ fa izay mitady ny voninahitr’Izay naniraka azy no marina “ Jaona 7 : 18b</h6>
							</div>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
						</div>
					</div>
					<hr>
					<div class='container text-center'>
						<h4 class='text-muted'>FARITRA - ".strtoupper($soratra)." - AMBOHIDRATRIMO (".$count.")</h4>
					</div>
					<table class='mt-2 table table-responsive-xl'>
						<thead class='thead-info'>
					      <tr>
					        <th>Anarana</th>
					        <th>Fanampiny</th>
					        <th>Adiresy</th>
					        <th>Finday</th>
					        <!--<th>Hijery</th>
					        <th>Hanitsy</th>-->
					      </tr>
					    </thead>
					    <tbody>
				";
				foreach ($data as $key => $valueT) {
						echo "
							<tr>
								<td>".$valueT['nomF']."</td>
						      	<td>".$valueT['prenomF']."</td>
						      	<td>".$valueT['AdresseF']."</td>
						      	<td>".$valueT['TelephoneF']."</td>
						      	<!--<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$valueT['idF'].");'><i class='fas fa-eye'></i></button></td>
						      	<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$valueT['idF'].");'><i class='fas fa-edit'></i></button></td>-->
						    </tr>
						";	
				}
			echo "
					    </tbody>
					    <tbody>	
					</table>

					<hr>
					<hr>
					<div class='row'>
						<div class='col-sm-4 text-center'>
						</div>
						<div class='col-sm-8 text-right'>
							<h6 class='mt-0 mb-0 mr-2 text-dark'>DEPARTEMANTA SERASERA/FIRAIKETANA</h6>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 34 24 877 19</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 32 67 925 59</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Email : flm.ambohidratrimo.105@gmail.com</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Facebook : FLM AMBOHIDRATRIMO</small><br>
						</div>
					</div>

				</div>
			";
		}		

	}

	if (isset($_POST['isaFaritraDetaille']) && !empty($_POST['isaFaritraDetaille'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();
		$data1 = $modele->GetDataFaritra($_POST['isaFaritraDetaille']);

		$data2 = $modele->GetDataFaritraParamDesc($_POST['isaFaritraDetaille'], "Batisa", "OK");
		$data3 = $modele->GetDataFaritraParamDesc($_POST['isaFaritraDetaille'], "Batisa", "KO");
		$data4 = $modele->GetDataFaritraParamDesc($_POST['isaFaritraDetaille'], "Mpandray", "OK");
		$data5 = $modele->GetDataFaritraParamDesc($_POST['isaFaritraDetaille'], "Mpandray", "KO");

		if ($_POST['isaFaritraDetaille'] == 1) {
			$soratra = "I";
			$bgcolor = "#f56954";
		}elseif ($_POST['isaFaritraDetaille'] == 2) {
			$soratra = "II";
			$bgcolor = "#00a65a";
		}elseif ($_POST['isaFaritraDetaille'] == 3) {
			$soratra = "III";
			$bgcolor = "#f39c12";
		}elseif ($_POST['isaFaritraDetaille'] == 4) {
			$soratra = "IV";
			$bgcolor = "#00c0ef";
		}else{
			$soratra = "";
			$bgcolor = "";
		}

			echo "
				<div class='card-header' style='background-color: ".$bgcolor." !important'>
		            <h3 class='card-title'>Faritra ".$soratra."</h3>
		            <div class='card-tools'>
		              <button type='button' class='btn btn-tool' data-card-widget='collapse'>
		                <i class='fas fa-minus'></i>
		              </button>
		            </div>
	          	</div>
	          	<div class='card-body'>
		            <div class='row'>
		              <div class='col-lg-4 col-6'>
		                <div class='small-box bg-info' style='background-color: ".$bgcolor." !important'>
		                  <div class='inner'>
		                    <h3>".$data1."</h3>
		                    <p>Fitambarany</p>
		                  </div>
		                    <a style='cursor:pointer;' onclick='GetFaritraDetailleModal(".$_POST['isaFaritraDetaille'].")' class='small-box-footer' data-toggle='modal' data-target='#DetailleFaritra'>Jerena <i class='fas fa-arrow-circle-right'></i></a>
		                </div>
		              </div>
		              <div class='col-lg-7 col-6 text-right'>
	          			
		              </div>
		           </div>
		           <div class='row'>
		              <div class='col-lg-4 col-6'>
		                <div class='small-box bg-info' style='background-color: ".$bgcolor." !important'>
		                  <div class='inner'>
		                    <h3>".$data2."</h3>
		                    <p>Vita Batisa</p>
		                  </div>
		                </div>
		              </div>
		              <div class='col-lg-4 col-6'>
		                <div class='small-box bg-info' style='background-color: ".$bgcolor." !important'>
		                  <div class='inner'>
		                    <h3>".$data3."</h3>
		                    <p>Tsy vita batisa</p>
		                  </div>
		                </div>
		              </div>
		           </div>
		           <div class='row'>
		              <div class='col-lg-4 col-6'>
		                <div class='small-box bg-info' style='background-color: ".$bgcolor." !important'>
		                  <div class='inner'>
		                    <h3>".$data4."</h3>
		                    <p>Mpandray</p>
		                  </div>
		                </div>
		              </div>
		              <div class='col-lg-4 col-6'>
		                <div class='small-box bg-info' style='background-color: ".$bgcolor." !important'>
		                  <div class='inner'>
		                    <h3>".$data5."</h3>
		                    <p>Tsy Mpandray</p>
		                  </div>
		                </div>
		              </div>
		           </div>
	          	</div>
			";
	}

	if (isset($_POST['GetNomerikaDetaille'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$detaille = $_POST['detailleAz'];

		if ($detaille=="all") {
			$donneT = $modele->GetUserAll();
			$donneTM = "";
			$titre = "Fiangonana";
		}
		elseif ($detaille=="th") {
			$donneT = $modele->GetDonneNumFLVDetaille("Lehilahy");
			$donneTM = "";
			$titre = "Lehilahy rehetra";
		}
		elseif ($detaille=="tv") {
			$donneT = $modele->GetDonneNumFLVDetaille("Vehivavy");
			$donneTM = "";
			$titre = "Vehivavy rehetra";
		}
		elseif ($detaille=="bok") {
			$donneTM = $modele->GetDonneNumFFMDetaille("Batisa","OK");
			$donneT = "";
			$titre = "Vita batisa";
		}
		elseif ($detaille=="bko") {
			$donneTM = $modele->GetDonneNumFFMDetaille("Batisa","KO");
			$donneT = "";
			$titre = "Tsy vita batisa";
		}
		elseif ($detaille=="mok") {
			$donneTM = $modele->GetDonneNumFFMDetaille("Mpandray","OK");
			$donneT = "";
			$titre = "Mpandray";
		}
		elseif ($detaille=="mko") {
			$donneTM = $modele->GetDonneNumFFMDetaille("Mpandray","KO");
			$donneT = "";
			$titre = "Tsy mpandray";
		}
		elseif ($detaille=="sok") {
			$donneTM = $modele->GetDonneNumFFMDetaille("Soratra","OK");
			$donneT = "";
			$titre = "Vita soratra";
		}
		elseif ($detaille=="sko") {
			$donneTM = $modele->GetDonneNumFFMDetaille("Soratra","KO");
			$donneT = "";
			$titre = "Tsy vita soratra";
		}
		elseif ($detaille=="maok") {
			$donneTM = $modele->GetDonneNumFFMDetaille("Mariazy","OK");
			$donneT = "";
			$titre = "Vita mariazy";
		}
		elseif ($detaille=="mako") {
			$donneTM = $modele->GetDonneNumFFMDetaille("Mariazy","KO");
			$donneT = "";
			$titre = "Tsy vita mariazy";
		}else{
			$donneTM = NULL;
			$donneT = NULL;
			$titre = NULL;
		}


		if ($donneT && $donneT!=NULL) {
			echo "
				<div class='container row'>
					<div class='col-md-12 text-left'>
						<h3 align='right'><button class='btn btn-info' onclick=\"PDFPDSDIsa('".date("Y")."-".$titre."')\" >PDF <i class='fas fa-file-pdf'></i></button></h3>
					</div>
				</div>
				<div id='sdimpirmeit'>
					<div class='mt-3'>
						<div class='d-flex justify-content-center align-items-center text-center'>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
							<div class='ml-5 mr-5'>
					          <h5 class='text-dark'>FIANGONANA LOTERANA MALAGASY</h5>
					          <h5 class='text-dark'>SYNODAM-PARITANY ANTANANARIVO</h5>
					          <h5 class='text-dark'>FILEOVANA AMBOHIBAO</h5>
					          <h5 class='text-dark'>FITANDREMANA TOBY BETESDA AMBOHIBAO</h5>
					          <h3 class='mt-3 text-dark'>FLM AMBOHIDRATRIMO</h3>
					          <h6 class='mb-1 text-secondary'>“ fa izay mitady ny voninahitr’Izay naniraka azy no marina “ Jaona 7 : 18b</h6>
							</div>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
						</div>
					</div>
					<hr>
					<div class='container text-center'>
						<h5 class='text-muted small'>".strtoupper($titre)." AMBOHIDRATRIMO</h5>
					</div>
					<table class='mt-2 table table-responsive-xl'>
						<thead class='thead-info'>
					      <tr>
					        <th>Anarana</th>
					        <th>Fanampiny</th>
					        <th>Adiresy</th>
					        <th>Finday</th>
					        <!--<th>Hijery</th>
					        <th>Hanitsy</th>-->
					      </tr>
					    </thead>
					    <tbody>
				";
				foreach ($donneT as $key => $valueT) {
						echo "
							<tr>
								<td>".$valueT['nomF']."</td>
						      	<td>".$valueT['prenomF']."</td>
						      	<td>".$valueT['AdresseF']."</td>
						      	<td>".$valueT['TelephoneF']."</td>
						      	<!--<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$valueT['idF'].");'><i class='fas fa-eye'></i></button></td>
						      	<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$valueT['idF'].");'><i class='fas fa-edit'></i></button></td>-->
						    </tr>
						";	
				}
			echo "
					    </tbody>
					    <tbody>	
					</table>

					<hr>
					<hr>
					<div class='row'>
						<div class='col-sm-4 text-center'>
						</div>
						<div class='col-sm-8 text-right'>
							<h6 class='mt-0 mb-0 mr-2 text-dark'>DEPARTEMANTA SERASERA/FIRAIKETANA</h6>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 34 24 877 19</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 32 67 925 59</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Email : flm.ambohidratrimo.105@gmail.com</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Facebook : FLM AMBOHIDRATRIMO</small><br>
						</div>
					</div>

				</div>
			";

		}elseif ($donneTM && $donneTM!=NULL) {
			echo "
				<div class='container row'>
					<div class='col-md-12 text-left'>
						<h3 align='right'><button class='btn btn-info' onclick=\"PDFPDSDIsa('".date("Y")."-".$titre."')\" >PDF <i class='fas fa-file-pdf'></i></button></h3>
					</div>
				</div>
				<div id='sdimpirmeit'>
					<div class='mt-3'>
						<div class='d-flex justify-content-center align-items-center text-center'>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
							<div class='ml-5 mr-5'>
					          <h5 class='text-dark'>FIANGONANA LOTERANA MALAGASY</h5>
					          <h5 class='text-dark'>SYNODAM-PARITANY ANTANANARIVO</h5>
					          <h5 class='text-dark'>FILEOVANA AMBOHIBAO</h5>
					          <h5 class='text-dark'>FITANDREMANA TOBY BETESDA AMBOHIBAO</h5>
					          <h3 class='mt-3 text-dark'>FLM AMBOHIDRATRIMO</h3>
					          <h6 class='mb-1 text-secondary'>“ fa izay mitady ny voninahitr’Izay naniraka azy no marina “ Jaona 7 : 18b</h6>
							</div>
	          				<img src='data/logo.png' width='130' height='130' class='img-circle' alt='FLM105' style='opacity: .8' >
						</div>
					</div>
					<hr>
					<div class='container text-center'>
						<h5 class='text-muted small'>".strtoupper($titre)." AMBOHIDRATRIMO</h5>
					</div>
					<table class='mt-2 table table-responsive-xl'>
						<thead class='thead-info'>
					      <tr>
					        <th>Anarana</th>
					        <th>Fanampiny</th>
					        <th>Adiresy</th>
					        <th>Finday</th>
					        <!--<th>Hijery</th>
					        <th>Hanitsy</th>-->
					      </tr>
					    </thead>
					    <tbody>
				";
				foreach ($donneTM as $key => $valueT) {
						$donneUser = $modele->GetUserId($valueT['idFiangonanaS']);
						echo "
							<tr>
								<td>".$donneUser['nomF']."</td>
						      	<td>".$donneUser['prenomF']."</td>
						      	<td>".$donneUser['AdresseF']."</td>
						      	<td>".$donneUser['TelephoneF']."</td>
						      	<!--<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$valueT['idFiangonanaS'].");'><i class='fas fa-eye'></i></button></td>
						      	<td><button class='btn btn-info btn-block' data-toggle='modal' data-target='#ModifUser' onclick='ModifierUser(".$valueT['idFiangonanaS'].");'><i class='fas fa-edit'></i></button></td>-->
						    </tr>
						";	
				}
			echo "
					    </tbody>
					    <tbody>
					</table>


					<hr>
					<hr>
					<div class='row'>
						<div class='col-sm-4 text-center'>
						</div>
						<div class='col-sm-8 text-right'>
							<h6 class='mt-0 mb-0 mr-2 text-dark'>DEPARTEMANTA SERASERA/FIRAIKETANA</h6>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 34 24 877 19</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Tél : +261 32 67 925 59</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Email : flm.ambohidratrimo.105@gmail.com</small><br>
							<small class='mt-0 mb-0 mr-2 text-muted'>Facebook : FLM AMBOHIDRATRIMO</small><br>
						</div>
					</div>

				</div>
			";
		}



	}




	if (isset($_POST['donneRCF'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$search = $_POST['search'];

		$donne = $modele->GetUserSearchOne($search);

		if ($donne) {
			echo "
					<table class='table table-responsive-xl'>
			";
			foreach ($donne as $key => $value) {
				$donneVerifi = $modele->GetUserMpandray($value['idF']);
				if ($donneVerifi['Mpandray']=="OK") {
					$addK = "<td><button class='btn btn-info' onclick='AddKaratra(".$value['idF'].")'>Hampiditra</button></td>";
				}else{
					$addK = "<td><button class='btn btn-info' disabled>Tsy mbola mpandray</button></td>";
				}
				echo "
	                   <tr>
	                     <td><h4>".$value['nomF']." ".$value['prenomF']."</h4></td>
	                     ".$addK."
	                     <td><button class='btn btn-info'  data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$value['idF'].");'>Hijery</button></td>
	                   </tr>
				";
			}
			echo "
	                 </table>
			";

		}else{
			echo "Tsy misy ny olona tedavinao !";
		}
	}
	if (isset($_POST['donneRNumKara'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$numero = $_POST['searchNum'];

		$donne = $modele->GetUserSearchKartra($numero);

		if ($donne) {
			echo "
					<table class='table table-responsive-xl'>
	                   <tr class='table-info'>
	                     <td>".$donne['nomF']." ".$donne['prenomF']."</td>
	                     <td>
	                     	<button class='btn btn-info' onclick='Adidy(".$donne['numero'].",".$donne['idFiangonanaNF'].")'>Mombamomba</button>
	                     </td>
	                   </tr>
	                 </table>
			";

		}else{
			echo "Tsy misy ny numero karatra tedavinao !";
		}
	}
	if (isset($_POST['donneRCFSuite'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$idPer = $_POST['idPer'];

		$donne = $modele->GetUserId($idPer);

		echo "
				<div class='form-group'>
                    <label>".$donne['nomF']." ".$donne['prenomF']."</label>
                    <input type='number' class='form-control form-control-lg' placeholder='Numero karatra...' min='0' id='numKaratra'>
                    <input type='text' value='".$idPer."' hidden id='karatraPer'>
                 </div>
                 <button class='btn btn-info' onclick='AddKaratraSuite()'>Ampidirina</button>
                 <button class='btn btn-info'  data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$idPer.");'>Hijery</button>
		";
	}

	if (isset($_POST['addKaraD'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		include '../../modele/modele.notif.php';
		$modeleNotif = new Notification();
		$modele = new Membre();

		$idAdmin = $_POST['idAdmin'];
		$numero = $_POST['numero'];
		$idF = $_POST['karatra'];

		$donne = $modele->AddKaratraUser($idF,$numero);

		if ($donne=="ok") {
			$donneKaratra = $modele->GetLastKaratra();
			$modele->AddAdidyKaratra($donneKaratra['lastIdKaratra']);
			$descN = "AJOUT KARATRA";
			$modeleNotif->AddNotif($idAdmin,$descN);
			echo "ok";

		}else{
			$donneUser = $modele->GetUserKartraIDF($idF);
			echo "Efa manana numero karatra i ".$donneUser['nomF']." ".$donneUser['prenomF']." : ".$donneUser['numero'];
		}

	}



	if (isset($_POST['recupAdidy'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$numero = $_POST['numeroKA'];
		$idUser = $_POST['idUser'];
		$donne = $modele->GetAdidy($numero);
		if ($donne) {
				$validK = 0;
				$donneUser = $modele->GetUserId($idUser);
				foreach ($donne as $key => $value) {
					$validK = $value['idKaratra'];
				}
				echo "
					<section class='content'>
				            <div class='card card-solid'>
				              <div class='card-header'>
				                <h3 class='card-title text-muted'>Adidy <i class='fas fa-sign-language'></i></h3>
				              </div>
				              <div class='card-body'>
					              	<div class='card-tools'>
					              		<button class='btn btn-info' data-toggle='modal' data-target='#AdidyAndoa' onclick='AdidyAndoaCom(".$numero.")'>Andoa Adidy</button>
	                     				<button class='btn btn-info'  data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$idUser.");'>Hijery</button>
					              		<button class='btn btn-info' onclick=\"PDFAdidy('".$donneUser['nomF']." ".$donneUser['prenomF']."')\">PDF</button>
					              		<button class='btn btn-info' onclick='Supkaratra(".$numero.",".$validK.")'>Hamafa</button>
					              	</div>
				              	<hr>
				              	<span id='detailleAdidy'>
					            <h6 class='text-muted'>Anarana : ".$donneUser['nomF']." ".$donneUser['prenomF']."</h6><br>
				                <table class='table table-responsive-xl'>
				                  <thead class='thead-dark'>
				                      <tr>
				                        <th>TAONA</th>
				                        <th>Janoary</th>
				                        <th>Febroary</th>
				                        <th>Martsa</th>
				                        <th>Aprily</th>
				                        <th>May</th>
				                        <th>Jona</th>
				                        <th>Jolay</th>
				                        <th>Aogositra</th>
				                        <th>Septambra</th>
				                        <th>Oktobra</th>
				                        <th>Novambra</th>
				                        <th>Desambra</th>
				                      </tr>
				                  </thead>
				                  <tbody>
				                  ";
										foreach ($donne as $key => $value) {
										echo "				                  
										        <tr>
										            <td>".$value['TAONA']."</td>
										            <td>".$value['Janvier']." Ar</td>
										            <td>".$value['Fevrier']." Ar</td>
										            <td>".$value['Mars']." Ar</td>
										            <td>".$value['Avril']." Ar</td>
										            <td>".$value['Mai']." Ar</td>
										            <td>".$value['Juin']." Ar</td>
										            <td>".$value['Juillet']." Ar</td>
										            <td>".$value['Aout']." Ar</td>
										            <td>".$value['Septembre']." Ar</td>
										            <td>".$value['Octobre']." Ar</td>
										            <td>".$value['Novembre']." Ar</td>
										            <td>".$value['Decembre']." Ar</td>
										        </tr>
										";
										}
				echo "				                      
				                  </tbody>
				                </table>
				               </span>

				              </div>
				            </div>
				</section>
				";
		}else{
			echo "Erreur";
		}
	}

	if (isset($_POST['recupAdidyAndo'])) {
		include '../../modele/modele.membre.php';
		include '../../config/connex.php';
		$modele = new Membre();

		$numero = $_POST['numero'];
		$donne = $modele->GetAdidy($numero);
		$idUser = 0;

		$date1 = date("Y")+1;
		$date2 = date("Y")+2;
		$date3 = date("Y")+3;
		$date4 = date("Y")+4;

		if ($donne) {
			foreach ($donne as $key => $valueN) {
				$idUser = $valueN['idFiangonanaNF'];
			}
			$donneUser = $modele->GetUserId($idUser);
			echo "
				<div class='modal-header'>
					        <h4 class='modal-title'>FLM AMBOHIDRATRIMO (ADIDY)</h4>
					        <button type='button' class='close' data-dismiss='modal'>×</button>
				    </div>
					<div class='modal-body'>
						<div class='row'>
							<h4 align='left' class='col text-muted'>".$donneUser['nomF']." ".$donneUser['prenomF']."<br><small>Karatra : ".$numero."</small></h4>
							<h4 align='right' class='col'><button class='btn btn-info btn-sm' data-toggle='modal' data-target='#DetailleUser' onclick='DetailleUser(".$idUser.");'><i class='fas fa-eye'></i></button>
							</h4>
						</div>
							<hr>
						<form method='POST' action='controller/controllerMembre/controller.membre.php' target='envoie' id='andA'>
							<div class='row'>
								<div class='col'>
									<div class='form-group'>
										<label for='montantA'>Toe-bola (Ariary)</label>
										<input type='text' class='form-control' name='montantA'  placeholder='Ampidiro...' required />
										<input type='text' value='".$numero."' name='numeroA' hidden />
										<label for='taonaA'>TAONA</label>
										<select class='form-control' name='taonaA' required>
											<option selected disabled></option>
											<option>".date("Y")."</option>
											<option>".$date1."</option>
											<option>".$date2."</option>
											<option>".$date3."</option>
											<option>".$date4."</option>
										</select>
									</div>
								</div>
								<div class='col'>
									<label for='montantA'>Volana (Tsinjina izay volana handoavana)</label>
									<div class='row'>
										<div class='col'>
											<div class='form-group'>
												<input type='checkbox' name='janA' id='janA' />
												<label for='janA'>Janoary</label>
											</div>

											<div class='form-group'>
												<input type='checkbox' name='febA' id='febA' />
												<label for='febA'>Febroary</label>
											</div>
										</div>
										<div class='col'>
											<div class='form-group'>
												<input type='checkbox' name='martA' id='martA' />
												<label for='martA'>Martsa</label>
											</div>
											<div class='form-group'>
												<input type='checkbox' name='apriA' id='apriA' />
												<label for='apriA'>Aprily</label>
											</div>
										</div>
										<div class='col'>
											<div class='form-group'>
												<input type='checkbox' name='mayA' id='mayA' />
												<label for='mayA'>May</label>
											</div>
											<div class='form-group'>
												<input type='checkbox' name='jonA' id='jonA' />
												<label for='jonA'>Jona</label>
											</div>
										</div>
									</div>
									<div class='row'>
										<div class='col'>
											<div class='form-group'>
												<input type='checkbox' name='jolA' id='jolA' />
												<label for='jolA'>Jolay</label>
											</div>
											<div class='form-group'>
												<input type='checkbox' name='aogA' id='aogA' />
												<label for='aogA'>Aogositra</label>
											</div>
										</div>
										<div class='col'>
											<div class='form-group'>
												<input type='checkbox' name='sepA' id='sepA' />
												<label for='sepA'>Septambra</label>
											</div>
											<div class='form-group'>
												<input type='checkbox' name='oktA' id='oktA' />
												<label for='oktA'>Oktobra</label>
											</div>
										</div>
										<div class='col'>
											<div class='form-group'>
												<input type='checkbox' name='novA' id='novA' />
												<label for='novA'>Novambra</label>
											</div>
											<div class='form-group'>
												<input type='checkbox' name='decA' id='decA' />
												<label for='decA'>Desambra</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button class='btn btn-info btn-block' type='submit' name='aloa'>Andoa</button>
						</form>
				    </div><br>

				    <table class='table table-responsive-xl'>
				                  <thead class='thead-dark'>
				                      <tr>
				                        <th>TAONA</th>
				                        <th>Janoary</th>
				                        <th>Febroary</th>
				                        <th>Martsa</th>
				                        <th>Aprily</th>
				                        <th>May</th>
				                        <th>Jona</th>
				                        <th>Jolay</th>
				                        <th>Aogositra</th>
				                        <th>Septambra</th>
				                        <th>Oktobra</th>
				                        <th>Novambra</th>
				                        <th>Desambra</th>
				                      </tr>
				                  </thead>
				                  <tbody>
			";
									foreach ($donne as $key => $value) {
										echo "				                  
										        <tr>
										            <td>".$value['TAONA']."</td>
										            <td>".$value['Janvier']." Ar</td>
										            <td>".$value['Fevrier']." Ar</td>
										            <td>".$value['Mars']." Ar</td>
										            <td>".$value['Avril']." Ar</td>
										            <td>".$value['Mai']." Ar</td>
										            <td>".$value['Juin']." Ar</td>
										            <td>".$value['Juillet']." Ar</td>
										            <td>".$value['Aout']." Ar</td>
										            <td>".$value['Septembre']." Ar</td>
										            <td>".$value['Octobre']." Ar</td>
										            <td>".$value['Novembre']." Ar</td>
										            <td>".$value['Decembre']." Ar</td>
										        </tr>
										";
									}
			echo "
								   </tbody>
				</table>
			";	
		}

	}

	if (isset($_POST['aloa'])) {
			include '../../modele/modele.membre.php';
			include '../../config/connex.php';
			$modele = new Membre();
			
			$montant = $_POST['montantA'];
			$numero = $_POST['numeroA'];
			$taona = $_POST['taonaA'];
			
			$idK = 0;
			$idUser = 0;
			$donne = $modele->GetAdidy($numero);
			foreach ($donne as $key => $value) {
				$idK = $value['idNF'];
				$idUser = $value['idFiangonanaNF'];
			}


			isset($_POST['janA']) ? $jan = "OK" : $jan = "KO";
			isset($_POST['febA']) ? $fev = "OK" : $fev = "KO";
			isset($_POST['martA']) ? $mars = "OK" : $mars = "KO";
			isset($_POST['apriA']) ? $apv = "OK" : $apv = "KO";
			isset($_POST['mayA']) ? $may = "OK" : $may = "KO";
			isset($_POST['jonA']) ? $juin = "OK" : $juin = "KO";
			isset($_POST['jolA']) ? $juillet = "OK" : $juillet = "KO";
			isset($_POST['aogA']) ? $aout = "OK" : $aout = "KO";
			isset($_POST['sepA']) ? $sept = "OK" : $sept = "KO";
			isset($_POST['oktA']) ? $oct = "OK" : $oct = "KO";
			isset($_POST['novA']) ? $nove = "OK" : $nove = "KO";
			isset($_POST['decA']) ? $dece = "OK" : $dece = "KO";			

			$modele->AdidyUpdate($montant,$idK,$taona,$jan,$fev,$mars,$apv,$may,$juin,$juillet,$aout,$sept,$oct,$nove,$dece)

	?>

<script type="text/javascript">
	window.top.window.alert('Vita tompoko');
	window.top.window.AdidyAndoaCom(<?php echo $numero; ?>);
	window.top.window.Adidy(<?php echo $numero ; ?>,<?php echo $idUser; ?>);
</script>

<?php	
	}

	if (isset($_POST['removeKaratra'])) {
			include '../../modele/modele.membre.php';
			include '../../config/connex.php';
			include '../../modele/modele.notif.php';
			$modeleNotif = new Notification();
			$modele = new Membre();
			
			$numero = $_POST['numeroR'];
			$idAdmin = $_POST['idAdmin'];
			$idKaratra = $_POST['idKR'];
			
			$modele->RemoveKaratraManAh($numero,$idKaratra);

			$descN = "SUPPRESSION KARATRA";
			$modeleNotif->AddNotif($idAdmin,$descN);

			echo "OK";
	}




?>