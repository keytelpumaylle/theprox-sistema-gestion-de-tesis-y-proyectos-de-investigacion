<?php
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';

    if(empty($_SESSION['codAdmin'])){
        redireccionar2("../../../");
    }elseif(empty($_POST["idArchivo"])){
        $errors[]="Ingrese el ID del ARCHIVO";
    }elseif(empty($_POST["titleArchivo"])){
        $errors[]="Ingrese el TITUTLO";
    }elseif(empty($_POST["descripArchivo"])){
        $errors[]="Ingrese la DESCRIPCION";
    }elseif(empty($_POST["urlArchivo"])){
        $errors[]="Ingrese su URL";
    }elseif(empty($_POST["fechaArchivo"])){
        $errors[]="Ingrese la FECHA";
    }elseif(
        !empty($_POST["idArchivo"]) &&
        !empty($_POST["titleArchivo"]) &&
        !empty($_POST["descripArchivo"])&&
        !empty($_POST["urlArchivo"])&&
        !empty($_POST["fechaArchivo"])
    ){
        $id = $_SESSION['codAdmin'];
        $idArchivo = $_POST["idArchivo"];
        $titleArchivo = $_POST["titleArchivo"];
        $descripArchivo = $_POST["descripArchivo"];
        $urlArchivo = $_POST["urlArchivo"];
        $fechaArchivo = $_POST["fechaArchivo"];
        $dniautor = $_POST["dniautor"];
        
        $sql = "SELECT dniAutor FROM autor WHERE dniAutor='".$dniautor."'";
        $query = $conector->query($sql);
        $verificar = $query->num_rows;
        if($verificar>0){
            $sql = "SELECT * FROM archivo WHERE idArchivo='".$idArchivo."'";
            $query = $conector->query($sql);
            $verificar = $query->num_rows;
            if($verificar>0){
                $fecha =date('Y-m-d');
                $sql = "UPDATE archivo SET Titulo = '".$titleArchivo."', Descripcion = '".$descripArchivo."', fPubl = '".$fecha."', Ubicacion = '".$urlArchivo."' WHERE idArchivo = '".$idArchivo."'";
                $update = $conector->query($sql);
                if($update){
                    $url ="proyectos.php";
                    redireccionar($url);
                    $messages[]="Proyecto actualizado correctamente";
                }else{
                    $errors[]="No se pudo actualizar"; 
                }
            }else{
                $errors[]="ARchivo no encontrado";
            } 
        }else{
            $errors[]="Autor no encontrado";
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