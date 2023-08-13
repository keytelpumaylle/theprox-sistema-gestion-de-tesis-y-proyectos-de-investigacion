<?php
@session_start();
include_once '../db/conexion.php';
include_once 'config.php';
include_once 'funciones.php';

if (empty($_POST['codigo'])) {
    $errors[] = "Ingrese su codigo";
} elseif (empty($_POST['password'])) {
    $errors[] = "Ingrese su contraseña";
} else {
    $llave = $template['clave_publica'];
    $email = $_POST['codigo'];
    $password = encrypt($_POST['password'], $llave);

    $sql = "SELECT * FROM administrador WHERE codAdmin='$email'";
    $consulta = $conector->query($sql);
    $correo_consulta = $consulta->num_rows;
    if ($correo_consulta < 1) {
        $errors[] = "El Codigo no es valido";
    } else {
        //tabla usuario
        $sql = "SELECT * FROM administrador WHERE codAdmin='$email' AND passAdmin = '$password'";
        $consulta = $conector->query($sql);
        $pass_consulta = $consulta->num_rows;
        if ($pass_consulta < 1) {
            $errors[]="Codigo o Contraseña Invalida";
        } else {
            while ($fila = $consulta->fetch_array()) {
                $id_user = $fila['idAdmin'];
                $nom_user = $fila['nomAdmin'];
                $cod_user = $fila['codAdmin'];
                $est_user = $fila['estAdmin'];
                $pri_user = $fila['priAdmin'];
            }
            $_SESSION['idAdmin'] = $id_user;
            $_SESSION['codAdmin'] = $cod_user;
            $_SESSION['priAdmin'] = $pri_user;
            $_SESSION['estAdmin'] = $est_user;
            $messages[] = $nom_user;
            if ($est_user == 1) {
                if ($pri_user == 1) {
                    // Redirigir a una carpeta de nombre mod_admin
                    $messages[] = " , redireccionando...";
                    $url = "panel/admin/";
                    redireccionar($url);
                } else {
                    // Redirigir a una carpeta de nombre mod_empleado
                    $messages[] = " , redireccionando..";
                    $url = "panel/admin/";
                    redireccionar($url);
                }
            }else {
                $errors[] = "Usuario Bloqueado, contactarse con soporte tecnico";
            }
        }
    }
}

if (isset($errors)) {
    echo '<div class="alert" role="alert" style="background: linear-gradient(#DF272B, #DF272B); color:#fff; font-size:14px; letter-spacing:1px; font-weight:500;">';
    echo '<b style="font-size:15px;">Error</b>: ';
    foreach ($errors as $error) {
        echo $error;
    }
    echo '</div>';
}

if (isset($messages)) {
    echo '<div class="alert" role="alert" style="background: linear-gradient(#9FEF00, #9FEF00); color:#111927; font-size:14px; letter-spacing:1px; font-weight:500;">';
    echo '<b style="font-size:15px;">Bienvenido</b>: ';
    foreach ($messages as $sms) {
        echo $sms;
    }
    echo '</div>';
}
?>
