<?php
    @session_start();
    include_once '../../db/conexion.php';
    include_once '../../config/config.php';
    include_once '../../config/funciones.php';

    if(!empty($_SESSION['codUsu'])){
        $priv_user = $_SESSION['priUsu'];
        $id_user = $_SESSION['idUsu'];
        $cod_user = $_SESSION['codUsu'];
        
        $sql = "SELECT *FROM usuario WHERE codUsu='".$cod_user."' AND estUsu=1";
        $consulta = $conector->query($sql);
        while($fila = $consulta->fetch_array()){
            $id_user = $fila['idUsu'];
            $cod_user = $fila['codUsu'];
            $nom_user = $fila['nomUsu'];
            $img_user = $fila['imgUsu'];
            $app_user = $fila['appUsu'];
            $apm_user = $fila['apmUsu'];
            $dni_user = $fila['dniUsu'];
            $email_user = $fila['emailUsu'];
            $sex_user = $fila['sexUsu'];
            $fnac_user = $fila['fnacUsu'];
            $cel_user = $fila['celUsu'];
            $pri_user = $fila['priUsu'];
        }
        //definicion del rol de y priUsu
        if($pri_user==1){
            $pri ="Interno";
        }else{
            $pri ="Externo";
        }
        //definiion de genero
        if($sex_user=="M"){
            $genero ="Masculino";
        }else{
            $genero = "Femenino";
        }
     }else{
      $url="../../";
      redireccionar($url);
     }
?>
<!DOCTYPE html>
<html lang="es">

  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>
    Panel Interno :: <?php echo $template['nom_proyecto'];?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <!---Estilos para los titulos del modal--->
  <style>
    .modal-title{
        font-size:11px;
        color:#A4B1CD;
        letter-spacing:1px;
        font-weight:600;
    }
  </style>
  <!---Estilos para los titulos del modal--->
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
  
    <style>
      .bg-card{
        background-color:#1A2332;
      }
      .bg-card-file{
        background: linear-gradient(to right, #FFE53B, #FFE53B);
      }
      .bg-card-verificado{
        background: linear-gradient(to right, #9FEF00, #9FEF00);
      }
      .bg-card-rechazado{
        background: linear-gradient(to right, #E10600, #E10600);
      }
      .bg-card-me{
        background: linear-gradient(to right, #00EFE1, #00EFE1);
      }
      .bg-card-admin{
        background: linear-gradient(to right, #9904EB, #9904EB);
      }
    </style>
    
  </head>

  <body class="g-sidenav-show" style="background-color:#111927;">