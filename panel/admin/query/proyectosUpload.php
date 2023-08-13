<?php
@session_start();
include_once '../../../db/conexion.php';
include_once '../../../config/config.php';
include_once '../../../config/funciones.php';

if (empty($_SESSION['codAdmin'])) {
    redireccionar2("../../../");
} elseif (empty($_POST["titulo"])) {
    $errors[] = "Ingrese el TITULO del proyecto";
} elseif (empty($_POST["des"])) {
    $errors[] = "Ingrese la DESCRIPCION del proyecto";
} elseif (empty($_POST["tipo"])) {
    $errors[] = "Ingrese el TIPO del proyecto";
} elseif (empty($_POST["ubicacion"])) {
    $errors[] = "Ingrese la URL del proyecto";
} elseif (empty($_POST["dniAsesor"])) {
    $errors[] = "Ingrese el DNI del ASESOR";
} elseif (empty($_POST["dniAutor"])) {
    $errors[] = "Ingrese el DNI del AUTOR";
} elseif (empty($_POST["categoria"])) {
    $errors[] = "Ingrese la CATEGORIA";
} elseif (
    !empty($_POST["titulo"]) &&
    !empty($_POST["des"]) &&
    !empty($_POST["tipo"]) &&
    !empty($_POST["ubicacion"]) &&
    !empty($_POST["dniAsesor"]) &&
    !empty($_POST["dniAutor"]) &&
    !empty($_POST["categoria"])
) {
    $id = $_SESSION['codAdmin'];
    $titulo = $_POST["titulo"];
    $des = $_POST["des"];
    $tipo = $_POST["tipo"];
    $ubi = $_POST["ubicacion"];
    $dniAsesor = $_POST["dniAsesor"];
    $dniAutor = $_POST["dniAutor"];
    $cat = $_POST["categoria"];
    
    $sql2="SELECT * FROM administrador WHERE codAdmin='".$id."'";
    $consulta = $conector->query($sql2);
    while($fila = $consulta->fetch_array()){
        $dniAdmin = $fila['dniAdmin'];
    }

    if (strlen($des) > 200){
        $errors[] = "La DESCRIPCION supera el máximo de 200 caracteres.";
    }else{
        if (strlen($dniAsesor) != 8) {
            //verificacion del dni Asesor
            $errors[] = "Ingrese un DNI correcto.";
        } else {
            $sql = "SELECT dniAsesor FROM asesor WHERE dniAsesor='" . $dniAsesor . "'";
            $query = $conector->query($sql);
            $verificar = $query->num_rows;
            if ($verificar > 0) {
    
                //verificacion del dni Autor
                if (strlen($dniAutor) != 8) {
                    $errors[] = "Ingrese un DNI correcto.";
                } else {
                    $sql = "SELECT dniAutor FROM autor WHERE dniAutor='" . $dniAutor . "'";
                    $query = $conector->query($sql);
                    $verificar = $query->num_rows;
                    if ($verificar > 0) {
                        $fecha = $reg = date('Y-m-d\TH:i:s');
                        $fPubl = $reg = date('Y-m-d');
                        //calificacion
                        $sql = "SELECT * FROM calificacion WHERE Puntuacion = '0' LIMIT 1";
                        $califi = $conector->query($sql);
                        //$califi = $query->num_rows;
                        while($calificacion = $califi->fetch_array()){
                            $idCal = $calificacion['idCal'];
                            $puntuacion = $calificacion['Puntuacion'];
                            $aceptacion = $calificacion['Aceptacion'];
                            $count=3;

                        }
                        if ($count > 0 AND $puntuacion==0 AND $aceptacion==0) {
                            //Actualizar datos Proyectos
                            $sql = "INSERT INTO archivo (Titulo, Descripcion, Tipo, Fecha, fPubl, Ubicacion, autorDni, adminDni, catId, asesorDni, calID) VALUES ('" . $titulo . "','" . $des . "','" . $tipo . "','" . $fecha . "','" . $fPubl . "','" . $ubi . "','" . $dniAutor . "','".$dniAdmin."','" . $cat . "','" .$dniAsesor. "','". $idCal ."')";
    
                            $update = $conector->query($sql);
                            if ($update) {
                                $url = "proyectos.php";
                                redireccionar($url);
                                $messages[] = "Proyecto REGISTRADO EXITOSAMENTE";
                                
                            } else {
                                $errors[] = "No se pudo registrar";
                            }
                        } else {
                            // Insertar nueva calificación
                            $sql = "INSERT INTO calificacion (Puntuacion, Aceptacion) VALUES ('0', '0')";
                            $update = $conector->query($sql);
                            $errors[] = "Creando una nueva Calificacion en la Tabla";
                        }
                    }
                }
            } else {
                $errors[] = "Registre al ASESOR con el DNI";
            }
        }
    }
} else {
    $errors[] = "Error Desconocido";
}

if (isset($errors)) {
    echo '<div class="alert" role="alert" style="background: linear-gradient(#DF272B, #DF272B); color:#fff; font-size:14px; letter-spacing:1px; font-weight:500;">';
    echo '<b><i class="fa fa-times" aria-hidden="true" style="font-size:15px;"></i></b> ';
    foreach ($errors as $error) {
        echo $error;
    }
    echo '</div>';
}

if (isset($messages)) {
    echo '<div class="alert" role="alert" style="background: linear-gradient(#9FEF00, #9FEF00); color:#111927; font-size:14px; letter-spacing:1px; font-weight:500;">';
    echo '<b><i class="fa fa-check" aria-hidden="true" style="font-size:15px;"></i></b>  ';
    foreach ($messages as $sms) {
        echo $sms;
    }
    echo '</div>';
}
?>
