<?php include_once 'sections/t_inicio.php';?>
    <!--NavBarHorizantal-->
    <?php include_once 'sections/t_navHorizontal.php';?>
  <main class="main-content position-relative h-100 border-radius-lg ">
    <!-- NavbarVertical-->
    <?php include_once 'sections/t_navVertical.php';?>
    <!-- Contenido Principal -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
          <div class="card bg-card-file">
            <div class="card-body p-3">
              <div class="row">
                <?php
                    $sql = "SELECT COUNT(*) as count FROM archivo";
                    $proy = $conector->query($sql);

                    if ($proy) {
                        $result = $proy->fetch_assoc();
                        $Archivos = $result['count'];
                    }
                  ?>
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold" style="color:#111927">Total Proyectos</p>
                    <h5 class="font-weight-bolder mb-0" style="color:#111927"><?php echo $Archivos;?></h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape shadow text-center border-radius-md">
                    <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35"><path d="M250-500h460v-60H250v60Zm0 160h300v-60H250v60ZM140-160q-24 0-42-18.5T80-220v-520q0-23 18-41.5t42-18.5h281l60 60h339q23 0 41.5 18.5T880-680v460q0 23-18.5 41.5T820-160H140Zm0-60h680v-460H456l-60-60H140v520Zm0 0v-520 520Z" fill="#111927"/></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card bg-card-verificado">
            <div class="card-body p-3">
              <div class="row">
                  <?php
                    $sql = "SELECT * FROM usuario";
                    $consulta = $conector->query($sql);
                    $usuario = $consulta->num_rows;
                    $sql = "SELECT * FROM administrador";
                    $consulta2 = $conector->query($sql);
                    $admin = $consulta2->num_rows;
                    $total_user =$usuario + $admin;
                  ?>
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"style="color:#111927">Usuarios Activos</p>
                    <h5 class="font-weight-bolder mb-0"style="color:#111927"><?php echo $total_user;?></h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape shadow text-center border-radius-md">
                    <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35"><path d="M480-80q-85 0-158-30.5T195-195q-54-54-84.5-127T80-480q0-84 30.5-157T195-764q54-54 127-85t158-31q75 0 140 24t117 66l-43 43q-44-35-98-54t-116-19q-145 0-242.5 97.5T140-480q0 145 97.5 242.5T480-140q145 0 242.5-97.5T820-480q0-30-4.5-58.5T802-594l46-46q16 37 24 77t8 83q0 85-31 158t-85 127q-54 54-127 84.5T480-80Zm-59-218L256-464l45-45 120 120 414-414 46 45-460 460Z" fill="#111927"/></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card bg-card-me">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"style="color:#111927">Usuarios</p>
                    <h5 class="font-weight-bolder mb-0"style="color:#111927"><?php echo $usuario;?></h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape shadow text-center border-radius-md">
                    <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35"><path d="M480-481q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM160-160v-94q0-38 19-65t49-41q67-30 128.5-45T480-420q62 0 123 15.5t127.921 44.694q31.301 14.126 50.19 40.966Q800-292 800-254v94H160Zm60-60h520v-34q0-16-9.5-30.5T707-306q-64-31-117-42.5T480-360q-57 0-111 11.5T252-306q-14 7-23 21.5t-9 30.5v34Zm260-321q39 0 64.5-25.5T570-631q0-39-25.5-64.5T480-721q-39 0-64.5 25.5T390-631q0 39 25.5 64.5T480-541Zm0-90Zm0 411Z" fill="#111927"/></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6">
          <div class="card bg-card-admin">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"style="color:#111927">Administradores</p>
                    <h5 class="font-weight-bolder mb-0"style="color:#111927"><?php echo $admin;?></h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape shadow text-center border-radius-md">
                    <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35"><path d="M480-450q-58 0-97.5-39.5T343-587q0-58 39.5-97.5T480-724q58 0 97.5 39.5T617-587q0 58-39.5 97.5T480-450Zm0-60q34 0 55.5-21.5T557-587q0-34-21.5-55.5T480-664q-34 0-55.5 21.5T403-587q0 34 21.5 55.5T480-510Zm0 429q-140-35-230-162.5T160-523v-238l320-120 320 120v238q0 152-90 279.5T480-81Zm0-399Zm0-337-260 98v196q0 63 17.5 120.5T287-296q46-25 93.5-37.5T480-346q52 0 99.5 12.5T673-296q32-49 49.5-106.5T740-523v-196l-260-98Zm0 531q-39 0-78 10t-77 30q32 35 71 61.5t84 41.5q45-15 84-41.5t71-61.5q-38-20-77-30t-78-10Z" fill="#111927"/></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Proximos Eventos</p>
                    <h5 class="font-weight-bolder">Concurso de Desarollo Software</h5>
                    <p class="mb-5">Proximamente se aperturara el campo de concursos.</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                      Leer
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <img src="../../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-50 position-relative z-index-2 pt-4" src="../../assets/img/illustrations/rocket-white.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php include_once 'sections/t_footer.php';?>
    </div>
  </main>
  <!-- Panel Popup Horizazontal -->
  <!--   script   -->
  <?php include_once 'sections/t_script.php';?>
  <!--   fin   -->
<?php include_once 'sections/t_fin.php';?>