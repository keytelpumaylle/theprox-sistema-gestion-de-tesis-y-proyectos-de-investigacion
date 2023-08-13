<?php
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';

    if(empty($_SESSION['codAdmin'])){
        redireccionar2("../../../");
    }elseif(empty($_POST["id"])){
        $errors[]="Ingrese el ID del ARCHIVO";
    }elseif(empty($_POST["nombre"])){
        $errors[]="Ingrese el Nombre";
    }elseif(empty($_POST["apellidos"])){
        $errors[]="Ingrese su APELLIDOS";
    }elseif(empty($_POST["ocu"])){
        $errors[]="Ingrese su Email";
    }elseif(
        !empty($_POST["id"]) &&
        !empty($_POST["nombre"]) &&
        !empty($_POST["apellidos"])&&
        !empty($_POST["ocu"])
    ){
        $id = $_SESSION['codAdmin'];
        $idAutor = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $ocu = $_POST["ocu"];
        $codigo = $_POST["codigo"];
        
        $sql = "UPDATE asesor SET nomAsesor = '".$nombre."', apeAsesor = '".$apellidos."', ocupacion = '".$ocu."' WHERE idAsesor= '".$idAutor."'";
        $update = $conector->query($sql);
        if($update){
            $url ="autores.php";
            redireccionar($url);
            $messages[]="Autor actualizado correctamente";
        }else{
            $errors[]="No se pudo actualizar"; 
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