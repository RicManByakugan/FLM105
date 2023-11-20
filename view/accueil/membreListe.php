
<section class="container content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-user"></i> Kristianina</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-dark"><?php echo $user['nomA']." ".$user['prenomA']; ?></a></li>
              <li class="breadcrumb-item active">Kristianina</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content container">
      <div class="card card-solid">
        <div class="card-body pb-0">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                         <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label>Toerana (tsy voatery)</label>
                                    <input type="text" class="form-control" placeholder="Ampidiro..." id="toerana">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Lahy / Vavy (tsy voatery)</label>
                                    <select class="form-control" style="width: 100%;" id="sexe">
                                        <option selected disabled></option>
                                        <option>Lehilahy</option>
                                        <option>Vehivavy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Faritra</label>
                                    <select class="form-control" style="width: 100%;" id="FaritraF">
                                        <option selected disabled></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="Hitady krisitanina..." id="tenaI">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default" onclick="Recherche();">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
      </div>
</section>
<section class="content container">
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch" id="listeM"></div>
        </div>
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item"><a class="page-link" onclick="RecupAllMemebreAll();this.style.display='none';">Plus <i class="fas fa-plus"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>
</section>

<script src="content/jquery/jquery.min.js"></script>
<script src="content/pdf/jszip.min.js"></script>
<script src="content/pdf/kendo.all.min.js"></script>
  <script type="text/javascript">
    function PDFS(sampana) {
        var sampanaListeAr = document.getElementById('sampanaListeAr');
        sampanaListeAr.style.display = "block";
        kendo.drawing
        .drawDOM("#sampanaListeAr", 
        { 
            paperSize: "A2",
          margin: { top: "1cm", bottom: "1cm" },
          scale: 0.8,
          height: 500
        })
        .then(function(group){
            kendo.drawing.pdf.saveAs(group, "FLM::"+sampana+".pdf")
          sampanaListeAr.style.display = "none";
        });
    }
    function PDFD(depart) {
        var departListeAr = document.getElementById('departListeAr');
        departListeAr.style.display = "block";
        kendo.drawing
        .drawDOM("#departListeAr", 
        { 
            paperSize: "A2",
          margin: { top: "1cm", bottom: "1cm" },
          scale: 0.8,
          height: 500
        })
        .then(function(group){
            kendo.drawing.pdf.saveAs(group, "FLM::"+depart+".pdf")
          departListeAr.style.display = "none";
        });
    }
    function DeleSomething(idUser,type) {
          alert('Miandrasa kely ... (tsindrio ny OK)');
          var url = "controller/controllerMembre/controller.membre.php";
          if (confirm('Hamafa?')) {
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donneDel: type,
                  idAdmin: <?php echo $idUser; ?>,
                  idUser: idUser
                }),
                dataType: "text",
                success: function(res) {
                  ModifierUser(idUser);
                }
            });
          }
    }
    function DeleteUser(idUser) {
          var url = "controller/controllerMembre/controller.membre.php";
          if (confirm('Hamafa olona?')) {
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donneDelUser: "go",
                  idAdmin: <?php echo $idUser; ?>,
                  idUser: idUser
                }),
                dataType: "text",
                success: function(res) {
                  RecupAllMemebreAll();
                }
            });
          }
    }
    function ModifierUser(idUser) {
            $("#modifierU").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
            var url = "controller/controllerMembre/controller.membre.php";
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donneModif: "go",
                  idAdmin: <?php echo $idUser; ?>,
                  idUser: idUser
                }),
                dataType: "text",
                success: function(res) {
                    $("#modifierU").html(res);
                }
            });
    }
    function DetailleUser(idUser) {
            $("#detailleIt").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
            var url = "controller/controllerMembre/controller.membre.php";
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donnedetaille: "go",
                  idUser: idUser
                }),
                dataType: "text",
                success: function(res) {
                    $("#detailleIt").html(res);
                }
            });
    }
    function Recherche() {
          $("#listeM").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          var t = document.getElementById('toerana');
          var s = document.getElementById('sexe');
          var f = document.getElementById('FaritraF');
          var search = document.getElementById('tenaI');
          if (search.value != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                  donneR: "go",
                  t: t.value,
                  sexe: s.value,
                  faritra: f.value,
                  search: search.value
                }),
                dataType: "text",
                success: function(res) {
                    $("#listeM").html(res);
                }
            });
          }else{
            $("#listeM").html("");
            RecupAllMemebreAll();
          }
    }
    function RecupAllMemebre6() {
          $("#listeM").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          $.ajax({
              type: "POST",
              url: url,
              data: ({
                donne: "go"
              }),
              dataType: "text",
              success: function(res) {
                  $("#listeM").html(res);
              }
          });
    }
    function RecupAllMemebreAll() {
          $("#listeM").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          $.ajax({
              type: "POST",
              url: url,
              data: ({
                donneAll: "go"
              }),
              dataType: "text",
              success: function(res) {
                  $("#listeM").html(res);
              }
          });
    }
    RecupAllMemebre6();
    // setInterval("RecupAllMemebre6()",2000);
  </script>