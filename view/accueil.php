<!DOCTYPE html>
<html lang="mg">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FLM105 | Accueil</title>
  <link rel="icon" href="data/logo.ico">

  <link rel="stylesheet" href="content/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="content/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="content/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="content/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="content/css/adminlte.min.css">
  <link rel="stylesheet" href="content/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="content/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="content/plugins/summernote/summernote-bs4.min.css">
  <script src="content/jquery/jquery.min.js"></script>
  <script type="text/javascript">
    function Deco() {
          var url = "controller/controllerAdmin/controller.admin.php";
          if (confirm("Tohizana ny fanakatonana ?")) {
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                deconnexion: "go"
              }),
              dataType: "text",
              success: function(res) {
                if (res=="ok") {
                  window.location.reload();
                }else{
                  alert(res);
                }
              }
            });
          }
    }
    function Reload(){
      window.location.reload();
    }
    $(document).ready(function(){
                $("#new_mdpbtn").click(function(e) {
                    e.preventDefault();
                    $.post(
                      'controller/controllerAdmin/controller.admin.php',
                      {
                        new_mdpbtn: "go",
                        id_admin: $("#id_admin").val(),
                        old_mdp: $("#old_mdp").val(),
                        new_mdp1: $("#new_mdp1").val(),
                        new_mdp2: $("#new_mdp2").val()
                      },
                      function(data) {
                        if (data=="OK") {
                          $("#success").html("Effectuer"); 
                          $("#error").html(""); 
                          window.location.reload();
                        }
                        else{
                           $("#error").html(data); 
                        }
                      }
                    );    
                });
    });
  </script>
</head>

