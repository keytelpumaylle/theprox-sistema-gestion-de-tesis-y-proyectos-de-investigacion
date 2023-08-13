<?php
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';

    if(empty($_SESSION['codAdmin'])){
        redireccionar2("../../../");
    }elseif(empty($_POST["nom"])){
        $errors[]="Ingrese el NOMBRE";
    }elseif(empty($_POST["ap"])){
        $errors[]="Ingrese sus APELLIDOS COMPLETOS";
    }elseif(empty($_POST["ocu"])){
        $errors[]="Ingrese su OCUPACION";
    }elseif(empty($_POST["dni"])){
        $errors[]="Ingrese su DNI";
    }elseif(
        !empty($_POST["nom"]) &&
        !empty($_POST["ap"]) &&
        !empty($_POST["ocu"])&&
        !empty($_POST["dni"])
    ){
        $id = $_SESSION['codAdmin'];
        $nom = $_POST["nom"];
        $app = $_POST["ap"];
        $ocu = $_POST["ocu"];
        $dni = $_POST["dni"];
        
        if(strlen($dni) != 8){
            $errors[] = "Ingrese un DNI correcto.";
          }else {
            $sql = "SELECT dniAsesor FROM asesor WHERE dniAsesor='".$dni."'";
            $query = $conector->query($sql);
            $verificar = $query->num_rows;
            if($verificar>0){
                $errors[]="El DNI ya existe";
            }else{
                $sql = "INSERT INTO asesor (nomAsesor,apeAsesor,ocupacion,dniAsesor) VALUES ('".$nom."','".$app."','".$ocu."','".$dni."')";
                $update = $conector->query($sql);
                if($update){
                    $url ="asesores.php";
                    redireccionar($url);
                    $messages[]="Nuevo Asesor se ha REGISTRADO EXITOSAMENTE";
                    exit();
                }else{
                    $errors[]="No se pudo registrar"; 
                }
            }
          }
        }else{
            $errors[]="Error Desconocido";
        }

    if(isset($errors)){
        echo '<div class="alert" role="alert" style="background: linear-gradient(#DF272B, #DF272B); color:#fff; font-size:14px; letter-spacing:1px; font-weight:500;">';
        echo '<b><i class="fa fa-times" aria-hidden="true" style="font-size:15px;"></i></b> ';
              foreach($errors as $error){
                    echo $error;
              } 
        echo '</div>';
    }

    if(isset($messages)){
        echo '<div class="alert" role="alert" style="background: linear-gradient(#9FEF00, #9FEF00); color:#111927; font-size:14px; letter-spacing:1px; font-weight:500;">';
        echo '<b><i class="fa fa-check" aria-hidden="true" style="font-size:15px;"></i></b>  ';
              foreach($messages as $sms){
                    echo $sms;
              } 
        echo '</div>';
    }
?>