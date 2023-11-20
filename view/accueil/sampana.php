<section class="content-header container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-cubes"></i>  Sampana</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-dark"><?php echo $user['nomA']." ".$user['prenomA']; ?></a></li>
              <li class="breadcrumb-item active">Sampana</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content container">
      <div class="card card-solid">
        <div class="card-body">
          <div class="col" style="text-align: center;">
            <button class="btn btn-info" onclick="GetSampana('FDL');">FDL</button>
            <button class="btn btn-info" onclick="GetSampana('FBL');">FBL</button>
            <button class="btn btn-info" onclick="GetSampana('TMM');">TMM</button>
            <button class="btn btn-info" onclick="GetSampana('FIFIL');">FIFIL</button>
            <button class="btn btn-info" onclick="GetSampana('KTLM');">KTLM</button>
            <button class="btn btn-info" onclick="GetSampana('VLM');">VLM</button>
            <button class="btn btn-info" onclick="GetSampana('SALOMA');">SALOMA</button>
            <button class="btn btn-info" onclick="GetSampana('DIAKONA');">DIAKONA</button>
            <button class="btn btn-info" onclick="GetSampana('SKOTO');">SKOTO</button>
          </div>
        </div>
      </div>
</section>
<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
    function GetSampana(sampana) {
          $("#sampanaId").html("<div class='col text-center'><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          $.ajax({
                type: "POST",
                url: url,
                data: ({
                  SampaGet: sampana
                }),
                dataType: "text",
                success: function(res) {
                  $("#sampanaId").html(res);
                }
          });
    }
    function RechercheSampana(sampana) {
          $("#listSampanaS").html("<div class='col text-center'><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          var t = document.getElementById('toeranaM');
          var s = document.getElementById('sexeM');
          var search = document.getElementById('tenaIM');
          if (search.value != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donneRS: sampana,
                  t: t.value,
                  s: s.value,
                  search: search.value
                }),
                dataType: "text",
                success: function(res) {
                    $("#listSampanaS").html(res);
                }
            });
          }else{
              $("#listSampanaS").html("");
              alert('Mampidira anarana, fanampiny na finday');
          }
    }
</script>
<span id="sampanaId"></span>