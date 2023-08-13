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

    $sql = "SELECT * FROM usuario WHERE codUsu='$email'";
    $consulta = $conector->query($sql);
    $correo_consulta = $consulta->num_rows;
    if ($correo_consulta < 1) {        
        $errors[] = "El Codigo no es valido";
    } else {
        //tabla usuario
        $sql = "SELECT * FROM usuario WHERE codUsu='$email' AND passUsu = '$password'";
        $consulta = $conector->query($sql);
        $pass_consulta = $consulta->num_rows;
        if ($pass_consulta < 1) {
            $_SESSION['intentos'] = $_SESSION['intentos'] + 1;
            $int_rest = 3 - $_SESSION['intentos'];
            if ($int_rest < 0) {
                $sql_est = "UPDATE usuario SET estUsu=0 WHERE codUsu='$email'";
                $bloqueo = $conector->query($sql_est);
                if ($bloqueo) {
                    $errors[] = "Usuario Bloqueado";
                } else {
                    $errors[] = "No se puede bloquear al usuario";
                }
                unset($_SESSION['intentos']);
            } else {
                $errors[] = "Contraseña invalida, te quedan " . $int_rest . " intentos";
            }
        } else {
            while ($fila = $consulta->fetch_array()) {
                $id_user = $fila['idUsu'];
                $nom_user = $fila['nomUsu'];
                $cod_user = $fila['codUsu'];
                $est_user = $fila['estUsu'];
                $pri_user = $fila['priUsu'];
            }
            if ($est_user == 1) {
                // Verificar si ya existe un registro de usuario logueado con user=id_user y estUL=1
                $sql_check = "SELECT * FROM usuario_login WHERE idUsu='$id_user' AND estUL=1";
                $consulta_check = $conector->query($sql_check);
                $login_exists = $consulta_check->num_rows;

                if ($login_exists > 0) {
                    // Ya existe un usuario logueado, realiza las acciones correspondientes
                    $reg = date("Y-m-d H:i:s");
                    $clave_ul = generar_clave(11);
                    $sql_update = "UPDATE usuario_login SET regUL='$reg', claUL='$clave_ul' WHERE idUsu='$id_user' AND estUL=1";
                    $update = $conector->query($sql_update);
                    if ($update) {
                        $_SESSION['idUsu'] = $id_user;
                        $_SESSION['codUsu'] = $cod_user;
                        $_SESSION['nomUsu'] = $nom_user;
                        $_SESSION['priUsu'] = $pri_user;
                        
                        $messages[] = $nom_user;
                        if ($pri_user == 1) {
                            // Redirigir a una carpeta de nombre mod_admin
                            $messages[] = " , redireccionando...";
                            $url = "panel/user/";
                            redireccionar($url);
                        } else {
                            // Redirigir a una carpeta de nombre mod_empleado
                            $messages[] = " , redireccionando...";
                            $url = "panel/user/";
                            redireccionar($url);
                        }
                        unset($_SESSION['intentos']);
                    } else {
                        $errors[] = 'Sistema fallando';
                    }
                } else {
                    // No existe un usuario logueado, inserta uno nuevo
                    $reg = date("Y-m-d H:i:s");
                    $clave_ul = generar_clave(11);
                    $sql_insert = "INSERT INTO usuario_login (idUsu, regUL, claUL, estUL)
                                   VALUES ('$id_user', '$reg', '$clave_ul', 1)";
                    $insert = $conector->query($sql_insert);
                    if ($insert) {
                        $_SESSION['idUsu'] = $id_user;
                        $_SESSION['priUsu'] = $pri_user;
                        $messages[] = $nom_user;
                        if ($pri_user == 1) {
                            // Redirigir a una carpeta de nombre mod_admin
                            $url = "../panel/admin/";
                            redireccionar($url);
                        } else {
                            // Redirigir a una carpeta de nombre mod_empleado
                            $url = "../panel/user/";
                            redireccionar($url);
                        }
                        unset($_SESSION['intentos']);
                    } else {
                        $errors[] = 'Sistema fallando';
                    }
                }
            } else {
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
