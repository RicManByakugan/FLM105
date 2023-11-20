<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FLM105 | Connexion</title>
  <link rel="icon" href="data/logo.ico">
  <link rel="stylesheet" href="content/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="content/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="content/css/adminlte.min.css">
  <script src="content/jquery/jquery.min.js"></script>
  <script type="text/javascript">
       $(document).ready(function(){
          $("#connexion").click(function(e){
              var connexion = document.getElementById('connexion');
              var result = document.getElementById('result');
              e.preventDefault();
             
              result.style.color = "blue";
              $("#result").html("Miandrasa kely...");
              connexion.disabled = true;
             
             $.post(
                  'controller/controllerAdmin/controller.admin.php',
                {
                      connexionAdmin : "GO",
                      pseudo : $("#pseudo").val(),
                      mdp : $("#mdp").val()
                  },
                  
                  function(data){
                      if (data=="OK") {
                        connexion.disabled = true;
                        result.style.color = "blue";
                        $("#result").html("Tafiditra, miandrasa kely");
                        window.location.reload();
                      }else{
                        connexion.disabled = false;
                        result.style.color = "red";
                        $("#result").html(data);
                      }
                  },
              ); 
          });
       });
  </script>
</head>

<body class="login-page" style="background: #fff;">
  <div class="login-box">
    <div class="login-logo">
        <img src="data/logo.ico" class="img-responsive" width="70" height="70" />
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">FLM 105</p>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="pseudo" placeholder="Login...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="mdp" placeholder="Teny miafina...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="col">
              <button type="submit" class="btn btn-info btn-block" id="connexion">Hiditra</button>
          </div>
          <p style="color: red;text-align: center;" id="result"></p>
        <div class="social-auth-links text-center mb-3">
          <p>- SERASERA -</p>
          <a href="tel:0342487719" class="btn btn-block btn-info" target="blank">
            <i class="fab fa-phone mr-2"></i> Hiantso
          </a>
        </div>

        <div class="row">
          <div class="col">
           <h6 align=""><small><i class="fas fa-copyright"></i> <?= date("Y") ?></small></h6> 
          </div>
          <div class="col">
           <h6 align="right"><small>D-SERASERA</small></h6> 
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="content/plugins/jquery/jquery.min.js"></script>
  <script src="content/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="content/js/adminlte.min.js"></script>
</body>
</html>
