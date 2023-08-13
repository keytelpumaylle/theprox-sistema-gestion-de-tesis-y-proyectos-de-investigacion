
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="" navbar-scroll="true" style="background-color:#111927;">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm" style="color: #9FEF00;">Anuncio</li>
            <li class="breadcrumb-item text-sm active" aria-current="page"><a class="" href="javascript:;"  style="color: #fff;">La nueva plataforma de ...</a></li>
          </ol>
          <h6 class="font-weight-bolder mb-0" style="color:#fff;">Bienvenido</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav justify-content-end">
            <div style="background-color:#9FEF0020; border-radius:7px;display: flex; align-items: center;margin-right:8px; margin-left:8px; justify-content: center; padding-left:11px">
              <i class="fa fa-user-o" aria-hidden="true" style="color:#9FEF00; margin-right:8px;font-weight:400; font-size:13px;"></i>
              <li class="nav-item d-flex align-items-center">
                <span class=" mb-0 me-3" style="font-size:11px; text-transform: uppercase; font-weight:400; letter-spacing:1px; color:#9FEF00;"><?php echo $pri;?></span>
              </li>
            </div>
            <div style="background-color:#1A2332; border-radius: 7px;">
              <li class="nav-item d-flex align-items-center" style="margin-right:10px; margin-left:10px; padding:9px;">
                <img src="../<?php echo $img_user;?>" alt="avatar" style="width: 30px; height: 30px; border-radius: 15%; margin-right: 10px;">
                <span class="d-sm-inline d-none" style="color:#fff; letter-spacing:1px; font-size:14px;"><?php echo $nom_user;?></span>
              </li>
              <li class="nav-item d-xl-none pb-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
            </div>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 5px; margin-left: 5px;">
                <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25">
                  <path d="M480-345 240-585l43-43 197 198 197-197 43 43-240 239Z" fill="#fff"/>
                </svg>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 me-sm-n4" aria-labelledby="dropdownMenuButton" style="background-color:#1A2332;">
                <li class="m-2" >
                  <a class="dropdown-item border-radius-md d-flex" href="perfil.php">
                    <p class="" style="font-size:14px; font-weight:800; letter-spacing:0.5px;">Perfil</p>
                  </a>
                </li>
                <li class="m-2">
                  <a class="dropdown-item border-radius-md" href="../../config/PHP_cerrar.php">
                    <p style="font-size:14px; font-weight:800; letter-spacing:0.5px;">Cerrar Sesion</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
</nav>