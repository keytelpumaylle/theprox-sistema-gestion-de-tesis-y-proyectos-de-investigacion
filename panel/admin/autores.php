<?php include_once 'sections/t_inicio.php';?>
    <!--NavBarHorizantal-->
    <?php include_once 'sections/t_navHorizontal.php';?>
  <main class="main-content position-relative h-100 border-radius-lg ">
    <!-- NavbarVertical-->
    <?php include_once 'sections/t_navVertical.php';?>
    <!-- Contenido Principal -->
    <div class="container-fluid py-4">
      <!-- Autores Lista -->
        <div class="viewautores"></div>
      </div>
      <!---Modal Editar---->
      <div class="modal" tabindex="-1" id="modal-editaut">
          <div class="modal-dialog">
            <div class="modal-content" style="background-color:#1A2332;">
              <div class="modal-body">
                <div class="row align-items-center">
                  <div class="row mb-4" style="">
                    <h5 class="modal-title text-center mt-4" style="font-weight:800; color:#FFF; font-size:15px; ">DATOS DEL AUTOR</h5>
                  </div>
                  <form id="form_edit_autor" class="row">
                    <input type="text" id="id" name="id" hidden>
                    <div class="col-lg-6 text-left mb-3">
                      <input class="form-control text-left bg-input" id="nomAutor" type="text" name="nombre">
                      <small class="modal-title">NOMBRE</small>
                    </div>
                    <div class="col-lg-6 text-left mb-3">
                      <input class="form-control text-left bg-input" id="apeAutor" type="text" name="apellidos">
                      <small class="modal-title">APELLIDOS</small>
                    </div>
                    <div class="col-lg-8 text-left mb-3">
                      <input class="form-control text-left bg-input" id="emaAutor" type="text" name="email">
                      <small class="modal-title">EMAIL</small>
                    </div>
                    <div class="col-lg-4 text-left mb-3">
                      <input class="form-control text-left" id="codAutor" type="text" name="codigo" disabled>
                      <small class="modal-title">CODIGO</small>
                    </div>
                    <div class="col-md-12" id="div_autor"></div>

                    <div class="col-lg-12 mt-4 text-center">
                      <button type="submit" class="btn" data-bs-dismiss="modal" style="background: linear-gradient(#DF272B20, #DF272B20); color:#DF272B; font-size:13px; letter-spacing:1px; font-weight:800; margin-right:5px;">Cancelar</button>
                      <button type="submit" class="btn" style="background: linear-gradient(#9FEF0020, #9FEF0020); color:#9FEF00; font-size:13px; letter-spacing:1px; font-weight:800;">Actualizar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
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
      autores(1);
    });
  </script>  
  <!--   fin   -->
<?php include_once 'sections/t_fin.php';?>