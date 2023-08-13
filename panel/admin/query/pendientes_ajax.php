<?php 
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';

    $sql = "SELECT * FROM usuario WHERE estUsu=2";
            $consulta = $conector->query($sql);
            if ($consulta->num_rows > 0) {
              while ($archivo = $consulta->fetch_assoc()):
                $id = $archivo['idUsu'];
                $fecha = $archivo['regUsu'];
                $nom = $archivo['nomUsu'];
                $app = $archivo['appUsu'];
                $dni = $archivo['dniUsu'];
                $cod = $archivo['codUsu'];
                $ema = $archivo['emailUsu'];?>

                <div class="mt-2 my-2" style="background-color:#1A2332; border-radius: 10px;box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);">
                  <div  style="font-size:12px; margin-left:10px;">
                      <div class="row">
                          <div class="col-lg-6 m-2">
                              <small style="font-size:12px; color:#A1AEC9;"><?php echo $fecha;?></small>
                              <p style="margin-bottom: 0; font-size:16px;text-transform: uppercase; color:#fff"><?php echo $nom;?> <?php echo $app;?></p>
                              <small style="font-size:13px;color:#A1AEC9;">Dni:<?php echo $dni;?></small> - 
                              <small style="font-size:13px;color:#A1AEC9;">codigo:<?php echo $cod;?></small> - 
                              <small style="font-size:13px;color:#A1AEC9;">email:<?php echo $archivo['emailUsu'];?></small>
                          </div>
                          <div class="mt-3 col-lg-5 ms-auto d-flex justify-content-center align-items-center">
                              

                              <button class="btn" title="Activar Cuenta" style="background-color:#9FEF00; color:#111927;" data-bs-toggle="modal" data-bs-target="#modal-activar" data-id="<?php echo $archivo['idUsu'];?>" data-nom="<?php echo $archivo['nomUsu'];?>" data-app="<?php echo $archivo['appUsu'];?>" data-cod="<?php echo $archivo['codUsu'];?>" href="#">Activar</button>
                          </div>
                          
                      </div>
                  </div>
                </div>
            <?php
              endwhile;
            }else{
              echo "<p>No se encontraron autores</p>";
            }
            if(isset($error)){
                echo'<div class="alert alert-warning alert-dismissible text-center">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Comunicado!</h5>';
                    foreach($error as $err){
                    echo $err;
                }
                echo'</div>';
            }
            if(isset($message)){
                echo'<div class="alert alert-success" role="alert">';
                echo '<b>Bien!</b> ';
                foreach($message as $sms){
                    echo $sms;
                }
                echo '</div>';
            }                    
?>
