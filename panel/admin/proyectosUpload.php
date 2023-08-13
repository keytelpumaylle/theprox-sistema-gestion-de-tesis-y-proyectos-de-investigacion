<?php include_once 'sections/t_inicio.php';?>
    <!--NavBarHorizantal-->
    <?php include_once 'sections/t_navHorizontal.php';?>
    <?php include_once 'sections/add.php';?>
  <main class="main-content position-relative h-100 border-radius-lg ">
    <!-- NavbarVertical-->
    <?php include_once 'sections/t_navVertical.php';?>
    <!-- Contenido Principal -->
    <div class="container-fluid py-4">
      <!-- contenido proyectos -->
      <div class="row mt-4">
        <!-- contenido proyectos -->
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3 rounded" style="background-color:#1A2332;">
              <div class="row" >
                <form id="ProyectosUpload" class="row mx-2">
                  <h3 class="pb-2" style="font-size:25px; color:#fff;">Registrar Proyecto</h3>
                  <p style="font-size:11px; color:#9FEF00; letter-spacing:2px; font-weight:600;">DATOS DEL PROYECTO</p>
                  <div class="col-lg-12 text-left mb-3">
                    <input name="titulo" class="form-control bg-input" value="">
                    <small class="modal-title">TITULO</small>
                  </div>
                  <div class="col-lg-12 text-left mb-3">
                    <input name="des" class="form-control bg-input" value="">
                    <small class="modal-title">DESCRIPCION</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <select name="tipo" class="form-control text-left bg-input">
                      <option>Elija una opcion...</option>
                      <option value="1">Proyecto de Investigacion</option>
                      <option value="2">Tesis</option>
                    </select>
                    <small class="modal-title">TIPO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="fecha" type="datetime" class="form-control text-center bg-input" style="background-color:#111927; color:#ffffff50;" value="<?php echo date('m-d | H:i:s');?>" disabled>
                    <small class="modal-title">FECHA DE REGISTRO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="fPubl" type="date" class="form-control text-center bg-input" style="background-color:#111927; color:#ffffff50;" value="<?php echo date('Y-m-d');?>" disabled>
                    <small class="modal-title">AÑO DE REGISTRO</small>
                  </div>
                  <div class="col-lg-12 text-left mb-3">
                    <input name="ubicacion" class="form-control text-left bg-input" placeholder="https://www.treprox.com/archivo.html">
                    <small class="modal-title">LINK DEL PROYECTO</small>
                  </div>
                  <p style="font-size:11px; color:#9FEF00; letter-spacing:2px; font-weight:600;">DATOS OBLIGATORIOS</p>
                  <div class="col-lg-4 text-left mb-3">
                    <?php
                      $sql = "SELECT * FROM asesor";
                      $query = $conector->query($sql);
                      $consulta = $query->num_rows;
                    ?>
                    <select name="dniAsesor" class="form-control text-left bg-input">
                      <option>Elija un asesor...</option>
                      <?php if ($consulta > 0) { ?>
                        <?php while ($asesor = $query->fetch_assoc()) { ?>
                          <option value="<?php echo $asesor['dniAsesor']; ?>"><?php echo $asesor['nomAsesor'] . ' ' . $asesor['apeAsesor']; ?></option>
                        <?php } ?>
                      <?php } else { ?>
                        <option>No se encontraron asesores</option>
                      <?php } ?>
                    </select>
                    <small class="modal-title">ASESOR</small>
                  </div>

                  <div class="col-lg-4 text-left mb-3">
                    <?php
                        $sql = "SELECT * FROM autor";
                        $query = $conector->query($sql);
                        $consulta = $query->num_rows;
                    ?>
                    <select name="dniAutor" class="form-control text-left bg-input">
                      <option>Elija un autor...</option>
                      <?php if ($consulta > 0) { ?>
                        <?php while ($autor = $query->fetch_assoc()) { ?>
                          <option value="<?php echo $autor['dniAutor']; ?>"><?php echo $autor['nomAutor'] . ' ' . $autor['apeAutor']; ?></option>
                        <?php } ?>
                      <?php } else { ?>
                        <option>No se encontraron autores</option>
                      <?php } ?>
                    </select>
                    <small class="modal-title">AUTOR</small>
                  </div>
                  
                  <p style="font-size:11px; color:#9FEF00; letter-spacing:2px; font-weight:600;">ELIJA LA CATEGORIA MAS ADECUADA</p>
                  <div class="col-lg-4 text-left mb-3">
                    <?php
                        $sql = "SELECT * FROM categoría";
                        $query = $conector->query($sql);
                        $consulta = $query->num_rows;
                    ?>
                    <select name="categoria" class="form-control text-left bg-input">
                      <option>Elija la categoria...</option>
                      <?php if ($consulta > 0) { ?>
                        <?php while ($cat = $query->fetch_assoc()) { ?>
                          <option value="<?php echo $cat['idCat']; ?>"><?php echo $cat['nombreCat']; ?></option>
                        <?php } ?>
                      <?php } else { ?>
                        <option>No se encontraron autores</option>
                      <?php } ?>
                    </select>
                    <small class="modal-title">CATEGORIA</small>
                  </div>

                  <div class="col-md-12" id="div_proyecto"></div>
                  <div class="col-lg-12 mt-4 text-end">
                    <button type="button" class="btn" data-bs-dismiss="modal" style="background: linear-gradient(#DF272B20, #DF272B20); color:#DF272B; font-size:13px; letter-spacing:1px; font-weight:800; margin-right:5px;">Cancelar</button>
                    <button type="submit" class="btn " style="background: linear-gradient(#9FEF0020, #9FEF0020); color:#9FEF00; font-size:13px; letter-spacing:1px; font-weight:800;">Registrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <script src="../../assets/js/jquery-3.4.1.js"></script>
      <script src="js/script.js"></script> 
      <?php include_once 'sections/t_footer.php';?>
    </div>
  </main>
  <!--   script   -->
  <?php include_once 'sections/t_script.php';?>
  <!--   fin   -->
<?php include_once 'sections/t_fin.php';?>