<section class="content-header container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-map"></i>  Faritra</h1>
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

<section class="mt-4 content container">
      <div class="card card-solid">
        <div class="card-body">
          <div class="col" style="text-align: center;">
            <button class="btn btn-info" onclick="$('#FARITRAIdCotnainer').html('');">NOMERIKA</button>
            <button class="btn btn-info" onclick="GetFaritra(1);">FARITRA 1</button>
            <button class="btn btn-info" onclick="GetFaritra(2);">FARITRA 2</button>
            <button class="btn btn-info" onclick="GetFaritra(3);">FARITRA 3</button>
            <button class="btn btn-info" onclick="GetFaritra(4);">FARITRA 4</button>
          </div>
        </div>
      </div>
</section>

<span id="FARITRAIdCotnainer"></span>

<section class="mt-4 content container">
      <div class="row">
        <div class="col-sm-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Isam-paritra FLM Ambohidratrimo</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="resFaritra"></div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-info" id="resFaritraDETAILLE"></div>
        </div>
      </div>
</section>


<script src="content/plugins/jquery/jquery.min.js"></script>
<script src="content/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="content/plugins/chart.js/Chart.min.js"></script>
<script src="content/dist/js/adminlte.min.js"></script>
<script src="content/dist/js/demo.js"></script>
<script>
    function GetFaritra(sampana) {
          $("#FARITRAIdCotnainer").html("<div class='col text-center'><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div><div class='spinner-grow text-info'></div></div>");
          var url = "controller/controllerMembre/controller.membre.php";
          $.ajax({
                type: "POST",
                url: url,
                data: ({
                  FaritraGet: sampana
                }),
                dataType: "text",
                success: function(res) {
                  $("#FARITRAIdCotnainer").html(res);
                }
          });
    }
   function FaritraPdp(titre) {
      alert("Miandry kely");
        kendo.drawing
        .drawDOM("#DetailleFaritraContent", 
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
  function GetFaritraDetailleModal(numero) {
      var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            isaFaritraDetailleModal: numero
          }),
          dataType: "text",
          success: function(res) {
            $("#DetailleFaritraContent").html(res)
          }
      });
  }
  function GetFaritraDetaille(numero) {
      var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            isaFaritraDetaille: numero
          }),
          dataType: "text",
          success: function(res) {
            $("#resFaritraDETAILLE").html(res)
          }
      });
  }GetFaritraDetaille(1)
  function GetDataFaritra() {
      var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            isaFaritra: "alefa"
          }),
          dataType: "text",
          success: function(res) {
            $("#resFaritra").html(res)
          }
      });
  }GetDataFaritra()

  function CreatePieChart(dataV, valueData) {
    var donutData = {
      labels: dataV,
      datasets: [
        {
          data: valueData,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  }
</script>
