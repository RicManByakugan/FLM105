
<section class="container content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-plus"></i> Kristianina - Vaovao</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item text-dark"><a class="text-dark"><?php echo $user['nomA']." ".$user['prenomA']; ?></a></li>
              <li class="breadcrumb-item active">Kristianina</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content container">
  <form class="container" method="POST" action="controller/controllerMembre/controller.membre.php" target="envoie" id="nadd" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-info h-100">
              <div class="card-header">
                <h3 class="card-title">Mombamomba</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <h6>Fenoina izay azo fenoina</h6><hr>
                <div class="form-group">
                  <label for="anarana">Anarana</label>
                  <input type="text" id="anarana" name="anarana" class="form-control" required>
                  <input type="text" id="idUser" name="idUser" value="<?php echo $idUser; ?>" hidden>
                </div>
                <div class="form-group">
                  <label for="fanampiny">Fanampiny</label>
                  <input type="text" id="fanampiny" name="fanampiny" class="form-control">
                </div>
                <div class="form-group">
                  <label for="dateU">Daty nahaterahana</label>
                  <input type="date" id="dateU" name="dateU" class="form-control" value="<?= date("Y-m-d") ?>">
                </div>
                <div class="form-group">
                  <label for="sexe">Lehilahy / Vehivavy</label>
                  <select id="sexe" name="sexe" class="form-control custom-select">
                    <option selected disabled></option>
                    <option>Lehilahy</option>
                    <option>Vehivavy</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="profession">Asa andavan-andro</label>
                  <input type="text" id="profession" name="profession" class="form-control">
                </div>
                <div class="form-group">
                  <label for="add">Adiresy</label>
                  <input type="text" id="add" name="add" class="form-control">
                </div>
                <div class="form-group">
                  <label for="fraitra">Faritra</label>
                  <input type="number" id="fraitra" name="fraitra" class="form-control" required>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <input type="radio" name="ampytaona" onclick="AmpyCheck('ok');">
                      <label>Ampy taona</label>
                    </div>
                    <div class="col">
                      <input type="radio" name="ampytaona" onclick="AmpyCheck('ko');">
                      <label>Tsy ampy taona</label>
                    </div>
                  </div>
                </div>

                <span id="AKO" style="display: none;">
                  <div class="form-group">
                      <label for="anaranaRay">Anarana Ray</label>
                      <input type="text" id="anaranaRay" name="anaranaRay" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="anaranaReny">Anarana Reny</label>
                      <input type="text" id="anaranaReny" name="anaranaReny" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="anaranaTmp">Anarana Tompon'andraikitra</label>
                      <input type="text" id="anaranaTmp" name="anaranaTmp" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="phoneTmp">Finday azo hiantsoana</label>
                    <input type="tel" id="phoneTmp" name="phoneTmp" class="form-control">
                  </div>
                </span>

                <span id="AOK" style="display: none;">
                  <div class="form-group">
                    <label for="phone1">Finday</label>
                    <input type="tel" id="phone1" name="phone1" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="phone2">Finday faharoa (Raha misy)</label>
                    <input type="text" id="phone2" name="phone2" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="phone3">Finday fahatelo (Raha misy)</label>
                    <input type="text" id="phone3" name="phone3" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="maim">Mailaka (Raha misy)</label>
                    <input type="text" id="maim" name="maim" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="fb">Facebook (Raha misy)</label>
                    <input type="text" id="fb" name="fb" class="form-control">
                  </div>
                </span>
              </div>
            </div>

          </div>

           <div class="col-md-4">
              <div class="card card-info h-100">
              <div class="card-header">
                <h3 class="card-title">Mombamomba (tohiny)</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <h6>Tsinjina raha vita</h6><hr>
                <div class="form-group">
                  <input type="checkbox" id="batisa" name="batisa">
                  <label for="batisa">Batisa</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="mpandray" name="mpandray">
                  <label for="mpandray">Mpandray</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="mpiandry" name="mpiandry" hidden>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="soratra" name="soratra">
                  <label for="soratra">Soratra</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="mari" name="mari">
                  <label for="mari">Mariazy</label>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card card-info h-100">
              <div class="card-header">
                <h3 class="card-title">Toerana misy</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <h6>Tsinjina raha anatin'ilay toerana</h6><hr>
                <div class="form-group">
                  <input type="checkbox" id="bira" name="bira" data-toggle="collapse" href="#biraT">
                  <label for="bira" data-toggle="collapse" href="#biraT">Birao</label>
                  <select class="form-control collapse" id="biraT" name="biraT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="faaa" name="faaa" data-toggle="collapse" href="#faaaT">
                  <label for="faaa" data-toggle="collapse" href="#faaaT">Fanorenana</label>
                  <select class="form-control collapse" id="faaaT" name="faaaT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="fdl" name="fdl" data-toggle="collapse" href="#fdlT">
                  <label for="fdl" data-toggle="collapse" href="#fdlT">Fikambanan-Dehilahy Loterana</label>
                  <select class="form-control collapse" id="fdlT" name="fdlT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="fbl" name="fbl" data-toggle="collapse" href="#fblT">
                  <label for="fbl" data-toggle="collapse" href="#fblT">Fikambanan-Behivahy Loterana</label>
                  <select class="form-control collapse" id="fblT" name="fblT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="sa" name="sa" data-toggle="collapse" href="#saT">
                  <label for="sa" data-toggle="collapse" href="#saT">Sekoly Alahady Loterana MAlagasy</label>
                  <select class="form-control collapse" id="saT" name="saT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="kt" name="kt" data-toggle="collapse" href="#ktT">
                  <label for="kt" data-toggle="collapse" href="#ktT">Kristianina Tanora Loterana Malagasy</label>
                  <select class="form-control collapse" id="ktT" name="ktT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tmm" name="tmm" data-toggle="collapse" href="#tmmT">
                  <label for="tmm" data-toggle="collapse" href="#tmmT">Tafika Masina Maharitra</label>
                  <select class="form-control collapse" id="tmmT" name="tmmT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="fifil" name="fifil" data-toggle="collapse" href="#fifilT">
                  <label for="fifil" data-toggle="collapse" href="#fifilT">FIFIL</label>
                  <select class="form-control collapse" id="fifilT" name="fifilT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="skoto" name="skoto" data-toggle="collapse" href="#skotoT">
                  <label for="skoto" data-toggle="collapse" href="#skotoT">Skoto</label>
                  <select class="form-control collapse" id="skotoT" name="skotoT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="dia" name="dia" data-toggle="collapse" href="#diaT">
                  <label for="dia" data-toggle="collapse" href="#diaT">DIAKONA</label>
                  <select class="form-control collapse" id="diaT" name="diaT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="vlm" name="vlm" data-toggle="collapse" href="#vlmT">
                  <label for="vlm" data-toggle="collapse" href="#vlmT">Vokovokomanga Loterana Malagasy</label>
                  <select class="form-control collapse" id="vlmT" name="vlmT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="ds" name="ds" data-toggle="collapse" href="#dsT">
                  <label for="ds" data-toggle="collapse" href="#dsT">Departemanta Serasera</label>
                  <select class="form-control collapse" id="dsT" name="dsT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="dh" name="dh" data-toggle="collapse" href="#dhT">
                  <label for="dh" data-toggle="collapse" href="#dhT">Departemanta Hira sy Mozika</label>
                  <select class="form-control collapse" id="dhT" name="dhT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="df" name="df" data-toggle="collapse" href="#dfT">
                  <label for="df" data-toggle="collapse" href="#dfT">Departemanta Fitaovana</label>
                  <select class="form-control collapse" id="dfT" name="dfT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="dfi" name="dfi" data-toggle="collapse" href="#dfiT">
                  <label for="dfi" data-toggle="collapse" href="#dfiT">Departemanta Firaketana</label>
                  <select class="form-control collapse" id="dfiT" name="dfiT">
                    <option selected disabled>Toerana</option>
                    <option>Mambra</option>
                    <option>Filoha</option>
                    <option>Filoha Lefitra</option>
                    <option>Mpitahiry vola</option>
                    <option>Secretaire 1</option>
                    <option>Secretaire 2</option>
                    <option>Komity</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="mt-3 w-100 container"> 
              <label for="imageM" class="btn btn-info btn-block">Sary (raha misy)</label>
              <input type="file" name="imageM" id="imageM" hidden accept=".jpg,.png,.jpeg" class="inputfile" onchange="CheckImage(this,'imageOneModif');">
          </div>
        </div>
        <div style="text-align: center;">
            <img src="data/user/profile.png" width="150" height="150" id="imageOneModif" class="img-reponsive" style="display: none;">
        </div>

        <div class="row">
              <div class="col-sm-6">
                <a href="#" class="btn btn-info btn-block">Hajanona</a>
              </div>
            <div class="col-sm-6">
                <button type="submit" onclick="Go('Miandrasa kely...','Hampidirina');alert('Miandrasa kely ... (tsindrio ny OK)');" name="Hampidirina" class="btn btn-info btn-block " id="Hampidirina">Hampidirina</button>
            </div>
        </div>
  </form>
