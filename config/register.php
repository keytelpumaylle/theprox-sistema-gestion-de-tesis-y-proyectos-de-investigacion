<?php
@session_start();
include_once '../db/conexion.php';
include_once 'config.php';
include_once 'funciones.php';

if (empty($_POST['nom'])) {
    $errors[] = "Ingrese su nombre";
}elseif (empty($_POST['app'])) {
    $errors[] = "Ingrese su apellido paterno";
}elseif (empty($_POST['codigo'])) {
    $errors[] = "Ingrese su codigo";
}elseif (empty($_POST['ema'])) {
    $errors[] = "Ingrese su correo universitario";
}elseif (empty($_POST['dni'])) {
    $errors[] = "Ingrese su Dni";
}elseif (empty($_POST['fna'])) {
    $errors[] = "Ingrese su Fecha de Nacimiento";
}elseif (empty($_POST['sex'])) {
    $errors[] = "Seleccione su genero";
}elseif (empty($_POST['pri'])) {
    $errors[] = "Seleccione su estado";
}elseif(
    !empty($_POST["nom"]) &&
    !empty($_POST["app"]) &&
    !empty($_POST["codigo"])&&
    !empty($_POST["ema"])&&
    !empty($_POST["dni"])&&
    !empty($_POST["sex"])&&
    !empty($_POST["pri"])&&
    !empty($_POST["fna"])
){
    $nom = $_POST["nom"];
    $app = $_POST["app"];
    $codigo = $_POST["codigo"];
    $ema = $_POST["ema"];
    $dni = $_POST["dni"];
    $sex = $_POST["sex"];
    $fna = $_POST["fna"];
    $pri = $_POST["pri"];
    $reg = date('Y-m-d\TH:i:s');

    $llave = $template['clave_publica'];
    $codigo = $_POST['codigo'];
    $password = encrypt($_POST['dni'], $llave);
    //validadndo codigo
    if(strlen($codigo) != 6){
        $errors[] = "Ingrese un CODIGO correcto.";
    }else{
        $sql = "SELECT codUsu FROM usuario WHERE codUsu='".$codigo."'";
        $query = $conector->query($sql);
        $verificar = $query->num_rows;
        if($verificar>0){
            $messages[]="Registrado exitosamente";
            
        }else{
            //validanddo email
            if(!preg_match('/^\d{6}@unamba.edu.pe$/', $ema)){
                $errors[] = "El CORREO INSTITUCIONAL no es correcto";
            }else{
                $sql = "SELECT emailUsu FROM usuario WHERE emailUsu='".$ema."'";
                $query = $conector->query($sql);
                $verificar = $query->num_rows;
                if($verificar>0){
                    $errors[]="El CORREO INSTITUCIONAL ya existe";
                    
                }else{
                    //validando Dni
                    if(strlen($dni) != 8){
                        $errors[] = "Ingrese un DNI correcto.";
                    }else{
                        $sql = "SELECT dniUsu FROM usuario WHERE dniUsu='".$dni."'";
                        $query = $conector->query($sql);
                        $verificar = $query->num_rows;
                        if($verificar>0){
                            $errors[]="El DNI ya existe";
                            
                        }else{
                            //encriptando pass
                            $llave = "Theprox_unamba_keytel_a2V5dGVs";
                            $pass = encrypt($dni,$llave);
                            //img
                            $img= "assets/uploads/default.jpg";
                            //registrando usuarios
                            $sql = "INSERT INTO usuario (nomUsu,appUsu,apmUsu,dniUsu,codUsu,emailUsu,celUsu,sexUsu,fnacUsu,passUsu,estUsu,imgUsu,priUsu,regUsu) VALUES ('".$nom."','".$app."','','".$dni."','".$codigo."','".$ema."','','".$sex."','".$fna."','".$pass."','2','".$img."','".$pri."','".$reg."')";
                            $update = $conector->query($sql);
                            if($update){
                                $messages[]="Registro Exitoso, su cuenta puede tardar 24h en habilitarse.";
                                $url ="index.php";
                                redireccionar($url);
                                exit();
                            }else{
                                $errors[]="No se pudo registrar"; 
                            }
                        }
                    }
                }
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
