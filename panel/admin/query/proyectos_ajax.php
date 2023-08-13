<?php
    @session_start();
    include_once '../../../db/conexion.php';
    include_once '../../../config/config.php';
    include_once '../../../config/funciones.php';
    //impresion de archivos
    $sql = "SELECT * FROM archivo";
    $consulta = $conector->query($sql);

          if ($consulta->num_rows > 0) {
            while ($archivo = $consulta->fetch_assoc()):
              $idArchivo = $archivo['idArchivo'];
              $titulo = $archivo['Titulo'];
              $descripcion = $archivo['Descripcion'];
              $fPubl = $archivo['fPubl'];
              $link = $archivo['Ubicacion'];
              $dniAutor = $archivo['autorDni'];
              $dniAdmin = $archivo['adminDni'];
              $catId = $archivo['catId'];
              $dniAsesor = $archivo['asesorDni'];
              $calificacion = $archivo['calId'];
              //recueprando datos del autor
              $sqlautor ="SELECT * FROM autor WHERE dniAutor='".$dniAutor."' ";
              $consultaautor = $conector->query($sqlautor);
              if($filaautor = $consultaautor->fetch_array()){
                
                //recpuerando datos dela dministrador
                $sqladmin ="SELECT * FROM administrador WHERE dniAdmin='".$dniAdmin."' ";
                $consultaadmin = $conector->query($sqladmin);
                if($filaadmin = $consultaadmin->fetch_array()){
                  
                  //recuperando datos de la categoria
                  $sqlcate ="SELECT * FROM categoría WHERE idCat='".$catId."' ";
                  $consultacate = $conector->query($sqlcate);
                  if($filacate = $consultacate->fetch_array()){
                    
                    //recuperando datos del asesor
                    $sqlasesor ="SELECT * FROM asesor WHERE dniAsesor='".$dniAsesor."' ";
                    $consultaasesor = $conector->query($sqlasesor);
                    if($filaasesor = $consultaasesor->fetch_array()){
                     
                      //recupernado daots de la calificacion
                      $sqlcali ="SELECT * FROM calificacion WHERE idCal='".$calificacion."' ";
                      $consultacali = $conector->query($sqlcali);
                      while($filacali = $consultacali->fetch_array()):
                        $idCal = $filacali['idCal'];
                        $puntuacion = $filacali['Puntuacion'];
                        $aceptacion = $filacali['Aceptacion'];
                        
                        ?>
                   
                        <div class="col-lg-12 col-md-6 mb-2">
                          <div class="card bg-card">
                            <div class="card-body">
                              <div class="d-flex flex-column">
                                <p class="mb-1 text-bold" style="font-size:11px;">
                                  <?php $star='<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="m323-205 157-94 157 95-42-178 138-120-182-16-71-168-71 167-182 16 138 120-42 178ZM233-80l65-281L80-550l288-25 112-265 112 265 288 25-218 189 65 281-247-149L233-80Zm247-355Z" fill="#FFAF00"/></svg>'; 
                                  $puntuacion = $puntuacion;for($i = 0; $i < $puntuacion; $i++) {echo $star;}?>
                                </p>

                                <p class="mb-1 pt-2 text-bold" style="font-size:11px; color:#A4B1CD;">
                                  <span style="letter-spacing:1px; text-transform: uppercase; font-size:12px;">
                                  <strong><?php echo $filaautor['nomAutor'];?></strong></span> | 
                                  <span>#<?php echo $filacate['nombreCat']?></span> | 
                                  <span><?php echo $archivo['fPubl'];?></span>
                                </p>
                                
                                <h6 class="font-weight-bolder" style="font-size: 15px; color:#fff;">
                                  <?php echo $archivo['Titulo'];?>
                                </h6>

                                <p class="mb-2"><?php echo $archivo['Descripcion'];?></p>
                                <div class="d-flex">
                                    <a class=" text-sm font-weight-bold mb-0 icon-move-right" style="color:#9FEF00;" href="<?php $archivo['Ubicacion'];?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                                        <path d="M480.118-330Q551-330 600.5-379.618q49.5-49.617 49.5-120.5Q650-571 600.382-620.5q-49.617-49.5-120.5-49.5Q409-670 359.5-620.382q-49.5 49.617-49.5 120.5Q310-429 359.618-379.5q49.617 49.5 120.5 49.5Zm-.353-58Q433-388 400.5-420.735q-32.5-32.736-32.5-79.5Q368-547 400.735-579.5q32.736-32.5 79.5-32.5Q527-612 559.5-579.265q32.5 32.736 32.5 79.5Q592-453 559.265-420.5q-32.736 32.5-79.5 32.5ZM480-200q-146 0-264-83T40-500q58-134 176-217t264-83q146 0 264 83t176 217q-58 134-176 217t-264 83Zm0-300Zm-.169 240Q601-260 702.5-325.5 804-391 857-500q-53-109-154.331-174.5-101.332-65.5-222.5-65.5Q359-740 257.5-674.5 156-609 102-500q54 109 155.331 174.5 101.332 65.5 222.5 65.5Z"fill="#9FEF00"/>
                                    </svg>
                                    Ver
                                    </a>

                                    <a class=" text-sm font-weight-bold mb-0 icon-move-right mx-4" style="color:#056ECE;" title="Editar Proyecto" data-bs-toggle="modal" data-bs-target="#modal-editar-proyecto" 
                                    data-id="<?php echo $archivo['idArchivo'];?>" 
                                    data-title="<?php echo $archivo['Titulo'];?>" 
                                    data-descripcion="<?php echo $archivo['Descripcion'];?>" 
                                    data-link="<?php echo $archivo['Ubicacion'];?>" 
                                    data-categoria="<?php echo $filacate['nombreCat'];?>" 
                                    data-fecha="<?php echo $archivo['fPubl'];?>" 
                                    data-autor="<?php echo $filaautor['nomAutor'];?>"
                                    data-dniautor="<?php echo $filaautor['dniAutor'];?>" 
                                    href="#">

                                      <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M180-180h44l443-443-44-44-443 443v44Zm614-486L666-794l42-42q17-17 42-17t42 17l44 44q17 17 17 42t-17 42l-42 42Zm-42 42L248-120H120v-128l504-504 128 128Zm-107-21-22-22 44 44-22-22Z" fill="#056ECE"/></svg>
                                    Editar
                                    </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <?php
                        
                      endwhile;
                    } 
                  } 
                } 
              } 
            endwhile; 
          } else { 
            echo "<p>No se encontraron autores</p>";
          } 
        ?>