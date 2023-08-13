<?php
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';

    if(empty($_SESSION['codAdmin'])){
        redireccionar2("../../../");
    }elseif(empty($_POST["cali"])){
        $errors[]="Ingrese una calificacion";
    }elseif(
        !empty($_POST["cali"])
    ){
        $id = $_SESSION['codAdmin'];
        $cali = $_POST["cali"];
        if($cali==1){
            $sql = "INSERT INTO calificacion (Puntuacion, Aceptacion) VALUES ('0', '0')";
            $update = $conector->query($sql);
            if($update){
                $url ="proyectosUpload.php";
                redireccionar($url);
                $messages[]="Calificacion Generada";
            }else{
                $errors[]="No se pudo Generar"; 
            }
        }else{
            $errors[]="Error Desconocido"; 
        }
        
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