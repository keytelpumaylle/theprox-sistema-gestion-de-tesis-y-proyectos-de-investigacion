<?php 
    include_once 'db/conexion.php';
    include_once 'config/config.php';
    include_once 'config/funciones.php';

    if(!empty($_SESSION['codUsu'])){
        if($_SESSION['priUsu']==1){
            $url = "admin/";
            redireccionar2($url);        
        }else{
            $url = "user/";
            redireccionar2($url);
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/apple-icon.png">
  <title>
    Registro :: <?php echo $template['nom_proyecto'];?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <style>
    .bg-input{
        border: none;
        outline: none;
        font-size:13px;
        background-color: #111927;
        color: #FFFFFF;
        letter-spacing:1px;
    }
  </style>
</head>

<body style="background-color:#111927;">
  <main class="main-content">
    <section class="min-vh-50 mb-8 pt-4">
      <div class="page-header align-items-start pt-10 pt-5 m-3 border-radius-lg">
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-5 col-lg-5 col-md-7 mx-auto" >
            <div class="card z-index-0" style="background-color:#1A2332;">
              <div class="card-body" style="background-color:#1A2332;">
                <div class="card-header text-center pb-0 " style="background-color:#1A2332;">
                  <div >
                    <a class="navbar-brand m-0" href="index.php">
                      <img src="assets/img/logo-ct.png" class="navbar-brand-img" style="height:20px" alt="main_logo">
                      <span class="ms-1 font-weight-bold" style="color:#A4B1CD; letter-spacing:1px; font-size:13px;">THEPROX</span>
                    </a>
                  </div>
                  <h3 class="mt-2 mb-3 ms-1 font-weight-bold" style="color:#fff; letter-spacing:1px; font-size:20px;">Registrate</h3>
                </div>
                <form role="form text-left" id="register">
                  <div class="row d-flex">
                    <div class="col-xl-12 mb-3">
                      <input type="text" name="nom" class="form-control bg-input" placeholder="Nombre" aria-label="Codigo" aria-describedby="email-addon">
                    </div>
                    <div class="col-xl-12 mb-3">
                      <input type="text" name="app" class="form-control bg-input" placeholder="Apellido Paterno" aria-label="Codigo" aria-describedby="email-addon">
                    </div>
                    <div class="col-xl-12 mb-3">
                      <input type="text" name="codigo" class="form-control bg-input" placeholder="Codigo Universitario" aria-label="Codigo" aria-describedby="email-addon">
                    </div>
                    <div class="col-xl-12 mb-3">
                      <input type="text" name="ema" class="form-control bg-input" placeholder="email Univeristario" aria-label="Codigo" aria-describedby="email-addon">
                    </div>
                    <div class="col-xl-12 mb-3">
                      <input type="text" name="dni" class="form-control bg-input" placeholder="Dni" aria-label="Codigo" aria-describedby="email-addon">
                    </div>
                    <div class="col-xl-12 mb-3">
                      <input type="date" name="fna" class="form-control bg-input" placeholder="Dni" aria-label="Codigo" aria-describedby="email-addon">
                      <small style="font-size:10px; color:#9FEF00; font-weight:600; letter-spacing:1px;">FECHA DE NACIMIENTO</small>
                    </div>
                  </div>
                  <select name="sex" class="col-xl-5 mb-3 text-left bg-input p-2">
                      <option>Sexo</option>
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>
                  </select>
                  <select name="pri" class="col-xl-6 mb-3 text-left bg-input p-2">
                      <option>Seleccione su estado</option>
                      <option value="1">Estudiante</option>
                      <option value="2">Egresado</option>
                  </select>
                  <!---Etiqueta Mostar mensajes-->
                  <div id="div_register" class="col-xs-12"></div>

                  <div class="text-center">
                    <button type="submit" class="btn w-100 mb-2" style="background: linear-gradient(#9FEF00, #9FEF00); color:#111927; font-size:15px; letter-spacing:1px">Registrarme</button>
                  </div>
                  <p style="font-size:14px" class="text-center mb-0">Ya tienes cuenta? <a href="index.php" class=" font-weight-bolder" style="color:#9FEF00;">Iniciar Sesion</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/jquery-3.4.1.js"></script>
  <script src="config/login.js"></script>

  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  <script src="config/login.js"></script>
</body>

</html>