<?php
  @session_start();
  include_once '../../db/conexion.php';
  
  $sql = "SELECT *FROM administrador WHERE codAdmin='".$cod_user."' AND estAdmin=1";
  $consulta = $conector->query($sql);
  while($fila = $consulta->fetch_array()){
    $cod_user = $fila['codAdmin'];
  }
  // Verificar el estado activo del menu si esta activo o no
  $pagina_actual = basename($_SERVER['PHP_SELF']); //obteniendo el nombre de la pagina
  if($pagina_actual=="index.php"){
    $pg="Principal";
    $index="active";
    $index_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    $pg="";
    $index="";
    $index_icon="";
  }

  if($pagina_actual=="autores.php"){
    $pg="Autores";
    $autores="active";
    $autores_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    $pg="";
    $autores="";
    $autores_icon="";
  }

  if($pagina_actual=="asesores.php"){
    $pg="Asesores";
    $asesores="active";
    $asesores_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    $pg="";
    $asesores="";
    $asesores_icon="";
  }

  if($pagina_actual=="usuarios.php"){
    
    $user="active";
    $user_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    
    $user="";
    $user_icon="";
  }

  if($pagina_actual=="proyectos.php"){
    $pg="Proyectos";
    $proyectos="active";
    $proyectos_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    $pg="";
    $proyectos="";
    $proyectos_icon="";
  }

  if($pagina_actual=="proyectosUpload.php"){
    $pg="Subir Proyectos";
    $proyectosUpload="active";
    $proyectosUpload_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    $pg="";
    $proyectosUpload="";
    $proyectosUpload_icon="";
  }

  if($pagina_actual=="usuariosUpload.php"){
    $pg="Subir Usuarios";
    $usuariosUpload="active";
    $usuariosUpload_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    $pg="";
    $usuariosUpload="";
    $usuariosUpload_icon="";
  }

  if($pagina_actual=="autoresUpload.php"){
    $pg="Subir Autores";
    $autoresUpload="active";
    $autoresUpload_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    $pg="";
    $autoresUpload="";
    $autoresUpload_icon="";
  }

  if($pagina_actual=="asesorUpload.php"){
    $pg="Subir Asesores";
    $asesorUpload="active";
    $asesorUpload_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    $pg="";
    $asesorUpload="";
    $asesorUpload_icon="";
  }

  if($pagina_actual=="perfil.php"){
    $pg="Mi perfil";
    $perfil="active";
    $perfil_icon='style="background: linear-gradient(#9FEF00, #9FEF00);"';
  }else{
    $pg="";
    $perfil="";
    $perfil_icon="";
  }

