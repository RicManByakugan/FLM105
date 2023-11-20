
<section class="content-header container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-sign-language"></i>  Adidy</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-dark"><?php echo $user['nomA']." ".$user['prenomA']; ?></a></a></li>
              <li class="breadcrumb-item active">Adidy</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<script src="content/jquery/jquery.min.js"></script>
<script src="content/pdf/jszip.min.js"></script>
<script src="content/pdf/kendo.all.min.js"></script>
<script type="text/javascript">
  function PDFAdidy(titre) {
    alert("Miandrasa kely");
    kendo.drawing
        .drawDOM("#detailleAdidy", 
        { 
            paperSize: "A2",
            margin: { top: "1cm", bottom: "1cm" },
            scale: 0.8,
            height: 500
        })
        .then(function(group){
            kendo.drawing.pdf.saveAs(group, "FLM-ADIDY::"+titre+".pdf");
        });
  }
  function RechercheCF() {
    var search = document.getElementById('tenaIR');
    var url = "controller/controllerMembre/controller.membre.php";
    if (search.value != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donneRCF: "go",
                  search: search.value
                }),
                dataType: "text",
                success: function(res) {
                    $("#listeresM").html(res);
                    $("#addKaratraaa").html("");
                }
            });
    }else{
            alert("Mampidirà anarana ohatra");
    }
  }
  function RechercheKaratra() {
    var numero = document.getElementById('numeroSearch');
    var url = "controller/controllerMembre/controller.membre.php";
    if (numero.value != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donneRNumKara: "go",
                  searchNum: numero.value
                }),
                dataType: "text",
                success: function(res) {
                    $("#listeRKaratra").html(res);
                }
            });
    }else{
            alert("Mampidirà karatra");
    }
  }
  function AddKaratra(id) {  
            $("#listeresM").html("");  
            var url = "controller/controllerMembre/controller.membre.php";
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donneRCFSuite: "go",
                  idPer: id
                }),
                dataType: "text",
                success: function(res) {
                    $("#addKaratraaa").html(res);
                }
            });
    
  }
  function AddKaratraSuite(id) {
    var url = "controller/controllerMembre/controller.membre.php";
    var numKaratra = document.getElementById('numKaratra');
    var karatraPer = document.getElementById('karatraPer');
    if (numKaratra.value != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  addKaraD: "go",
                  numero: numKaratra.value,
                  idAdmin: <?php echo $idUser; ?>,
                  karatra: karatraPer.value
                }),
                dataType: "text",
                success: function(res) {
                  if (res=="ok") {
                    alert('Vita tompoko');
                    $("#addKaratraaa").html("");
                  }else{
                    alert(res);
                    $("#listeresM").html("");
                    $("#addKaratraaa").html("");
                  }
                }
            });
    }else{
            alert("Mampidirà numero karatra");
    }
  }
  function Adidy(idKaratra,id) {
            var url = "controller/controllerMembre/controller.membre.php";
             $.ajax({
                type: "POST",
                url: url,
                data: ({
                  recupAdidy: "go",
                  numeroKA: idKaratra,
                  idUser: id
                }),
                dataType: "text",
                success: function(res) {
                    $("#adidyUser").html(res);
                }
            });
  }
  function AdidyAndoaCom(numero) {
          var url = "controller/controllerMembre/controller.membre.php";
             $.ajax({
                type: "POST",
                url: url,
                data: ({
                  recupAdidyAndo: "go",
                  numero: numero
                }),
                dataType: "text",
                success: function(res) {
                    $("#adidyhtml").html(res);
                }
            });
  }
  function Supkaratra(numero,idKaratra) {
    if (confirm("FAFANA NY KARATRA MITONDRA LAHARANA : "+numero+" ?")) {
        var url = "controller/controllerMembre/controller.membre.php";
             $.ajax({
                type: "POST",
                url: url,
                data: ({
                  removeKaratra: "go",
                  numeroR: numero,
                  idAdmin: <?php echo $idUser; ?>,
                  idKR: idKaratra
                }),
                dataType: "text",
                success: function(res) {
                  if (res=="OK") {
                    alert('Vita tompoko');
                    window.location.reload();
                  }else{
                    alert(res);
                  }
                }
            });
    }
  }
</script>

<div class="container"> 
  <div class="row">
    <div class="col-lg-6">
        <section class="content">
              <div class="card card-solid">
                <div class="card-header">
                  <h3 class="text-muted">Hampiditra <i class="fas fa-plus"></i></h3>
                </div>
                <div class="card-body">
                  <label>Anarana | Fanampiny</label>
                  <div class="input-group input-group-lg">
                      <input type="search" class="form-control form-control-lg" placeholder="Hitady krisitanina..." id="tenaIR">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default" onclick="RechercheCF();">
                        <i class="fa fa-search"></i>
                        </button>
                      </div>
                   </div>
                   <span id="listeresM"></span>
                   <hr>
                   <span id="addKaratraaa"></span>
                </div>
              </div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="content">
              <div class="card card-solid">
                <div class="card-header">
                  <h3 class="text-muted">Hijery <i class="fas fa-eye"></i></h3>
                </div>
                <div class="card-body">
                  <label>Karatra mpandray</label>
                  <div class="input-group input-group-lg">
                      <input type="number" class="form-control form-control-lg" placeholder="Numero karatra mpandray..." id="numeroSearch" min="0">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default" onclick="RechercheKaratra();">
                        <i class="fa fa-search"></i>
                        </button>
                      </div>
                   </div>
                   <span id="listeRKaratra"></span>
                   <hr>
                </div>
              </div>
        </section>
    </div>
  </div>
  <span id="adidyUser"></span>
</div>
