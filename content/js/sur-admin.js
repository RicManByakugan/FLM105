// function Valide() {
	// 	var AjoutPublication= document.getElementById('AjoutPublication');
	// 	AjoutPublication.reset();
	// 	RecupAllProduit();
	// }
	// function ValideModif() {
	// 	RecupAllProduit();
	// 	var modifUserModif = document.getElementById('modifUserModif');
	// 	modifUserModif.style.display = "none";
	// }
	function AfficheImage(input,output) {
		var o = document.getElementById(output);
		o.style.display = "block";
		o.src = window.URL.createObjectURL(input.files[0]);
		setTimeout(function() {
			o.style.display = "none";
		}, 10000);
	}
	function AnnulerModi() {
		var ModifPublication= document.getElementById('ModifPublication');
		ModifPublication.reset();
		RecupAllProduit();
		var modifUserModif = document.getElementById('modifUserModif');
		modifUserModif.style.display = "none";
	}
	function RecupActiviteProduit(id,categorie) {
		var url = "../../../controller/publication/controller.publication.php";
		var id = document.getElementById(id);
        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        RecupAct: categorie
	        }),
	        dataType: "text",
	        success: function(res) {
                id.innerHTML = res;
	        }
        });
	}
	function modifPub(idPub) {
		var url = "../../../controller/publication/controller.publication.php";
		var modifUserModif = document.getElementById('modifUserModif');
		var idPubModif = document.getElementById('idPubModif');
		var nomModifAff = document.getElementById('nomModifAff');


		modifUserModif.style.display = "block";
		location = "#modifUserModif";
	
		idPubModif.value = idPub;

        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        RecupPub: idPub
	        }),
	        dataType: "text",
	        success: function(res) {
                $("#nomModifAff").html(res);
	        }
        });

		// nomModifAff.innerHTML = nom;

	}
	function supPub(idPub) {
        <?php //if ($donneAdmin['poste_admin']=="INFORMATIQUE") { ?>
			if (confirm("Supprimer cette publication ?")) {
				var url = "../../../controller/publication/controller.publication.php";
		        $.ajax({
			        type: "POST",
			        url: url,
			        data: ({
				        SupPub: idPub,
				        idAdmin: <?php echo $id_admin; ?>
			        }),
			        dataType: "text",
			        success: function(res) {
			        	if (res=="OK") {
		                	RecupAllProduit();
			        	}
			        }
		        });
			}
		<?php //}else{ ?>
			//alert("Vous ne pouvez pas effectuer ce demande. Contactez l'administration");
		<?php //} ?>
	}
	function RecupAllProduit() {
		var url = "../../../controller/publication/controller.publication.php";
        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        RecupProduit: "go"
	        }),
	        dataType: "text",
	        success: function(res) {
                $("#listeProduit").html(res);
	        }
        });
    	RecupActiviteProduit('produitHighTech','HIGHTECH');
        RecupActiviteProduit('produitVetement','VETEMENT');
    	RecupActiviteProduit('produitAgro','AGROALIMENTAIRE');
    	RecupActiviteProduit('produitJouer','JOUER');
    	RecupActiviteProduit('produitAccessoire','ACCESSOIRE');
	}
	$(document).ready(function(){
    	RecupAllProduit();
    	setInterval("RecupAllProduit()",1000);
    });