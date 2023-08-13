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
    }elseif(
        !empty($_POST["nom"]) &&
        !empty($_POST["app"]) &&
        !empty($_POST["apm"])
    ){
        $idUsu = $_SESSION['idAdmin'];
        $codUsu = $_SESSION['codAdmin'];
        $nom = $_POST["nom"];
        $app = $_POST["app"];
        $apm = $_POST["apm"];
        $cel = $_POST["cel"];
        $ema = $_POST["ema"];
        $dni = $_POST["dni"];
        $fna = $_POST["fna"];
        $sex = $_POST["sex"];

        $sql = "UPDATE administrador SET nomAdmin='".$nom."',appAdmin='".$app."',apmAdmin='".$apm."',dniAdmin='".$dni."',emaAdmin='".$ema."',celAdmin='".$cel."',sexAdmin='".$sex."',fnaAdmin='".$fna."' WHERE codAdmin='".$codUsu."'";
        $update = $conector->query($sql);
        if($update){
            if(empty($_FILES["foto"]['size'])){
                $messages[]="Informacion Actualizada con Exito";
            }else{
                $year = date('Y');
                $mes = date('m');
                $ruta = "assets/uploads";
                $cadena = $ruta."/".$year."/".$mes."/"; //ruta para guardar el archivo
                $folder = "../../".$cadena; //Folder donde estara el arcivo
                //Crear folder si no existe
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $maxlimit = 90000000000000; // Máximo límite de tamaño (en bits)
                $allowed_ext = "jpg,png,jpeg,gif,jfif"; // Extensiones permitidas (usad una coma para separarlas)
                $overwrite = "yes"; // Permitir sobreescritura? (yes/no)
                $match1 = "";  
                $filesizeImagen = $_FILES['foto']['size']; // toma el tamaño del archivo
                $filenameImagen = strtolower($_FILES['foto']['name']); // toma el nombre del archivo y lo pasa a minúsculas
                $exten1 = pathinfo($filenameImagen, PATHINFO_EXTENSION);
                $dir_img1 = $codUsu.'_foto.'.$exten1;//renombrarlo
                if($filesizeImagen < 1){ // el archivo está vacío
                    $errors[]= "La foto esta vacía.";
                }elseif($filesizeImagen > $maxlimit){ // el archivo supera el máximo
                    $errors[]= "La <b>foto</b> supera el máximo tamaño permitido.";
                }else{
                    $file_ext = preg_split("/\./",$filenameImagen); //verifica las extensiones
	                $allowed_ext = preg_split("/\,/",$allowed_ext); // ídem extensiones
                    foreach($allowed_ext as $ext){
                        if($ext==$file_ext[1]) $match1 = "1"; // Permite el archivo
                    }
                    // Extensión no permitida
                    if(!$match1){
                        $errors[]= "La imagen elegida no esta permitida: ";
                    }else{
                        if(move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$dir_img1)){
                            $foto = $cadena.$dir_img1;
                            $sql="UPDATE administrador SET  imgAdmin='".$foto."' WHERE codAdmin='".$codUsu."'";
                            $query_update = $conector->query($sql);
                            if ($query_update){
                                $messages[] = "Evento Registrado con Éxito!.                                                       
                                                <script type='text/javascript'>
                                                                function redireccionar(){
                                                                    window.location='./';
                                                                } 
                                                                setTimeout ('redireccionar()', 3000);
                                                </script>";
                            } else{
                                $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
                            }
                        }
                    }
                }
            }
            $messages[]="Datos Actualizados Exitosamente";
        }else{
            $errors[]="Datos no Actualizados"; 
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