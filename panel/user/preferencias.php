<?php include_once 'sections/t_inicio.php';?>
    <!--NavBarHorizantal-->
    <?php include_once 'sections/t_navHorizontal.php';?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- NavbarVertical-->
    <?php include_once 'sections/t_navVertical.php';?>
    <!-- Contenido Principal -->
    <div class="container py-4">
        <!-- Estadisticas -->
        <div class="">
        <a class=" text-dark position-fixed px-3 py-2">
          <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg ">
          <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
              <h5 class="mt-3 mb-0">Personalizacion</h5>
              <p>Personalize su panel a su estilo</p>
            </div>
            
            <!-- End Toggle Button -->
          </div>
          <hr class="horizontal dark my-1">
          <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
              <h6 class="mb-0">Color de fondo de los iconos</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
              <div class="badge-colors my-2 text-start">
                <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
              </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
              <h6 class="mb-0">Color de fondo del Menu Vertical</h6>
              <p class="text-sm">Elija una de estas 2 opciones.</p>
            </div>
            <div class="d-flex">
              <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparente</button>
              <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">Blanco</button>
            </div>
            <!-- Navbar Fixed -->
            <div class="mt-3">
              <h6 class="mb-0">Menu Horizantal Fijo</h6>
            </div>
            <div class="form-check form-switch ps-0">
              <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
            </div>
            
          </div>
        </div>
    </div>
      
      <!-- Footer -->
      <?php include_once 'sections/t_footer.php';?>
    </div>
  </main>
  <!-- Panel Popup Horizazontal -->
  <?php include_once 'sections/t_popupHorizontal.php';?>
  <!--   script   -->
  <?php include_once 'sections/t_script.php';?>
  <!--   fin   -->
<?php include_once 'sections/t_fin.php';?>