<body class="sidebar-mini control-sidebar-slide-open accent-success sidebar-collapse text-sm">
      <div class="container">
              <div class="modal fade" id="AdidyAndoa">
                  <div class="modal-dialog modal-xl">
                      <div class="modal-content" id="adidyhtml"></div>
                  </div>
              </div>
      </div>

      <div class="container">
              <div class="modal fade" id="DetailleFaritra">
                  <div class="modal-dialog modal-xl">
                      <div class="modal-content" id="DetailleFaritraContent"></div>
                  </div>
              </div>
      </div>

      <div class="container">
          <div class="modal fade" id="newMana">
              <div class="modal-dialog modal-md">
                  <div class="p-2 modal-content">
                    <h5 class="text-left"><i class="fa fa-envelope-open mr-2"></i> Hafatra</h5>
                    <input type="text" name="hafatraHeader" id="hafatraHeader" placeholder="Hevitra.." class="form-control mt-2 mb-2">
                    <textarea class="form-control mt-2 mb-2" name="hafatraId" id="hafatraId" placeholder="sorato ny hafatra ..." style="height: 199px;"></textarea>
                    <input type="date" name="dateIdHafatra" id="dateIdHafatra" class="form-control mt-2 mb-2">
                    <input type="text" name="tdId" id="tdId" placeholder="ambany.." class="form-control mt-2 mb-2">
                    <button class="btn btn-info btn-block btn-sm" onclick="AddHafatra(this)">Atsofoka</button>
                    <small class="text-danger" id="resErreurHafatra"></small>
                  </div>
              </div>
          </div>
      </div>

      <div class="container">
          <div class="modal fade" id="EditManaForm">
              <div class="modal-dialog modal-md">
                  <div class="p-2 modal-content" id="EditManaFormContent"></div>
              </div>
          </div>
      </div>

      <div class="container">
          <div class="modal fade" id="listManaPDFCon">
              <div class="modal-dialog modal-xl">
                  <div class="p-2 modal-content" id="listManaPDFContent"></div>
              </div>
          </div>
      </div>


      <div class="container">
                    <div class="modal fade" id="DetailleFiangonana">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content" id="detailleFiango"></div>
                        </div>
                    </div>
      </div>  

      <div class="container">
                    <div class="modal fade" id="DetailleSampana">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content" id="detailleSampanaNom"></div>
                        </div>
                    </div>
      </div>  

       <div class="container">
                    <div class="modal fade" id="DetailleUser">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content" id="detailleIt"></div>
                        </div>
                    </div>
       </div>

       <div class="container">
                    <div class="modal fade" id="ModifUser">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content" id="modifierU"></div>
                        </div>
                    </div>
       </div>

       <div class="container">
              <div class="modal fade" id="Params">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Fanamboarana <i class="fas fa-cog"></i></h4>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                              <div class="modal-body">
                                  <table class="table">
                                  <tr>
                                    <td>Teny miafina</td>
                                    <td></td>
                                    <td></td>
                                    <td><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#ConModal">Ovaina</button></td>
                                  </tr>
                              </table>
                              </div>
                          </div>
                        </div>
                  </div>
        </div>

             <div class="container">
                <div class="modal fade" id="ConModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hanova miafina <i class="typcn typcn-cog"></i></h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Teny miafina (Taloha)</label>
                            <input type="text" id="id_admin" hidden value="<?php echo $idUser; ?>">
                          <input type="password" id="old_mdp" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Teny miafina (Vaovao)</label>
                          <input type="password" id="new_mdp1" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Teny miafina (Vaovao)</label>
                          <input type="password" id="new_mdp2" class="form-control">
                        </div>
                      </div>
                      <small id="error" style="color: red;text-align: center;"></small>
                      <small id="success" style="color: green;text-align: center;"></small>
                      <div class="modal-footer">
                          <button class="btn btn-sm btn-info" id="new_mdpbtn">Soloina</button>
                          <small class="btn btn-sm btn-info" data-dismiss="modal">Ajanona</small>
                       </div>
                    </div>
                  </div>
                </div>
          </div>


      <div class="wrapper" >

        <nav class="main-header navbar navbar-expand navbar-dark navbar-info">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" style="cursor: pointer;" role="button"><i class="fas fa-bars"></i></a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a onclick="DisplayAllR('bienvenu','manaAccueil','adidy','faritra','membreListe','bilan','fiangonana','sampana','lisitraAccueil','departemanta','nouveau','mahaK');" class="nav-link" role="button">
                      <i class="fas fa-home"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a onclick="Reload();" class="nav-link" role="button">
                      <i class="fas fa-undo"></i>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" role="button">
                      <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                  </li>
                  
                  <!-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown">
                      <i class="far fa-user"></i>
                    </a>
                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?php echo $user['nomA']." ".$user['prenomA']; ?></span>
                      <div class="dropdown-divider"></div>
                      <span class="dropdown-item" style="text-align: center;">
                        <small class="btn btn-info" data-toggle="modal" data-target="#Params">Fanamboarana</small>
                        <a onclick="Deco();"><small class="btn btn-info">Hakatona</small></a>
                      </span>
                        <div class="dropdown-divider"></div>
                    </div>
                  </li> -->
          </ul>
        </nav>

        <aside class="navbar-info main-sidebar sidebar-dark-fuchsia elevation-4">
          <a href="index.php" class="brand-link navbar-info" style="border-bottom: 1px solid #686a6c !important;">
            <img src="data/logo.png" alt="FLM105" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">... FLM 105</span>
          </a>

          <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid #686a6c !important;">
              <div class="image">
                <img src="<?php echo $img; ?>" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a style="cursor: pointer;" class="d-block"><?php echo $user['nomA']." ".$user['prenomA']; ?></a>
              </div>
            </div>

            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Fifandraisana</li>

                <li class="nav-item" onclick="DisplayAllR('manaAccueil','lisitraAccueil','adidy','faritra','membreListe','bilan','fiangonana','sampana','bienvenu','departemanta','nouveau','mahaK');">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-envelope-open"></i>
                    <p>
                      Hafatra
                    </p>
                  </a>
                </li>

                <li class="nav-item" onclick="DisplayAllR('lisitraAccueil','manaAccueil','adidy','faritra','membreListe','bilan','fiangonana','sampana','bienvenu','departemanta','nouveau','mahaK');">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-phone"></i>
                    <p>
                      Lisitra
                    </p>
                  </a>
                </li>

              </ul>

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Mambra</li>
                <li class="nav-item" onclick="DisplayAllR('nouveau','faritra','membreListe','bilan','fiangonana','sampana','bienvenu','departemanta','mahaK','adidy','lisitraAccueil','manaAccueil');">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                      Vaovao
                    </p>
                  </a> 
                </li>
                <li class="nav-item" onclick="DisplayAllR('membreListe','faritra','fiangonana','bilan','nouveau','sampana','bienvenu','departemanta','mahaK','adidy','lisitraAccueil','manaAccueil');">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Kristiana
                    </p>
                  </a>
                </li>
                <li class="nav-item" onclick="DisplayAllR('fiangonana','faritra','membreListe','bilan','nouveau','sampana','bienvenu','departemanta','mahaK','adidy','lisitraAccueil','manaAccueil');AllF();">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                      Fiangonana
                    </p>
                  </a>
                </li>
                <li class="nav-item" onclick="DisplayAllR('sampana','faritra','membreListe','fiangonana','nouveau','bilan','bienvenu','departemanta','mahaK','adidy','lisitraAccueil','manaAccueil');">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                      Sampana
                    </p>
                  </a>
                </li>
                <li class="nav-item" onclick="DisplayAllR('departemanta','faritra','membreListe','fiangonana','nouveau','bilan','bienvenu','sampana','mahaK','adidy','lisitraAccueil','manaAccueil');">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-server"></i>
                    <p>
                      Departemanta
                    </p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Tatitra</li>

                <li class="nav-item" onclick="DisplayAllR('mahaK','faritra','membreListe','bilan','fiangonana','sampana','bienvenu','departemanta','nouveau','adidy','lisitraAccueil','manaAccueil');">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-street-view"></i>
                    <p>
                      Nomerika
                    </p>
                  </a>
                </li>
                <li class="nav-item" onclick="DisplayAllR('faritra','membreListe','bilan','fiangonana','sampana','bienvenu','departemanta','nouveau','adidy','mahaK','lisitraAccueil','manaAccueil');">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-map"></i>
                    <p>
                      Faritra
                    </p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Fandraisana</li>

                <li class="nav-item" onclick="DisplayAllR('adidy','faritra','membreListe','bilan','fiangonana','sampana','bienvenu','departemanta','nouveau','mahaK','lisitraAccueil','manaAccueil');">
                  <a style="cursor: pointer;" class="nav-link">
                    <i class="nav-icon fas fa-sign-language"></i>
                    <p>
                      Adidy
                    </p>
                  </a>
                </li>

              </ul>
            </nav>
          </div>
        </aside>

        <div class="content-wrapper">
            <span id="bienvenu" style="display: block;"><?php include 'accueil/bienvenu.php'; ?></span>
            <span id="membreListe" style="display: none;"><?php include 'accueil/membreListe.php'; ?></span>
            <span id="bilan" style="display: none;"><?php include 'accueil/bilan.php'; ?></span>
            <span id="nouveau" style="display: none;"><?php include 'accueil/nouveau.php'; ?></span>
            <span id="sampana" style="display: none;"><?php include 'accueil/sampana.php'; ?></span>
            <span id="fiangonana" style="display: none;"><?php include 'accueil/fiangonana.php'; ?></span>
            <span id="departemanta" style="display: none;"><?php include 'accueil/departemanta.php'; ?></span>
            <span id="mahaK" style="display: none;"><?php include 'accueil/mahaK.php'; ?></span>
            <span id="adidy" style="display: none;"><?php include 'accueil/adidy.php'; ?></span>
            <span id="faritra" style="display: none;"><?php include 'accueil/faritra.php'; ?></span>
            <span id="lisitraAccueil" style="display: none;"><?php include 'accueil/lisitra.php'; ?></span>
            <span id="manaAccueil" style="display: none;"><?php include 'accueil/mana.php'; ?></span>
        </div>

      </div>

      <script type="text/javascript">
        function DisplayAllR(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12) {
          var id11 = document.getElementById(id1);
          var id12 = document.getElementById(id2);
          var id13 = document.getElementById(id3);
          var id14 = document.getElementById(id4);
          var id15 = document.getElementById(id5);
          var id16 = document.getElementById(id6);
          var id17 = document.getElementById(id7);
          var id18 = document.getElementById(id8);
          var id19 = document.getElementById(id9);
          var id100 = document.getElementById(id10);
          var id101 = document.getElementById(id11);
          var id102 = document.getElementById(id12);
          id11.style.display = "block";
          id12.style.display = "none";
          id13.style.display = "none";
          id14.style.display = "none";
          id15.style.display = "none";
          id16.style.display = "none";
          id17.style.display = "none";
          id18.style.display = "none";
          id19.style.display = "none";
          id100.style.display = "none";
          id101.style.display = "none";
          id102.style.display = "none";
        }
        function Go(str,id) {
          var h = document.getElementById(id);
          h.value = str;
        }
      </script>
      <script src="content/plugins/jquery/jquery.min.js"></script>
      <script src="content/plugins/jquery-ui/jquery-ui.min.js"></script>
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <script src="content/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="content/plugins/chart.js/Chart.min.js"></script>
      <script src="plugins/sparklines/sparkline.js"></script>
      <script src="content/plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="content/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
      <script src="content/plugins/moment/moment.min.js"></script>
      <script src="content/plugins/daterangepicker/daterangepicker.js"></script>
      <script src="content/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <script src="content/plugins/summernote/summernote-bs4.min.js"></script>
      <script src="content/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <script src="content/js/adminlte.js"></script>
      <script src="content/js/demo.js"></script>
      <script src="content/js/pages/dashboard.js"></script>
</body>
</html>
