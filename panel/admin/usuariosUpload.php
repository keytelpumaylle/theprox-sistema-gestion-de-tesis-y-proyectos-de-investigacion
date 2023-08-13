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
                <form id="usuariosUpload" class="row mx-2">
                  <h3 class="pb-2" style="font-size:25px; color:#fff;">Registrar Usuarios</h3>
                  <p style="font-size:11px; color:#9FEF00; letter-spacing:2px; font-weight:600;">DATOS DEL NUEVO USUARIO</p>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="nom" type="text" class="form-control text-center bg-input">
                    <small class="modal-title">NOMBRE</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="app" type="text" class="form-control bg-input" value="">
                    <small class="modal-title">APELLIDO PATERNO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="apm" type="text" class="form-control bg-input" value="">
                    <small class="modal-title">APELLIDO MATERNO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="dni" type="text" class="form-control bg-input" value="">
                    <small class="modal-title">DNI</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="codigo" type="text" class="form-control bg-input" value="">
                    <small class="modal-title">CODIGO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="ema" type="email" class="form-control bg-input" value="">
                    <small class="modal-title">CORREO INSTITUCIONAL</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="cel" type="text" class="form-control bg-input" value="">
                    <small class="modal-title">N° CELULAR</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="fna" type="date" class="form-control text-center bg-input">
                    <small class="modal-title">FECHA DE NACIMIENTO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="reg" type="datetime" class="form-control text-center bg-input" style="background-color:#111927; color:#ffffff50;" value="<?php echo date('Y-m-d\TH:i:s');?>" disabled>
                    <small class="modal-title">FECHA DE REGISTRO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <select name="sex" class="form-control text-left bg-input">
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>
                    </select>
                    <small class="modal-title">GENERO</small>
                  </div>
                  <p style="font-size:11px; color:#9FEF00; letter-spacing:2px; font-weight:600;">DATOS RELEVANTES</p>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="estado" type="datetime" class="form-control text-center bg-input" style="background-color:#111927; color:#ffffff50;" value="Activo" disabled>
                    <small class="modal-title">ESTADO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <input name="pass" type="password" class="form-control text-center bg-input" style="background-color:#111927; color:#ffffff50;" value="12345678" disabled>
                    <small class="modal-title">CONTRASEÑA</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <select name="tipo" class="form-control text-left bg-input">
                      <option value="">Seleccione</option>
                      <option value="1">Interno</option>
                      <option value="2">Externo</option>
                    </select>
                    <small class="modal-title">TIPO</small>
                  </div>
                  <div class="col-lg-4 text-left mb-3">
                    <select name="privilegios" class="form-control text-left bg-input">
                      <option value="0">Seleccione</option>
                      <option value="1">U. Administrador</option>
                      <option value="2">U. Normal</option>
                    </select>
                    <small class="modal-title">PRIVILEGIOS</small>
                  </div>

                  <div class="col-md-12" id="div_usuarios"></div>
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
  <script src="../../assets/js/jquery-3.4.1.js"></script>
  <script src="js/script.js"></script>
  <?php include_once 'sections/t_script.php';?>
  <!--   fin   -->
<?php include_once 'sections/t_fin.php';?>