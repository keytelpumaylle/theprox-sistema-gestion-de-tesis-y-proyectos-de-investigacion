<?php
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';

    if(empty($_SESSION['codAdmin'])){
        redireccionar2("../../../");
    }elseif(empty($_POST["nom"])){
        $errors[]="Ingrese el Nombre";
    }elseif(empty($_POST["app"])){
        $errors[]="Ingrese su Apellido Paterno";
    }elseif(empty($_POST["apm"])){
        $errors[]="Ingrese su Apellido Materno";
    }elseif(empty($_POST["dni"])){
        $errors[]="Ingrese el DNI";
    }elseif(empty($_POST["codigo"])){
        $errors[]="Ingrese el CODIGO";
    }elseif(empty($_POST["ema"])){
        $errors[]="Ingrese el CORREO INSTITUCIONAL";
    }elseif(empty($_POST["cel"])){
        $errors[]="Ingrese el número de CELULAR";
    }elseif(empty($_POST["fna"])){
        $errors[]="Ingrese la fecha de nacimiento";
    }elseif(empty($_POST["sex"])){
        $errors[]="Ingrese el GENERO";
    }elseif(empty($_POST["tipo"])){
        $errors[]="Ingrese el TIPO DE USUARIO";
    }elseif(empty($_POST["privilegios"])){
        $errors[]="Ingrese el PRIVILEGIO";
    }elseif(
        !empty($_POST["nom"]) &&
        !empty($_POST["app"]) &&
        !empty($_POST["apm"])&&
        !empty($_POST["dni"])&&
        !empty($_POST["codigo"])&&
        !empty($_POST["ema"])&&
        !empty($_POST["cel"])&&
        !empty($_POST["fna"])&&
        !empty($_POST["sex"])&&
        !empty($_POST["dni"])&&
        !empty($_POST["tipo"])&&
        !empty($_POST["privilegios"])
    ){
        $id = $_SESSION['codAdmin'];
        $nom = $_POST["nom"];
        $app = $_POST["app"];
        $apm = $_POST["apm"];
        $codigo = $_POST["codigo"];
        $ema = $_POST["ema"];
        $cel = $_POST["cel"];
        $fna = $_POST["fna"];
        $sex = $_POST["sex"];
        $dni = $_POST["dni"];
        $tipo = $_POST["tipo"];
        $pri = $_POST["privilegios"];
        $reg = date('Y-m-d\TH:i:s');

        if($reg === null){
            $errors[]="Fecha de Registro esta vacia";
        }else{
            //validacion de tablas
            if($pri==1){//tabla admin
                //validacion de DNI
                if(strlen($dni) != 8){
                    $errors[] = "Ingrese un DNI correcto.";
                }else{
                    $sql = "SELECT dniAdmin FROM administrador WHERE dniAdmin='".$dni."'";
                    $query = $conector->query($sql);
                    $verificar = $query->num_rows;
                    if($verificar>0){
                        $errors[]="El DNI ya existe";
                    }else{
                        //validacion de codigo
                        if(strlen($codigo) != 6){
                            $errors[] = "Ingrese un CODIGO correcto.";
                        }else{
                            $sql = "SELECT codAdmin FROM administrador WHERE codAdmin='".$codigo."'";
                            $query = $conector->query($sql);
                            $verificar = $query->num_rows;
                            if($verificar>0){
                                $errors[]="El CODIGO ya existe";
                            }else{
                                //validacion Email
                                if(strpos($ema, '@unamba.edu.pe') === false){
                                    $errors[] = "El CORREO INSTITUCIONAL no es correcto";
                                }else{
                                    $sql = "SELECT emaAdmin FROM administrador WHERE emaAdmin='".$ema."'";
                                    $query = $conector->query($sql);
                                    $verificar = $query->num_rows;
                                    if($verificar>0){
                                        $errors[]="El CORREO INSTITUCIONAL ya existe";
                                    }else{
                                        //validacion Celular
                                        if(strlen($cel) != 9){
                                            $errors[] = "Ingrese un N° CELULAR correcto.";
                                        }else{
                                            $sql = "SELECT celAdmin FROM administrador WHERE celAdmin='".$cel."'";
                                            $query = $conector->query($sql);
                                            $verificar = $query->num_rows;
                                            if($verificar>0){
                                                $errors[]="El N° CELULAR ya existe";
                                            }else{
                                                //clave Encriptada
                                                $llave = "Theprox_unamba_keytel_a2V5dGVs";
                                                $pass = encrypt($dni,$llave);
                                                //img
                                                $img= "assets/uploads/default.jpg";

                                                $sql = "INSERT INTO administrador (nomAdmin,appAdmin,apmAdmin,dniAdmin,codAdmin,emaAdmin,celAdmin,sexAdmin,fnaAdmin,passAdmin,estAdmin,imgAdmin,priAdmin,regAdmin) VALUES ('".$nom."','".$app."','".$apm."','".$dni."','".$codigo."','".$ema."','".$cel."','".$sex."','".$fna."','".$pass."','1','".$img."','".$tipo."','".$reg."')";
                                                $update = $conector->query($sql);
                                                if($update){
                                                    $url ="index.php";
                                                    redireccionar($url);
                                                    $messages[]="Usuario REGISTRADO EXITOSAMENTE";
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
                }
            }elseif($pri==2){//tabla usuario
                //tabla usuario
                if(strlen($dni) != 8){
                    $errors[] = "Ingrese un DNI correcto.";
                }else{
                    $sql = "SELECT dniUsu FROM usuario WHERE dniUsu='".$dni."'";
                    $query = $conector->query($sql);
                    $verificar = $query->num_rows;
                    if($verificar>0){
                        $errors[]="El DNI ya existe";
                    }else{
                        //validacion de codigo
                        if(strlen($codigo) != 6){
                            $errors[] = "Ingrese un CODIGO correcto.";
                        }else{
                            $sql = "SELECT codUsu FROM usuario WHERE codUsu='".$codigo."'";
                            $query = $conector->query($sql);
                            $verificar = $query->num_rows;
                            if($verificar>0){
                                $errors[]="El CODIGO ya existe";
                            }else{
                                //validacion Email
                                if(strpos($ema, '@unamba.edu.pe') === false){
                                    $errors[] = "El CORREO INSTITUCIONAL no es correcto";
                                }else{
                                    $sql = "SELECT emailUsu FROM usuario WHERE emailUsu='".$ema."'";
                                    $query = $conector->query($sql);
                                    $verificar = $query->num_rows;
                                    if($verificar>0){
                                        $errors[]="El CORREO INSTITUCIONAL ya existe";
                                    }else{
                                        //validacion Celular
                                        if(strlen($cel) != 9){
                                            $errors[] = "Ingrese un N° CELULAR correcto.";
                                        }else{
                                            $sql = "SELECT celUsu FROM usuario WHERE celUsu='".$cel."'";
                                            $query = $conector->query($sql);
                                            $verificar = $query->num_rows;
                                            if($verificar>0){
                                                $errors[]="El N° CELULAR ya existe";
                                            }else{
                                                //clave Encriptada
                                                $llave = "Theprox_unamba_keytel_a2V5dGVs";
                                                $pass = encrypt($dni,$llave);
                                                //img
                                                $img= "assets/uploads/default.jpg";

                                                $sql = "INSERT INTO usuario (nomUsu,appUsu,apmUsu,dniUsu,codUsu,emailUsu,celUsu,sexUsu,fnacUsu,passUsu,estUsu,imgUsu,priUsu,regUsu) VALUES ('".$nom."','".$app."','".$apm."','".$dni."','".$codigo."','".$ema."','".$cel."','".$sex."','".$fna."','".$pass."','1','".$img."','".$tipo."','".$reg."')";
                                                $update = $conector->query($sql);
                                                if($update){
                                                    $url ="index.php";
                                                    redireccionar($url);
                                                    $messages[]="Usuario REGISTRADO EXITOSAMENTE";
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