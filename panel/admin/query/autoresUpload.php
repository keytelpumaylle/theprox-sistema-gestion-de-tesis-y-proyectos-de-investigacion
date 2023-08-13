<?php
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';

    if(empty($_SESSION['codAdmin'])){
        redireccionar2("../../../");
    }elseif(empty($_POST["nom"])){
        $errors[]="Ingrese el NOMBRE";
    }elseif(empty($_POST["ap"])){
        $errors[]="Ingrese sus APELLIDOS COMPLETOS";
    }elseif(empty($_POST["ema"])){
        $errors[]="Ingrese su OCUPACION";
    }elseif(empty($_POST["codigo"])){
        $errors[]="Ingrese su DNI";
    }elseif(
        !empty($_POST["nom"]) &&
        !empty($_POST["ap"]) &&
        !empty($_POST["ema"])&&
        !empty($_POST["dni"])&&
        !empty($_POST["codigo"])
    ){
        $id = $_SESSION['codAdmin'];
        $nom = $_POST["nom"];
        $app = $_POST["ap"];
        $ema = $_POST["ema"];
        $dni = $_POST["dni"];
        $codigo = $_POST["codigo"];
        
        if(strlen($codigo) != 6){
            $errors[] = "Ingrese un CODIGO correcto.";
          }else {
            $sql = "SELECT codAutor FROM autor WHERE codAutor='".$codigo."'";
            $query = $conector->query($sql);
            $verificar = $query->num_rows;
            if($verificar>0){
                $errors[]="El Codigo ya existe";
            }else{
                if(strlen($dni) != 8){
                    $errors[] = "Ingrese un DNI correcto.";
                }else{
                    $sql = "SELECT dniAutor FROM autor WHERE dniAutor='".$dni."'";
                    $query = $conector->query($sql);
                    $verificar = $query->num_rows;
                    if($verificar>0){
                        $errors[]="El DNI ya existe";
                    }else{
                        if(strpos($ema, '@unamba.edu.pe') === false){
                            $errors[] = "El CORREO INSTITUCIONAL no es correcto";
                        }else{
                            $sql = "SELECT emaAutor FROM autor WHERE emaAutor='".$ema."'";
                            $query = $conector->query($sql);
                            $verificar = $query->num_rows;
                            if($verificar>0){
                                $errors[]="El CORREO INSTITUCIONAL ya existe";
                            }else{
                                $sql = "INSERT INTO autor (dniAutor,nomAutor,apeAutor,codAutor,emaAutor) VALUES ('".$dni."','".$nom."','".$app."','".$codigo."','".$ema."')";
                                $update = $conector->query($sql);
                                if($update){
                                    $url ="autores.php";
                                    redireccionar($url);
                                    $messages[]="Nuevo Autor se ha REGISTRADO EXITOSAMENTE";
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