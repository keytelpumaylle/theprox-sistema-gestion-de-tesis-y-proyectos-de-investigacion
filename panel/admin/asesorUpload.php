<?php include_once 'sections/t_inicio.php';?>
    <!--NavBarHorizantal-->
    <?php include_once 'sections/t_navHorizontal.php';?>
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
                <form id="asesorUpload" class="row mx-2">
                  <h3 class="pb-2" style="font-size:25px; color:#fff;">Registrar Asesor</h3>
                  <p style="font-size:11px; color:#9FEF00; letter-spacing:2px; font-weight:600;">DATOS DEL NUEVO ASESOR</p>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="nom" type="text" class="form-control bg-input">
                    <small class="modal-title">NOMBRE</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="ap" type="text" class="form-control bg-input" value="">
                    <small class="modal-title">APELLIDO COMPLETO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="ocu" type="text" class="form-control bg-input" value="">
                    <small class="modal-title">OCUPACION</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="dni" type="text" class="form-control bg-input" value="">
                    <small class="modal-title">DNI</small>
                  </div>

                  <div class="col-md-12" id="div_asesor"></div>

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
      <?php include_once 'sections/t_footer.php';?>
    </div>
  </main>
  <!--   script   -->
  <script src="../../assets/js/jquery-3.4.1.js"></script>
  <script src="js/script.js"></script>
  <?php include_once 'sections/t_script.php';?>
  <!--   fin   -->
<?php include_once 'sections/t_fin.php';?>