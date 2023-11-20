
<section class="content-header container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-server"></i>  Departemanta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-dark"><?php echo $user['nomA']." ".$user['prenomA']; ?></a></a></li>
              <li class="breadcrumb-item active">Departemanta</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content container">
      <div class="card card-solid">
        <div class="card-body">
          <div class="col" style="text-align: center;">
            <button class="btn btn-info" onclick="GetDeparte('DSERA');">SERASERA</button>
            <button class="btn btn-info" onclick="GetDeparte('DMOZIKA');">HIRA SY MOZIKA</button>
            <button class="btn btn-info" onclick="GetDeparte('DFITAOVANA');">FITAOVANA</button>
            <button class="btn btn-info" onclick="GetDeparte('DFIRAKETANA');">FIRAKETANA</button>
          </div>
        </div>
      </div>
</section>
<script type="text/javascript">
    function GetDeparte(depart) {
          $("#departId").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          $.ajax({
                type: "POST",
                url: url,
                data: ({
                  DepartGet: depart
                }),
                dataType: "text",
                success: function(res) {
                  $("#departId").html(res);
                }
          });
    }
    function RechercheDepart(depart) {
          $("#listDepartS").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          var t = document.getElementById('toeranaMD');
          var s = document.getElementById('sexeMD');
          var search = document.getElementById('tenaIMD');
          if (search.value != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donneRD: depart,
                  t: t.value,
                  s: s.value,
                  search: search.value
                }),
                dataType: "text",
                success: function(res) {
                    $("#listDepartS").html(res);
                }
            });
          }else{
              $("#listDepartS").html("");
              alert('Mampidira anarana, fanampiny na finday');
          }
    }
</script>
<span id="departId"></span>