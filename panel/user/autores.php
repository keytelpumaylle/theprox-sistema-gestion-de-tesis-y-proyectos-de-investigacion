<?php include_once 'sections/t_inicio.php';?>
    <!--NavBarHorizantal-->
    <?php include_once 'sections/t_navHorizontal.php';?>
  <main class="main-content position-relative h-100 border-radius-lg ">
    <!-- NavbarVertical-->
    <?php include_once 'sections/t_navVertical.php';?>
    <!-- Contenido Principal -->
    <div class="container-fluid py-4">
  <!-- Autores Lista -->
        <?php
          $sql = 'SELECT nomAutor,apeAutor,emaAutor FROM autor';
          $consulta = $conector->query($sql);
        ?>
        <h3 style="font-size:16px;">Autores Registrados: </h3>
        <div class="row">
          <?php if ($consulta->num_rows > 0) {?>
            <?php while ($autor = $consulta->fetch_assoc()): ?>
              <div class=" col-md-3 text-left">
                <div class="rounded d-flex flex-row align-items-center mb-4 shadow" style="background-color:#1A2332;">
                  <img class="rounded" style="height:80px;" src="../../assets/img/bruce-mars.jpg" alt="avatar">
                  <div class="mx-2">
                    <p style="font-size:12px; color:#FFF; font-weight: bold;"><?php echo $autor['nomAutor'] . ' ' . $autor['apeAutor'] ?></br>
                    <span style="font-size:11px; color:#A4B1CD; font-weight: 500;"><?php echo $autor['emaAutor']?></span></p>
                    
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php } else { ?>
              <p>No se encontraron autores</p>
          <?php } ?>
        </div>
      </div>
      <!-- Footer -->
      <?php include_once 'sections/t_footer.php';?>
    </div>
  </main>
  <!--   script   -->
  <?php include_once 'sections/t_script.php';?>
  <!--   fin   -->
<?php include_once 'sections/t_fin.php';?>