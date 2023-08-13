<?php
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';

    if(empty($_SESSION['codAdmin'])){
        redireccionar2("../../../");
    }elseif(empty($_POST["categoria"])){
        $errors[]="Ingrese una categoria";
    }elseif(
        !empty($_POST["categoria"])
    ){
        $id = $_SESSION['codAdmin'];
        $cat = $_POST["categoria"];

        // Convertir la categoría ingresada y la categoría en la base de datos a minúsculas
        $cat_ingresada = strtolower($cat);

        $sql = "SELECT * FROM categoría";
        $query = $conector->query($sql);
        $existe_categoria = false;

        while ($row = $query->fetch_assoc()) {
            $nombre_cat_bd = strtolower($row['nombreCat']);
            if ($nombre_cat_bd === $cat_ingresada) {
                // La categoría ya existe
                $existe_categoria = true;
                break;
            }
        }

        if (!$existe_categoria) {
            $sql = "INSERT INTO categoría (nombreCat) VALUES ('".$cat."')";
            $update = $conector->query($sql);
            if ($update) {
                $url = "proyectosUpload.php";
                redireccionar($url);
                $messages[] = "Categoría registrada correctamente";
            } else {
                $errors[] = "No se pudo registrar"; 
            }
        } else {
            $errors[] = "Esta Categoría ya existe"; 
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