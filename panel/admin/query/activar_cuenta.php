<?php
@session_start();
include_once '../../../db/conexion.php';
include_once '../../../config/config.php';
include_once '../../../config/funciones.php';

if (empty($_SESSION['codAdmin'])) {
    redireccionar2("../../../");
} elseif (empty($_POST["idusu"])) {
    $errors[] = "Identificador no encontrado";
} elseif (!empty($_POST["idusu"])) {
    $id = $_SESSION['codAdmin'];
    $idUsu = $_POST["idusu"];

    $sql = "SELECT idUsu FROM usuario WHERE idUsu = '".$idUsu."'";
    $query = $conector->query($sql);
    $verificar = $query->num_rows;

    if ($verificar > 0) {
        
        $sql = "UPDATE usuario SET estUsu='1' WHERE idUsu = '".$idUsu."'";
        $update = $conector->query($sql);

        if ($update) {
            $url = "index.php";
            redireccionar($url);
            $messages[] = "Activando la Cuenta...";
        } else {
            $errors[] = "No se pudo activar la cuenta";
        }
    } else {
        $errors[] = "No se encontró el usuario con ese identificador";
    }
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