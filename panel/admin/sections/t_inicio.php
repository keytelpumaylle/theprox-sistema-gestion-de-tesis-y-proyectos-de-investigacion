<?php
    @session_start();
    include_once '../../db/conexion.php';
    include_once '../../config/config.php';
    include_once '../../config/funciones.php';

    if(!empty($_SESSION['codAdmin'])){
        $pri_user = $_SESSION['priAdmin'];
        $id_user = $_SESSION['idAdmin'];
        $cod_user = $_SESSION['codAdmin'];
        
        $sql = "SELECT *FROM administrador WHERE codAdmin='".$cod_user."' AND estAdmin=1";
        $consulta = $conector->query($sql);
        while($fila = $consulta->fetch_array()){
            $cod_user = $fila['codAdmin'];
            $nom_user = $fila['nomAdmin'];
            $img_user = $fila['imgAdmin'];
            $app_user = $fila['appAdmin'];
            $apm_user = $fila['apmAdmin'];
            $dni_user = $fila['dniAdmin'];
            $email_user = $fila['emaAdmin'];
            $sex_user = $fila['sexAdmin'];
            $fnac_user = $fila['fnaAdmin'];
            $cel_user = $fila['celAdmin'];
            $pri_user = $fila['priAdmin'];
        }
        //definicion del rol de y priUsu
        if($pri_user==1){
            $pri ="Admin Interno";
        }else{
            $pri ="Admin Externo";
        }
        //definiion de genero
        if($sex_user=="M"){
            $genero ="Masculino";
        }else{
            $genero = "Femenino";
        }
     }else{
        redireccionar("../../admin.php");
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
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
      .bg-upload-photo {
        background-color:#111826; 
        border-radius:3px; 
        margin-right:5px; 
        padding:10px 12px 3px 10px; 
        justify-content: center; 
        border: 1px solid #ffffff95;
      }
      .bg-upload-photo:hover{
        background-color:#ffffff40;
        border: 1px solid #ffffff;
        
      }
      .bg-update:hover{
        background-color:#ffffff40;
        border: 1px solid #ffffff;
        
      }
      .text-upload{
        cursor:pointer; 
        font-size:13px; 
        color:#ffffff;
        font-weight:400;
      }
                       
      #upload-photo {
        opacity: 0;
        position: absolute;
        z-index: -1;
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
<?php include_once 'sections/t_inicio.php';?>
  <!--NavBarHorizantal-->
  <?php include_once 'sections/t_navHorizontal.php';?>
  <div class="main-content position-relative h-100 border-radius-lg " style="background-color:#111927;">
    <!-- NavbarVertical-->
    <?php include_once 'sections/t_navVertical.php';?>