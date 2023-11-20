<section class="container content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-envelope-open"></i> Hafatra</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-dark"><?php echo $user['nomA']." ".$user['prenomA']; ?></a></li>
              <li class="breadcrumb-item active">Hafatra</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content container">
    <div class="card card-solid">
      <div class="card-body pb-0">

        <div class="row">
          <div class="col-sm-4 text-left">
            <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#newMana">Vaovao</button>
          </div>
          <div class="col-sm-4 text-center">
            <div class="input-group">
                <input type="search" id="searchManaVal" class="form-control form-control-lg" placeholder="Hitady...">
                <div class="input-group-append">
                    <button onclick="searchMana()" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
          </div>
          <div class="col-sm-4 text-right">
            <button class="btn btn-info btn-lg" onclick="Anio()">Anio</button>
            <button class="btn btn-info btn-lg" onclick="GetManMois()">Ito volana ito</button>
            <div class="btn-group">
              <button type="button" class="btn btn-info btn-lg">PDF</button>
              <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(1)">Janoary</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(2)">Febroary</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(3)">Martsa</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(4)">Aprily</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(5)">May</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(6)">Jona</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(7)">Jolay</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(8)">Aogositra</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(9)">Septambra</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(10)">Oktobra</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(11)">Novambra</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#listManaPDFCon" onclick="listManaPDF(12)">Desambra</a>
              </div>
            </div>
            <!-- <button class="btn btn-info btn-sm" onclick="Vider()">Fafana</button> -->
          </div>
        </div>
        <hr class="mt-4 mb-4">
        <div class="row" id="listMana"></div>
      </div>
    </div>
</section>

<!-- <script src="content/jquery/jquery.min.js"></script> -->
<script src="content/pdf/jszip.min.js"></script>
<script src="content/pdf/kendo.all.min.js"></script>

<!-- <script src="content/plugins/jquery/jquery.min.js"></script> -->
<script src="content/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="content/dist/js/adminlte.min.js"></script>
<script src="content/dist/js/demo.js"></script>

<script type="text/javascript">
  function PDFMANA(titre) {
      alert("Miandry kely");
        kendo.drawing
        .drawDOM("#pdfmanamilayeuh", 
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
  function Vider() {
    if (confirm("Tena fafana ?")) {
      var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            viderMana: "mana",
          }),
          dataType: "text",
          success: function(res) {
            if (res === "ok") {
              GetMan()
            }else{
              alert(res)
            }
          }
      });
    }
  }
  function EditMana(id) {
    $("#EditManaFormContent").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
    var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            editM: id,
          }),
          dataType: "text",
          success: function(res) {
            $("#EditManaFormContent").html(res)
          }
      });
  }
  function DeleteHafatra(id) {
    if (confirm("Tena hamafa ?")) {
      $("#EditManaFormContent").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
        var url = "controller/controllerMembre/controller.membre.php";
        $.ajax({
            type: "POST",
            url: url,
            data: ({
              editMdelete: id,
            }),
            dataType: "text",
            success: function(res) {
              $("#EditManaFormContent").html("")
              GetMan()
            }
        });
    }
  }
  function searchMana() {
      $("#listMana").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
      if ($("#searchManaVal").val() != "") {
        var url = "controller/controllerMembre/controller.membre.php";
        $.ajax({
            type: "POST",
            url: url,
            data: ({
              searchManaVal: $("#searchManaVal").val()
            }),
            dataType: "text",
            success: function(res) {
                $("#listMana").html(res);
            }
        });
      }else{
        GetMan()
      }
  }

  function GetManMois() {
      $("#listMana").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
      var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            listManaMois: "mana",
          }),
          dataType: "text",
          success: function(res) {
              $("#listMana").html(res);
          }
      });
  }

  function Anio() {
      $("#listMana").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
      var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            listManaAnio: "mana",
          }),
          dataType: "text",
          success: function(res) {
              $("#listMana").html(res);
          }
      });
  }
  function GetMan() {
      $("#listMana").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
      var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            listMana: "mana",
          }),
          dataType: "text",
          success: function(res) {
              $("#listMana").html(res);
          }
      });
  }GetMan()

  function listManaPDF(nombreC) {
      $("#listManaPDFContent").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
      var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            listManaPDF: "mana",
            moisChoice: nombreC,
          }),
          dataType: "text",
          success: function(res) {
              $("#listManaPDFContent").html(res);
          }
      });
  }

  function AddHafatra(btn) {
      var url = "controller/controllerMembre/controller.membre.php";
      btn.disabled = true;
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            hafatraHeader: $("#hafatraHeader").val(),
            hafatraId: $("#hafatraId").val(),
            dateIdHafatra: $("#dateIdHafatra").val(),
            tdId: $("#tdId").val(),
          }),
          dataType: "text",
          success: function(res) {
              if(res === "ok"){
                $("#hafatraHeader").val("")
                $("#hafatraId").val("")
                $("#dateIdHafatra").val("")
                $("#tdId").val("")
                btn.disabled = false;
                GetMan()
              }else{
                $("#resErreurHafatra").val(res)
                btn.disabled = false;
              }
          }
      });
  }

  function EditHafatraFinal(btn,id) {
      var url = "controller/controllerMembre/controller.membre.php";
      btn.disabled = true;
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            idHafatra: id,
            hafatraHeaderHH: $("#hafatraHeaderHH").val(),
            hafatraIdHH: $("#hafatraIdHH").val(),
            dateIdHafatraHH: $("#dateIdHafatraHH").val(),
            tdIdHH: $("#tdIdHH").val(),
          }),
          dataType: "text",
          success: function(res) {
              if(res === "ok"){
                $("#hafatraHeaderHH").val("")
                $("#hafatraIdHH").val("")
                $("#dateIdHafatraHH").val("")
                $("#tdIdHH").val("")
                btn.disabled = false;
                EditMana(id)
                GetMan()
              }else{
                $("#resErreurHafatraHH").val(res)
                btn.disabled = false;
              }
          }
      });
  }
</script>