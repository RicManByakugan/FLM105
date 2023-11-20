<section class="content-header container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-street-view"></i>  Tatitra nomerika</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-dark"><?php echo $user['nomA']." ".$user['prenomA']; ?></a></a></li>
              <li class="breadcrumb-item active">Tatitra nomerika</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content container">
      <div class="row">
        
        <div class="col">
          <div class="card card-solid">
            <div class="card-body">
                <div class="card-header">
                  <h3 class="card-title">Fiangonana</h3>
                  <div class="card-tools">
                    <button class="btn btn-info" onclick="GetFiangonana();">Hijery</button>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card card-solid">
            <div class="card-body">
                <div class="card-header">
                  <h3 class="card-title">Sampana</h3>
                  <div class="card-tools">
                    <button class="btn btn-info" data-toggle='collapse' href='#hijeryS'>Hijery</button>
                  </div>
                </div>
                <div class="card-body collapse" id="hijeryS">
                  <div class="">
                      <button class="btn btn-info" onclick="GetSampanaNomerika('FDL');">FDL</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('FBL');">FBL</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('TMM');">TMM</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('FIFIL');">FIFIL</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('KTLM');">KTLM</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('VLM');">VLM</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('SALOMA');">SALOMA</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('DIAKONA');">DIAKONA</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('SKOTO');">SKOTO</button>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card card-solid">
            <div class="card-body">
                <div class="card-header">
                  <h3 class="card-title">Departemanta</h3>
                  <div class="card-tools">
                    <button class="btn btn-info" data-toggle='collapse' href='#hijeryD'>Hijery</button>
                  </div>
                </div>
                <div class="card-body collapse" id="hijeryD">
                  <div class="row">
                      <button class="btn btn-info" onclick="GetSampanaNomerika('DSERA');">SERASERA</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('DFITAOVANA');">FITAOVANA</button>
                      <button class="btn btn-info" onclick="GetSampanaNomerika('DMOZIKA');">HIRA SY MOZIKA</button> 
                      <button class="btn btn-info" onclick="GetSampanaNomerika('DFIRAKETANA');">FIRAKETANA</button>
                  </div>
                </div>
            </div>
          </div>
        </div>

      </div>
</section>


<!-- <section class="content">
      <div class="card card-solid">
        <div class="card-body">
          
          <div class="row">
            <div class="col">
              <h5 class="text-muted">Fiangonana</h5><hr>
              <button class="btn btn-info" onclick="GetFiangonana();">Hijery</button>
            </div>

            <div class="col">
              <h5 class="text-muted">Sampana</h5><hr>
              
            </div>

            <div class="col">
              <h5 class="text-muted">Departemanta</h5><hr>
              <button class="btn btn-info" onclick="GetSampanaNomerika('DSERA');">SERASERA</button>
              <button class="btn btn-info" onclick="GetSampanaNomerika('DMOZIKA');">HIRA SY MOZIKA</button>
              <button class="btn btn-info" onclick="GetSampanaNomerika('DFITAOVANA');">FITAOVANA</button>
              <button class="btn btn-info" onclick="GetSampanaNomerika('DFIRAKETANA');">FIRAKETANA</button>
            </div>

          </div>
        

        </div>
      </div>
</section> -->


<script src="content/jquery/jquery.min.js"></script>
<script src="content/pdf/jszip.min.js"></script>
<script src="content/pdf/kendo.all.min.js"></script>
<script type="text/javascript">
  function PDFPDFIsa(titre) {
      alert("Miandry kely");
        kendo.drawing
        .drawDOM("#imprimeFFFF", 
        { 
            paperSize: "A2",
            margin: { top: "1cm", bottom: "1cm" },
            scale: 0.8,
            height: 500
        })
        .then(function(group){
            kendo.drawing.pdf.saveAs(group, "FLM::"+titre+".pdf");
        });
  }
  function PDFPDSDIsa(titre) {
      alert("Miandry kely");
        kendo.drawing
        .drawDOM("#sdimpirmeit", 
        { 
            paperSize: "A2",
            margin: { top: "1cm", bottom: "1cm" },
            scale: 0.8,
            height: 500
        })
        .then(function(group){
            kendo.drawing.pdf.saveAs(group, "FLM::"+titre+".pdf");
        });
  }

  function GetFiangonana() {
          $("#donneNomerika").html("<div class='col text-center'><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          $.ajax({
                type: "POST",
                url: url,
                data: ({
                  FianNomerija: "alefa"
                }),
                dataType: "text",
                success: function(res) {
                  $("#donneNomerika").html(res);
                }
          });
  }
  function GetFiangonanaNomerikaDetaille(detaille) {
          $("#detailleFiango").html("<div class='col text-center'><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          $.ajax({
                type: "POST",
                url: url,
                data: ({
                  GetNomerikaDetaille: "go",
                  detailleAz: detaille
                }),
                dataType: "text",
                success: function(res) {
                  $("#detailleFiango").html(res);
                }
          });
  }
  function GetSampanaNomerika(donne) {
          $("#donneNomerika").html("<div class='col text-center'><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          $.ajax({
                type: "POST",
                url: url,
                data: ({
                  SampaGetNomerika: donne
                }),
                dataType: "text",
                success: function(res) {
                  $("#donneNomerika").html(res);
                }
          });
  }
  function GetSampanaNomerikaDetaille(donne,detaille) {
          $("#detailleSampanaNom").html("<div class='col text-center'><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          $.ajax({
                type: "POST",
                url: url,
                data: ({
                  SampaGetNomerikaDetaille: donne,
                  detailleAz: detaille
                }),
                dataType: "text",
                success: function(res) {
                  $("#detailleSampanaNom").html(res);
                }
          });
  }
</script>

<span id="donneNomerika"></span>