?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php">
        <img src=".././../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold" style="color:#fff; letter-spacing:1px; font-size:15px;">THEPROX</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="color:#A4B1CD; letter-spacing:1px; font-size:12px;">Menu</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $index;?>" href="index.php">
            <div class="icon icon-shape icon-sm shadow bg-white border-radius-md text-center me-2 d-flex align-items-center justify-content-center" <?php echo $index_icon;?>>
            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M220-400q0 63 28.5 118.5T328-189q-4-12-6-24.5t-2-24.5q0-32 12-60t35-51l113-111 113 111q23 23 35 51t12 60q0 12-2 24.5t-6 24.5q51-37 79.5-92.5T740-400q0-54-23-105.5T651-600q-21 15-44 23.5t-46 8.5q-61 0-101-41.5T420-714v-20q-46 33-83 73t-63 83.5q-26 43.5-40 89T220-400Zm260 24-71 70q-14 14-21.5 31t-7.5 37q0 41 29 69.5t71 28.5q42 0 71-28.5t29-69.5q0-20-7.5-37T551-306l-71-70Zm0-464v132q0 34 23.5 57t57.5 23q18 0 33.5-7.5T622-658l18-22q74 42 117 117t43 163q0 134-93 227T480-80q-134 0-227-93t-93-227q0-128 86-246.5T480-840Z"/></svg>
            </div>
            <span class="nav-link-text ms-1">Inicio</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  <?php echo $proyectos;?>" href="proyectos.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" <?php echo $proyectos_icon;?>>
            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M550-320h60v-90h90v-60h-90v-90h-60v90h-90v60h90v90ZM140-160q-24 0-42-18.5T80-220v-520q0-23 18-41.5t42-18.5h281l60 60h339q23 0 41.5 18.5T880-680v460q0 23-18.5 41.5T820-160H140Zm0-60h680v-460H456l-60-60H140v520Zm0 0v-520 520Z"/></svg>
            </div>
            <span class="nav-link-text ms-1">Proyectos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  <?php echo $autores;?>" href="autores.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"<?php echo $autores_icon;?>>
            <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960" width="48"><path d="M480-481q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM160-160v-94q0-38 19-65t49-41q67-30 128.5-45T480-420q62 0 123 15.5t127.921 44.694q31.301 14.126 50.19 40.966Q800-292 800-254v94H160Zm60-60h520v-34q0-16-9.5-30.5T707-306q-64-31-117-42.5T480-360q-57 0-111 11.5T252-306q-14 7-23 21.5t-9 30.5v34Zm260-321q39 0 64.5-25.5T570-631q0-39-25.5-64.5T480-721q-39 0-64.5 25.5T390-631q0 39 25.5 64.5T480-541Zm0-90Zm0 411Z"/></svg>
            </div>
            <span class="nav-link-text ms-1">Autores</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $asesores;?> " href="asesores.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"<?php echo $asesores_icon;?>>
            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M42-120v-92q0-34 16-56.5t45-36.5q54-26 115.5-43T358-365q78 0 139.5 17T613-305q29 14 45 36.5t16 56.5v92H42Zm60-60h512v-32q0-15-8.5-24.5T585-251q-43-19-96-36.5T358-305q-78 0-131 17.5T131-251q-12 5-20.5 14.5T102-212v32Zm256-245q-66 0-108-43t-42-107h-10q-8 0-14-6t-6-14q0-8 6-14t14-6h10q0-40 20-72t52-52v39q0 6 4.5 10.5T295-685q7 0 11-4.5t4-10.5v-52q8-2 22-3.5t27-1.5q13 0 27 1.5t22 3.5v52q0 6 4 10.5t11 4.5q6 0 10.5-4.5T438-700v-39q32 20 51 52t19 72h10q8 0 14 6t6 14q0 8-6 14t-14 6h-10q0 64-42 107t-108 43Zm0-60q42 0 66-25t24-65H268q0 40 24 65t66 25Zm302 124-2-29q-7-4-14.5-9T630-409l-26 14-22-32 26-19q-2-4-2-7.5v-15q0-3.5 2-7.5l-26-19 22-32 26 14 14-10q7-5 14-9l2-29h40l2 29q7 4 14 9l14 10 26-14 22 32-26 19q2 4 2 7.5v15q0 3.5-2 7.5l26 19-22 32-26-14q-6 5-13.5 10t-14.5 9l-2 29h-40Zm20-62q16 0 27-11t11-27q0-16-11-27t-27-11q-16 0-27 11t-11 27q0 16 11 27t27 11Zm88-155-9-35q-10-4-20.5-11T721-639l-44 16-20-35 35-28q-2-5-3.5-11t-1.5-12q0-6 1.5-12t3.5-11l-35-28 20-35 44 16q7-8 17.5-15.5T759-805l9-35h38l9 35q10 3 20.5 10.5T853-779l44-16 20 35-35 28q2 5 3.5 11t1.5 12q0 6-1.5 12t-3.5 11l35 28-20 35-44-16q-7 8-17.5 15T815-613l-9 35h-38Zm19-73q25 0 41.5-16.5T845-709q0-25-16.5-41.5T787-767q-25 0-41.5 16.5T729-709q0 25 16.5 41.5T787-651ZM102-180h512-512Z"/></svg>
            </div>
            <span class="nav-link-text ms-1">Asesores</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $user;?> " href="usuarios.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"<?php echo $user_icon;?>>
            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M0-240v-53q0-38.567 41.5-62.784Q83-380 150.376-380q12.165 0 23.395.5Q185-379 196-377.348q-8 17.348-12 35.165T180-305v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-19.861-3.5-37.431Q773-360 765-377.273q11-1.727 22.171-2.227 11.172-.5 22.829-.5 67.5 0 108.75 23.768T960-293v53H780Zm-480-60h360v-6q0-37-50.5-60.5T480-390q-79 0-129.5 23.5T300-305v5ZM149.567-410Q121-410 100.5-430.562 80-451.125 80-480q0-29 20.562-49.5Q121.125-550 150-550q29 0 49.5 20.5t20.5 49.933Q220-451 199.5-430.5T149.567-410Zm660 0Q781-410 760.5-430.562 740-451.125 740-480q0-29 20.562-49.5Q781.125-550 810-550q29 0 49.5 20.5t20.5 49.933Q880-451 859.5-430.5T809.567-410ZM480-480q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm.351-60Q506-540 523-557.351t17-43Q540-626 522.851-643t-42.5-17Q455-660 437.5-642.851t-17.5 42.5Q420-575 437.351-557.5t43 17.5ZM480-300Zm0-300Z"/></svg>
            </div>
            <span class="nav-link-text ms-1">Usuarios</span>
          </a>
        </li>
        <!--Menu ADmin-->
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="color:#A4B1CD; letter-spacing:1px; font-size:12px;">Administrador</h6>
          <span class="ps-4 ms-2 text-uppercase text-xs font-weight-medium" style="color:#9FEF00; letter-spacing:1px; font-size:6px;">Registros</span>
        
          <li class="nav-item">
            <a class="nav-link <?php echo $proyectosUpload;?> " href="proyectosUpload.php">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" <?php echo $proyectosUpload_icon;?>>
              <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M180-120q-24.75 0-42.375-17.625T120-180v-600q0-24.75 17.625-42.375T180-840h600q24.75 0 42.375 17.625T840-780v329q-14-8-29.5-13t-30.5-8v-308H180v600h309q4 16 9.023 31.172Q503.045-133.655 510-120H180Zm0-107v47-600 308-4 249Zm100-53h211q4-16 9-31t13-29H280v60Zm0-170h344q14-7 27-11.5t29-8.5v-40H280v60Zm0-170h400v-60H280v60ZM732.5-41Q655-41 600-96.5T545-228q0-78.435 54.99-133.717Q654.98-417 733-417q77 0 132.5 55.283Q921-306.435 921-228q0 76-55.5 131.5T732.5-41ZM718-101h33v-110h110v-33H751v-110h-33v110H608v33h110v110Z"/></svg>
              </div>
              <span class="nav-link-text ms-1">Subir Proyectos</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo $usuariosUpload;?> " href="usuariosUpload.php">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" <?php echo $usuariosUpload_icon;?> >
              <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M730-400v-130H600v-60h130v-130h60v130h130v60H790v130h-60Zm-370-81q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM40-160v-94q0-35 17.5-63.5T108-360q75-33 133.338-46.5 58.339-13.5 118.5-13.5Q420-420 478-406.5 536-393 611-360q33 15 51 43t18 63v94H40Zm60-60h520v-34q0-16-9-30.5T587-306q-71-33-120-43.5T360-360q-58 0-107.5 10.5T132-306q-15 7-23.5 21.5T100-254v34Zm260-321q39 0 64.5-25.5T450-631q0-39-25.5-64.5T360-721q-39 0-64.5 25.5T270-631q0 39 25.5 64.5T360-541Zm0-90Zm0 411Z"/></svg>
              </div>
              <span class="nav-link-text ms-1">Registrar Usuarios</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $autoresUpload;?> " href="autoresUpload.php">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" <?php echo $autoresUpload_icon;?> >
              <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M474-486q26-32 38.5-66t12.5-79q0-45-12.5-79T474-776q76-17 133.5 23T665-631q0 82-57.5 122T474-486Zm216 326v-94q0-51-26-95t-90-74q173 22 236.5 64T874-254v94H690Zm110-289v-100H700v-60h100v-100h60v100h100v60H860v100h-60Zm-485-32q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM0-160v-94q0-35 18.5-63.5T68-360q72-32 128.5-46T315-420q62 0 118 14t128 46q31 14 50 42.5t19 63.5v94H0Zm315-381q39 0 64.5-25.5T405-631q0-39-25.5-64.5T315-721q-39 0-64.5 25.5T225-631q0 39 25.5 64.5T315-541ZM60-220h510v-34q0-16-8-30t-25-22q-69-32-117-43t-105-11q-57 0-104.5 11T92-306q-15 7-23.5 21.5T60-254v34Zm255-411Zm0 411Z"/></svg>
              </div>
              <span class="nav-link-text ms-1">Registrar Autor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $asesorUpload;?> " href="asesorUpload.php">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" <?php echo $asesorUpload_icon;?> >
              <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M730-400v-130H600v-60h130v-130h60v130h130v60H790v130h-60Zm-370-81q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM40-160v-94q0-35 17.5-63.5T108-360q75-33 133.338-46.5 58.339-13.5 118.5-13.5Q420-420 478-406.5 536-393 611-360q33 15 51 43t18 63v94H40Zm60-60h520v-34q0-16-9-30.5T587-306q-71-33-120-43.5T360-360q-58 0-107.5 10.5T132-306q-15 7-23.5 21.5T100-254v34Zm260-321q39 0 64.5-25.5T450-631q0-39-25.5-64.5T360-721q-39 0-64.5 25.5T270-631q0 39 25.5 64.5T360-541Zm0-90Zm0 411Z"/></svg>
              </div>
              <span class="nav-link-text ms-1">Registrar Asesor</span>
            </a>
          </li>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="color:#A4B1CD; letter-spacing:1px; font-size:12px;">Configuraciones</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $perfil;?>" href="perfil.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"<?php echo $perfil_icon;?>>
            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M705-128 447-388q-23 8-46 13t-47 5q-97.083 0-165.042-67.667Q121-505.333 121-602q0-31 8.158-60.388Q137.316-691.777 152-718l145 145 92-86-149-149q25.915-15.158 54.957-23.579Q324-840 354-840q99.167 0 168.583 69.417Q592-701.167 592-602q0 24-5 47t-13 46l259 258q11 10.957 11 26.478Q844-209 833-198l-76 70q-10.696 11-25.848 11T705-128Zm28-57 40-40-273-273q16-21 24-49.5t8-54.5q0-75-55.5-127T350-782l101 103q9 9 9 22t-9 22L319-511q-9 9-22 9t-22-9l-97-96q3 77 54.668 127T354-430q25 0 53-8t49-24l277 277ZM476-484Z"/></svg>
            </div>
            <span class="nav-link-text ms-1">Perfil</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../config/PHP_cerrar.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="12" viewBox="0 -960 960 960" width="12"><path d="M180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h291v60H180v600h291v60H180Zm486-185-43-43 102-102H375v-60h348L621-612l43-43 176 176-174 174Z"/></svg>
            </div>
            <span class="nav-link-text ms-1">Cerrar Sesion</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>