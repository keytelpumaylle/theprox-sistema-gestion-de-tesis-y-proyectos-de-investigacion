<?php include_once 'sections/t_inicio.php';?>
    <!--NavBarHorizantal-->
    <?php include_once 'sections/t_navHorizontal.php';?>
  <main class="main-content position-relative h-100 border-radius-lg ">
    <!-- NavbarVertical-->
    <?php include_once 'sections/t_navVertical.php';?>
    <!-- Contenido Principal -->
    <div class="container-fluid py-4">
      <!-- Estadisticas -->
      <div class="row">
        <?php
          $sql = "SELECT * FROM archivo";
          $consulta = $conector->query($sql);
          $proyecto = $consulta->num_rows;
        ?>
        
      </div>
      <!-- contenido proyectos -->
      

        <div class="row mt-4">
          <div class="viewproyect"></div>
        </div>
        
        <!---Modal Editar---->
        <div class="modal" tabindex="-1" id="modal-editar-proyecto">
          <div class="modal-dialog">
            <div class="modal-content" style="background-color:#1A2332;">
              <div class="modal-body">
                <div class="row align-items-center">
                  <div class="row mb-4" style="">
                    <h5 class="modal-title text-center mt-4" style="font-weight:800; color:#FFF; font-size:15px; ">DATOS DEL PROYECTO</h5>
                  </div>
                  <form id="form_editar_proyecto" class="row">
                    <input type="text" id="id" name="idArchivo" hidden>
                    <div class="col-lg-12 text-left mb-3">
                      <input class="form-control text-left bg-input" id="title" type="text" name="titleArchivo">
                      <small class="modal-title">TITULO</small>
                    </div>
                    <div class="col-lg-12 text-left mb-3">
                      <input class="form-control text-left bg-input" id="descripcion" type="text" name="descripArchivo">
                      <small class="modal-title">DESCRIPCION</small>
                    </div>
                    <div class="col-lg-12 text-left mb-3">
                      <input class="form-control text-left bg-input" id="link" type="text" name="urlArchivo">
                      <small class="modal-title">URL</small>
                    </div>
                    <div class="col-lg-12 text-left mb-3">
                      <input class="form-control text-left" id="categoria" type="text" name="cateArchivo" disabled>
                      <small class="modal-title">CATEGORIA</small>
                    </div>
                    <div class="col-lg-12 text-left mb-3">
                      <input class="form-control text-left bg-input" id="fecha" type="date" name="fechaArchivo">
                      <small class="modal-title">FECHA</small>
                    </div>
                    <div class="col-lg-12 text-left mb-3">
                      <input class="form-control text-left" id="autor" type="text" name="autorArchivo" disabled>
                      <small class="modal-title">AUTOR</small>
                    </div>
                    <input type="text" id="dniautor" name="dniautor" hidden>

                    
                    <div class="col-md-12" id="div_editar_proyecto"></div>

                    <div class="col-lg-12 mt-4 text-center">
                      <button type="button" class="btn" data-bs-dismiss="modal" style="background: linear-gradient(#DF272B20, #DF272B20); color:#DF272B; font-size:13px; letter-spacing:1px; font-weight:800; margin-right:5px;">Cancelar</button>
                      <button type="submit" class="btn " style="background: linear-gradient(#9FEF0020, #9FEF0020); color:#9FEF00; font-size:13px; letter-spacing:1px; font-weight:800;">Actualizar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-----Modal Eliminar--->
        <div class="modal" tabindex="-1" id="modal-eliminar-proyecto">
        <div class="modal-dialog">
          <div class="modal-content" style="background-color:#1A2332;">
            <div class="modal-body">
              <div class="row align-items-center">
                <div class="row mb-4" style="">
                  <h5 class="modal-title text-center mt-4" style="font-weight:800; color:#FFF; font-size:25px;">¿DESEAS RECHAZAR LA SOLICITUD?</h5>
                </div>
                <form id="form_eliminar_proyecto" class="row">
                  <input  type="text" id="id">
                  <div class="col-md-12" id="div_proyecto_eliminar"></div>

                  <div class="col-lg-12 mt-4 text-center">
                    <button type="button" class="btn" data-bs-dismiss="modal" style="background: linear-gradient(#DF272B20, #DF272B20); color:#DF272B; font-size:13px; letter-spacing:1px; font-weight:800; margin-right:5px;">Cancelar</button>
                    <button type="submit" class="btn " style="background: linear-gradient(#9FEF0020, #9FEF0020); color:#9FEF00; font-size:13px; letter-spacing:1px; font-weight:800;">Eliminar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- compaginacion -->
            
        <div class="col-lg-12 mb-lg-0 mt-4" style="background-color:;">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      
      <!-- Footer -->
      <?php include_once 'sections/t_footer.php';?>
      
    </div>
  </main>
  <!--   script   -->
  <script src="../../assets/js/jquery-3.4.1.js"></script>
  <script src="js/script.js?v=320723"></script>
  <?php include_once 'sections/t_script.php';?>
  <script>
    $(document).ready(function(){
      proyectos(1);
    });
  </script>  
  <!--   fin   -->
<?php include_once 'sections/t_fin.php';?>