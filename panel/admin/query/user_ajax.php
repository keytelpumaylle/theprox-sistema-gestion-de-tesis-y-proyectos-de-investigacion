<?php
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';

          $sql = 'SELECT * FROM usuario';
          $consulta = $conector->query($sql);
        ?>
        <h3 style="font-size:16px; color:#fff;">Usuarios Registrados: </h3>
        <div class="row">
          <?php if ($consulta->num_rows > 0) {?>
            <?php while ($autor = $consulta->fetch_assoc()): ?>
              
              <!--profile--->
                <div class="col-lg-4 mb-2">
                    <div class="card bg-card" style="width: 20rem;">
                        <div class="card-body">
                            <input name="idAutor" value="<?php echo $autor['idUsu']?>" hidden>
                            <h5 class="card-title" style="font-size:18px; color:#A4B1CD;"><?php echo $autor['nomUsu'] . ' ' . $autor['appUsu']?></h5>
                            <p class="card-text" style="font-size:13px;"><?php echo $autor['emailUsu']?></p>
                            <div class="d-flex">
                                <a class="btn" style="background: linear-gradient(#9FEF0020, #9FEF0020); color:#9FEF00; font-size:13px; letter-spacing:1px; font-weight:800; " title="Editar Autores"  data-bs-toggle="modal" data-bs-target="#modal-editaut" 
                                data-id="<?php echo $autor['idUsu'];?>" 
                                data-nom="<?php echo $autor['nomUsu'];?>" 
                                data-ape="<?php echo $autor['appUsu'];?>" 
                                data-ema="<?php echo $autor['emailUsu'];?>" 
                                data-cod="<?php echo $autor['codUsu'];?>"
                                
                                href="#" 
                                >Editar</a>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
          <?php } else { ?>
              <p>No se encontraron autores</p>
          <?php } ?>
        </div>