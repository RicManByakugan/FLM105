<section class="container content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-phone"></i> Lisitra</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-dark"><?php echo $user['nomA']." ".$user['prenomA']; ?></a></li>
              <li class="breadcrumb-item active">Lisitra</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content container">
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row" id="numberList"></div>
      </div>
    </div>
</section>

<!-- <script src="content/jquery/jquery.min.js"></script> -->
<script type="text/javascript">
  
  function GetNumber() {
      $("#numberList").html("<div class='col text-center'><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div><div class='spinner-grow text-secondary'></div></div>");
      var url = "controller/controllerMembre/controller.membre.php";
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            numberListGo: "numberList",
          }),
          dataType: "text",
          success: function(res) {
              $("#numberList").html(res);
          }
      });
  }GetNumber()


</script>