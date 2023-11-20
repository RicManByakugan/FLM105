
<section class="content-header container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-home"></i>  Fiangonana</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-dark"><?php echo $user['nomA']." ".$user['prenomA']; ?></a></li>
              <li class="breadcrumb-item active">Fiangonana</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<section class="content container">
      <div class="card card-solid collapsed-card">
        <div class="card-header">
          <h4 class="card-title">Birao</h4>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
          </div>
        </div>
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch" id="listeBirao"></div>
        </div>
      </div>
</section>
<section class="content container">
      <div class="card card-solid collapsed-card">
        <div class="card-header">
          <h4 class="card-title">Fanorenana</h4>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
          </div>
        </div>
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch" id="listeFan"></div>
        </div>
      </div>
</section>
<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
     function GetBirao() {
            $("#listeBirao").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
            var url = "controller/controllerMembre/controller.membre.php";
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donnedetailleBirao: "birao",
                }),
                dataType: "text",
                success: function(res) {
                    $("#listeBirao").html(res);
                }
            });
    }
    function GetFanorenana() {
            $("#listeFan").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
            var url = "controller/controllerMembre/controller.membre.php";
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donnedetailleBirao: "fanorenana",
                }),
                dataType: "text",
                success: function(res) {
                    $("#listeFan").html(res);
                }
            });
    }
    function AllF() {
      GetBirao();
      GetFanorenana();
    }
    AllF();
</script>