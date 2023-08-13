<?php include_once 'sections/t_inicio.php';?>
  <!--NavBarHorizantal-->
  <?php include_once 'sections/t_navHorizontal.php';?>
  <div class="main-content position-relative h-100 border-radius-lg " style="background-color:#111927;">
    <!-- NavbarVertical-->
    <?php include_once 'sections/t_navVertical.php';?>
    <!----Estilos Generales de algunos componentes--->
    <!-- Contenido Principal -->
    <div class="container-fluid">
      <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('../../assets/img/portada/portada.jfif'); background-position-y: 100%;">
        <span class="mask bg-gradient-dark opacity-3"></span>
      </div>
      <div class="card blur shadow-blur mx-4 mt-n6">
        <div class="row gx-4" style="background-color:#1A2332; padding:15px; border:1px solid #1A2332; border-radius:15px">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../<?php echo $img_user;?>" alt="profile_image" style="height:75px; width:75px;" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1" style="color:#fff; font-size:22px; font-weight:800;"><?php echo $nom_user;?> <?php echo $app_user;?></h5>
              <p class="mb-0 font-weight-bold" style="font-size:13px; text-transform: uppercase; font-weight:400; letter-spacing:1px; color:#9FEF00;"><?php echo $pri;?></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0 ">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                <div style="background-color:#9FEF0020; border-radius:3px;padding:5px 10px 5px 10px;justify-content: center;border: 1px solid #9FEF00;">
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="modal" data-bs-target="#modal-actualizar" href="#" role="tab" aria-selected="false">
                      <i class="fa fa-spinner" aria-hidden="true" style="font-size:13px; color:#9FEF00;"></i>
                      <span class="ms-1" style="cursor:pointer; font-size:13px; color:#9FEF00;font-weight:400;">Actualizar Datos</span>
                    </a>
                  </li>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                          <h6 class="mb-0">Informacion del Usuario</h6>
                        </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <hr class="horizontal gray-light my-2">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nombre:</strong> &nbsp; <?php echo $nom_user;?></li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Apellidos:</strong> &nbsp; <?php echo $app_user;?> <?php echo $apm_user;?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Celular:</strong> &nbsp; <?php echo $cel_user;?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo $email_user;?></li>
                    </ul>
                  </div>
              </div>
            </div>
            
            <div class="col-12 col-xl-4">
              <div class="card h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                          <h6 class="mb-0">Datos Personales</h6>
                        </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <hr class="horizontal gray-light my-2">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Codigo:</strong> &nbsp; <?php echo $cod_user;?></li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">DNI:</strong> &nbsp; <?php echo $dni_user;?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Fecha de Nacimiento:</strong> &nbsp; <?php echo $fnac_user;?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Genero:</strong> &nbsp; <?php echo $genero;?></li>
                    </ul>
                  </div>
              </div>
            </div>
        </div>
    </div>
    <!--Modal Actualizar-->
    <div class="modal" tabindex="-1" id="modal-actualizar">
      <div class="modal-dialog">
        <!--Modal Actualizar-->
        <div class="modal-content" style="background-color:#1A2332;">
          <div class="modal-body">
            <div class="row align-items-center">
              <div class="row mb-4" style="">
                <h5 class="modal-title" style="color:#FFF; font-size:15px; letter-spacing:1px;">Actualizar mis Datos</h5>
              </div>
              <form id="form_perfil" class="row">
                <div class="col-lg-4 text-center mb-3">
                  <input name="nom" class="form-control text-center bg-input" value="<?php echo $nom_user;?>">
                  <small class="modal-title">NOMBRE</small>
                </div>
                <div class="col-lg-4 text-center mb-3">
                  <input name="app" class="form-control text-center bg-input" value="<?php echo $app_user;?>">
                  <small class="modal-title">A. PATERNO</small>
                </div>
                <div class="col-lg-4 text-center mb-3">
                  <input name="apm" class="form-control text-center bg-input" value="<?php echo $apm_user;?>">
                  <small class="modal-title">A. MATERNO</small>
                </div>
                <div class="col-lg-4 text-center mb-3">
                  <input name="cel" class="form-control text-center bg-input" value="<?php echo $cel_user;?>">
                  <small class="modal-title">CELULAR</small>
                </div>
                <div class="col-lg-8 text-center mb-3">
                  <input name="ema" class="form-control text-center bg-input" value="<?php echo $email_user;?>">
                  <small class="modal-title">EMAIL</small>
                </div>
                <div class="col-lg-4 text-center mb-3">
                  <input name="dni" class="form-control text-center bg-input" value="<?php echo $dni_user;?>">
                  <small class="modal-title">DNI</small>
                </div>
                <div class="col-lg-4 text-center mb-3">
                  <input name="fna" class="form-control text-center bg-input" type="date" value="<?php echo $fnac_user;?>">
                  <small class="modal-title">FECHA NACIMIENTO</small>
                </div>
                <div class="col-lg-12 text-center align-items-center mb-3">
                  <small>
                      <?php  
                      if ($sex_user === 'F') {
                          echo '<input name="sex" type="radio" value="F" checked><span class="modal-title">FEMENINO</span>';
                          echo '<input name="sex" type="radio" value="M"><span class="modal-title">MASCULINO</span>';
                      } else {
                          echo '<input name="sex" type="radio" value="F"><span class="modal-title">FEMENINO</span>';
                          echo '<input name="sex" type="radio" value="M" checked><span class="modal-title">MASCULINO</span>';
                      }
                      ?>
                  </small>
              </div>
                <div class="col-lg-12 text-center align-items-center mb-3">
                  <input name="foto" class="form-control text-center bg-input" type="file">
                  <small class="modal-title">FOTO DE PERFIL</small>
                </div>

                <div class="col-md-12" id="div_perfil"></div>

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
    <!-- Footer -->
    <?php include_once 'sections/t_footer.php';?>
  </div>
  <!-- Panel Popup Horizazontal -->
  <!--   script   -->
  <script src="../../assets/js/jquery-3.4.1.js"></script>
  <script src="js/script.js"></script> 
  <?php include_once 'sections/t_script.php';?>
  <script>$(document).ready(function(){usuarios(1);});</script>  
  <!--   fin   -->
<?php include_once 'sections/t_fin.php';?>