</section>
<iframe id="envoie" name="envoie" style="visibility: hidden;display: none;"></iframe>
<script type="text/javascript">
  function CheckImage(input,output) {
    if (!input.files) {
          alert("Olana navi !!");
          input.value = null;
      }else {
          var file = input.files[0];
          AfficheImage(input,output);
          // if (file.size < 900000) {
          // }else{
          //     alert('Ataovy sary kely lanja');
          //     input.value = null;
          // }
      }
  }
  function AfficheImage(input,output) {
    var o = document.getElementById(output);
    o.src = window.URL.createObjectURL(input.files[0]);
    o.style.display = "unset";
  }
  function ResetForm(id) {
    var id= document.getElementById(id);
    id.reset();
    window.location.reload();
  }
  function AmpyCheck(str) {
    var hok = document.getElementById('AOK');
    var hko = document.getElementById('AKO');
    var anaranaRay = document.getElementById('anaranaRay');
    var anaranaReny = document.getElementById('anaranaReny');
    var anaranaTmp = document.getElementById('anaranaTmp');
    if (str=="ok") {
        hok.style.display = "block";
        hko.style.display = "none";
    }else if(str=="ko"){
        hok.style.display = "none";
        hko.style.display = "block";
        anaranaRay.value = "";
        anaranaReny.value = "";
        anaranaTmp.value = "";
    }
  }
</script>
